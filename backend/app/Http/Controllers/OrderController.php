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

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }






    function order()
    {
        //訂單
        $order = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

            $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
            if ($search_text != ""){
            $order = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->where('oid','LIKE','%'.$search_text.'%')
                ->orWhere('cname','LIKE','%'.$search_text.'%')
                ->get();
                
            }
            else{
                $order = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
                ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->get();
                            
            };

        return view('main.order', compact('order'));
    }
    function orderInfo($orderID)
    {
        //訂單明細管理
        $orderInfo = Order::join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->find($orderID);

        // foreach ($orderInfo as $key => $orderInfo) {
        // }

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

    //匯出訂單PDF
    public function createOrderPDF (Request $request,$orderID) {
        $orderInfo = Order::join('quotation','quotation.qid','=','order.qid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        ->find($orderID);

        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo'));
        return $pdf->download();
    }

    //預覽訂單PDF
    public function viewOrderPDF (Request $request,$orderID) {
        $orderInfo = Order::join('quotation','quotation.qid','=','order.qid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        ->find($orderID);

         
        $pdf = PDF::loadView('pdf.orderInfo', compact('orderInfo'));
        return $pdf->stream();
    }
}


