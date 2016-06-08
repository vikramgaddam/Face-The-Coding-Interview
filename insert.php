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
$slot=$_SESSION['slot'];
$transid=$_SESSION['transid'];

$query="INSERT INTO users values('$cid','$uname','$email','$phone','$password','0','$slot','$transid')";

$qresult=$dbconn->query($query);
$exam_date;
$id=1;
$available_slot=0;

if($qresult==TRUE)
{
	header("Location:reg_success.html");
	if($slot==1)
	{
		$id=1;
		$query="SELECT available FROM slots where id='$id'";
		$result=$dbconn->query($query);
		$result=$result->fetch_assoc();
		$available_slot=$result['available'];
		$available_slot=$available_slot-1;
		$query="UPDATE slots SET available='$available_slot' where id=1";
		$exam_date='26-03-2016(10:30 AM- 11:00 AM)';
		$dbconn->query($query);
	}
	if($slot==2)
	{
		$id=2;
		$query="SELECT available FROM slots where id='$id'";
		$result=$dbconn->query($query);
		$result=$result->fetch_assoc();
		$available_slot=$result['available'];
		$available_slot=$available_slot-1;
		$query="UPDATE slots SET available='$available_slot' where id=2";
		$exam_date='26-03-2016(06:30 PM- 07:00 PM)';
		$dbconn->query($query);
	}
	if($slot==3)
	{
		$id=3;
		$query="SELECT available FROM slots where id='$id'";
		$result=$dbconn->query($query);
		$result=$result->fetch_assoc();
		$available_slot=$result['available'];
		$available_slot=$available_slot-1;
		$query="UPDATE slots SET available='$available_slot' where id=3";
		$exam_date='27-03-2016(10:30 AM- 11:00 AM)';
		$dbconn->query($query);
	}
	if($slot==4)
	{
		$id=4;
		$query="SELECT available FROM slots where id='$id'";
		$result=$dbconn->query($query);
		$result=$result->fetch_assoc();
		$available_slot=$result['available'];
		$available_slot=$available_slot-1;
		$query="UPDATE slots SET available='$available_slot' where id=4";
		$exam_date='27-03-2016(06:30 PM- 07:00 PM)';
		$dbconn->query($query);
	}

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