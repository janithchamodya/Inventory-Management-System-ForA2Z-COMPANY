<?php

$id = $_POST['Cus_ID'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$address = $_POST['address'];
$pn = $_POST['pn'];
$pswd1 = $_POST['pswd1'];
//$pass_hash = password_hash($pswd1,PASSWORD_BCRYPT);
$pswd2 = $_POST['pswd2'];
$position = $_POST['position'];
$pic = $_POST['pic'];
$encrpt1 = md5($pswd1);
$encrpt2 = md5($pswd2);



if (!empty($id) || !empty($uname) || !empty($email) || !empty($pswd1) || !empty($pswd2) || !empty($address)) {

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "ims_tan";



  // Create connection
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } else {
    $SELECT = "SELECT Email From customer Where Email = ? Limit 1";
    $INSERT = "INSERT Into customer values('$id','$uname','$email','$pn','$address','$encrpt1','$position','$pic')";



    if ($pswd1 == $pswd2) {
      $conn->query($INSERT);
      require 'index.html';
      //header('location:index.html')
      
?>
<script>document.getElementById("success").style.display = "block";</script>
<?php
      //echo '<script>alert("You are registered Succesfully")</script>';
    } else {
      require("register_user.php");
      // echo '<script>alert("Password does not match")</script>';
?>
<script>document.getElementById("inpswd").style.display = "block";</script>
<?php
    }
  }
}
//Prepare statement
/* $stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;
//checking username
if ($rnum==0) {
$stmt->close();
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("ssssssss", $uname,$email,$pn,$address,$pswd1,$pswd2,$position,$pic);
if($pswd1==$pswd2){
$stmt->execute();
require 'index.html';
?><script>document.getElementById("success").style.display="block";</script><?php
//echo '<script>alert("You are registered Succesfully")</script>';
} 
else {require("register_user.php");
// echo '<script>alert("Password does not match")</script>';
?><script>document.getElementById("inpswd").style.display="block";</script><?php
}
}else {require("register_user.php");
//echo '<script>alert("Someone already register using this email")</script>';
?><script>document.getElementById("regerror").style.display="block";</script><?php
}
$stmt->close();
$conn->close();
}
}*/else {
  echo "All field are required";
  die();
}
?>