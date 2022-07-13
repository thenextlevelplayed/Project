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
    <input type="text" value="" class="form-control" placeholder="輸入工單編號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container p-5">
                            <div>
                                <div class="col-md-12 card-title text-center">
                                    <h3>凱茂資訊 工單管理</h3>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">工單編號</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">客戶聯絡人</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">客戶名稱</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">客戶信箱</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">客戶統編</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">工單成立日期</label>
                                        <input class="form-control" type="text" placeholder="工單編號" readonly>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12 mb-3">
                                        <label for="exampleFormControlTextarea1">工單備註</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">客戶施工處危險需注意安全</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <div class="col-md-12 card-title text-center">
                                    <h4>工單商品內容</h4>
                                </div>
                                <table class="table table-hover">
                                    <thead class="text-primary" style="white-space: nowrap">
                                        <th>
                                            商品名稱
                                        </th>
                                        <th>
                                            商品型號
                                        </th>
                                        <th>
                                            商品數量
                                        </th>
                                        <th>
                                            工單備註
                                        </th>
                                        <th>
                                            完成
                                        </th>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                電腦
                                            </td>
                                            <td>
                                                COMPU666
                                            </td>
                                            <td>
                                                666
                                            </td>
                                            <td>
                                                <div style="width:300px">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">電腦超重需要使用推車</textarea>
                                                </div>
                                            </td>
                                            <td style = "text-align: center">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                平板
                                            </td>
                                            <td>
                                                TABLET666
                                            </td>
                                            <td>
                                                666
                                            </td>
                                            <td>
                                                <div style="width:300px">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">平板很貴</textarea>
                                                </div>
                                            </td>
                                            <td style = "text-align: center">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" >
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            {{-- <div class = "container-fluid border">
                                <br>
                                <br>
                                <p style = "text-align: end;color:rgb(57, 57, 57)">客戶簽名：＿＿＿＿＿＿＿＿＿＿＿＿＿＿</p>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                    企業方案：<br>
                                    週年慶滿千送百
                                </div>
                                <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                    業務專員：林小姐<br>
                                    凱茂信箱：km2468@gmail.com
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5 mb-3">
                                <div class="col-md-2 p-1">
                                    <button class="btn btn-primary btn-block">
                                        <i class="fa-regular fa-eye"></i> &nbsp;預覽畫面
                                    </button>
                                </div>
                                <div class="col-md-2 p-1">
                                    <button class="btn btn-primary btn-block">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp;匯出pdf
                                    </button>
                                </div>
                                <div class="col-md-2 p-1">
                                    <button class="btn btn-primary btn-block">
                                        <i class="fa-regular fa-floppy-disk"></i> &nbsp;存檔
                                    </button>
                                </div>
                                <div class="col-md-2 p-1">
                                    <button class="btn btn-danger btn-block">
                                        <i class="fa-solid fa-x"></i> &nbsp;取消
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
