<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_NhanVien = $obj["id_NhanVien"];
$NgayDK = $obj["NgayDK"];
$GioDK = $obj["GioDK"];

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$dk="SELECT id_NhanVien,NgayDk, GioDK FROM lichhen where NgayDK='$NgayDK' AND GioDK='$GioDK' AND id_NhanVien='$id_NhanVien' AND TrangThaiLichHen!='-1' ";
$result = $connect->query($dk);
if(mysqli_num_rows($result)==1){
    $id=0;
}
else{
    $id= 1;
}


?>
{
    "id":"<?= $id ?>"
}

