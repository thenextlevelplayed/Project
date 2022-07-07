{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
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
                                </div>
                                <div class="col-lg-6">
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
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/receipt">
                    <span>返回</span>
                </a>
                <a class="btn btn-primary " href="#">
                    <span>匯入客戶資料</span>
                </a>
                <a class="btn btn-primary" href="/main/receipt">
                    <span>存檔</span>
                </a>
            </div>
            
            
        </div>
    </div>
@endsection

