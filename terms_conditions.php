<?php
include "config.php";

session_start();

if(!isset($_SESSION['valid']))
{
  header('Refresh: 2; URL = index.php');
  echo "Plzz login before starting the quizzz!";
}


$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_errno)
{
  echo "connection failed";
  die();
}


$ciencia_id=$_SESSION['cienciaid'];

$query="SELECT test from users where cienciaid='$ciencia_id'";

$test_valid=$dbconn->query($query);

$test_valid=$test_valid->fetch_assoc();

if($test_valid['test']==0)
{
  $_SESSION['test_valid']=true;
}
else
{
  header('Refresh: 2; URL =index.php');
  printf("You Have already taken the quizzz.....");
  die();
}
?>
<html>	
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  margin: 5px;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}


.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}

</style>

</head>
 
<body onload="disable_button()">
   <nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav navbar-right">

      <li><a href="#"><span class="user"></span> Home</a></li>
      <li><a href="#"><span class="score"></span> Score</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user black"></span> Logout</a></li>
    </ul>
  </div>
</nav><br><br>


<div class="container">
<p><FONT SIZE="3" COLOR="black"/></p>
  <div class="panel panel-default">
  <div class="panel-heading"><h><b>INSTRUCTIONS</b></h><br></div>
  <div class="panel-body">
    <h><b><u>General Instructions:</u></b></h>
    <p>1. The total duration of exam will be 30 minutes.</p>
    <p>2. The clock will be set at the server. The countdown timer in the top right of the screen will display the remaining time available for you to complete the examination. When the timer reaches zero, examination will end by itself. You will not to be required to end or submit your examination.</p>
    <p>3. The question palette displayed on top of the screen will show the status of each question using following symbols.</p><br>
    <p><button type="button" class="btn btn-default btn-circle btn-lg" >1</button> You have not visited the question yet.</p>
    <p><button type="button" class="btn btn-primary btn-circle btn-lg" >1</button> You have visited the question, but NOT answered the question.</p>
    <p><button type="button" class="btn btn-success btn-circle btn-lg" >1</button> You have answered the question.</p><br>
    <h><b><u>Navigation to a Question:</u></b></h>
    <p>To answer a question do the following:</p>
    <p>a. Click on the question number in the question palette to go to the question directly.</p>
    <p>b. Click on <b>Submit Response</b> and <b>Next</b> to submit the answer for your current question and then go to the next question.</p>
    <p><font color="red"><u>Caution:</u> Note that your answer for current question will not be saved, if you navigate to another question directly without clicking the <b>"Submit Response"</b> button.</font></p>
    <h><b><u>Answering a Question:</u></b></h>
    <p>Procedure for answering the question:</p>
    <p>a. To select your answer, click on one the button of one of the options.</p>
    <p>b. To change your answer, click on the button of another option.</p>
    <p>c. To save your answer, you must click on <b>Submit Response</b> button.</p>
  </div>
</div>
</div>
<br>
<div class="container">
<input type="checkbox" id="chkAgree" onChange="goFurther()" /><font color="red"><b>  I Agree with the terms and conditions</b></font><br><br>

  
 <p class="text-center"><a href="dum.php"><button class="btn btn-lg btn-success" id="btnSubmit" onclick="createcookie()">Start Quiz!</button></a></p>

</div>

<script type="text/javascript">

function goFurther()
{
if (document.getElementById("chkAgree").checked)
document.getElementById("btnSubmit").disabled = false;
else
document.getElementById("btnSubmit").disabled = true;
}

function disable_button()
{
  document.getElementById("btnSubmit").disabled=true;
}

function createcookie()
{
}

</script>

</body>
</html>
