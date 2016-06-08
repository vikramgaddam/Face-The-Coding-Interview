<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Code Interview</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style type="text/css">

.extra
       {
        font-size: 21px;
        font-weight: 200;

        }
.no-margin
{
  margin-top: 0px;
}
blockquote {
  background: #f9f9f9;

  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  margin-left: 100px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
}
blockquote:before {
  color: #ccc;
  content: open-quote;
  font-size: 8em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote:after {
  color: #ccc;
  content: close-quote;
  font-size: 8em;
  line-height: 0.1em;
  margin-left: 95%;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}
</style>
  </head>

  <body>

    
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="nav navbar-nav navbar-left ">

      <h3>Face The Coding Interview</h3>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        
        <?php 
        if(isset($_SESSION['valid']))
        {
          if($_SESSION['valid']==true)
          {
            printf("<li><a href='start_quiz.php'>Start Quiz!</a></li>");
          }
          else
          {
            printf("<li><a href='preregister.php'>Register</a></li><li><a href='prelogin.php'>Login</a></li>");
          }
        }
        else
        {
          printf("<li><a href='preregister.php'>Register</a></li><li><a href='prelogin.php'>Login</a></li>");
        }

         ?>

        <li><a href='about.php'>About</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
            <?php
            if(isset($_SESSION['valid']))
            {
              if($_SESSION['valid']==true)
              {
                printf("%s",$_SESSION['uname']);
              }
              else
              {
                printf("Login");
              }
            }
            else
            {
              printf("Login!Here");
            }
            ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <?php 
              if(isset($_SESSION['valid']))
              {
                if($_SESSION['valid']==true)
                {
                  printf("<a href='logout.php'>Logout</a>");
                }
                else
                {
                  printf("<a href='prelogin.php'>Login!</a>");
                }
              }
              else
              {
                printf("<a href='prelogin.php'>Login!</a>");
              }
               ?></li>
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

<div class=" jumbotron text-center " style="background-color:#ffffff;margin-bottom:-50px;margin-top:-80px;"><h1 class="lead">Why Our Event Exists?</h1></div>
<div class="container">
      <div class="row ">
        <div class="col-lg-12 lead">
          <p><b>Event Description:</b></p>
    
<p style="margin-left:40px;" class="text-muted">
This event mainly focuses on fetching a job for the students who are very keen about building their career in some prominent companies.And, along with their interview experience, they get to take home some awesome technical stuff to ponder on...! So, we're now giving you an oppourtunity to prove your Programming,Cognitive and Critical Thinking skills.</p>


<div class="container-fluid">
<div class="lead">
<blockquote>
<font size="6">
<p class=""><b><i>To all the codeoholics out there, this is our call to you to show the world what you are. Show your skills at our little event and get big results.
So, get</i></b></font></p> <font size="6"><b style="margin-left:16px;"><i>  Ready,</i></b></font>
<font size="6"><b><i>Come...Participate!</i></b></font>
</blockquote>
</p>
</div>
</div>
<hr>
<div class="container lead">
<h2>Interview Process:</h2>
<p><b>Round-1: A Technical Quiz on C</b></p> 
<p style="margin-left:40px;" class="text-muted">This event consists of 30 questions that are to be solved within a time of 30 minutes. The whole quiz can be taken from your home with a system connected to the internet. There is a cutoff mark, candidates who par that mark will be advancing to the next round.</p>


<p><b>Round-2: Code Mode</b></p>

<p style="margin-left:40px;" class="text-muted">Here the candidates will be given 3 coding questions that can be solved on the platform provided by us. The participants can code using any programming language, as our platform supports 20 different programming languages. So, there is no restriction on the user to use only a particular language. Now, the participant's testcases are evaluated and marks are awarded, then the "<font color="#d54">top 1 percentile</font>" of participants are  proceeded to round 3.</p>

<p><b>Round-3: Personal Interview</b></p>

<p style="margin-left:40px;" class="text-muted">This is an interesting round where the participant's technical as well as cognitive abilities are tested. Here candidates are posed with real world problems and are asked to solve using present computing technologies. Every answer has a mark, but the best response will be given a higher mark. So, the scores are given according to the responses given by the participant.</p><br>

</div>
</div>

<div class="container lead">
<p><b> NOTE:</b></p>
<p class=" lead">Participants who are qualified in Round-1 are supposed to attend Round 2 and 3 at <b>CVR College Of Engineering, Vastunagar, Mangalpalli,Ibrahimpatnam</b> on <b>31 March and 1 April.</b></p>
</div>

</div>
</div>
<br>
<br>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
     <ul class="nav nav-pills"> <li><a href="tc.html">Terms and Conditions</a></li>
      <li><a href="tc.html">Privacy Polciy</a></li>
    </ul>
    </div>
    
    
  </div>
</body>
</html>