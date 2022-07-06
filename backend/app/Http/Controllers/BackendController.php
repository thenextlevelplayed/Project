<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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

    function erp(){
        //進銷存
        return view('main.erp');
    }
    function purchase(){
        //進銷存-進貨
        return view('erp.purchase');
    }
    function purchaseCreate(){
        //進銷存-新增進貨
        return view('erp.purchaseCreate');
    }
    function sales(){
        //進銷存-銷貨
        return view('erp.sales');
    }
    function stock(){
        //進銷存-庫存
        return view('erp.stock');
    }

    function quote(){
        //報價
        return view('main.quote');
    }
    function quotePDF(){
        //報價
        return view('main.quotePDF');
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
        //訂單管理
        return view('order.orderEdit');
    }

    function manufacture(){
        //製造
        return view('main.manufacture');
    }

    function delivery(){
        
        //出貨
        return view('main.delivery');
    }

    function deliveryInfo($deliveryId){
        
        //檢視出貨
        // $d = Employee::find($deliveryId);
        // $d->all();
        // $employeeDetails = Employee::all();
        // return view('main.delivery', compact('d'));
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

    function customerStore(Request $request){
        
        //新增客戶資料
        $var1 = $request->input('var1');
        $var2 = $request->input('var2');
        return view('customer.customerAdd');
    }


    

}
