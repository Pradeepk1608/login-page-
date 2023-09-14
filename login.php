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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
			<div style="font-size: 40px;margin: 10px; margin-left:32%; margin-bottom : 20px; color: white; ">Login</div>

			<input id="text" type="text" name="user_name" placeholder = "Username"><br><br>
			<input id="text" type="password" name="password" placeholder = "Password"><br><br>

			<input id="button" class = "btn" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>