<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["pid"])){
	header("location:index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Outspan Hospital(Nyeri) Post-natal Services</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="icon" href="../assets/img/images (3).jfif" type="image/icon type">
<!--Bootstrap CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<!--owl coursel cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"  />
<!--custom font-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
<!--Cutom css-->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="../pogo-slider.min.css">
<link rel="stylesheet" href="style.css">
<style rel="stylesheet" type="text/css">
.bodyt{
      margin:7%;
      padding:2%;
      min-height:1000000px;
      background-color: rgb(236, 138, 10);
      border-radius:30px;
  }
  .sendrow{
      float:left;
      width:50%;
      min-height:60px;
      border-top-left-radius:50px;
      border-bottom-left-radius:50px;
      border-top-right-radius:70px;
      color:white;
      padding:2px;
  }
  .receiverow{
      float:right;
      width:50%;
      min-height:60px;
      border-top-right-radius:50px;
      border-bottom-right-radius:50px;
      border-bottom-left-radius:70px;
      color:#000;
      padding:2px;
  }
</style>
<!--css end-->
</head>
<body>
<div class="body">
<?php
    include ("db.php");
    $iden=$_SESSION['pid'];
    $name=$_SESSION['pname'];
    $sql=mysqli_query($con,"SELECT * FROM user_info where user_id=$iden");
    $row=mysqli_fetch_array($sql);
    ?>
    <input type="text" hidden id="id" value="<?php echo $row['email']; ?>">
    <input type="text" hidden id="mob" value="<?php echo $row['mobile']; ?>">
     <!--main home start-->
<div id="main-home">
    <div class="container-fluid m-2 flex">
<div class="row d-flex">
<div class="col-md-4">
    <img src="./assets/img/logo.png" class="image" alt="">
</div>
<div class="col-md-4 text-center my-auto">
    <h2 class="color-blue"> <u> POSTNATAL</u><u class="color-maroon" >CLINIC</u></h2>
    <h5 >APPOINTMENT BOOKING.</h5>
</div>
<div class="col-md-4 my-auto ml-auto float-right">
    <h5 class="text-center">Contact us:+254792536717</h5>
</div>
</div>
    </div>
    <!--navbar-->
<nav class="navbar navbar-expand-lg sticky-top my-auto p-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>Menu
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="menu">
            <li ><a href="profile.php">Home</a></li>
            <li ><a href="#about">About</a</li>
             <li  class=" dropdown">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Book Appointment?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="book.php">Send Appointment Message</a>
                      <a class="dropdown-item" onclick="ask()" href="profile.php#ask">Ask Doctor.</a>
                      <a class="dropdown-item" href="viewstatus.php">View Apointment reply</a>
                      <a class="dropdown-item" href="viewanswers.php">View Replied Questions.</a>
                    </div>
                  </li>
                <li  class=" dropdown">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     What to do?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="profile.php#depression">Learn about postnatal depression.</a>
                      <a class="dropdown-item" onclick="ask()" href="profile.php#ask">Ask Doctor.</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
            <li ><a><i class="fas fa-user"></i> <?php echo "Hi,".$_SESSION["pname"]; ?></a> </li>
            <li ><a href="logout.php"><i class="fas fa-users-cog"></i> Logout?</a> </li>
        </ul>
    </div>
  </nav>
  <!-- </nav> -->
</div>
<!--main home end-->
<!--book section-->
<section class="justify-content-center text-center" id="status">
    <div class="bodyt">   
<p style="color:white;">Outspan Q/A page.We put you safety and health first..</p>
<?php
$email=$row['email'];
$sq=mysqli_query($con,"SELECT * FROM questions WHERE email='$email' ORDER BY date ASC  ");
while ($wer=mysqli_fetch_array($sq)){
  $received=$wer['reply_message'];
  $replied=$wer['date_replied'];
  $sent=$wer['date'];
?>
<!--send-->
<div class="row float-left m-2 w-100">
<div class="w-50 mr-auto bg-dark sendrow">
<p style="width:auto;padding:15px;"><?php echo $wer['question'];?></p>
<p style="text-align:left;padding-left:15px;color:yellow;"><?php echo "$sent";?></p>
</div>
</div>
<!--send end-->
<div class="w-100"></div>
<!--receive-->
<div class="row float-right m-2 w-100">
<div class="w-50 ml-auto bg-light receiverow">
<p style="width:auto;padding:15px;"><?php echo "Dear $name, $received ";?></p>
<p style="text-align:right;padding-right:15px;color:blue;"><?php echo "$replied";?></p>
</div>
</div>
<!--receive end-->
<?php
}
?>
    </div>
</section>
<!--booking end-->
<!--footer-->
<section id="footer" id="footer" class="p-3 text-center justify-content-center bg-dark">
    <h2 class="color-white">Contact us:</h2>
    <hr class="hr">
    <div class="row justify-content-center text-center ">
      <div class="col-md-4 text-center">
    <h5 class="sub">Call us:</h5>
    <div class="tels">
    <p class="fa fa-phone"> +2547 95 62 7968</p>
    <p>or</p>
    <p class="fa fa-phone"> +2547 92 53 6717</p>
    </div>
    <h5 class="sub mt-3">Email us:</h5>
    <marquee behavior="scroll" direction="left">outspankenya@gmail.com <b style="color:cyan;">or</b> outspannyeribranch@gmail.com</marquee>
      </div>
    
      <div class="col-md-4 text-center justify-content-center">
    <h5 class="sub">Follow us:</h5>
     <div class="row text-center justify-content-center" >
     <img src="./assets/img/insta.jpeg" width="50px" class="rounded-circle " alt="">
     </div>
     <a href="">Outspan.254</a>
     <div class="row text-center mt-1 justify-content-center" >
     <img src="./assets/img/twitter.png" width="50px" class="rounded-circle " alt="">
     </div>
     <a href="">Outspan.254</a>
     <div class="row text-center mt-1 justify-content-center" >
     <img src="./assets/img/fb.png" width="50px" class="rounded-circle " alt="">
     </div>
     <a href="">Outspan.254</a>
      </div>
    
      <div class="col-md-4 text-center">
    <h5 class="sub">Location</h5>
    <p class="fas fa-map-marker-alt"></p>
    <p>NYERI – KAMAKWA ROAD,</p>
    <p>KAMAKWA, </p>
    <p>NYERI, KENYA.</p>
      </div>
    </div>
</section>
<!--footer end-->
</div>
</body>
</html>
<script>
    //user register
    $("#book").on("submit",function(event){
   event.preventDefault();
   $(".overlay").show();
   $.ajax({
      url : "book_now.php",
      method : "POST",
      data : $("#book").serialize(),
      success : function(data){
         $(".overlay").hide();
         if (data == "register_success") {
            window.location.href = "book.php";
         }else{
            $("#book_msg").html(data);
         }
         
      }
   })
})
    //user register end
    //ask start
$("#ask").on("submit",function(event){
   event.preventDefault();
   $(".overlay").show();
   $.ajax({
      url : "ask.php",
      method : "POST",
      data : $("#ask").serialize(),
      success : function(data){
         $(".overlay").hide();
         if (data == "register_success") {
            window.location.href = "profile.php";
         }else{
            $("#ask_msg").html(data);
         }
         
      }
   })
})
//ask end

//set details
function ask(){
    var email=document.getElementById("id").value;
    var mobile=document.getElementById("mob").value
    document.getElementById("email").value=email;
    document.getElementById("mobile").value=mobile;
}
</script>
<script src="script.js"></script>
<script src="js/vendor/jquery-1.11.1.min.js"></script>
<script src="../jquery.pogo-slider.min.js"></script>
  <!--bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>