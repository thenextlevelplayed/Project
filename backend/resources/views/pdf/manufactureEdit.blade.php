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

<body>
    <div class="container">
        <div class="col-md-12 card-title text-center">
            <p style="font-size:30px">楷模資訊 工單管理</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                工單編號:{{ $manu->mid }}
            </div>
            <div class="col-md-12">
                客戶聯絡人:{{ $manu->qcontact }}
            </div>
            <div class="col-md-12">
                客戶名稱:{{ $manu->cname }}
            </div>
            <div class="col-md-12">
                客戶信箱:{{ $manu->cmail }}
            </div>
            <div class="col-md-12">
                客戶統編:{{ $manu->cid }}
            </div>
            <div class="col-md-12">
                工單備註:<br>
                {{$manu->mremark}}
                <hr>
            </div>
        </div>

        <div class="text-center">
            <p style="font-size:20px">工單商品內容</p>
        </div>
        <table class="table">
            <thead class="text-primary">
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


            </thead>
            <tbody>
                @foreach ($dtl as $key => $item)
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
                        <p>{{ $item->remark }}</p>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <div class="container-fluid">
            <p style="text-align:right">客戶簽名:_____________</p>

        </div>


    </div>
</body>