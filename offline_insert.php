<?php
include "config.php";
session_start();

if(!isset($_SESSION['admin_valid']))
{
	header("Location:admin_login.php");
	die();

}

if(!isset($_SESSION['cienciaid']))
{
	header("Location:admin_preinsert.php");
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
$transid=$_SESSION['receipt_number'];

$query="INSERT INTO users values('$cid','$uname','$email','$phone','$password','0','$slot','$transid')";

$qresult=$dbconn->query($query);
$exam_date;
$id=1;
$available_slot=0;

if($qresult==TRUE)
{
	header("Location:offline_reg_success.php");
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

	/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'mail_resources/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $master_email;
//Password to use for SMTP authentication
$mail->Password = $master_email_pass;
//Set who the message is to be sent from
$mail->setFrom('facethecodinginterview@gmail.com', 'FTCI');
//Set an alternative reply-to address
$mail->addReplyTo('facethecodinginterview@gmail.com', 'FTCI');
//Set who the message is to be sent to
$mail->addAddress($email, $uname);
//Set the subject line
$mail->Subject = 'Registration Successfull';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors

$mail->send();

unset($_SESSION['cienciaid']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['phone']);

die();
}
else
{
	header("Location:offline_reg_unsucces.php");
	unset($_SESSION['cienciaid']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['phone']);

	die();
}

?>