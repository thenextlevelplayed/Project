<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Models\member;
use App\Models\Staff;
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
//帳號管理頁
Route::get('/member/memberInfo/{name}', "App\Http\Controllers\memberController@memberInfo");
Route::get('/member/memberEdit/{name}', "App\Http\Controllers\memberController@memberEdit");
Route::put('/member/memberEdit/{name}', "App\Http\Controllers\memberController@memberUpdate");

//管理員新增帳號
Route::get('/member/create', "App\Http\Controllers\memberController@create");




//後台主畫面
Route::get('/main', "App\Http\Controllers\BackendController@index");

//進銷存
Route::get('/main/purchase', "App\Http\Controllers\purchaseController@purchase"); //進貨單列表
Route::get('/main/purchaseCreate', "App\Http\Controllers\purchaseController@purchaseCreate"); //進貨單新增
Route::post('/purchase/supplier', "App\Http\Controllers\purchaseController@supplierPost"); //供應商查詢
Route::post('/main/purchaseCreate', "App\Http\Controllers\purchaseController@purchaseCreatePost"); //進貨單編輯更新
Route::get('/main/purchase/{purchaseID}', "App\Http\Controllers\purchaseController@purchaseInfo"); //進貨單檢視
Route::get('/purchase/edit/{purchaseID}', "App\Http\Controllers\purchaseController@purchaseEdit"); //進貨單編輯
Route::post('/purchase/mNumber', "App\Http\Controllers\purchaseController@mNumber"); //mNumber查詢
Route::put('/purchase/edit/{purchaseID}', "App\Http\Controllers\purchaseController@purchaseEditPost"); //進貨單編輯更新
Route::post('/purchase/stockIn', "App\Http\Controllers\purchaseController@stockIn"); //入庫寫入庫存表
Route::get('/main/stock', "App\Http\Controllers\purchaseController@stock"); //庫存列表
Route::get('/main/stock/{mId}', "App\Http\Controllers\purchaseController@stockInfo"); //庫存列表

//報價
Route::get('/main/quotation', "App\Http\Controllers\QuotationController@quotation"); //報價單列表
Route::get('/main/quotation/{quotationId}', "App\Http\Controllers\QuotationController@quotationInfo");  //檢視報價單
Route::get('/quotation/edit/{quotationId}', "App\Http\Controllers\QuotationController@quotationEdit"); //編輯報價單
Route::put('/quotation/edit/{quotationId}', "App\Http\Controllers\QuotationController@quotationEditPost"); //編輯報價單-明細更新

Route::get('/quotation/quotationCreate', "App\Http\Controllers\QuotationController@quotationCreate"); //新增報價單
Route::post('/quotation/quotationCreate', "App\Http\Controllers\QuotationController@quotationCreatePost"); //新增報價單處理

Route::post('/orderCreate/{quotationId}', "App\Http\Controllers\QuotationController@orderCreate"); //報價轉為訂單

//訂單
Route::get('/main/order', "App\Http\Controllers\OrderController@order"); //訂單列表
Route::get('/main/order/{orderId}', "App\Http\Controllers\OrderController@orderInfo");  //訂單檢視
Route::get('/main/order/edit/{orderId}', "App\Http\Controllers\OrderController@orderEdit"); //訂單編輯
Route::put('/main/order/edit/{orderId}', "App\Http\Controllers\OrderController@orderUpdate"); //訂單更新
Route::post('/manufacturecreate/{orderId}', "App\Http\Controllers\OrderController@ManufactureCreate"); //新增工單
Route::get('/main/order/Split/{orderId}', "App\Http\Controllers\OrderController@orderSplit"); //拆單
Route::post('/order/Split/{orderId}', "App\Http\Controllers\OrderController@orderSplitPost"); //拆單處理

//製造
Route::get('/main/manufacture', "App\Http\Controllers\ManufactureController@manufacture");
Route::get('/main/manufacture/{manufactureId}', "App\Http\Controllers\ManufactureController@manufactureInfo");  //訂單檢視
Route::get('/manufacture/edit/{manufactureId}', "App\Http\Controllers\ManufactureController@manufactureEdit");
Route::put('/manufacture/edit/{manufactureId}', "App\Http\Controllers\ManufactureController@manufactureUpdate"); //更新

Route::post('/deliveryCreate/{manufactureId}', "App\Http\Controllers\ManufactureController@deliveryCreate"); //訂單轉為出貨

Route::post('/manufacture/pComplete', "App\Http\Controllers\ManufactureController@pComplete"); //入庫寫入庫存表

//news
Route::get('/main/news', "App\Http\Controllers\NewsController@news");
Route::get('/news/edit/{newsId}', "App\Http\Controllers\NewsController@newsEdit");
Route::put('/news/edit/{newsId}', "App\Http\Controllers\NewsController@newsUpdate"); //更新
Route::get('/news/create', "App\Http\Controllers\NewsController@create"); //新增頁面
Route::post('/news', "App\Http\Controllers\NewsController@store"); //新增處理
Route::delete('/news/{newsId}', "App\Http\Controllers\NewsController@destroy"); //news 刪除


//出貨
Route::get('/main/delivery', "App\Http\Controllers\DeliveryController@delivery");
Route::get('/delivery/{deliveryId}', "App\Http\Controllers\DeliveryController@deliveryInfo");  //檢視
Route::get('/delivery/edit/{deliveryId}', "App\Http\Controllers\DeliveryController@deliveryInfoEdit"); //編輯
Route::put('/delivery/edit/{deliveryId}', "App\Http\Controllers\DeliveryController@deliveryInfoUpdate"); //編輯

//發票
Route::get('/main/receipt', "App\Http\Controllers\BackendController@receipt");
Route::get('/receipt/{deliveryId}', "App\Http\Controllers\BackendController@receiptInfo"); //檢視表單
Route::get('/receipt/edit/{deliveryId}', "App\Http\Controllers\BackendController@receiptInforEdit"); //編輯表單
Route::put('/receipt/edit/{deliveryId}', "App\Http\Controllers\BackendController@receiptInforUpdate"); //更新表單
Route::post('/receipt/create', "App\Http\Controllers\BackendController@invoiceSomeone"); //開立發票

//客戶管理
Route::get('/main/customer', "App\Http\Controllers\CustomerController@customer");
Route::get('/customer/{customerId}', "App\Http\Controllers\CustomerController@customerInfo"); //檢視表單
Route::get('/customer/edit/{customerId}', "App\Http\Controllers\CustomerController@customerInfoEdit"); //編輯表單
Route::put('/customer/edit/{customerId}', "App\Http\Controllers\CustomerController@customerUpdate"); //更新表單
Route::get('/customercreate', "App\Http\Controllers\CustomerController@customerAdd"); //檢視表單
Route::post('/customercreate', "App\Http\Controllers\CustomerController@customerStore"); //新增表單

//pdf  delivery
Route::get('/delivery/pdf/{deliveryId}', "App\Http\Controllers\DeliveryController@createPDF"); // 下載pdf
Route::get('/delivery/pdf/view/{deliveryId}', "App\Http\Controllers\DeliveryController@viewPDF"); // 預覽pdf

//pdf quotation
Route::get('/main/quotation/pdf/{quotationId}', "App\Http\Controllers\QuotationController@createQuotationPDF"); // 下載pdf
Route::get('/quotation/pdf/view/{quotationId}', "App\Http\Controllers\QuotationController@viewQuotationPDF"); // 預覽pdf

//pdf order
Route::get('/main/order/pdf/{orderId}', "App\Http\Controllers\OrderController@createOrderPDF"); // 下載pdf
Route::get('/order/pdf/view/{orderId}', "App\Http\Controllers\OrderController@viewOrderPDF"); // 預覽pdf

//pdf manufacture
Route::get('manufacture/pdf/{manufactureId}', "App\Http\Controllers\ManufactureController@createManufacturePDF"); // 下載pdf
Route::get('/manufacture/pdf/view/{manufactureId}', "App\Http\Controllers\ManufactureController@viewManufacturePDF"); // 預覽pdf

//寄信
Route::post('/getMailFile/sendMail/{id}', "App\Http\Controllers\DeliveryController@upload"); //寄信






// 創建測試帳號密碼
Route::get('/test', function () {
    $get = Staff::find(1);
    $passwd = Hash::make('123456');
    $get->password = $passwd;
    $get->save();
});
