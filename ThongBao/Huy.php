<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_ThongBao = $obj["id_ThongBao"];


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}
 
    $sql="UPDATE thongbao a, lichhen b
            SET a.TrangThai='-4', b.TrangThaiLichHen='-1'
            WHERE a.id_ThongBao='$id_ThongBao' And a.id_LichHen=b.id_LichHen";

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

