<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="kaimau-icon" sizes="76x76" href="../assets/img/logo-color.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-color.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>訂單內容</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />   
    <link href="/assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />    
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    <link href="/css/orderEdit.css" rel="stylesheet" />
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
                        <a href="">
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
                            <i class="now-ui-icons business_badge"></i>
                            <p>員工基本資料</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
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
                            <a class="navbar-brand" href="/main/quote">訂單管理</a>
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

                        <div class="dropdown">
                            <button class="btn btn-primary-outline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_single-02"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">會員資訊</a><hr/>
                              <a class="dropdown-item" href="#">會員OOOO</a><hr/>
                              <a class="dropdown-item" href="#">登出</a>
                            </div>
                        </div>

                        {{-- <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/member/login">
                                    <span>登入/登出</span>
                                    <i class="now-ui-icons users_single-02"></i>                                   
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm"></div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center"> 凱茂資訊 訂單</h4>
                            </div>                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div  class="mb-3">
                                        <h5>客戶資訊</h5>
                                    </div>
                                    <div  class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>訂單編號</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" required>
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
                                        </div>
                                        <div class="col-lg-6">
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
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <h5>訂單明細</h5>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">商品名稱</th>
                                                        <th scope="col">商品編號</th>
                                                        <th scope="col">數量</th>
                                                        <th scope="col">單價</th>
                                                        <th scope="col">小計</th>
                                                        <th scope="col">備註</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                        <td> <input type="text" class="form-control" required></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-2"><p>總計</p></div>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" required>
                                            </div>
                                        </div>                                 
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <h4>凱茂方案</h4>
                                    </div>
                                    <div  class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-12">
                                                    <p>企業方案</p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>業務專員</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>凱茂信箱</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 text-right">
                        <a class="btn btn-primary mr-3" href="">
                            <span>取消訂單</span>
                        </a>
                        <a class="btn btn-primary mr-3" href="">
                            <span>預覽</span>
                        </a>
                        <a class="btn btn-primary" href="">
                            <span>存檔</span>
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
                    <div class="col-md-12 text-right">
                        <a class="btn btn-primary" href="">
                            <span>發送Email和訂單PDF至客戶信箱</span>
                        </a>
                    </div>
                    <div class="col-md-12 text-right">
                        <a class="btn btn-primary" href="">
                            <span>訂單成立，轉為工單</span>
                        </a>
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
