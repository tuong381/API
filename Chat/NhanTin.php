<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_NhanVien=$obj["id_NhanVien"];
$id_KhachHang=$obj["id_KhachHang"];
$TinNhan = $obj["TinNhan"];
// $id_NhanVien="2";
// $id_KhachHang="4";

// $TinNhan = "vd";
// $a = "tuong123@gmail.com";
// $b = "123";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}



    // $c =$a+$b;

    $sql= "INSERT INTO chat VALUE (null,'$id_NhanVien','$id_KhachHang','$TinNhan', '1', null,null) ";
   // $sql= "INSERT INTO chat VALUE (null,'2','4','vd', '1', '2022/21/3', null) ";
    $result = $connect->query($sql);

   


    $id= mysqli_insert_id($connect);
    
?>
{
    "id":"<?= $id ?>"
}
