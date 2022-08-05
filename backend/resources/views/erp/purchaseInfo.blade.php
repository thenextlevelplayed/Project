@extends('main.navbar')

@section('header')
@endsection

@section('content')
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card p-5">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 楷模資訊 進貨單</h4>
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
                                        <div class="col-lg-8">
                                            {{ $info[0]->kmpid }}
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
                                            {{ $info[0]->staffname }}
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
                                            {{ $info[0]->bookdate }}
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
                                                <th scope="col">入庫狀態</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $totstatus = ''; ?>

                                            @foreach ($detail as $det)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td class="col-2"> {{ $det->mname }}</td>
                                                    <td class="col-2"> {{ $det->mnumber }}</td>
                                                    <td class="col-2"> {{ $det->quantity }}</td>
                                                    <td class="col-2"> {{ number_format($det->cost) }}</td>
                                                    <td class="col-2"> {{ number_format($det->quantity * $det->cost) }}</td>
                                                    <td class="col-2"> <?php
                                                    
                                                    $totstatus .= $det->pstatus;
                                                    
                                                    if ($det->pstatus == 'Y') {
                                                        echo "<span class='badge bg-success'>已入庫</span>";
                                                    } else {
                                                        //點集 入庫並寫入庫存表
                                                        echo "<span class='badge bg-danger stockin' style='cursor:pointer; '>未入庫</span>";
                                                    }
                                                    ?>
                                                    </td>
                                                    <input type="hidden" value="{{ $det->bdetailid }} ">
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mb-1 text-right">

                                    <div class="col-lg-10" style="font-size: 24px">
                                        <span class="mr-1">總計:</span>
                                        <span>
                                            
                                            <?php
                                            $tot = 0;
                                            foreach ($detail as $det) {
                                                $tot += $det->quantity * $det->cost;
                                            }
                                            echo number_format($tot);
                                            ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary mr-3" href="/main/purchase">
                    <span>回上頁</span>
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
        var mNumber;
        var quantity;
        var did;
        var row;

        $('.stockin').on('click', function(e) {

            row = $(this).closest('tr');

            let dindex = $(row).find('th').text();
            mNumber = $(row).find('td').eq(1).text();
            quantity = $(row).find('td').eq(2).text();
            sumPrice = $(row).find('td').eq(4).text();
            did = $(row).find('input').eq(0).val();

            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text(`確定第${dindex}要入庫?`)

            console.log(mNumber, quantity, did, row, dindex, sumPrice);
        })

        $('#okBtn').on('click', function() {

            $('#exampleModal').modal('hide');

            let _token = $("input[name=_token]").val();

            $.ajax({
                type: "post",
                url: "/purchase/stockIn",
                data: {
                    mNumber: mNumber,
                    quantity: quantity,
                    did: did,
                    sumPrice: sumPrice.replace(/,/g, ""),
                    _token: _token
                },
                success: function(response) {

                    //變更狀態 未入庫->已入庫
                    $(row).find('td').eq(5).html("<span class='badge bg-success'>已入庫</span>");
                    console.log(response);

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                }
            })

        })
    </script>
@endsection
