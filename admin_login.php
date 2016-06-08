<?php
include "config.php";
session_start();
if($_POST)
{

  if(($_POST['username']==$admin_uname)&&($_POST['password']==$admin_password))
  {
    $_SESSION['admin_valid']=true;
     header("Location:admin_preinsert.php");
    exit();
  }
  else
  {
    $error_msg="Invalid Credentials";
  }
  
}

?>
<html>	
<head>
	<title>Login Form</title>
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

     <a style="text-decoration:none;" href="#"><h3 style="color:#000000;">Face The Coding Interview</h3></a>
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
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
<?php if($error_msg!="")
{
                     print" <div class='alert alert-danger'>
  Wrong Login Credentials </div>";
}
?>

                            
                        <form id="loginform" class="form-horizontal" role="form" action="admin_login.php" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Login Id">                                        
                                    </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-password"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                                    </div>

                          
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls text-center">
                                      <button id="btn-login" href="#" class="btn btn-success" type="submit">Login</button>

                                    </div>
                                </div>


                                


                        </div>                     
                    </div>  
        </div>
      
    </div>

    
</body>
</html>
