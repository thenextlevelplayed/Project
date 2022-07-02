<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        #body {
            background-color: #E8EDF0;
        }

        .createBox {
            margin-top: 30px;
            margin-bottom: 30px;
            max-width: 600px;
        }

        #createForm {
            padding: 20px;
            background-color: #FFF;
        }

        .textColor {
            color: #2F5B7C;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

<body>

    <div id="body">
        <div id="create">
            <h1 class="text-center pt-5 textColor">新增帳號系統</h1>
            <div class="container">
                <div id="createRow" class="row justify-content-center align-items-center">
                    <div id="createCol" class="col-md-6">
                        <div class="createBox col-md-12">
                            <form id="createForm" class="form border rounded shadow" action="/member/login"
                                method="post">
                                @csrf
                                <h3 class="text-center textColor">Create</h3>
                                <div class="form-group">
                                    <label for="username" class="textColor">Account:</label><br>
                                    <input type="text" name="account" id="account" class="form-control"
                                        placeholder="請輸入帳號">
                                </div>
                                <div class="form-group">
                                    <label for="passwd" class="textColor">Password:</label><br>
                                    <input type="text" name="passwd" id="passwd" class="form-control"
                                        placeholder="請輸入密碼">
                                </div>
                                <div class="form-group">
                                    <label for="passwd" class="textColor">UserName:</label><br>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="請輸入名稱">
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="textColor">Telphone:</label><br>
                                    <input type="text" name="tel" id="tel" class="form-control"
                                        placeholder="請輸入電話">
                                </div>
                                <div class="form-group">
                                    <label for="addr" class="textColor">Address:</label><br>
                                    <input type="text" name="addr" id="addr" class="form-control"
                                        placeholder="請輸入地址">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="textColor">Email:</label><br>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="請輸入Email">
                                </div>
                                <div class="form-group">
                                    {{-- 權限選擇 --}}
                                    <span class="textColor">Power:</span><br />
                                    <label class="ml-1 mt-1">
                                        <input type="radio" name="power" id="power1" value="1"
                                            autocomplete="off" checked>
                                        一般員工
                                    </label>
                                    <label class="ml-1 mt-1">
                                        <input type="radio" name="power" id="power2" value="0"
                                            autocomplete="off">
                                        管理員
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" class="btn btn-info mx-3" value="Submit">
                                    <input type="submit" name="cancle" class="btn btn-danger mx-3" value="Cancle">
                                    {{-- 有錯誤帶回顯示 --}}
                                    {{-- @if ($errors->any())  
                                        <span class="ml-2">{{$errors->first()}}</span>
                                    @endif --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
