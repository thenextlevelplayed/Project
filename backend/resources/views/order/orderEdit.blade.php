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
                <form class="card p-5" action="/main/order/edit/{{ $orderEdit->oid }}" method="POST">
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
                                            {{-- <th scope="col">備註</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotation as $key => $item)
                                            {{-- dd($item) --}}

                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $item->mname }}</td>
                                                <td>{{ $item->mnumber }}</td>
                                                <td><input type="text" name="quantity[]" value="{{ $item->quantity }}">
                                                </td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <?php
                                                    $total = $item->quantity * $item->price;
                                                    echo $total;
                                                    ?>
                                                </td>
                                                {{-- <td>{{ $item->remark }}</td>
                                                <input type="hidden" value="{{ $item->dlid }}" name="dlid[]"> --}}
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
                            <div class="row mb-1 text-right" style="font-size: 20px">
                                <div class="col-lg-10">
                                    <p>總計</p>
                                </div>
                                <div class="col-mb-3" id="AllTot" ></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <h4>凱茂方案</h4>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                企業方案：<br>
                                週年慶全面9折
                            </div>
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                業務專員：{{ $orderEdit->staffname}}<br>
                                凱茂信箱：kaimooo888.gmail.com@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-primary mr-2" href="/main/order">
                            <i class="fa fa-undo"></i>&nbsp;返回
                        </a>
                        {{-- <a class="btn btn-primary mr-2" href="">
                                            <span>預覽</span>
                                        </a> --}}
                        <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary">
                            <i class="far fa-save"></i>&nbsp;存檔
                        </button>
                    </div>
                </form>   
            </div>
            <div class="col-md-12 text-right">
                <form class="form-horizontal" action="/manufacturecreate/{{ $orderEdit->oid }}" method="POST">
                    @csrf
                    <button type="submit" id="okOrCancel1" name="okOrCancel1" class="btn btn-primary">
                        <i class="now-ui-icons ui-2_settings-90"></i>&nbsp;轉為工單
                    </button>
                </form>
            </div>
        </div>    
    </div>
@endsection

@section('script')
    <script>
        var users = {!! json_encode($quotation->toArray()) !!};
        let ListData = users;
        console.log(ListData);

        //頁面進來,更新畫面
        Refresh()

        //更新頁面//******************************************************
        function Refresh() {

            //畫面清空
            $('#quotationtable').find('tbody').empty();
            // 明細至少一筆,這筆可更改不刪除
            for (let i = 0; i < ListData.length; i++) {
                $('#quotationtable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[i].mname}"></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[i].mnumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[i].quantity}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${ListData[i].price}"></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].quantity*ListData[i].price}" readonly></td>
                        <td class="Pdel"><i class="fa-solid fa-trash-can" style="color: rgb(79, 75, 75)"></i></td>
                        <input type="text" name="did[]" value="${ListData[i].dlid}">
                    </tr>
                `)
            }

            //給細項欄位更新Function
            Ptot()
            //給全部總和更新Function
            Alltot()
            //給刪除Function
            Pdel()
        }

        // 細項新增//******************************************************
        function qCreate() {

            //矩陣增加
            ListData.push({
                mname: "",
                mnumber: "",
                quantity: "",
                price: "",
                PRtot: ""
            })

            //更新畫面
            Refresh()

            // console.log(ListData)
        }

        var dindex;
        // 細項欄位刪除//******************************************************
        function Pdel() {

            $('tr').find('.Pdel').on('click', function() {

                //找欄位並且記住該欄位index
                let row = $(this).closest('tr');
                dindex = ($(row).find('th').text());

                //跳出Bootstrap對話框
                $('#exampleModal').modal('show');
                $('#exampleModalLabel').text(`確定要刪除第${dindex}?`)

                // console.log(dindex)
            })
        }
        //確認後才可以刪除//******************************************************
        $('#okBtn').click(function() {

            //刪除Array

            ListData.splice((dindex - 1), 1);

            console.log((dindex - 1), ListData);

            //關閉Bootstrap對話框
            $('#exampleModal').modal('hide');

            //更新畫面
            Refresh()
        })

        // 細項欄位更新//******************************************************
        function Ptot() {

            $('tr').find('input').on('input', function() {

                //找欄位
                let row = $(this).closest('tr');

                let Pname = $(row).find('input').eq(0).val();
                let Pid = $(row).find('input').eq(1).val();
                let qty = $(row).find('input').eq(2).val();
                let price = $(row).find('input').eq(3).val();
                let Ptot = qty * price;

                $(row).find('input').eq(4).val(Ptot);
                let Pindex = ($(row).find('th').text());

                //資料寫進Array
                ListData[(Pindex - 1)].mname = Pname;
                ListData[(Pindex - 1)].mnumber = Pid;
                ListData[(Pindex - 1)].quantity = qty;
                ListData[(Pindex - 1)].price = price;
                ListData[(Pindex - 1)].PRtot = Ptot;

                //全部總和更新
                Alltot()

                console.log(ListData)
            })

        }

        //全部總和更新//******************************************************
        function Alltot() {

            let totally = 0;

            ListData.forEach(item => {
                totally += Number(item.quantity * item.price);
            });

            $('#AllTot').text(`NT.${totally}`);
        }

        // function append(){
        //     $("#table>tbody").append(`
    //     <tr>
    //         <td></td>
    //         <td><input type="text" name="" value=""></td>
    //         <td></td>
    //         <td><input type="number" name="" value=""></td>
    //         <td></td>
    //         <td></td>
    //         <td><input type="text" name="" value=""></td>
    //     </tr>
    //     `);
        // }
    </script>
@endsection
