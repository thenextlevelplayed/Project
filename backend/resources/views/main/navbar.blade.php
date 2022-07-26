<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="kaimau-icon" sizes="76x76" href="/assets/img/logo-color.png">
    <link rel="icon" type="image/png" href="/assets/img/logo-color.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>楷模資訊 KAIMO</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    <link href="/assets/css/main.css" rel="stylesheet" />


    {{-- 各網頁的CSS --}}
    <?php
    //    GET PUBLIC FOLDER FILES (NAME)
    // if ($handle = opendir(public_path('css'))) { //打開public資料夾 搜尋css副檔名
    // echo $handle; //Resource id #547
    // echo $_SERVER['SCRIPT_FILENAME'];;
    
    // while (false !== ($entry = readdir($handle))) {
    // if ($entry != "." && $entry != "..") {
    // echo "<link href=" . '"'."/css/".$entry.'"'." rel=". '"'."stylesheet".'"'."/>"; // NAME OF THE FILE
    // var_dump($entry); // string
    // echo $entry."<br>";
    // echo substr( $entry,-3 )."<br>";
    // if($_SERVER['REQUEST_URI'] == '/main/delivery'){
    //     echo  "class='active'";
    // }
    //     }
    // }
    // closedir($handle);
    // }
    ?>



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
                    楷模資訊
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <?php
                        $permission = Session::get('permission');
                         if ($permission==1 or $permission==4 or $permission==3){
                                echo "<a id='test'>
                            <i class='now-ui-icons design_app' style='pointer-events: none;'></i>
                            <p>進銷存管理</p>
                        </a>";
                            }else{}    
                        ?>
                        {{-- <a id="test">
                            <i class="now-ui-icons design_app" style="pointer-events: none;"></i>
                            <p>進銷存管理</p>
                        </a> --}}
                    </li>
                    <ul id="testNav" class="text-center" style="list-style-type:none;">
                        {{-- 判斷 Route 給 active --}}
                        <li <?php
                        if (preg_match('/main\/purchase/', $_SERVER['REQUEST_URI'])) {
                            echo "class='active'";
                        }
                        ?>>

                            <?php 
                            $permission = Session::get('permission');

                            if ($permission==1 or $permission==4){
                                echo "<a href='/main/purchase'><i class='now-ui-icons files_paper'></i><p> 進貨管理</p></a>";
                            }else{
                                // echo "<a href='#'><p> 進貨管理</p></a>";
                            }   
                            ?>
                            {{-- <a href="/main/purchase">
                                <p> 進貨管理</p>
                            </a> --}}
                        </li>
                        <li <?php
                        if (preg_match('/main\/stock/', $_SERVER['REQUEST_URI'])) {
                            echo "class='active'";
                        }
                        ?>>

                            <?php 
                            $permission = Session::get('permission');

                            if ($permission==3 or $permission==1 or $permission==4){
                                echo "<a href='/main/stock'><i class='now-ui-icons files_paper'></i><p> 庫存管理</p></a>";
                            }else{
                                // echo "<a href='#'><p> 庫存管理</p></a>";
                            }   
                            ?>
                            {{-- <a href="/main/stock">
                                <p> 庫存管理</p>
                            </a> --}}
                        </li>
                    </ul>
                    <li <?php
                    if ($_SERVER['REQUEST_URI'] == '/main/quotation') {
                        echo "class='active'";
                    }
                    ?>>
                        <?php 
                            $permission = Session::get('permission');

                           if ($permission==3 or $permission==1){
                                echo "<a href='/main/quotation'><i class='now-ui-icons files_paper'></i><p> 報價單管理</p></a>";
                            }else{
                                // echo "<a href='#'><i class='now-ui-icons files_paper'></i><p> 報價單管理</p></a>";
                            }   
                        ?>
                        {{-- <a href="/main/quotation">
                            <i class="now-ui-icons files_paper"></i>
                            <p>報價單管理</p>
                        </a> --}}
                    </li>
                    <li <?php
                    if ($_SERVER['REQUEST_URI'] == '/main/order') {
                        echo "class='active'";
                    }
                    ?>>
                        <?php
                            if ($permission==3 or $permission==1){
                                echo "<a href='/main/order'><i class='now-ui-icons education_paper'></i><p> 訂單管理</p></a>";
                            }else{
                                // echo "<a href='#'><i class='now-ui-icons files_paper'></i><p> 訂單管理</p></a>";
                            }   
                        ?>
                        {{-- <a href="/main/order">
                            <i class="now-ui-icons education_paper"></i>
                            <p>訂單管理</p>
                        </a> --}}
                    </li>
                    <li <?php
                    if (substr($_SERVER['REQUEST_URI'], 0, 17) == '/main/manufacture') {
                        echo "class='active'";
                    }
                    ?>>
                        <?php
                            if ($permission==2 or $permission==1){
                                echo "<a href='/main/manufacture'><i class='now-ui-icons ui-2_settings-90'></i><p> 工單管理</p></a>";
                            }else{
                                // echo "<a href='#'><i class='now-ui-icons ui-2_settings-90'></i><p> 工單管理</p></a>";
                            }   
                        ?>
                        {{-- <a href="/main/manufacture">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                            <p>工單管理</p>
                        </a> --}}
                    </li>
                    <li <?php
                    if ($_SERVER['REQUEST_URI'] == '/main/delivery') {
                        echo "class='active'";
                    }
                    ?>>
                    <?php
                        if ($permission==4 or $permission==1){
                            echo "<a href='/main/delivery'><i class='now-ui-icons shopping_delivery-fast'></i><p> 出貨單管理</p></a>";
                        }else{
                            // echo "<a href='#'><i class='now-ui-icons shopping_delivery-fast'></i><p> 出貨單管理</p></a>";
                        }   
                    ?>
                        {{-- <a href="/main/delivery">
                            <i class="now-ui-icons shopping_delivery-fast"></i>
                            <>出貨單管理<//p>
                        </a> --}}
                    </li>


                    {{-- <li 
                    <?php
                    // if ($_SERVER['REQUEST_URI'] == '/main/receipt') {
                    //     echo "class='active'";
                    // }
                    ?>
                    >
                        <a href="/main/receipt">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>發票管理</p>
                        </a>
                    </li> --}}


                    
                    <li <?php
                    if ($_SERVER['REQUEST_URI'] == '/main/customer') {
                        echo "class='active'";
                    }
                    ?>>
                    <?php
                        if ($permission==4 or $permission==1){
                            echo "<a href='/main/customer'><i class='now-ui-icons users_circle-08'></i><p> 客戶管理</p></a>";
                        }else{
                            // echo "<a href='#'><i class='now-ui-icons users_circle-08'></i><p> 客戶管理</p></a>";
                        }   
                    ?>
                        {{-- <a href="/main/customer">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>客戶管理</p>
                        </a> --}}
                    </li>
                    <li>
                        <?php
                            if ($permission==4 or $permission==1){
                                echo "<a href='/main/news'><i class='now-ui-icons text_caps-small'></i><p> 前台消息管理</p></a>";
                            }else{
                                // echo "<a href='#'><i class='now-ui-icons text_caps-small'></i><p> 前台消息管理</p></a>";
                            }   
                        ?>
                        {{-- <a href="/main/news">
                            <i class="now-ui-icons text_caps-small"></i>
                            <p>前台消息管理</p>
                        </a> --}}
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

                        {{-- 藍藍navbar title --}}
                        @yield('navTitle')
                        {{-- <h4>    
                            <a class="navbar-brand" href="/main/quote">報價單管理</a>
                        </h4> --}}
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form name="searchform" action=''>
                            <div class="input-group no-border">
                                {{-- 搜尋列 --}}
                                @yield('searchBox')
                                {{-- <input type="query" name ="search" value="" class="form-control" placeholder="輸入單號或客戶名稱">                            
                                <span class="input-group-addon" onclick="searchform.submit()">                                    
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>       
                                </span> --}}
                            </div>
                        </form>
                        {{-- 右上人像控制 1. 員工基本資料 2.登出 --}}
                        <span class="ml-4">{{ Session::get('name') }}</span>
                        <div class="navbar-nav">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/member/memberInfo/{{ Session::get('name') }}">帳號管理</a>
                                    <a class="dropdown-item" href="/member/logout">登出</a>
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
<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/demo/demo.js"></script>
<script src="https://kit.fontawesome.com/ecf6d354b0.js" crossorigin="anonymous"></script>

<script>
    //進銷存 開關 
    $('#test').on('click', function() {
        // console.log('ok');
        $('#testNav').toggle('normal');
    })


    //進銷存, 控制 display 收合
    $path = $(location).attr('pathname');
    if ($path.includes('/main/purchase') || $path.includes('/main/stock')) {
        console.log($(location).attr('pathname'))
        $('#testNav').css('display', 'normal');
    } else {
        $('#testNav').css('display', 'none');
    }
</script>

@yield('script')



</html>
