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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  </head>

  <body>

    

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="nav navbar-nav navbar-left">

      <a href="index.php"><h3 class="text-muted">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <?php 
        if(isset($_SESSION['valid']))
        {
          if($_SESSION['valid']==true)
          {
            
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
<div class="container">
      <div class="row">
        <div class="col-lg-4">
          <p><font size="4"><b>CONTACT US FOR FURTHER QUERIES:</b></font></p><br>
          <p><b>Vikram G</b></p>
            <p><b><u>Phone:</u></b> 9642151514</p>
            <p><b><u>Email:</u></b> gvikram244@gmail.com</p><br>
            <p><b>Sri Dhanvi B</b></p>
            <p><b><u>Phone:</u></b> 9700675221</p>
            <p><b><u>Email:</u></b> sridhanvi114@gmail.com</p><br>
            <p><b>Krishna Chandra K</b></p>
            <p><b><u>Phone:</u></b> 9640600770</p>
            <p><b><u>Email:</u></b> krishna95chandra@gmail.com</p>

          </div>
        </div>
      </div>
    </body>
    </html>
