<?php 
session_start();

	include("connection.php");
	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	$password = $_POST['password'];
	$confirmPass = $_POST['confirmPassword'];

	if(strcmp($password, $confirmPass) == 0){

		$username = $_POST['username'];
		$contact = $_POST['contact'];
		$name = $_POST['name'];
		$timestamp = date("Y-m-d H:i:s");

		if(!empty($username) && !empty($password) && !is_numeric($username) && !empty($name) && !empty($contact))
		{
			$query = "INSERT INTO user_data (Name, username, password, contact_number, registration_date) VALUES ('$name', '$username', '$password', '$contact', '$timestamp')";

			mysqli_query($con, $query);

			mysqli_close($con);

			header("Location: login.php");
			die;
		}else
		{
			echo "<h3 style=\"color: red;\"><center>Please Enter Valid Information.</center></h3>";
		}
	} else {
		echo "<h3 style=\"color: red;\"><center>Passwords Do Not Match.</center></h3>";
	}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: #228B22;
		border: none;
		border-radius: 10px;
	}

	#box{
		margin-top: 50px;
		background-color: #add8e6;
		margin-left: auto;
		margin-right: auto;
		width: 350px;
		padding: 20px;
	}

	</style>

	<div id="box">		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;"><center>Sign Up to the Attendance System</center></div>
			<label class="text">Name</label>
			<input id="text" type="text" name="name" placeholder="Enter Your Name"><br><br>
			<label class="text">Username</label>
			<input id="text" type="text" name="username" placeholder="Enter Your Username"><br><br>
			<label class="text">Password</label>
			<input id="text" type="password" name="password" placeholder="Enter Your Password"><br><br>
			<label class="text">Confirm Password</label>
			<input id="text" type="password" name="confirmPassword" placeholder="Confirm Your Password"><br><br>
			<label class="text">Contact Number</label>
			<input id="text" type="text" name="contact" placeholder="Enter Your Contact Number"><br><br>

			<center><input id="button" type="submit" value="Sign Up"></center><br><br>
		</form>

		<div>Already Have An Account? <a href="login.php">Login</a>
	</div>
</body>
</html>
