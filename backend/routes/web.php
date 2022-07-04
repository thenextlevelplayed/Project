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

//發票
Route::get('/main/receipt', "App\Http\Controllers\BackendController@receipt");

//客戶管理
Route::get('/main/customer', "App\Http\Controllers\BackendController@customer");


//新增報價單
Route::get('/main/quote', "App\Http\Controllers\BackendController@createQuote");



//編輯進銷存
//進貨 銷貨 庫存
//Route::post('/main/erp', "App\Http\Controllers\BackendController@editerp");

//編輯報價
Route::post('/main/quote', "App\Http\Controllers\BackendController@editQuote");

//編輯訂單
Route::post('/main/order', "App\Http\Controllers\BackendController@editOrder");

//編輯製造
Route::post('/main/manufacture', "App\Http\Controllers\BackendController@editManufacture");

//編輯出貨
Route::post('/main/delivery', "App\Http\Controllers\BackendController@editDelivery");

//編輯發票
Route::post('/main/receipt', "App\Http\Controllers\BackendController@editReceipt");

//編輯客戶管理
Route::post('/main/customer', "App\Http\Controllers\BackendController@editCustomer");



// 創建測試帳號密碼
// Route::get('/test', function(){
//     $get = member::find(2);
//     $passwd = Hash::make('123456');  
//     $get->mpwd = $passwd;
//     $get->save();
// });