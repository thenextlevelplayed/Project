@extends('main.navbar')

@section('header')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 進貨單編輯</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>廠商資訊</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨單編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨日期</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡人</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" required readonly placeholder="帶出不可更改">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h5>進貨明細</h5>
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
                                                <th scope="col">入庫狀態</th>
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
                                <div class="row mb-1">
                                    <div class="col-lg-2">
                                        <p>總計</p>
                                    </div>
                                    <div class="col-lg-5">
                                        <input id="AllTot" type="text" class="form-control" required readonly
                                            value="自動算出">
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
        </div>


        {{-- bootstrap對話框 --}}
        <!-- Button trigger modal -->
        <div data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </div>

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
                    <div id="modalContent" class="modal-body">
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
        var ListData = [{
                PRname: "筆記型電腦",
                PRid: "NB001",
                PRnum: "3",
                PRprice: "43000",
                PRtot: "129000",
                PRstock: "Y"
            },
            {
                PRname: "電腦",
                PRid: "TB001",
                PRnum: "1",
                PRprice: "35000",
                PRtot: "35000",
                PRstock: "N"
            }
        ]

        //頁面進來,更新畫面
        Refresh()

        //更新頁面
        function Refresh() {

            $('#purchaseTable').find('tbody').empty();

            for (let i = 0; i < ListData.length; i++) {

                $('#purchaseTable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control" required value="${ListData[i].PRname}"></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].PRid}"></td>
                        <td> <input type="number" min="0" class="form-control" required value="${ListData[i].PRnum}" ></td>
                        <td> <input type="number" min="0" class="form-control" required value="${ListData[i].PRprice}" ></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].PRtot}" readonly></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].PRstock}"></td>
                        <td class="Pdel"><i class="fa-solid fa-trash-can" style="color: rgb(79, 75, 75)"></i></td>
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

        // 細項新增
        function PCreate() {

            //矩陣增加
            ListData.push({
                PRname: "",
                PRid: "",
                PRnum: "",
                PRprice: "",
                PRtot: "",
                PRstock: ""
            })

            Refresh()

            console.log(ListData)
        }

        // 細項欄位刪除
        function Pdel() {

            $('tr').find('.Pdel').on('click', function() {

                //跳出Bootstrap對話框
                $('#exampleModal').modal('show');

                //找欄位
                var row = $(this).closest('tr');

                //確認後才可以刪除
                $('#okBtn').click(function() {

                    //刪除Array 
                    var Pindex = ($(row).find('th').text());
                    ListData.splice((Pindex - 1), 1);
                    console.log((Pindex - 1), ListData);

                    //關閉Bootstrap對話框
                    $('#exampleModal').modal('hide');
                })
            })
        }

        // 細項欄位更新
        function Ptot() {

            $('tr').find('input').on('input', function() {

                //找欄位
                var row = $(this).closest('tr');

                var Pname = $(row).find('input').eq(0).val();
                var Pid = $(row).find('input').eq(1).val();
                var qty = $(row).find('input').eq(2).val();
                var price = $(row).find('input').eq(3).val();
                var Ptot = qty * price;
                var stockIn = $(row).find('input').eq(5).val();

                $(row).find('input').eq(4).val(Ptot);
                var Pindex = ($(row).find('th').text());

                //資料寫進Array
                ListData[(Pindex - 1)].PRname = Pname;
                ListData[(Pindex - 1)].PRid = Pid;
                ListData[(Pindex - 1)].PRnum = qty;
                ListData[(Pindex - 1)].PRprice = price;
                ListData[(Pindex - 1)].PRtot = Ptot;
                ListData[(Pindex - 1)].PRstock = stockIn;

                //全部總和更新
                Alltot()

                console.log(ListData)
            })

        }

        //全部總和更新
        function Alltot() {

            var totally = 0;

            ListData.forEach(item => {
                totally += Number(item.PRtot);
            });

            $('#AllTot').val(totally);
        }

    </script>
@endsection
