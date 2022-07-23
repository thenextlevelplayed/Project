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
    <input type="text" value="" class="form-control" placeholder="輸入訂單編號或客戶名稱">
@endsection

{{-- 內容代入 --}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card p-5">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 訂單明細</h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3">
                                    <h5>客戶資訊</h5>
                                    <hr>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>訂單編號</p></div>
                                            <div class="col-lg-8">{{$orderInfo->oid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司名稱</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cname}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司統編</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">{{$orderInfo->ctel}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>訂單日期</p></div>
                                            <div class="col-lg-8">{{$orderInfo->odate}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人</p></div>
                                            <div class="col-lg-8">{{$orderInfo->qcontact}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡人LINE ID</p></div>
                                            <div class="col-lg-8">{{$orderInfo->clineid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>聯絡信箱</p></div>
                                            <div class="col-lg-8">{{$orderInfo->cmail}}</div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row mb-5">
                                <div class="col-lg-12 mt-3">
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
                                                    <th scope="col">數量</th>
                                                    <th scope="col">單價</th>
                                                    <th scope="col">小計</th>
                                                    <th scope="col">備註</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            @foreach ($quotation as $key => $item)
                                                

                                                <tr>
                                                    <th scope="row">{{$loop->index + 1}}</th>
                                                    <td>{{$item->mname}}</td>
                                                    <td>{{$item->mnumber}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <?php
                                                        $total=($item->quantity) * ($item->price);
                                                        echo $total;
                                                        ?></td>
                                                    <td>{{$item->remark}}</td>
                                                </tr>
                                            @endforeach 
                                                {{-- <tr>
                                                    <th scope="row">2</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr> --}}

                                            </tbody>
                                        </table> 
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-8 text-right"><p>總計</p></div>
                                        <div class="col-lg-4 text-right" id="AllTot"></div>
                                    </div>                                 
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 mt-3">
                                    <h4>凱茂方案</h4>
                                    <hr>
                                </div>
                                <div  class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>企業方案</p></div>
                                            <div class="col-lg-8">{{$orderInfo->rid}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務專員</p></div>
                                            <div class="col-lg-8">{{$orderInfo->staffid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>凱茂信箱</p></div>
                                            <div class="col-lg-8"><p>kaimoo888.gmail.com</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/order">
                    <i class="fa fa-undo"></i>&nbsp;返回
                </a>
                <a class="btn btn-primary " href="/order/pdf/view/{{$orderInfo->oid}}">
                    <i class="fa-regular fa-eye"></i> &nbsp;預覽pdf
                </a>
                <a class="btn btn-primary" href="/main/order/pdf/{{$orderInfo->oid}}">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp;匯出pdf
                </a>
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
            for (let i = 0; i < ListData.length; i++){
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
