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
            height: 100vh;
            background-image: url('https://cdn.pixabay.com/photo/2016/11/29/11/34/skyline-1869214_1280.jpg');
            background-size: cover;
            
        }

        .loginBox {
            height: 100vh;
        }

        #loginForm {
            width:400px;
            height:600px;
            padding: 25px;
            background-color: #FFF;
            border-radius: 10px;
            overflow: hidden;
            margin-top:50%;
            margin-left:50%;
            transform: translate(-50%,-25%);    
        }

        .textColor {
            color: #2F5B7C;
        }
        
        .logo{
            height:200px;
            width:100%;
        }

        .smalltext{
            color:#b3b3b3;
            text-align: center;
            padding-top:30px;
            font-size: 15px
            
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

<body>

    <div id="body">
        <div id="login">
            <div class="container">
                <div id="loginRow" class="row justify-content-center align-items-center">
                    <div id="loginCol" class="col-md-6">
                        <div class="loginBox col-md-12">
                            
                            <form id="loginForm" class="form shadow" action="/member/login" method="post">
                                @csrf
                                <div class="logo">

                                </div>
                                <h3 class="text-center textColor">後台系統</h3>
                                <div class="form-group">
                                    <label for="account" class="textColor">帳號 Account:</label><br>
                                    <input type="text" name="account" id="account" class="form-control"
                                        placeholder="請輸入帳號" value="{{ Cookie::get('account') }}">  {{-- 有Cookie 帶入 --}}
                                </div>
                                <div class="form-group">
                                    <label for="passwd" class="textColor">密碼 Password:</label><br>
                                    <input type="password" name="passwd" id="passwd" class="form-control"
                                        placeholder="請輸入密碼" value="{{ Cookie::get('passwd') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="rememberMe" class="textColor">Remember Me</label>
                                    <span><input id="rememberMe" name="rememberMe" type="checkbox" {{ Cookie::get('rememberMe') }}></span><br>
                                    <input type="submit" name="submit" class="btn btn-info btn-block" value="登入">
                                    <div class="smalltext">
                                        <p>2022 KAIMO,Inc</p>
                                    </div>
                                    

                                    {{-- 有錯誤帶回顯示 --}}
                                    @if($errors->any())  
                                        <span class="ml-2">{{$errors->first()}}</span>
                                    @endif
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
