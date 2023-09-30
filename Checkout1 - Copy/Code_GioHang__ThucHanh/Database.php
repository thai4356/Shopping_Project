<?php
function KetnoiCSDL()
{
	$servername = "localhost:3306"; 
	$user = "root";
	$pass = "";
	$conn = NULL;
	try{
		$conn = new PDO("mysql:host=$servername;dbname=shop",$user,$pass);
		$conn->query("SET NAMES UTF8");
	}
	catch(PDOException $e){
		echo "<p>LỖI KẾT NỐI CSDL</p>";
		echo "<p>" . $e->getMessage() . "</p>";
	}
	return $conn;
}

//hàm trả mảng sản phẩm 
function DanhSach_SP()
{
	$conn = KetnoiCSDL();
	if($conn==NULL)
		die("<h3> LỖI KẾT NỐI CSDL </h3>");
	$sql = "SELECT * FROM books";
	$pdo_stm = $conn->prepare($sql);
	$ketqua = $pdo_stm->execute();
	if($ketqua==FALSE)
		return NULL;
	else
	{
		return $pdo_stm->fetchAll();
	}
}
//tìm kiếm sản phẩm theo id
function Tim_Sanpham_Theo_ID($id)
{
	$conn = KetnoiCSDL();
	if($conn==NULL)
		die("<h3> LỖI KẾT NỐI CSDL </h3>");
	$sql = "SELECT * FROM books WHERE id=$id";
	$pdo_stm = $conn->prepare($sql);
	$ketqua = $pdo_stm->execute();
	if($ketqua==FALSE)
		return NULL;
	else
	{
		return $pdo_stm->fetch();
	}
}
?>