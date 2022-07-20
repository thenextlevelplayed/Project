<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class memberController extends Controller
{
    //
    function login()
    {
        return view('member.login');
    }

    function loginPost(Request $req)
    {

        //如果要打開登入功能請註解掉此*****************
        // return view('main.index');

        // ******************************************

        $account = $req->input('account');
        $passwd = $req->input('passwd');
        $rememberMe = $req->input('rememberMe');

        // $sql = Staff::where('staffmail', 'MingMing@gmail.com')->first();
        // dd($sql->staffname);

        try {
            $sql = Staff::where('staffmail', $account)->first();
            $name = $sql->staffname;
            $pwdCheck = Hash::check($passwd, $sql->password);
            if ($pwdCheck === true) { //密碼正確

                //記住我功能
                if ($rememberMe != null) {
                    Cookie::queue('account', $account, 10080); // 有勾選存7天
                    Cookie::queue('passwd', $passwd, 10080);
                    Cookie::queue('name', $name, 10080);
                    Cookie::queue('rememberMe', 'checked', 10080);
                } else {
                    Cookie::queue('account', $account, -1); // 沒勾選清除Cookie
                    Cookie::queue('passwd', $passwd, -1);
                    Cookie::queue('name', $name, -1);
                    Cookie::queue('rememberMe', 'checked', -1);
                }

                //登入Session記住帳號判斷
                Session::put('account', $account);
                Session::put('name', $name);

                return Redirect::to('/main');

            } else {
                return Redirect::back()->withErrors(['帳號或密碼錯誤']);
            }
        } catch (Exception $res) {
            return Redirect::back()->withErrors(['帳號或密碼錯誤']);
        };
    }


    //登出
    function logout()
    {
        // 忘記Session
        Session::forget('account');
        return redirect('/member/login'); 
    }


    //創建帳號
    function create(){
        return view('member.create');
    }


}