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
    <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card p-5">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 報價明細</h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3 mt-3">
                                    <h5>客戶資訊</h5>
                                    <hr>
                                </div>
                                <div  class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>報價單編號</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->qid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司名稱</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->cname}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司統編</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->cid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>公司電話</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->ctel}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-4"><p>報價日期</p></div>                                              
                                            <div class="col-lg-8">{{ $quotationInfo->qdate }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-4"><p>聯絡人</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->qcontact}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-4"><p>聯絡LINE ID</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->clineid}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-4"><p>聯絡信箱</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->cmail}}</div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 mt-3">
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
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>                                                
                                                {{-- <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$quotationInfo->mname}}</td>
                                                    <td>{{$quotationInfo->mnumber}}</td>
                                                    <td>{{$quotationInfo->quantity}}</td>
                                                    <td>{{$quotationInfo->price}}</td>
                                                    <td>
                                                    </td>
                                                    <td>{{$quotationInfo->remark}}</td>
                                                </tr>                                         --}}
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
                                    <h4>楷模方案</h4>
                                    <hr>
                                </div>
                                <div  class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>企業方案</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->rid}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>業務專員</p></div>
                                            <div class="col-lg-8">{{$quotationInfo->staffname}}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3"><p>楷模信箱</p></div>
                                            <div class="col-lg-8"><p>kaimoo888.gmail.com</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary " href="/main/quotation">
                    <span>返回</span>
                </a>
                <a class="btn btn-primary " href="/quotation/pdf/view/{{$quotationInfo->qid}}">
                    <span>預覽PDF</span>
                </a>
                <a class="btn btn-primary" href="/main/quotation/pdf/{{$quotationInfo->qid}}">
                    <span>匯出PDF</span>
                </a>
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

            for (let i = 0; i < ListData.length; i++){
                $('#quotationtable').find('tbody').append(`
                    <tr>
                        <th scope="row">${i+1}</th>
                        <td> <input type="text" class="form-control mNumChk" required name="mName[]" value="${ListData[i].mname}" readonly></td>
                        <td> <input type="text" class="form-control" required name="mNumber[]" value="${ListData[i].mnumber}" readonly></td>
                        <td> <input type="number" min="0" class="form-control" required name="quantity[]" value="${ListData[i].quantity}" readonly></td>
                        <td> <input type="number" min="0" class="form-control" required name="cost[]" value="${ListData[i].price}" readonly></td>
                        <td> <input type="text" class="form-control" required value="${ListData[i].quantity*ListData[i].price}" readonly></td>
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

    </script>
@endsection