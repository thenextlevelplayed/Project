{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
<link rel="stylesheet" href="/css/receiptInfo.css">
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">發票明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入出貨單號或客戶名稱或發票號碼">
@endsection

@section('content')    
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 開立發票</h4>
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
                                            <div class="col-lg-3"><p>*統一編號</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" required>
                                            </div>
                                        </div>
                                    
                                    
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*交易暗語</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*開立形式</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司負責人</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司傳真</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務負責人</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-check form-check-inline col-lg-3">
                                        <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">發票已開立</label>
                                    </div>
                                    <div class="form-check form-check-inline col-lg-3">
                                        <input class="form-check-input col-lg-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">發票未開立</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset disabled>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*公司名稱</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*交易對象</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*公司信箱</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司地址</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>通訊地址</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" class="" required>
                                            </div>
                                        </div>
                                    </fieldset>
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
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
                                                <td> <fieldset disabled><input type="text" class="form-control" required></fieldset></td>
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
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/receipt">
                    <span>返回</span>
                </a>
                <a class="btn btn-primary" href="#政府API">
                    <span>開立發票</span>
                </a>
                <a class="btn btn-primary" href="#匯出PDF">
                    <span>匯出發票PDF</span>
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
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>發送Email和出貨單PDF至客戶信箱</span>
                </a>
            </div>
        </div>
    </div>
@endsection
