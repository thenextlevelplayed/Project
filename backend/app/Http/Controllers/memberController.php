<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
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

        return Redirect::to('/main'); //只有畫面

        // $account = $req->input('account');
        // $passwd = $req->input('passwd');
        // $rememberMe = $req->input('rememberMe');

        // // $sql = member::where('maccount', $account)->first();
        // // dd($sql);

        // try {
        //     $sql = member::where('maccount', $account)->first();

        //     $pwdCheck = Hash::check($passwd, $sql->mpwd);
        //     if ($pwdCheck === true) { //密碼正確

        //         //記住我功能
        //         if ($rememberMe != null) {
        //             Cookie::queue('account', $account, 10080); // 有勾選存7天
        //             Cookie::queue('passwd', $passwd, 10080);
        //             Cookie::queue('rememberMe', 'checked', 10080);
        //         } else {
        //             Cookie::queue('account', $account, -1); // 沒勾選清除Cookie
        //             Cookie::queue('passwd', $passwd, -1);
        //             Cookie::queue('rememberMe', 'checked', -1);
        //         }

        //         //紀錄登入時間
        //         $time = Carbon::now('Asia/Taipei');
        //         $sql->mlogintime = $time;
        //         $sql->save();


        //         //登入Session記住帳號判斷
        //         Session::put('account', $account);

        //         //判斷權限 0為管理員
        //         $power = false;
        //         if ($sql->mpower == 0) {
        //             $power = true;
        //         };

        //         return Redirect::to('/main')->with('power', $power);
        //     } else {
        //         return Redirect::back()->withErrors(['帳號或密碼錯誤']);
        //     }
        // } catch (Exception $res) {
        //     return Redirect::back()->withErrors(['帳號或密碼錯誤']);
        // };
    }


    //登出
    function logout()
    {
        //紀錄登出時間
        // $account = Session::get('account');
        // $sql = member::where('maccount', $account)->first();
        // $time = Carbon::now('Asia/Taipei');
        // $sql->mlogouttime = $time;
        // $sql->save();

        // Session::forget('account');
        return redirect('/member/login'); //只有畫面
    }


    //創建帳號
    function create(){
        return view('member.create');
    }


}