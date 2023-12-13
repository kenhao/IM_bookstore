<?php
session_start();
if ($_SESSION['access'] != 10) {
	echo "<script>alert('權限不符！導至登入畫面');</script>";
	header("refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMBOOKSTORE--Admin</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="js/datatable_eorder.js"></script>
    <style>
        body {
    font-family: "微軟正黑體";
}

.error {
    color: #D82424;
    font-weight: normal;
    display: inline;
    padding: 1px;
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
                            <li><a href="admin_emember.php"><i class="fa fa-user"></i>會員</a></li>
                            <li><a href="admin_eorder.php"><i class="fa fa-user"></i>訂單</a></li>
                            <li><a href="admin_eproduct.php"><i class="fa fa-user"></i>商品</a></li>
                            <li><a href="admin_emessage.php"><i class="fa fa-user"></i>留言</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li style="color: #535E53;font-family: '微軟正黑體'">
                                <i class="fa fa-user">你好，管理者</i>
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
                        <h1><a href="index_admin.php"><img src="img/logo.png"></a></h1>
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
                        <li><a href="index_admin.php">首頁</a></li>
                        <li><a href="admin_emember.php">會員</a></li>
                        <li class="active"><a href="admin_eorder.php">訂單</a></li>
                        <li><a href="admin_eproduct.php">商品</a></li>
                        <li><a href="admin_emessage.php">留言</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <br><br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="pNo_old" id="pNo_old" value="">
                <input type="hidden" name="tNo_old" id="tNo_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">商品編號pNo</th>
                            <th class="text-center">會員編號mId</th>
                            <th class="text-center">數量amount</th>
                            <th class="text-center">總價salePrice</th>
                            <th class="text-center">訂單編號tNo</th>
                            <th class="text-center">存檔/取消</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="pNo" name="pNo">
                            </td>
                            <td class="text-center">
                                <input type="text" id="mId" name="mId">
                            </td>
                            <td class="text-center">
                                <input type="text" id="amount" name="amount">
                            </td>
                            <td class="text-center">
                                <input type="text" id="salePrice" name="salePrice">
                            </td>
                            <td class="text-center">
                                <input type="text" id="tNo" name="tNo">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">商品編號pNo</th>
                            <th class="text-center">會員編號mId</th>
                            <th class="text-center">數量amount</th>
                            <th class="text-center">總價salePrice</th>
                            <th class="text-center">訂單編號tNo</th>
                            <th class="text-center">修改/刪除</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="col-md-2"></div>
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
                        <h2 class="footer-wid-title">管理者導覽</h2>
                        <ul>
                            <li><a href="admin_emember.php">會員</a></li>
                            <li><a href="admin_eorder.php">訂單</a></li>
                            <li><a href="admin_eproduct.php">商品</a></li>
                            <li><a href="admin_emessage.php">留言</a></li>
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
</body>

</html>