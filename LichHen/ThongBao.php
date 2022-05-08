<?php

$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_LichHen = $obj["id_LichHen"];
$id_NhanVien= $obj["id_NhanVien"];
$id_KhachHang=$obj["id_KhachHang"];
$TieuDe= "yêu cầu hủy lịch hẹn";
 
// $a = "tuong123@gmail.com";
// $b = "123";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}



    // $c =$a+$b;

    $sql= "INSERT INTO thongbao VALUE (null,'$id_NhanVien', '$id_KhachHang','$id_LichHen','$TieuDe', '3',null,null) ";
    $result = $connect->query($sql);

    $id= mysqli_insert_id($connect);


    
    
?>
{
    "id":"<?= $id ?>"
}
