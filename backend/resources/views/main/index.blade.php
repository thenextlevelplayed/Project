{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')

@endsection

@section('navTitle')

@endsection


@section('content')

<div class = "container-fluid vh100">
    <div class = "mainView">
        <h2>歡迎回來，{{ Session::get('name') }}<br>請點選左方選單列按鈕開始使用！</h2>
        <img src="\assets\img\teamwork.png" alt="">
    </div>
</div>


@endsection
