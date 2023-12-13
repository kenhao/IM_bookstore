<?php

include "connect.php";

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

//$arr_sex = array('F' => '女', 'M' => '男');
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
	$sql = "select * from product";
	if ($result = mysqli_query($link, $sql)) {
		while ($row = mysqli_fetch_assoc($result)) {
			$a['data'][] = array($row["pNo"], $row["pName"], $row["unitPrice"], $row["salePrice"], $row['category'], $row['product_description'], $row['author_description'], $row['picture'], $row['author'], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
		}
		mysqli_free_result($result); // 釋放佔用的記憶體
	}
	mysqli_close($link); // 關閉資料庫連結

	echo json_encode($a);
	exit;
}

if ($oper == "insert") {
	$sql = "insert into `product` values ('" . $_POST['pNo'] . "','" . $_POST['pName'] . "','" . $_POST['unitPrice'] . "','" . $_POST['salePrice'] . "','" . $_POST['category'] . "','" . $_POST['product_description'] . "','" . $_POST['author_description'] . "','" . $_POST['picture'] . "','" . $_POST['author'] . "')";
}

if ($oper == "update") {
	$sql = "update `product` set pName='" . $_POST['pName'] . "',unitPrice='" . $_POST['unitPrice'] . "', salePrice ='" . $_POST['salePrice'] . "',category='" . $_POST['category'] . "',product_description='" . $_POST['product_description'] . "',author_description='" . $_POST['author_description'] . "',picture='" . $_POST['picture'] . "',author='" . $_POST['author'] . "' where pNo='" . $_POST['pNo_old'] . "'";
}

if ($oper == "delete") {
	$sql = "delete from `product` where pNo=" . $_POST['pNo_old'] . "'";
}

if (strlen($sql) > 10) {
	if ($result = mysqli_query($link, $sql)) {
		$a["code"] = 0;
		$a["message"] = "資料" . $arr_oper[$oper] . "成功!";
	} else {
		$a["code"] = mysqli_errno($link);
		$a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
	}
	mysqli_close($link); // 關閉資料庫連結

	echo json_encode($a);
	exit;
}
?>