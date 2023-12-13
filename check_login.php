<?php
session_start();
error_reporting(0);
$mid = trim($_POST['account']);
$pwd = trim($_POST['pwd']);
include "connect.php";

$sql = "SELECT * FROM member where mId='$mid' and pwd = '$pwd' UNION SELECT * FROM member where email='$mid' and pwd = '$pwd'";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
	$row = mysqli_num_rows($result);
	$row2 = mysqli_fetch_object($result);
	if ($row) {
		$_SESSION['name'] = $row2->name;
		echo "<script>alert('登入成功！')</script>";
		if ($mid == 'admin') {
			$_SESSION['access'] = 10;
			header("refresh:0;url=index_admin.php");
		} else {
			$_SESSION['access'] = 5;
			$_SESSION['mid'] = $mid;
			$_SESSION['browse'] = array();

			header("refresh:0;url=index_member.php");}
		//exit;
	} else {
		echo "<script>alert('帳號或密碼錯誤！')</script>";
		header("refresh:0;url=login.php");
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>