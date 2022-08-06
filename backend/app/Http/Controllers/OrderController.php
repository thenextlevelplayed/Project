<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use App\Models\Bookdetail;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Detaillist;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Invoicedetail;
use App\Models\Manufacture;
use App\Models\Material;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\Rebate;
use App\Models\Staff;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\File;
use LDAP\Result;
use Mockery\Generator\StringManipulation\Pass\Pass;

class OrderController extends Controller
{

    //訂單
    function order()
    {

        $order = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('order.oid', 'order.ostatus', 'order.odate', 'customer.cname', 'order.orownumber')
            ->orderby('order.oid')
            ->get();

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {

            $order = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->select('order.oid', 'order.ostatus', 'customer.cname', 'order.orownumber')
                ->where('orownumber', 'LIKE', '%' . $search_text . '%')
                ->orWhere('cname', 'LIKE', '%' . $search_text . '%')
                ->orderby('order.oid')
                ->get();
        } else {
            $order;
        };


        //工單編號
        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')->get();

        // dd($manu);
        //出貨單編號
        $deli = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->get();
        // dd($deli);

        return view('main.order', compact('order', 'manu', 'deli'));
    }

    //訂單明細管理
    function orderInfo($orderID)
    {

        //客戶資訊
        //1.訂單編號 2.公司名稱 3.公司統編 4.公司電話 5.訂單日期 6.聯絡人 7.聯絡人LINE ID 8.聯絡信箱
        $orderInfo = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('order.orownumber', 'customer.cname', 'customer.cid', 'customer.ctel', 'order.odate', 'quotation.qcontact', 'customer.clineid', 'customer.cmail', 'staff.staffname','order.ostatus')
            ->where('order.oid', '=', $orderID)
            ->first();

        //訂單明細
        // 1.商品名稱 2.商品編號 3.數量 4.單價 5.明細PK 6.備註
        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.dlid','detaillist.remark')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->get();

        return view('order.orderInfo', compact('orderInfo', 'quotation', 'orderID'));
    }

    //訂單編輯
    function orderEdit($orderID)
    {

        //客戶資訊
        $orderEdit = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('order.orownumber', 'customer.cname', 'customer.cid', 'customer.ctel', 'order.odate', 'quotation.qcontact', 'customer.clineid', 'customer.cmail', 'staff.staffname', 'order.ostatus')
            ->where('order.oid', '=', $orderID)
            ->first();

        // dd($orderEdit);
        //撈明細資料
        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.dlid','detaillist.remark')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->get();

        return view('order.orderEdit', compact('orderEdit', 'quotation', 'orderID'));
    }

    //訂單拆單
    function orderSplit($orderID)
    {

        //客戶資訊
        $orderEdit = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('order.orownumber', 'customer.cname', 'customer.cid', 'quotation.qcontact', 'order.odate', 'customer.ctel', 'customer.clineid', 'customer.cmail', 'staff.staffname', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->first();

        //撈明細資料
        $order = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.dlid', 'order.oid')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->get();

        return view('order.orderSplit', compact('orderEdit', 'order'));
    }

    //訂單拆單表單傳送
    function orderSplitPost(Request $req, $orderID)
    {

        // dd($req);

        $Orig = Detaillist::where('detaillist.dlid', '=', $req->dlid[0])->first();
        // dd($Orig);

        //原訂單  改明細數量
        for ($i = 0; $i < count($req->dlid); $i++) {
            $Orig = Detaillist::where('detaillist.dlid', '=', $req->dlid[$i])->first();
            $Orig->quantity = $req->OrigNum[$i];
            $Orig->save();
        }

        //子訂單
        // 1.取得原訂單資訊
        $orderInfo = Order::find($orderID);

        // 2.產生子訂單編號 原訂單編號後加上A
        $Moid = Order::insertGetId([
            'odate' => date("Y-m-d"),
            'qid' => $orderInfo->qid,
            'ostatus' => 'N',
            'orownumber' => $orderInfo->orownumber . 'A'
        ]);

        // dd($oid);

        // 3.子訂單明細新增
        for ($i = 0; $i < count($req->dlid); $i++) {
            // 3-1. 取得原訂單產品資訊
            $Orig = Detaillist::where('detaillist.dlid', '=', $req->dlid[$i])->first();

            // 3-2. 判斷數量是否為0, 0 不新增
            if ($req->splitNum[$i] != 0) {
                // 3-3. 新增 detail 
                Detaillist::insert([
                    'qid' => $Orig->qid,
                    'oid' => $Moid,
                    'iid' => $Orig->iid,
                    'rid' => $Orig->rid,
                    'mname' => $Orig->mname,
                    'quantity' => $req->splitNum[$i],
                    'price' => $Orig->price,
                    'mspecification' => $Orig->mspecification,
                    'mnumber' => $Orig->mnumber,
                    'remark' => $Orig->remark
                ]);
            } else {
                continue;
            }
        }

        return  redirect('/main/order');
    }

    public function orderUpdate(Request $request, $orderID)
    {
        // dd($request->dlid);

        for ($i = 0; $i < count($request->dlid); $i++) {
            $id = Detaillist::where('detaillist.dlid', '=', $request->dlid[$i])->first();
            // dd($id);
            $id->quantity = $request->quantity[$i];
            // dd($id);

            $id->save();
        }

        return redirect('/main/order');
    }

    // 轉為工單
    public function ManufactureCreate(Request $request, $orderID)
    {

        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $mDay = count(Manufacture::all()->where('mdate', '=', $day));

        //資料庫今天有幾筆
        if ($mDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $mDay += 1;
            $mDay = sprintf("%03d", $mDay);
            $KMMid =  "KMM-" .  $day . $mDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $KMMid = "KMM-" .  $day . "001";
        }

        $order = Order::select('*')
            ->find($orderID);

        $order->ostatus = 'Y';
        $order->save();

        //工單新增(轉為工單)
        $newMaufacture = new Manufacture();

        $newMaufacture->mrownumber =  $KMMid;
        $newMaufacture->mdate = date('Y-m-d');
        $newMaufacture->oid = $orderID;
        $newMaufacture->mstatus = "N";
        $newMaufacture->mcomplete = "N";

        $newMaufacture->save();

        return redirect('/main/manufacture');
    }

    //匯出訂單PDF
    public function createOrderPDF(Request $request, $orderID)
    {
        $orderInfo = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('order.orownumber', 'customer.cname', 'customer.cid', 'quotation.qcontact', 'order.odate', 'customer.ctel', 'customer.clineid', 'customer.cmail', 'staff.staffname', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->first();

        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.dlid', 'order.oid')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->get();

        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo', 'quotation'));
        return $pdf->download();
    }

    //預覽訂單PDF
    public function viewOrderPDF(Request $request, $orderID)
    {


        $orderInfo = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('order.orownumber', 'customer.cname', 'customer.cid', 'quotation.qcontact', 'order.odate', 'customer.ctel', 'customer.clineid', 'customer.cmail', 'staff.staffname', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->first();

        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.dlid', 'order.oid')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $orderID)
            ->get();

        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo', 'quotation'));
        return $pdf->stream();
    }
}
