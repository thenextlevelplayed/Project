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
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-xl p-5">
                            <div class="customerInfo">
                                {{-- <h4 class="text-center">楷 模 資 訊 股 份 有 限 公 司 出 貨 單</h4> --}}
                                <div class="mb-3">
                                    <h5>客戶資訊</h5>
                                    <hr>
                                </div>
                                {{-- 出貨日期 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>統一編號：{{$customerInfo->cid}}</span></div>                                        
                                </div>
                                {{-- 客戶名稱 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>交易暗語：{{$customerInfo->tradecode}}</span></div>                                        
                                </div>
                                {{-- 收貨地址 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>開立形式：{{$customerInfo->legalletter}}</span></div>                                        
                                </div>
                                {{-- 聯絡人 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司負責人：{{$customerInfo->director}}</span></div>                                        
                                </div>
                                {{-- 聯絡電話 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司傳真：{{$customerInfo->fax}}</span></div>
                                    
                                </div>
                                {{-- 業務負責人編號 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>業務負責人：{{$customerInfo->salesrep}}</span></div>                                        
                                </div>
                                {{-- 發票號碼 --}}
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司名稱：{{$customerInfo->cname}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>LineID：{{$customerInfo->clineid}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>交易對象：{{$customerInfo->instruments}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司信箱：{{$customerInfo->cmail}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司電話：{{$customerInfo->ctel}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>公司地址：{{$customerInfo->caddress}}</span></div>                                        
                                </div>
                                <div class="row row-cols-auto">
                                    <div class="col pl-5 ml-5 mt-3"><span>通訊地址：{{$customerInfo->location}}</span></div>                                        
                                </div>
                            
                            </div>
                            <div class="col-md-12 text-right">
                                <a class="btn btn-primary " href="/main/customer">
                                    <span>返回</span>
                                </a>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
@endsection

