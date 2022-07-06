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
                                        工單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        工單狀態
                                    </th>
                                    <th>
                                        編輯
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
                                            <button class = "btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            KMP20220622001
                                        </td>

                                    </tr>
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
