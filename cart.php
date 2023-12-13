<?php
session_start();
error_reporting(0);
if ($_SESSION['access'] != 5) {
	echo "<script>alert('權限不符！導至登入畫面');</script>";
	header("refresh:0;url=login.php");
}
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $(function() {
  $('#search').autocomplete({
    source: "autosearch.php",
    minLength: 1
});
});
</script>
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
                        <a href="cart.php">購物車 - <span class="cart-amunt">NT$
                                <?php echo $final_price ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">
                                <?php echo count($_SESSION['cart']) ?></span></a>
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
                        <li class="active"><a href="cart.php">購物車</a></li>
                        <li><a href="message.php">討論區</a></li>
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
                        <h2>購物車</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
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
                        <h2 class="sidebar-title">推薦書籍</h2>
                        <?php
include "connect.php";

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// 送出查詢的SQL指令
if ($result = mysqli_query($link, "SELECT * FROM product order by RAND() LIMIT 5")) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='thubmnail-recent'>
                            <img src='img/$row[picture]' class='recent-thumb' alt=''>
                            <h2><a href='product.php?pNo=$row[pNo]'>$row[pName]</a></h2>
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
                            <form method="post" action="cart_update.php">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">書名</th>
                                            <th class="product-category">類型</th>
                                            <th class="product-price">價格</th>
                                            <th class="product-quantity">數量</th>
                                            <th class="product-subtotal">總金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
include "connect.php";

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$_SESSION['cart_pno'] = array();
$_SESSION['cart_amount'] = array();

$final_price = 0;
if ($result = mysqli_query($link, "SELECT product.*,cart.amount FROM cart, product where cart.pNo = product.pNo and cart.mId = '" . $_SESSION['mid'] . "'")) {
	if (mysqli_num_rows($result) == 0) {
		echo "<td colspan='8'>
                 <span calss='category'>購物車是空的</span>
              </td>";
	}
	while ($row = mysqli_fetch_assoc($result)) {
		$total = $row['salePrice'] * $row['amount'];

		$final_price = $final_price + $total;
		array_push($_SESSION['cart_pno'], $row[pNo]);
		array_push($_SESSION['cart_amount'], $row[amount]);
		echo "<tr class='cart_item'>
                                            <td class='product-remove'>
                                                <a title='Remove this item' class='remove' href='product_delete.php?pid=$row[pNo]'>×</a>
                                            </td>

                                            <td class='product-thumbnail'>
                                                <a href='product.php?pNo=$row[pNo]'><img width='145' height='145' alt='poster_1_up' class='shop_thumbnail' src='img/$row[picture]'></a>
                                            </td>

                                            <td class='product-name' width='200'>
                                                <a href='product.php?pNo=$row[pNo]'>$row[pName]</a>
                                            </td>

                                            <td class='product-category'>
                                                <span class='category'>$row[category]</span>
                                            </td>
                                            <td class='product-price'>
                                                <span class='amount'>NT$$row[salePrice]</span>
                                            </td>

                                            <td class='product-quantity'>
                                                <div class='quantity buttons_added'>
                                                    <input type='number' size='4' class='input-text qty text' title='Qty' value='$row[amount]' min='0' step='1'>
                                                </div>
                                            </td>

                                            <td class='product-subtotal'>
                                                <span class='amount'>NT$$total</span>
                                            </td>
                                            </tr>";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
                                        <tr>
                                            <td class="actions" colspan="8">
                                                <div class="coupon">
                                                </div>
                                                <input type="submit" value="更新購物車" name="update_cart" class="button" onclick="this.form.action='cart_update.php';this.form.submit();" style="display: none">
                                                <input type="submit" value="結帳" name="proceed" class="checkout-button button alt wc-forward" onclick="this.form.action='addorder.php';this.form.submit();">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cross-sells">
                                    <h2>你可能感興趣...</h2>
                                    <ul class="products">
                                        <?php
include "connect.php";

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// 送出查詢的SQL指令
if ($result = mysqli_query($link, "SELECT * FROM product order by RAND() LIMIT 2")) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo " <li class='product'>
                                        <a href='product.php?pNo=$row[pNo]'>
                                            <img width='325' height='325' alt='T_4_front' class='attachment-shop_catalog wp-post-image' src='img/$row[picture]'>
                                            <h3>$row[pName]</h3>
                                            <span class='price'><span class='amount'>NT$$row[salePrice]</span></span>
                                        </a>

                                        <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='22' rel='nofollow' href=''>加入購物車</a>
                                    </li>";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
                                    </ul>
                                </div>
                                <div class="cart_totals ">
                                    <h2>購物車總金額</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>購物車小計</th>
                                                <td><span class="amount">NT$
                                                        <?echo $final_price; ?></span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>運費及處理費</th>
                                                <td>免運</td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>訂單總計</th>
                                                <td><strong><span class="amount">NT$
                                                            <?echo $final_price; ?></span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                            <li><a href="member.php">我的帳戶</a></li>
                            <li><a href="#">訂購紀錄</a></li>
                            <li><a href="#">願望清單</a></li>
                            <li><a href="#">首頁</a></li>
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