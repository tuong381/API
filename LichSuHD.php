<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_KhachHang"];
// $a='7';


//$data =json_decode(file_get_contents('php://input'), true);

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();


class DichVu{
    var $id_HD;
    var $TongHoaDon;
    var $TenVe;
    var $GioDK;
    var $TenNV;
    var $NgayDK;
    var $AnhDaiDien;
    var $TrangThaiLichHen;

    var $TrangThaiHoaDon;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_idHD, $_gia, $_tenve, $_gio, $_tenNV, $_ngay, $_anh, $_state, $_stateHD){
       
        $this->id_HD= $_idHD;
        
        $this->TongHoaDon=$_gia;
        $this->TenVe=$_tenve;
        $this->GioDK= $_gio;
        $this->TenNV = $_tenNV;
        $this->NgayDK= $_ngay;
        $this->AnhDaiDien= $_anh;
        $this->TrangThaiLichHen= $_state;
        $this->TrangThaiHoaDon= $_stateHD;

        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
$sql = "SELECT a.id_HD,  a.TongHoaDon, a.TenVe, b.GioDK, c.TenNV, b.NgayDK, c.AnhDaiDien, b.TrangThaiLichHen, a.TrangThaiHoaDon
        FROM hoadon a , lichhen b, nhanvien c
        WHERE a.id_LichHen=b.id_LichHen AND b.id_NhanVien=c.id_NhanVien AND  a.id_KhachHang='$a'
         ORDER BY a.id_HD DESC"
        ;
$result = $connect->query($sql);


// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

array_push($arrDichVu1, new DichVu($row["id_HD"],  $row["TongHoaDon"], $row["TenVe"], $row["GioDK"]
            , $row["TenNV"], $row["NgayDK"], $row["AnhDaiDien"], $row["TrangThaiLichHen"], $row["TrangThaiHoaDon"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

