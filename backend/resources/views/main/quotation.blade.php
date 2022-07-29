{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">報價管理</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="search" class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">
        <i class="now-ui-icons ui-1_zoom-bold"></i>
    </span>
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
                                        報價單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        狀態
                                    </th>
                                    {{-- <th>
                                    </th> --}}
                                    <th>
                                        編輯
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($quotation as $q)
                                        <tr>
                                            <td>
                                                <a href="/main/quotation/{{ $q->qid }}">{{ $q->qrownumber }}
                                            </td>
                                            <td>
                                                {{ $q->cname }}
                                            </td>
                                            {{-- <td>
                                                <input type="hidden" class="orderId" value="{{ $q->qstatus }}">
                                            </td> --}}
                                            <td>
                                                <?php
                                                
                                                if ($q->qstatus == 'Y') {
                                                    echo "<span class='badge bg-success'>已成立訂單</span>";
                                                } else {
                                                    //沒有不秀
                                                }
                                                ?>

                                                {{-- <span class="badge statusColor">
                                                    已成立訂單
                                                </span> --}}

                                            </td>
                                            <td>
                                                <a href="/quotation/edit/{{ $q->qid }}" <?php if ($q->qstatus == 'Y') {
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
                        <a class="btn btn-primary" href="/quotation/quotationCreate">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <span>新增報價單</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if ($('.orderId').val() == "Y") {
            $('.statusColor').text("已成立訂單");
            $('.statusColor').addClass("bg-success");

        } else {
            $('.statusColor').text("未成立訂單");
            $('.statusColor').addClass("bg-danger");

        }
    </script>
@endsection
