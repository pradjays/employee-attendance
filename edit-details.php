<?php 
session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$userid = $_SESSION['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$contact = $_POST['contact'];
		$name = $_POST['name'];
		$timestamp = date("Y-m-d H:i:s");

		if(!empty($username) && !empty($password) && !is_numeric($username) && !empty($name) && !empty($contact))
		{
			$query = "DELETE FROM user_data WHERE user_id = '$userid';";
			mysqli_query($con, $query);

			$query1 = "INSERT INTO user_data (user_id, Name, username, password, contact_number, registration_date) VALUES ('$userid', '$name', '$username', '$password', '$contact', '$timestamp')";

			mysqli_query($con, $query1);

			mysqli_close($con);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;"><center>Edit Your Details</center></div>
			<label class="text">Name</label>
			<input id="text" type="text" name="name" value="<?php echo $_SESSION['name'];?>"><br><br>
			<label class="text">Username</label>
			<input id="text" type="text" name="username" value="<?php echo $_SESSION['username'];?>"><br><br>
			<label class="text">Password</label>
			<input id="text" type="text" name="password" value="<?php echo $_SESSION['password'];?>"><br><br>
			<label class="text">Contact Number</label>
			<input id="text" type="text" name="contact" value="<?php echo $_SESSION['contact_number'];?>"><br><br>

			<center><input id="button" type="submit" value="Save"></center><br><br>
		</form>
	</div>
	<br>
	<br>
	<center><a href="index.php" id="button">Back</a></center>
</body>
</html>
