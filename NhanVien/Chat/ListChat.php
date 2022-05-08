<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
  $a=$obj["id_NhanVien"];
// $a="2";



$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();

class DichVu{
    var $id_Chat;
    var $TinNhan;
    // var $id_KhachHang;
    var $HinhAnh;
    var $TenKH;
    var $created_at;
    var $id_KhachHang;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_anh, $_tenKH, $_time, $_idKH){
       
        $this->id_Chat= $_id;
        $this->TinNhan= $_name;
        $this->HinhAnh=$_anh;
        $this->TenKH=$_tenKH;
        $this->created_at=$_time;
        $this->id_KhachHang= $_idKH;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT a.id_Chat, a.TinNhan, a.created_at,
        b.HinhAnh, b.TenKH , a.id_KhachHang
        FROM chat a, khachhang b 
        WHERE a.id_KhachHang=b.id_KhachHang AND a.id_NhanVien='$a'
        GROUP BY a.id_KhachHang 
        ORDER BY id_Chat DESC";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_Chat"],$row["TinNhan"]
            , $row["HinhAnh"], $row["TenKH"], $row["created_at"], $row["id_KhachHang"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

