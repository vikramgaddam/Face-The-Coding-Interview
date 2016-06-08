<?php
include 'config.php';
session_start();
if(isset($_SESSION['valid']))
{
  if($_SESSION['valid']==true)
  {
    header('Refresh: 2; URL = index.php');
    echo "plzz logout to Register";
    die();
  }

}
if(!isset($_SESSION['cienciaid']))
{
    header('Refresh: 2; URL = index.php');
    echo "plzz verify the ciencia id first";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Registration Form</title>
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

      <a style="text-decoration:none;" href="index.php"><h3 style="color:#000000;">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="preregister.php">Register</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>





<div class="container">

  <div class="row-fluid">
  <div class="span6 offset6">
      <form id="registration-form" class="form-horizontal" action="preinsert.php" method="POST">
       <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info "style="width: 250%;" >
                    <div class="panel-heading">
                        <div class="panel-title">Register</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

          <div class="form-control-group">
            <label class="control-label" for="name">Coll Roll Number: </label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="name" id="name" value=<?php echo $_SESSION['cienciaid'];?> disabled>
            </div>
          </div>
     
          <div class="form-control-group">
            <label class="control-label" for="name">User Name</label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="username" id="username">
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="name">Password</label>
            <div class="controls">
              <input type="password" class="input-xlarge mystyle" name="password" id="password">
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="name"> Retype Password</label>
            <div class="controls">
              <input type="password" class="input-xlarge mystyle" name="confirm_password" id="confirm_password">
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="email" id="email">
            </div>
          </div>
        
          <div class="form-control-group">
            <label class="control-label" for="phonenumber">Phone Number:</label>
            <div class="controls">
              <input type="text" class="input-xlarge mystyle" name="phone" id="txtPhone">
              <span id="spnPhoneStatus"></span>
            </div>
          </div>

          <div class="form-control-group">
            <label class="control-label">Mode Of Payement: </label>
            <div class="controls">
              <select onchange="transaction_mode()" id="trans_mode" name="trans_mode">
                <option value="0">------</option>
                <option value="1">Pay At CVR College</option>
                <option value="2">Pay Online</option>
              </select>
            </div>
          </div>
          <div id="indication"></div>
          <div class="form-control-group">
            <label class="control-label" for="slot">Available Slots : </label><label></label>
            <div class="controls">
            <div class="radio">
              <label><input type="radio" name="slot" id="slot1" value="1">26-03-2016(10:30 AM -11:00 AM)  Slots Remaining: <?php echo $available_slot1; ?> </label> 
           </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot2" value="2">26-03-2016(06:30 PM -07:00 PM)  Slots Remaining: <?php echo $available_slot2; ?> </label> 
            </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot3" value="3">27-03-2016(10:30 AM -11:00 AM)  Slots Remaining: <?php echo $available_slot3; ?> </label> 
            </div>
            <div class='radio'>
              <label><input type="radio" name="slot" id="slot4" value="4">27-03-2016(06:30 PM -07:00 PM)  Slots Remaining: <?php echo $available_slot4; ?> </label> 
            </div>
            </div>
          </div>

          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-large">Register</button>
            <button type="reset" class="btn btn-large">Cancel</button>
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

<script src="assets/js/jquery.validate.js"></script> 

<script src="script.js"></script> 
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

  function transaction_mode()
  {

    var index=document.getElementById("trans_mode").selectedIndex;
    if(index==1)
    {
      document.getElementById("indication").innerHTML="<p class='container'> You can select your slot at fee payment time.</p>";
      document.getElementById("slot1").disabled=true;
      document.getElementById("slot2").disabled=true;
      document.getElementById("slot3").disabled=true;
      document.getElementById("slot4").disabled=true;
      document.getElementById("slot1").checked=false;
      document.getElementById("slot2").checked=false;
      document.getElementById("slot3").checked=false;
      document.getElementById("slot4").checked=false;
    }

    if(index==2)
    {
      document.getElementById("indication").innerHTML="";
      document.getElementById("slot1").disabled=false;
      document.getElementById("slot2").disabled=false;
      document.getElementById("slot3").disabled=false;
      document.getElementById("slot4").disabled=false;
    }


  }


  addEventListener('load', prettyPrint, false);
        $(document).ready(function(){
        $('pre').addClass('prettyprint linenums');
            });


        </script> 

</body>
</html>
