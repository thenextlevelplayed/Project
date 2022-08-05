@extends('main.navbar')

@section('header')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card" action="/main/purchaseCreate" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 進貨單</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>進貨單資訊</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨單編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $KMPid }}
                                            <input type="hidden" value="{{ $KMPid }}" name="KMPid">
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
                                            {{ Session::get('name') }}
                                            <input type="hidden" value="{{ Session::get('name') }}" name="staffname">
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
                                            <input type="date" value="" name="bookdate" required>
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
                                            <textarea type="text" value="" name="remark">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5>廠商資訊</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input id="sNameChk" type="text" value="" name="sname" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input id="sId" type="text" value="" name="sid" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input id="sMail" type="text" value="" name="smail" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <input id="sTel" type="text" value="" name="stel" required>
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
                                    <table id="purchaseTable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">商品名稱</th>
                                                <th scope="col">商品編號</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">成本</th>
                                                <th scope="col">小計</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- 明細一定有一筆 --}}
                                            {{-- <tr>
                                                <th scope="row">1</th>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                                <td> <input type="text" class="form-control" required></td>
                                            </tr> --}}
                                        </tbody>

                                    </table>
                                    {{-- 新增欄位功能 --}}
                                    <div class="row mb-1">
                                        <div class="col-md-12 text-right">
                                            <input type="button" class="btn mr-3" value="新增" onclick="PCreate()">
                                        </div>
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
                        <a class="btn btn-primary mr-3" href="/main/purchase">
                            <span>取消</span>
                        </a>
                        <input type="submit" class="btn btn-primary" value="存檔">
                    </div>
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
        //明細更改會先在網頁做更新, 存檔後會在寫進資料庫。


        let TitleDate = [{
            bid: "",
            staffName: "",
            bookDate: "",
            remark: "",
            sname: "",
            sid: "",
            smail: "",
            stel: "",
        }];

        //這個會從資料庫出來
        let ListData = [
            // 第一筆
            {
                mName: "",
                mNumber: "",
                quantity: "",
                cost: "",
            }
        ];

        //頁面進來,更新畫面
        Refresh()

        //更新頁面//******************************************************
        function Refresh() {

            //畫面清空
            $('#purchaseTable').find('tbody').empty();
            // 明細至少一筆,這筆可更改不刪除
            $('#purchaseTable').find('tbody').append(`
                    <tr>
                        <th scope="row">1</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[0].mName}"></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[0].mNumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[0].quantity}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${(ListData[0].cost)}"></td>
                        <td> <input type="text" class="form-control" required value="${(ListData[0].quantity*ListData[0].cost).toLocaleString('en-US')}" readonly></td>
                    </tr>
                `)
            //從第2筆開始,可更改可刪除
            for (let i = 1; i < ListData.length; i++) {
                $('#purchaseTable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[i].mName}"></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[i].mNumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[i].quantity}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${(ListData[i].cost)}"></td>
                        <td> <input type="text" class="form-control" required value="${(ListData[i].quantity*ListData[i].cost).toLocaleString('en-US')}" readonly></td>
                        <td class="Pdel"><i class="fa-solid fa-trash-can" style="color: rgb(79, 75, 75)"></i></td>
                    </tr>
                `)

                console.log(typeof(ListData[i].cost))
            }



            //給細項欄位更新Function
            Ptot()
            //給全部總和更新Function
            Alltot()
            //給刪除Function
            Pdel()
            //給公司資料庫搜尋
            sNameChk()
            //給商品名稱檢查
            mNumber()
        }

        // 細項新增//******************************************************
        function PCreate() {

            //矩陣增加
            ListData.push({
                mName: "",
                mNumber: "",
                quantity: "",
                cost: "",
                PRtot: "",
                stockIn: ""
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

            // console.log((dindex - 1), ListData);

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

                $(row).find('input').eq(4).val(Ptot.toLocaleString('en-US'));
                let Pindex = ($(row).find('th').text());

                //資料寫進Array
                ListData[(Pindex - 1)].mName = Pname;
                ListData[(Pindex - 1)].mNumber = Pid;
                ListData[(Pindex - 1)].quantity = qty;
                ListData[(Pindex - 1)].cost = price;
                ListData[(Pindex - 1)].PRtot = Ptot;

                //全部總和更新
                Alltot()

                // console.log(ListData)
            })

        }

        //全部總和更新//******************************************************
        function Alltot() {

            let totally = 0;

            ListData.forEach(item => {
                totally += Number(item.quantity * item.cost);
            });

            $('#AllTot').text(`${totally.toLocaleString('en-US')}`);
        }

        //[公司名稱]輸入後,先去庫存表搜尋是否存在。存在:自動填完廠商資訊;不存在:要自己輸入。
        function sNameChk() {
            $('#sNameChk').on('blur', function(e) {

                e.preventDefault();

                // console.log('ok')

                let sName = $(this).val();
                let _token = $("input[name=_token]").val();

                $.ajax({
                    type: "post",
                    url: "/purchase/supplier",
                    data: {
                        sName: sName,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            $('#sId').val(response.sid);
                            $('#sMail').val(response.smail);
                            $('#sTel').val(response.stel);
                        }
                    },
                    error: function() {}
                })


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

                                ListData[(Pindex - 1)].mNumber = response.mnumber;
                                Refresh()
                            }
                        },
                        error: function() {}
                    })


                })
            }
        }

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

                            ListData[(Pindex - 1)].mNumber = response.mnumber;
                            Refresh()
                        }
                    },
                    error: function() {}
                })


            })
        }
    </script>
@endsection
