<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
 $id_DanhMuc=$obj["id_DanhMuc"];


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDanhMuc = array();
class danhmuc{
    var $id_SanPham;
    var $id_DanhMuc;
    var $TenDanhMuc;
    var $TenSaPham;
    var $Gia;
    var $SoLuong_SP;
    var $HinhAnh_SP;
    var $MoTaSanPham;
    var $SoLuong_SPDaBan;


    function danhmuc($_idSP, $_idDM, $_tenDM, $_tenSP, $_gia, $_soluong, $_image, $_mota, $_sl ){
        $this->id_SanPham= $_idSP;
        $this->id_DanhMuc= $_idDM;
        $this->TenDanhMuc= $_tenDM;
        $this->TenSanPham= $_tenSP;
        $this->Gia= $_gia;
        $this->SoLuong_SP= $_soluong;
        $this->HinhAnh_SP = $_image;
        $this->MoTaSanPham= $_mota;
        $this->SoLuong_SPDaBan=$_sl;
    }
}
$sql = "SELECT a.id_DanhMuc, b.id_SanPham, a.TenDanhMuc, b.TenSanPham, b.Gia, b.SoLuong_SP, b.HinhAnh_SP, b.MoTaSanPham, b.SoLuong_SPDaBan
        FROM danhmucsanpham a, sanpham b
        WHERE a.id_DanhMuc=b.id_DanhMuc AND a.id_DanhMuc='$id_DanhMuc'
        ORDER BY id_SanPham DESC
        LIMIT 6
        ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 array_push($arrDanhMuc, new danhmuc($row["id_SanPham"],$row["id_DanhMuc"], $row["TenDanhMuc"], $row["TenSanPham"], $row["Gia"], $row["SoLuong_SP"], $row["HinhAnh_SP"], $row["MoTaSanPham"], $row["SoLuong_SPDaBan"]));
}
echo json_encode($arrDanhMuc);
// } else {
// echo "0 results";
// }
$connect->close();
?> 

