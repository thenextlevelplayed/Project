<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>報價管理</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">    
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />    
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    {{-- <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" /> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    K
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
                    <li class="active">
                        <a href="/main/quote">
                            <i class="now-ui-icons education_atom"></i>
                            <p>報價單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/order">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>訂單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/manufacture">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>工單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="/main/delivery">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>出貨單管理</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>發票管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="">
                            <i class="now-ui-icons design_bullet-list-67"></i>
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
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
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
                        <a class="navbar-brand" href="#pablo">報價單管理</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱查詢">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                報價單編號
                                            </th>
                                            <th>
                                                客戶名稱
                                            </th>
                                            <th>
                                                訂單編號
                                            </th>
                                            <th>
                                                成立訂單
                                            </th>
                                            <th class="text-right">
                                                編輯
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    KMQ20220623001
                                                </td>
                                                <td>
                                                    華碩
                                                </td>
                                                <td>
                                                    KMO20220624001
                                                </td>
                                                <td class="text-right">
                                                    $36,738
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMQ20220623002
                                                </td>
                                                <td>
                                                    iSpan
                                                </td>
                                                <td>
                                                    KMO20220624002
                                                </td>
                                                <td class="text-right">
                                                    $23,789
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMQ20220623003
                                                </td>
                                                <td>
                                                    華碩
                                                </td>
                                                <td>
                                                </td>
                                                <td class="text-right">
                                                    $56,142
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMQ20220624001
                                                </td>
                                                <td>
                                                    Dell
                                                </td>
                                                <td>
                                                    KMO20220625001
                                                </td>
                                                <td class="text-right">
                                                    $38,735
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMQ20220624001
                                                </td>
                                                <td>
                                                    Dell
                                                </td>
                                                <td></td>
                                                <td class="text-right">
                                                    $63,542
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-header">
                                <a href="">
                                    <i class="now-ui-icons design_app"></i>
                                    <span>新增報價單</span>
                                </a>
                            </div>
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
