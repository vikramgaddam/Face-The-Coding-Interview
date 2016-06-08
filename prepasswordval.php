<?php
session_start();

if(isset($_SESSION['valid']))
{
  if($_SESSION['valid']==true)
  {
    unset($_SESSION['uname']);
    unset($_SESSION['valid']);
    unset($_SESSION['cienciaid']);
    session_destroy();
    header('Refresh: 2; URL = index.php');
    echo "you are redirected back to home page";
    die();
  }
}

if(!isset($_SESSION['cienciaid']))
{
	header("Location:prelogin.php");
	die();
}
else
{
  session_start();
}
?>
<html>
<head>
<title>login</title>
<meta name="viewport" content="width=device-width">
<link href="style.css" rel="stylesheet">
<link href="css/nav-style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
.mystyle
{
  height:30px;
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

      <a style="text-decoration:none;" href="index.php"><h3 style="color:#000000;">Face The Coding Interview</h3></a>
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
            <li><a href="prelogin.php">Login</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
      <div class="container">
  <div class="row-fluid">
  <div class="span6 offset6">
      <form id="registration-form" class="form-horizontal" action="passwordval.php" method="POST">
       <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info "style="width: 250%;" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

			          <div class="form-control-group">
			            <label class="control-label" for="name">Ciencia ID: </label>
			            <div class="controls">
			              <input type="text" class="input-xlarge mystyle" name="name" id="name" value=<?php echo $_SESSION['cienciaid'];?> disabled>
			            </div>
			        </div>
					<div class="form-control-group">
			            <label class="control-label" for="name">Password</label>
			            <div class="controls">
			              <input type="password" class="input-xlarge mystyle" name="password" id="password">
			            </div>
			          </div>

			          <div class="text-center">
			            <button type="submit" class="btn btn-success btn-large">Login</button>
			          </div>
				</div>
			</div>
		</div>
      </form>
    </div>
    <!-- .span --> 
  </div>
  <!-- .row -->
  
</div>
<!-- .container --> 

<script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script> 

<script src="script.js"></script> 
<script>
        addEventListener('load', prettyPrint, false);
        $(document).ready(function(){
        $('pre').addClass('prettyprint linenums');
            });
        </script> 

</body>
</html>