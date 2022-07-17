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
use Mockery\Generator\StringManipulation\Pass\Pass;

class BackendController extends Controller
{
    //


    function index()
    {

        return view('main.index');

        //每個操作頁面都要判斷Session
        // $account = Session::get('account', 'Guest');
        // if ($account == 'Guest') {
        //     return redirect('/member/login');
        // } else {
        //     return view('main.index');
        // }
    }


    //ERP 已經搬到 purchaseController ----Swen----- 

    function quotation()
    {
        //報價管理
        $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        // dd($quotation);
        return view('main.quotation', compact('quotation'));
    }
    function quotationInfo($quotationId)
    {
        //報價資訊
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->where('quotation.qid', '=', $quotationId)
            ->get();
        foreach ($quotationInfo as $key => $quotationInfo) {
            // dd($value);
            # code...
        }

        // dd($quotationInfo);
        return view('quotation.quotationInfo', compact('quotationInfo'));
    }
    function quotationEdit()
    {
        //報價編輯
        return view('quotation.quotationEdit');
    }
    function quotationCreate()
    {
        //新增報價單
        return view('quotation.quotationCreate');
    }



    function order()
    {
        //訂單
        $order = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        return view('main.order', compact('order'));
    }
    function orderInfo()
    {
        //訂單明細管理
        $orderInfo = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();

        foreach ($orderInfo as $key => $orderInfo) {
        }

        // dd($orderInfo);
        return view('order.orderInfo', compact('orderInfo'));
    }
    function orderEdit($orderID){
         
        //訂單編輯
        $orderEdit = Order::join('quotation','quotation.qid','=','order.qid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        ->where('order.oid', '=', $orderID)
        ->find($orderID);

        // dd($orderedit);
        return view('order.orderEdit', compact('orderEdit'));
    }

    function manufacture()
    {
        //製造
        $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();


        $search_text = $_GET['query'] ?? "";
        if ($search_text != "") {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->where('cname', 'LIKE', '%' . $search_text . '%')
                ->orWhere('detaillist.dlid', 'LIKE', '%' . $search_text . '%')
                ->orWhere('mid', 'LIKE', '%' . $search_text . '%')
                ->get();
        } else {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->select('*')
                ->get();
        };
        return view('main.manufacture', ["manufacture" => $manufacture]);
    }
    function manufactureEdit($manufactureId)
    {
        // 製造

        $manufactureedit = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->find($manufactureId);




        return view('manufacture.manufactureEdit', ["manu" => $manufactureedit]);
    }

    public function manuSearch()
    {

        $search_text = $_GET['query'];
        if ($search_text != "") {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->where('cname', 'LIKE', '%' . $search_text . '%')
                ->orWhere('detaillist.dlid', 'LIKE', '%' . $search_text . '%')
                ->orWhere('mid', 'LIKE', '%' . $search_text . '%')
                ->get();
        } else {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->select('*')
                ->get();
        };

        return view('manufacture.search', ["manufacture" => $manufacture]);
    }




    function receipt()
    {
        //發票
        return view('main.receipt');
    }

    function receiptInfo($deliveryId)
    {
        //檢視發票
        return view('receipt.receiptInfo');
    }

    function receiptInforEdit(Request $request)
    {
        //編輯發票
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }

    function receiptInforUpdate(Request $request)
    {
        //更新發票內容
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }


    function invoiceSomeone(Request $request)
    {
        //開立發票
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }



    function customer()
    {

        //客戶
        return view('main.customer');
    }

    function customerInfo($customerId)
    {

        //檢視客戶
        return view('customer.customerInfo');
    }

    function customerInfoEdit(Request $request)
    {

        //編輯客戶
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerEdit');
    }

    function customerUpdate(Request $request)
    {

        //更新客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerInfo');
    }

    function customerAdd(Request $request)
    {

        //新增客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerAdd');
    }

    function customerStore(Request $request)
    {

        //新增客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerAdd');
    }

    


    //匯出報價PDF
    public function createQuotationPDF()
    {
        $pdf = PDF::loadView('pdf.quotationInfo', $data = []);
        return $pdf->download();
    }
    public function viewQuotationPDF(Request $request)
    {
        $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();
        foreach ($quotation as $key => $quotationInfo) {
            // dd($value);
            # code...
        }
        $pdf = PDF::loadView('pdf.quotationInfo', compact('quotationInfo'));
        return $pdf->stream();
    }
    //匯出訂單PDF
    public function createOrderPDF (Request $request,$orderId) {
        $orderInfo = Order::join('quotation','quotation.qid','=','order.qid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        // ->get();
        ->find($orderId);
        dd($orderInfo);

        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo'));
        return $pdf->download();
    }
    //預覽訂單PDF
    public function viewOrderPDF (Request $request,$orderId) {
        $orderInfo = Order::join('quotation','quotation.qid','=','order.qid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        ->find($orderId);

        
        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo'));
        return $pdf->stream();
    }

    //匯出工單PDF
    public function createManufacturePDF(Request $request)
    {
        $pdf = PDF::loadView('pdf.manufactureEdit', $data = []);
        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();
        dd($manu);

        return $pdf->download();
    }
    public function viewManufacturePDF(Request $request)
    {
        $pdf = PDF::loadView('pdf.manufactureEdit', $data = []);
        return $pdf->stream();
    }
}
