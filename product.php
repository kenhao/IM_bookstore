<?php
include "connect.php";
session_start();
//移除陣列裡所有空值的成員
//$arr_cart = array_filter(explode(",", $_SESSION['cart']));
error_reporting(0);

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$sql = "SELECT * FROM product where pNo='" . $_GET['pNo'] . "'";

if ($result = mysqli_query($link, $sql)) {
	if ($row = mysqli_fetch_assoc($result)) {
		//$file_type = $row["file_type"];
		//header("Content-type: $file_type");

		$name .= $row['pName'];
		$unitPrice .= $row['unitPrice'];
		$salePrice .= $row['salePrice'];
		$category .= $row['category'];
		$picture .= "<img src='img/$row[picture]'>";
		$product_description .= $row['product_description'];
		$author_description .= $row['author_description'];
		$pNo = $row[pNo];
		array_push($_SESSION['browse'], $pNo);

		$_SESSION['category'] = $row[category];
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                            <li class="dropdown dropdown-small">
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
                        <h1>
                            <?php
if ($_SESSION['access'] == 0) {
	echo "<a href=\"index.php\"><img src=\"img/logo.png\"></a>";
} else {
	echo "<a href=\"indexm.php\"><img src=\"img/logo.png\"></a>";
}
?>
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">購物車 - <span class="cart-amunt"></span><i class="fa fa-shopping-cart"></i> <span class="product-count">
                                <?php if ($_SESSION['access'] == 5) {echo count($_SESSION['cart_pno']);}?></span></a>
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
                        <li><?php if ($_SESSION['access'] == 0) {
	echo "<a href=\"index.php\">首頁</a>";
} else {
	echo "<a href=\"indexm.php\">首頁</a>";
}
?></li>
                        <li class="active"><?php if ($_SESSION['access'] == 0) {
	echo "<a href=\"shop.php\">";
} else {
	echo "<a href='shopm.php'>";
}?>逛逛去</a></li>
                        <li><a href="category.php">分類</a></li>
                        <?php
if ($_SESSION['access'] == 5) {
	echo "<li><a href=\"cart.php\">購物車</a></li>
                        <li><a href=\"message.php\">討論區</a></li>";
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
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
		echo "<div class=\"thubmnail-recent\">
                            <img src=\"img/$row[picture]\" class=\"recent-thumb\" alt=\"\">
                            <h2><a href=\"product.php?pNo=$row[pNo]\">$row[pName]</a></h2>
                            <div class=\"product-sidebar-price\">
                                <ins>NT$$row[salePrice]</ins> <del>NT$$row[unitPrice]</del>
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
                        <div class="product-breadcroumb">
                            <a href="index.php">首頁</a>
                            <a href="Jnovel.php">
                                <?echo $category; ?></a>
                            <a href="#">
                                <?php echo $name; ?></a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <?php echo $picture ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">
                                        <?php echo $name; ?>
                                    </h2>
                                    <div class="product-inner-price">
                                        <ins>NT$
                                            <?php echo $salePrice; ?></ins> <del>NT$
                                            <?php echo $unitPrice; ?></del>
                                    </div>
                                    <form action="addcart.php" class="cart" method="POST">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit" onclick="<?php $_SESSION['pno'] = $pNo;?> ">加入購物車</button>
                                    </form>
                                    <div class="product-inner-category">
                                        <p>分類: <a href="Jnovel.php">
                                                <?php echo $category; ?></a></p>
                                    </div>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">詳細資料</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>商品介紹</h2>
                                                <p>
                                                    <?php echo $product_description; ?>
                                                </p>
                                                <h2>作者介紹</h2>
                                                <p>
                                                    <?php echo $author_description; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">類似書籍</h2>
                            <div class="related-products-carousel">
                                <?php
include "connect.php";

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// 送出查詢的SQL指令
if ($result = mysqli_query($link, "SELECT * FROM product where category = '" . $_SESSION['category'] . "' order by RAND() LIMIT 3
")) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='single-product'>
                                <div class='product-f-image'>
                                    <img src='img/$row[picture]' alt=''>
                                    <div class='product-hover'>
                                        <a href='product.php?pNo=$row[pNo]' class='view-details-link'><i class='fa fa-link'></i> 檢視細節</a>
                                    </div>
                                </div>
                                <h2><a href='product.php?pNo=$row[pNo]'>$row[pName]</a></h2>
                            </div>";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
                            </div>
                        </div>
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
                        <h2>B<span>Store</span></h2>
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