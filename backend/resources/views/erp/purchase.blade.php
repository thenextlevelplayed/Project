{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 內容代入 --}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>
                                        進貨單編號
                                    </th>
                                    <th>
                                        進貨廠商
                                    </th>
                                    <th>
                                        進貨日期
                                    </th>
                                    <th>
                                        採購人員
                                    </th>
                                    <th>
                                        入庫進度
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($book as $bk)
                                        <tr>
                                            <td>
                                                <a href="/main/purchase/{{ $bk->bid }}">
                                                    {{ $bk->KMPid }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $bk->sName }}
                                            </td>
                                            <td>
                                                {{ $bk->bookDate }}
                                            </td>
                                            <td>
                                                {{ $bk->staffName }}
                                            </td>
                                            <td>
                                                {{ $bk->NStock }} / {{ $bk->DStock }}

                                                <?php
                                                if ($bk->NStock / $bk->DStock == 1) {
                                                    echo "<span class='badge bg-success ml-3'>已完成入庫</span>";
                                                } else {
                                                    //點集 入庫並寫入庫存表
                                                    echo "<span class='badge bg-danger ml-3'>尚未完成入庫</span>";
                                                }
                                                ?>

                                            </td>

                                            <td>
                                                <a href="/purchase/edit/{{ $bk->bid }}" <?php if ($bk->NStock / $bk->DStock == 1) {
                                                    echo 'hidden';
                                                } ?>>
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right mr-5 mb-3">
                        <a class="btn btn-primary" href="/main/purchaseCreate">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <span>新增進貨單</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">進貨管理</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="search" class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">
        <i class="now-ui-icons ui-1_zoom-bold"></i>
    </span>
@endsection
