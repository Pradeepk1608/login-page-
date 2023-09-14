<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
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
		padding-left:10px;
		border: none;
		width: 96%;
	}

	#button{
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 10px;
		margin-left:33%;
		margin-top:20px;
		border-radius:5px;
		width: 100px;
		color: white;
		background-color: blue;
		border: none;
		cursor:pointer;
	}

	#box{
		border-radius: 10px;
		background-color: #8e75e4;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	
	a{
		display: flex;
		justify-content: center;
		align-items: center;
		margin-bottom:1px;
	}
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px;margin: 10px;color: white;margin-left: 30%;
			margin-bottom : 20px;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder = "Username"><br><br>
			<input id="text" type="password" name="password" placeholder = "Password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>