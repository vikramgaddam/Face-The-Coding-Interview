<?php include('Crypto.php')?>
<?php
session_start();

	error_reporting(0);
	
	$workingKey='EFF47AD283782F786FE2142269A3D5D6';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($i==2)	$_SESSION['transid']=$information[1];
	}

	if($order_status==="Success")
	{
		header('Location: insert.php');
		die();
		
	}
	else if($order_status==="Aborted")
	{
		session_destroy();
		header('Location: reg_unsucces.html');
		die();
	
	}
	else if($order_status==="Failure")
	{
		session_destroy();
		header('Location: reg_unsucces.html');
		die();
	}
	else
	{
		session_destroy();
		header('Location: reg_unsucces.html');
		die();
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
