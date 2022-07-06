{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/quote">工單管理</a>
    </h4>
@endsection
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class = row>
                <div class = "col-md-6 border">
                    <p>123123</p>
                </div>
                <div class = "col-md-6 border">
                    <p>123123</p>
                </div>

            </div>

        </div>
    </div>
@endsection
