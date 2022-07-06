{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/quote">工單管理</a>
    </h4>
@endsection
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary" style = "white-space: nowrap">
                                    <th>
                                        工單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        工單狀態
                                    </th>
                                    <th>
                                        查看/編輯
                                    </th>
                                    <th>
                                        出貨單號
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            KMP20220622001
                                        </td>
                                        <td>
                                            華碩
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                已完成
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            KMP20220622001
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KMP20220622001
                                        </td>
                                        <td>
                                            華碩
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">
                                                待完成
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            KMP20220622001
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
