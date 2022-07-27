{{-- navbar引入 --}}
@extends('main.navbar')
<style>
    .logoMember {
        height: 250px;
        width: 100%;
    }

    .logoMember img {
        width: 100px;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
{{-- head帶入 --}}
@section('main.head')

@endsection

@section('navTitle')
@endsection


@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="logoMember">
                            <img src="{{ URL::asset('assets/img/kaimo.png') }}" alt="">
                        </div>
                        <div class="p-3 justify-content-center">
                            <h3 style="color:#005BAC;text-align:center" >歡迎回來，{{ Session::get('name') }}</h3>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">姓名</label>
                            <input class="form-control" type="text" value="{{$memberInfo->staffname}}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">聯絡電話</label>
                            <input class="form-control" type="text" value="{{$memberInfo->stafftel}}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">信箱</label>
                            <input class="form-control" type="text" value="{{$memberInfo->staffmail}}" readonly>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-12">
                                <a class="btn btn-primary btn-block" href="/member/memberEdit/{{ Session::get('name') }}">
                                    <i class="fa fa-pencil"></i><span> &nbsp;編輯</span>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection