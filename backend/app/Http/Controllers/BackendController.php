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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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

    function purchase(){
        //進銷存-進貨
        $book = book::join('bookDetail','bookDetail.bid','=','book.bid')
        ->select("book.bid","book.sName", "book.bookDate", "book.staffName","bookDetail.stockIn")
        ->get();

        return view('erp.purchase',compact("book"));
    }
    function purchaseCreate(){
        //進銷存-新增進貨
        return view('erp.purchaseCreate');
    }
    function purchaseEdit(){
        //進銷存-編輯進貨
        return view('erp.purchaseEdit');
    }
    function sales(){
        //進銷存-銷貨
        return view('erp.sales');
    }
    function stock(){
        //進銷存-庫存
        return view('erp.stock');
    }


    function quotation(){
        //報價
        $quotation = Quotation::join('customer','customer.cid','=','quotation.cid')
        ->join('rebate','rebate.rid','=','quotation.rid')
        ->join('staff','staff.staffid','=','quotation.staffid')
        ->join('detaillist','detaillist.dlid','=','quotation.dlid')
        ->select('*')
        ->get();

        // dd($quotation);

        return view('main.quotation',compact('quotation'));
    }
    function quotationCreate(){
        //新增報價單
        return view('quotation.quotationCreate');
    }
    function quotationInfo(){
        //報價資訊
        return view('quotation.quotationInfo');
    }
    function quotationEdit(){
        //報價編輯
        return view('quotation.quotationEdit');
    }


    function order(){
        //訂單
        return view('main.order');
    }
    function orderInfo(){
        //訂單管理
        return view('order.orderInfo');
    }
    function orderEdit(){
        //訂單編輯
        return view('order.orderEdit');
    }

    function manufacture(){
        //製造
        return view('main.manufacture');
    }
    function manufactureEdit(){
        //製造
        return view('manufacture.manufactureEdit');
    }

    function delivery(){
        // Delivery::all() 為二維陣列 要用foreach
        // 接上一張表主鍵的表,上張表主鍵,'=',目前這張表和上一張相同主鍵
        $delivery = Delivery::join('manufacture','manufacture.mid','=','delivery.mid')
        ->join('order','order.oid','=','manufacture.oid')
        ->select('*')
        ->get();

        dd($delivery);
        
        // $delivery = Delivery::all();
        // dd($delivery);        
        // $delivery->all();
        // $detaillist = Detaillist::all();
        // $detaillist->all();
        // dd($d);        
        //出貨
        return view('main.delivery',compact('delivery'));
    }

    function deliveryInfo($deliveryId){
        
        //檢視出貨
        // $d = book::find($deliveryId);
        // $d = book::all();
        // $d = DB::select("select * from book");
        // $d->all();
        // $employeeDetails = Employee::all();
        // return view('main.delivery', compact('d'));
        // dd($d);
        // return view('delivery.deliveryInfo' ,compact('d'));
        return view('delivery.deliveryInfo');


    }
    
    public function deliveryInfoEdit (Request $request) {
        //edit delivery
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        
        // (...) do something with $var1 and $var2
        return view('delivery.deliveryInfoEdit');
    }

    public function deliveryInfoUpdate (Request $request) {
        //edit delivery
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        
        // (...) do something with $var1 and $var2
        return view('delivery.deliveryInfoEdit');
    }

    function receipt(){
        //發票
        return view('main.receipt');
    }

    function receiptInfo($deliveryId){
        //檢視發票
        return view('receipt.receiptInfo');
    }

    function receiptInforEdit(Request $request){
        //編輯發票
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }

    function receiptInforUpdate(Request $request){
        //更新發票內容
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }


    function invoiceSomeone(Request $request){
        //開立發票
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('receipt.invoice');
    }

    
    
    function customer(){
        
        //客戶
        return view('main.customer');
    }

    function customerInfo($customerId){
        
        //檢視客戶
        return view('customer.customerInfo');
    }

    function customerInfoEdit(Request $request){
        
        //編輯客戶
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerEdit');
    }

    function customerUpdate(Request $request){
        
        //更新客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerInfo');
    }

    function customerAdd(Request $request){
        
        //新增客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerAdd');
    }

    function customerStore(Request $request){
        
        //新增客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerAdd');
    }

    public function createPDF (Request $request) {
        // return Pdf::loadFile(public_path().'/deliveryInfo.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        // PDF ::loadView ('index', '$data');
        // Retrieve all products from the db
        // $products = Product::all();
        // view()->share ('products', $products);
        // $pdf = PDF ::loadView ('index', $products);
        // return $pdf->download ('file-pdf.pdf');
        // $pdf = PDF::loadHTML('12345');
        // $json = fopen($_SERVER['DOCUMENT_ROOT'] . "\\resources\\views\delivery\deliveryinfo.blade.php", "r");
        // $json = fopen($_SERVER['DOCUMENT_ROOT'], "r");
        // $json = fopen($_SERVER['PHP_SELF'], "r");

        // 'delivery.deliveryInfo'
        $pdf = PDF::loadView('pdf.deliveryInfo', $data=[]);
        // return $pdf->download ('file-pdf.pdf');
        // dd($pdf);
        // return $pdf->stream();
    //     $pdf->loadFile(file_get_contents(base_path('resources/views/delivery/deliveryinfo.blade.php')));
        // $pdf = PDF::loadHTML("");
        return $pdf->download();
    }

    public function viewPDF (Request $request) {
        $pdf = PDF::loadView('pdf.deliveryInfo', $data=[]);
        return $pdf->stream();
    }

    
    //匯出報價PDF
    public function createQuotationPDF (Request $request) {
        $pdf = PDF::loadView('pdf.quotationInfo', $data=[]);
        return $pdf->download();
    }
    public function viewQuotationPDF (Request $request) {
        $pdf = PDF::loadView('pdf.quotationInfo', $data=[]);
        return $pdf->stream();
    }
    //匯出訂單PDF
    public function createOrderPDF (Request $request) {
        $pdf = PDF::loadView('pdf.orderInfo', $data=[]);
        return $pdf->download();
    }
    public function viewOrderPDF (Request $request) {
        $pdf = PDF::loadView('pdf.orderInfo', $data=[]);
        return $pdf->stream();
    }

}
