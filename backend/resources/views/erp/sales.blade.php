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
                                        出貨日期
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            KMD20220623001
                                        </td>
                                        <td>
                                            iSpan
                                        </td>
                                        <td>
                                            2022/06/12
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KMD20220623001
                                        </td>
                                        <td>
                                            華碩
                                        </td>
                                        <td>
                                            2022/06/13
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
        <a class="navbar-brand" href="">銷貨管理</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入銷貨單號或客戶名稱">
@endsection
