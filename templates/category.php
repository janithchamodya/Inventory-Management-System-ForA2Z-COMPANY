<?php
include_once("../pages/connection.php");
$query = "SELECT * from catogory order by Cat_ID desc limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['Cat_ID'];
if ($lastid == " ") {
  $cus = "Cat_1";
} else {
  $cus1 = substr($lastid, 4);
  $cus2 = intval($cus1);
  $cus = "Cat_" . ($cus2 + 1);
}


/*if(isset($_POST['edited'])){
$newcatname = $_POST['edited'];
}*/
?>

<style>

</style>

<link href="../css/style.css" rel="stylesheet">
<link href="../css/home.css" rel="stylesheet">

<div class="add-manage">
  <ul style=" display: flex;">
    <a href="#" onclick="showflex()">
      <li>Add</li>
    </a>
    <a href="#" onclick="showflexa()">
      <li>Manage</li>
    </a>
  </ul>
</div>
<div class="add-cat" Id="add-cat">
  <div id="success" class="success">
    <h3>Category Added Successfully..!</h3>
  </div>
  <div id="successa" class="successa">
    <h3>Edited Successfully..!</h3>
  </div>
  <form id="category_form" action="add_cat.php" method="POST" style="display: none;">
    <div class="form-group">
      <label>Category Name</label>
      <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp"
        placeholder="Enter Category Name">

      <input type="hidden" name="catid" value="<?php echo $cus; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>

  <div class="manage-cat" id="manage-cat" style="display: none;">

    <?php include('table.php'); ?>

  </div>
</div>



<script>
  function showflex() {
    document.getElementById('category_form').style.display = "inline";
    document.getElementById('manage-cat').style.display = "none";
    document.getElementById('success').style.display = "none";
  };
  function showflexa() {
    document.getElementById('category_form').style.display = "none";
    document.getElementById('success').style.display = "none";
    document.getElementById('manage-cat').style.display = "inline";
  };

  /*function openpop() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('table').style.display = "none";
    document.getElementById('form-control').focus;
  };*/


</script>