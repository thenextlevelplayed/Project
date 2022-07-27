<?php
include '../php/news.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>楷模資訊 WHATS NEWS</title>

    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/news.css">

    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="../css/slick.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
    <script src="https://cdn.staticfile.org/vue-router/2.7.0/vue-router.min.js"></script>

    <link rel="shortcut icon" href="../img/logo/favicon.ico" />
    <link rel="bookmark" href="../img/logo/favicon.ico" />

</head>

<body>
    <!-- hamberger -->
    <input type="checkbox" id="active">
    <label for="active" class="menu-btn">
        <span></span>
        <span></span> <!-- 3個span-->
        <span></span>
    </label>
    <label for="active" class="close"></label>
    <div class="wrapper">
        <div class="wapperContent">
            <img src="../img/logo/only-logo.png" style="width:80px;position: absolute;position:0px 0px;">

            <div class="wapperContentWord">
                <a href="./index.php">HOME</a><br>
                <a href="./aboutus.html">ABOUT</a><br>
                <a href="./news.php">NEWS</a><br>
                <a href="./contact.html">CONTACT</a>
            </div>
        </div>
    </div>

    <div class="newsBanner">
        <img src="../img/logo/verticle01.png">
    </div>


    <div class="container-fluid newsMain">
        <div class="mb-5 pt-5">
            <div class="container text-center">
                <h1 class="indexh1">WHAT'S NEW.</h1>
                <h2 class="indexh2 mb-5">最新消息</h2>
            </div>
        </div>

        <div class="slick container">
            <div class="container">
                <div class="row border carouselCard">
                    <div class="col-lg-6 carouselImage">
                        <?php echo '<img src="data:image/jpeg;base64,' . $blob1 . '"/>'; ?>
                        <!-- <img src="../資訊圖庫/A01.jpg"> -->
                    </div>
                    <div class="col-lg-6 carouselContent">
                        <h3 class="indexh3"><?php echo $title1; ?></h3>
                        <p class="indexp">
                            <?php echo $content1; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row border carouselCard">
                    <div class="col-lg-6 carouselImage">
                        <?php echo '<img src="data:image/jpeg;base64,' . $blob2 . '"/>'; ?>
                    </div>
                    <div class="col-lg-6 carouselContent">
                        <h3 class="indexh3"><?php echo $title2; ?></h3>
                        <p class="indexp">
                            <?php echo $content2; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row border carouselCard">
                    <div class="col-lg-6 carouselImage">
                        <?php echo '<img src="data:image/jpeg;base64,' . $blob3 . '"/>'; ?>
                    </div>
                    <div class="col-lg-6 carouselContent">
                        <h3 class="indexh3"><?php echo $title3; ?></h3>
                        <p class="indexp">
                            <?php echo $content3; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row border carouselCard">
                    <div class="col-lg-6 carouselImage">
                        <?php echo '<img src="data:image/jpeg;base64,' . $blob4 . '"/>'; ?>
                    </div>
                    <div class="col-lg-6 carouselContent">
                        <h3 class="indexh3"><?php echo $title4; ?></h3>
                        <?php echo $content4; ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row border carouselCard">
                    <div class="col-lg-6 carouselImage">
                        <?php echo '<img src="data:image/jpeg;base64,' . $blob5 . '"/>'; ?>
                    </div>
                    <div class="col-lg-6 carouselContent">
                        <h3 class="indexh3"><?php echo $title5; ?></h3>
                        <?php echo $content5; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid newsServices">



        <!-- 服務項目 -->
        <div class="container mb-5">
            <div>
                <h1 class="indexh1 mt-5 text-center">WHAT WE DO.</h1>
                <h2 class="indexh2 mt-5 text-center">服務項目</h2>
                <p class="indexp mt-3 px-30 text-center">
                    楷模資訊，能依客戶實際需求規劃最適合的解決方案，如主機虛擬化、郵件伺服器、備份備援、雲端運算、端點管理、網通架構、資訊安全等規劃......
                </p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 my-5">

                <div class="col card py-3">
                    <img class="card-img" src="../資訊圖庫/A22.jpg" alt="1">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">軟體銷售服務</h3>
                        <p class="card-text indexp3 txtIn">
                            微軟授權、防毒軟體、Adobe授權、繪圖軟體授權、虛擬軟體、開發工具、備份備援、郵件伺服器及其他服務。
                        </p>
                    </div>
                </div>
                <div class="col card py-3">
                    <img class="card-img" src="../資訊圖庫/A10.jpg" alt="2">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">雲端銷售服務</h3>
                        <p class="card-text indexp3 txtIn">
                            楷模資訊為微軟的雲端服務供應商(CSP),提供Azure、O365、M365、私有雲、混合雲、備份雲的規劃、導入與教育訓練。</p>
                    </div>
                </div>
                <div class="col card py-3">
                    <img class="card-img" src="../資訊圖庫/A01.jpg" alt="3">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">系統整合服務</h3>
                        <p class="card-text indexp3 txtIn">整合客戶現有資訊架構,根據客戶規模規劃建置適合之資訊系統。</p>
                    </div>
                </div>



                <div class="col card py-3">
                    <img class=" card-img" src="../資訊圖庫/A24.jpg" alt="4">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">網路規劃服務</h3>
                        <p class="card-text indexp3 txtIn">以安全層面考量為客戶進行網路架構規畫網路核心設備、建置設備監控主控台, 並包含機房機櫃等規劃及建置。</p>
                    </div>
                </div>
                <div class="col card py-3">
                    <img class="card-img" src="../資訊圖庫/A11.jpg" alt="5">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">資訊安全服務</h3>
                        <p class="card-text indexp3 txtIn">因應資安法規,協助客戶資安健檢、弱點掃描、滲透測試、社交工程演練等。提供資安軟硬體產品銷售及資安服務與課程。</p>
                    </div>
                </div>
                <div class="col card py-3">
                    <img class="card-img" src="../資訊圖庫/A21.jpg" alt="6">
                    <div class="card-img-overlay">
                        <h3 class="card-title indexh3">技術維護服務</h3>
                        <p class="card-text indexp3 txtIn">擁有專業的技術團隊,協助客戶規劃與建置安全網路、機房維與相關軟體售前與售後顧問服務。</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 客戶個案 -->
    <div class="container-fluid mb-5 newsCase">
        <div class="container">
            <div class="mt-5">
                <h2 class="indexh2 text-center">客戶個案</h2>
                <p class="indexp px-30 txtIn">
                    楷模業界深耕多年，具備專業且豐富建置經驗，熟悉原廠及代理通路最新，且能確切執行並解決客戶需求之能力。提供客戶完整解決方案，無論是何種產業別，均能量身規劃，滿足各種跨整合需求。</p>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 newsCard">
                    <div class="center2">
                        <img class="card-img w-100 h-auto" src="../img/news/Logoslogan_sm.png" alt="1">
                    </div>

                    <div class="card-img-overlay mx-3 p-5">

                        <h2 class="card-title indexh2">資展國際</h2>
                        <p class="card-text indexp txtIn">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Obcaecati,
                            odio ducimus nobis sapiente porro modi. Error doloribus recusandae reiciendis unde vitae
                            laudantium, eos adipisci omnis soluta rerum atque, voluptas id.</p>

                    </div>
                </div>
                <div class="col-lg-6 newsCard">
                    <div class="center2">
                        <img class="card-img w-100 h-auto txtIn" src="../資訊圖庫/合作夥伴logo/Dell_Logo.png" alt="換圖">
                    </div>

                    <div class="card-img-overlay mx-3 p-5">

                        <h2 class="card-title indexh2">戴爾DELL</h2>
                        <p class="card-text indexp">Doloribus
                            temporibus nisi qui fuga, adipisci enim nam repudiandae beatae laboriosam reiciendis
                            nihil facere hic cumque quo minus, fugit exercitationem accusantium! Placeat?</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 產品資訊 -->
    <div class="container mb-5 newsProduct">
        <!-- 產品影片 -->
        <div class="row col-lg-12 mt-5">
            <div class="col-lg-5">
                <div class="col-lg-10">
                    <h1 class="indexh1">OUR<br />PRODUCT</h1>
                    <h2 class="indexh2">產品資訊</h2>
                    <p class="indexp txtIn">楷模資訊，能依客戶實際需求規劃最適合的解決方案，如主機虛擬化、郵件伺服器、備份備援、雲端運算、端點管理、網通架構、資訊安全等規劃......。
                    </p>
                </div>

            </div>


            <div class="col-lg-7 videobox">
                <iframe width="800" height="400" src="https://www.youtube.com/embed/5Y1GpL768Sk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
        <!-- 合作廠商產品列表 -->
        <div id="app">
            <div class="container-fluid mt-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/lenovo">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/LENOVO-1.jpg" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/microsoft">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/microsoft.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/asus">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/ASUS.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/dell">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/Dell_Logo.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/checkpoint">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/checkpoint-logo-stacked-large.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/HPE">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/Hewlett_Packard_Enterprise_logo.svg.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/cisco">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/Cisco-logo.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/aruba">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/aruba.svg" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/fortinet">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/Fortinet-Logo.png" alt="補圖" />
                            </div>
                        </router-link>
                    </div>
                    <div class="col-lg-2 m-2 routerImg">
                        <router-link to="/DVC">
                            <div>
                                <img src="../資訊圖庫/合作夥伴logo/DVC.svg" alt="補圖" />
                            </div>
                        </router-link>
                    </div>

                </div>

            </div>

            <router-view></router-view>
        </div>


        <div class="container-fluid cooperatePhone">
            <div class="row my-5">
                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.lenovo.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-75 h-auto" src="../資訊圖庫/合作夥伴logo/LENOVO-1.jpg" alt="補圖" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">LENOVO </h2>
                                    <p class="indexp ">商用桌機<br />商用筆電<br />顯示器<br />伺服器<br />工作站<br />STORAGE</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.microsoft.com/zh-tw">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-75 h-auto" src="../資訊圖庫/合作夥伴logo/microsoft.png" alt="補圖" />
                                    </div>

                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">MICROSOFT</h2>
                                    <p class="indexp">作業系統<br />授權軟體<br />辦公軟體</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.asus.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/ASUS.png" alt="補圖" />
                                    </div>

                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">ASUS</h2>
                                    <p class="indexp">
                                        商用桌機、商用筆電<br />顯示器<br />主機板/零組件<br />網通產品<br />伺服器<br />工作站<br />ACC
                                        (ASUS CONTROL CENTER)</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.dell.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/Dell_Logo.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">DELL</h2>
                                    <p class="indexp">
                                        VxRail超融合<br />商用桌機<br />商用筆電<br />顯示器<br />伺服器<br />工作站<br />STORAGE</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.checkpoint.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6  rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/checkpoint-logo-stacked-large.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">Check Point</h2>
                                    <p class="indexp">FIREWALL<br />Harmony保護使用者與存取權限</p>

                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-6  p-2">
                    <div class="bg-light">
                        <a href="https://www.hpe.com/tw/zh/home.html">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/Hewlett_Packard_Enterprise_logo.svg.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">HPE</h2>
                                    <p class="indexp">
                                        超融合(SIMPLIVITY)<br />伺服器<br />STORAGE<br />商用桌機<br />商用筆電<br />工作站<br />HPE網路設備
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-lg-6  p-2">
                    <div class="bg-light">
                        <a href="https://www.cisco.com/c/zh_tw/index.html">
                            <div class="row Cooperate">
                                <div class="col-lg-6  rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/Cisco-logo.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">CISCO</h2>
                                    <p class="indexp">超融合基礎架構(HCI)：HyperFlex<br />防火牆<br />WEBEX視訊會議<br />CISCO網路設備</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="https://www.arubanetworks.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/aruba.svg" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">Aruba</h2>
                                    <p class="indexp">SWITCH<br />控制器<br />AP</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- <div class="col-lg-6 p-2">
                    <div class="bg-light">
                        <a href="#">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/NUTANIX.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">NUTANIX</h2>
                                    <p class="indexp">超融合</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <div class="col-lg-6  p-2">
                    <div class="bg-light">
                        <a href="https://www.fortinet.com/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/Fortinet-Logo.png" alt="補圖" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">FORTIGATE</h2>
                                    <p class="indexp">防火牆<br />SWITCH<br />AP</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-lg-6  p-2">
                    <div class="bg-light">
                        <a href="https://dvc.org/">
                            <div class="row Cooperate">
                                <div class="col-lg-6 rec300">
                                    <div class="center">
                                        <img class="w-100 h-auto" src="../資訊圖庫/合作夥伴logo/DVC.svg" alt="補圖" />
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-4">
                                    <h2 class="indexh2">DVC</h2>
                                    <p class="indexp">文件加密保險系統</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid footer">
            <div style="text-align:center; width:100% ;margin:auto;">
                <img src="../img/logo/logo-gray.png" style="height: 40px; margin:20px">
                <hr>
                <a href="./index.html" class="m-2">HOME</a>
                <a href="./aboutus.html" class="m-2">ABOUT</a>
                <a href="./news.html" class="m-2">NEWS</a>
                <a href="./contact.html" class="m-2">CONTACT</a>
                <br>
                <br>
                <p style="font-size:14px; color:#a2a2a2">&copy; 2022 楷模資訊 </p>
            </div>
        </div>
    </footer>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/newsRouter.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slick').slick({
                dots: true,
            });
        })
    </script>
</body>





</html>