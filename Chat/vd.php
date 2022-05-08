<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
 $kh=$obj["id_KhachHang"];
 $nv=$obj["id_NhanVien"];

// $kh="4";
// $nv="2";


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();

class DichVu{
    var $id_Chat;
    var $TinNhan;
    // var $id_KhachHang;
    // var $AnhDaiDien;
    // var $TenNV;
    var $created_at;
    var $id_KhachHang;
    var $id_NhanVien;
    var $TrangThai;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name,  $_time, $_idKH, $_idNV, $_state){
       
        $this->id_Chat= $_id;
        $this->TinNhan= $_name;
        // $this->id_KhachHang= $_idKH;
        // $this->AnhDaiDien=$_anh;
        // $this->TenNV=$_tenNV;
        $this->created_at=$_time;
        $this->id_KhachHang=$_idKH;
        $this->id_NhanVien=$_idNV;
        $this->TrangThai=$_state;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
// $sql = "SELECT id_Chat, TinNhan, created_at, id_KhachHang, id_NhanVien, TrangThai
//         -- b.AnhDaiDien, b.TenNV 
//         FROM chat 
//         WHERE  PhongChat='1'";
// $result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website


while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_Chat"],$row["TinNhan"]
            ,  $row["created_at"],   $row["id_KhachHang"],  $row["id_NhanVien"], $row["TrangThai"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

