<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_ThongBao = $obj["id_ThongBao"];


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}
 
    $sql="DELETE FROM thongbao WHERE id_ThongBao='$id_ThongBao'";
    $result = $connect->query($sql);

    // Thực hiện câu truy vấn
if ($result === TRUE) {
    $c=1;
} else {
    $c=0;
}
  
    
?>
{"kq":"<?= $c ?>"}