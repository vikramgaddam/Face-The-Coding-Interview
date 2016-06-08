<?php
include 'config.php';
session_start();
if(isset($_SESSION['valid']))
{
  if($_SESSION['valid']==true)
  {
    unset($_SESSION['uname']);
    unset($_SESSION['valid']);
    unset($_SESSION['cienciaid']);
    session_destroy();
    header('Refresh: 2; URL = home.php');
    echo "you are redirected back to home page";
    die();
  }
}

if(!isset($_SESSION['forgot_password']))
{
	header("Location:pre_forgot_password.php");
}

$ciencia_id=$_SESSION['cienciaid'];

$dbconn=new mysqli($servername,$username,$password,$dbname);

    if($dbconn->connect_errno)
    {
        echo "<h1 align='center' color='#ff0000'>connection failed</h1>";
        die();
    }

    $query="SELECT uname,email,password from users where cienciaid='$ciencia_id'";
    
    $cienciaid_check=$dbconn->query($query);

    if($cienciaid_check->num_rows==1)
    {
    		header("Location:paswd_sent.php");

	        $cienciaid_check=$cienciaid_check->fetch_assoc();

	        $email=$cienciaid_check['email'];
	        $uname=$cienciaid_check['uname'];
	        $password=$cienciaid_check['password'];


	        $body="<html><body> The Username and Password are :<br><h3> username:".$uname." <br> password: ".$password."</h3><br><a href='#'>Click here to login </a></body></html>";


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
			$mail->setFrom('facethecodinginterview@gmail.com', 'FCTI');
			//Set an alternative reply-to address
			$mail->addReplyTo('facethecodinginterview@gmail.com', 'FCTI');
			//Set who the message is to be sent to
			$mail->addAddress($email, $uname);
			//Set the subject line
			$mail->Subject = 'Forgot Password';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($body);
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors

			$mail->send();
			exit();
        
    }
    else
    {
        header("Location:wrong.php");
        die();
        
    }
 ?>
