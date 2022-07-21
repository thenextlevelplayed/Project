<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
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
use App\Models\Rebate;
use App\Models\Staff;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\File;
use Mockery\Generator\StringManipulation\Pass\Pass;

class QuotationController extends Controller
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
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
    
    //報價管理
    function quotation()
    {
        $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        return view('main.quotation', compact('quotation'));
    }    
    
    //報價資訊
    function quotationInfo($quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->find($quotationId);
        
        // 根據qid撈每一張報價單的明細
        $quotation = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
        ->select('*')
        ->where('detaillist.qid', '=', $quotationInfo->qid)
        ->get();
        

        return view('quotation.quotationInfo', compact('quotationInfo','quotation'));
    }

    //報價編輯
    function quotationEdit($quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->find($quotationId);
        
        // 根據qid撈每一張報價單的明細
        $quotation = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
        ->select('*')
        ->where('detaillist.qid', '=', $quotationInfo->qid)
        ->get();
        //撈明細資料
        $dtl = Detaillist::find($quotationId);
        return view('quotation.quotationEdit',compact('quotationInfo','quotation','dtl'));
    }    

    // 報價更新
    public function quotationUpdate(Request $request,$quotationId){
        $dtl = Detaillist::join('quotation','quotation.dlid','=','detaillist.dlid')
        ->select('*')
        ->find($quotationId);
        
        $dtl->quantity = $request->quantity;
        $dtl->save();  
        
        // dd($dtl);
        return redirect('/main/quotation');
    }

    //新增報價單
    function quotationCreate()
    {
        return view('quotation.quotationCreate');
    }

    //轉為訂單
    public function orderCreate(Request $request,)
    {
        return redirect('/main/order');
    }


    //匯出報價PDF
    public function createQuotationPDF(Request $request,$quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->find($quotationId);
        
        // 根據qid撈每一張報價單的明細
        $quotation = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
        ->select('*')
        ->where('detaillist.qid', '=', $quotationInfo->qid)
        ->get();

        $pdf = PDF::loadView('pdf.quotationInfo', compact('quotationInfo','quotation'));
        return $pdf->download();
    }
    
    //預覽報價PDF
    public function viewQuotationPDF(Request $request,$quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->find($quotationId);
        
        // 根據qid撈每一張報價單的明細
        $quotation = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
        ->select('*')
        ->where('detaillist.qid', '=', $quotationInfo->qid)
        ->get();

        $pdf = PDF::loadView('pdf.quotationInfo', compact('quotationInfo','quotation'));
        return $pdf->stream();
    }



}
