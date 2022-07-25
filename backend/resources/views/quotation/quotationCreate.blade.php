{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">新增報價單</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 報價單</h4>
                    </div>                            
                    <div class="card-body">
                        <div class="table-responsive">
                            <div  class="mb-3">
                                <h5>客戶資訊</h5>
                            </div>
                            <div  class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>報價單編號</p></div>
                                        <div class="col-lg-8">
                                            {{ $KMQid }}
                                            <input type="hidden" value="{{ $KMQid }}" name="KMQid">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>公司名稱</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>公司統編</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>公司電話</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>報價日期</p></div>
                                        <div class="col-lg-8">
                                            <input type="date" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>聯絡人</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>聯絡LINE ID</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>聯絡信箱</p></div>
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
                                    <table class="table" id="quotationtable">
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
                                            <tr>
                                                <th scope="row">4</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
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
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <h4>凱茂方案</h4>
                            </div>
                            <div  class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-12">
                                            <p>企業方案</p>
                                        </div>
                                        <div class="col-lg-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>業務專員</p></div>
                                        <div class="col-lg-8">
                                            <input type="text" class="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3"><p>凱茂信箱</p></div>
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
            <div class = "row container justify-content-center">
                <div class="col-md-3 p-1">
                    <a href="/main/quotation">
                        <button type="submit" id="okOrCancel" class="btn btn-primary btn-block" >
                            <i class="far fa-save"></i>&nbsp; 新增存檔
                            {{-- 按下btn後，返回報價單管理頁面，並在報價單管理頁面新增一筆報價單資料 --}}
                        </button>
                    </a>                            
                </div>
                <div class="col-md-3 p-1">
                    <a href='/main/quotation' class="btn btn-secondary btn-block">
                        <i class="fa-solid fa-x"></i> &nbsp; 返回
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap對話框 --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" id="okBtn" class="btn btn-primary">確定</button>
                </div>
            </div>
        </div>
    </div>
@endsection
