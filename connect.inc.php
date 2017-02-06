<?php
$hostname='localhost';//hostname or server name
$username='root';
$password='';
$database='project';
$con=mysqli_connect($hostname,$username,$password,$database)or die('could not connect');
//echo 'connected to database'.'<br>';
//now this can be included in every php file where we need to connect to a database
?>