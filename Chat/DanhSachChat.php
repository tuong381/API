<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
 $id_KhachHang=$obj["id_KhachHang"];

// $id_KhachHang="6";
// $id_NhanVien= "2";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();

class DichVu{
    var $id_Chat;
    var $TinNhan;
    var $AnhDaiDien;
    var $TenNV;
    var $created_at;
    var $id_KhachHang;
    var $id_NhanVien;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_anh, $_tenNV, $_time, $_idKH, $_idNV){
       
        $this->id_Chat= $_id;
        $this->TinNhan= $_name;
        $this->AnhDaiDien=$_anh;
        $this->TenNV=$_tenNV; 
        $this->created_at=$_time;
        $this->id_KhachHang=$_idKH;
        $this->id_NhanVien=$_idNV;
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";





$sql = "SELECT a.id_Chat, a.TinNhan, a.created_at,
        b.AnhDaiDien, b.TenNV , a.id_KhachHang, a.id_NhanVien
        FROM chat a, nhanvien b 
        WHERE a.id_NhanVien=b.id_NhanVien AND a.id_KhachHang='$id_KhachHang'
         GROUP BY a.id_NhanVien  
        ORDER BY id_Chat DESC";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_Chat"],$row["TinNhan"] , $row["AnhDaiDien"],
         $row["TenNV"], $row["created_at"], $row["id_KhachHang"], $row["id_NhanVien"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

