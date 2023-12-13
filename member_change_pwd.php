<?php
include "connect.php";
session_start();
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$old=$_POST['old'];
$new=$_POST['new'];

$sql="UPDATE member set pwd='$new' where pwd='$old'";

if ($result = mysqli_query($link, $sql)) {
	header("refresh:0;url = indexm.php");
}
?>