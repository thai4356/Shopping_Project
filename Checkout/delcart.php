<?php
session_start();
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
if($id=="" || is_numeric($id)==false)
	die("<h3> lỗi id</h3>");
if(isset($_SESSION["cart"]))
{
	if($id==0)//xóa toàn bộ giỏ hàng
		unset($_SESSION["cart"]);
	else //xóa 1 sản phẩm khỏi giỏ hàng
		unset($_SESSION["cart"][$id]);//xóa sản phẩm có id khỏi mảng
}
header("location:cart.php");
?>