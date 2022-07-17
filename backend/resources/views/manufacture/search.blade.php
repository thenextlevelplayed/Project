{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/manufacture">工單管理</a>
    </h4>
@endsection
@section('searchBox')

    <input type="search" value="" class="form-control" name="query" placeholder="輸入報價單號或客戶名稱">

    
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
                                    @foreach($manufacture as $manu)
                                    <tr>
                                        <td>
                                            {{$manu->mid}}
                                        </td>
                                        <td>
                                            {{$manu->cname}}
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                已完成
                                            </span>
                                        </td>
                                        <td>
                                            <a href = "/main/manufacture/edit/{{$manu->mid}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            {{$manu->dlid}}
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
