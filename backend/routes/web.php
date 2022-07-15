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
Route::get('/main/purchase', "App\Http\Controllers\BackendController@purchase"); //進貨單列表
Route::get('/main/purchaseCreate', "App\Http\Controllers\BackendController@purchaseCreate"); //進貨單新增
Route::get('/main/purchase/{purchaseID}', "App\Http\Controllers\BackendController@purchaseInfo"); //進貨單檢視
Route::get('/purchase/edit/{purchaseID}', "App\Http\Controllers\BackendController@purchaseEdit"); //進貨單編輯
Route::get('/main/sales', "App\Http\Controllers\BackendController@sales"); //銷貨單列表
Route::get('/main/stock', "App\Http\Controllers\BackendController@stock"); //庫存列表

//報價
Route::get('/main/quotation', "App\Http\Controllers\BackendController@quotation");
Route::get('/quotation/quotationCreate', "App\Http\Controllers\BackendController@quotationCreate"); //新增
Route::get('/main/quotation/{quotationId}', "App\Http\Controllers\BackendController@quotationInfo");  //檢視
Route::get('/quotation/edit/{quotationId}', "App\Http\Controllers\BackendController@quotationEdit"); //編輯

//訂單
Route::get('/main/order', "App\Http\Controllers\BackendController@order");
Route::get('/main/order/{orderId}', "App\Http\Controllers\BackendController@orderInfo");  //檢視
Route::get('/main/order/edit/{orderId}', "App\Http\Controllers\BackendController@orderEdit"); //編輯

//製造
Route::get('/main/manufacture', "App\Http\Controllers\BackendController@manufacture");
Route::get('main/manufacture/edit/{manufactureId}', "App\Http\Controllers\BackendController@manufactureEdit");

//出貨
Route::get('/main/delivery', "App\Http\Controllers\BackendController@delivery");
Route::get('/delivery/{deliveryId}', "App\Http\Controllers\BackendController@deliveryInfo");  //檢視
Route::get('/delivery/edit/{deliveryId}', "App\Http\Controllers\BackendController@deliveryInfoEdit"); //編輯
Route::put('/delivery/edit/{deliveryId}', "App\Http\Controllers\BackendController@deliveryInfoUpdate"); //編輯




//發票
Route::get('/main/receipt', "App\Http\Controllers\BackendController@receipt");
Route::get('/receipt/{deliveryId}', "App\Http\Controllers\BackendController@receiptInfo");//檢視表單
Route::get('/receipt/edit/{deliveryId}', "App\Http\Controllers\BackendController@receiptInforEdit"); //編輯表單
Route::put('/receipt/edit/{deliveryId}', "App\Http\Controllers\BackendController@receiptInforUpdate"); //更新表單
Route::post('/receipt/create', "App\Http\Controllers\BackendController@invoiceSomeone"); //開立發票



//客戶管理
Route::get('/main/customer', "App\Http\Controllers\BackendController@customer");
Route::get('/customer/{customerId}', "App\Http\Controllers\BackendController@customerInfo");//檢視表單
Route::get('/customer/edit/{customerId}', "App\Http\Controllers\BackendController@customerInfoEdit");//編輯表單
Route::put('/customer/edit/{customerId}', "App\Http\Controllers\BackendController@customerUpdate");//更新表單
Route::get('/customercreate', "App\Http\Controllers\BackendController@customerAdd");//檢視表單
Route::post('/customercreate', "App\Http\Controllers\BackendController@customerStore");//新增表單

//pdf test delivery
Route::get('/delivery/pdf/{deliveryId}',"App\Http\Controllers\BackendController@createPDF"); // 下載pdf
Route::get('/delivery/pdf/view/{deliveryId}',"App\Http\Controllers\BackendController@viewPDF"); // 預覽pdf

//pdf quotation
Route::get('/main/quotation/pdf/{quotationId}',"App\Http\Controllers\BackendController@createQuotationPDF"); // 下載pdf
Route::get('/quotation/pdf/view/{quotationId}',"App\Http\Controllers\BackendController@viewQuotationPDF"); // 預覽pdf

//pdf order
Route::get('/main/order/pdf/{orderId}',"App\Http\Controllers\BackendController@createOrderPDF"); // 下載pdf
Route::get('/order/pdf/view/{orderId}',"App\Http\Controllers\BackendController@viewOrderPDF"); // 預覽pdf

//pdf manufacture
Route::get('/main/manufacture/pdf/{manufactureId}',"App\Http\Controllers\BackendController@createManufacturePDF"); // 下載pdf
Route::get('/main/manufacture/pdf/view/{manufactureId}',"App\Http\Controllers\BackendController@viewManufacturePDF"); // 預覽pdf






// 創建測試帳號密碼
// Route::get('/test', function(){
//     $get = member::find(2);
//     $passwd = Hash::make('123456');  
//     $get->mpwd = $passwd;
//     $get->save();
// });