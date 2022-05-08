<?php

$token= $_GET["token"];
require("../jwt.php");

$json = JWT::decode($token, "nhan vien dang nhap",true);
echo json_encode($json);




?>