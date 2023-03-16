<?php
require "../config/constants.php";
session_start();
if(!isset($_SESSION["aid"])){
	header("location:admin-login.html");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
    <title>Outspan Hospital</title>
    <link rel="icon" href="../assets/img/icon.jpg" type="image/icon type">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="navstyle.css">
  <style>
      table{
    text-align: center;
    width: 95%;
    font-size: larger;
    padding-left:10px;
}
table,th,td{
    border: 1px solid black;
}
.btn-themee:hover{
  color: #ffffff;
  box-shadow: 0px 0px 0px 4px rgba(255,0,70,0.5),0px 0px 0px 7px rgba(255,0,70,0.3);
}
.btn-themee{
  background-color: #FF004D;
  padding: 5px 20px;
  width:90%;
  height:70%;
  color: #ffffff;
}
.edit{
    width: 90%;
  border-color:skyblue;  
  border-radius:10px;
}
.edit:hover{
border-color:#ff00d4;  
}
  </style>
</head>

<body>
<!--navigation bar start-->
<div class="wrapper">
<?php include('navbar.php'); ?>
    <div class="main_content">
        <div class="header"> Hi,Welcome back <?php echo "".$_SESSION["username"]; ?></div>  
        <h1 class="text-center">React to Appointments</h1>
        <!--edit start-->
        <div class="altdel justify-content-center text-center">
    <div id="disp_data">
    
    </div>
</div>
        <!--edit end-->
    </div>
</div>
<!--navigation bar end-->
</body>

</html>
<!--edit script start-->
<!--alter script start-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
disp_data();
function disp_data()
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","update.php?status=disp",false);
    xmlhttp.send(null);
    document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
}
function aa(a)
{
   replyid="reply"+a;
   txtreplyid="txtreply"+a;
   var reply=document.getElementById(replyid).innerHTML;
   document.getElementById(replyid).innerHTML="<input class='edit' type='text' value='"+reply+"' id='"+txtreplyid+"'>";
   
   postedid="posted"+a;
   txtpostedid="txtposted"+a;
   var posted=document.getElementById(postedid).innerHTML;
   document.getElementById(postedid).innerHTML="<input type='date' style='width:100%;' id='"+txtpostedid+"'>";

   timeid="time"+a;
   txttimeid="txttime"+a;
   var time=document.getElementById(timeid).innerHTML;
   document.getElementById(timeid).innerHTML="<input type='time' style='width:100%;' id='"+txttimeid+"'>";

   updateid="update"+a;
   document.getElementById(a).style.visibility="hidden";
    document.getElementById(updateid).style.visibility="visible";
}
function bb(b){

var replyid="txtreply"+b;
var reply=document.getElementById(replyid).value;

var postedid="txtposted"+b;
var posted=document.getElementById(postedid).value;

var timeid="txttime"+b;
var time=document.getElementById(timeid).value;

update_value(b,reply,posted,time);


document.getElementById(b).style.visibility="visible";

document.getElementById("update"+b).style.visibility="hidden";


document.getElementById("reply"+b).innerHTML=reply;
document.getElementById("posted"+b).innerHTML=posted;
document.getElementById("time"+b).innerHTML=time;
}
function update_value(id,reply,posted,time){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","update.php?id="+id+"&reply="+reply+"&posted="+posted+"&time="+time+"&status=update",false);
    xmlhttp.send(null); 
}
</script> 
<!--alter  end-->
<!--delete script-->
<script type="text/javascript">
function delete1(id){
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","update.php?id="+id+"&status=delete",false);
    xmlhttp.send(null); 
    disp_data();
}
</script>
<!--delete script-->
<!--edit script end-->
<!--custom script-->
<script src="script.js">
</script>
<!--custom script-->
<!--Bootstrap script-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<!--Bootstrap script end-->
