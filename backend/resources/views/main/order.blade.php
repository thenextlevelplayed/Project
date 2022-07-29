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
                                                <a href="/main/order/edit/{{ $od->oid }}" <?php if ($od->ostatus == 'Y') {
                                                    echo 'hidden';
                                                } ?>>
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                </a>

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
