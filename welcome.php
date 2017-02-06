<?php
require 'connect.inc.php';
if(isset($_SESSION['id'])&&isset($_SESSION['level']))
{
	$id=$_SESSION['id'];
	$query="SELECT `firstname` FROM `users` WHERE `id`='$id' ";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		$row=mysqli_fetch_assoc($query_run);
		$name=$row['firstname'];
	}
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h4><?php echo "welcome $name" ?></h4>
				<input type="submit" id="logout" value="logout" class="btn btn-primary" onclick="logout();">
			</div>
		</div>
</div>
</body>
</html>