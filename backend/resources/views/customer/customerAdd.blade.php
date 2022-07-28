{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection
{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">客戶資訊明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入客戶名稱">
@endsection
@section('content')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">                                            
                <div class="card-body">
                    {{-- 客戶資訊 --}}                        
                    <form class="card" action="/customercreate" method="POST" >
                        @csrf
                        <div class="col-md-12 card-title text-center">
                            <h3>楷模資訊 客戶資訊</h3>
                        </div>
                        <div class="container p-5">
                            <div class="table-responsive">
                                <div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">統一編號</label>
                                            <input class="form-control" type="text" value="" name="cid" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">交易暗語</label>
                                            <input class="form-control" type="text" value='' name="tradecode" required>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">開立形式</label>
                                            <input class="form-control" type="text" value="" name="legalletter" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司負責人</label>
                                            <input class="form-control" type="text" value='' name="director" >
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司傳真</label>
                                            <input class="form-control" type="text" value="" name="fax">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">業務負責人</label>
                                            <input class="form-control" type="text" value='' name="salesrep" >
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">LineID</label>
                                            <input class="form-control" type="text" value="" name="clineid">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司名稱</label>
                                            <input class="form-control" type="text" value='' name="cname" required>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">交易對象</label>
                                            <input class="form-control" type="text" value="" name="instruments" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司信箱</label>
                                            <input class="form-control" type="text" value='' name="cmail" required>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司電話</label>
                                            <input class="form-control" type="text" value="" name="ctel" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">公司地址</label>
                                            <input class="form-control" type="text" value='' name="caddress" required>
                                                
                                        </div>
                                    </div>  
                                    <div class="row">                                          
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">通訊地址</label>
                                            <input class="form-control" type="text" value='' name="location" >
                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-primary" type="submit" href="/main/customer">
                                        <span><i class="fa fa-undo"></i>&nbsp;返回</span>
                                    </a>
                                    <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary">
                                        <i class="far fa-save"></i>&nbsp;存檔
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>                        
                </div>
            </div>              
        </div>
    </div>

@endsection