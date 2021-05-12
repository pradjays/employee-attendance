<?php 
session_start();

	include("connection.php");

	$userid = $_SESSION['userid'];
	$query = "SELECT date, in_time, out_time FROM attendance_data WHERE user_id = '$userid';";

	$result = mysqli_query($con, $query);

	if($result){
		if(mysqli_num_rows($result) < 1){
			$attendance_available = "false";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>View Attendance</title>
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

	#error-box{
		margin-top: 50px;
		background-color: #FF6347;
		margin-left: auto;
		margin-right: auto;
		width: 200px;
		text-align: center;
		padding: 20px;
	}

	#attendance-box{
		margin-top: 50px;
		background-color: #add8e6;
		margin-left: auto;
		margin-right: auto;
		width: 500px;
		padding: 20px;
		align-content: center;
	}

	table, th, td, tr {
  	border: 2px solid #00008B;
	margin: 5px;
	padding: 5px;
	}

	</style>


	<h1 style="colour: #1E90FF;"><center>Welcome <?php echo $_SESSION['name']; ?>!</center></h1>

	<div id="attendance-box">
		<div style="font-size: 20px;margin: 10px;color: white;"><center>This is your Attendance</center></div>
		<?php
		if($attendance_available == "false"){
		?>
		<div id="error-box">No Attendance to Display</div>
		<?php
		} else{
		?>
		<center>		
		<table>
			<tr>
			<th>Date</th>
			<th>In Time</th>
			<th>Out Time</th>
			</tr>
			<?php
			while($row = mysqli_fetch_assoc($result)){
			?>
			<tr>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['in_time']; ?></td>
			<td><?php echo $row['out_time']; ?></td>
			</tr>
			<?php
			}
			?>
		</table>
		</center>
		<?php
		}
		?>
	</div>
	<br>
	<br>
	<center><a href="index.php" id="button">Back</a></center>
</body>
</html>
