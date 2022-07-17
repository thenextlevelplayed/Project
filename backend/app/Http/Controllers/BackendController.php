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

    function purchase()
    {
        //進銷存-進貨
        $book = book::select("book.bid", "book.sName", "book.bookDate", "book.staffName", "book.remark")
            ->get();

        return view('erp.purchase', compact("book"));
    }
    function purchaseCreate()
    {
        //進銷存-新增進貨

        //進貨單編號************************************************************************* 

        //今日日期跟Sql比較 (YYYY-MM-DD)
        $day = date("Y-m-d");
        //從資料庫讀取當天進貨單數量有幾筆
        $bDay = count(Book::all()->where('bDate', '=', $day));

        //最新日期是否等於今天日期
        if ($bDay > 0) {
            //計算今天有幾筆後加一

            //轉編號的format
            $day = date("Ymd");
            $bDay += 1; 
            $bDay = sprintf("%03d", $bDay);
            $bid =  "KMP" .  $day . $bDay;
        } else {
            //今天第一筆 001

            //轉編號的format
            $day = date("Ymd");
            $bid = "KMP" .  $day . "001";
        }

        //進貨單編號************************************************************************* 

        return view('erp.purchaseCreate',compact('bid'));
    }
    function purchaseInfo($purchaseID)
    {
        //進銷存-資訊進貨

        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.staffName', 'book.bookDate', 'supplier.*', 'book.remark')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Book::join("bookDetail", 'bookDetail.bid', '=', 'book.bid')
            ->join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.stockIn')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        return view('erp.purchaseInfo', compact("info", "detail"));
    }
    function purchaseEdit($purchaseID)
    {
        //進銷存-編輯進貨

        //進貨資訊
        $info = Book::join('supplier', 'supplier.sid', '=', 'book.sid')
            ->select('book.bid', 'book.staffName', 'book.bookDate', 'supplier.*')
            ->where('book.bid', '=', $purchaseID)
            ->get();

        //進貨明細資訊
        $detail = Book::join("bookDetail", 'bookDetail.bid', '=', 'book.bid')
            ->join("inventory", "inventory.mName", '=', 'bookDetail.mName')
            ->select('bookDetail.mName', 'inventory.mNumber', 'bookDetail.quantity', 'bookDetail.cost', 'bookDetail.stockIn')
            ->where('book.bid', '=', $purchaseID)
            ->get();


        return view('erp.purchaseEdit', compact("info", "detail"));
    }
    function sales()
    {
        //進銷存-銷貨
        return view('erp.sales');
    }
    function stock()
    {
        //進銷存-庫存
        return view('erp.stock');
    }


    function quotation()
    {
        //報價管理
        $quotation = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        // dd($quotation);
        return view('main.quotation', compact('quotation'));
    }
    function quotationCreate()
    {
        //新增報價單
        return view('quotation.quotationCreate');
    }
    function quotationInfo($quotationID)
    {
        //報價資訊
        $quotationInfo = Quotation::join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->where('quotation.qid', '=', $quotationID)
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

        // dd($orderInfo);
        return view('order.orderInfo', compact('orderInfo'));
    }
    function orderEdit()
    {
        //訂單編輯
        $orderedit = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();

        // dd($orderedit);
        return view('order.orderEdit', ["oe" => $orderedit]);
    }

    function manufacture()
    {
        //製造
        $manufacture = Manufacture::all();
        dd($manufacture);
        return view('main.manufacture');
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

    function delivery(Request $request)
    {
        // Delivery::all() 為二維陣列 要用foreach
        // 接上一張表主鍵的表,上張表主鍵,'=',目前這張表和上一張相同主鍵
        $d = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->select('*')
            ->get();

        $number = [];

        foreach ($d as $key => $delivery) {
            $did = $delivery->did;



            // 形成流水編號
            if ($did < 10) {
                $did = '00' . $did;
                $date = $delivery->qdate;
                $date = preg_replace('/-/', '', $date);
                $did = 'KMD-' . $date . $did;
            } elseif ($did >= 10 && $did < 100) {
                $did = '0' . $did;
                $date = $delivery->qdate;
                $date = date("Ymd", $date);
                $did = 'KMD-' . $date . $did;
            } elseif ($id = 100) {
                $did = $did;
                $date = $delivery->qdate; //string
                $did = 'KMD-' . $date . $did;
            } elseif ($did > 100) {
                trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
            }
            array_push($number, $did);
        }



        function generateid($id, $date, $head)
        {
            if ($id < 10) {
                $id = '00' . $id;
                // $date=$delivery->qdate;
                $date = preg_replace('/-/', '', $date);

                $id = "{$head}" . '-' . $date . $id;
            } elseif ($id >= 10 && $id < 100) {
                $id = '00' . $id;
                // $date=$delivery->qdate;
                $date = preg_replace('/-/', '', $date);

                $id = "{$head}" . '-' . $date . $id;
            } elseif ($id = 100) {
                $id = '00' . $id;
                // $date=$delivery->qdate;
                $date = preg_replace('/-/', '', $date);
                $id = "{$head}" . '-' . $date . $id;
            } elseif ($id > 100) {
                trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
            }
            //出貨
            return view('main.delivery', compact('delivery', 'number'));
        }
        // $did=$delivery->did;
        // $did=9999;

        // if($did<10){
        //     $did = '00'.$did;
        //     $date=$delivery->qdate;
        //     $date = preg_replace('/-/','',$date);
        //     $did= 'KMD-'.$date.$did;
        // }elseif ($did>=10 && $did<100) {
        //     $did = '0'.$did;
        //     $date=$delivery->qdate;
        //     $date = date("Ymd", $date);
        //     $did= 'KMD-'.$date.$did;
        // }elseif ($id=100) {
        //     $did = $did;
        //     $date=$delivery->qdate; //string
        //     $did= 'KMD-'.$date.$did;
        // }elseif ($did>100){
        //     trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
        // }
        // //出貨
        return view('main.delivery', compact('delivery', 'number', 'd', 'did'));
    }

    function deliveryInfo($deliveryId)
    {
        //檢視出貨
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);
        return view('delivery.deliveryInfo', compact('deliveryInfo'));
    }

    public function deliveryInfoEdit($deliveryId)
    {
        $deliveryInfo = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->find($deliveryId);


        return view('delivery.deliveryInfoEdit', compact('deliveryInfo'));
    }

    public function deliveryInfoUpdate(Request $request, $deliveryId)
    {
        //edit delivery
        // $deliveryInfo = Delivery::join('manufacture','manufacture.mid','=','delivery.mid')
        // ->join('order','order.oid','=','manufacture.oid')
        // ->join('quotation','quotation.qid','=','order.qid')
        // ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        // ->join('customer','customer.cid','=','quotation.cid')
        // ->select('*')
        // ->find($deliveryId);

        $deliveryInfo = Delivery::find($deliveryId);
        $deliveryInfo->dcontact = $request->dcontact;
        $deliveryInfo->dtel = $request->dtel;
        $deliveryInfo->daddress = $request->daddress;
        $deliveryInfo->ddate = $request->ddate;
        $deliveryInfo->daddress = $request->daddress;
        // 判斷出貨按鈕
        if ($request->inlineRadioOptions == 'Y') {
            $deliveryInfo->dstatus = 'Y';
        } else ($deliveryInfo->dstatus = 'N');

        $deliveryInfo->save();

        // (...) do something with $var1 and $var2
        return redirect('/main/delivery');
    }

    // public function update(Request $request, $id)
    // {
    //     $emp = Employee::find($id);
    //     $emp->firstName = $request->firstName;
    //     $emp->lastName = $request->lastName;
    //     $emp->save();
    //     return redirect("/employees");
    // }


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

    public function createPDF(Request $request)
    {
        $d = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        foreach ($d as $key => $delivery) {
        }
        $pdf = PDF::loadView('pdf.deliveryInfo', compact('deliveryInfo'));
        return $pdf->download();
    }

    public function viewPDF(Request $request)
    {
        $d = Delivery::join('manufacture', 'manufacture.mid', '=', 'delivery.mid')
            ->join('order', 'order.oid', '=', 'manufacture.oid')
            ->join('quotation', 'quotation.qid', '=', 'order.qid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->select('*')
            ->get();

        foreach ($d as $key => $deliveryInfo) {
            // dd($value);
            # code...
        }
        $pdf = PDF::loadView('pdf.deliveryInfo', compact('deliveryInfo'));
        return $pdf->stream();
    }


    //匯出報價PDF
    public function createQuotationPDF(Request $request)
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
    public function createOrderPDF(Request $request)
    {
        $od = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();

        foreach ($od as $key => $order) {
        }
        $pdf = PDF::loadView('pdf.orderInfo', compact('order'));
        return $pdf->download();
    }
    //預覽訂單PDF
    public function viewOrderPDF(Request $request)
    {
        $od = Order::join('quotation', 'quotation.qid', '=', 'order.oid')
            ->join('rebate', 'rebate.rid', '=', 'quotation.rid')
            ->join('staff', 'staff.staffid', '=', 'quotation.staffid')
            ->join('customer', 'customer.cid', '=', 'quotation.cid')
            ->join('detaillist', 'detaillist.dlid', '=', 'quotation.dlid')
            ->select('*')
            ->get();

        foreach ($od as $key => $order) {
        }
        $pdf = PDF::loadView('pdf.orderInfo', compact('order'));
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
