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

class ManufactureController extends Controller
{

    function manufacture()
    {
        //製造
        $manufacture = Manufacture::join('order','order.oid','=','manufacture.oid')
        ->join('quotation','quotation.qid','=','order.qid')
        ->join('customer','customer.cid','=','quotation.cid')
        ->join('detaillist','detaillist.qid','=','quotation.qid')
        
        ->select('*')
        ->orderby('mid')
        ->get();
        

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != ""){
            $manufacture = Manufacture::join('order','order.oid','=','manufacture.oid')
            ->join('quotation','quotation.qid','=','order.qid')
            ->join('customer','customer.cid','=','quotation.cid')
            ->join('detaillist','detaillist.qid','=','quotation.qid')
            ->where('cname','LIKE','%'.$search_text.'%')
            ->orWhere('detaillist.dlid','LIKE','%'.$search_text.'%')
            ->orWhere('mid','LIKE','%'.$search_text.'%')
            ->orderby('mid')
            ->get();
            
        }
        else{
            $manufacture = Manufacture::join('order','order.oid','=','manufacture.oid')
            ->join('quotation','quotation.qid','=','order.qid')
            ->join('customer','customer.cid','=','quotation.cid')
            ->join('detaillist','detaillist.qid','=','quotation.qid')
            ->select('*')
            ->orderby('mid')
            ->get();
                        
        };
        return view('main.manufacture',["manufacture"=>$manufacture]);

    }
    function manufactureEdit($manufactureId)
    {
        // 製造編輯

        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('*')
            ->find($manufactureId);

        $dtl = Detaillist::select('*')
        ->where('detaillist.qid', '=', $manufactureId)
        ->get();
        




        return view('manufacture.manufactureEdit',compact('manu','dtl'));
    }


    public function manufactureUpdate(Request $request,$manufactureId){
        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('*')
            ->find($manufactureId);

        $dtl = Detaillist::find($manufactureId);
        
        $manu->mremark = $request->mremark;
        $manu->mstatus = $request->mstatus;
        $dtl->remark = $request->remark;
        $dtl->pstatus = $request->pstatus;
        if ($request->inlineRadioOptions == 'Y') {
            $manu->mstatus = 'Y';
        } else{
            $manu->mstatus = 'N';
        }

        if ($request->pstatus == 'Y') {
            $dtl->pstatus = 'Y';
        } else{
            $dtl->pstatus = 'N';
        }
        //撈畫面的資料
        $manu->save();
        $dtl->save();
        
        
        // dd($dtl);
        return redirect('/main/manufacture/');
        

        // mstatus
        // dstatus
        // mremark
    }

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
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacture $manufacture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        //
    }
}
