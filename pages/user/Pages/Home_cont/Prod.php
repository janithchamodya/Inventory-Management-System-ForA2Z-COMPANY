<?php
include_once("../../../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quty = $_GET['qty'];
    session_start();
    $loginame = $_SESSION['UserName'];
    $quanty = $_POST['quant'];
    $query3 = "INSERT INTO product_temp_online values ('$id','$loginame','$quanty');";
    if ($loginame != "Admin") {
        if ($quanty <= $quty) {
            $conn->query($query3);
            echo "<script>alert('Added Successfully!')</script>";
        } else {
            echo "<script>alert('Limited Stock & Please Enter Less amount from Available Stock');</script>";
        }
    }
    //header('location:category.php');
} /*
 $query2 = "SELECT Cat_Name from catogory order by Cat_Name asc";
 $result2 = $conn->query($query2);
 while ($row1 = mysqli_fetch_assoc($result2)) {
 $row2 = $row1['Cat_Name'];
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible " content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="../../CSS/External.css">
    <style>
        a,
        h1,
        p.con,
        pre {
            color: white;
            font-family: Arial;
            text-decoration: none;
        }
    </style>

</head>

<body background="../../Images/bg_prod.jpg">
    <div class="container mt-5">
        <div class="row">
            <?php
            $query = "SELECT * FROM product order by Cat_ID asc";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $proid = $rows['Prod_ID'];
                    $name = $rows['Prod_Name'];
                    $qty = $rows['Qty_Availble'];
                    $price = $rows['List_Price'];
                    $image = $rows['file_name'];
                    $des = $rows['Discription'];

                    ?>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card border-0" style="background-color:#000000;">


                            <!-- //class="card-img"
    //echo '<img src="data:image;base64,'.base64_encode($image).'" style=""height:100px">';
-->
                            <center><img src="../../../../templates/uploads/<?php echo $rows['file_name']; ?>" width="280"
                                    style="margin-top:20px;"></center>
                            <br>
                            <div class="card-body">
                                <h5 class="card-title text-secondary">
                                    <?php echo $name; ?>
                                </h5>
                                <h6 class="card-title"><b>Available</b> :
                                    <?php if ($qty > 0) {
                                        echo "<font color='red'>$qty</font>";
                                    } else
                                        echo "<font color='red'> Out of Stoke</font>"; ?>
                                </h6>
                                <h4 class="card-title text-success"> Rs.
                                    <?php echo $price; ?>
                                </h4>
                                <h6 class="card-title"><b>Description</b> :
                                    <?php echo $des; ?>
                                </h6>
                                <!--<div class="buy d-flex justify-content-between align-items-center">
                <a href="index.php?id=<?php /*echo $row['id']; */?>" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i>ADD TO CART</a>
            </div>-->
                                <h6 class="card-title"><b>Quantity</b> : </h6>
                                <form method="POST" action="#">
                                    <input type="number" placeholder="1" value="1" name="quant">

                                    <br><br>

                                    <div style="margin-left:30%;">
                                        <?php echo "<button type='submit' style='background-color:Red;' formaction='Prod.php?id=$proid&qty=$qty'>Add to cart</button>"; ?>
                                    </div>
                                </form>
                            </div>
                        </div><br><br>
                    </div>

                <?php }
            } ?>
        </div>


</body>

</html>