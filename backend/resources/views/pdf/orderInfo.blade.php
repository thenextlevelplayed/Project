<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

{{-- 字型 --}}
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

{{-- 表單內容 --}}
<div class="row">
    <div class="col-md-12">
        <form class="card">
            <div class="card-header">
                <p class="card-title text-center"> 凱茂資訊 訂單明細</p>
            </div>                            
            <div class="card-body">
                <div class="table-responsive">
                    <div  class="mb-3">
                        <p>客戶資訊</p>
                    </div>
                    <div  class="row mb-3">
                        <div class="col-lg-6">
                            <fieldset disabled>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>訂單編號</p></div>
                                    <div class="col-lg-8">{{$order->oid}}
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>公司名稱</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>公司統編</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset disabled>    
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>建立日期</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>聯絡人</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3"><p>聯絡電話</p></div>
                                    <div class="col-lg-8">
                                        <input type="text" class="" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>                                    
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <p>訂單明細</p>
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
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                        <td> 
                                            <fieldset disabled>
                                                <input type="text" class="form-control" required>
                                            </fieldset>
                                        </td>
                                    </tr>                                            
                                </tbody>
                            </table> 
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-2"><p>總計</p></div>
                            <div class="col-lg-5">
                                <fieldset disabled>
                                    <input type="text" class="form-control" required>
                                </fieldset>
                            </div>
                        </div>                                 
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <p>凱茂方案</p>
                    </div>
                    <div  class="row mb-3">
                        <div class="col-lg-6">
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <p>企業方案</p>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset disabled>
                                        <input type="text" required>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-1">
                                <div class="col-lg-3"><p>業務專員</p></div>
                                <div class="col-lg-8">
                                    <fieldset disabled>
                                        <input type="text" class="" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-3"><p>凱茂信箱</p></div>
                                <div class="col-lg-8">
                                    <fieldset disabled>
                                        <input type="text" class="" required>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





