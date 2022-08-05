<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    @font-face {
        font-family: 'NotoSansTC-Regular';
        font-style: normal;
        font-weight: normal;
        src: url({{ storage_path('fonts/NotoSansTC-Regular.otf') }}) format('truetype');
    }
    *{
        position: relative;
        box-sizing: border-box;
        /* border: 1px solid red; */
        padding: 0;
        margin: 0;
    }
    body{
        font-family: NotoSansTC-Regular, DejaVu Sans,sans-serif;      
    }
    .paddingY{
        padding-top: 30px; 
        padding-bottom: 10px;
    }
    .paddingL{
        padding-left: 30px;
    }
    .col{
        width: 45%;
        float: left;
    }
    .col-inline{
        width: 35%;
        display: inline-block;
    }
    .positionR0{
        position: absolute;
        right: 5%;
        display: inline-block;
    }
    .positionR50{
        position: absolute;
        right: 50%;
        display: inline-block;
    }
</style>

<div>
    <div class="text-center paddingY">楷模資訊報價明細</div>
    <div>
        <div>
            <div class="paddingY paddingL">||客戶資訊</div>
            <div  class="paddingL">
                <div class="col">
                    <div>
                        <div class="col-inline">報價單編號</div>
                        <div class="col-inline">{{$quotationInfo->qid}}</div>
                    </div>
                    <div>
                        <div class="col-inline">客戶名稱</div>
                        <div class="col-inline">{{$quotationInfo->cname}}</div>
                    </div>
                    <div>
                        <div class="col-inline">公司統編</div>
                        <div class="col-inline">{{$quotationInfo->cid}}</div>
                    </div>
                    <div>
                        <div class="col-inline">公司電話</div>
                        <div class="col-inline">{{$quotationInfo->ctel}}</div>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <div class="col-inline">報價日期</div>
                        <div class="col-inline">{{$quotationInfo->qdate}}</div>
                    </div>
                    <div>
                        <div class="col-inline">聯絡人</div>
                        <div class="col-inline">{{$quotationInfo->qcontact}}</div>
                    </div>
                    <div>
                        <div class="col-inline">聯絡人LINE ID</div>
                        <div class="col-inline">{{$quotationInfo->clineid}}</div>
                    </div>
                    <div>
                        <div class="col-inline">聯絡信箱</div>
                        <div class="col-inline">{{$quotationInfo->cmail}}</div>
                    </div>
                </div>
            </div>                                    
        </div>
        <div>
            <div class="paddingY paddingL">||報價明細</div>
            <div> 
                <div>
                    <table class="table" id="quotationtable">
                        <thead>
                            <tr>
                                <td scope="col">商品名稱</td>
                                <td scope="col">商品編號</td>
                                <td scope="col">數量</td>
                                <td scope="col">單價</td>
                                <td scope="col">小計</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $tot=0; ?>
                            @foreach ($quotation as $q)                                            
                            <tr>
                                {{-- <td scope="row"></td> --}}
                                <td>{{$q->mname}}</td>
                                <td>{{$q->mnumber}}</td>
                                <td>{{$q->quantity}}</td>
                                <td>{{number_format($q->price)}}</td>
                                <td>{{number_format($q->quantity*$q->price)}}</td>
                            </tr>
                            <?php  
                            $tot += $q->quantity*$q->price;
                            ?>                                        
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                <div>
                    <div class="text-right positionR50">總計</div>
                    <div class="text-right positionR0"><?php echo number_format($tot) ;?></div>
                </div>                                 
            </div>
        </div>
        <div class="paddingY">
            <div class="paddingY paddingL">||楷模方案</div>
            <div class="paddingL">
                <div class="col">
                    <div class="col-inline">企業方案</div>
                    <div class="col-inline">{{$quotationInfo->rid}}</div>
                </div>
                <div class="col">
                    <div>
                        <div class="col-inline">業務專員</div>
                        <div class="col-inline">{{$quotationInfo->staffname}}</div>
                    </div>
                    <div>
                        <div class="col-inline">楷模信箱</div>
                        <div class="col-inline">kaimoo888.gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






