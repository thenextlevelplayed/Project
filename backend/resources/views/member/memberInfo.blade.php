{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')
@endsection

@section('navTitle')
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary" style="white-space: nowrap">
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
