<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Giỏ hàng</title>
<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
<h1> DEMO GIỎ HÀNG</h1>
<h2> <a href="Sanpham.php"> Danh sách sản phẩm</a></h2>
<?php
session_start();
require("Database.php");
if(isset($_SESSION["cart"])==false || count($_SESSION["cart"])==0)//nếu chưa có giỏ hàng
{
?>
    <div class="pro">
    <p> Bạn chưa có sản phẩm nào trong giỏ hàng</p>
    <a href="Sanpham.php"> Vào Danh sách sản phẩm</a>
    </div>
<?php
}
else
{
?>
	<form name="form1" id="form1" method="post" action="updatecart.php">
<?php
	$tongtien =0;
	foreach($_SESSION["cart"] as $id => $soluong)
	{
		$row = Tim_Sanpham_Theo_ID($id);
		$tongtien += $row["price"]*$soluong;
?>
    <div class="pro">
        <h3><?=$row["title"]?> - <?=$row["author"]?></h3>
        <p>Giá: <b><?=number_format($row["price"])?> vnđ </b></p>
        <p align="right">
        Số lượng <input type="text" name="qty[<?=$id?>]"  value="<?=$soluong?>" size="5">
        </p>
        <p align="right">Tổng tiền Sản phẩm: 
        	<b><?=number_format($row["price"]*$soluong)?> vnđ</b>
        </p>
        <p align="right"><a href="delcart.php?id=<?=$id?>">Xóa sản phẩm</a></p>
    </div>
<?php
	}//for
?>
	<div class="pro">
    	<h3 style="text-align:right; color:red">
        Tổng tiền: <?=number_format($tongtien)?> VNĐ</h3>
        <p align="center">
        <input type="submit" name="b1" id="b1" value="CẬP NHẬT SỐ LƯỢNG" 
        	style="width:300px; height:50px; font-size:18px">
         </p>
         <p align="center">
         <a href="delcart.php?id=0" style="width:300px; height:50px; font-size:18px; color:RED">
            XÓA TẤT CẢ SẢN PHẨM</a>
         </p>
    </div>
    </form>
<?php
}//else
?>
</body>
</html>