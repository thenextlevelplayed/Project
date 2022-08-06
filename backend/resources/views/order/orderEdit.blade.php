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
                <form class="card p-5" action="/main/order/edit/{{ $orderID }}" method="POST">
                    @csrf
                    @method('PUT')
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
                        <div class="col-lg-12 ">
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
                                    <tbody id="oDet">
                                        <?php $tot = 0; ?>
                                        @foreach ($quotation as $key => $item)
                                            {{-- dd($item) --}}

                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $item->mname }}</td>
                                                <td>{{ $item->mnumber }}</td>
                                                <td><input class="Oqty" type="number" min="0" name="quantity[]"
                                                        value="{{ $item->quantity }}">
                                                </td>
                                                <td>{{ number_format($item->price) }}</td>
                                                <td>
                                                    <?php
                                                    $total = $item->quantity * $item->price;
                                                    echo number_format($total);
                                                    ?>
                                                </td>
                                                <td>{{ $item->remark }}</td>
                                                <input type="hidden" value="{{ $item->dlid }}" name="dlid[]">
                                                <?php $tot += $item->quantity * $item->price; ?>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-1 text-right" style="font-size: 20px">
                                <div class="col-lg-10">
                                    <p>總計</p>
                                </div>
                                <div class="col-mb-3" id="AllTot"><?php echo number_format($tot); ?></div>
                            </div>
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
                                楷模信箱：kaimooo888.gmail.com@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-primary mr-2" href="/main/order">
                            <i class="fa fa-undo"></i>&nbsp;返回
                        </a>



                        <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary">
                            <i class="far fa-save"></i>&nbsp;存檔
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-12 text-right">
                <span>
                    <a class="btn btn-primary " href="/main/order/Split/{{ $orderID }}" <?php if ($orderEdit->ostatus == 'Y') {
                        echo 'hidden';
                    } ?>>
                        <i class="fa-solid fa-file-export"></i>&nbsp;拆單
                    </a>
                </span>
                
                <span>
                    <div class=" btn btn-primary manuC" >
                        <i class="now-ui-icons ui-2_settings-90"></i>&nbsp;轉為工單
                    </div>
                  
                </span>
                <form id="manuF" action="/manufacturecreate/{{ $orderID }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.Oqty').on('input', function() {

            let price = $(this).closest('tr').find('td').eq(3).text();
            let oNum = $(this).val();

            price = Number(price.replace(/,/g, ""));

            // console.log(price,oNum,$(this).closest('tr'));

            $(this).closest('tr').find('td').eq(4).text((oNum * price).toLocaleString('en-US'));



            //總計*********************************************
            let bodytr = $('#oDet > tr');
            let totPrice = 0;

            for (let i = 1; i <= bodytr.length; i++) {

                let tr = $(`#oDet > tr:nth-child(${i})`)
                let trPrice = tr.find('td').eq(4).text();

                trPrice = trPrice.replace(/,/g, "");

                totPrice += Number(trPrice);

            }
            $('#AllTot').text(`${totPrice.toLocaleString('en-US')}`)

        })

        $('.manuC').on('click',function(){
            $('#manuF').submit();
        })
    </script>
@endsection
