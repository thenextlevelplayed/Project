{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/quote">工單管理</a>
    </h4>
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/manufacture/edit/{{ $manufactureId }}" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="container p-5">
                                <div>
                                    <div class="col-md-12 card-title text-center">
                                        <h3>楷模資訊 工單明細</h3>
                                    </div>
                                    {{-- <div class="container-fluid row justify-content-end" style="padding-right: 0px">
                                        <?php
                                        if($manu->mstatus == 'Y'){
                                        ?>
                                        <div class="form-check" style="margin-right: 30px">
                                            <input type="radio" name="inlineRadioOptions" id="flexRadioDefault1"
                                                value="Y" checked>
                                            <label for="flexRadioDefault1" style="font-size: 20px">
                                                已完成
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="inlineRadioOptions" id="flexRadioDefault2"
                                                value="N">
                                            <label for="flexRadioDefault2" style="font-size: 20px">
                                                未完成
                                            </label>
                                        </div>
                                        <?php
                                        }
                                        elseif($manu->mstatus == 'N' or $manu->mstatus ==''){
                                        ?>
                                        <div class="form-check" style="margin-right: 30px">
                                            <input type="radio" name="inlineRadioOptions" id="flexRadioDefault1"
                                                value="Y">
                                            <label for="flexRadioDefault1" style="font-size: 20px">
                                                已完成
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="inlineRadioOptions" id="flexRadioDefault2"
                                                value="N" checked>
                                            <label for="flexRadioDefault2" style="font-size: 20px">
                                                未完成
                                            </label>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">工單編號</label>
                                            <input class="form-control" type="text" value="{{ $manu->mrownumber }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶聯絡人</label>
                                            <input class="form-control" type="text" value="{{ $manu->qcontact }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶名稱</label>
                                            <input class="form-control" type="text" value="{{ $manu->cname }}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶信箱</label>
                                            <input class="form-control" type="text" value="{{ $manu->cmail }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶統編</label>
                                            <input class="form-control" type="text" value="{{ $manu->cid }}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">工單成立日期</label>
                                            <input class="form-control" type="text" value="{{ $manu->mDate }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12 mb-3">
                                            <label for="exampleFormControlTextarea1">工單備註</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="mremark">{{ $manu->mremark }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <div class="col-md-12 card-title text-center">
                                        <h4>工單商品內容</h4>
                                    </div>
                                    <table class="table table-hover">
                                        <thead class="text-primary" style="white-space: nowrap">
                                            <th>
                                                商品名稱
                                            </th>
                                            <th>
                                                商品型號
                                            </th>
                                            <th>
                                                商品數量
                                            </th>
                                            <th>
                                                商品備註
                                            </th>
                                            <th>
                                                完成
                                            </th>

                                        </thead>
                                        <tbody id="mtr">
                                            @foreach ($quotation as $key => $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->mname }}
                                                    </td>
                                                    <td>
                                                        {{ $item->mnumber }}
                                                    </td>
                                                    <td>
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td>
                                                        <div style="width:300px">
                                                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="1" name="remark[]" <?php if ($item->pstatus == 'Y') {
                                                                echo 'readonly';
                                                            } ?>>{{ $item->remark }}</textarea>
                                                        </div>
                                                    </td>
                                                    <td> <?php
                                                    
                                                    if ($item->pstatus == 'Y') {
                                                        echo "<span class='badge bg-success'>已完成</span>";
                                                    } else {
                                                        //點集 入庫並寫入庫存表
                                                        echo "<span class='badge bg-danger mComplete' style='cursor:pointer; '>未完成</span>";
                                                    }
                                                    ?>
                                                    </td>

                                                    <input type="hidden" name="did[]" value="{{ $item->dlid }} ">
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class = "container-fluid border">
                                    <br>
                                    <br>
                                    
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                        企業方案：
                                    </div>
                                    <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                        業務專員：林小姐<br>
                                        楷模信箱：km2468@gmail.com
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-5 mb-3">
                                    <div class="col-md-2 p-1">
                                        <a class="btn btn-primary btn-block"
                                            href="/manufacture/pdf/view/{{ $manufactureId }}">
                                            <i class="fa-regular fa-eye"></i><span> &nbsp;預覽PDF</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <a class="btn btn-primary btn-block" href="/manufacture/pdf/{{ $manufactureId }}">
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i><span> &nbsp;匯出PDF</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <button type="submit" id="okOrCancel" name="okOrCancel"
                                            class="btn btn-primary btn-block"><i class="far fa-save"></i>&nbsp;存檔</button>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <a class="btn btn-danger btn-block" href='/main/manufacture/'>
                                            <i class="fa-solid fa-x"></i><span> &nbsp;取消</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-12 text-right">

                <form id="delForm" class="form-horizontal" action="/deliveryCreate/{{ $manufactureId }}" method="POST">
                    @csrf
                    <button type="button" id="okOrCancel1" name="okOrCancel1" class="btn btn-primary">
                        <i class="now-ui-icons ui-2_settings-90"></i>&nbsp;轉為出貨單
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
        var did;
        var row;

        $('.mComplete').on('click', function(e) {

            row = $(this).closest('tr');

            let mName = $(row).find('td').eq(0).text();
            did = $(row).find('input').eq(0).val();

            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text(`確定${mName}已完成?`)

        })

        $('#okBtn').on('click', function() {

            $('#exampleModal').modal('hide');

            let _token = $("input[name=_token]").val();

            $.ajax({
                type: "post",
                url: "/manufacture/pComplete",
                data: {
                    did: did,
                    _token: _token
                },
                success: function(response) {

                    //變更狀態 未入庫->已入庫
                    $(row).find('td').eq(4).html("<span class='badge bg-success'>已完成</span>");
                    console.log(response);

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                }
            })

        })


        $('#okOrCancel1').on('click', function() {

            let totComplete = true;
            let bodytr = $('#mtr > tr')
            // console.log(bodytr)
            for (let i = 0; i < bodytr.length; i++) {

                let tr = $(`#mtr  > tr:nth-child(${i+1})`);
                let mComplete = tr.find('.mComplete').text();

                if (mComplete == "未完成") {
                    totComplete = false;
                    console.log('ok');
                    break;
                }
            }

            if (totComplete) {
                $('#delForm').submit();
            } else {
                alert("有未完成項目")
            }

        })
    </script>
@endsection
