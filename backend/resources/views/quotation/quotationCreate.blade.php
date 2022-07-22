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
                                            <input type="text" required>
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
                                        <div class="col-lg-3"><p>聯絡電話</p></div>
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
                                    {{-- 新增明細項目 --}}
                                    <div class="row mb-1">
                                        <div class="col-md-12 text-right">
                                            <input type="button" class="btn btn-secondary" value="新增"  onclick="qCreate()">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-2"><p>總計</p></div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" required>
                                    </div>
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
                                            <input type="text" required>
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
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>存檔</span>     {{-- 按下btn後，返回報價單管理頁面，並在報價單管理頁面新增一筆報價單資料 --}}
                </a>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>匯出PDF</span>
                </a>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="">
                    <span>報價成立，轉為訂單</span>
                </a>
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
            $('#quotationtable').find('tbody').empty();
            // 明細至少一筆,這筆可更改不刪除
            $('#quotationtable').find('tbody').append(`
                    <tr>
                        <th scope="row">1</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[0].mName}"></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[0].mNumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[0].quantity}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${ListData[0].cost}"></td>
                        <td> <input type="text" class="form-control" required value="${ListData[0].quantity*ListData[0].cost}" readonly></td>
                    </tr>
                `)
            //從第2筆開始,可更改可刪除
            for (let i = 1; i < ListData.length; i++) {
                $('#quotationtable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[i].mName}"></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[i].mNumber}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[i].quantity}"></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${ListData[i].cost}"></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].quantity*ListData[i].cost}" readonly></td>
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
            //給公司資料庫搜尋
            sNameChk()
            //給商品名稱檢查
            mNumber()
        }

        // 細項新增//******************************************************
        function qCreate() {

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
                ListData[(Pindex - 1)].mName = Pname;
                ListData[(Pindex - 1)].mNumber = Pid;
                ListData[(Pindex - 1)].quantity = qty;
                ListData[(Pindex - 1)].cost = price;
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
                totally += Number(item.quantity * item.cost);
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