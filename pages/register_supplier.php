<?php
include_once('connection.php');

$query = "SELECT * from supplier order by Sup_id desc limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['Sup_id'];
if ($lastid == " ") {
  $sup = "Sup_1";
} else {
  $sup1 = substr($lastid, 4);
  $sup2 = intval($sup1);
  $sup = "Sup_" . ($sup2 + 1);
}

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $company = $_POST['company'];
  $pn = $_POST['pn'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $Sup_id = $_POST['Sup_id'];
  if (!empty($name)) {
    $query2 = "INSERT INTO supplier values ('$Sup_id','$name','$company','$pn','$email','$city') ";
    $conn->query($query2);
    /*echo $name;
    echo $company;
    echo $pn;
    echo $email;
    echo $city;
    echo $Sup_id;*/
  }
}
?>

<!DOCTYPE html>

<head>
  <title>Supplier Registration</title>
  <link rel="stylesheet" type="text/css" href="../css/style_reg.css">


<body>
  <div class="manage_btn">
    <br><br>
    <a href="#" onclick="showreg()" style="background-color:red;">Register</a>
    <a href="#" onclick="showman()" style="margin-left: -5px;">Manage</a>
  </div>
  <div class="box" id="supreg" style="margin-top:-80px;display:none;" >
    <img src="../Image/m.png" class="user">

    <h1>Supplier Register Here</h1>

    <form name="myform2" action="#" method="POST">
      <p>Supplier Name</p>
      <input type="text" name="name" placeholder="Enter Name" required="">

      <p>Company</p>
      <input type="text" name="company" placeholder="Enter company" value="">

      <p>Phone Number</p>
      <input type="text" name="pn" placeholder="Optional" value="">

      <p>Email</p>
      <input type="text" name="email" placeholder="Enter Email address" value="">

      <p>City</p>
      <input type="text" name="city" placeholder="Enter city" value="">
      <p><input type="hidden" name="Sup_id" value="<?php echo $sup; ?>"></p>

      <input type="submit" name="" value="Register">


    </form>

  </div>
  <div class="manage-cat" id="manage-cat" style="display: none;width:95%;">
      <?php include("../templates/table_sup.php");?>
  </div>




</body>
</head>

</html>
<script>
function showreg()
{
document.getElementById('supreg').style.display="Inline";
document.getElementById('manage-cat').style.display="none";
};

function showman(){
  document.getElementById('supreg').style.display="none";
document.getElementById('manage-cat').style.display="Inline";
};
  </script>