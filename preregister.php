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
        echo $dbconn->connect_error;
        die();
    }

    $query="SELECT uname from users where cienciaid='$ciencia_id'";
    
    $cienciaid_check=$dbconn->query($query);

    $query="SELECT uname from manual_registrations where cienciaid='$ciencia_id'";

    $manual_cid_check=$dbconn->query($query);

    if(($cienciaid_check->num_rows==0)&&($manual_cid_check->num_rows==0))
    {
        $cienciaid_check->close();
        $manual_cid_check->close();
        $dbconn->close();
        $_SESSION['cienciaid']=$ciencia_id;
        header("Location:register.php");
        $error_msg="";
       exit();
        
    }
    else
    {
        $error_msg="The Ciencia Id You entered is Registered.Click here to Login. ";
        
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
  <script src="jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="css/nav-style.css">
  <style>
  .no-margin
  {
    margin-top: 0px;
  }
  .no-botton-margin
  {
    margin-bottom: 0px;
  }

  </style>
</head>
<body class="color">
  
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
        <li><a href="about.php">About</a></li>
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

   <div class="container color">  
   <h3 class="text-center">Registration Form</h3>  
        <div id="loginbox" style="margin-top:20px; width:50%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title text-center no-botton-margin">Register</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
<?php if($error_msg!="")
{
                     print" <div class='alert alert-danger'>
  <strong>Registerd Already!</strong>.The Ciencia Id You entered is Registered.Click here to<a href='prelogin.php'> Login. </a>
                      </div>";
}
?>

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="preregister.php" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="College Roll Number">                                        
                                    </div>
                            
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls text-center">
                                      <button id="btn-login" href="#" class="btn btn-success" type="submit">Verify College Roll Number</button>

                                    </div>
                                </div>
                                   

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Already have an account! 
                                        <a href="prelogin.php">
                                            Login Here
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
