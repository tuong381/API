<php  
    require("./jwt.php");
    $token= array();
    $token["id"]=8888;
    $token["hoten"]="Nguyen_Van_Teo";
    $this["email"] = "teo123@gmail.com";

    $jsonwebtoken = JWT::encode($token,"bi_mat");
    echo JsonHelper::getJson("token",$jsonwebtoken);

?>