<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

{{-- 字型 --}}
<style>
    @font-face {
        font-family: 'NotoSansTC-Regular';
        font-style: normal;
        font-weight: normal;
        src: url({{ storage_path('fonts/NotoSansTC-Regular.otf') }}) format('truetype');
    }

    * {
        position: relative;
        box-sizing: borderInfo-box;
        /* borderInfo: 1px solid red; */
        padding: 0;
        margin: 0;
    }

    body {
        font-family: NotoSansTC-Regular, DejaVu Sans, sans-serif;
    }

    .paddingY {
        margin-top: 30px;
        padding-top: 30px;
        padding-bottom: 10px;
    }

    .paddingL {
        padding-left: 50px;
    }

    .col {
        width: 45%;
        float: left;
    }
    .colR {
        width: 45%;
        float: right;
    }

    .col-inlineT {
        width: 35%;
        display: inline-block;
    }

    .col-inline {
        width: 45%;
        display: inline-block;
    }

    .positionR0 {
        position: absolute;
        right: 5%;
        display: inline-block;
    }

    .positionR50 {
        position: absolute;
        right: 50%;
        display: inline-block;
    }
    .positionR30 {
        position: absolute;
        right: 30%;
        display: inline-block;
    }
</style>

{{-- 表單內容 --}}
<div>
    <div class="text-center paddingY">楷模資訊訂單明細</div>
    <div>
        <div>
            <div class="paddingY paddingL">||客戶資訊</div>
            <div class="paddingL">
                <div class="col">
                    <div>
                        <div class="col-inlineT">訂單編號</div>
                        <div class="col-inline">{{ $orderInfo->orownumber }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">客戶名稱</div>
                        <div class="col-inline">{{ $orderInfo->cname }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">公司統編</div>
                        <div class="col-inline">{{ $orderInfo->cid }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">公司電話</div>
                        <div class="col-inline">{{ $orderInfo->ctel }}</div>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <div class="col-inlineT">訂單日期</div>
                        <div class="col-inline">{{ $orderInfo->odate }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">聯絡人</div>
                        <div class="col-inline">{{ $orderInfo->qcontact }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">聯絡人LINE ID</div>
                        <div class="col-inline">{{ $orderInfo->clineid }}</div>
                    </div>
                    <div>
                        <div class="col-inlineT">聯絡信箱</div>
                        <div class="col-inline">{{ $orderInfo->cmail }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="paddingY paddingL">||訂單明細</div>
            <div>
                <div>
                    <table class="table paddingL">
                        <thead>
                            <tr>
                                <td scope="col">商品名稱</td>
                                <td scope="col">商品編號</td>
                                <td scope="col">數量</td>
                                <td scope="col">單價</td>
                                <td scope="col">小計</td>
                                {{-- <td scope="col">備註</td> --}}
                            </tr>
                        </thead>

                        <tbody>
                            <?php $tot = 0; ?>
                            @foreach ($quotation as $q)
                                <tr>
                                    {{-- <td scope="row">1</td> --}}
                                    <td>{{ $q->mname }}</td>
                                    <td>{{ $q->mnumber }}</td>
                                    <td>{{ $q->quantity }}</td>
                                    <td>{{ number_format($q->price) }}</td>
                                    <td>{{ number_format($q->quantity * $q->price) }}</td>
                                    {{-- <td>{{$q->remark}}</td> --}}
                                </tr>
                                <?php
                                $tot += $q->quantity * $q->price;
                                ?>
                            @endforeach
                            {{-- <tr>
                                <td scope="row">2</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="text-right positionR50">總計</div>
                    <div class="text-right positionR0"><?php echo number_format($tot); ?></div>
                </div>
            </div>
        </div>
        <div class="paddingY">
            <div class="paddingY paddingL">||楷模方案</div>
            <div class="paddingL">
                <div class="col">
                    <div class="col-inline">企業方案</div>
                    <div class="col-inline">{{ $orderInfo->rid }}</div>
                </div>
                <div class="col">
                    <div>
                        <div class="col-inline">業務專員</div>
                        <div class="col-inline">{{ $orderInfo->staffname }}</div>
                    </div>
                    <div>
                        <div class="col-inline">楷模信箱</div>
                        <div class="col-inline">kaimoo888.gmail.com</div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="paddingY">
            <div class="paddingY paddingL"></div>
            <div class="paddingL">
                <div class="colR">簽章:</div>
                <p class="text-center">※請協助回簽訂單, FAX:04-23759399※</p>
            </div>            
        </div>
    </div>
</div>
