<?php 
$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrKhachHang= array();
class KhachHang{
    //  var $id_KhachHang;
    // var $TenKH;
    
    // var $DiaChi;
    // var $GioiTinh;
    // var $SoDienThoai;
    // var $HinhAnh;
   var $MatKhau;
   var $Email;

 function KhachHang($_email,$_pass){
        // $this->id_KhachHang= $_id;
        // $this->TenKH= $_name;
        
        // $this->DiaChi=$_diachi;
        // $this->GioiTinh=$_gioitinh;
        // $this->SoDienThoai=$_phone;
        // $this->HinhAnh=$_image;
        $this->MatKhau=$_pass;
        $this->Email = $_email;
    }
}
$sql = "SELECT Email, MatKhau FROM khachhang";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 array_push($arrKhachHang, new KhachHang( $row["Email"],$row["MatKhau"] ));
}
echo json_encode($arrKhachHang);
// } else {
// echo "0 results";
// }
$connect->close();
?> 