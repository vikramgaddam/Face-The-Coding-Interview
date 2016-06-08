<?php
session_start();
$index=$_POST['trans_mode'];
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
$_SESSION['email']=$_POST['email'];
$_SESSION['phone']=$_POST['phone'];
if(!empty($_POST['slot']))
{
	$_SESSION['slot']=$_POST['slot'];
}

if($index==1)
{
	
	header("Location:manual_trans.php");
	die();
}

if($index==2)
{
	header("Location:payment_redirect.php");
	die();
}

?>
