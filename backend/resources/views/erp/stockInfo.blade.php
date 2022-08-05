@extends('main.navbar')

@section('header')
@endsection

@section('content')
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card p-5">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 庫存</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>庫存資訊</h5>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>商品編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $inventory->mnumber }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>商品名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $inventory->mname }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>商品成本總計</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ number_format($inventory->sumcost) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>商品數量總計</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $inventory->sumquantity }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-5">
                                <h5>庫存進貨明細</h5>
                                <hr>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <table class="table" id="purchaseTable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">進貨日期</th>
                                                <th scope="col">供應商名稱</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">成本</th>
                                                <th scope="col">小計</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($stockDetail as $sDtl)
                                                <tr>
                                                    <th  scope="row">{{$loop->index + 1}}</th>
                                                    <td class="col-3">
                                                        {{ $sDtl->bookdate }}
                                                    </td>
                                                    <td class="col-3">
                                                        {{ $sDtl->sname }}
                                                    </td>
                                                    <td class="col-2">
                                                        {{ $sDtl->quantity }}
                                                    </td>
                                                    <td class="col-2">
                                                        {{ number_format($sDtl->cost) }}
                                                    </td>
                                                    <td class="col-2">
                                                        {{ number_format($sDtl->quantity * $sDtl->cost) }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary mr-3" href="/main/stock">
                    <span>回上頁</span>
                </a>
                {{-- <a class="btn btn-primary mr-3" href="/purchase/edit/">
                    <span>編輯</span>
                </a> --}}
            </div>
        </div>
    </div>

    {{-- bootstrap對話框 --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" id="okBtn" class="btn btn-primary">確定</button>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">庫存管理</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')

@endsection
