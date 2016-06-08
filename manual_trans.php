<?php
include "config.php";

session_start();

if(!isset($_SESSION['cienciaid']))
{
	header("Location:index.php");
	die();
}

$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_errno)
{
	echo "connection failed";
	die();
}
$cid=$_SESSION['cienciaid'];
$uname=$_SESSION['username'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];

unset($_SESSION['cienciaid']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['phone']);
unset($_SESSION['slot']);

$query="INSERT INTO manual_registrations values('$cid','$uname','$email','$phone','$password')";

$qresult=$dbconn->query($query);

if($qresult==TRUE)
{
	header("Location:offline_reg.php");
	session_destroy();
	die();
}
else
{
	header("Location:reg_unsucces.html");
	session_destroy();
	die();
}

?>