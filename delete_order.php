<?php
session_start();
include "connect.php";
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$tNo = $_POST['tNo'];
$sql = "DELETE  FROM `order` where tNo='$tNo'";
if ($result = mysqli_query($link, $sql)) {
	echo "<script>alert('取消訂單成功！')</script>";
	header("refresh:0;url=member_order.php");
}
mysqli_close($link); // 關閉資料庫連結
?>