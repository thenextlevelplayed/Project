{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">訂單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入銷貨單號或客戶名稱">
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
                                <tr>
                                    
                                    
                                    {{--  路由方法/employees/{{$emp->id}} --}}
                                    <td>
                                        {{-- <form method="get" action="/customer/{customerId}">                                                        
                                            @csrf
                                            <a href="/customer/{customerId}" class="btn" style="background: 0 ; color:black">APPLE                                                       
                                        </form> --}}


                                        <a href="/customer/{customerId}" class="btn" style="background: 0 ; color:black">APPLE
                                    </td>
                                    <td >
                                        {{-- 路由方法/employees/{{$emp->id}} --}}
                                        {{-- <form method="post" action="/customer/edit/{customerId}"> 
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="/customer/edit/{customerId}" class="btn" style="background: 0 ; color:black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                </a>
                                            </div>                                                                                                       
                                        </form> --}}
                                        
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{customerId}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    {{-- {{$d->firstName}} --}}
                                    <td><a href="/customer/{customerId}" class="btn" style="background: 0 ; color:black">ACER</td>
                                    <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{customerId}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                                
                                    <td><a href="/customer/{customerId}" class="btn" style="background: 0 ; color:black">ASUS</td>
                                    <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{customerId}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                                
                                    <td><a href="/customer/{customerId}" class="btn" style="background: 0 ; color:black">ispan</td>
                                    <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/customer/edit/{customerId}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
                