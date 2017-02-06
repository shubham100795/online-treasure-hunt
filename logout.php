<?php
session_start();
require 'connect.inc.php';
if(isset($_SESSION['id'])&&isset($_SESSION['level']))
{
session_destroy();
header('LOCATION:index.php');
}
?>