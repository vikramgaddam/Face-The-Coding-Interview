<?php

include "config.php";

session_start();

if(!isset($_SESSION['cienciaid']))
{
	
	 header('Refresh: 2; URL = prelogin.php');
	echo "plzz enter the ciencia id";
	die();
}

$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_errno)
{
	echo "connection failed";
	die();
}

if(empty($_POST['password']))
{

 header('Refresh: 2; URL = prelogin.php');
 echo "plzz fill the form";
 die();
	
}

$pass=$_POST['password'];

$cid=$_SESSION['cienciaid'];

$query="SELECT password from users where cienciaid='$cid'";

$dpassword=$dbconn->query($query);

$arr=$dpassword->fetch_assoc();

if($arr['password']==$pass)
{
	$_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $uquery="SELECT uname from users where cienciaid='$cid'";
    $duname=$dbconn->query($uquery);
    $uarr=$duname->fetch_assoc();
    $_SESSION['uname']=$uarr['uname'];
	header('Refresh: 2; URL = index.php');
	printf("valid password %s",$uarr['uname']);
	
}
else
{
	header('Refresh: 2; URL = log_failure.php');
	printf(" invalid  password ");
	
}


?>






