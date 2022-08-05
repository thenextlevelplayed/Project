{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

{{-- 藍藍navbar title --}}
@section('navTitle')
    <h4>
        <a class="navbar-brand" href="">報價資訊</a>
    </h4>
@endsection

{{-- 搜尋框 --}}
@section('searchBox')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{-- /quotation/edit/{{ $quotationInfo->qid }} --}}
                <form class="card p-5" action="/quotation/edit/{{ $quotationInfo->qid }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 報價明細</h4>
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
                                        <label for="validationCustom01">報價單編號</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $quotationInfo->qrownumber }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">公司名稱</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $quotationInfo->cname }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">公司統編</label>
                                        <input class="form-control" type="text" placeholder="{{ $quotationInfo->cid }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">公司電話</label>
                                        <input class="form-control" type="text" placeholder="{{ $quotationInfo->ctel }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">報價日期</label>
                                        <input class="form-control" type="text" placeholder="{{ $quotationInfo->qdate }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡人</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $quotationInfo->qcontact }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡人LINE ID</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $quotationInfo->clineid }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">聯絡信箱</label>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $quotationInfo->cmail }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-5">
                                <h5>報價明細</h5>
                                <hr>
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
                                            {{-- <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->mname }}">                                                    
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->mnumber }}">
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity" value="{{ $dtl->quantity }}">
                                                </td>
                                                <td>
                                                    {{ $quotationInfo->price }}
                                                </td>
                                                <td>
                                                    total
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" value="{{ $quotationInfo->remark }}">                                                    
                                                </td>
                                            </tr> --}}

                                        </tbody>
                                    </table>
                                    {{-- 新增明細項目 --}}
                                    <div class="row mb-1">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-primary" value="新增"
                                                onclick="qCreate()"><i class="fa-solid fa-plus"></i> &nbsp;新增</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1 " style="font-size: 20px">
                                    <div class="col-lg-8 text-right">
                                        <p>總計</p>
                                    </div>
                                    <div class="col-lg-4" id="AllTot"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <h4>楷模方案</h4>
                                <hr>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>企業方案</p>
                                        </div>
                                        <div class="col-lg-8"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>業務專員</p>
                                        </div>
                                        <div class="col-lg-8">{{ $quotationInfo->staffname }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>凱茂信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p>kaimoo888.gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row container-fluid justify-content-center mt-5">
                        <div class="col-md-2 p-1">
                            <a href='/main/quotation' class="btn btn-secondary btn-block">
                                <i class="fa-solid fa-x"></i> &nbsp; 返回
                            </a>
                        </div>
                        <div class="col-md-2 p-1">
                            <input type="submit" class="btn btn-primary btn-block" value="存檔">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right" 
                <?php
                    if ($quotationInfo->qstatus == 'Y') {
                        echo 'hidden';
                    }
                ?>
            >
                {{-- 按下btn後，返回報價單管理頁面，並在報價單管理頁面新增一筆報價單資料 --}}
                <form class="form-horizontal" action="/orderCreate/{{ $quotationInfo->qid }}" method="POST">
                    @csrf
                    <button type="submit" id="okOrCancel1" name="okOrCancel1" class="btn btn-primary">
                        <i class="now-ui-icons ui-2_settings-90"></i>&nbsp;轉為訂單
                    </button>
                </form>

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

@section('script')
    <script>
        var users = {!! json_encode($quotation->toArray()) !!};
        let ListData = users;
        // console.log(ListData);

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
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${(ListData[i].price)}"></td>
                        <td> <input type="text" class="form-control" required value="${(ListData[i].quantity*ListData[i].price).toLocaleString('en-US')}" readonly></td>
                        <td> <input type="text" class="form-control" required name="remark[]" value="${ListData[i].remark}" ></td>
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
                PRtot: "",
                remark:"",
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
                let remark = $(row).find('input').eq(5).val();

                $(row).find('input').eq(4).val(Ptot.toLocaleString('en-US'));
                let Pindex = ($(row).find('th').text());

                //資料寫進Array
                ListData[(Pindex - 1)].mname = Pname;
                ListData[(Pindex - 1)].mnumber = Pid;
                ListData[(Pindex - 1)].quantity = qty;
                ListData[(Pindex - 1)].price = price;
                ListData[(Pindex - 1)].PRtot = Ptot;
                ListData[(Pindex - 1)].remark = remark;

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

            $('#AllTot').text(`${totally.toLocaleString('en-US')}`);
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

{{-- Edit:

存檔button按下之後,資料庫更新(刪除,新增資料)

轉為訂單button按下後,跳轉到訂單管理頁面,且新增一筆訂單編號進資料庫 --}}
