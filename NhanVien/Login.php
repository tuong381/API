<?php

require("../jwt.php");
$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
$a = $obj["email"];
$b = $obj["matkhau"];
// $a = "tuong123@gmail.com";
// $b = "123434";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

    // $c =$a+$b;

    $sql= "SELECT * FROM nhanvien WHERE Email='$a' AND MatKhau='$b' ";
    $result = $connect->query($sql);

    


if(mysqli_num_rows($result)==1){
  $u= mysqli_fetch_array($result);
  $token=array();
  $token["id_NhanVien"]=$u["id_NhanVien"];
  $token["TenNV"]=$u["TenNV"];
  $token["Email"]=$u["Email"];
  $token["SoDienThoai"]=$u["SoDienThoai"];
   $token["AnhDaiDien"]=$u["AnhDaiDien"];
   $token["DiaChi"]=$u["DiaChi"];
  $token["GioiTinh"]=$u["GioiTinh"];
  $token["KinhNghiem"]=$u["KinhNghiem"];
  $token["NgaySinh"]=$u["NgaySinh"];
  
  

  $jsonwebtoken = JWT::encode($token, "nhan vien dang nhap");
echo JsonHelper::getJson("token",$jsonwebtoken);




  
}else{
  echo "{'token':'ERROR'}";
}

$connect->close();


   
?>







 
