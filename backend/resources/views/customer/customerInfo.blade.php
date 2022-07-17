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
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 客戶資訊</h4>
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
                                                <input type="text" value="{{$customerInfo->cid}}" name="cid" required>
                                            </div>
                                        </div>
                                    
                                    
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*交易暗語</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->tradecode}}" name="tradecode" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*開立形式</p></div>
                                            <div class="col-lg-8">
                                                <input type="text"  value="{{$customerInfo->legalletter}}" name="legalletter" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司負責人</p></div>
                                            <div class="col-lg-8">
                                                <input type="text"  value="{{$customerInfo->director}}" name="director" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司傳真</p></div>
                                            <div class="col-lg-8">
                                                <input type="text"  value="{{$customerInfo->fax}}" name="fax" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務負責人</p></div>
                                            <div class="col-lg-8">
                                                <input type="text"  value="{{$customerInfo->salesrep}}" name="salesrep" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>LineID</p></div>
                                            <div class="col-lg-8">
                                                <input type="text"  value="{{$customerInfo->clineid}}" name="clineid" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset disabled>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*公司名稱</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->cname}}" name="cname" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*交易對象</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->instruments}}" name="instruments"required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>*公司信箱</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->cmail}}" name="cmail"required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->ctel}}" name="ctel"required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司地址</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->caddress}}" name="caddress"required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>通訊地址</p></div>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{$customerInfo->location}}" name="location"required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/customer">
                    <span>返回</span>
                </a>
            </div>
            
            
        </div>
    </div>
@endsection

