<?php 
session_start();

if(isset($_SESSION['valid']))
{
  if($_SESSION['valid']!=true)
  {
    header('Refresh: 2; URL = index.php');
    echo " plzz login before u take the quizz you are redirected back to home page";
    die();
  }
}
else
{
    header('Refresh: 2; URL = index.php');
    echo " plzz login before u take the quizz you are redirected back to home page";
    die();

}

if(!isset($_SESSION['test_valid']))
{
    header('Refresh: 2; URL = index.php');
    echo " You cannot take the quizz more than one time ...";
    die();
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
    
    <script type = "text/javascript" >

    history.pushState(null, null, 'dum.php');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'dum.php');
    });
    
    </script>
  <style type="text/css">
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

.btn-xl
{
 width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}

.counter {
  border: solid 0px;
  border-radius: 12px;
  height: 110px;
  width: 320px;
  display: inline-block;
  float: right;
  background-color: #d3d3d3;
  text-align: center;
}
#countdown {
  color: #000000;
}

#countdown span {
  color: #000000;
  font-size: 50px;
  font-weight: normal;
  margin-top: 0px;
  margin-left: 5px;
  margin-right: 5px;
  text-align: center;
}


  </style>
</head>
<body onload="setTimer()">
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

      <a href="" style="text-decoration:none;"><h3 class="" style="color:#000000;">Face The Coding Interview</h3></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"><?php printf(" Hi %s!",$_SESSION['uname']); ?>
            
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<div class="container" style="position:fixed;">
  <div class="counter" style="margin-right:0px;">
            <h3 align="center" class="lead" style="margin-bottom:0px;"><b>Time Remaining:<b></h3>
            <div id="countdown" class="lead">

              <h3 align="center" style="margin-top:0px;"><span id="id_min"></span>:<span id="id_sec"></span></h3>
            </div>
            <!-- /#Countdown Div -->
          </div>
          <!-- /.Container Div -->
      </div>  
      <br>
<br>
<br>
<br><br><br>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><b>Questions!</b><br></div>
<div class="panel-body">
<?php 
for($i=1;$i<=30;$i++)
{
    printf("<button type='button' class='btn btn-default btn-circle btn-lg' id='%d' name='%d' onclick='myfunction(this.id)'>%d</button>",$i,$i,$i);
}
?>
<br>
<br>
<div class="text-center">
<form id="form1" action="calculate.php" method="POST" onsubmit="return calculate_marks()">
  <input type="hidden" value="" id="tot_score" name="tot_score">
<button class="btn btn-lg btn-success" type="submit">End Quizz!</button>
</form>
</div>
</div>
</div>
</div>
<div class="container" style="background-color:#d3d3d3;border-radius:20px;">
    <h3 class="lead"><span style="margin-right:40px;" id="id_question_no"> Question:1 </span></h3>

<div class="container">
 <h2 class="lead"> <p id="question">
  #include &lt;stdio.h&gt;<br>
    int main()<br>
    {<br>
        short int i = 20;<br>
        char c = 97;<br>
        printf("%d, %d, %d\n", sizeof(i), sizeof(c), sizeof(c + i));<br>
        return 0;<br>
    }<br>
  </p> </h2>
  <div class="container">
    
    
    <input type="radio" name="num1" id="option1" value="1" /> <label id="p_option1" style="font-size:15px; "> 2, 1, 2</label> <br><br>
    <input type="radio" name="num1" id="option2" value="2" /> <label id="p_option2" style="font-size:15px; "> 2, 1, 1</label> <br><br>
    <input type="radio" name="num1" id="option3" value="3" /> <label id="p_option3" style="font-size:15px; "> 2, 1, 4</label> <br><br>
    <input type="radio" name="num1" id="option4" value="4" /> <label id="p_option4" style="font-size:15px; "> 2, 2, 8</label> 
    
  </div>

  <div style="width:100%;text-align:center;">
  <div style="display:inline-block;"><button class="btn btn-lg btn-warning" onclick="showPrev()"><span class="glyphicon glyphicon-menu-left"></span> Prev</button></div>
  <div style="display:inline-block;"><button class="btn btn-lg btn-primary" onclick="fill_green()">Submit Response!</button></div>
  <div style="display:inline-block;"><button class="btn btn-lg btn-warning" onclick="showNext()">Next <span class="glyphicon glyphicon-menu-right"></span></button></div>
  </div>
<br>
<br>
</div>
</div>
<br>
<script>

document.getElementById("1").style.backgroundColor= "#428bca";
document.getElementById("1").style.color="#ffffff";
//document.getElementById("form1").onsubmit=function (){ return calculate_marks();};

/* for getting the xml file*/

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        setXml(xhttp);
    }
};
xhttp.open("GET", "ques-3.xml", false);
xhttp.send();

var attempted= new Array(31);

var answers= new Array(31);

var options= new Array(31);

var visited= new Array(31);


for(var d=1;d<31;d++)
{
  options[d]=new Array(5);
  for(var g=1;g<5;g++)
  {
    options[d][g]=false;
  }

}
var ans;

var mainxml;



var curr_ques=1;

for(var i=1;i<31;i++)
{
  attempted[i]=0;
  answers[i]=0;
  visited[i]=0;
}
function setXml(xml)
{
  mainxml=xml.responseXML;

  ans=mainxml.getElementsByTagName("answer");

}


function fill_green()
{

  
  options[curr_ques][1]=document.getElementById("option1").checked;
  options[curr_ques][2]=document.getElementById("option2").checked;
  options[curr_ques][3]=document.getElementById("option3").checked;
  options[curr_ques][4]=document.getElementById("option4").checked;
  for(var temp=1;temp<5;temp++)
  {
      if(options[curr_ques][temp]==true)
      {
        document.getElementById(curr_ques).style.backgroundColor= "#5cb85c";
        document.getElementById(curr_ques).style.color= "#ffffff";
        answers[curr_ques]=temp;
        attempted[curr_ques]=1;
        visited[curr_ques]=1;
        break;
      }
  }
      
}

function calculate_marks()
{
  var bol=confirm("Are You Sure Want to Submit The Quizz?");
  if(bol==true)
  {
  var dump;
  var total_score=0;
  for(var f=1;f<31;f++)
  {

    dump=ans[f].childNodes[0].nodeValue;
    if(dump==answers[f])
    {
      total_score++;
    }
  }

document.getElementById('tot_score').value=total_score;
return true;
}
else
{
  return false;
}

}

function calculate_marks_no_promt()
{
  var dump;
  var total_score=0;
  for(var f=1;f<31;f++)
  {

    dump=ans[f].childNodes[0].nodeValue;
    if(dump==answers[f])
    {
      total_score++;
    }
  }

document.getElementById('tot_score').value=total_score;

}


function myfunction(button_id)
{
  var ques_no=(button_id%31);
 
  curr_ques=ques_no;

   document.getElementById('id_question_no').innerHTML= "Question:"+curr_ques;

  var ques=mainxml.getElementsByTagName("ques_desc");
  var desc=ques[ques_no].childNodes[0].nodeValue;
  document.getElementById("question").innerHTML=desc;

/* for options */

/* for option1 */

  ques=mainxml.getElementsByTagName("option1");
  desc=ques[ques_no].childNodes[0].nodeValue;
  document.getElementById("p_option1").innerHTML=desc;


/* for option2 */


  ques=mainxml.getElementsByTagName("option2");
  desc=ques[ques_no].childNodes[0].nodeValue;
  document.getElementById("p_option2").innerHTML=desc;


/* for option3 */

  ques=mainxml.getElementsByTagName("option3");
  desc=ques[ques_no].childNodes[0].nodeValue;
  document.getElementById("p_option3").innerHTML=desc;


/* for option4 */

  ques=mainxml.getElementsByTagName("option4");
  desc=ques[ques_no].childNodes[0].nodeValue;
  document.getElementById("p_option4").innerHTML=desc;

  visited[ques_no]=1;


  if(attempted[ques_no]==0)
  {
    document.getElementById(ques_no).style.backgroundColor= "#428bca";
    document.getElementById(ques_no).style.color="#ffffff";
    document.getElementById("option1").checked = false;
    document.getElementById("option2").checked = false;
    document.getElementById("option3").checked = false;
    document.getElementById("option4").checked = false;

  }
  else
  {
    document.getElementById("option1").checked = options[ques_no][1];
    document.getElementById("option2").checked = options[ques_no][2];
    document.getElementById("option3").checked = options[ques_no][3];
    document.getElementById("option4").checked = options[ques_no][4];

  }

}


function showPrev()
{
  var d=curr_ques;
  if(d!=1)
  {
    d=d-1;
    myfunction(d);
  }
}

function showNext()
{
  var d=curr_ques;
  if(d!=30)
  {
    d=d+1;
    myfunction(d);
  }
}
 /* for timer */
var sec;
var min;
var end_time;
var start_time;
var remain_time;
var main_end_time;
var d=new Date();
main_end_time=d.getTime()+1800*1000;

window.setTimer=function()
{
    var timer=setInterval(function()
      {
        end_time=main_end_time;
        var curr_date= new Date();
        start_time=curr_date.getTime();
        remain_time=(end_time-start_time);
        sec=Math.floor((remain_time/1000)%60);
        min=Math.floor((remain_time/1000/60)%60);
    if(sec<=9)
    {
      document.getElementById("id_sec").innerHTML="0"+sec;
    }
    else
    {
      document.getElementById("id_sec").innerHTML=sec;
    }
    if(min<=-1)
    {
      alert("your exam has ended");
      document.getElementById("id_sec").innerHTML="00";
      document.getElementById("id_min").innerHTML="00";
      clearInterval(timer);
      calculate_marks_no_promt();
      document.getElementById("form1").submit();

    }
    
    if(min<=9)
    {
      document.getElementById("id_min").innerHTML="0"+min;
    }
    else
    {
      document.getElementById("id_min").innerHTML=min;
    }
      },1000);
  }

</script>
</body>
</html>