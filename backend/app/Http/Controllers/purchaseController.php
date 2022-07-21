<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookdetail;
use App\Models\Inventory;
use App\Models\Material;
use App\Models\Supplier;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;

use function PHPUnit\Framework\isNull;

class purchaseController extends Controller
{
    //進銷存-進貨
    function purchase()
    {
        $book = Book::select("book.bid", "book.KMPid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
            ->get();

        // $detail = Bookdetail::select("")


        // dd($book);

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {
            $book = Book::select("book.bid", "book.KMPid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
                ->where('KMPid', 'LIKE', '%' . $search_text . '%')
                ->orWhere('sname', 'LIKE', '%' . $search_text . '%')
                ->orWhere('staffname', 'LIKE', '%' . $search_text . '%')
                ->get();
        } else {
            $book = Book::select("book.bid", "book.KMPid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
                ->get();
        };

        return view('erp.purchase', compact("book"));
    }

    //進銷存-新增進貨單
    function purchaseCreate()
    {
        //進貨單編號************************************************************************* 

        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $bDay = count(Book::all()->where('bdate', '=', $day));

        //資料庫今天有幾筆
        if ($bDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $bDay += 1;
            $bDay = sprintf("%03d", $bDay);
            $KMPid =  "KMP" .  $day . $bDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $KMPid = "KMP" .  $day . "001";
        }

        //進貨單編號************************************************************************* 

        return view('erp.purchaseCreate', compact('KMPid'));
    }

    //廠商資訊比對
    function supplierPost(Request $req)
    {
        //庫存表
        $supplier = Supplier::all()
            ->where('sname', '=', $req->sName)
            ->first();

        return response()->json($supplier);
    }

    //進銷存-新增進貨單處理
    function purchaseCreatePost(Request $req)
    {

        $bid = Book::insertGetId([
            'sname' => $req->sname,
            'sid' => $req->sid,
            'bookdate' => $req->bookdate,
            'staffname' => $req->staffname,
            'remark' => $req->remark,
            'bdate' => date("Y-m-d"),
            'kmpid' => $req->KMPid
        ]);


        for ($i = 0; $i < count($req->mName); $i++) {

            $mid = Material::select('*')
                ->where('mname', '=', $req->mName[$i])
                ->first();

            Bookdetail::insert([
                'bid' => $bid,
                'mname' => $req->mName[$i],
                'quantity' => $req->quantity[$i],
                'cost' => $req->cost[$i],
                'mid' => $mid->mid
            ]);
        };

        return redirect('/main/purchase');
    }

    //進銷存-進貨資訊
    function purchaseInfo($purchaseID)
    {
        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.kmpid', 'book.staffname', 'book.bookdate', 'supplier.*', 'book.remark')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Bookdetail::join('material', 'material.mid', '=', 'bookdetail.mid')
            ->select('*')
            ->where('bid', '=', $purchaseID)
            ->get();

        return view('erp.purchaseInfo', compact("info", "detail"));
    }

    //進銷存-編輯進貨
    function purchaseEdit($purchaseID)
    {
        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.KMPid', 'book.staffName', 'book.bookDate', 'supplier.*')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Bookdetail::join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.pStatus', 'bookDetail.bDetailId')
            ->where('bookDetail.bid', '=', $purchaseID)
            ->get();


        return view('erp.purchaseEdit', compact("info", "detail"));
    }

    //商品名稱商品表比對
    function mNumber(Request $req)
    {

        //商品表
        $material = Material::all()
            ->where('mname', '=', $req->mName)
            ->first();

        return response()->json($material);
    }

    //進銷存-編輯進貨存檔
    function purchaseEditPost(Request $req, $purchaseID)
    {
        //進貨明細修改
        // 1.Drop 掉全部
        Bookdetail::select('*')
            ->where('bookDetail.bid', '=', $purchaseID)
            ->delete();
        // 2.重新新增
        for ($i = 0; $i < count($req->mName); $i++) {

            $mid = Material::select('mid')
                ->where('mname', '=', $req->mName[$i])
                ->first();

            Bookdetail::insert([
                'bid' => $purchaseID,
                'mname' => $req->mName[$i],
                'quantity' => $req->quantity[$i],
                'cost' => $req->cost[$i],
                'mid' => $mid->mid,
                'pstatus' => $req->pStatus[$i]
            ]);
        }

        return redirect("/main/purchase/$purchaseID");
    }

    //進貨單入庫寫入庫存
    function stockIn(Request $req)
    {


        //庫存表
        $inventory = Inventory::all()
            ->where('mnumber', '=', $req->mNumber)
            ->first();

        //數量增加到庫存
        $addQty = $inventory->sumquantity + $req->quantity;
        $inventory->sumquantity = $addQty;
        $inventory->save();

        $pstatus = Bookdetail::select('*')
            ->where('bdetailid', '=', $req->did)
            ->first();

        $pstatus->pstatus = 'Y';
        $pstatus->save();

        return response()->json(($pstatus->save()));
    }

    function stock()
    {

        //進銷存-庫存
        return view('erp.stock');
    }
}
