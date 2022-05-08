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
    var $TenVeDV;
    var $SoNgay;
    var $Gia;
    // var $DiaChi;
    var $id_DichVu;
     var $id_CTDV;
    //  var $AnhDaiDien;
    //  var $KinhNghiem;
    //  var $GioiTinh;
    //  var $NgaySinh;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_idDV, $_gia,$_date){
       
      $this->id_CTDV= $_id;
        $this->TenVeDV= $_name;
        $this->id_DichVu= $_idDV;
        $this->Gia=$_gia;
        $this->SoNgay = $_date;
        // $this->SoDienThoai=$_sodienthoai;
        // $this->DiaChi=$_diachi;  
        // $this->KinhNghiem =$_kinhnghiem;
        // $this->GioiTinh=$_gioitinh;
        // $this->NgaySinh=$_date;
      //  $this->id_NhanVien= $_idNV;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}
// $sql = "SELECT nhanvien.id_NhanVien, nhanvien.TenNV, nhanvien.Email,nhanvien.SoDienThoai, nhanvien.DiaChi FROM nhanvien, dichvu WHERE nhanvien.id_DichVu='$id_DichVu'";
$sql = "SELECT * FROM chitietdichvu WHERE id_DichVu='$a' ";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_CTDV"],$row["TenVeDV"], $row["id_DichVu"], $row["Gia"],
         $row["SoNgay"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

