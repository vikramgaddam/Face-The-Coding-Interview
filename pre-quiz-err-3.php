<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="custom-nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="nav navbar-nav navbar-left text-muted">

      <a href="home.php" style="text-decoration:none;"><h3 class="" style="color:#666;">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">Home</a></li>
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
<div class="container lead">
	<blockquote style="margin-top:40px;"><h2>Important points to know before taking the quiz:</h2></blockquote>
	<div class="jumbotron" style="margin-left:30px;">
		<p><b>Point-1: If any problem occurs while taking the quiz:</b></p> 
		<p style="margin-left:85px;" class="text-muted">Please kindly report the issue to any of our organizers, whose details are given below,</p>
		<p class="text-muted">
					<ul style="margin-left:80px;" ><li><u><div class="well" style="width:330px">G Vikram:</u><br>Phone: 9642151514 <br>Email:gvikram244@gmail.com</div></li><br><li><u><div class="well" style="width: 390px">Krishna Chandra K:</u><br>Phone: 9640600770<br>Email:krishna95chandra@gmail.com</div></li><br><li><u><div class="well" style="width: 330px">Sri Dhanvi B:</u><br>Phone: 9700675221<br>Email:sridhanvi114@gmail.com</div></li><br></ul>
		</p>
		<br>
		<p><b>Point-2:The problem need to be notified to any organizer within 5 minutes of its occurrence.</b></p> 
		<p style="margin-left:85px;" class="text-muted">Candidates needs to consult the organizers as soon as possible, failing to report within specified time would result in cancellaltion of that candidate's quiz.</p>
		<br>
		<p><b>Point-3:Read all the instructions carefully, before starting the quiz.</b></p> 
		<p style="margin-left:85px;" class="text-muted">FTCI team is not responsible if the candidate does not read the instructions specified and gets confused with the options during the quiz.</p>
  <br>
  <p><b>Point-4:Candidates should take the quiz only in the browsers specified below.</b></p>
    <p class="text-muted">
          <ol style="margin-left:80px;" ><li><font color:"">Google Chrome<font></li><br><li>Mozilla Firefox</li><br><li>Safari for Mac</li><br></ol>
    </p>
    <p style="margin-left:85px;" class="text-muted">**Internet Explorer should not be used.</p>
    	</div>
  <div class="container" style="margin-left:480px;">
<a href="terms_conditions.php"><button type="button" class="btn btn-success btn-lg">PROCEED</button></a>
</div>
<br><br><br><br><br><br>
</div>
</body>
</html>