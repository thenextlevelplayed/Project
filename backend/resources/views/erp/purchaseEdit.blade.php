@extends('main.navbar')

@section('header')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card p-5" action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 進貨單編輯</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>進貨單資訊</h5>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨單編號</p>
                                        </div>
                                        <div class="col-lg-8" name="bid">
                                            {{ $info[0]->KMPid }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>採購人員</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->staffName }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨日期</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->bookDate }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>備註</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->remark }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <h5>廠商資訊</h5>
                                <hr>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->sname }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->sid }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->smail }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->stel }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-3">
                                <h5>進貨明細</h5>
                                <hr>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <table class="table" id="purchaseTable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">商品名稱</th>
                                                <th scope="col">商品編號</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">成本</th>
                                                <th scope="col">小計</th>
                                                {{-- <th scope="col">入庫狀態 (Y/N)</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr data-index="1">
                                                <th scope="row">1</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                {{-- 新增欄位功能 --}}
                                <div class="row mb-1">
                                    <div class="col-md-12 text-right">
                                        <input type="button" class="btn mr-3" value="新增" onclick="PCreate()">
                                    </div>
                                </div>

                                <div class="row mb-1 text-right">
                                    <div class="col-lg-10" style="font-size: 24px">
                                        <span class="mr-1">總計:</span>
                                        <span id="AllTot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <div class="btn btn-primary mr-3" onclick="history.back()">
                            <span>取消</span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="存檔">
                    </div>
                </form>
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


    </div>
@endsection

@section('script')
    <script>
        //明細更改會先在網頁做更新, 存檔後會在寫進資料庫。

        //這個會從資料庫出來
        // let ListData = [{
        //         mName: "筆記型電腦",
        //         mNumber: "NB001",
        //         quantity: "3",
        //         cost: "43000",
        //         stockIn: "Y"
        //     },
        //     {
        //         mName: "電腦",
        //         mNumber: "TB001",
        //         quantity: "1",
        //         cost: "35000",
        //         stockIn: "N"
        //     }
        // ]

        var users = {!! json_encode($detail->toArray()) !!};
        let ListData = users;

        console.log(ListData);
        //頁面進來,更新畫面
        Refresh()

        //更新頁面
        function Refresh() {

            $('#purchaseTable').find('tbody').empty();

            for (let i = 0; i < ListData.length; i++) {


                $('#purchaseTable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[i].mName}"></td>
                        <td> <input type="text" class="form-control " required name="mNumber[]" value="${ListData[i].mNumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[i].quantity}" ></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${ListData[i].cost}" ></td>
                        <td> <input type="text" class="form-control" required value="${(ListData[i].quantity*ListData[i].cost).toLocaleString('en-US')}" readonly></td>
                        <td class="Pdel"><i class="fa-solid fa-trash-can" style="color: rgb(79, 75, 75)"></i></td>
                        <input type="hidden" name="did[]" value="${ListData[i].bDetailId}">
                    </tr>
                `)

                test = (ListData[i].quantity*ListData[i].cost).toLocaleString('en-US');
                console.log(test,1);
            }

            // <td> <input type="text" class="form-control"  maxlength="1" pattern="Y|N" required name="pStatus[]" value="${ListData[i].pStatus}"></td>

            //給細項欄位更新Function
            Ptot()

            //給全部總和更新Function
            Alltot()

            //給刪除Function
            Pdel()

            //給商品名稱檢查
            mNumber()
        }

        // 細項新增
        function PCreate() {

            //矩陣增加
            ListData.push({
                mName: "",
                mNumber: "",
                quantity: "",
                cost: "",
                PRtot: "",
                pStatus: ""
            })

            //更新畫面
            Refresh()

            // console.log(ListData)
        }






        var dindex;
        // 細項欄位刪除
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

        //確認後才可以刪除
        $('#okBtn').click(function() {

            //刪除Array

            ListData.splice((dindex - 1), 1);

            console.log((dindex - 1), ListData);

            //關閉Bootstrap對話框
            $('#exampleModal').modal('hide');

            //更新畫面
            Refresh()
        })


        //[商品名稱]輸入後,先去庫存表搜尋是否存在。存在:[商品編號]讀取資料庫資料;不存在:[商品編號]要自己輸入。
        function mNumber() {
            $('.mNumChk').on('blur', function(e) {

                e.preventDefault();

                let mName = $(this).val();
                let _token = $("input[name=_token]").val();

                // console.log(mName);

                let row = $(this).closest('tr');
                let Pindex = ($(row).find('th').text());

                $.ajax({
                    type: "post",
                    url: "/purchase/mNumber",
                    data: {
                        mName: mName,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            // console.log(response);
                            ListData[(Pindex - 1)].mNumber = response.mnumber;
                            Refresh()
                        }
                    },
                    error: function() {}
                })


            })
        }

        // 細項欄位更新
        function Ptot() {

            $('tr').find('input').on('input', function() {

                //找欄位
                let row = $(this).closest('tr');

                let Pname = $(row).find('input').eq(0).val();
                let Pid = $(row).find('input').eq(1).val();
                let qty = $(row).find('input').eq(2).val();
                let price = $(row).find('input').eq(3).val();
                let Ptot = qty * price;
                let pStatus = $(row).find('input').eq(5).val();

                $(row).find('input').eq(4).val(Ptot.toLocaleString('en-US'));
                let Pindex = ($(row).find('th').text());

                //資料寫進Array
                ListData[(Pindex - 1)].mName = Pname;
                ListData[(Pindex - 1)].mNumber = Pid;
                ListData[(Pindex - 1)].quantity = qty;
                ListData[(Pindex - 1)].cost = price;
                ListData[(Pindex - 1)].PRtot = Ptot;
                ListData[(Pindex - 1)].pStatus = pStatus;

                //全部總和更新
                Alltot()

                // console.log(ListData)
            })

        }

        //全部總和更新
        function Alltot() {

            let totally = 0;

            ListData.forEach(item => {
                totally += Number(item.quantity * item.cost);
            });

            $('#AllTot').text(`${totally.toLocaleString('en-US')}`);
        }
    </script>
@endsection
