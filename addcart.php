<?php
session_start();
//error_reporting(0);
if ($_SESSION['access'] != 5) {
	echo "<script>alert('權限不符！導至登入畫面');</script>";
	header("refresh:0;url=login.php");
} else {
	$mId = $_SESSION['mid'];
	$cartTime = date("Y-m-d:H:i:s");
	$quantity = $_POST['quantity'];
	$pNo = $_SESSION['pno'];
//$pNo = $_SESSION[pno];
	include "connect.php"; // 建立MySQL的資料庫連結

	$sql = "INSERT INTO cart values ('$mId','$cartTime','$pNo',$quantity)";
	$sql2 = "SELECT pNo FROM cart where mId = '$mId' and pNo = '$pNo'";

	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

	$result2 = mysqli_query($link, $sql2);
	$num = mysqli_num_rows($result2);

	if ($num != 0) {
		echo "<script>alert('你已經買過了，不要一直買好不好！');</script>";
		header("refresh:0;url=product.php?pNo=$_SESSION[pno]");
	} else {
		if ($result = mysqli_query($link, $sql)) {
			$sql1 = "SELECT count(*) as c FROM cart ";
			$result2 = mysqli_query($link, $sql1);
			$row = mysqli_fetch_object($result2);
			$_SESSION['cart'] = $row->c;
			header("refresh:0;url=product.php?pNo=$_SESSION[pno]");
		} else {
			echo "error";
		}
	}
	mysqli_close($link);

//返回上一頁
	//header("refresh:0;url=product.php?pNo=$_SESSION[pno]");
	unset($_SESSION['pno']);}
?>