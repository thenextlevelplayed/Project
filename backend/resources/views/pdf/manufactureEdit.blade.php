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

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container p-5">
                        <div>
                            <div class="col-md-12 card-title text-center">
                                <p>凱茂資訊 工單管理</p>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">工單編號</label>
                                    <input class="form-control" type="text" placeholder="666" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">客戶聯絡人</label>
                                    <input class="form-control" type="text" placeholder="666" readonly>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">客戶名稱</label>
                                    <input class="form-control" type="text" placeholder="666" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">客戶信箱</label>
                                    <input class="form-control" type="text" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">客戶統編</label>
                                    <input class="form-control" type="text" placeholder="" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">工單成立日期</label>
                                    <input class="form-control" type="text" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 mb-3">
                                    <label for="exampleFormControlTextarea1">工單備註</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">客戶施工處危險需注意安全</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <div class="col-md-12 card-title text-center">
                                <p>工單商品內容</p>
                            </div>
                            <table class="table table-hover">
                                <thead class="text-primary" style="white-space: nowrap">
                                    <td>
                                        商品名稱
                                    </td>
                                    <td>
                                        商品型號
                                    </td>
                                    <td>
                                        商品數量
                                    </td>
                                    <td>
                                        商品備註
                                    </td>
                                    <td>
                                        完成
                                    </td>

                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                            123
                                        </td>
                                        <td>
                                            123
                                        </td>
                                        <td>
                                            123
                                        </td>
                                        <td>
                                            <div style="width:300px">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">電腦超重需要使用推車</textarea>
                                            </div>
                                        </td>
                                        <td style = "text-align: center">
                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                        </td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                        </div>

                        {{-- <div class = "container-fluid border">
                            <br>
                            <br>
                            
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                企業方案：<br>
                                週年慶滿千送百
                            </div>
                            <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                業務專員：林小姐<br>
                                凱茂信箱：km2468@gmail.com
                            </div>
                        </div>
                    
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>