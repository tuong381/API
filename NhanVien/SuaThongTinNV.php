<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_NhanVien = $obj["id_NhanVien"];
$TenNV = $obj["TenNV"];
$SoDienThoai= $obj["SoDienThoai"];
$DiaChi= $obj["DiaChi"];
$KinhNghiem= $obj["KinhNghiem"];
$GioiTinh= $obj["GioiTinh"];
$Email= $obj["Email"];

$AnhDaiDien= $obj["AnhDaiDien"];
$NgaySinh= $obj["NgaySinh"];


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

  
    $sql="UPDATE nhanvien
            SET TenNV='$TenNV', SoDienThoai='$SoDienThoai', Email='$Email',
                DiaChi='$DiaChi', GioiTinh='$GioiTinh', KinhNghiem='$KinhNghiem', AnhDaiDien='$AnhDaiDien', NgaySinh='$NgaySinh'
            WHERE id_NhanVien='$id_NhanVien'";

  //  $sql="SELECT * FROM khachhang WHERE id_KhachHang='$id_KhachHang'";
    $result = $connect->query($sql);

    if (mysqli_query($connect, $sql)) {
        // echo "Succuss";
        $c=1;
    } else {
       // echo "Error" . $conn->error;
       $c=0;
    }

       $connect->close();
    
    
?>
{"kq":"<?= $c ?>"}

