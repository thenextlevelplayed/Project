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
    <input type="text" value="" class="form-control" placeholder="輸入銷貨單號或客戶名稱">
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
                                        訂單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        總計
                                    </th>
                                    <th>
                                        工單編號
                                    </th>
                                    <th>
                                        成立工單
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($order as $od)
                                        <tr>
                                            <td>
                                                <a href="">
                                                    {{$od->oid}}
                                            </td>
                                            <td>
                                                華碩
                                            </td>
                                            <td>
                                                9999
                                            </td>
                                            <td>
                                                KMD20220624001
                                            </td>
                                            {{-- {{$d->Did}} --}}
                                            <td>
                                                <span class="badge bg-success">
                                                    已成立訂單
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    {{-- {{ url('/home') }} --}}
                                                    <a href="/main/order/edit/1" class="btn"
                                                        style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            KMO20220623002
                                        </td>
                                        <td>
                                            iSpan
                                        </td>
                                        <td>
                                            9999
                                        </td>
                                        <td>
                                            KMD20220624002
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                已成立訂單
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/main/order/edit/1" class="btn"
                                                    style="background: 0 ; color:rgb(122, 122, 122)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KMO20220623003
                                        </td>
                                        <td>
                                            華碩
                                        </td>
                                        <td>
                                            9999
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">
                                                未完成訂單
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/main/order/edit/1" class="btn"
                                                    style="background: 0 ; color:rgb(122, 122, 122)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KMO20220624001
                                        </td>
                                        <td>
                                            Dell
                                        </td>
                                        <td>
                                            9999
                                        </td>
                                        <td>
                                            KMD20220625001
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                已成立訂單
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/main/order/edit/1" class="btn"
                                                    style="background: 0 ; color:rgb(122, 122, 122)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KMO20220624001
                                        </td>
                                        <td>
                                            Dell
                                        </td>
                                        <td>
                                            9999
                                        </td>
                                        <td></td>
                                        <td>
                                            <span class="badge bg-danger">
                                                已取消訂單
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/main/order/edit/1" class="btn"
                                                    style="background: 0 ; color:rgb(122, 122, 122)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="text-right">
                                <a class="btn btn-primary" href="">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <span>新增訂單</span>
                                </a>
                            </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
