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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container p-3">
                            <div class="col-md-12 card-title text-center">
                                <h4>凱茂資訊 工單管理</h4>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-6">
                                    <label for="validationCustom01">工單編號</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01">客戶聯絡人</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-6">
                                    <label for="validationCustom01">客戶名稱</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01">客戶信箱</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-6">
                                    <label for="validationCustom01">客戶統編</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01">工單成立日期</label>
                                    <input class="form-control" type="text" placeholder="工單編號" readonly>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-12">
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 card-title text-center">
                                <h4>工單商品內容</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
