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
                                        商品編號
                                    </th>
                                    <th>
                                        商品名稱
                                    </th>
                                    <th>
                                        庫存總數量
                                    </th>
                                    <th>
                                        平均成本
                                    </th>
                                    <th>
                                        庫存總成本
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($inventory as $int)
                                        <tr>
                                            <td>
                                                <a href="/main/stock/{{ $int->mid }}">
                                                    {{ $int->mnumber }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $int->mname }}
                                            </td>
                                            <td>
                                                {{ $int->sumquantity }}
                                            </td>
                                            <td>
                                                {{ number_format(round($int->sumcost / $int->sumquantity))}}
                                            </td>
                                            <td>
                                                {{ number_format($int->sumcost) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <input type="search" class="form-control" name="query" placeholder="輸入商品編號或商品名稱">
    <span class="input-group-addon" onclick="searchform.submit()">
        <i class="now-ui-icons ui-1_zoom-bold"></i>
    </span>
@endsection
