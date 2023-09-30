<?php
session_start();
if(isset($_REQUEST["qty"])==false)
	die("<p> lỗi form</p>");
$qty = $_REQUEST["qty"]; //lấy mảng các input có name=qty[id]
//print_r($qty);
foreach($qty as $id=>$soluong)
{
	$_SESSION["cart"][$id] = $soluong;
}
header("location:cart.php");
?>