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
            background-size: cover;
            background-image: url('/assets/img/skyline-1869214_1920.jpg');   
        }

        .logo img{
            width:100px;
            position: relative;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }

        .loginBox {
            height: 100vh;
        }

        #loginForm {
            width:400px;
            height:620px;
            padding: 25px;
            background-color: #FFF;
            border-radius: 10px;
            overflow: hidden;
            position:relative;
            transform: translate(-50%,-50%);
            left:50%;
            top:50vh;
        }

        .textColor {
            color: #2F5B7C;
        }
        
        .logo{
            height:250px;
            width:100%;
        }

        .smalltext{
            color:#b3b3b3;
            text-align: center;
            padding-top:15px;
            font-size: 15px
            
        }

        .loginBox h3{
            font-size:25px;
        }

        .errorText{
            text-align: center;
            color:#FFFFFF;
            font-size:17px;
            font-weight:400;
            background-color:#DB3D3C;
            border-radius:5px;
            height:300px;
            width:450px;
            padding-top:10px;
            margin-top:15px;
            transform:translateX(-11%);
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

<body>

    <div id="body">
        <div id="login">
            <div class="container-fluid">
                <div id="loginRow" class="row justify-content-center align-items-center">
                    <div id="loginCol" class="col-md-12">
                        
                        
                        <form id="loginForm" class="form shadow" action="/member/login" method="post">
                            @csrf
                            <div class="logo">
                                <img src="{{ URL::asset('assets/img/kaimo.png') }}" alt="">
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
                                <!-- <div class="smalltext">
                                    <p>2022 KAIMO,Inc</p>
                                </div> -->
                                

                                {{-- 有錯誤帶回顯示 --}}
                                @if($errors->any())  
                                    <div class ="errorText">
                                    <span>{{$errors->first()}}</span>
                                    <br>
                                    </div>
                                    
                                @endif
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
