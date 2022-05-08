<?php


$json=file_get_contents("php://input");
$obj=json_decode($json, TRUE);

$id_LichHen = $obj["id_LichHen"];
$TrangThaiLichHen="0";


$connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

if (!$connect) {
    exit('Kết nối không thành công!');
}

  
    $sql="UPDATE lichhen
            SET TrangThaiLichHen='$TrangThaiLichHen'
            WHERE id_LichHen='$id_LichHen'";
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

