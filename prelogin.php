<?php
include "config.php";
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


if($_POST)
{

$ciencia_id=$_POST['username'];

    
    $dbconn=new mysqli($servername,$username,$password,$dbname);

    if($dbconn->connect_errno)
    {
        echo "connection failed";
        die();
    }

    $query="SELECT uname from users where cienciaid='$ciencia_id'";
    
    $cienciaid_check=$dbconn->query($query);

    if($cienciaid_check->num_rows==1)
    {
        $cienciaid_check->close();
        $dbconn->close();
        $_SESSION['cienciaid']=$ciencia_id;
        header("Location:prepasswordval.php");
        $error_msg="";
       exit();
        
    }
    else
    {
        $error_msg="Your Ciencia ID is not registered. Kindly Regiter First";
        
    }
  }

?>
<html>	
<head>
	<title>Registartion Form</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/nav-style.css">
  <style>
  .color
  {
    background-color: ;
  }
  .no-margin
  {
    margin-top: 0px;
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
        <li><a href="preregister.php">Register</a></li>
        <li><a href="prelogin.php">Login</a></li>
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

   <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="pre_forgot_password.php">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
<?php if($error_msg!="")
{
                     print" <div class='alert alert-danger'>
  <strong>Not Registerd!</strong>.The Ciencia Id You entered doesn't exists in our records.If not registered <a href='preregister.php' style='text-muted'>Register here.</a> 
                      </div>";
}
?>

                            
                        <form id="loginform" class="form-horizontal" role="form" action="prelogin.php" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Roll Number">                                        
                                    </div>
                            
                            


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls text-center">
                                      <button id="btn-login" href="#" class="btn btn-success" type="submit">Verify Roll No.</button>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="preregister.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
      
    </div>
    
</body>
</html>
