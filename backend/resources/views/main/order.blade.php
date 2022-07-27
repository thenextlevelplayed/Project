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
    <input type="search" class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">
        <i class="now-ui-icons ui-1_zoom-bold"></i>
    </span>
@endsection

{{-- 內容代入 --}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>
                                        訂單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        工單編號
                                    </th>
                                    <th>
                                        出貨單編號
                                    </th>
                                    <th>
                                        訂單狀態
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                </thead>
                                <tbody id="otr">
                                    @foreach ($order as $od)
                                        <tr>
                                            <td class="oNumber">
                                                <a href="/main/order/{{ $od->oid }}">{{ $od->orownumber }}
                                            </td>
                                            <td>
                                                {{ $od->cname }}
                                            </td>
                                            <td>

                                                <?php
                                                for ($i = 0; $i < count($manu); $i++) {
                                                    if ($manu[$i]->oid == $od->oid) {
                                                        $mid = $manu[$i]->mid;
                                                
                                                        echo "<a href=/main/manufacture/${mid}>";
                                                        echo $manu[$i]->mrownumber;
                                                    }
                                                }
                                                
                                                ?>

                                            </td>
                                            <td>

                                                <?php
                                                for ($i = 0; $i < count($deli); $i++) {
                                                    if ($deli[$i]->oid == $od->oid) {
                                                        $did = $deli[$i]->did;
                                                
                                                        echo "<a href=/delivery/${did}>";
                                                        echo $deli[$i]->drownumber;
                                                    }
                                                }
                                                
                                                ?>

                                            </td>

                                            <td>
                                                <?php
                                                
                                                for ($i = 0; $i < count($manu); $i++) {
                                                    $mstatus = 'N';
                                                    if ($manu[$i]->oid == $od->oid) {
                                                        $mstatus = $manu[$i]->mstatus;
                                                        break;
                                                    }
                                                }
                                                
                                                for ($i = 0; $i < count($deli); $i++) {
                                                    $dstatus = 'N';
                                                    if ($deli[$i]->oid == $od->oid) {
                                                        $dstatus = $deli[$i]->dstatus;
                                                        break;
                                                    }
                                                }
                                                
                                                if ($dstatus == 'Y') {
                                                    echo "<span class='badge bg-success'>已完成出貨</span>";
                                                } elseif ($mstatus == 'Y') {
                                                    echo "<span class='badge bg-warning'>已成立出貨單</span>";
                                                } elseif ($od->ostatus == 'Y') {
                                                    echo "<span class='badge bg-primary'>已成立工單</span>";
                                                }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" <?php if($od->ostatus == 'Y'){ echo 'hidden';} ?>>
                                                    {{-- {{ url('/home') }} --}}
                                                    <a href="/main/order/edit/{{ $od->oid }}" class="btn"
                                                        style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <div class="text-right">
                                <a class="btn btn-primary" href="">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <span>新增訂單</span>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // let bodytr = $('#otr > tr')


        // for (let i = 0; i < bodytr.length; i++) {
        //     let tr = $(`#otr  > tr:nth-child(${i+1})`)
        //     let oNumber = tr.find('.oNumber').text();

        // }
        // $('.oNumber')

        // for (let i = 1; i <= bodytr.length - 2; i++) {

        //     let tr = $(`#splitDet > tr:nth-child(${i})`)
        //     let trPrice = tr.find('td').eq(2).text();
        //     let trNum = tr.find('.OrigNum').val();
        //     let totNum = tr.find('td').eq(3).text();

        //     OrigPrice += trPrice * trNum;
        //     totPrice += trPrice * totNum;
        // }
    </script>
@endsection
