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

//進銷存
Route::get('/main/erp', "App\Http\Controllers\BackendController@erp");

//報價
Route::get('/main/quote', "App\Http\Controllers\BackendController@quote");

//訂單
Route::get('/main/order', "App\Http\Controllers\BackendController@order");

//製造
Route::get('/main/manufacture', "App\Http\Controllers\BackendController@manufacture");

//出貨
Route::get('/main/delivery', "App\Http\Controllers\BackendController@delivery");
Route::get('/main/delivery/{deliveryId}', "App\Http\Controllers\BackendController@deliveryInfo");


//發票
Route::get('/main/receipt', "App\Http\Controllers\BackendController@receipt");

//客戶管理
Route::get('/main/customer', "App\Http\Controllers\BackendController@customer");





// 創建測試帳號密碼
// Route::get('/test', function(){
//     $get = member::find(2);
//     $passwd = Hash::make('123456');  
//     $get->mpwd = $passwd;
//     $get->save();
// });