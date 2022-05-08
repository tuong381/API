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

$arrThongBao = array();


class ThongBao{
 //  var $id_NhanVien;
    var $id_ThongBao;
    var $TieuDe;
    var $TenNV;
    var $TenKH;
    var $NgayDK;
    var $GioDK;
    var $TrangThai;
    var $created_at;
    var $HinhAnh; 
    var $AnhDaiDien;
    var $id_LichHen;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function ThongBao($_id, $_tieude, $_tenNV, $_tenKH, $_ngayDK, $_gio, $_trangthai ,$_created, $_anhKH, $_anhNV, $_idLH){
      
        $this->id_ThongBao=$_id;
        $this->TieuDe = $_tieude;
        $this->TenNV = $_tenNV;
        $this->TenKH = $_tenKH;
        $this-> NgayDK = $_ngayDK;
        $this->GioDK = $_gio;
        $this->TrangThai= $_trangthai;
        $this->created_at= $_created;
        $this->HinhAnh = $_anhKH;
        $this->AnhDaiDien = $_anhNV;

        $this->id_LichHen=$_idLH;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}

$sql = "SELECT d.id_ThongBao, d.TieuDe, b.TenNV, c.TenKH, a.NgayDK, a.GioDK, d.TrangThai,
         d.created_at, c.HinhAnh, b.AnhDaiDien, a.id_LichHen
        FROM lichhen a, nhanvien b , khachhang c, thongbao d
        WHERE d.id_LichHen=a.id_LichHen AND d.id_NhanVien=b.id_NhanVien AND d.id_KhachHang= c.id_KhachHang AND d.id_NhanVien='$a'
        ORDER BY d.id_ThongBao DESC ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {


array_push($arrThongBao, new ThongBao( $row["id_ThongBao"],$row["TieuDe"], $row["TenNV"],
        $row["TenKH"], $row["NgayDK"], $row["GioDK"],$row["TrangThai"], $row["created_at"], $row["HinhAnh"] , $row["AnhDaiDien"], $row["id_LichHen"] ));

}
echo json_encode($arrThongBao);
//$connect->close();

?> 

