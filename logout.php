<?php

session_start();

if(isset($_SESSION['userid']))
{
	unset($_SESSION['userid']);
	unset($_SESSION['name']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['contact_number']);

}

header("Location: login.php");
die;

?>
