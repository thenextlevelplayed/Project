<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\Detaillist;
use App\Models\Order;
use App\Models\Manufacture;
use Barryvdh\DomPDF\Facade\Pdf;
use Svg\Tag\Rect;

class ManufactureController extends Controller
{

    function manufacture()
    {
        //製造
        $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('manufacture.mid', 'manufacture.mstatus', 'manufacture.mremark', 'customer.cname', 'manufacture.mrownumber', 'order.oid')
            ->orderBy('manufacture.mid')
            ->get();


            // $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            // ->join('quotation', 'quotation.qid', '=', 'order.qid')
            // ->join('customer', 'customer.cid', '=', 'quotation.cid')
            // ->select('manufacture.mid', 'manufacture.mstatus', 'manufacture.mremark', 'customer.cname', 'manufacture.mrownumber')
            // ->orderBy('manufacture.mid')
            // ->get();

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->select('manufacture.mid', 'manufacture.mstatus', 'manufacture.mremark', 'customer.cname', 'manufacture.mrownumber', 'order.oid')
                ->where('customer.cname', 'LIKE', '%' . $search_text . '%')
                ->orWhere('manufacture.mid', 'LIKE', '%' . $search_text . '%')
                ->orderBy('manufacture.mid')
                ->get();
        } else {
            $manufacture;
        };

        return view('main.manufacture', compact('manufacture'));
    }

    function manufactureEdit($manufactureId)
    {
        // 製造編輯
        $manuOid = Manufacture::select('oid')
            ->where('mid', '=', $manufactureId)
            ->first();

        // dd( $manuOid)

        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('manufacture.mstatus', 'manufacture.mid', 'manufacture.mDate', 'manufacture.mremark', 'manufacture.mrownumber', 'quotation.qcontact', 'customer.cname', 'customer.cmail', 'customer.cid')
            ->find($manufactureId);

        // dd($manu);

        // $dtl = Detaillist::select('*')
        //     ->where('detaillist.oid', '=', $manu->oid)
        //     ->get();

        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.pstatus', 'detaillist.dlid','detaillist.remark')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $manuOid->oid)
            ->get();

        // dd($quotation);

        return view('manufacture.manufactureEdit', compact('manu', 'quotation', 'manufactureId'));
    }


    public function manufactureUpdate(Request $request, $manufactureId)
    {
        // dd($request);

        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.qid', '=', 'quotation.qid')
            ->select('*')
            ->find($manufactureId);

        $manu->mremark = $request->mremark;
        $manu->save();

        for ($i = 0; $i < count($request->did); $i++) {
            $dtl = Detaillist::where('dlid', '=', $request->did[$i])->first();
            $dtl->remark = $request->remark[$i];
            $dtl->save();
        }

        return redirect('/main/manufacture/');
    }
    public function createManufacturePDF(Request $request, $manufactureId)
    {
        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($manufactureId);
        $dtl = Detaillist::select('*')
            ->where('detaillist.qid', '=', $manufactureId)
            ->get();

        $pdf = PDF::loadView('pdf.manufactureEdit', compact('manu', 'dtl'));
        return $pdf->download();
    }
    public function viewManufacturePDF(Request $request, $manufactureId)
    {
        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($manufactureId);
        $dtl = Detaillist::select('*')
            ->where('detaillist.qid', '=', $manufactureId)
            ->get();

        $pdf = PDF::loadView('pdf.manufactureEdit', compact('manu', 'dtl'));
        return $pdf->stream();
    }

    function deliveryCreate(Request $req, $manufactureId)
    {
        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $dDay = count(Delivery::all()->where('dcdate', '=', $day));

        //資料庫今天有幾筆
        if ($dDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $dDay += 1;
            $dDay = sprintf("%03d", $dDay);
            $KMDid =  "KMD-" .  $day . $dDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $KMDid = "KMD-" .  $day . "001";
        }

        $manufacture = Manufacture::select('*')
            ->find($manufactureId);

        $manufacture->mstatus = 'Y';
        $manufacture->save();

        //訂單新增(報價轉為訂單)

        $oid = Delivery::insert([
            'drownumber' => $KMDid,
            'dcdate' => date('Y-m-d'),
            'mid' => $manufactureId,
            'dstatus' =>  "N"
        ]);

        return redirect('/main/delivery');
    }

    function manufactureInfo($manufactureId)
    {

        // 製造編輯
        $manuOid = Manufacture::select('oid')
            ->where('mid', '=', $manufactureId)
            ->first();

        $manu = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('manufacture.mstatus', 'manufacture.mid', 'manufacture.mDate', 'manufacture.mremark', 'manufacture.mrownumber', 'quotation.qcontact', 'customer.cname', 'customer.cmail', 'customer.cid')
            ->find($manufactureId);

        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.pstatus','detaillist.remark')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $manuOid->oid)
            ->get();

        // dd($quotation);

        return view('manufacture.manufactureInfo', compact('manu', 'quotation', 'manufactureId'));
    }

    function pComplete(Request $req)
    {
        $det = Detaillist::where('dlid', '=', $req->did)->first();
        $det->pstatus = 'Y';
        $det->save();

        return response()->json(($det->save()));
    }
}
