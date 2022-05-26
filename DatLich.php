<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_DichVu = $obj["id_DichVu"];
$id_NhanVien = $obj["id_NhanVien"];
$id_KhachHang = $obj["id_KhachHang"];
$NgayDK = $obj["NgayDK"];
$GioDK = $obj["GioDK"];
$TongTien= $obj["TongTien"];
$TenVe= $obj["TenVe"];


// $id_DichVu = "15";
// $id_NhanVien ="2";
// $id_KhachHang ="2";
// $NgayDK = "2022-04-22";
// $GioDK = "06:00:00";
// $TongTien="40000";
// $TenDichVu="ves ngay";

$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

$dk="SELECT id_NhanVien, NgayDk, GioDK FROM lichhen where id_NhanVien='$id_NhanVien' AND NgayDK='$NgayDK' AnD GioDK='$GioDK' AND TrangThaiLichHen!='-1' ";
$result = $connect->query($dk);
if(mysqli_num_rows($result)==1){
    $id=0;
}else{
    // $c =$a+$b;

    $sql= "INSERT INTO lichhen (id_LichHen, id_DichVu,id_NhanVien,id_KhachHang, NgayDK, GioDK, TongTien, TrangThaiLichHen) VALUE (null,'$id_DichVu','$id_NhanVien', '$id_KhachHang','$NgayDK', '$GioDK', '$TongTien', '1') ";
    $result = $connect->query($sql);
    $id= mysqli_insert_id($connect);


    // $sql1= "INSERT INTO hoadon (id_HD,id_KhachHang, id_SanPham, TenSanPham, TenVe, id_LichHen, TongHoaDon, Ngay, TrangThaiHoaDon, created_at) 
    //     VALUE (null,'$id_KhachHang',null,null,'$TenVe','$id','$TongTien', null, '0', null)";

    $sql1= "INSERT INTO hoadon (id_HD,id_KhachHang, id_SanPham, id_LichHen, TenSanPham, TenVe, TongHoaDon, Ngay, TrangThaiHoaDon, created_at) 
                        VALUE (null,'$id_KhachHang',null,'$id',null,'$TenVe','$TongTien', null, '0',null)";
    $result1 = $connect->query($sql1);
   
    
}



    
    
?>
{
    "id":"<?= $id ?>"
}
