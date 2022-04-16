<?php

$token= $_GET["token"];
require("jwt.php");

$json = JWT::decode($token, "dung_cho_ai_biet",true);
echo json_encode($json);




?>