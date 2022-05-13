<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_KhachHang"];
//   $a='7';


//$data =json_decode(file_get_contents('php://input'), true);

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu1 = array();


class DichVu{
    var $id_HD;
    var $TongHoaDon;
    var $TenSanPham;
    var $HinhAnh_SP;
    var $Ngay;
    var $TrangThaiHoaDon;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_idHD, $_gia,$_tenSP, $_anh, $_ngay, $_state){
       
        $this->id_HD= $_idHD;
        $this->TongHoaDon=$_gia;
        $this->TenSanPham = $_tenSP;
        // $this->Gia=$_gia;
        $this->HinhAnh_SP=$_anh;
        $this->Ngay=$_ngay;
        $this->TrangThaiHoaDon= $_state;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
$sql = "SELECT a.id_HD,  a.TongHoaDon,  b.TenSanPham,  b.HinhAnh_SP, a.Ngay, a.TrangThaiHoaDon
        FROM hoadon a, sanpham b
        WHERE a.id_SanPham= b.id_SanPham AND a.id_KhachHang='$a'
         ORDER BY a.id_HD DESC"
        ;
$result = $connect->query($sql);


// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

array_push($arrDichVu1, new DichVu($row["id_HD"],  $row["TongHoaDon"], $row["TenSanPham"],  $row["HinhAnh_SP"]
            , $row["Ngay"],  $row["TrangThaiHoaDon"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

