<?php
include 'config.php';
session_start();
if(!isset($_SESSION['admin_valid']))
{
	header("Location:admin_login.php");
	die();
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

    $query="SELECT uname from manual_registrations where cienciaid='$ciencia_id'";
    
    $cienciaid_check=$dbconn->query($query);

    $query="SELECT uname from users where cienciaid='$ciencia_id'";

    $cienciaid_check_userstable=$dbconn->query($query);

    if(($cienciaid_check->num_rows==1)&&($cienciaid_check_userstable->num_rows==0))
    {
        $query="SELECT uname,email,phone,password from manual_registrations where cienciaid='$ciencia_id'";

        $cienciaid_check=$dbconn->query($query);

        $cienciaid_check=$cienciaid_check->fetch_assoc();
        $error_msg="";
        $_SESSION['cienciaid']=$ciencia_id;
        $_SESSION['username']=$cienciaid_check['uname'];
        $_SESSION['email']=$cienciaid_check['email'];
        $_SESSION['phone']=$cienciaid_check['phone'];
        $_SESSION['password']=$cienciaid_check['password'];
        header("Location:admin_insert.php");
       exit();
        
    }
    else
    {
      if($cienciaid_check_userstable->num_rows==1)
        $error_msg="The Ciencia Id You entered has Paid the Fee . ";
      else
      {
        if($cienciaid_check->num_rows==0)
        {
          $error_msg="The ciencia Id You entered Not Registered .";
        }
      }

        
    }
  }
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

      <a href="#" style="text-decoration:none;"><h3 class="" style="color:#000000;">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_preinsert.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="admin_logout.php">Logout</a></li>
            <li><a href="admin_contact.php">Contact Us</a></li>
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
                        <div class="panel-title text-center no-botton-margin">Verify ID</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
<?php if($error_msg!="")
{
                     echo " <div class='alert alert-danger'>".$error_msg."</div>";
}
?>

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="admin_preinsert.php" method="POST">
                                    
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
                            </form>     



                        </div>                     
                    </div>  
        </div>
      
    </div>
    </body>
    </html>