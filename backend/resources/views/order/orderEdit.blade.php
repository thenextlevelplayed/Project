{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">訂單明細</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
    <input type="text" value="" class="form-control" placeholder="輸入單號或客戶名稱">
@endsection

{{-- 內容代入 --}}

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card" action="/main/order/edit/{{ $orderEdit->oid }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 訂單</h4>
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
                                            <p name="oid">訂單編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->oid }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->cname }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->cid }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>建立日期</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="date" value='{{ $orderEdit->odate }}' name="daddress" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡人</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->qcontact }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->ctel }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <h5>訂單明細</h5>
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
                                                @foreach ($quotation as  $key => $item)
                                                {{-- dd($item) --}}

                                                <tr>
                                                    <th scope="row">{{$loop->index + 1}}</th>
                                                    <td>{{$item->mname}}</td>
                                                    <td>{{$item->mnumber}}</td>
                                                    <td><input type="text" name="quantity[]" value="{{$item->quantity}}"></td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <?php
                                                        $total=($item->quantity) * ($item->price);
                                                        echo $total;
                                                       ?>
                                                    </td>
                                                    <td>{{$item->remark}}</td>
                                                    <input type="hidden" value="{{$item->dlid}}" name="dlid[]" >
                                                </tr>
                                            @endforeach 
                                                {{-- <tr>
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
                                                </tr> --}}
                                        </tbody>
                                    </table>
                                </div>


                                <div class="row mb-1 text-right">
                                    <div class="col-lg-2">
                                        <p>總計</p>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        $alltotal = $orderEdit->quantity * $orderEdit->price;
                                        echo $alltotal;
                                        ?>
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
                                            <input type="text" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>業務專員</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $orderEdit->staffname }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>凱茂信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            kaimooo888@gmail.com
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary mr-2" href="/main/order">
                                <i class="fa fa-undo"></i>&nbsp;返回
                            </a>
                            {{-- <a class="btn btn-primary mr-2" href="">
                                    <span>預覽</span>
                                </a> --}}
                            <button type="submit" id="okOrCancel" name="okOrCancel"
                                class="btn btn-primary mr-2">存檔</button>
                </form>
                {{-- <a class="btn btn-primary mr-3" href="">
                                    <span>存檔</span>
                                </a> --}}
                {{-- <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary">轉為工單</button> --}}
                <form class="form-horizontal" action="/manufacturecreate/{{ $orderEdit->oid }}" method="POST">
                    @csrf

                    <button type="submit" id="okOrCancel1" name="okOrCancel1" class="btn btn-primary">轉為工單</button>
                    {{-- <a class="btn btn-primary" href="/manufacturecreate">
                                        <span>轉為工單</span>
                                    </a> --}}
                </form>
                {{-- <a class="btn btn-danger" href="">
                                    <span>取消訂單</span>
                                </a> --}}
            </div>

        </div>


    </div>

    </div>
    </div>
@endsection
