<?php
/*
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ims_tan";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (isset($_SESSION["userid"])) {
	session_destroy();
}
header("location:index.html");
*/
    session_start();
    session_destroy();
	header("location:index.html");
?>