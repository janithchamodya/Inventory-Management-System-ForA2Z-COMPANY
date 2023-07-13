<?php
include_once("../pages/connection.php");
$query = "SELECT * from catogory order by Cat_Name asc";
$result = $conn->query($query);

$query_1 = "SELECT * from product order by Prod_ID desc limit 1";
$result_1 = mysqli_query($conn, $query_1);
$row_2 = mysqli_fetch_array($result_1);
$lastid = $row_2['Prod_ID'];
if ($lastid == " ") {
  $prod = "Prod_1";
} else {
  $prod1 = substr($lastid, 5);
  $prod2 = intval($prod1);
  $prod = "Prod_" . ($prod2 + 1);
}
?>

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
<div class="add-cat">
  <form id="category_form" method="post" action="add_prod.php" style="display: none;" enctype="multipart/form-data">
    <div class="form-group">
      <label>Product Name</label>
      <input type="text" class="form-control" name="prod_name" id="category_name" placeholder="Enter Product Name"
        required><br>
      <label>Select Product Category</label>

      <select name="cat" id="cat" class="form-control" required>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <option value="<?php echo $row['Cat_ID']; ?>">
            <?php echo $row['Cat_Name']; ?>
          </option>
          <?php

        }
        ?>

      </select><br>

      <label>Std. Cost (Rs)</label>
      <input type="text" class="form-control" name="std_cost" id="category_name" placeholder="Enter Standard cost"
        required><br>

      <label>List Price (Rs)</label>
      <input type="text" class="form-control" name="lst_price" id="category_name"
        placeholder="Enter Product Listed price" required><br>

      <label>Quantity</label>
      <input type="text" class="form-control" name="qty" id="category_name" style="margin-left:17.5%;"><br>

      <label>Description</label>
      <textarea cols="2" rows="2" class="form-control" wrap="soft" name="discription" id="category_name"
        placeholder="Product Details" style="height:20%;margin-left:14.5%;"></textarea><br>

      <label>Image</label>
      <input type="file" name="imgs" value="">

      <input type="hidden" name="Prod_ID" value="<?php echo $prod; ?>">
      
      <button type="submit" name="submit" class="btnsave">Save</button>
    </div>
  </form>

  <div class="manage-cat" id="manage-cat" style="display: none;">
    <?php require('table_product.php'); ?>
  </div>
</div>

<script>
  function showflex() {
    document.getElementById('category_form').style.display = "inline";
    document.getElementById('manage-cat').style.display = "none";
  };
  function showflexa() {
    document.getElementById('category_form').style.display = "none";
    document.getElementById('manage-cat').style.display = "inline";
  };
</script>