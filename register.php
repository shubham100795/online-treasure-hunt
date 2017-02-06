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
		background-image:url("images/register.jpg");
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
			
			<h3>Register</h3>
			<form method="POST" action="register.php">
			<div class="form-group">
			<label for="username">username</label>
			<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
			<label for="passwordagain">Password again</label>
			<input type="password" class="form-control" name="password_again">
			</div>
			<div class="form-group">
			<label for="firstname">firstname</label>
			<input type="text" class="form-control" name="firstname">
			</div>
			<div class="form-group">
			<label for="surname">surname</label>
			<input type="text" class="form-control" name="surname">
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

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$password_again=$_POST['password_again'];
$password_hash=md5($password);
$firstname=$_POST['firstname'];
$surname=$_POST['surname'];
if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname))
{
	if(strlen($username)>32 || strlen($firstname)>32 || strlen($surname)>32 )
	//necessary though field length has been set coz some one might get html code and change field length..therefore necessary to check in script also
	{
	echo 'please enter the valid field length';
	}
	else
	{


		if($password!=$password_again)
		{
		echo 'passwords dont match';
		}
		else
		{
		$query="SELECT `username` FROM `users` WHERE `username`='$username' ";
		$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)==1)
			{
			echo 'username exists';//no need to worry about case senstivity here
			}
			else
			{
			$query_again="INSERT INTO `users` VALUES ('','$username','$password_hash','$firstname','$surname',0) ";
				if($query_run_again=mysqli_query($con,$query_again))
				{
				header('LOCATION:login.php');
				}
				else
				{
				echo 'please try again later';
				}
			
			}
		}
	}
}
else 
{
echo 'fill  all fields';
}
}
?>


