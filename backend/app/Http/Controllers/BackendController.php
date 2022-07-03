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

    }

    function quote(){
        //報價

    }

    function order(){
        //訂單

    }

    function manufacture(){
        //製造

    }

    function deliver(){
        //出貨

    }

}
