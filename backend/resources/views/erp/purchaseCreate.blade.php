@extends('main.navbar')

@section('header')
@endsection

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 進貨單</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>客戶資訊</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>報價單編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>報價日期</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡人</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h5>報價明細</h5>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">商品名稱</th>
                                                <th scope="col">商品編號</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">單價</th>
                                                <th scope="col">小計</th>
                                                <th scope="col">備註</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-2">
                                        <p>總計</p>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <h4>凱茂方案</h4>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-12">
                                            <p>企業方案</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>業務專員</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>凱茂信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary mr-3" href="">
                    <span>預覽</span>
                </a>
                <a class="btn btn-primary" href="">
                    <span>存檔</span>
                </a>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> E-mail</h4>
                    </div>
                    <form class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>收件人</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>主旨</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>收件人信箱</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <p>內容</p>
                            </div>
                            <div class="col-lg-5">
                                <textarea name="" id="" cols="100" rows="10"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>發送Email和報價單PDF至客戶信箱</span>
                </a>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>報價成立，轉為訂單</span>
                </a>
            </div>
        </div>
    </div>

@endsection
