<?php
    mysqli_connect("localhost","root","");
    mysql_select_db("quanlyphonggym");
    mysql_query("SET NAMES 'utf8'");

    $TenDanhMuc="vidu";
    $HinhAnh="adv";
    
    $qr="INSERT INTO danhmucsanpham VALUES(
        null,'TenDanhMuc','HinhAnh'
    )";

    mysql_query($qr);



?>