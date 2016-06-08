<html>	
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

	<style>
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  margin: 5px;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}


.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}

</style>

</head>

<body>

   <nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav navbar-right">

      <li><a href="#"><span class="user"></span> Home</a></li>
      <li><a href="#"><span class="score"></span> Score</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user black"></span> Logout</a></li>
    </ul>
  </div>
</nav><br><br>


   <div class="container">
<input type="checkbox" id="chkAgree" onChange="goFurther()" /><font color="red"><b>  I Agree with the terms and conditions</b></font><br><br>

  <form id="form1" action="temp.php" method="POST">
 <p class="text-center"><button class="btn btn-lg btn-success" id="btnSubmit" onclick="createcookie()">Start Quiz!</button></p>
  </form>
<p id="demo">dsfdsgf</p>
</div>

<script type="text/javascript">

function createcookie()
{

<?php 
    session_start();

    $curr_time=time();

    if(!isset($_SESSION['endtime']))
    $_SESSION['endtime']=$curr_time+1920;
?>
 }


</script>

</body>
</html>
