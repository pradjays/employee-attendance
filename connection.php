<?php

$dbHost = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbName = "employee_attendance";

if(!$con = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName))
{

	die("Failed to Connect to Database!");
}

?>
