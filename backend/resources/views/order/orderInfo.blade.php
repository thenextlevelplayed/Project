<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="kaimau-icon" sizes="76x76" href="../assets/img/logo-color.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-color.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>訂單明細</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    <link href="/css/orderInfo.css" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="/main" class="simple-text logo-mini">
                    K
                </a>
                <a href="/main" class="simple-text logo-normal">
                    凱茂資訊
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="/main/erp">
                            <i class="now-ui-icons design_app"></i>
                            <p>進銷存管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/quote">
                            <i class="now-ui-icons files_paper"></i>
                            <p>報價單管理</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/main/order">
                            <i class="now-ui-icons education_paper"></i>
                            <p>訂單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/manufacture">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                            <p>工單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/delivery">
                            <i class="now-ui-icons shopping_delivery-fast"></i>
                            <p>出貨單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/receipt">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>發票管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/main/customer">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>客戶管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="now-ui-icons text_caps-small"></i>
                            <p>前台消息管理</p>
                        </a>
                    </li>
                    {{-- <li class="active-pro">
                        <a href="">
                            <i class="now-ui-icons business_badge">
                            </i>
                            <p>員工基本資料</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- 上方Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <h4>
                            <a class="navbar-brand" href="">訂單管理</a>
                        </h4>                        
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="輸入訂單編號或客戶名稱">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <!-- 會員頭像 -->
                        <div class="dropdown ">
                            <button class="btn btn-primary-outline dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_single-02"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="#">會員資訊</a><hr/>
                              <a class="dropdown-item" href="#">會員OOOO</a><hr/>
                              <a class="dropdown-item" href="#">登出</a>
                            </div>
                        </div>

                        {{-- <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="container-xl">
                                <div class="customerInfo">
                                    <h4 class="text-center">凱 茂 資 訊 股 份 有 限 公 司 訂 單</h4>
                                
                                    {{-- 訂單建立日期 --}}
                                    <div class="row row-cols-auto">
                                        <div class="col pl-5 ml-5 mt-3"><span>訂單建立日期：{{}}</span></div>                                        
                                    </div>
                                    {{-- 客戶名稱 --}}
                                    <div class="row row-cols-auto">
                                       <div class="col pl-5 ml-5 mt-3"><span>客戶名稱：</span></div>                                        
                                    </div>
                                    {{-- 客戶統編 --}}
                                    <div class="row row-cols-auto">
                                        <div class="col pl-5 ml-5 mt-3"><span>客戶統編：</span></div>                                        
                                     </div>
                                    {{-- 聯絡人 --}}
                                    <div class="row row-cols-auto">
                                       <div class="col pl-5 ml-5 mt-3"><span>聯絡人員：</span></div>                                        
                                    </div>
                                    {{-- 聯絡電話 --}}
                                    <div class="row row-cols-auto">
                                       <div class="col pl-5 ml-5 mt-3"><span>聯絡電話：</span></div>
                                        
                                    </div>
                                    {{-- 訂單編號 --}}
                                    <div class="row row-cols-auto">
                                       <div class="col pl-5 ml-5 mt-3"><span>出貨編號：</span></div>                                        
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
                                                        00
                                                    </td>
                                                    <td name="price">0000</td>
                                                    <td name="total">000000000</td>
                                                    <td name="tax">000000000</td>
                                                    <td name="remark">000000000</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>beepbeep</td>
                                                    <td>華碩</td>
                                                    <td name="quantity">
                                                        00
                                                    </td>
                                                    <td name="price">00000</td>
                                                    <td name="total">000000000</td>
                                                    <td name="tax">000000000</td>
                                                    <td name="remark">000000000</td>
                                                </tr>
                                                <tr>
                                                    <td>beepbeep</td>
                                                    <td>華碩</td>
                                                    <td name="quantity">
                                                        00
                                                    </td>
                                                    <td name="price">0000</td>
                                                    <td name="total">000000000</td>
                                                    <td name="tax">000000000</td>
                                                    <td name="remark">000000000</td>
                                                </tr>
                                                <tr>
                                                    <td>beepbeep</td>
                                                    <td>華碩</td>
                                                    <td name="quantity">
                                                        00
                                                    </td>
                                                    <td name="price">0000</td>
                                                    <td name="total">000000000</td>
                                                    <td name="tax">000000000</td>
                                                    <td name="remark">000000000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class=" row justify-content-end">
                                            <div class="col-md-1 text-center goods">總計</div>
                                            <div class="col-md-2 text-center goods">00000000000</div>
                                        </div>
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <div class=" row justify-content-end">
                                            <div class="col-md-4 text-center goods">收貨人簽章:   ___________________</div>
                                        </div>
                                        <br />
                                        <br />
                                        <p class="text-center">※請協助回簽出貨單, FAX:04-23759399 or E-mail: service@kmau.com.tw ※</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 按鈕 --}}
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary " href="/main/delivery">
                                <span>返回</span>
                            </a>
                            <a class="btn btn-primary " href="#">
                                <span>匯出PDF</span>
                            </a>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center"> E-mail</h4>
                                </div>                            
                                <form class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-lg-2">
                                            <p>收件人</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-2">
                                            <p>主旨</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-2">
                                            <p>收件人信箱</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-2">
                                            <p>內容</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <textarea name="" id="" cols="90" rows="10"></textarea>
                                        </div>
                                    </div>                                
                                </form>
                            </div>
                        </div>
                        {{-- 按鈕 --}}
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary" href="">
                                <span>發送Email和出貨單PDF至客戶信箱</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

</html>

