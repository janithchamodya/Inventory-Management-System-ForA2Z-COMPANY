<?php


$uname1 = $_POST['uname1'];
$email = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2'];
$isadmin = $_POST['isadmin'];
$pic = $_POST['pic'];
$encrpt1 = md5($upswd1);
$encrpt2 = md5($upswd2);



if (!empty($uname1) || !empty($email) || !empty($upswd1) || !empty($upswd2)) {

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
    $SELECT = "SELECT email From register Where email = ? Limit 1";
    $INSERT = "INSERT Into register (uname1 , email ,upswd1, upswd2, isadmin, pic)values(?,?,?,?,?,?)";

    //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    //checking username
    if ($rnum == 0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $uname1, $email, $upswd1, $upswd2, $isadmin, $pic);
      if ($upswd1 == $upswd2) {
        $stmt->execute();
        require 'index.html';
?>
<script>document.getElementById("success").style.display = "block";</script>
<?php
        //echo '<script>alert("You are registered Succesfully")</script>';
      } else {
        require("register_form.php");
        // echo '<script>alert("Password does not match")</script>';
?>
<script>document.getElementById("inpswd").style.display = "block";</script>
<?php
      }
    } else {
      require("register_form.php");
      //echo '<script>alert("Someone already register using this email")</script>';
?>
<script>document.getElementById("regerror").style.display = "block";</script>
<?php
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All field are required";
  die();
}
?>