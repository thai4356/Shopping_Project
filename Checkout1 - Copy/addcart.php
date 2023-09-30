<?php
session_start();//khai báo sử dụng SESSION
//lấy mã sản phẩm cần thêm
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
if($id=="" || is_numeric($id)==false)
	die("<h3> lỗi id</h3>");

//nếu tồn tại giỏ hàng và mã sản phẩm đã có thì tăn số lượng lên 1 đơn vị
if( isset($_SESSION["cart"]) && array_key_exists($id,$_SESSION["cart"]))
{
	$soluong = $_SESSION["cart"][$id];
	$soluong++;
	$_SESSION["cart"][$id] = $soluong;
}
else 
{
//mã sản phẩm chưa có trong giỏ hàng hoặc giỏ hàng chưa tồn tại 
//thì thêm mới 1 sản phẩm vào giỏ hàng
	$_SESSION["cart"][$id] = 1;
}
//chuyển tới trang hiển thị giỏ hàng
header("location:cart.php");
?>