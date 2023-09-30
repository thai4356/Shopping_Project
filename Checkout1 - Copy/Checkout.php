<?php
session_start();
require("Database.php");
if(isset($_REQUEST["dathang"])==false)
    die("<h3>Chưa đặt hàng từ form</h3>");
$hoten = $_REQUEST["hoten"];
$diachi = $_REQUEST["diachi"];
$dienthoai = $_REQUEST["dienthoai"];
$ngaynhan = $_REQUEST["ngaynhan"];
//thêm hóa đơn mới
$mahd = ThemHoaDon($hoten,$diachi,$dienthoai,$ngaynhan);
if($mahd==0)
    die("<h3>LỖI THÊM HÓA ĐƠN</h3>");
echo "<h3> mã hóa đơn vừa thêm là: $mahd </h3>";
//thêm các sản phẩm từ giỏ hàng vào chi tiết  hóa đơn (mahd,masp,soluong,giamua)
if(isset($_SESSION["cart"])==false)
    die("<h3>Giỏ hàng chưa có</h3>");
foreach($_SESSION["cart"] as $id => $soluong)
{
    //lấy giá sản phẩm từ bảng sản phẩm
    $row = Tim_Sanpham_Theo_ID($id);
    $giasp = $row["price"];
    $macthd = ThemChitietHoaDon($mahd,$id,$soluong,$giasp);
    if($macthd==0)
        die("<h3>LỖI THÊM CHI TIẾT HÓA ĐƠN CỦA SẢN PHẨM $id</h3>");
}
unset($_SESSION["cart"]); //hủy giỏ hàng
echo "<h3> CẢM ƠN BẠN ĐÃ MUA HÀNG<h3>";
echo "<h3> Hãy CK vào TK số 0134567890 tai Ngân hàng....</h3>";
echo "<h3> Chúng tôi sẽ liên hệ trong thời gian tối đa 6h </h3>";
echo "<a href=\"cart.php\"> Quay về giỏ hàng </a>";
?>