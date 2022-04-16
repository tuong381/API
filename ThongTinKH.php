<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);
$a = $obj["email"];
$b = $obj["matkhau"];
// $a = "tuong123@gmail.com";
// $b = "123";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}



    // $c =$a+$b;

    $sql= "SELECT * FROM khachhang WHERE Email='$a' AND MatKhau='$b' ";
    $result = $connect->query($sql);

    if(mysqli_num_rows($result)===0){
        $c="0";
     
        
    }
    else{
        $c="1";
       
    }

    
    
?>

{"kq":"<?=$c?>"}