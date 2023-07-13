
<table class="table_prod" id="table" width="800px" border="1px">
  <thead>
    <tr height="50px" style="background-color:black;color:white;">
      <th>Product</th>
      <th>Product Category</th>
      <th>Std. Cost</th>
      <th>Listed Price</th>
      <th>Qty</th>
      <th>Discription</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="get_category" align="center">
    <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $query3 = "DELETE FROM product where Prod_Name='$id';";
          $conn->query($query3);
          header('location:product.php');
        }
        $query2 = "SELECT * from product order by Prod_Name asc";
        $result2 = $conn->query($query2);

        while ($row1 = mysqli_fetch_assoc($result2)) {
          $row2 = $row1['Prod_Name'];
          $row3 = $row1['Cat_ID'];
          $row4 = $row1['Standard_Cost'];
          $row5 = $row1['List_Price'];
          $row6 = $row1['Qty_Availble'];
          $row7 = $row1['Discription'];
      $querycat = "SELECT Cat_Name from catogory Where Cat_ID='$row3';";
      $resultcat=$conn->query($querycat);
      $row8 = mysqli_fetch_assoc($resultcat);
      $row9 = $row8['Cat_Name'];
        ?>
    <tr height="50px">
      <td>
        <?php
          echo $row2; ?>
      </td>
      <td>
        <?php
          echo $row9; ?>
      </td>
      <td>
        <?php
          echo $row4; ?>
      </td>
      <td>
        <?php
          echo $row5; ?>
      </td>
      <td>
        <?php
          echo $row6; ?>
      </td>
      <td>
        <?php
          echo $row7; ?>
      </td>
      <td>
        <?php echo "
            <a href='product.php?id=$row2' onclick='return confirm()' class='del_cat'>Delete</a> 
            <a href='edit_prod.php?name=$row2&cat=$row9&std=$row4&list=$row5&qty=$row6&description=$row7' class='edit_cat' >Edit</a>";
            ?>
      </td>
    </tr>
    <?php
        } ?>
  </tbody>
</table>