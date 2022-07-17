<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    function purchase()
    {
        //進銷存-進貨
        $book = Book::select("book.bid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
            ->get();
        
        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != ""){
            $book = Book::select("book.bid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
            ->where('bid','LIKE','%'.$search_text.'%')
            ->orWhere('sname','LIKE','%'.$search_text.'%')
            ->orWhere('staffname','LIKE','%'.$search_text.'%')
            ->get();
            
        }
        else{
            $book = Book::select("book.bid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
            ->get();
                        
        };    

        return view('erp.purchase', compact("book"));
    }


    function purchaseCreate()
    {
        //進銷存-新增進貨

        //進貨單編號************************************************************************* 

        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $bDay = count(Book::all()->where('bDate', '=', $day));

        //最新日期是否等於今天日期
        if ($bDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $bDay += 1;
            $bDay = sprintf("%03d", $bDay);
            $bid =  "KMP" .  $day . $bDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $bid = "KMP" .  $day . "001";
        }

        //進貨單編號************************************************************************* 

        return view('erp.purchaseCreate', compact('bid'));
    }


    function purchaseInfo($purchaseID)
    {
        //進銷存-資訊進貨

        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.staffName', 'book.bookDate', 'supplier.*', 'book.remark')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Book::join("bookDetail", 'bookDetail.bid', '=', 'book.bid')
            ->join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.stockIn')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        return view('erp.purchaseInfo', compact("info", "detail"));
    }


    function purchaseEdit($purchaseID)
    {
        //進銷存-編輯進貨

        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.staffName', 'book.bookDate', 'supplier.*')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Book::join("bookDetail", 'bookDetail.bid', '=', 'book.bid')
            ->join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.stockIn')
            ->where('book.bid', '=', $purchaseID)
            ->get();


        return view('erp.purchaseEdit', compact("info", "detail"));
    }

    function purchaseEditPost(Request $req, $purchaseID){

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
