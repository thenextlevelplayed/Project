{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head代入 --}}
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
                                        銷貨單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        出貨日期
                                    </th>
                                    <th>
                                        售價
                                    </th>
                                    <th>
                                        成本
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="">
                                                KMD20220623001
                                            </a>
                                        </td>
                                        <td>
                                            iSpan
                                        </td>
                                        <td>
                                            2022/06/12
                                        </td>
                                        <td>
                                            70,000
                                        </td>
                                        <td>
                                            66,666
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
        <a class="navbar-brand" href="">銷貨管理 "出貨單帶過來"</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
<input type="search"  class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">                                    
        <i class="now-ui-icons ui-1_zoom-bold"></i>       
    </span>
@endsection
