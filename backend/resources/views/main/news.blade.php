{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/news">前台最新消息管理</a>
    </h4>
@endsection
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary" style = "white-space: nowrap">
                                    <th>
                                        消息編號
                                    </th>
                                    <th>
                                        消息標題
                                    </th>

                                    <th style="width: 65%">
                                        消息內容
                                    </th>

                                    <th>
                                    查看/編輯
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($news as $n)
                                    <tr>
                                        <td>
                                            {{$n->newsid}}
                                        </td>
                                        <td>
                                            {{$n->title}}
                                        </td>
                                        <td>
                                        {{$n->content}}                         
                                        </td>
                                        <td>
                                            <a href = "/news/edit/{{$n->newsid}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></button>
                                            </a>
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
