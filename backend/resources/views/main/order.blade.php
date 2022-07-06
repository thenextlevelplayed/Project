<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="kaimau-icon" sizes="76x76" href="../assets/img/logo-color.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-color.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>訂單管理</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />   
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />    
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="../css/order.css" rel="stylesheet" />
</head>

<!-- 側欄目錄 -->
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
                                <input type="text" value="" class="form-control" placeholder="輸入訂單編號或客戶名稱查詢">
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>
                                                訂單編號
                                            </th>
                                            <th>
                                                客戶名稱
                                            </th>
                                            <th>
                                                總計
                                            </th>
                                            <th>
                                                工單編號
                                            </th>
                                            <th>
                                                成立工單
                                            </th>
                                            <th>
                                                編輯
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- {{$d->Oid}} --}}
                                                <td><a href="/main/order" class="link" style="background:0 ; color:#000000">KMO20220623001</td>
                                                {{-- {{$d->firstName}} --}}
                                                <td>
                                                    華碩
                                                </td>
                                                <td>
                                                    9999
                                                </td>
                                                <td>
                                                    KMD20220624001
                                                </td>
                                                {{-- {{$d->Did}} --}}
                                                <td>
                                                    <span class="badge bg-success">
                                                        已成立訂單
                                                    </span> 
                                                </td>
                                                <td >
                                                    <div class="btn-group">
                                                        {{-- {{ url('/home') }} --}}
                                                        <a href="/main/order/1/edit" class="btn" style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMO20220623002
                                                </td>
                                                <td>
                                                    iSpan
                                                </td>
                                                <td>
                                                    9999
                                                </td>
                                                <td>
                                                    KMD20220624002
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">
                                                        已成立訂單
                                                    </span> 
                                                </td>
                                                <td >
                                                    <div class="btn-group">
                                                        {{-- {{ url('/home') }} --}}
                                                        <a href="/main/order/1/edit" class="btn" style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMO20220623003
                                                </td>
                                                <td>
                                                    華碩
                                                </td>
                                                <td>
                                                    9999
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning">
                                                        未完成訂單
                                                    </span> 
                                                </td>
                                                <td >
                                                    <div class="btn-group">
                                                        {{-- {{ url('/home') }} --}}
                                                        <a href="/main/order/1/edit" class="btn" style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMO20220624001
                                                </td>
                                                <td>
                                                    Dell
                                                </td>
                                                <td>
                                                    9999
                                                </td>
                                                <td>
                                                    KMD20220625001
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">
                                                        已成立訂單
                                                    </span> 
                                                </td>
                                                <td >
                                                    <div class="btn-group">
                                                        {{-- {{ url('/home') }} --}}
                                                        <a href="/main/order/1/edit" class="btn" style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KMO20220624001
                                                </td>
                                                <td>
                                                    Dell
                                                </td>
                                                <td>
                                                    9999
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span class="badge bg-danger">
                                                        已取消訂單
                                                    </span> 
                                                </td>
                                                <td >
                                                    <div class="btn-group">
                                                        {{-- {{ url('/home') }} --}}
                                                        <a href="/main/order/1/edit" class="btn" style="background: 0 ; color:rgb(122, 122, 122)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="text-right">
                                <a class="btn btn-primary" href="">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <span>新增訂單</span>
                                </a>
                            </div> --}}
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
