{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
<link rel="stylesheet" href="/css/deliveryInfoEdit.css">
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">出貨單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    
@endsection

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form class="card" method="post" action="/delivery/edit/{{ $deliveryInfo->did }}">
                        @csrf
                        @method('PUT')
                        {{-- 客戶資訊 --}}
                        <div class="container p-5">

                            <div class="table-responsive">
                                <div class="col-md-12 card-title text-center">
                                    <h3>楷模資訊 出貨單資訊</h3>
                                </div>
                                <div class="container-fluid row justify-content-end" style="padding-right: 0px">
                                    <?php
                                                if($deliveryInfo->dstatus == 'Y'){
                                                ?>
                                        <div class="form-check form-check-inline col-lg-3">
                                                <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Y" checked>
                                                <label class="form-check-label" for="inlineRadio1">已出貨</label>
                                        </div>
                                        <div class="form-check form-check-inline col-lg-3">
                                                <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N" >
                                                <label class="form-check-label" for="inlineRadio2">未出貨</label>
                                        </div>
                                                <?php
                                                }
                                                elseif($deliveryInfo->dstatus == 'N' or $deliveryInfo->dstatus ==''){
                                                ?>
                                        <div class="form-check form-check-inline col-lg-3">
                                                <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Y" >
                                                <label class="form-check-label" for="inlineRadio1">已出貨</label>
                                        </div>
                                        <div class="form-check form-check-inline col-lg-3">
                                                <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N" checked>
                                                <label class="form-check-label" for="inlineRadio2">未出貨</label>
                                        </div>
                                                <?php
                                                        }
                                                    ?>   
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">出貨單編號</label>
                                            <input class="form-control" type="text" value="{{$deliveryInfo->drownumber}}"
                                                readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">收貨地址</label>
                                            <input class="form-control" type="text" value='<?php if($deliveryInfo->daddress == null){
                                                echo $deliveryInfo->caddress;
                                            }else{
                                                echo $deliveryInfo->daddress;
                                            }?>' name="daddress" >
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶名稱</label>
                                            <input class="form-control" type="text" value='<?php if($deliveryInfo->dcontact == null){
                                                echo $deliveryInfo->director;
                                            }else{
                                                echo $deliveryInfo->dcontact;
                                            }?>' name="dcontact"  >                  
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">聯絡人員</label>
                                            <input class="form-control" type="text" value='<?php if($deliveryInfo->daddress == null){
                                                echo $deliveryInfo->director;
                                            }else{
                                                echo $deliveryInfo->dcontact;
                                            }?>' name="dcontact"  >
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">出貨日期</label>
                                            <input class="form-control" type="date" value='{{$deliveryInfo->ddate}}' name="ddate" >            
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">聯絡電話</label>
                                            <input class="form-control" type="text" value='<?php if($deliveryInfo->daddress == null){
                                                echo $deliveryInfo->ctel;
                                            }else{
                                                echo $deliveryInfo->dtel;
                                            }?>' name="dtel"  >                                               
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">發票號碼</label>
                                            <input type="text" value='' name="" >            
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        </div>

                                               
                                    </div> --}}                                    
                                </div>                                    
                            </div>
                            <div class="row mb-3">
                                {{-- 商品明細 --}}
                                <div class="col-lg-12 mt-5">
                                    <h5>商品明細</h5>
                                    <hr>
                                </div>
                                <div class="col-lg-12"> 
                                    <div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">商品名稱</th>
                                                    <th scope="col">商品型號</th>
                                                    <th scope="col">數量</th>
                                                    <th scope="col">單價</th>
                                                    <th scope="col">小計</th>
                                                    <th scope="col">稅額</th>
                                                    <th scope="col">備註</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($detaillistInfo as $key => $deliveryInfo)
                                                
                                            
                                                <tr>
                                                    <th scope="row">{{$loop->index+1}}</th>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value='{{$deliveryInfo->mname}}' required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value='{{$deliveryInfo->mspecification}}' required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value='{{$deliveryInfo->quantity}}'  required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value='{{number_format($deliveryInfo->price)}}'  required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value=<?php echo number_format($deliveryInfo->price*$deliveryInfo->quantity) ?>  required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value=<?php echo number_format(round(($deliveryInfo->price)*($deliveryInfo->quantity)*0.05)) ?>  required></fieldset></td>
                                                    <td> <fieldset disabled><input type="text" class="form-control" value='{{$deliveryInfo->remark}}'></fieldset></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table> 
                                    </div>
                                        <div class="row mb-1 justify-content-end">
                                                <div class="col-lg-1"><p class="pt-1">總計</p></div>                                        
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" value =
                                                        <?php   $amount = 0; 
                                                            foreach ($detaillistInfo as $key => $deliveryInfo){
                                                                
                                                                $total = ($deliveryInfo->price)*($deliveryInfo->quantity)*1.05;
                                                                $amount = $amount+$total;
                                                            }
                                                            echo number_format(round($amount));
                                                        ?>  readonly >
                                                    </div>                                    
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <a class="btn btn-primary " href="/main/delivery">
                                    <span><i class="fa fa-undo"></i>&nbsp;返回</span>
                                </a>
                                <a class="btn btn-primary " href="/main/delivery/{{$deliveryInfo->did}}">
                                    <span><i class="fa-regular fa-eye"></i> &nbsp;預覽</span>
                                </a>
                                <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;存檔</button>
                                {{-- <a class="btn btn-primary" href="/main/delivery">
                                    <span>存檔</span>
                                </a> --}}
                    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

@endsection
