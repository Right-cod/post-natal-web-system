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
            <li ><a href="index.html">Home</a></li>
            <li ><a href="#about">About</a</li>
              <li  class=" dropdown">
                <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Book Appointment?
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" data-toggle="modal" href="#loginpopover">Send Appointment Message</a>
                  <a class="dropdown-item" onclick="ask()" href="#ask">Ask Doctor.</a>
                  <a class="dropdown-item" data-toggle="modal" href="#loginpopover">View Apointment reply</a>
                  <a class="dropdown-item" href="viewanswershome.php">View Replied Questions.</a>
                </div>
              </li>
                <li  class=" dropdown">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     What to do?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#depression">Learn about postnatal depression.</a>
                      <a class="dropdown-item" href="#ask">Ask Doctor.</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
            <li ><a href="#register"><i class="fas fa-user-plus"></i>Register?</a> </li>
            <li ><a href="#loginpopover" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Login?</a> </li>
        </ul>
    </div>
  </nav>
  <!-- </nav> -->
</div>
<!--main home end-->
<!--confirm section-->
<section class="justify-content-center text-center m-4">
<div class="row justify-content-center text-center">
  <div class="col-md-12 ">
  <div class="wait overlay">
        <div class="loader"></div>
           </div>
           <div class="col-md-12 text-center" id="check_msg">
                    <!--Alert from signup form-->
            </div>
    <form onsubmit="return false" id="viewanswer" class="form justify-content-center text-center">
    <input type="email" placeholder="Enter your email " name="email" class="flname w-100 m-2"></input>
    <input type="password" placeholder="Enter Security  code " name="password" class="flname w-100 m-2"></input>
    <input type="submit" value="View answers" name="check" class="btn btn-info w-100 m-3"></input>
    </form>
  </div>
</div>
<?php
include("check.php");
?>
</section>
<!--confirm section end-->

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
    $("#viewanswer").on("submit",function(event){
   event.preventDefault();
   $(".overlay").show();
   $.ajax({
      url : "check.php",
      method : "POST",
      data : $("#viewanswer").serialize(),
      success : function(data){
         $(".overlay").hide();
         if (data == "register_success") {
            window.location.href = "viewanswershome.php";
         }else{
            $("#check_msg").html(data);
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