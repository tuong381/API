<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$TenKH = $obj["hoten"];
$Email = $obj["email"];
$SoDienThoai = $obj["sdt"];
$MatKhau = $obj["matkhau"];
// $a = "tuong123@gmail.com";
// $b = "123";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}



    // $c =$a+$b;

    $sql= "INSERT INTO khachhang VALUE (null,'$TenKH','$Email', null,null, '$SoDienThoai',null, '$MatKhau',null,null,null,null,null) ";
    $result = $connect->query($sql);

    $id= mysqli_insert_id($connect);


    
    
?>
{
    "id":"<?= $id ?>"
}
