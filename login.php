 <?php

// $json=file_get_contents("php://input");
// $obj=json_decode($json, TRUE);
// $a = $obj["email"];
// $b = $obj["matkhau"];
// // $a = "tuong123@gmail.com";
// // $b = "123";

// $connect= mysqli_connect('127.0.0.1','root','','quanlyphonggym');

// if (!$connect) {
//     exit('Kết nối không thành công!');
// }

//     // $c =$a+$b;

//     $sql= "SELECT * FROM khachhang WHERE Email='$a' AND MatKhau='$b' ";
//     $result = $connect->query($sql);

//     // if(mysqli_num_rows($result)==0){
//     //     $c=0;
//     // }
//     // else{
//     //     $c=1;
    
//     // }


// // if(mysqli_num_rows($result)==1){
// //   $c=1;
  
// // }
// // else{
// //   $c=0;
// // }


// $token = array();
// if(mysqli_num_rows($result)==1){
// //  $c=1;

  
// class TaiKhoan{
//    var $id_KhachHang;
//     var $TenKH;
//   //  var $Email;
//     var $SoDienThoai;
//     var $DiaChi;
//    // var $id_DichVu;
//     // , $_name, $_email,$_sodienthoai,$_diachi
//     function TaiKhoan($_id, $_name,$_sodienthoai,$_diachi){
       
//         $this->id_KhachHang= $_id;
//         $this->TenKH= $_name;
//    //     $this->Email = $_email;
//         $this->SoDienThoai=$_sodienthoai;
//         $this->DiaChi=$_diachi;  
//       //  $this->id_NhanVien= $_idNV;
//         // id_NhanVien, TenNV, Email, SoDienThoai, DiaChi
//     }
// }

// while($row = mysqli_fetch_array($result)) {

//     // array_push($arrDichVu, new DichVu($row["id_DichVu"]));
//    array_push($token, new TaiKhoan( $row["id_KhachHang"],$row["TenKH"], $row["SoDienThoai"], $row["DiaChi"]
//            ));
   
//    }
  
//    echo json_encode($token);

  
// }

// $connect->close();




// require("jwt.php");

// $token=array();
// $token["id"]=12356;
// $token["hoten"]="nguyen a";
// $token["email"]="tuoos123@gmail.com";

// $jsonwebtoken = JWT::encode($token, "dung_cho_ai_biet");
// echo JsonHelper::getJson("token",$jsonwebtoken);
// echo json_encode($token);




require("jwt.php");
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

    $sql= "SELECT * FROM khachhang WHERE Email='$a' AND MatKhau='$b' ";
    $result = $connect->query($sql);

    


if(mysqli_num_rows($result)==1){
  $u= mysqli_fetch_array($result);
  $token=array();
  $token["id_KhachHang"]=$u["id_KhachHang"];
  $token["TenKH"]=$u["TenKH"];
  $token["Email"]=$u["Email"];
  $token["SoDienThoai"]=$u["SoDienThoai"];
   $token["HinhAnh"]=$u["HinhAnh"];
   $token["DiaChi"]=$u["DiaChi"];
  $token["GioiTinh"]=$u["GioiTinh"];
  $token["ChieuCao"]=$u["ChieuCao"];
  $token["CanNang"]=$u["CanNang"];
  $token["NgaySinh"]=$u["NgaySinh"];
  
  

  $jsonwebtoken = JWT::encode($token, "dung_cho_ai_biet");
echo JsonHelper::getJson("token",$jsonwebtoken);




  
}else{
  echo "{'token':'ERROR'}";
}

$connect->close();


   
?>







 
