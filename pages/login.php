<?php

$host = "localhost";
$user = "root";
$dbpassword = "";
$db = "ims_tan";



$con = mysqli_connect($host, $user, $dbpassword, $db);




if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);


    $SELECT = "SELECT * From customer Where UserName = '$uname' AND pswd1='$password' Limit 1";
    $result = mysqli_query($con, $SELECT);

    

    if ($result && mysqli_num_rows($result) == 1) {
        $uname = $_POST['username'];
        $SELECT2 = "SELECT * From customer Where UserName = '$uname' AND (position = 'Admin' OR position = 'Super Admin') Limit 1";
        $result2 = mysqli_query($con, $SELECT2);


        if (mysqli_num_rows($result2) == 1) {
            //include("home.php");
            session_start();
            $_SESSION['UserName']=$uname;
            header("Location: home.php");
            
            //$_SESSION['position']=$position;
           // exit();
        } else {
            session_start();
            $_SESSION['UserName']=$uname;
            header("Location: user/Index.php");
            exit();
        }
    } /*else {
        include("retry.html");
        exit();
    }*/

    $SELECTemp = "SELECT * From employee Where UserName = '$uname' AND pswd1='$password' Limit 1";
    $resultemp = mysqli_query($con, $SELECTemp);

    if($resultemp && mysqli_num_rows($resultemp) == 1)
    {
        $SELECTemp2 = "SELECT * From employee Where UserName = '$uname' AND (position = 'Admin' OR position = 'Super Admin') Limit 1";
        $resultemp2 = mysqli_query($con, $SELECTemp2);


        if (mysqli_num_rows($resultemp2) == 1) {
            //include("home.php");
            session_start();
            $_SESSION['UserName']=$uname;
            header("Location: home.php");
            
            //$_SESSION['position']=$position;
           // exit();
        } else {
            header("Location: user/Index.php");
            exit();
        }
    }
    else {
        include("retry.html");
        exit();
    }
}




?>