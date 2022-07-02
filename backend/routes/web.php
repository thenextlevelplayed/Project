<?php

use Illuminate\Support\Facades\Route;
use App\Models\member;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// 登入
Route::get('/', "App\Http\Controllers\memberController@login");
Route::get('/member/login', "App\Http\Controllers\memberController@login");
Route::post('/member/login', "App\Http\Controllers\memberController@loginPost");


//登出
Route::get('/member/logout', "App\Http\Controllers\memberController@logout");


//管理員新增帳號
Route::get('/member/create', "App\Http\Controllers\memberController@create");


//後台主畫面
Route::get('/main', "App\Http\Controllers\BackendController@index");




// 創建測試帳號密碼
// Route::get('/test', function(){
//     $get = member::find(2);
//     $passwd = Hash::make('123456');  
//     $get->mpwd = $passwd;
//     $get->save();
// });