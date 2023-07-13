<?php

$fname = $_POST['fname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$pword1 = $_POST['pword1'];
$pword2 = $_POST['pword2'];
$gender = $_POST['gender'];

if (!empty($uname) || !empty($fname) || !empty($email) || !empty($pword1) || !empty($pword2) || !empty($gender) || !empty($pnumber)) {

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "a2z_ims";


  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } else {
    $SELECT = "SELECT email From registration Where email = ? Limit 1";
    $INSERT = "INSERT Into registration (fname,uname,email,pnumber,pword1,pword2,gender)values(?,?,?,?,?,?,?)";


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
      $stmt->bind_param("ssss", $fname, $uname, $email, $pnumber, $pword1, $pword2, $gender);
      $stmt->execute();
      echo "New record inserted sucessfully";
    } else {
      echo "Someone already register using this email";
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All field are required";
  die();
}

?>