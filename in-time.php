<?php 
session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_id = $_SESSION['userid'];
		$date = date("Y-m-d");
		$timestamp = date("Y-m-d H:i:s");

		$query = "INSERT INTO attendance_data (user_id, date, in_time, out_time) VALUES ('$user_id', '$date', '$timestamp', null)";

		mysqli_query($con, $query);

		mysqli_close($con);

		header("Location: index.php");
		die;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Mark In Time</title>
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


	<h1 style="colour: #1E90FF;"><center>Welcome <?php echo $_SESSION['name']; ?>!</center></h1>

	<div id="box">
		<div style="font-size: 20px;margin: 10px;color: white;"><center>Current Time is <?php echo date("H:i:s"); ?></center></div>
		
		<form method="post">
			<center><input id="button" type="submit" value="Mark In Time"></center><br><br>
		</form>
	</div>
	<br>
	<br>
	<center><a href="index.php" id="button">Back</a></center>
</body>
</html>
