<?php
include "connect.php";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$mid = $_POST['account'];
	$email = $_POST['email'];
	$birthday = $_POST['birthday'];
	$pwd = $_POST['pwd'];
	$sql = "INSERT INTO member(name, mId, email, birthday, pwd) VALUES ('" . $name . "','" . $mid . "','" . $email . "','" . $birthday . "','" . $pwd . "')";

	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
	{
		$msg = "<span style='color:#0000FF'>資料新增成功!</span>";
		header("refresh:0;url=login.php");
	} else {
		$msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
	}

}
//mysqli_free_result($result);
mysqli_close($link);
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!--additional method - for checkbox .. ,require_from_group method ...-->
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <!--中文錯誤訊息-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    <script>
        $(document).ready(function($) {
    //for select
    $.validator.addMethod("notEqualsto", function(value, element, arg) {
        return arg != value;
    }, "您尚未選擇!");

$("#form1").validate({
    submitHandler: function(form) {
        alert("註冊成功!");
        form.submit();
    },
    rules: {
        name:{
            required:true,
            maxlength:20
        },
        account: {
            required: true,
            minlength: 4,
            maxlength: 10
        },
        pwd: {
            required: true,
            minlength: 6,
            maxlength: 12
        },
        pwd2: {
            required: true,
            equalTo: "#pwd"
        },
        email: {
            required: true,
            email: true
        },
        email2: {
            required: true,
            email: true,
            equalTo:"#email"
        },
        birthday:{
            required:true
        },
        agree: {
            required: true
        }
    },
    messages: {
        account: {
            required: "帳號為必填欄位",
            minlength: "帳號最少要4個字",
            maxlength: "帳號最長10個字"
        },
        pwd2: {
            equalTo: "兩次密碼不相符"
        },
        email:{
            required:"請輸入正確的電子信箱"
        },
        email2:{
            equalTo:"電子信箱輸入有誤"
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
});
</script>
    <script>
        function check1(){
        $.ajax({
              url: "check_register.php",
              data: $('#form1').serialize(),
              type: "POST",
              dataType: 'text',
              success: function(msg) {
                  $("#show_mid").html(msg);//顯示訊息
                  //document.getElementById('show_msg').innerHTML= msg ;
              },
              error: function(xhr, ajaxOptions, thrownError) {

              }
          });
    }
    function check2(){
        $.ajax({
              url: "check_register.php",
              data: $('#form1').serialize(),
              type: "POST",
              dataType: 'text',
              success: function(msg) {
                  $("#show_email").html(msg);//顯示訊息
                  //document.getElementById('show_msg').innerHTML= msg ;
              },
              error: function(xhr, ajaxOptions, thrownError) {

              }
          });
    }
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
                            <li><a href="login.php"><i class="fa fa-user"></i>登入</a></li>
                            <li><a href="register.php"><i class="fa fa-user">註冊</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
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
                        <h1><a href="index.php"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">購物車 - <span class="cart-amunt">NT$</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
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
                        <li class="active"><a href="index.php">首頁</a></li>
                        <li><a href="shop.php">逛逛去</a></li>
                        <li><a href="category.php">分類</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
                <h3>會員註冊</h3>
                <form class="form-horizontal" method="post" role="form" id="form1" name="form1">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">會員姓名<br><span class="text">Your Name</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            <br><span class="text">請輸入稱呼</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">會員帳號<br><span class="text">Your ID</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="account" name="account" onkeyup="check1()"><br>
                            <span id="show_mid" style="color:red"></span><br>
                            <br><span class="text">請以半形輸入，4-50個英、數字組合。
                                帳號設定不能同密碼。</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">電子郵件<div class="text">Your E-mail</div></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" onkeyup="check2()"><br>
                            <span id="show_email" style="color:red"></span><br>
                            <br><span class="text">請以半形輸入，e-mail不能重複註冊。</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">確認電子郵件<div class="text">Comfirm Your E-mail</div></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email2" name="email2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">密碼<div class="text">Password</div></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="8-12字元"><br><span class="text">至少2個英文與2個數字
                                不含空白、雙引號、單引號、星號
                                注意密碼不與其他網站相同，確保帳戶安全</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">密碼確認<div class="text">Comfirm Password</div></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">生日<div class="text">Birthday</div></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="yyyy/mm/dd"><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree" name="agree" value="1">我同意相關服務條款
                                </label>
                                <label class="error" for="agree"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="subscribe" name="subscribe">訂閱商品／活動訊息<div class="text">不定期透過Email通知最新商品訊息及優惠資訊</div>
                                </label>
                                <label class="error" for="subscribe"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <label>
                                <button type="submit" class="btn btn-primary" name="register" id="register">送　出</button>
                            </label>
                            <label>
                                <button type="reset" class="btn btn-primary">重　填</button>
                            </label>
                        </div>
                    </div>
                </form>
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
                            <li><a href="index.php">首頁</a></li>
                            <li><a href="login.php">登入</a></li>
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