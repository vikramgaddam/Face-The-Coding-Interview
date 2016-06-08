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

    <title>Code Interview</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

    <style type="text/css">

       .extra
       {
        font-size: 21px;
        font-weight: 200;

        }
        .size
        {
          font-size: 22px;
        }
        .center
        {
          margin: 0;
          text-align: center;
        }
        .no-margin
        {
          margin-top:0px;
        }
        .btn-xlarge {
    padding: 18px 28px;
    font-size: 22px; 
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
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
    <div class="nav navbar-nav navbar-left text-muted">

      <a href="index.php" style="text-decoration:none;"><h3 class="" style="color:#000000;">Face The Coding Interview</h3></a>
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

  <div class="container text-center" style="margin-top:40px;">
      <!-- Jumbotron -->
      <div class="jumbotron">
        
        <h1>
          <?php

          if(isset($_SESSION['valid']))
          {
            if($_SESSION['valid']==true)
            {
              printf("Are You Up For The Challenge?");
            }
            else
            {
              printf("Wanna whack an Interview?");
            }
          }
          else
          {
            printf("Wanna whack an Interview?");
          }
           ?>
          </h1>
        <p>
          <?php

          if(isset($_SESSION['valid']))
          {
            if($_SESSION['valid']==true)
            {
              printf("What are you waiting for ? Take the quiz and set a new target for others. Good Luck!");
            }
            else
            {
              printf("Well, here's a chance! Yes, you read it right. Mark your calender and start your preparation. Get ready to take the first success step in your career path.");
            }
          }
          else
          {
            printf("Well, here's a chance! Yes, you read it right. Mark your calender and start your preparation. Get ready to take the first success step in your career path.");
          }
           ?>
           </p>
        <p class="text-center">
          <?php 
          if(isset($_SESSION['valid']))
          {
            if($_SESSION['valid']==true)
            {
              printf("<a class='btn btn-xlarge btn-success' href='start_quiz.php' role='button'>Enter Contest!</a>");
            }
            else
            {
              printf("<a class='btn btn-xlarge btn-success' href='preregister.php' role='button'>Register Here!</a>");
            }
          }
          else
          {
            printf("<a class='btn btn-xlarge btn-success' href='preregister.php' role='button'>Register Here!</a>");
          }

          ?>
          </p>
      </div>
</div>
      <!-- Example row of columns -->
      <div class="container">
        <div class="col-lg-12">
          <h2>Why Face The Coding Interview?</h2>
          <blockquote >
          <p class="extra lead"> ... 3 Rounds, 38 Questions and a mind full of code that fetches you a job in a reputed company. </p>
          <p class=""><a class="" href="about.php" role="button">Read More
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
          </a></p>
        </blockquote>
        </div>
      </div>
      <div class="container">
        <div class="col-lg-12">
          <h2>When and Where?</h2>
          <blockquote >
          <p class="extra">Round 1 is a online test which can be taken from home on <b>26 and 27 March</b>. Participants who cleared the Round 1 are supposed to attend Round 2 and 3 at <b>CVR College Of Engineering, Vastunagar, Mangalpalli, Ibrahimpatnam </b> on <b>31 March and 1 April</b>.</p> 
          
          <p class=""><a class="" href="about.php" role="button">View More Details  
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>

          </a></p>
       </blockquote>
       <h2>Process of registration:</h2>
       <blockquote >
                <p><i><font style="color:#f00">"Candidates needs to be registered to the event before Round 1 itself"</font></i></p>
                <p class="extra lead"> There are two ways you can do that:</p>
                <ol>
                  <li><h3>Manual Registration</h3></li>
                    <p>Here, The candidates need to Fill the Online Registration Form at our website and need to pay the Registration Fee, and select the slot at Placement office, CVR College of Engineering, before the last date of registration.</p>
                  <li><h3>Online Registration</h3></li>
                <p>Here, the candidates need to Fill the Online Registration Form, book the slot and pay the registration fee online in our website itself, through a secure payment gateway, and then the user is all set to take the quiz.</p>
                </ol>
            </blockquote>

            <h2>Registartion Fee :</h2>
       <blockquote>
        Registration Fee: Rs:100/- (inclusive of All Taxes and Service charges).
       </blockquote>


       <h2>Important Dates:</h2>
          <blockquote >
          <p class="extra"><b><u>Last date of Registration</u>: </b> 25 March 2016<br><b><u>Round-1 :</u></b> 26 and 27 March 2016<br><b><u>Round-2 and 3 :</u></b> 31 March and 1 April</p>
          <p class=""><a class="" href="about.php" role="button">View More Details  
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>

          </a></p>
       </blockquote>
       

        </div>
      <!-- Site footer -->

    </div> <!-- /container -->

<br>
<br>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
     <ul class="nav nav-pills"> <li><a href="tc.html">Terms and Conditions</a></li>
      <li><a href="tc.html">Privacy Polciy</a></li>
    </ul>
    </div>
    
    
  </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
