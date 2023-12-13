<?php
include "connect.php";
session_start();
if ($_SESSION['access'] != 5) {
	echo "<script>alert('權限不符！導至登入畫面');</script>";
	header("refresh:0;url=login.php");
}
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$sql = "SELECT * FROM member where mId='" . $_SESSION['mid'] . "'";
if ($result = mysqli_query($link, $sql)) {
	$row = mysqli_fetch_assoc($result);
}
mysqli_free_result($result); // 釋放佔用的記憶體

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
    <script>
$("#form1").validate({
    submitHandler:function(form){
        alert("成功!");
        form.submit();
    }
    rules: {
        pwd-old:{
            required:true,
            equalTo:"#pwd-old"
        }
        new: {
            required: true,
            minlength: 6,
            maxlength: 12
        },
        new2: {
            required: true,
            equalTo: "#new"
        },
        email: {
            email: true
        },
        birthday:{
            required:true
        },
        agree: {
            required: true
        }
    },
    messages: {
        pwd2: {
            required:"必填"
        },
        pwd2: {
            required:"必填"
            equalTo: "兩次密碼不相符"
        },
        email:{
            required:"請輸入正確的電子信箱"
        },
        agree:{
            required:"必填"
        },
        name:{
            required:"姓名為必填",
            maxlength:"請勿超過20個字"
        }

    }
});
</script>
    <style type="text/css">
    .error {
        color: #D82424;
        font-weight: normal;
        font-family: "微軟正黑體";
        display: inline;
        padding: 1px;
    }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .text {
        color: #ADB6B7;
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
                            <li><a href="#"><i class="fa fa-user"></i>更改資料</a></li>
                            <li><a href="member_order.php"><i class="fa fa-user"></i>訂單查詢</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i>購物車</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li style="color: #535E53;font-family: '微軟正黑體'">
                                <i class="fa fa-user">你好，<?php echo $row['name'] ?></i>
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
                        <li><a href="index_member.php">我的帳戶</a></li>
                        <li><a href="#">更改資料</a></li>
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
                <h3>更改資料</h3>
                <form class="form-horizontal" action="member_change_profile.php" method="post" role="form" id="form1">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">會員帳號<br><span class="text">Your ID</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="account" name="account" value="<?php echo $row['mId'] ?>" disabled><div class="text">不可更改</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">電子郵件<div class="text">Your E-mail</div></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" placeholder="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">生日<div class="text">Birthday</div></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $row['birthday'] ?>" placeholder="<?php echo $row['birthday'] ?>"><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="subscribe" name="subscribe" >訂閱商品／活動訊息<div class="text">不定期透過Email通知最新商品訊息及優惠資訊</div>
                                </label>
                                <label class="error" for="subscribe"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <label>
                                <input type="submit" class="btn btn-primary" onclick="<?php $sql="UPDATE member set email='".$_POST['email']."' where mId='".$_SESSION['mId']."'"; ?> " value="儲存">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
                <h3>更改密碼</h3>
                <?php
                echo "<input type=\"hidden\" class=\"form-control\" name=\"pwd-old\" id=\"pwd-old\"  value=\"$row[pwd]\">";
                ?>
                <form class="form-horizontal" action="member_change_pwd.php" method="post" role="form" id="form1">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">舊密碼<div class="text">Password</div></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="old" name="old" required><br><span class="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">新密碼<div class="text">Password</div></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="new" name="new" required placeholder="8-12字元"><br><span class="text">至少2個英文與2個數字
                                不含空白、雙引號、單引號、星號
                                注意密碼不與其他網站相同，確保帳戶安全</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">密碼確認<div class="text">Comfirm Password</div></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="new2" name="new2" required placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <label>
                               <input type="submit" class="btn btn-primary" value="儲存">
                                </button>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            <li><a href="index_member.php">我的帳戶</a></li>
                            <li><a href="member_change.php">更改資料</a></li>
                            <li><a href="member_order">訂單查詢</a></li>
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