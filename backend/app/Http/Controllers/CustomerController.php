<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer()
    {
        $d = Customer::all();

        $search_text = $_GET['query'] ?? ""; //判斷第一個變數有沒有存在，若沒有則回傳空字串
        if ($search_text != "") {
            $d = Customer::select('*')
                ->where('customer.cname', 'LIKE', '%' . $search_text . '%')
                ->get();
        } else {
            $d;
        };


        foreach($d as$key =>$customer){

        }

        // dd($customer);

        //客戶
        return view('main.customer',compact('d'));
    }

    function customerInfo($customerId)
    {
        //檢視客戶
        $customerInfo = Customer::find($customerId);
        return view('customer.customerInfo',compact('customerInfo'));
    }

    function customerInfoEdit(Request $request,$customerId)
    {
        //編輯客戶
        $customerInfo = Customer::find($customerId);
        return view('customer.customerEdit',compact('customerInfo'));
    }

    function customerUpdate(Request $request,$customerId)
    {
        //更新客戶資料
        $customerInfo = Customer::find($customerId);
        $customerInfo->cid = $request->input('cid');
        $customerInfo->cname = $request->input('cname');
        $customerInfo->ctel = $request->input('ctel');
        $customerInfo->cmail = $request->input('cmail');
        $customerInfo->caddress = $request->input('caddress');
        $customerInfo->tradecode = $request->input('tradecode');
        $customerInfo->legalletter = $request->input('legalletter');
        $customerInfo->director = $request->input('director');
        $customerInfo->fax = $request->input('fax');
        $customerInfo->salesrep = $request->input('salesrep');
        $customerInfo->instruments = $request->input('instruments');
        $customerInfo->location = $request->input('location');
        $customerInfo->clineid = $request->input('clineid');
        $customerInfo->save(); //儲存

        return view('customer.customerInfo',compact('customerInfo'));
    }

    function customerAdd(Request $request)
    {

        //新增客戶資料
        return view('customer.customerAdd');
    }

    function customerStore(Request $request)
    {

        //新增客戶資料
        $newcustomer = new Customer();
        $newcustomer->cid = $request->input('cid');
        $newcustomer->cname = $request->input('cname');
        $newcustomer->ctel = $request->input('ctel');
        $newcustomer->cmail = $request->input('cmail');
        $newcustomer->caddress = $request->input('caddress');
        $newcustomer->tradecode = $request->input('tradecode');
        $newcustomer->legalletter = $request->input('legalletter');
        $newcustomer->director = $request->input('director');
        $newcustomer->fax = $request->input('fax');
        $newcustomer->salesrep = $request->input('salesrep');
        $newcustomer->instruments = $request->input('instruments');
        $newcustomer->location = $request->input('location');
        $newcustomer->clineid = $request->input('clineid');
        $newcustomer->save();
        return redirect("/main/customer");
    }
}
