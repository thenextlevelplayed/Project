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
    border: 0;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="container-xl">
                <div class="customerInfo">
                    <p class="text-center" style="font-size: .7cm">楷 模 資 訊 股 份 有 限 公 司 出 貨 單</p>
                
                    {{-- 出貨日期 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>出貨日期：{{}}</span></div>                                        
                    </div>
                    {{-- 客戶名稱 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>客戶名稱：</span></div>                                        
                    </div>
                    {{-- 收貨地址 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>收貨地址：</span></div>                                        
                    </div>
                    {{-- 聯絡人 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>聯絡人員：</span></div>                                        
                    </div>
                    {{-- 聯絡電話 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>聯絡電話：</span></div>
                        
                    </div>
                    {{-- 出貨編號 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>出貨編號：</span></div>                                        
                    </div>
                    {{-- 發票號碼 --}}
                    <div class="row row-cols-auto">
                        <div class="col pl-5 ml-5 mt-3"><span>發票號碼：</span></div>                                        
                    </div>
                
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <td>
                                    商品名稱
                                </td>
                                <td>
                                    商品型號
                                </td>
                                <td>
                                    數量
                                </td>
                                <td>
                                    單價
                                </td>
                                <td>
                                    小計
                                </td>
                                <td>
                                    稅額
                                </td>
                                <td>
                                    備註
                                </td>                    
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- {{$d->firstName}} --}}
                                    {{-- {{$d->firstName}} --}}
                                    <td>beepbeep</td>
                                    <td>華碩</td>
                                    <td name="quantity">
                                        87
                                    </td>
                                    <td name="price">87777</td>
                                    <td name="total">8787878787</td>
                                    <td name="tax">8787878787</td>
                                    <td name="remark">8787878787</td>
                                
                                </tr>
                                <tr>
                                    <td>beepbeep</td>
                                    <td>華碩</td>
                                    <td name="quantity">
                                        87
                                    </td>
                                    <td name="price">87777</td>
                                    <td name="total">8787878787</td>
                                    <td name="tax">8787878787</td>
                                    <td name="remark">8787878787</td>
                                </tr>
                                <tr>
                                    <td>beepbeep</td>
                                    <td>華碩</td>
                                    <td name="quantity">
                                        87
                                    </td>
                                    <td name="price">87777</td>
                                    <td name="total">8787878787</td>
                                    <td name="tax">8787878787</td>
                                    <td name="remark">8787878787</td>
                                </tr>
                                <tr>
                                    <td>beepbeep</td>
                                    <td>華碩</td>
                                    <td name="quantity">
                                        87
                                    </td>
                                    <td name="price">87777</td>
                                    <td name="total">87</td>
                                    <td name="tax">878787</td>
                                    <td name="remark">8787878787</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class=" row justify-content-end">
                            <div class="row">
                                <div class="col-md-2" style="float: left !important; margin-left:70%">總計</div>
                                <div class="col-md-2" style="float: left !important; margin-left:80%">500000</div>
                            </div>
                            
                        </div>
                        <br />
                        <p class="text-center">※請協助回簽出貨單, FAX:04-23759399 or E-mail: service@kmau.com.tw ※</p>
                        <div class=" row justify-content-end">
                            <div class="col-md-4" style="margin-left:70%">收貨人簽章:<ins>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ins></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>