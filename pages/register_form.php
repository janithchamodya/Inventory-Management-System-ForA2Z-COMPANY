<!DOCTYPE html>

<head>
  <title>Employee registration</title>
  <link rel="stylesheet" type="text/css" href="../css/style_rege.css">


<body>
  <div class="manage_btn">
    <br><br><a href="#" style="background-color:red;">Register</a><a href="#" style="margin-left: -5px;">Manage</a>
  </div>
  <div class="box">
    <img src="../Image/m.png" class="user">

    <h1>Employee Register Here</h1>
    <?php include("Autoemp.php"); ?>

    <form name="myform2" action="register_emp.php" method="POST" autocomplete="off">


      <input type="hidden" name="empid" value="<?php echo $cus; ?>" required="">
      <div class="row1">
        <p>Username</p>
        <input type="text" name="UserName" placeholder="Enter Username" required="" tabindex="1">

        <p>Phone Number</p>
        <input type="text" name="pn" placeholder="(optional)" tabindex="3">

        <p>Password</p>
        <input type="password" name="pswd1" placeholder="Enter Password" required="" autocomplete="off" tabindex="5">


        <p>Address</p>
        <input type="text" name="address" placeholder="Enter your address here" required="" tabindex="7">
      </div>
      <div class="row2">
        <p>Email</p>
        <input type="Email" name="email" placeholder="Enter email id" required="" tabindex="2">

        <p>Job Title</p>
        <input type="text" name="jtitle" placeholder="Enter job title" required="" tabindex="4">


        <p>Retype Password</p>
        <input type="password" name="pswd2" placeholder="Re-Enter Password" required="" tabindex="6">
        <p><input type="hidden" name="position" value="Admin"></p>
        <p><input type="hidden" name="pic" value="../Image/m.png"></p>


        <input type="submit" name="" value="Register" onclick="message()">
      </div>
      <h4 id="inpswd" class="inpswd">Password does not match </h4>
      <h6 id="regerror" class="regerror">Someone already registered with this email !</h6>
      <h6 id="success" class="success" style="color: Green;">You are Registered Succesfully..</h6>
    </form>
  </div>
</body>
</head>

</html>