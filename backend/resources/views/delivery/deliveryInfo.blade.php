
{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
<link href="/css/deliveryInfo.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">出貨單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入出貨單號或客戶名稱">
@endsection

<style>
    @font-face {
    font-family: 'NotoSansTC-Black';
    font-style: normal;
    font-weight: normal;
    src: url({{ storage_path('fonts/NotoSansTC-Black.otf') }}) format('truetype');
    }
    body {
    font-family: NotoSansTC-Black, DejaVu Sans,sans-serif;
}
</style>

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container-xl">
                    <div class="customerInfo">
                        <h4 class="text-center">凱 茂 資 訊 股 份 有 限 公 司 出 貨 單</h4>
                    
                        {{-- 出貨日期 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>出貨日期：{{$deliveryInfo->ddate}}</span></div>                                        
                        </div>
                        {{-- 客戶名稱 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>客戶名稱：{{$deliveryInfo->cname}}</span></div>                                        
                        </div>
                        {{-- 收貨地址 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>收貨地址：{{$deliveryInfo->caddress}}</span></div>                                        
                        </div>
                        {{-- 聯絡人 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>聯絡人員：{{$deliveryInfo->qcontact}}</span></div>                                        
                        </div>
                        {{-- 聯絡電話 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>聯絡電話：{{$deliveryInfo->ctel}}</span></div>
                            
                        </div>
                        {{-- 出貨編號 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>出貨編號：{{$deliveryInfo->did}}</span></div>                                        
                        </div>
                        {{-- 發票號碼 --}}
                        <div class="row row-cols-auto">
                            <div class="col pl-5 ml-5 mt-3"><span>發票號碼：</span></div>                                        
                        </div>
                    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        商品名稱
                                    </th>
                                    <th>
                                        商品型號
                                    </th>
                                    <th>
                                        數量
                                    </th>
                                    <th>
                                        單價
                                    </th>
                                    <th>
                                        小計
                                    </th>
                                    <th>
                                        稅額
                                    </th>
                                    <th>
                                        備註
                                    </th>                    
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- {{$d->firstName}} --}}
                                        {{-- {{$d->firstName}} --}}
                                        <td>{{$deliveryInfo->mname}}</td>
                                        <td>{{$deliveryInfo->mspecification}}</td>
                                        <td name="quantity">
                                            {{$deliveryInfo->quantity}}
                                        </td>
                                        <td name="price">{{$deliveryInfo->price}}</td>
                                        <td name="total">
                                            <?php
                                                $total = ($deliveryInfo->quantity)*($deliveryInfo->price);
                                                echo $total;
                                            ?></td>
                                        <td name="tax">
                                            <?php
                                                $total = ($deliveryInfo->quantity)*($deliveryInfo->price);
                                                $tax = $total*0.05;
                                                echo round($tax);
                                            ?></td>
                                        </td>
                                        <td name="remark"> Ай-ай-ай-ай-ай, что сейчас произошло!</td>
                                    
                                    </tr>
                                    <tr>
                                        <td>beepbeep</td>
                                        <td>華碩</td>
                                        <td name="quantity">
                                            87
                                        </td>
                                        <td name="price">87777</td>
                                        <td name="total">8787878787</td>
                                        <td name="tax">8787878787</td>
                                        <td name="remark">8787878787</td>
                                    </tr>
                                    <tr>
                                        <td>beepbeep</td>
                                        <td>華碩</td>
                                        <td name="quantity">
                                            87
                                        </td>
                                        <td name="price">87777</td>
                                        <td name="total">8787878787</td>
                                        <td name="tax">8787878787</td>
                                        <td name="remark">8787878787</td>
                                    </tr>
                                    <tr>
                                        <td>beepbeep</td>
                                        <td>華碩</td>
                                        <td name="quantity">
                                            87
                                        </td>
                                        <td name="price">87777</td>
                                        <td name="total">8787878787</td>
                                        <td name="tax">8787878787</td>
                                        <td name="remark">8787878787</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class=" row justify-content-end">
                                <div class="col-md-1 text-center goods">總計</div>
                                <div class="col-md-2 text-center goods">87878878877</div>
                            </div>
                            <br />
                            <p class="text-center">※請協助回簽出貨單, FAX:04-23759399 or E-mail: service@kmau.com.tw ※</p>
                            <br />
                            <br />
                            <div class=" row justify-content-end">
                                <div class="col-md-4 text-center goods">收貨人簽章:   ___________________</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 按鈕 --}}
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/delivery">
                    <span>返回</span>
                </a>
                <a class="btn btn-primary " href="/delivery/pdf/view/{{$deliveryInfo->did}}">
                    <span>預覽PDF</span>
                </a>
                <a class="btn btn-primary " href="/delivery/pdf/{{$deliveryInfo->did}}">
                    <span>匯出PDF</span>
                </a>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> E-mail</h4>
                    </div>                            
                    <form class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>收件人</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>主旨</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>收件人信箱</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>內容</p>
                            </div>
                            <div class="col-lg-5">
                                <textarea name="" id="" cols="100" rows="10"></textarea>
                            </div>
                        </div>                                
                    </form>
                </div>
            </div>
            {{-- 按鈕 --}}
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>發送Email和出貨單PDF至客戶信箱</span>
                </a>
            </div>
        </div>
    </div>
@endsection

