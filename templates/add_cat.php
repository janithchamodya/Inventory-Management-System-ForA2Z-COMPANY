<?php
$catID = $_POST['catid'];
$catname = $_POST['category_name'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ims_tan";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (!empty($catname)) {

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } 
  else {
    $INSERT = "INSERT Into catogory values('$catID','$catname')";

      $conn->query($INSERT);
    include("category.php");
    ?>
<script>document.getElementById("success").style.display = "inline";</script>
<?php
    //echo '<script>alert("Category Added Succesfully")</script>';
    } 
  }

else 
{
  echo "All field are required";
  die();
}
?>