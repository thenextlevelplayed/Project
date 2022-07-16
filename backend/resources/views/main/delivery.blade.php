{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">出貨單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入出貨單號或客戶名稱">
@endsection

@section('content')
<form action="" method="">

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> 出貨單管理</h4>
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
                                    編輯
                                </th>
                                <th>
                                    狀態
                                </th>
                            </thead>
                            <tbody>
                            @foreach ($d as $delivery)
                                
                           
                                <tr>
                                    {{-- {{$d->firstName}} --}}
                                    <td><a href="/delivery/{{$delivery->did}}" class="btn" style="background: 0 ; color:black">@foreach ($number as $id){{$id}}@endforeach</td>
                                    {{-- {{$d->firstName}} --}}
                                    <td>{{$delivery->cname}}</td>
                                     <td >
                                        <div class="btn-group">
                                            {{-- {{ url('/home') }} --}}
                                            <a href="/delivery/edit/{{$delivery->did}}" class="btn" style="background: 0 ; color:black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            </a>
                                          </div>
                                    </td>
                                    <?php
                                        if($delivery->dstatus == 'Y'){
                                    ?>
                                    <td><span class="badge bg-success">已出貨</span> </td>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($delivery->dstatus == 'N' or $delivery->dstatus == ''){
                                    ?>
                                    <td><span class="badge bg-danger">未出貨</span> </td>
                                    <?php
                                        }
                                    ?>                              
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
</form>



@endsection

