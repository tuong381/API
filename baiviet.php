<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_DanhMuc"];

//$data =json_decode(file_get_contents('php://input'), true);

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDanhMuc = array();


class DanhMuc{
 //  var $id_NhanVien;
    var $TenBaiViet;
    var $NoiDungBaiViet;
    var $HinhAnh;
    var $id_BaiViet;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DanhMuc($_id, $_name, $_image,$_noidung){
       
      $this->id_BaiViet= $_id;
        $this->TenBaiViet= $_name;
        $this->HinhAnh=$_image;
        $this->NoiDungBaiViet=$_noidung;
      //  $this->id_NhanVien= $_idNV;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT * FROM baiviet WHERE id_DanhMuc='$a' ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDanhMuc, new DanhMuc( $row["id_BaiViet"],$row["TenBaiViet"], $row["HinhAnh"], $row["NoiDungBaiViet"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDanhMuc);
//$connect->close();

?> 

