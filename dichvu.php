<?php 
$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$arrDichVu = array();
class DichVu{
    var $id_DichVu;
    var $TenDichVu;
    var $HinhAnh_DV;
    var $Gia;
    // var $id_NhanVien;

    function DichVu($_id, $_name, $_image,$_price){
        $this->id_DichVu= $_id;
        $this->TenDichVu= $_name;
        $this->HinhAnh_DV = $_image;
        // $this->id_NhanVien=$_id_NV;
        $this->Gia=$_price;
    }
}
$sql = "SELECT * FROM dichvu";
$result = $connect->query($sql);
// if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 array_push($arrDichVu, new DichVu($row["id_DichVu"], $row["TenDichVu"], $row["HinhAnh_DV"], $row["Gia"]));
}
echo json_encode($arrDichVu);
// } else {
// echo "0 results";
// }
$connect->close();
?> 