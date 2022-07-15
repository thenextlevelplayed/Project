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
    <input type="text" value="" class="form-control" placeholder="輸入出貨單號或客戶名稱">
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <form class="card">
                <div class="card-header">
                    <h4 class="card-title text-center"> 凱茂資訊 出貨單明細</h4>
                </div>                            
                <div class="card-body">
                    {{-- 客戶資訊 --}}
                    <div class="table-responsive">
                        <div  class="mb-3">
                        </div>
                        <div  class="row mb-3">
                            <div class="col-lg-6">
                                <fieldset disabled>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>出貨單編號</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset disabled>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>客戶名稱</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>出貨日期</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>發票號碼</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>收貨地址</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>聯絡人員</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>聯絡電話</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                {{-- <div class="form-check col-lg-4">
                                    <input class="form-check-input col-lg-3" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label " for="flexRadioDefault1">
                                        已出貨
                                    </label>
                                </div>
                                <div class="form-check col-lg-4">
                                    <input class="form-check-input col-lg-3" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label " for="flexRadioDefault2">
                                        未出貨
                                    </label>
                                </div> --}}
                                <div class="form-check form-check-inline col-lg-3">
                                    <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">已出貨</label>
                                </div>
                                <div class="form-check form-check-inline col-lg-3">
                                    <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">未出貨</label>
                                </div>
                            </div>
                        </div>                                    
                    </div>
                    <div class="row mb-3">
                        {{-- 商品明細 --}}
                        <div class="col-lg-12">
                            <h5>商品明細</h5>
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
                                        <tr>
                                            <th scope="row">1</th>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <input type="text" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <input type="text" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            <td> <input type="text" class="form-control" required></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-2"><p>總計</p></div>
                                <fieldset disabled>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" required>
                                    </div>
                                </fieldset>
                                
                            </div>                                 
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <h4>凱茂方案</h4>
                        </div>
                        <div  class="row mb-3">
                            <div class="col-lg-6">
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <p>企業方案</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>業務專員</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>凱茂信箱</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary " href="/main/delivery">
                <span>返回</span>
            </a>
            <a class="btn btn-primary " href="/main/delivery/1">
                <span>預覽</span>
            </a>
            <a class="btn btn-primary" href="/main/delivery">
                <span>存檔</span>
            </a>

        </div>
    </div>
@endsection
