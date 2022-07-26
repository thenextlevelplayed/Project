<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detaillist;
use App\Models\Order;
use App\Models\Manufacture;
use Barryvdh\DomPDF\Facade\Pdf;


class ManufactureController extends Controller
{

    function manufacture()
    {
        //製造
        $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('manufacture.mid', 'manufacture.mstatus', 'manufacture.mremark', 'customer.cname', 'manufacture.mrownumber')
            ->orderBy('manufacture.mid')
            ->get();

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {
            $manufacture = Manufacture::join('order', 'order.oid', '=', 'manufacture.oid')
                ->join('quotation', 'quotation.qid', '=', 'order.qid')
                ->join('customer', 'customer.cid', '=', 'quotation.cid')
                ->select('manufacture.mid', 'manufacture.mstatus', 'manufacture.mremark', 'customer.cname', 'manufacture.mrownumber')
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
            ->join('quotation','quotation.qid','=','order.qid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('manufacture.mstatus', 'manufacture.mid', 'manufacture.mDate', 'manufacture.mremark', 'quotation.qcontact', 'customer.cname', 'customer.cmail', 'customer.cid')
            ->find($manufactureId);

        // dd($manu);

        // $dtl = Detaillist::select('*')
        //     ->where('detaillist.oid', '=', $manu->oid)
        //     ->get();

        $quotation = Order::select('detaillist.mname', 'detaillist.mnumber', 'detaillist.price', 'detaillist.quantity', 'detaillist.pstatus')
            ->join('detaillist', 'detaillist.oid', '=', 'order.oid')
            ->where('order.oid', '=', $manuOid->oid)
            ->get();

        // dd($quotation);

        return view('manufacture.manufactureEdit', compact('manu', 'quotation'));
    }


    public function manufactureUpdate(Request $request, $manufactureId)
    {
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
        } else {
            $manu->mstatus = 'N';
        }

        if ($request->pstatus == 'Y') {
            $dtl->pstatus = 'Y';
        } else {
            $dtl->pstatus = 'N';
        }
        //撈畫面的資料
        $manu->save();
        $dtl->save();

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
}
