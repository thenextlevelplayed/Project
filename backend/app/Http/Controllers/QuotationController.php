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

        // dd($quotation);
        return view('main.quotation', compact('quotation'));
    }    
    
    //報價資訊
    function quotationInfo($quotationId)
    {
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

    //報價編輯
    function quotationEdit()
    {
        return view('quotation.quotationEdit');
    }
    //新增報價單
    function quotationCreate()
    {
        return view('quotation.quotationCreate');
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



}
