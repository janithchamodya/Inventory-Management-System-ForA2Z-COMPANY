<?php
include_once("../pages/connection.php");
//include_once("table.php");
$query = "SELECT * from catogory order by Cat_Name asc";
$result = $conn->query($query);
if (isset($_GET['name'])) {
  $id2 = $_GET['name'];
  $id3 = $_GET['cat'];
  $id4 = $_GET['std'];
  $id5 = $_GET['list'];
  $id6 = $_GET['qty'];
  $id7 = $_GET['description'];


}
if (isset($_POST['prod_name'])) {
  $name = $_POST['prod_name'];
  $cat = $_POST['cat'];
  $stdcost = $_POST['std_cost'];
  $lstprice = $_POST['lst_price'];
  $qty = $_POST['qty'];
  $dsc = $_POST['discription'];

  $query4 = "UPDATE product SET Prod_Name='$name', Discription='$dsc',Standard_Cost='$stdcost',List_Price='$lstprice',Cat_ID='$cat',Qty_Availble='$qty'  WHERE Prod_Name='$id2' ";
  $conn->query($query4);

  echo '<script>alert("Edit Succesfully..!")</script>';
  header("location:product.php");
}


?>

<link href="../css/style.css" rel="stylesheet">
<link href="../css/home.css" rel="stylesheet">
<!-- edit catogory popup------------------------------------------------------------>
<div class="add-cat" Id="add-cat">
  <div class="manage-cat1" id="manage-cat1">
    <div id="popup1" class="popup1">
      <div class="add-cat2">
        <form id="category_form" method="post" action="#">
          <div class="form-group" style="color: aliceblue;">
            <label>Product Name</label>
            <input type="text" class="form-control" name="prod_name" id="category_name" value="<?php echo $id2; ?>"
              required><br>
            <label>Product Category</label>

            <select name="cat" id="cat" class="form-control" style="margin-left:60px ;" required>

              <?php
              while ($row = mysqli_fetch_assoc($result)) {
                
                if ($id3 == $row['Cat_Name']) { ?>
              <option value="<?php echo $row['Cat_ID']; ?>" selected>
                <?php echo $row['Cat_Name']; ?>
              </option>
              <?php
                } 
                
                else { ?>
              <option value="<?php echo $row['Cat_ID']; ?>">
                <?php echo $row['Cat_Name']; ?>
              </option>
              <?php
                }
              }
              ?>

            </select><br>

            <label>Std. Cost (Rs)</label>
            <input type="text" class="form-control" name="std_cost" id="category_name" value="<?php echo $id4; ?>"
              required><br>

            <label>List Price (Rs)</label>
            <input type="text" class="form-control" name="lst_price" id="category_name" value="<?php echo $id5; ?>"
              required><br>

            <label>Quantity</label>
            <input type="text" class="form-control" name="qty" id="qty_old" value="<?php echo $id6; ?>"
              style="margin-left:17.5%;width:7%;text-align: center;" readonly>&nbsp;Add
              
                <input type="text" class="form-control" value="0"  id="qty_add" style="margin-left:0%;width:7%;text-align: center;">
                <a href="#" onclick="add()" class="add" style="background-color: Orange;text-decoration:none;padding: 8px;border-radius: 5px;color: white;font-family: Verdana, Geneva, Tahoma, sans-serif;">+</a><br>

            <label>Description</label>
            <textarea cols="2" rows="2" class="form-control" wrap="soft" name="discription" id="category_name"
              style="height:20%;margin-left:14.5%;"><?php echo $id7; ?></textarea><br>
            
            <button type="submit" class="btn btn-primary" style="margin-left:45%;margin-top:3%;">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function add(){
 var currentNum=parseInt(document.getElementById('qty_old').value);
 var newNum=parseInt(document.getElementById('qty_add').value);
 var sum=currentNum+newNum;
 document.getElementById('qty_old').value=sum;
};

  </script>