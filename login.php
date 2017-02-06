<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet"> 
	<style>
	body{
		background-image:url("images/login.jpg");
		background-size:100%;
		font-family: 'Rancho', cursive;
		color:white;
		font-size:40px;
	}
	h3{
		text-align:center;
		font-size:50px;
	}
	.form-control,button{
		font-family:tahoma;
	}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12>
				<script type="text/javascript" src="jquery.js"></script>
				<script type="text/javascript" src="bootstrap.js"></script>
				<h3>Login</h3>
				<form method="POST" action="login.php" >
				  <div class="form-group">
					<label for="username">username</label>
					<input type="text" class="form-control" name="username">
				  </div>
				  <div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password">
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
require 'connect.inc.php';

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$password_hash=md5($password);
if(!empty($username)&&!empty($password))
{
$query="SELECT `id`,`level` FROM `users` WHERE `username`='".mysqli_real_escape_string($con,$username)."' AND `password`='".mysqli_real_escape_string($con,$password_hash)."' ";
//real escape string protects against sql injection where user might mess with our query..it escapes all characters puts slashes..that may lead to injection 
	if($query_run=mysqli_query($con,$query))
	{
		if(mysqli_num_rows($query_run)==0)
		{
		echo 'invalid username and password';
		}
		else if(mysqli_num_rows($query_run)==1)
		{
		$row=mysqli_fetch_assoc($query_run);
		$user_id=$row['id'];
		$level=$row['level'];
		session_start();
		$_SESSION['id']=$user_id;
		$_SESSION['level']=$level;
		
		header('LOCATION:level'.$_SESSION['level'].'.php');//now performs check if id is set or not on index page
		}
	}
	else
	{
	mysqli_error($con);
	}
}
else 
{
echo "enter username and password";
}
}
?>

