<?php 
include 'config.php';
session_start();
if(isset($_SESSION['valid']))
{
  if($_SESSION['valid']!=true)
  {
    header('Refresh: 2; URL = home.php');
    echo " plzz login before u take the quizz you are redirected back to home page";
    die();
  }
}
else
{

    header('Refresh: 2; URL = home.php');
    echo " plzz login to check your score redirected back to home page";
    die();

}

if(!isset($_SESSION['test_valid']))
{
    header('Refresh: 2; URL = home.php');
    echo " you are redirected back to home page";
    die();
}


if(empty($_POST))
{
    header('Refresh: 2; URL = home.php');
    echo " you are redirected back to home page";
    die();
}

$dbconn=new mysqli($servername,$username,$password,$dbname);

if($dbconn_connect_errno)
{
  echo "connection failed";
  die();
}
unset($_SESSION['endtime']);
unset($_SESSION['test_valid']);

$bol=1;

$ciencia_id=$_SESSION['cienciaid'];
$query="UPDATE users SET test= '$bol' WHERE cienciaid = '$ciencia_id' ";
$dbconn->query($query);
if($dbconn->affected_rows==1)
{
  
}
else
{
  printf("Some thing went wrong plzz contact adminstrator %s ",$dbconn->error);
}


$scr=$_POST['tot_score'];
$query="INSERT INTO marks VALUES('$ciencia_id','$scr','0','0')";

$dbconn->query($query);

if($dbconn->affected_rows==1)
{
  
}
else
{
  printf("SOme thing went wrong plzz contact adminstrator %d",$dbconn->affected_rows);
}

$dbconn->close();

?>
<html>	
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script type = "text/javascript" >
    history.pushState(null, null, 'calculate.php');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'calculate.php');
    });
    </script>
 
<body onload="searchCookie()">
	
   <nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav navbar-right">

      <li><a href="index.php"><span class="user"></span> Home</a></li>
      <li><a href="score.php"><span class="score"></span> Score</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user black"></span> Logout</a></li>
    </ul>
  </div>
</nav><br><br>
<div class="container">
      <div class="masthead">
        <h3 class="text-muted"> Your Score is : <?php
$var=$_POST['tot_score'];
printf("%d",$var);
?></h3>
      </div>

<script type="text/javascript">

function searchCookie()
{
  

}

</script>
      
</body