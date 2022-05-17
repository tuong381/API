<?php 
$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
 $keyword = $obj["keyword"];
// $keyword = "PVL";

$arrDanhMuc = array();
class danhmuc{
    var $id_SanPham;
    var $TenSaPham;
    var $Gia;
    var $SoLuong_SP;
    var $HinhAnh_SP;
    var $MoTaSanPham;
    var $SoLuong_SPDaBan;


    function danhmuc($_idSP,  $_tenSP, $_gia, $_soluong, $_image, $_mota, $_sl ){
        $this->id_SanPham= $_idSP;
        $this->TenSanPham= $_tenSP;
        $this->Gia= $_gia;
        $this->SoLuong_SP= $_soluong;
        $this->HinhAnh_SP = $_image;
        $this->MoTaSanPham= $_mota;
        $this->SoLuong_SPDaBan=$_sl;
    }
}
$sql = "SELECT *
        FROM  sanpham 
        WHERE TenSanPham LIKE '%$keyword%'
        -- ORDER BY id_SanPham DESC
        -- LIMIT 6
        ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 array_push($arrDanhMuc, new danhmuc($row["id_SanPham"], $row["TenSanPham"], $row["Gia"], $row["SoLuong_SP"], $row["HinhAnh_SP"], $row["MoTaSanPham"], $row["SoLuong_SPDaBan"]));
}
echo json_encode($arrDanhMuc);
// } else {
// echo "0 results";
// }
$connect->close();
?> 