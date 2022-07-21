<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookdetail;
use App\Models\Inventory;
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
        $bDay = count(Book::all()->where('bDate', '=', $day));

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
        // dd($req);

        $bid = Book::insertGetId([
            'sname' => $req->sname,
            'sid' => $req->sid,
            'bookdate' => $req->bookdate,
            'staffname' => $req->staffname,
            'remark' => $req->remark,
            'bDate' => date("Y-m-d"),
            'KMPid' => $req->KMPid
        ]);

        // dd($book->id);
        for ($i = 0; $i < count($req->mName); $i++) {
            Bookdetail::insert([
                'bid' => $bid,
                'mname' => $req->mName[$i],
                'quantity' => $req->quantity[$i],
                'cost' => $req->cost[$i],
            ]);
        };

        return redirect('/main/purchase');
    }

    //進銷存-進貨資訊
    function purchaseInfo($purchaseID)
    {
        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.KMPid', 'book.staffName', 'book.bookDate', 'supplier.*', 'book.remark')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Book::join("bookDetail", 'bookDetail.bid', '=', 'book.bid')
            ->join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.pStatus')
            ->where('book.bid', '=', $purchaseID)
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

    //商品名稱進庫存比對
    function mNumber(Request $req)
    {

        //庫存表
        $inventory = Inventory::all()
            ->where('mname', '=', $req->mName)
            ->first();

        return response()->json($inventory);
    }

    //進銷存-編輯進貨存檔
    function purchaseEditPost(Request $req, $purchaseID)
    {
        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.staffName', 'book.bookDate', 'supplier.*')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Bookdetail::join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.pStatus', 'bookDetail.bDetailId')
            ->where('bookDetail.bid', '=', $purchaseID)
            ->get();

        //進貨明細修改,用資料庫book detail PK判斷
        // 1.原本資料庫就有UpData
        // 2.沒有新增Create

        for ($i = 0; $i < count($req->mName); $i++) {

            $PkOfDetail = $detail->where('bDetailId', '=', $req->did[$i])->first();

            // dd($PkOfDetail);
            if ($PkOfDetail !== null) {

                $PkOfDetail->mName = $req->mName[$i];
                $PkOfDetail->mNumber = $req->mNumber[$i];
                $PkOfDetail->quantity = $req->quantity[$i];
                $PkOfDetail->cost = $req->cost[$i];
                $PkOfDetail->pStatus = $req->pStatus[$i];
                $PkOfDetail->save();

                return redirect("/main/purchase/$purchaseID");
            } else {

                // Bookdetail::create([
                //     'bid' => $purchaseID,
                //     'mName' => $req->mName[$i],
                //     'quantity' => $req->quantity[$i],
                //     'cost' => $req->cost[$i],
                //     'stockIn' => $req->stockIn[$i]
                // ]);

                // inventory::create([
                //     'mNumber' => $req->mNumber[$i]
                // ]);

            }
        }


        // dd($detail);

        // dd($req->mName[0]);
    }


    function sales()
    {
        //進銷存-銷貨
        return view('erp.sales');
    }


    function stock()
    {
        //進銷存-庫存
        return view('erp.stock');
    }
}
