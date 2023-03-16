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
</style>
<!--css end-->
</head>
<body>
<div class="body">
    <?php
    include ("db.php");
    $iden=$_SESSION['pid'];
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
                      <a class="dropdown-item" onclick="ask()" href="#ask">Ask Doctor.</a>
                      <a class="dropdown-item" href="viewstatus.php">View Apointment reply</a>
                      <a class="dropdown-item" href="viewanswers.php">View Replied Questions.</a>
                    </div>
                  </li>
                <li  class=" dropdown">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     What to do?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#depression">Learn about postnatal depression.</a>
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
<!--slider section start-->
<div class="slider my-auto">
      <!--slider-->
  <section>
    <div id="carouselExampleIndicators" class="carousel slide my-auto slidbody" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators"  data-slide-to="0" style="height:15px;width:15px;" class="idu active rounded-circle"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"  style="height:15px;width:15px;" class="idu rounded-circle"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"  style="height:15px;width:15px;" class="idu rounded-circle"></li>
    </ol>
    <div class="carousel-inner">



      <div  class="carousel-item active back1 p-1">
      <div class="my-auto ml-2 h-auto text-center justify-content-center">
        <div class="row text-center justify-content-center m-2">
            <img src="./assets/img/115446017-56a7be6a5f9b58b7d0ed7112.jpg" alt="" style="border: 2px solid #fff;" width="150px" height="150px" class="rounded-circle">
        </div>
          <div class="bg-darky p-3">
               <h6 class="color-white">
                The postnatal period is a critical phase in the lives of mothers and newborn babies.
                During this stage,Mothers need close monitoring by the society and more importantly the health workers.
                This requires mothers to physically visit the health centers to get both phsycological and physical
                services.However the sometimes end up going home unattended due to long queues or other factors.
                Mothers can now can book appointment by first loging in.
               </h6>
               <div class="row text-center justify-content-center d-flex">
                <a href="" class="btn m-2 btn-info">Login now</a>
                <a href="#register" class="btn m-2 btn-theme">Register</a>
               </div>
          </div>
      </div>
      </div>



      <div class="carousel-item back2">
        
      </div>
      <div class="carousel-item back3">
       
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    </section>
    <!--slider end-->  
</div>
<!--slider section end-->

<div id="home" class="mt-5">
    <!--about-->
    <section id="about">
        <div class="justify-content-center d-flex text-center">
            <div class="row">
                <div class="col-md-4">
<h2 class="color-blue">Who we are.</h2>
<p>
    The Outspan Hospital started operations with the establishment of an Out Patient Department on August 7, 2001. 
    A month later, the In Patient Department was opened with a capacity of 21 beds. Currently, the Out Patient Department
     has evolved into a one stop shop for all medical services expected of a national referral hospital. Despite the high
      cost of day to day operations and purchase and maintenance of modern medical equipment, The Outspan Hospital has retained
       very low rates in charges and fees. Some of the rates have never been reviewed since the facility opened its doors.

    Some of these hospital charges and fees have remained constant in order for us to live by our vision of providing affordable
     but high quality health care. This has been achieved while we invested in sophisticated and expensive medical equipment. 
     This is in keeping with the fast changing demands of our clients, modern technology and our status as a teaching hospital.
     However this site focuses more on postnatal services for all mothers around and away of the hospital.
</p>
<div class="row justify-content-center text-center">
    <h2 class="color-blue w-100 text-center">Our Faculty</h2>
<div class="col-md-4 text-center">
    <img src="./assets/img/cat.jpeg" alt="" width="150px" height="150px" class="rounded-circle">
    <h4 class="text-center">Manager</h4>
</div>
<div class="col-md-4">
    <img src="./assets/img/princi.jpeg" alt="" width="150px" height="150px" class="rounded-circle">
    <h4 class="text-center">Ass.Manager</h4>
</div>
<div class="col-md-4">
    <img src="./assets/img/donk.jpeg" alt="" width="150px" height="150px" class="rounded-circle">
    <h4 class="text-center">Chief Doc.</h4>
</div>
</div>
                </div>
                
                <div class="col-md-4">
<h2 class="color-blue">Our Mission</h2>
<p>
    To provide healthcare solutions and training through compassionate and personalized touch, pegged on critical thinking, innovations and appropriate technology.
</p>
<h2 class="color-blue">Our Vision</h2>  
<p>
    To become a global reference university training service-oriented professionals and providing affordable wholistic healthcare solutions.  
</p>             
<h2 class="color-blue">Our core values.</h2>
<h6>Outspan Hospital believes in a hospital community whose members:</h6>
<ul class="text-left">
    <li>Fear, trust and acknowledgement of God in all our transactions</li>
    <li> Integrity - Honesty, transparency and accountability to ensure that all our transactions shall stand the test of scrutiny</li>
    <li>Customer centric - focusing all our effort on meeting the needs of clients to ensure we provide wholistic healthcare solutions</li>
    <li>Quality - Ensuring quality and standards by doing the right things right the first time all the time</li>
    <li>Innovation - Seeking creative and innovative ways to overcome challenges</li>
    <li>Teamwork - to create a warm and motivating environment that enhances synergy</li>
    <li>Discipline & hardwork </li>
</ul>
</div>

                <div class="col-md-4 ">
<div class="imgbox rounded">
    <a href=""><img src="./assets/img/ask-a-doc.jpg" alt="" class="myimage rounded"></a>
   <a href="" style="color:white;"> <h6 class="mt-2">Alway feel free to consult us about anything cocerning your health.</h6></a>
</div>

<div class="imgbox rounded">
    <a href=""><img src="./assets/img/book-appointment.jpg" alt="" class="myimage rounded"></a>
   <a href="" style="color:white;"> <h6 class="mt-2">Book appointment with us.</h6></a>
</div>
                </div>
            </div>
        </div>
    </section>
    <!--about-end-->
<div class="justify-content-center d-flex text-center">
    <!--registration-->
<section id="register" data-scroll-reveal="enter from the bottom after 0.2s" class="mt-5 justify-content-center text-center">
    <h2 class="text-center">Help us help you through this period.Please enter your details below to register with us and start enjoying more of our services.</h2>
     <div class="row  justify-content-center text-center">
    <div class="col-md-8 justify-content-center text-center">
 <fieldset style="border: 2px solid blue;">
     <legend style="width: auto;"> Register </legend>
     <div class="wait overlay">
        <div class="loader"></div>
           </div>
           <div class="col-md-8 text-center" id="signup_msg">
                    <!--Alert from signup form-->
            </div>
     <form  onsubmit="return false" id="user_reg" class="form justify-content-center text-center">
        <input type="text"  class="flname m-3" name="fname" placeholder="First Name" >
        <input type="text"  class="flname m-3" name="lname" placeholder="Last Name" >
        <input type="number"  class="flname m-3" name="age" placeholder="Age" >
        <input type="email"  class="flname m-3" name="email" placeholder="Email eg. abzx23@...." >
        <input type="number"  class="flname m-3" name="mobile" placeholder="Phone eg. 07....." >
        <input type="password"  class="flname m-3" name="password" placeholder="Password" >
        <input type="password"  class="flname m-3" name="repassword" placeholder="Re-enter Password" >
       <div class="row justify-content-center text-center">
        <input type="submit"  class=" m-3 btn btn-success"  value="Submit" >
       </div>
       <a href="" class="mb-2 a-link">Already have an account? Login now.</a>
</form>
 </fieldset>
    </div>

    <div class="col-md-4 justify-content-center  text-center">
        <h3 class="color-blue"><a href="#depression" class="a-link">What causes postnatal depression?</a></h3>
     <img src="./assets/img/download (18).jfif" class="p-3" height="70%" width="97%" alt="">
     <cite>WHO</cite>
     <q>Many women feel a bit down, tearful or anxious in the first week after giving birth.

        This is often called the "baby blues" and is so common that it's considered normal.</q>
    </div>
    </div> 
</section>
<!--registration end-->
</div>

<div class="justify-content-center text-center">
    <!--content start-->
<section id="depression" class="mt-1">
    <div class="row mt-3 justify-content-center text-center">
    <div class="col-md-4">
<img src="./assets/img/images (2).jfif" class="rounded" width="98%" alt="">
<h2>What is postnatal depression?</h2>
<p>
Postnatal depression is a type of depression that many parents experience after having a baby.
It's a common problem, affecting more than 1 in every 10 women within a year of giving birth. It can also affect fathers and partners.
It's important to seek help as soon as possible if you think you might be depressed,
as your symptoms could last months or get worse and have a significant impact on you, your baby and your family.
With the right support, which can include self-help strategies and therapy, most women make a full recovery.</p>
    </div>

    <div class="col-md-4">
        <h4 class="color-blue"><u>Symptoms of postnatal depression.</u></h4>
        <ul type="square">
<li>Many women feel a bit down, tearful or anxious in the first week after giving birth.</li>
<br>
<li>This is often called the "baby blues" and is so common that it's considered normal.</li>
<br>
<li>The "baby blues" do not last for more than 2 weeks after giving birth.</li>
<br>
<li>If your symptoms last longer or start later, you could have postnatal depression.</li>
<br>
<li>Postnatal depression can start any time in the first year after giving birth.</li>
<br>
Signs that you or someone you know might be depressed include:
<br>
a persistent feeling of sadness and low mood
lack of enjoyment and loss of interest in the wider world
lack of energy and feeling tired all the time
trouble sleeping at night and feeling sleepy during the day
difficulty bonding with your baby
withdrawing from contact with other people
problems concentrating and making decisions
frightening thoughts – for example, about hurting your baby
Many women do not realise they have postnatal depression, because it can develop gradually.
        </ul>
    </div>

    <div class="col-md-4">
<h4 class="color-blue">Getting help for postnatal depression</h4>
<p>
Speak to a GP or your health visitor if you think you may be depressed.

Many health visitors have been trained to recognise postnatal depression and have techniques that can help.

If they cannot help, they'll know someone in your area who can.

Encourage your partner to seek help if you think they might be having problems.

Do not struggle alone hoping that the problem will go away.
</p>
<img src="./assets/img/newborn-baby.jpg" width="98%" class="rounded" alt="">
    </div>
</div>
</section>
<!--content end-->
</div>

<!--ask doctor start-->
<div class="justify-content-center text-center">
    <div class="row justify-content-center text-center  mt-2">

<div class="col-md-4 my-auto">
    <div class="imgbox rounded">
        <a href=""><img src="./assets/img/Outspan-Hospital-nyeri.jpg" width="100%" alt="" class="myimage rounded"></a>
       <a href="" style="color:white;"> <h6 class="mt-2">Our hospital,Nyeri Branch.</h6></a>
    </div>
</div>

<div class="col-md-4 my-auto">
    <div class="imgbox rounded">
        <a href=""><img src="./assets/img/About-omc.jpg" width="100%" alt="" class="myimage rounded"></a>
       <a href="" style="color:white;"> <h6 class="mt-2">Our Medical collage,Nyeri Branch.</h6></a>
    </div>
</div>

<div class="col-md-4">
<h2 class="text-center color-blue">Ask Doctor Now.</h2>
<div class="wait overlay">
<div class="loader"></div>
</div>
<div class="col-md-8 text-center" id="ask_msg">
                <!--Alert from signup form-->
</div>
<form  onsubmit="return false" id="ask" class="form justify-content-center text-center">
<input type="email" name="emaill" id="email" class="m-2 flname" placeholder="Email eg abz23@.....">
<input type="number" name="mobilee" id="mobile" class="m-2 flname" placeholder="Phone eg. 07.....">
<input type="password" name="password" id="mobile" class="m-2 flname" placeholder="Enter your enique security code">
<input type="password" name="repassword" id="mobile" class="m-2 flname" placeholder="Re-enter code">
<textarea name="question" id="" class="flname m-2" cols="5" rows="10" placeholder="Type your question here......."></textarea>
<input type="submit" class="btn btn-success" value="Ask" style="width: 50%;">
</form>
</div>

    </div>
</div>
<!--ask doctor end-->

</div>
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
    $("#user_reg").on("submit",function(event){
   event.preventDefault();
   $(".overlay").show();
   $.ajax({
      url : "user_reg.php",
      method : "POST",
      data : $("#user_reg").serialize(),
      success : function(data){
         $(".overlay").hide();
         if (data == "register_success") {
            window.location.href = "profile.php";
         }else{
            $("#signup_msg").html(data);
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