<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div id="body">
        <div class="container">
            <h1> 凱茂資訊</h1>
            <div class="row row1">
                <a class="col m-1 " href="">
                    <p>0</p>
                    <p>進銷存管理</p>
                </a>
                <a class="col m-1 " href="">
                    <p>1</p>
                    <p>報價</p>
                </a>
                <a class="col m-1" href="">
                    <p>2</p>
                    <p>訂單</p>
                </a>
                <a class="col m-1" href="">
                    <p>3</p>
                    <p>製造</p>
                </a>
                <a class="col m-1" href="">
                    <p>4</p>
                    <p>出貨</p>
                </a>
            </div>
            <div class="row row2">
                <a class="col  m-1" href="">
                    <p>前台消息管理</p>
                </a>
                <a class="col  m-1" href="">
                    <p>員工基本資料</p>
                </a>
                <a class="col  m-1" href="">
                    <p>客戶管理</p>
                </a>
            </div>
            <div id="logout" class="text-right mt-3">
                {{-- 判斷權限,沒權限不會有這個功能 --}}
                @if (session('power'))  
                    <a href="/member/create">新增帳號</a>
                @endif
                <a href="/member/logout">登出</a>
            </div>
        </div>
    </div>


    <script>



    </script>


</body>

</html>