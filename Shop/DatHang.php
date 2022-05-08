<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_SanPham = $obj["id_SanPham"];
$TenSanPham = $obj["TenSanPham"];
$id_KhachHang = $obj["id_KhachHang"];
$Gia = $obj["Gia"];
// $b = "123";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

    $sql= "INSERT INTO hoadon VALUE (null,'$id_KhachHang','$id_SanPham', '$TenSanPham',null, null,$Gia,null,'0') ";
    $result = $connect->query($sql);

    $id= mysqli_insert_id($connect);
    
    
?>
{
    "id":"<?= $id ?>"
}
