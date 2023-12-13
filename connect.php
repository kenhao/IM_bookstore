<?php
//檔名 : connect.php
$link = mysqli_connect("localhost","root","root123456","group_04")// 建立MySQL的資料庫連結
        or die("無法開啟MySQL資料庫連結!<br>");
?>