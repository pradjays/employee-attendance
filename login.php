<?php 

session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{
			require_once('connection.php');
			$query = "select user_id, name, username, password, contact_number from user_data where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				$user_data = mysqli_fetch_assoc($result);
				$_SESSION['name'] = $user_data['name'];
				$_SESSION['userid'] = $user_data['user_id'];
				$_SESSION['password'] = $user_data['password'];
				$_SESSION['contact_number'] = $user_data['contact_number'];
					
				if($user_data['password'] === $password)
				{

					$_SESSION['username'] = $user_data['username'];
					header("Location: index.php");
					die;
				}else {			
			    echo "<h3 style=\"color: red;\"><center>Username or Password is Incorrect.</center></h3>";
			    } 
			} else {			
			    echo "<h3 style=\"color: red;\"><center>Username or Password is Incorrect.</center></h3>";
			    }  
		}else
		{
			echo "<h3 style=\"color: red;\"><center>Fields Are Empty.</center></h3>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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

	<h2 style="colour: #1E90FF;"><center>Welcome to Your Attendance Register!</center></h2>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;"><center>Login to Mark Your Attendance</center></div>
			<label class="text">Username</label>
			<input id="text" type="text" name="username" placeholder="Enter Your Username"><br><br>
			<label class="text">Password</label>
			<input id="text" type="password" name="password" placeholder="Enter Your Password"><br><br>

			<center><input id="button" type="submit" value="Login"></center><br><br>
		</form>

		<div>Don't Have An Account? <a href="signup.php">Sign Up</a>
	</div>
</body>
</html>
