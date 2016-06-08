<?php 
session_start();

if($_SESSION['valid']!=true)
{
  header('Refresh: 2; URL = prelogin.php');
  echo "plzz login first";
  die();
}

?>
<html lang="en">
<head>
<style>
.well{
  background-color: "#f00";
}
</style>
  <title>Start Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="nav navbar-nav navbar-left">
      <a style="text-decoration:none;" href="index.php"><h3 style="color:#000000;">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php printf(" Hi %s!",$_SESSION['uname']); ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<br>
<div class="container-fluid" align="center">
  <h1>Face The Coding Interview</h1>
</div>
<br><br>
<div class="container">
<p><FONT SIZE="3" COLOR="black"/></p>
  <div class="panel panel-default">
  <div class="panel-heading"><b>Round-1: A Technical Quiz on C</b><br></div>
  <div class="panel-body">
  <p><font falily="Lucida Grande" color="#555"> In this round, the participants will be undergoing a technical quiz with 30 MCQs with a time limit of 30 minutes. Participant can take the quiz from home. There will be a cutoff mark, the students crossing that mark will be advancing into the next round.Score will we generated as soon as the participant completes the test.</font></p><br>

  <div class="container" style="margin-left:480px;">
  <a href="pre-quiz-err-3.php"><button type="button" class="btn btn-success btn-lg" class="btn btn-info">Start Quiz</button></a>
</div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading"><b>Round-2: Code Mode</b><br></div>
 <div class="panel-body">
 <p><font family="Lucida Grande" color="#555">Here the candidates will be given 3 coding questions that can be solved on the platform provided by us. The participants can code using any programming language, as our platform supports 20 different programming languages. So, there is no restriction on the user to use only a particular language. Now, the participant's testcases are evaluated and marks are awarded, then the "<font color="#d54">top 1 percentile</font>" of participants are  proceeded to round 3.</font></p><br>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading"> <b>Round-3: Personal Interview</b><br></div>
 <div class="panel-body">     
      <p><font family="Lucida Grande" color="#555">his is an interesting round where the participant's technical as well as cognitive abilities are tested. Here candidates are posed with real world problems and are asked to solve using present computing technologies. Every answer has a mark, but the best response will be given a higher mark. So, the scores are given according to the responses given by the participant.</font></p>
</div>
</div>
</div>
</body>
</html>
