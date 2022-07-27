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
                        <form id="loginForm" action="/member/memberEdit/{{ Session::get('name') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="logoMember">
                                <img src="{{ URL::asset('assets/img/kaimo.png') }}" alt="">
                            </div>
                            <div class="p-3 justify-content-center">
                                <h3 style="color:#005BAC;text-align:center">歡迎回來，{{ Session::get('name') }}</h3>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">姓名</label>
                                <input class="form-control" type="text" value="{{$memberInfo->staffname}}" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">聯絡電話</label>
                                <input class="form-control" type="text" value="{{$memberInfo->stafftel}}" name="stafftel">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">信箱</label>
                                <input class="form-control" type="text" value="{{$memberInfo->staffmail}}" name="staffmail">
                            </div>
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary btn-block"><i class="far fa-save"></i>&nbsp;存檔</button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-danger btn-block" href="/member/memberInfo/{{ Session::get('name') }}">
                                        <i class="fa-solid fa-x"></i><span> &nbsp;取消</span>
                                    </a>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection