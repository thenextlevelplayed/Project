{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">訂單資訊</a>
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
                <form class="card p-5" action="/order/Split/{{ $orderEdit->oid }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title text-center">訂單管理</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>客戶資訊</h5>
                                <hr>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">訂單編號</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $orderEdit->orownumber }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">公司名稱</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->cname }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">公司統編</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->cid }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡人</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->qcontact }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">建立日期</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->odate }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡電話</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->ctel }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡人LINE ID</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->clineid }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡信箱</label>
                                        <input class="form-control" type="text" placeholder="{{ $orderEdit->cmail }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mt-5">
                            <h5>訂單明細</h5>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">商品名稱</th>
                                            <th scope="col">商品編號</th>
                                            <th scope="col">單價</th>
                                            <th scope="col">總數量</th>
                                            <th scope="col">原單數量</th>
                                            <th scope="col">拆單數量</th>
                                        </tr>
                                    </thead>
                                    <tbody id="splitDet">
                                        <?php $tot = 0; ?>

                                        @foreach ($order as $key => $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $item->mname }}</td>
                                                <td>{{ $item->mnumber }}</td>
                                                <td>{{ number_format($item->price) }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td><input type="text"class="OrigNum form-control" name="OrigNum[]"
                                                        value="{{ $item->quantity }}" readonly>
                                                </td>
                                                <td><input type="number" class="splitNum form-control" name="splitNum[]"
                                                        min="0" max="{{ $item->quantity }}" value="0"></td>
                                                <input type="hidden" value="{{ $item->dlid }}" name="dlid[]">

                                            </tr>
                                            <?php $tot += $item->price * $item->quantity; ?>
                                        @endforeach

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>原訂單</td>
                                            <td>子訂單</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>小計</td>
                                            <td> <?php echo number_format($tot); ?> &nbsp;&nbsp;-></td>
                                            <td id="OrigPrice"> <?php echo number_format($tot); ?></td>
                                            <td id="splitPrice"> 0</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="row mb-1 text-right" style="font-size: 20px">
                                <div class="col-lg-10">
                                    <p>總計</p>
                                </div>
                                <div class="col-mb-3" id="AllTot"></div>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <h4>楷模方案</h4>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                企業方案：
                            </div>
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                業務專員：{{ $orderEdit->staffname }}<br>
                                楷模信箱：kaimooo888@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-primary mr-2" href="/main/order">
                            <i class="fa fa-undo"></i>&nbsp;返回
                        </a>
                        <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary">
                            <i class="far fa-save"></i>&nbsp;拆單
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.splitNum').on('input', function() {

            let price = $(this).closest('tr').find('td').eq(2).text();
            let splitNum = $(this).val();
            let totNum = $(this).closest('tr').find('td').eq(3).text();
            let orgiNum = totNum - splitNum;

            $(this).closest('tr').find('.OrigNum').val(orgiNum);



            // 原訂單小計*********************************************
            let bodytr = $('#splitDet > tr');
            let OrigPrice = 0;
            let totPrice = 0;

            for (let i = 1; i <= bodytr.length - 2; i++) {

                let tr = $(`#splitDet > tr:nth-child(${i})`)
                let trPrice = (tr.find('td').eq(2).text()).replace(/,/g, "");
                let trNum = tr.find('.OrigNum').val();
                let totNum = tr.find('td').eq(3).text();

                OrigPrice += trPrice * trNum;
                totPrice += trPrice * totNum;
            }

            $('#OrigPrice').text(` ${OrigPrice.toLocaleString('en-US')}`)

            // 子訂單小計 = 總計 - 原訂單小計
            $('#splitPrice').text(` ${(totPrice - OrigPrice).toLocaleString('en-US')}`)

        })
    </script>
@endsection
