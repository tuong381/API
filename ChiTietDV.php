<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_DichVu"];

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
     var $id_DichVu;
     var $id_NhanVien;
     var $AnhDaiDien;
     var $KinhNghiem;
     var $GioiTinh;
     var $NgaySinh;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_idDV, $_image,$_email,$_sodienthoai,$_diachi, $_kinhnghiem, $_gioitinh, $_date){
       
      $this->id_NhanVien= $_id;
        $this->TenNV= $_name;
        $this->id_DichVU= $_idDV;
        $this->AnhDaiDien=$_image;
        $this->Email = $_email;
        $this->SoDienThoai=$_sodienthoai;
        $this->DiaChi=$_diachi;  
        $this->KinhNghiem =$_kinhnghiem;
        $this->GioiTinh=$_gioitinh;
        $this->NgaySinh=$_date;
      //  $this->id_NhanVien= $_idNV;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT * FROM nhanvien WHERE id_DichVu='$a' ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_NhanVien"],$row["TenNV"], $row["id_DichVu"], $row["AnhDaiDien"],
         $row["Email"], $row["SoDienThoai"], $row["DiaChi"], $row["KinhNghiem"], $row["GioiTinh"], $row["NgaySinh"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

