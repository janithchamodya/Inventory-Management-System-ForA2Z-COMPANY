<!DOCTYPE html>

<head>
  <title>User Registration</title>
  <link rel="stylesheet" type="text/css" href="../css/style_reg.css">


<body>

  <div class="box">
    <img src="../Image/m.png" class="user">

    <h1>User Register Here</h1>

    <form name="myform2" action="register_user_php.php" method="POST">


      <?php
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "ims_tan";
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        ?>
      <?php
$query = "SELECT * from customer order by Cus_ID desc limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['Cus_ID'];
if ($lastid == " ") {
  $cus = "Cus_1";
} else {
  $cus1 = substr($lastid, 4);
  $cus2 = intval($cus1);
  $cus = "Cus_" . ($cus2 + 1);
}


?>


      <p><input type="hidden" name="Cus_ID" value="<?php echo $cus; ?>"></p>
      <p>Username</p>
      <input type="text" name="uname" placeholder="Enter Username" required="">

      <p>Email</p>
      <input type="Email" name="email" placeholder="Enter email id" required="">

      <p>Phone Number</p>
      <input type="text" name="pn" placeholder="Optional" id="pn" >

      <p>Address</p>
      <input type="text" name="address" placeholder="Enter shiping address" required="">

      <p>Password</p>
      <input type="password" name="pswd1" placeholder="Enter Password" required="">

      <p>Retype Password</p>
      <input type="password" name="pswd2" placeholder="Re-Enter Password" required="">
      <p><input type="hidden" name="position" value="User"></p>
      <p><input type="hidden" name="pic" value="../Image/m.png"></p>

      <input type="submit" name="" value="Register" onclick="phone()">

      <br><br>
      <a href="index.html">Login</a>


    </form>

    <h4 id="inpswd" class="inpswd">Password does not match </h4>
    <h6 id="regerror" class="regerror">Someone already registered with this email !</h6>

  </div>
<script>
  function phone(){
  let phoneFormat = /^\+?([0-9]{12})$/;
  let phoneInput = document.getElementById("pn").value;
  if (phoneInput.match(phoneFormat)) {
  alert("Valid phone number");
} else {
  alert("Invalid phone number");
}
  }
  </script>



</body>
</head>

</html>