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
                <form class="card" action="/main/quotation/edit/{{ $quotationInfo->qid }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 報價明細</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>||　客戶資訊</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>報價單編號</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->qid }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->cname }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->cid }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司電話</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->ctel }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>報價日期</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->qdate }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡人</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->qcontact }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡人LINE ID</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->clineid }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡信箱</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->cmail }}</div>
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
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->mname }}">                                                    
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->mnumber }}">
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity" value="{{ $dtl->quantity }}">
                                                </td>
                                                <td>
                                                    {{ $quotationInfo->price }}
                                                </td>
                                                <td>
                                                    <?php $total = $quotationInfo->quantity * $quotationInfo->price;
                                                    echo $total; ?>
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->remark }}">                                                    
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    {{-- 新增明細項目 --}}
                                    <div class="row mb-1">
                                        <div class="col-md-12 text-right">
                                            <input type="button" class="btn mr-3" value="新增" onclick="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-8 text-right">
                                        <p>總計</p>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <h4>||　凱茂方案</h4>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>企業方案</p>
                                        </div>
                                        <div class="col-lg-8"><input type="text" required></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>業務專員</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->staffid }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>凱茂信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p>kaimoo888.gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <a class="btn btn-primary " href="/main/quotation">
                            <span>返回</span>
                        </a>
                        <a class="btn btn-primary" href="">
                            <span>存檔</span>
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>轉為訂單</span>
                </a>
            </div>
        </div>
    </div>
@endsection
