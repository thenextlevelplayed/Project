
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
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 40px!important;
    padding-left: 40px!important;
}
</style>

@section('content')


    <div class="row">
        <div class="col-md-12">
            <form action="/getMailFile/sendMail/{{$deliveryInfo->did}}" method="post" enctype="multipart/form-data">
            @csrf
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
                                <div class="col pl-5 ml-5 mt-3"><span>客戶名稱：{{$deliveryInfo->dcontact}}</span></div>                                        
                            </div>
                            {{-- 收貨地址 --}}
                            <div class="row row-cols-auto">
                                <div class="col pl-5 ml-5 mt-3"><span>收貨地址：{{$deliveryInfo->daddress}}</span></div>                                        
                            </div>
                            {{-- 聯絡人 --}}
                            <div class="row row-cols-auto">
                                <div class="col pl-5 ml-5 mt-3"><span>聯絡人員：{{$deliveryInfo->director}}</span></div>                                        
                            </div>
                            {{-- 聯絡電話 --}}
                            <div class="row row-cols-auto">
                                <div class="col pl-5 ml-5 mt-3"><span>聯絡電話：{{$deliveryInfo->dtel}}</span></div>
                                
                            </div>
                            {{-- 出貨編號 --}}
                            <div class="row row-cols-auto">
                                <div class="col pl-5 ml-5 mt-3"><span>出貨編號：{{$deliveryInfo->drownumber}}</span></div>                                        
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
                                    @foreach ($detaillistInfo as $deliveryInfo)
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
                                            <td name="remark"> {{$deliveryInfo->remark}}</td>
                                        
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row mb-1 justify-content-end">
                                    <div class="col-lg-2"><p class="pt-1">總計</p></div>                                        
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" value =
                                            <?php   $amount = 0; 
                                                foreach ($detaillistInfo as $key => $deliveryInfo){
                                                    
                                                    $total = ($deliveryInfo->price)*($deliveryInfo->quantity)*1.05;
                                                    $amount = $amount+$total;
                                                }
                                                echo round($amount);
                                            ?>  readonly >
                                        </div>                                    
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
            </form> 
            {{-- 按鈕 --}}
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/delivery">
                    <span>返回</span>
                </a>
                <a class="btn btn-primary " href="/delivery/pdf/view/{{$deliveryId}}">
                    <span>預覽PDF</span>
                </a>
                <a class="btn btn-primary " href="/delivery/pdf/{{$deliveryId}}">
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
                                <input type="text" class="form-control" name="addressee" value="{{$deliveryInfo->dcontact}}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>主旨</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="subject" value="出貨單" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>收件人信箱</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" value="{{$deliveryInfo->cmail}}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>內容</p>
                            </div>
                            <div class="col-lg-5">
                                <textarea name="content" id=""  cols="100" rows="10">
                                出貨單編號:{{$deliveryInfo->did}}
                                出貨日期:{{$deliveryInfo->ddate}}
                                </textarea>
                            </div>
                        </div>                                
                    </form>
                </div>
            </div>
            {{-- 按鈕 --}}
            <div class="col-md-12 text-right">
                <div class="mb-2">
                    <input type="file" name="file" accept="file/*">
                </div>
                <button class="btn btn-info" type="submit">發送信箱</button>

            </div>
        </div>
    </div>
 
@endsection


