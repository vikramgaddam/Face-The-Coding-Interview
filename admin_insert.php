<?php
include 'config.php';
session_start();

if(!isset($_SESSION['admin_valid']))
{
	header("Location:admin_login.php");
	die();

}

$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_errno)
{
  echo "connection failed";
  die();
}

$id=1;
$query="SELECT available FROM slots where id='$id'";

$result=$dbconn->query($query);

$result=$result->fetch_assoc();

$available_slot1=$result['available'];

$id=2;
$query="SELECT available FROM slots where id='$id'";

$result=$dbconn->query($query);

$result=$result->fetch_assoc();

$available_slot2=$result['available'];

$id=3;
$query="SELECT available FROM slots where id='$id'";

$result=$dbconn->query($query);

$result=$result->fetch_assoc();

$available_slot3=$result['available'];

$id=4;
$query="SELECT available FROM slots where id='$id'";

$result=$dbconn->query($query);

$result=$result->fetch_assoc();

$available_slot4=$result['available'];

if($_POST)
{
	$_SESSION['slot']=$_POST['slot'];
  $_SESSION['receipt_number']=$_POST['receipt_number'];
	header("Location:offline_insert.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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

  <body onload="disable_slots()">

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
<div class="container">

  <div class="row-fluid">
  <div class="span6 offset6">
      <form id="registration-form" class="form-horizontal" action="admin_insert.php" method="POST">
       <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" style="width: 250%;" >
                    <div class="panel-heading">
                        <div class="panel-title">Register</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

          <div class="form-control-group">
            <label class="control-label" for="name">College Roll Number : </label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="name" id="name" value=<?php echo $_SESSION['cienciaid'];?> disabled>
            </div>
          </div>
     
          <div class="form-control-group">
            <label class="control-label" for="name">User Name</label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="username" id="username" value=<?php echo $_SESSION['username'];?> disabled>
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="email" id="email" value=<?php echo $_SESSION['email'];?> disabled>
            </div>
          </div>
          <div class="form-control-group">
            <label class="control-label" for="slot">Available Slots : </label><label></label>
            <div class="controls">
            <div class="radio">
              <label><input type="radio" name="slot" id="slot1" value="1">23-03-2016(10:30 AM -11:00 AM)  Slots Remaining: <?php echo $available_slot1; ?> </label> 
           </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot2" value="2">23-03-2016(06:00 PM -07:00 PM)  Slots Remaining: <?php echo $available_slot2; ?> </label> 
            </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot3" value="3">24-03-2016(10:30 AM -11:00 AM)  Slots Remaining: <?php echo $available_slot3; ?> </label> 
            </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot4" value="4">24-03-2016(06:00 PM -07:00 PM)  Slots Remaining: <?php echo $available_slot4; ?> </label> 
            </div>
            </div>
          </div>
          <div class="form-control-group">
            <label class="control-label" for="receipt_number">Receipt Number: </label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="receipt_number" id="receipt_number" required/>
            </div>
          </div>

          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-large">Fee Paid</button>
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
<script>

  
  window.disable_slots=function()
  {
    var no_slot1=<?php echo $available_slot1; ?>;
    if(no_slot1==0)
    {
      document.getElementById('slot1').disabled=true;
    }
    var no_slot2=<?php echo $available_slot2; ?>;
    if(no_slot2==0)
    {
      document.getElementById('slot2').disabled=true;
    }
    var no_slot3=<?php echo $available_slot3; ?>;
    if(no_slot3==0)
    {
      document.getElementById('slot3').disabled=true;
    }
    var no_slot4=<?php echo $available_slot4; ?>;
    if(no_slot4==0)
    {
      document.getElementById('no_slot4').disabled=true;
    }


  }
  </script>
</body>
</html>
        