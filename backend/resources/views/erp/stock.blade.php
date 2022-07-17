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
                                        品號
                                    </th>
                                    <th>
                                        品名
                                    </th>
                                    <th>
                                        單位
                                    </th>
                                    <th>
                                        庫存數量
                                    </th>
                                    <th>
                                        平均成本
                                    </th>
                                    <th>
                                        庫存成本
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            A000001
                                        </td>
                                        <td>
                                            筆記型電腦
                                        </td>
                                        <td>
                                            台
                                        </td>
                                        <td>
                                            15
                                        </td>
                                        <td>
                                            12,345
                                        </td>
                                        <td>
                                            185,175
                                        </td>
                                        <td class="btn btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            A000002
                                        </td>
                                        <td>
                                            伺服器
                                        </td>
                                        <td>
                                            台
                                        </td>
                                        <td>
                                            11
                                        </td>
                                        <td>
                                            66,666
                                        </td>
                                        <td>
                                            733,326
                                        </td>
                                        <td class="btn btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </td>
                                    </tr>
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
        <a class="navbar-brand" href="">庫存管理"由出貨帶過來"</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
<input type="search"  class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">                                    
        <i class="now-ui-icons ui-1_zoom-bold"></i>       
    </span>
@endsection

