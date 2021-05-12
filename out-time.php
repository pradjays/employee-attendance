<?php 

session_start();

	include("connection.php");

	$user_id = $_SESSION['userid'];
	$date = date("Y-m-d");
	$query1 = "SELECT in_time FROM attendance_data WHERE user_id = '$user_id' AND date = '$date'"; 
	
	$result = mysqli_query($con, $query1);
	if($result){
		$attendance_data = mysqli_fetch_assoc($result);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$timestamp = date("Y-m-d H:i:s");

		$query = "UPDATE attendance_data SET out_time = '$timestamp' WHERE user_id = '$user_id' AND date = '$date'"; 
	
		mysqli_query($con, $query);

		mysqli_close($con);

		header("Location: index.php");
		die;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Mark Out Time</title>
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

	<h2 style="colour: #1E90FF;"><center>Welcome <?php echo $_SESSION['name']; ?>!</center></h2>

	<div id="box">
		<h3><center>Current Time is <?php echo date("H:i:s"); ?></center></h3>
		<br>
		<br>
		<h5><center>Your In Time Was <?php echo $attendance_data['in_time'] ?></center></h5>
		
		<form method="post">

			<center><input id="button" type="submit" value="Mark Out Time"></center><br><br>
		</form>
	</div>
	<br>
	<br>
	<center><a href="index.php" id="button">Back</a></center>
</body>
</html>
