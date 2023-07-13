<?php

$id = $_POST['empid'];
$uname = $_POST['UserName'];
$email = $_POST['email'];
$address = $_POST['address'];
$jtitle = $_POST['jtitle'];
$pn = $_POST['pn'];
$pswd1 = $_POST['pswd1'];
$pswd2 = $_POST['pswd2'];
$position = $_POST['position'];
$pic = $_POST['pic'];
$encrpt1 = md5($pswd1);
$encrpt2 = md5($pswd2);


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
  $SELECT = "SELECT Email From employee Where Email = ? Limit 1";
  $INSERT = "INSERT Into employee values('$id','$uname','$jtitle','$address','$pn','$email','$encrpt1','$position','$pic')";

  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;

  if ($rnum == 0) {
   
    if ($pswd1 == $pswd2) {
  
      $conn->query($INSERT);
      require("register_form.php")
 
    ?>
    <script>alert("You are registered Succesfully")</script>
    <?php
    } 
    else {
      require("register_form.php");
      ?>
      <script>alert("Your password is does not match")</script>
      <?php
    }
  }
  else{
    require("register_form.php");
    ?>
    <script>alert("Someone already register using this email")</script>
    <?php
  }
}

?>