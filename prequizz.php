<?php 

session_start();

include "../ciencia/config.php";


if(isset($_SESSION['valid']))
{
	

	
}

$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_errno)
{
	echo "connection failed";
	die();
}



$ciencia_id="cvrcsedn9";

$query="SELECT test from users where cienciaid='$ciencia_id'";

$test_valid=$dbconn->query($query);

$test_valid=$test_valid->fetch_assoc();

if($test_valid['test']==0)
{
	header('Refresh: 2; URL = main_quizz.php');
	printf("You are redirected to main quizz page");
	die();
}
else
{
	header('Refresh: 2; URL = ../ciencia/index.php');
	printf("You are redirected to main page");
	die();

}


?>