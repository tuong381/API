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
    var $TenKH;
    var $SoDienThoai;
    var $id_LichHen;
     var $TongTien;
     var $NgayDK;
     var $GioDK;
     var $TenDichVu;
     var $id_KhachHang;
     var $HinhAnh;
     var $TrangThaiLichHen;
     var $id_NhanVien;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name,  $_sodienthoai, $_tongtien,
                 $_ngay, $_gio, $_tenDV, $_idKH, $_anh, $_state, $_idNV){
       
        $this->id_LichHen= $_id;
        $this->TenKH= $_name;
        $this->SoDienThoai=$_sodienthoai;
        $this->TongTien=$_tongtien;
        $this->NgayDK=$_ngay;  
        $this->GioDK=$_gio;
        $this->TenDichVu=$_tenDV;
        $this->id_KhachHang=$_idKH;
        $this->HinhAnh=$_anh;
        $this->TrangThaiLichHen=$_state;
        $this->id_NhanVien=$_idNV;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT a.id_LichHen, b.TenKH, b.SoDienThoai, a.TongTien, a.NgayDK, a.GioDK,
             c.TenDichVu, b.id_KhachHang, b.HinhAnh, a.TrangThaiLichHen, a.id_NhanVien
        FROM lichhen a, khachhang b , dichvu c
        WHERE a.id_KhachHang=b.id_KhachHang AND a.id_DichVu=c.id_DichVu AND id_NhanVien='$a'
        ORDER BY a.id_LichHen DESC ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_LichHen"],$row["TenKH"], $row["SoDienThoai"], $row["TongTien"], $row["NgayDK"],
            $row["GioDK"],$row["TenDichVu"] ,$row["id_KhachHang"],$row["HinhAnh"],$row["TrangThaiLichHen"] ,$row["id_NhanVien"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

