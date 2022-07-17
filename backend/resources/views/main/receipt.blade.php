{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">發票明細</a>
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
                    <div class="card-header">
                        <h4 class="card-title"> 發票管理</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        出貨單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        發票號碼
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                    <th>
                                        狀態
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- {{$d->firstName}} --}}
                                        <td><a href="/receipt/{deliveryId}" class="btn" style="background: 0 ; color:black">KMD20220623001</td>
                                        {{-- {{$d->firstName}} --}}
                                        <td>華碩</td>
                                        <td>KMY878787</td>
                                        <td >
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/receipt/edit/{deliveryId}" class="btn" style="background: 0 ; color:black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">發票未開</span> </td>
                                    </tr>
                                    <tr>
                                        {{-- {{$d->firstName}} --}}
                                        <td><a href="/receipt/{deliveryId}" class="btn" style="background: 0 ; color:black">KMD20220623001</td>
                                        <td>華碩</td>
                                        <td>KMY878787</td>
                                        <td >
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/receipt/edit/{deliveryId}" class="btn" style="background: 0 ; color:black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">發票未開</span> </td>
                                    </tr>
                                    <tr>
                                        <td><a href="/receipt/{deliveryId}" class="btn" style="background: 0 ; color:black">KMD20220623001</td>
                                        <td>華碩</td>
                                        <td>KMY878787</td>
                                        <td >
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/receipt/edit/{deliveryId}" class="btn" style="background: 0 ; color:black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">發票已開立</span> </td>
                                    </tr>
                                    <tr>
                                        <td><a href="/receipt/{deliveryId}" class="btn" style="background: 0 ; color:black">KMD20220623001</td>
                                        <td>iSpan</td>
                                        <td>KMY878787</td>
                                        <td >
                                            <div class="btn-group">
                                                {{-- {{ url('/home') }} --}}
                                                <a href="/receipt/edit/{deliveryId}" class="btn" style="background: 0 ; color:black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">發票已開立</span> </td>
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
            
        
