<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>報價管理</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    {{-- head帶入 --}}
    @yield('head')

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
                        <a id="test">
                            <i class="now-ui-icons design_app" style="pointer-events: none;"></i>
                            <p>進銷存管理</p>
                        </a>
                    </li>
                    <ul id="testNav" class="text-center" style="list-style-type:none;" >
                        {{-- 判斷 Route 給 active --}}
                        <li 
                            <?php
                                if($_SERVER['REQUEST_URI'] == '/main/purchase'){
                                    echo  "class='active'";
                                }
                            ?>
                        >
                            <a href="/main/purchase">
                                <p>進貨管理</p>
                            </a>
                        </li>
                        <li 
                            <?php
                                if($_SERVER['REQUEST_URI'] == '/main/sales'){
                                    echo  "class='active'";
                                }
                            ?>
                        >
                            <a href="/main/sales">
                                <p>銷貨管理</p>
                            </a>
                        </li>
                        <li 
                            <?php
                                if($_SERVER['REQUEST_URI'] == '/main/stock'){
                                    echo  "class='active'";
                                }
                            ?>
                        >
                            <a href="/main/stock">
                                <p>庫存管理</p>
                            </a>
                        </li>
                    </ul>
                    <li 
                        <?php
                            if($_SERVER['REQUEST_URI'] == '/main/quote'){
                                echo  "class='active'";
                            }
                        ?>
                    >
                        <a href="/main/quote">
                            <i class="now-ui-icons files_paper"></i>
                            <p>報價單管理</p>
                        </a>
                    </li>
                    <li 
                        <?php
                            if($_SERVER['REQUEST_URI'] == '/main/order'){
                                echo  "class='active'";
                            }
                        ?>
                    >
                        <a href="/main/order">
                            <i class="now-ui-icons education_paper"></i>
                            <p>訂單管理</p>
                        </a>
                    </li>
                    <li 
                        <?php
                            if($_SERVER['REQUEST_URI'] == '/main/manufacture'){
                                echo  "class='active'";
                            }
                        ?>
                    >
                        <a href="/main/manufacture">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                            <p>工單管理</p>
                        </a>
                    </li>
                    <li 
                        <?php
                            if($_SERVER['REQUEST_URI'] == '/main/delivery'){
                                echo  "class='active'";
                            }
                        ?>
                    >
                        <a href="/main/delivery">
                            <i class="now-ui-icons shopping_delivery-fast"></i>
                            <p>出貨單管理</p>
                        </a>
                    </li>
                    <li 
                        <?php
                            if($_SERVER['REQUEST_URI'] == '/main/receipt'){
                                echo  "class='active'";
                            }
                        ?>
                    >
                        <a href="/main/receipt">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>發票管理</p>
                        </a>
                    </li>
                    <li>
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
                            {{-- 藍藍navbar title --}}
                            <a class="navbar-brand" href="/main/quote">報價單管理</a>
                        </h4>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                {{-- 搜尋列 --}}
                                <input type="text" value="" class="form-control" placeholder="輸入報價單號或客戶名稱">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        {{-- 右上人像控制 1. 員工基本資料 2.登出 --}}
                        <div class="navbar-nav">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">帳號管理</a>
                                    <a class="dropdown-item" href="#">登出</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            {{-- 藍藍navbar的背景 --}}
            <div class="panel-header panel-header-sm"></div>

            {{-- 內容代入 --}}
            @yield('content')

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

<script>
    //進銷存 開關 
    $('#test').on('click', function() {
        // console.log('ok');
        $('#testNav').toggle('normal');
    })


    //進銷存, 控制 display 收合
    $path = $(location).attr('pathname');
    if($path == '/main/purchase' || $path == '/main/sales' || $path == '/main/stock'){
        console.log($(location).attr('pathname'))
        $('#testNav').css('display','normal');
    }else{
        $('#testNav').css('display','none');
    }



</script>


</html>