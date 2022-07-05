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

    function manufacture(){
        //製造
        return view('main.manufacture');
    }

    function delivery(){
        
        //出貨
        return view('main.delivery');
    }

    function deliveryInfo($deliveryId){
        
        //出貨
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

    function receipt(){
        
        //發票
        return view('main.receipt');
    }

    function customer(){
        
        //客戶
        return view('main.customer');
    }


    

}
