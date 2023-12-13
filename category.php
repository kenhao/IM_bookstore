<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMBOOKSTORE</title>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php
if ($_SESSION['access'] == 0) {
	echo "<li><a href=\"login.php\"><i class=\"fa fa-user\"></i>登入</a></li>
                            <li><a href=\"register.php\"><i class=\"fa fa-user\">註冊</i></a></li>";
} else {
	echo "<li><a href=\"index_member.php\"><i class=\"fa fa-user\"></i>我的帳戶</a></li>
                            <li><a href=\"cart.php\"><i class=\"fa fa-user\"></i>購物車</a></li>";
}
?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                                <?php
if ($_SESSION['access'] == 5) {
	echo "<li style=\"color: #535E53;font-family: '微軟正黑體'\">
                                <i class=\"fa fa-user\">你好，" . $_SESSION['name'] . "</i>
                            </li>
                            <li>
                                <a href=\"logout.php\"><i class=\"fa fa-user\"></i>登出</a>
                            </li>";
}
?>
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">繁體中文 </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">日本語</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><?php
if ($_SESSION['access'] == 0) {
	echo "<a href=\"index.php\"><img src=\"img/logo.png\"></a>";
} else {
	echo "<a href=\"indexm.php\"><img src=\"img/logo.png\"></a>";
}
?></h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">購物車 - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i><span class="product-count"><?php if ($_SESSION['access'] == 5) {echo count($_SESSION['cart_pno']);}?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
   <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <?php
if ($_SESSION['access'] == 5) {
	echo "<li><a href=\"indexm.php\">首頁</a></li>
                        <li><a href=\"shopm.php\">逛逛去</a></li>
                        <li class=\"active\"><a href=\"#\">分類</a></li><li><a href=\"cart.php\">購物車</a></li>
                        <li><a href=\"message.php\">討論區</a></li>";
} else {
	echo "<li><a href=\"index.php\">首頁</a></li>
                        <li><a href=\"shop.php\">逛逛去</a></li>
                        <li class=\"active\"><a href=\"#\">分類</a></li>";
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>分類</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/product-1.jpg" alt="">
                        </div>
                        <h2><a href="Jnovel.php">日文小說</a></h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/product-6.jpg" alt="">
                        </div>
                        <h2><a href="Jmanga.php">日文漫畫</a></h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/cn-1.jpg" alt="">
                        </div>
                        <h2><a href="Cnovel.php">中文小說</a></h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/en-1.jpg" alt="">
                        </div>
                        <h2><a href="Enovel.php">英文小說</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>IM<span>Store</span></h2>
                        <p>本網站以日文小說及漫畫販賣為主，亦販售少量中文小說及英文小說，提供給想看日文小說卻找不到通路的你，將日文文學推廣出去吧！<div>This store is mainly selling Japanese novels, and also selling a few Chinese novels and English novels. This store is for someone who want to read Japanese novels but still cannot get it. Let's promote Japanese literary to the world!</div>
                        </p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">使用者導覽</h2>
                        <ul>
                            <?php
if ($_SESSION['access'] == 0) {
	echo "<li><a href=\"index.php\">首頁</a></li>
                            <li><a href=\"login.php\">登入</a></li>";
} else {
	echo "<li><a href=\"indexm.php\">首頁</a></li>
                            <li><a href=\"index_member.php\">會員專區</a></li>";
}

?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">分類</h2>
                        <ul>
                            <li><a href="Jnovel.php">日文小說</a></li>
                            <li><a href="Jmanga.php">日文漫畫</a></li>
                            <li><a href="Cnovel.php">中文小說</a></li>
                            <li><a href="Enovel.php">英文小說</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">接收訊息</h2>
                        <p>輸入資料以接收更多關於我們的資訊！</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="輸入你的信箱">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2020 uCommerce. All Rights Reserved. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
</body>

</html>