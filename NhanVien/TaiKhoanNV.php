<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_NhanVien"];
//$data =json_decode(file_get_contents('php://input'), true);

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();


class DichVu{
 //  var $id_NhanVien;
    var $TenNV;
    var $Email;
    var $SoDienThoai;
    var $DiaChi;
     var $AnhDaiDien;
     var $GioiTinh;
     var $KinhNghiem;
     var $MatKhau;
      var $NgaySinh;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_email, $_sodienthoai, $_diachi,  $_image, $_gioitinh, $_kinhnghiem, $_matkhau, $_ngay){
       
        $this->id_NhanVien= $_id;
        $this->TenNV= $_name;
        $this->Email = $_email;
        $this->SoDienThoai=$_sodienthoai;
        $this->DiaChi=$_diachi;  
        $this->AnhDaiDien=$_image;
       $this->GioiTinh= $_gioitinh;
       $this->MatKhau= $_matkhau;
       $this->KinhNghiem= $_kinhnghiem;
       $this->NgaySinh= $_ngay;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT * FROM nhanvien WHERE id_NhanVien='$a' ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu($row["id_NhanVien"],$row["TenNV"], $row["Email"], $row["SoDienThoai"],
     $row["DiaChi"], $row["AnhDaiDien"],$row["GioiTinh"],$row["KinhNghiem"],$row["MatKhau"], $row["NgaySinh"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

