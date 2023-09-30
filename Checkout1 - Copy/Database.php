<?php
function KetnoiCSDL()
{
	$servername = "localhost:3306"; 
	$user = "root";
	$pass = "";
	$conn = NULL;
	try{
		$conn = new PDO("mysql:host=$servername;dbname=buoi10",$user,$pass);
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
	$sql = "SELECT * FROM books WHERE id = $id";
	$pdo_stm = $conn->prepare($sql);
	$ketqua = $pdo_stm->execute();
	if(!$ketqua)
		return NULL;
	else
	{
		return $pdo_stm->fetch();
	}
}
//hàm thêm hóa đơn mới
function ThemHoaDon($hoten, $diachi, $dienthoai, $ngaynhan)
{
	$conn = KetnoiCSDL();
	if($conn==NULL)
		die("<h3> LỖI KẾT NỐI CSDL </h3>");
	$sql = "INSERT INTO tbHoadon(tennguoimua,diachi,dienthoai,ngaynhan) VALUES(?,?,?,?)";
	$pdo_stm = $conn->prepare($sql);
	$data = [$hoten, $diachi, $dienthoai, $ngaynhan];
	$ketqua = $pdo_stm->execute($data);
	if(!$ketqua)
		return 0;//NẾU CÓ LỖI TRẢ VỀ 0
	else
	{
		return $conn->lastInsertId();//trả lại mã hóa đơn vừa thêm
	}
}
//hàm thêm chi tiết hóa đơn mới
function ThemChitietHoaDon($mahd,$masp,$soluong,$giasp)
{
	$conn = KetnoiCSDL();
	if($conn==NULL)
		die("<h3> LỖI KẾT NỐI CSDL </h3>");
	$sql = "INSERT INTO tbchitiethoadon(mahd,masp,soluong,giamua) VALUES(?,?,?,?)";
	$pdo_stm = $conn->prepare($sql);
	$data = [$mahd,$masp,$soluong,$giasp];
	$ketqua = $pdo_stm->execute($data);
	if($ketqua==FALSE)
		return 0;//NẾU CÓ LỖI TRẢ VỀ 0
	else
	{
		return $conn->lastInsertId();//trả lại mã chi tiết hóa đơn vừa thêm
	}
}
?>