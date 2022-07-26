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

        // return view('main.index');

        // 每個操作頁面都要判斷Session
        $account = Session::get('account', 'Guest');
        // dd($account);// gmail
        $name = Session::get('name');
        $permission = Session::get('permission');



        if ($account == 'Guest') {
            return redirect('/member/login');
        } else {
            return view('main.index',compact('name','permission'));
        }
    }

    //ERP 已經搬到 purchaseController ----Swen----- 

    
    function manufacture()
    {
        //製造
        $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();
                        
        
        return view('main.manufacture',["manufacture"=>$manufacture]);

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
