 <?php

include "connect.php"; // 建立MySQL的資料庫連結

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

//$m = $_SESSION['mid'];
$sql = "DELETE FROM cart WHERE pNo='" . $_GET['pid'] . "'";
mysqli_query($link, $sql); // 送出查詢的SQL指令

mysqli_close($link);
header("refresh:0;url=cart.php");
?>