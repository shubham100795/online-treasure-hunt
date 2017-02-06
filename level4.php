<?php
session_start();
require 'connect.inc.php';
if(isset($_SESSION['id'])&&isset($_SESSION['level']))
{
require 'welcome.php';
?>
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
		background-image:url("images/4.jpg");
		background-size:100%;
		font-family: 'Rancho', cursive;
		color:white;
		font-size:40px;
	}
	h3{
		text-align:center;
		font-size:50px;
	}
	.form-control,button,#logout{
		font-family:tahoma;
	}
	h4{
		text-align:left;
		font-size:50px;
	}
	#logout{
		position:absolute;
		top:40%;
		margin-left:80%;
	}
	</style>
	<script type="text/javascript">
	function logout()
	{
		window.location="logout.php";
	}
	</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<script type="text/javascript" src="jquery.js"></script>
				<script type="text/javascript" src="bootstrap.js"></script>
				<h3>Level:4</h3>
				<br/>
				<br/>
				<br/>
				<h3>The motto on the very first official U.S coin was</h3>
				<br/>
				<br/>
				<form method="POST" action="check.php" >
				  <div class="form-group">
					<label for="answer">answer</label>
					<input type="text" class="form-control" name="answer">
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php	
}

else
{
	header('LOCATION:login.php');
}
?>