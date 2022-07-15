{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">報價資訊</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 報價明細</h4>
                    </div>  
                    @foreach ($quotationInfo as $qI)                          
                        <div class="card-body">
                            <div class="table-responsive">
                                <div  class="mb-3">
                                    <h5>||　客戶資訊</h5>
                                </div>
                                <div  class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>報價單編號</p></div>
                                            <div class="col-lg-8">{{$qI->qid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司名稱</p></div>
                                            <div class="col-lg-8">{{$qI->cname}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司統編</p></div>
                                            <div class="col-lg-8">{{$qI->cid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">{{$qI->ctel}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>報價日期</p></div>
                                            <div class="col-lg-8">{{$qI->qdate}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人</p></div>
                                            <div class="col-lg-8">{{$qI->qcontact}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人LINE ID</p></div>
                                            <div class="col-lg-8">{{$qI->clineid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡信箱</p></div>
                                            <div class="col-lg-8">{{$qI->cmail}}</div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <h5>||　報價明細</h5>
                                </div>
                                <div class="col-lg-12"> 
                                    <div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">商品名稱</th>
                                                    <th scope="col">商品編號</th>
                                                    <th scope="col">數量</th>
                                                    <th scope="col">單價</th>
                                                    <th scope="col">小計</th>
                                                    <th scope="col">備註</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>                                                
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$qI->mname}}</td>
                                                    <td>{{$qI->mnumber}}</td>
                                                    <td>{{$qI->quantity}}</td>
                                                    <td>{{$qI->price}}</td>
                                                    <td></td>
                                                    <td>{{$qI->remark}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>                                            
                                            </tbody>
                                        </table> 
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-8 text-right"><p>總計</p></div>
                                        <div class="col-lg-4"></div>
                                    </div>                                 
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <h4>||　凱茂方案</h4>
                                </div>
                                <div  class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>企業方案</p></div>
                                            <div class="col-lg-8">{{$qI->rid}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務專員</p></div>
                                            <div class="col-lg-8">{{$qI->staffid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>凱茂信箱</p></div>
                                            <div class="col-lg-8"><p>kaimoo888.gmail.com</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/quotation/pdf/view/{quotationId}">
                    <span>預覽PDF</span>
                </a>
                <a class="btn btn-primary" href="/main/quotation/pdf/{quotationId}">
                    <span>匯出PDF</span>
                </a>
            </div>
        </div>
    </div>
@endsection