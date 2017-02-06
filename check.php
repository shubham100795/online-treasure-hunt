<?php
session_start();
require 'connect.inc.php';

if(!isset($_SESSION['id'],$_SESSION['level'])){
header('Location: login.php');
}
if(!isset($_POST['answer'])) {
  header('Location: login.php');
  die();
}
$user_ans=mysqli_real_escape_string($con,$_POST['answer']);
$level=$_SESSION['level'];
$prev_level=$level;
$id=$_SESSION['id'];
switch($level)
{
	case 0:
	$ans='capybara';
	break;
	case 1:
	$ans='rameshwar nath kao';
	break;
	case 2:
	$ans='meghmani organics';
	break;
	case 3:
	$ans='chaivinist';
	break;
	case 4:
	$ans='mind your business';
	break;
	case 5:
	$ans='dunkirk';
	break;
	case 6:
	$ans='panda poop';
	break;
	case 7:
	$ans='roses at mughal garden';
	break;
	case 8:
	$ans='larisa latynina';
	break;
	case 9:
	$ans='nirmal jit singh sekhon';
	break;
	case 10:
	$ans='22';
	break;
	
}
if($ans==$user_ans)
{
	$level++;
	$_SESSION['level']=$level;
	$query="UPDATE `users` SET `level`='$level' WHERE `id`='$id' ";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		header('LOCATION:level'.$_SESSION['level'].'.php');
	}
	else
	{
		echo 'we are facing some problems';
	}
}
else
{
	header('LOCATION:level'.$prev_level.'.php');
}
?>


