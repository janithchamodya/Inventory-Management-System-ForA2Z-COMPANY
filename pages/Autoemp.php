<?php
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "ims_tan";
      // Create connection
      $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
      ?>
      <?php
      $query = "SELECT * from employee order by EMP_ID desc limit 1";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      $lastid = $row['EMP_ID'];
      if ($lastid == " ") {
        $cus = "EMP_1";
      } else {
        $cus1 = substr($lastid, 4);
        $cus2 = intval($cus1);
        $cus = "EMP_" . ($cus2 + 1);
      } ?>