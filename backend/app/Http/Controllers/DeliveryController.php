<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Detaillist;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class DeliveryController extends Controller
{
    function delivery(Request $request)
    {
        $permission = Session::get('permission');



        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {
            $d = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
                ->join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->where('cname', 'LIKE', '%' . $search_text . '%')
                ->orWhere('drownumber', 'LIKE', '%' . $search_text . '%')
                ->orderby('delivery.did')
                ->get();
        } else {
            $d = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
                ->join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->select('*')
                ->orderby('delivery.did')
                ->get();
        };
        // Delivery::all() 為二維陣列 要用foreach
        // 接上一張表主鍵的表,上張表主鍵,'=',目前這張表和上一張相同主鍵
        // foreach ($d as $key => $delivery) {
        //     $did = $delivery->did;



        //     // 形成流水編號
        //     if ($did < 10) {
        //         $did = '00' . $did;
        //         $date = $delivery->qdate;
        //         $date = preg_replace('/-/', '', $date);
        //         $did = 'KMD-' . $date . $did;
        //     } elseif ($did >= 10 && $did < 100) {
        //         $did = '0' . $did;
        //         $date = $delivery->qdate;
        //         $date = date("Ymd", $date);
        //         $did = 'KMD-' . $date . $did;
        //     } elseif ($id = 100) {
        //         $did = $did;
        //         $date = $delivery->qdate; //string
        //         $did = 'KMD-' . $date . $did;
        //     } elseif ($did > 100) {
        //         trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
        //     }
        //     array_push($number, $did);
        // }

        if ($permission == 4 or $permission == 1) {
            return view('main.delivery', compact('d', 'permission')); //permission
        } else {
            return view("main.index");
        }
    }

    function deliveryInfo($deliveryId)
    {
        //Join Delivery 資料
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);

        // dd($deliveryInfo->did);

        //Join Detaillist 資料
        $detaillistInfo = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
            ->select('*')
            ->where('detaillist.oid', '=', $deliveryInfo->oid)
            ->get();

        // dd($deliveryInfo->drownumber);


        $permission = Session::get('permission');
        if ($permission == 4 or $permission == 1) {
            return view('delivery.deliveryInfo', compact('deliveryInfo', 'detaillistInfo', 'deliveryId'));
        } else {
            return view("main.index");
        }
    }

    public function deliveryInfoEdit($deliveryId)
    {
        //Join Delivery 資料
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);

        //Join Detaillist 資料
        $detaillistInfo = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
            ->select('*')
            ->where('detaillist.oid', '=', $deliveryInfo->oid)
            ->get();

        $permission = Session::get('permission');
        if ($permission == 4 or $permission == 1) {
            return view('delivery.deliveryInfoEdit', compact('deliveryInfo', 'detaillistInfo'));
        } else {
            return view("main.index");
        }
    }

    public function deliveryInfoUpdate(Request $request, $deliveryId)
    {
        //Join Delivery 資料
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);

        //更新 Delivery 資料
        $deliveryInfo->dcontact = $request->dcontact;
        $deliveryInfo->dtel = $request->dtel;
        $deliveryInfo->daddress = $request->daddress;
        $deliveryInfo->ddate = $request->ddate;

        // 判斷出貨按鈕
        if ($request->inlineRadioOptions == 'Y') {
            $deliveryInfo->dstatus = 'Y';
        } else ($deliveryInfo->dstatus = 'N');

        //儲存
        $deliveryInfo->save();
        return redirect("/main/delivery");
    }

    public function createPDF($deliveryId)
    {
        //Join Delivery 資料
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);

        //Join Detaillist 資料
        $detaillistInfo = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
            ->select('*')
            ->where('detaillist.qid', '=', $deliveryInfo->qid)
            ->get();

        $pdf = PDF::loadView('pdf.deliveryinfo', compact('deliveryInfo', 'detaillistInfo'));
        return $pdf->download();
    }

    public function viewPDF($deliveryId)
    {
        //Join Delivery 資料
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);

        //Join Detaillist 資料
        $detaillistInfo = Detaillist::join('quotation', 'quotation.qid', '=', 'detaillist.qid')
            ->select('*')
            ->where('detaillist.qid', '=', $deliveryInfo->qid)
            ->get();



        $pdf = PDF::loadView('pdf.deliveryinfo', compact('deliveryInfo', 'detaillistInfo'));
        return $pdf->stream();
    }

    //寄信
    public function upload(Request $request, $id)
    {

        //信件明細
        $data = array(
            'addressee' => $request->addressee, //收件人
            'email' => $request->email, //收件人email
            'subject' => $request->subject, //主旨
            'content' => $request->content, //寄信內容
        );
        $name = $request->file('file')->getClientOriginalName(); //檔案
        $request->file->move(public_path('files'), $name); // 將檔案搬到public\images
        $path = base_path('public/files'); //檔案搬到的路徑
        // dd($path);
        // https://laravel.com/api/5.8/Illuminate/Http/UploadedFile.html

        Mail::send('email.deliveryMail', compact('data'), function ($message) use ($data, $name, $path) { //Mail::send(html畫面,夾帶的資料,回呼函式 使用 許多物件)
            $message->to($data['email'])->subject($data['subject']); //$message->to(收件人email)->subject(主旨);
            $message->attach($path . "\\" . $name); // $message->attach(夾帶檔案的路徑)
        });

        // dd(Mail::failures());
        File::delete($path . "\\" . $name); //刪除檔案

        return redirect('/main/delivery');
    }
}

///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me
function generateid($id, $date, $head)
{
    if ($id < 10) {
        $id = '00' . $id;
        // $date=$delivery->qdate;
        $date = preg_replace('/-/', '', $date);

        $id = "{$head}" . '-' . $date . $id;
        return $id;
    } elseif ($id >= 10 && $id < 100) {
        $id = '0' . $id;
        // $date=$delivery->qdate;
        $date = preg_replace('/-/', '', $date);

        $id = "{$head}" . '-' . $date . $id;
        return $id;
    } elseif ($id = 100) {
        $id =  $id;
        // $date=$delivery->qdate;
        $date = preg_replace('/-/', '', $date);
        $id = "{$head}" . '-' . $date . $id;
        return $id;
    } elseif ($id > 100) {
        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
    }
}
//現在時間
$unix = strtotime(date('Ymd'));
$utc8 = $unix + 28800;
$date = date("Ymd", $utc8);
$date_ = date("Y-m-d", $utc8);
$number = 0;

//同一天生成的訂單給num++方式流水號

$count = DB::select("SELECT count(qdate) FROM `quotation` WHERE qdate = '$date_' ");
foreach ($count[0] as $qdatecount) {
}

$number = $qdatecount + 1; // 報價單流水編號
$head = 'KMD';
// echo generateid($number,$date,$head).'<br />';
///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me///copy me