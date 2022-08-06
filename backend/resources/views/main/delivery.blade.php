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
<input type="search"  class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">                                    
        <i class="now-ui-icons ui-1_zoom-bold"></i>       
    </span>
@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title"> 出貨單管理</h4> --}}
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
                                    查看/編輯
                                </th>
                                <th>
                                    出貨狀態
                                </th>
                            </thead>
                            <tbody>
                            @foreach ($d as $delivery)
                                
                           
                                <tr>
                                    {{-- {{$d->firstName}} --}}
                                    <td><a href="/delivery/{{$delivery->did}}" >{{$delivery->drownumber}}</a></td>
                                    {{-- {{$d->firstName}} --}}
                                    <td>{{$delivery->cname}}</td>
                                     <td >
                                        <div class="btn-group" <?php if($delivery->dstatus == 'Y'){ echo 'hidden';} ?>>
                                            <a href = "/delivery/edit/{{$delivery->did}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></button>
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



@endsection

