{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
<link rel="stylesheet" href="/css/customer">
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">客戶資訊明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
<input type="search"  class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">                                    
        <i class="now-ui-icons ui-1_zoom-bold"></i>       
    </span>
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
                            <thead class=" text-primary">
                                <th>
                                    客戶名稱
                                </th>
                                <th>
                                    編輯
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($d as $customer)                               
                                <tr>
                                    <td>
                                        <a href="/customer/{{$customer->cid}}" >{{$customer->cname}}
                                    </td>
                                    <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{{$customer->cid}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></button>                                                
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mr-5 mb-3">
                            <a class="btn btn-primary" href="/customercreate">
                                <i class="now-ui-icons files_single-copy-04"></i>
                                <span>新增客戶資料</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
                