<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
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
    //報價管理
    function quotation()
    {
        $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();
            
            $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
            if ($search_text != "") {
                $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
                ->select('*')
                    ->where('quotation.qrownumber', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('customer.cname', 'LIKE', '%' . $search_text . '%')
                    ->orderBy('quotation.qrownumber')
                    ->get();
            } else {
                $quotation;
            };
    

        return view('main.quotation', compact('quotation'));
    }    
    
    //報價單資訊
    function quotationInfo($quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->find($quotationId);
        
        // 根據qid撈每一張報價單的明細
        $quotation = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
        ->select('*')
        ->where('detaillist.qid', '=', $quotationInfo->qid)
        ->get();

        return view('quotation.quotationInfo', compact('quotationInfo','quotation'));
    }

    //報價單編輯
    function quotationEdit($quotationId)
    {
        // 撈客戶資訊 楷模方案的資料
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
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

    // 報價單明細修改
    function quotationEditPost(Request $req, $quotationId)
    {
        // 1.Drop 掉全部
        Quotation::select('*')
            ->where('quotation.qid', '=', $quotationId)
            ->delete();
        // 2.重新新增
        for ($i = 0; $i < count($req->mName); $i++) {

            $mid = Material::select('mid')
                ->where('mname', '=', $req->mName[$i])
                ->first();

            Quotation::insert([
                'qid' => $quotationId,
                'mname' => $req->mName[$i],
                'quantity' => $req->quantity[$i],
                'cost' => $req->cost[$i],
                'mid' => $mid->mid,
                'pstatus' => $req->pStatus[$i]
            ]);
        }

        return redirect("/main/quotation/$quotationId");
    }

    //新增報價單 依照當日日期產生流水號
    function quotationCreate()
    {
        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $qDay = count(Quotation::all()->where('qdate', '=', $day));

        //資料庫今天有幾筆
        if ($qDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $qDay += 1;
            $qDay = sprintf("%03d", $qDay);
            $KMQid =  "KMQ" .  $day . $qDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $KMQid = "KMQ" .  $day . "001";
        }
        return view('quotation.quotationCreate', compact('KMQid'));
    }

    //新增的報價單內容寫入資料庫
    function quotationCreatePost(Request $req)
    {

        // dd($req);
        // 報價單號
        $qid = Quotation::insertGetId([
            'qdate' => date("Y-m-d"),
            'cid' => $req->cid,
            'qcontact' => $req->qcontact,
            'cmail' => $req->cmail,
            'staffid' => $req->staffid,
            'rid' => $req->rid,
            'qstatus' => $req->qstatus,
            'qrownumber' => $req->KMQid,
        ]);

        // dd( $req->mname[0]);
        // 報價單的明細內容(i項)
        for ($i = 0; $i < count($req->mname); $i++) {

            $iid = Inventory::select('*')
                ->where('mname', '=', $req->mname[$i])
                ->first();

                // dd($iid);

            Detaillist::insert([
                'qid' => $qid,
                'mname' => $req->mname[$i],
                'quantity' => $req->quantity[$i],
                'price' => $req->price[$i],
                'iid'=>$iid->iid,
                'mspecification' =>$iid->mspecification,
                'mnumber' =>$iid->mnumber
            ]);
        };

        return redirect('/main/quotation');
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
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
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
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
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