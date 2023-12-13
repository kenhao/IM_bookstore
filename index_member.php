<?php
include "connect.php";
session_start();
error_reporting(0);
if ($_SESSION['access'] != 5) {
	echo "<script>alert('權限不符！導至登入畫面');</script>";
	header("refresh:0;url=login.php");
}
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$sql = "SELECT * FROM member where name='" . $_SESSION['name'] . "'";

if ($result = mysqli_query($link, $sql)) {
	if ($row = mysqli_fetch_row($result)) {
		//$file_type = $row["file_type"];
		//header("Content-type: $file_type");
		$name .= $row[1];
		$mid .= $row[0];
		$email .= $row[3];
		$birthday .= $row[2];
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
<!DOCTYPE html>
<!--
    ustora by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMBOOKSTORE--Member</title>
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .text {
        color: #6654AF;
    }
    </style>
</head>

<body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#.php"><i class="fa fa-user"></i>我的帳戶</a></li>
                            <li><a href="member_change.php"><i class="fa fa-user"></i>更改資料</a></li>
                            <li><a href="member_order.php"><i class="fa fa-user"></i>訂單查詢</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i>購物車</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li style="color: #535E53;font-family: '微軟正黑體'">
                                <i class="fa fa-user">你好，
                                    <?php echo $_SESSION['name']; ?></i>
                            </li>
                            <li>
                                <a href="logout.php"><i class="fa fa-user"></i>登出</a>
                            </li>
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
                        <h1><a href="indexm.php"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                <!--<div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">管理者 - <span class="cart-amunt">NT$329</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">1</span></a>
                    </div>
                </div>-->
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
                        <li><a href="indexm.php">首頁</a></li>
                        <li><a href="#">我的帳戶</a></li>
                        <li><a href="member_change.php">更改資料</a></li>
                        <li><a href="member_order.php">訂單查詢</a></li>
                        <li><a href="cart.php">購物車</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <frame>
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
                        <h3>我的帳戶</h3>
                        <div></div>
                        <table class="table table-bordered">
                            <tr>
                                <th>帳號</th>
                                <td><?php echo $mid; ?></td>
                            </tr>
                            <tr>
                                <th>姓名</th>
                                <td><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <th>電子郵件</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>生日</th>
                                <td><?php echo $birthday; ?></td>
                            </tr>
                        </table>
                        <div>
                            <a class="showcoupon"  href="member_change.php" aria-expanded="false" aria-controls="lost-collapse-wrap">更改資料</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- End main content area -->
    </frame>
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
                        <h2 class="footer-wid-title">會員導覽</h2>
                        <ul>
                            <li><a href="#">我的帳戶</a></li>
                            <li><a href="member_change.php">更改資料</a></li>
                            <li><a href="member_order.php">訂單查詢</a></li>
                            <li><a href="cart.php">購物車</a></li>
                        </ul>
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
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
</body>

</html>