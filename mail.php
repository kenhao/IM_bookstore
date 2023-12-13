<?php
include "connect.php";
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$mailname= $_POST['email'];
$sql="SELECT * FROM member where email='$mailname'";

if ($result = mysqli_query($link, $sql)) {
		$row = mysqli_fetch_assoc($result);
			$subject = "=?UTF-8?B?" . base64_encode('忘記密碼') . "?="; //信件標題，解決亂碼問題
			mail("$mailname", $subject, "您的密碼為$row[pwd]")
			or die("郵件傳送失敗！");
}
header("refresh:0;url = login.php");
?>