<form action="" method="POST">
    @csrf
        
    <div class="container-xl">
        <div class="customerInfo">
            <h2 class="text-center">凱 茂 資 訊 股 份 有 限 公 司 出 貨 單</h2>
        
            {{-- 出貨日期 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>出貨日期：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 客戶名稱 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>客戶名稱：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 收貨地址 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>收貨地址：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 聯絡人 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>聯絡人員：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 聯絡電話 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>聯絡電話：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 出貨編號 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>出貨編號：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
            {{-- 發票號碼 --}}
            <div class="row row-cols-auto">
                <div class="col"><h5>發票號碼：</h5></div>
                <div class="col"><h5>Column</h5></div>
            </div>
        
        </div>
        


        {{-- 出貨資訊 --}}
        {{-- <div class=" row">
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-6 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
        </div>
        <div class=" row">
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-6 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
        </div>
        <div class=" row">
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-6 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
        </div>
        <div class=" row">
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-6 text-center goods">.col-6 .col-md-4</div>
            <div class="col-md-3 text-center goods">.col-6 .col-md-4</div>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            商品名稱
                        </th>
                        <th>
                            商品型號
                        </th>
                        <th>
                            數量
                        </th>
                        <th>
                            單價
                        </th>
                        <th>
                            小計
                        </th>
                        <th>
                            稅額
                        </th>
                        <th>
                            備註
                        </th>                    
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
                            <td name="total">8787878787</td>
                            <td name="tax">8787878787</td>
                            <td name="remark">8787878787</td>
                        </tr>
                    </tbody>
                </table>
                <div class=" row justify-content-end">
                    <div class="col-md-1 text-center goods">總計</div>
                    <div class="col-md-2 text-center goods">87878878877</div>
                </div>
                <br />
                <p class="text-center">※請協助回簽出貨單, FAX:04-23759399 or E-mail: service@kmau.com.tw ※</p>
                <div class=" row justify-content-end">
                    <div class="col-md-4 text-center goods">收貨人簽章:___________________</div>
                </div>
            </div>
        </div>
    </div>
</form>
composer require barryvdh/laravel-debugbar
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>