<?
session_start();
error_reporting(0);
include "connect.php";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if ($result = mysqli_query($link, "SELECT product.*,cart.amount ,cart.cartTIme,cart.mId FROM cart, product where cart.pNo = product.pNo and cart.mId = '" . $_SESSION['mid'] . "'")) {
	//tNo 字串處理
	$sql_tno = "SELECT MAX(tNo) AS tno FROM `order`";
	$r = mysqli_query($link, $sql_tno);
	$row1 = mysqli_fetch_assoc($r);
	$arr = str_split($row1[tno]);
	$tno_int = ((int) $arr[3] * 10) + (int) $arr[4] + 1;

	if ($tno_int == 0) {
		$tno_str = "t0001";
	} else if ($tno_int < 10) {
		$tno_str = "t000" . (string) $tno_int;
	} else {
		$tno_str = "t00" . (string) $tno_int;
	}
	//
	while ($row = mysqli_fetch_assoc($result)) {
		$total = $row['salePrice'] * $row['amount'];
		mysqli_query($link, "INSERT INTO `order` VALUES('$row[pNo]','$row[mId]','$row[cartTIme]',$row[amount],$row[salePrice],'$tno_str')");
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
	mysqli_query($link, "DELETE FROM cart WHERE mId = '" . $_SESSION['mid'] . "'"); //delete in cart

	echo "<script>alert('商品已加入訂單');</script>";
}
unset($_SESSION['cart_pno']);
unset($_SESSION['cart_amount']);
header("refresh:0;url=cart.php");
mysqli_close($link);
?>