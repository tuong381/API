<?php 

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
//$id_dichVu="2";
 $id_KhachHang=$obj["id_KhachHang"];
 $id_NhanVien= $obj["id_NhanVien"];
//   $a="4";
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
    var $TrangThai;
    var $TenKH;
    // $_id, $_name, $_email,$_sodienthoai,$_diachi
    function DichVu($_id, $_name, $_anh, $_tenNV, $_time, $_idKH, $_idNV, $_state, $_tenKH){
       
        $this->id_Chat= $_id;
        $this->TinNhan= $_name;
        // $this->id_KhachHang= $_idKH;
        $this->AnhDaiDien=$_anh;
        $this->TenNV=$_tenNV; 
        $this->created_at=$_time;
        $this->id_KhachHang=$_idKH;
        $this->id_NhanVien=$_idNV;
        $this->TrangThai= $_state;
        $this->TenKH= $_tenKH;
        // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
    }
}



$dk="SELECT id_NhanVien, id_KhachHang FROM chat where id_NhanVien='$id_NhanVien' AND id_KhachHang='$id_KhachHang'";
$result = $connect->query($dk);
if(mysqli_num_rows($result)!==0){
    $sql = "SELECT a.id_Chat, a.TinNhan, a.created_at,
        b.AnhDaiDien, b.TenNV , a.id_KhachHang, a.id_NhanVien, a.TrangThai, c.TenKH
        FROM chat a, nhanvien b , khachhang c
        WHERE a.id_NhanVien=b.id_NhanVien AND a.id_KhachHang=c.id_KhachHang AND  a.id_KhachHang='$id_KhachHang' AND a.id_NhanVien='$id_NhanVien'";
        $result = $connect->query($sql);
}else{
    // $c =$a+$b;

    $sql= "INSERT INTO chat (id_Chat,id_NhanVien, id_KhachHang, TinNhan, TrangThai, created_at) VALUE (null,'$id_NhanVien','$id_KhachHang', 'Xin chào','-1', null) ";
    $result = $connect->query($sql);
    $id= mysqli_insert_id($connect);

    // $sql= "INSERT INTO chat (id_Chat,id_NhanVien, id_KhachHang, TrangThai, created_at) VALUE (null,'$id_NhanVien','$id_KhachHang', '-1', null) ";
    // $result = $connect->query($sql);
    // $id= mysqli_insert_id($connect);


   
    
}



// $sql = "SELECT a.id_Chat, a.TinNhan, a.created_at,
//         b.AnhDaiDien, b.TenNV , a.id_KhachHang, a.id_NhanVien, a.TrangThai, c.TenKH
//         FROM chat a, nhanvien b , khachhang c
//         WHERE a.id_NhanVien=b.id_NhanVien AND a.id_KhachHang=c.id_KhachHang AND  a.id_KhachHang='$id_KhachHang' AND a.id_NhanVien='$id_NhanVien'";
// $result = $connect->query($sql);


// Load dữ liệu lên website
while($row = mysqli_fetch_array($result)) {

 // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
array_push($arrDichVu1, new DichVu( $row["id_Chat"],$row["TinNhan"] , $row["AnhDaiDien"],
         $row["TenNV"], $row["created_at"], $row["id_KhachHang"], $row["id_NhanVien"], $row["TrangThai"], $row["TenKH"]));

//array_push($arrDichVu1, new DichVu($row["id_NhanVien"], $row["TenNV"], $row["Email"], $row["SoDienThoai"], $row["DiaChi"]));
}
echo json_encode($arrDichVu1);
//$connect->close();

?> 

