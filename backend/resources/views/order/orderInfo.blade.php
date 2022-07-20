{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">訂單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入訂單編號或客戶名稱">
@endsection

{{-- 內容代入 --}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 訂單明細</h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3">
                                    <h5>||　客戶資訊</h5>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>訂單編號</p></div>
                                            <div class="col-lg-8">{{$orderInfo->oid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司名稱</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cname}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司統編</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">{{$orderInfo->ctel}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>訂單日期</p></div>
                                            <div class="col-lg-8">{{$orderInfo->odate}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人</p></div>
                                            <div class="col-lg-8">{{$orderInfo->qcontact}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人LINE ID</p></div>
                                            <div class="col-lg-8">{{$orderInfo->clineid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡信箱</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cmail}}</div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h5>||　訂單明細</h5>
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
                                            @foreach ($quotation as $key => $item)
                                                
                                                                                           
                                                <tr>
                                                    <th scope="row">{{$loop->index + 1}}</th>
                                                    <td>{{$item->mname}}</td>
                                                    <td>{{$item->mnumber}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <?php
                                                        $total=($item->quantity) * ($item->price);
                                                        echo $total;
                                                       ?></td>
                                                    <td>{{$item->remark}}</td>
                                                </tr>
                                            @endforeach 
                                                {{-- <tr>
                                                    <th scope="row">2</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr> --}}
                                                                                           
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
                                            <div class="col-lg-8">{{$orderInfo->rid}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務專員</p></div>
                                            <div class="col-lg-8">{{$orderInfo->staffid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>凱茂信箱</p></div>
                                            <div class="col-lg-8"><p>kaimoo888.gmail.com</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/order">
                    <i class="fa fa-undo"></i>&nbsp;返回
                </a>
                <a class="btn btn-primary " href="/order/pdf/view/{{$orderInfo->oid}}">
                    <i class="fa-regular fa-eye"></i> &nbsp;預覽pdf
                </a>
                <a class="btn btn-primary" href="/main/order/pdf/{{$orderInfo->oid}}">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp;匯出pdf
                </a>
            </div>
        </div>
    </div>
@endsection
