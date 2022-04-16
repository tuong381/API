<?php 
$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrNhanVien = array();
class DichVu{
    var $id_NhanVien;
    var $TenNV;
    var $Email;
    var $SoDienThoai;
    var $DiaChi;
    var $MatKhau;
    var $AnhDaiDien;
    var $NgaySinh;
    var $GioiTinh;
    var $KinhNghiem;

    function DichVu($_id, $_name,$_email, $_phone,$_diachi,$_matkhau, $_image,$_ngay,$_gioitinh, $_kinhnghiem){
        $this->id_NhanVien= $_id;
        $this->TenNV= $_name;
        $this->Email = $_email;
        $this->SoDienThoai=$_phone;
        $this->DiaChi=$_diachi;
        $this->MatKhau=$_matkhau;
        $this->AnhDaiDien=$_image;
        $this->NgaySinh=$_ngay;
        $this->GioiTinh=$_gioitinh;
        $this->KinhNghiem=$_kinhnghiem;

    }
}
$sql = "SELECT * FROM nhanvien";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 array_push($arrNhanVien, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"],
         $row["DiaChi"], $row["MatKhau"], $row["AnhDaiDien"], $row["NgaySinh"], $row["GioiTinh"], $row["KinhNghiem"]));
}
echo json_encode($arrNhanVien);
// } else {
// echo "0 results";
// }
$connect->close();
?> 