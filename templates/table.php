<table class="table_cat" id="table" width="800px" border="1px">
  <thead>
    <tr height="50px" style="background-color:black;color:white;">
      <th>Category</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="get_category" align="center">
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query3 = "DELETE FROM catogory where Cat_Name='$id';";
    
      $conn->query($query3);
      header('location:category.php');
    }
    $query2 = "SELECT Cat_Name from catogory order by Cat_Name asc";
    $result2 = $conn->query($query2);

    while ($row1 = mysqli_fetch_assoc($result2)) {
      $row2 = $row1['Cat_Name'];


      ?>
      <tr height="50px">
        <td>
          <?php
          echo $row2; ?>
        </td>
        <td>
          <?php echo "
            <a onclick='confirmation()' href='category.php?id=$row2'  class='del_cat'>Delete</a> 
            <a href='edit_cat.php?name=$row2' class='edit_cat' >Edit</a>";
          ?>
        </td>
      </tr>
      <?php
    } ?>
  </tbody>
</table>
<script>
  function confirmation() {
    return confirm('Are you sure you want to delete?');
  };
</script>
