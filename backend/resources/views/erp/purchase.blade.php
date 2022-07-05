{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

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
                                        入庫狀態
                                    </th>
                                    <th>
                                        入庫日期
                                    </th>
                                    <th>
                                        編輯
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
                                            2022-06-22
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                已入庫
                                            </span>
                                        </td>
                                        <td>
                                            2022-06-23
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
                    <div class="text-right mr-5 mb-3">
                        <a class="btn btn-primary" href="/main/quotePDF">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <span>新增進貨單</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection