<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>報價單內容</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />   
    <link href="/assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />    
    <link href="/assets/demo/demo.css" rel="stylesheet" />
</head>


<body class="">
    <div class="wrapper ">
        {{-- 路由方法 --}}
        <form class="form-horizontal" action="/customer/create" method="POST" >
        @csrf
        <fieldset>
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
                    <li>
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
                    <li >
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
                    <li class="active">
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
                    <li class="active-pro">
                        <a href="">
                            <i class="now-ui-icons business_badge"></i>
                            <p>員工基本資料</p>
                        </a>
                    </li>
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
                            <a class="navbar-brand" href="/main/quote">客戶管理</a>
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
                                <input type="text" value="" class="form-control" placeholder="輸入客戶名稱">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/member/login">
                                    <span>登入/登出</span>
                                    <i class="now-ui-icons users_single-02"></i>                                   
                                </a>
                            </li>
                        </ul>
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
                                <h4 class="card-title text-center"> 凱茂資訊 客戶資訊</h4>
                            </div>                            
                            <div class="card-body">
                                {{-- 客戶資訊 --}}
                                <div class="table-responsive">
                                    <div  class="mb-3">
                                    </div>
                                    <div  class="row mb-3">
                                        <div class="col-lg-6">
                                            
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*統一編號</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" required>
                                                </div>
                                            </div>
                                        
                                        
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*交易暗語</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*開立形式</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>公司負責人</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>公司傳真</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>業務負責人</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*公司名稱</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*交易對象</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>*公司信箱</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>公司電話</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>公司地址</p></div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-3"><p>通訊地址</p></div>
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
                        <a class="btn btn-primary " href="#">
                            <span>匯入客戶資料</span>
                        </a>
                        <a class="btn btn-primary" href="/main/receipt">
                            <span>存檔</span>
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
