<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<style>
    @font-face {
        font-family: 'NotoSansTC-Regular';
        font-style: normal;
        font-weight: normal;
        src: url({{ storage_path('fonts/NotoSansTC-Regular.otf') }}) format('truetype');
    }
    body {
        font-family: NotoSansTC-Regular, DejaVu Sans,sans-serif;
        border: 1px solid red;
    }
    .container{
        margin: 10px;
    }
    .col{
        width: 50%;
        float: left;
    }
</style>

<div class="container">
    <div>
        <p class="text-center"> 凱茂資訊 報價明細</p>
    </div>
    <div>
        <div>
            <div class="mb-3">
                <p>||客戶資訊</p>
            </div>
            <div  class="mb-3">
                <div class="col">
                    <div class="">
                        <div class=""><p>報價單編號</p></div>
                        <div class="">{{$quotationInfo->qid}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>客戶名稱</p></div>
                        <div class="">{{$quotationInfo->cname}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>公司統編</p></div>
                        <div class="">{{$quotationInfo->cid}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>公司電話</p></div>
                        <div class="">{{$quotationInfo->ctel}}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <div class=""><p>報價日期</p></div>
                        <div class="">{{$quotationInfo->qdate}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>聯絡人</p></div>
                        <div class="">{{$quotationInfo->qcontact}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>聯絡人LINE ID</p></div>
                        <div class="">{{$quotationInfo->clineid}}</div>
                    </div>
                    <div class="">
                        <div class=""><p>聯絡信箱</p></div>
                        <div class="">{{$quotationInfo->cmail}}</div>
                    </div>
                </div>
            </div>                                    
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <p>||報價明細</p>
            </div>
            <div class="col-lg-12"> 
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col"></td>
                                <td scope="col">商品名稱</td>
                                <td scope="col">商品編號</td>
                                <td scope="col">數量</td>
                                <td scope="col">單價</td>
                                <td scope="col">小計</td>
                                <td scope="col">備註</td>
                            </tr>
                        </thead>
                        
                        <tbody>                                                
                            <tr>
                                <td scope="row">1</td>
                                <td>{{$quotationInfo->mname}}</td>
                                <td>{{$quotationInfo->mnumber}}</td>
                                <td>{{$quotationInfo->quantity}}</td>
                                <td>{{$quotationInfo->price}}</td>
                                <td></td>
                                <td>{{$quotationInfo->remark}}</td>
                            </tr>
                            <tr>
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
                            </tr>                                            
                        </tbody>
                    </table> 
                </div>
                <div class="row mb-1">
                    <div class="col-lg-8 text-right"><p>總計</p></div>
                    <div class="col-lg-4"></div>
                </div>                                 
            </div>
        </div>
        <div>
            <div class="mb-3">
                <p>||凱茂方案</p>
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
                        <div class="col-lg-8">{{$quotationInfo->staffid}}</div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3"><p>凱茂信箱</p></div>
                        <div class="col-lg-8"><p>kaimoo888.gmail.com</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





