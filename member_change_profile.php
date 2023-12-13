<?php
include "connect.php";
session_start();
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$mid=$_SESSION['mid'];
$email=$_POST['email'];
$birthday=$_POST['birthday'];

$sql="UPDATE member set email='$email' where mId='$mid'";
$sql="UPDATE member set birthday='$birthday' where mId='$mid'";

if ($result = mysqli_query($link, $sql)) {
header("refresh:0;url = indexm.php");
}
?>