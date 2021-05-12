<?php 
session_start();

	include("connection.php");

	$userid = $_SESSION['userid'];
	$date = date("Y-m-d");

	$query = "SELECT in_time, out_time FROM attendance_data WHERE user_id = '$userid' AND date = '$date'";

	$result = mysqli_query($con, $query);

	if($result){
		$in_time = "false";
		$attendance_data = mysqli_fetch_assoc($result);
		if($attendance_data['in_time'] != null && $attendance_data['out_time'] == null){
			$in_time = "true";
		}
	}

	mysqli_close($con);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Attendance</title>
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
		width: fit-content;
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
		border-radius: 10px;
	}

	</style>

	<?php 
	if(isset($_SESSION['userid'])){
	?>
	<h1><center>Mark Your Attendance Here<center></h1>

	<br>
	<center><h3>Hello, <?php echo $_SESSION['name']; ?></h3></center>

	<?php
	if($in_time == "false"){
	?>
	<div id="box">
		<center><a id="button" href="in-time.php">Mark In Time</a></center><br><br>
	</div>
	<?php
	}
	?>

	<?php
	if($in_time != "false"){
	?>
	<div id="box">
		<center><a id="button" href="out-time.php">Mark Out Time</a></center><br><br>
	</div>
	<?php
	}
	?>

	<div id="box">
		<center><a id="button" href="view.php">View Attendance</a></center><br><br>
	</div>

	<div id="box">
		<center><a id="button" href="edit-details.php">Edit Personal Details</a></center><br><br>
	</div>

	<br>
	<br>

	<center><a id="button" href="logout.php">Logout</a></center>
	<?php
	} else {
	?>
	<div id="box">
	<center><h3>You Are Not Logged In</h3>
	<a id="button" href="login.php">Proceed to Login</a>
	</center>
	</div>
	<?php
	}	
	?>
</body>
</html>
