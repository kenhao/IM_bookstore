<?php
$mid = trim($_POST['account']);
$email = trim($_POST['email']);

include "connect.php";

$sql = "SELECT * FROM member where mId='$mid'"; // 指定SQL查詢字串
$sql2 = "SELECT * FROM member where email = '$email'";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
	if ($row = mysqli_fetch_assoc($result)) {
		$msg_mid = "此帳號已存在!";
		echo $msg_mid;
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
if ($result = mysqli_query($link, $sql2)) {
	if ($row = mysqli_fetch_assoc($result)) {
		$msg_email = "此Email已註冊!";
		echo $msg_email;
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
