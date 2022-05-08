<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
$a=$obj["id_KhachHang"];
//  $a='6';


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
    var $TenVe;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_idHD, $_gia,$_tenSP, $_tenve){
       
        $this->id_HD= $_idHD;
        
        $this->TongHoaDon=$_gia;

        $this->TenSanPham = $_tenSP;
        $this->TenVe=$_tenve;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
$sql = "SELECT a.id_HD,  a.TongHoaDon,  a.TenSanPham, a.TenVe
        FROM hoadon a
        WHERE  a.id_KhachHang='$a'
        ORDER BY a.id_HD DESC";
$result = $connect->query($sql);


// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

array_push($arrDichVu1, new DichVu($row["id_HD"],  $row["TongHoaDon"], $row["TenSanPham"],  $row["TenVe"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

