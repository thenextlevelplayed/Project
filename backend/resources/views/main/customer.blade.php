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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> 客戶管理</h4>
                </div>
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
                                        <a href="/customer/{{$customer->cid}}" class="btn" style="background: 0 ; color:black">{{$customer->cname}}
                                    </td>
                                    <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{{$customer->cid}}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
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
@endsection
                