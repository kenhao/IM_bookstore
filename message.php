<?php
session_start();
error_reporting(0);
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script>
$(function() {
  $('#search').autocomplete({
    source: "autosearch.php",
    minLength: 1
});
});
</script>
    <script>
        $(document).ready(function($) {
$("#message_input").validate({
    rules: {
        message_name: {
            required: true
        },
        message_sub: {
            required: true,
            maxlength: 20
        },
        order_comments: {
            required: true
        }
    },
    messages: {
        message_name: {
            required: "必填"
        },
        message_sub:{
            required: "必填",
            maxlength: "最大字數為20個字"
        },
        order_comments:{
            required: "必填"
        }
    },
    submitHandler: function(form) {
        alert("成功留言!");
        form.submit();
    }
});
});
    </script>
    <style>
        .error {
        color: red;
        font-weight: normal;
        display: inline;
        padding: 1px;
    }
        .form_title{
            font-size: 25px;
            color: #5a88ca;
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
                            <li><a href="index_member.php"><i class="fa fa-user"></i>我的帳戶</a></li>
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
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">購物車 - <span class="cart-amunt">NT$0</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
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
                        <li><a href="indexm.php">首頁</a></li>
                        <li><a href="shopm.php">逛逛去</a></li>
                        <li><a href="category.php">分類</a></li>
                        <li><a href="cart.php">購物車</a></li>
                        <li class="active"><a href="message.php">討論區</a></li>
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
                        <h2>討論區</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">搜尋書籍</h2>
                        <form action="search.php" method="post" id="sagase">
                            <input type="text" placeholder="搜尋..." name="search" id="search">
                            <button type="submit">搜尋</button>
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">書籍</h2>
                        <?php
include "connect.php";

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// 送出查詢的SQL指令
if ($result = mysqli_query($link, "SELECT * FROM product order by RAND() LIMIT 4")) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='thubmnail-recent'>
                            <img src='img/$row[picture]' class='recent-thumb' alt=''>
                            <h2><a href='product.php>pNo=$row[pNo]'>$row[pName]</a></h2>
                            <div class='product-sidebar-price'>
                                <ins>NT$$row[unitPrice]</ins> <del>NT$$row[salePrice]</del>
                            </div>
                        </div>";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">最近看過</h2>
                        <ul>
                            <?php
include "connect.php";
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$book = count($_SESSION['browse']);
if ($book < 6 && $book > 0) {
	for ($i = 0; $i < $book; $i++) {
		if ($result = mysqli_query($link, "SELECT * from product where pNo = '" . $_SESSION['browse'][$i] . "'")) {
			$row = mysqli_fetch_assoc($result);
			echo "<li><a href=\"product.php?pNo=$row[pNo]\">$row[pName]</a></li>";}
	}
} else if ($book > 6) {
	for ($i = $book; $i > $book - 6; $i--) {
		if ($result = mysqli_query($link, "SELECT * from product where pNo = '" . $_SESSION['browse'][$i] . "'")) {
			$row = mysqli_fetch_assoc($result);
			echo "<li><a href=\"product.php?pNo=$row[pNo]\">$row[pName]</a></li>";}
	}
}
?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form enctype="multipart/form-data" action="" class="checkout" method="POST" name="checkout" id="message_input">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <h3 style="font-size: 25px">討論版</h3>
                                        <p id="order_comments_field" class="form-row notes">
                                            <label for="message_name" style="font-size: 18px">匿名</label>
                                            <input type="text" name="message_name" size="10" required="">
                                            <label for="message_sub" style="font-size: 18px">標題</label>
                                            <input type="text" name="message_sub" required="">
                                            <label class="" for="order_comments" style="font-size: 18px">留言</label>
                                            <textarea cols="2" rows="10" placeholder="任何留言或回饋我們都會感謝您" id="order_comments" class="input-text " name="order_comments" required=""></textarea>
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div id="order_review" style="position: relative;">
                                    <div class="form-row place-order">
                                        <input type="submit" data-value="Place order" value="送出" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <table class="table table-striped" style="width: 40%">
                    <thead>
                        <tr>
                            <th class="form_title">討論區</th>
                        </tr>
                    </thead>
                    <?php

include "connect.php";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['message_name'])) {
	//$num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM message;"));
	$sql = "INSERT INTO message(message_name,message_subject,message_content) values ('" . $_POST['message_name'] . "','" . $_POST['message_sub'] . "','" . $_POST['order_comments'] . "')";
	mysqli_query($link, $sql); // 送出查詢的SQL指令

}

$sql2 = "SELECT * FROM message;";
if ($result = mysqli_query($link, $sql2)) {
	$total_records = mysqli_num_rows($result);
	$total_page = ceil($total_records / 5);
	//echo $_GET['page'];  // 1:0~9 2:10~19 3:20~29 ....
	mysqli_data_seek($result, ($_GET['page'] - 1) * 5);
	for ($j = 1; $j <= 5; $j++) {
		$row = mysqli_fetch_row($result);
		$data .= "<tr><td>姓名：" . $row[0] . "<br>標題：" . $row[1] . "<br>內容：" . $row[2] . "</td></tr>";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link);
$data .= "<tr align='center'><td>";
for ($i = 1; $i <= $total_page; $i++) {
	if ($i == $_GET['page']) {
		$data .= "$i&nbsp;&nbsp;";
	} else {
		$data .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=$i'> $i </a>&nbsp;&nbsp;";
	}

}
$data .= "</td></tr>";
echo $data;
?>

                </table>
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
                            <li><a href="indexm.php">首頁</a></li>
                            <li><a href="index_member.php">會員專區</a></li>
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
</body>

</html>