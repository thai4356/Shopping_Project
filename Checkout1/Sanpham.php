<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách sản phẩm</title>
<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
<h1> Demo <a href="cart.php">giỏ hàng</a></h1>
<?php
require("Database.php");
$rows = DanhSach_SP();
if($rows==NULL)
	die("<h3> LỖI TRUY VẤN CSDL</h3>");
foreach($rows as $row)
{
?>
<div class="pro">
	<h2> <?=$row["title"]?></h2>
	<p> Tác giả: <?=$row["author"]?> - Giá: <?=number_format($row["price"])?> VNĐ </p>
    <p align="right"><a href="addcart.php?id=<?=$row["id"]?>">Mua sách này</a>
</div>
<?php
}
?>
</body>
</html>