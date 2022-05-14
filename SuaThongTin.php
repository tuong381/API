<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_KhachHang = $obj["id_KhachHang"];
$TenKH = $obj["TenKH"];
$SoDienThoai= $obj["SoDienThoai"];
$DiaChi= $obj["DiaChi"];
$CanNang= $obj["CanNang"];
$GioiTinh= $obj["GioiTinh"];
$ChieuCao= $obj["ChieuCao"];
$Email= $obj["Email"];

$HinhAnh= $obj['HinhAnh'];
$NgaySinh =$obj['NgaySinh'];


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

  
    $sql="UPDATE khachhang
            SET TenKH='$TenKH', SoDienThoai='$SoDienThoai', CanNang='$CanNang', Email='$Email',
                DiaChi='$DiaChi', GioiTinh='$GioiTinh', ChieuCao='$ChieuCao', HinhAnh='$HinhAnh', NgaySinh='$NgaySinh'
            WHERE id_KhachHang='$id_KhachHang'";

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

