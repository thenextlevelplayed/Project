<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer()
    {
        $d = Customer::all();

        foreach($d as$key =>$customer){

        }

        // dd($customer);

        //客戶
        return view('main.customer',compact('d'));
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
}
