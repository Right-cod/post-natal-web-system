
<?php
require "../config/constants.php";
session_start();
if(!isset($_SESSION["aid"])){
	header("location:admin-login.html");
}
?>
<!Doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Outspan hospital</title>
    <link rel="icon" href="../assets/img/icon.jpg" type="image/icon type">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="navstyle.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
	
		<script src="admin_main.js"></script>
  <style>
    .form form input{
  margin-bottom: 20px;
  border:none;
  border-bottom:2px solid blue;
  background:transparent;

}
form{
  padding: 10px 30px 50px 30px;
}
form .field{
  height: 40px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .content{
  display: flex;
  width: 100%;
  height: 5px;
  font-size: 16px;
  align-items: center;
  justify-content: space-around;
}
form .content .checkbox{
  display: flex;
  align-items: center;
  justify-content: center;
}
form .content input{
  width: 15px;
  height: 15px;
  background: red;
}
form .content label{
  color: #262626;
  user-select: none;
  padding-left: 5px;
}
form .content .pass-link{
  color: "";
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  transition: all 0.3s ease;
}
form .field input[type="submit"]:active{
  transform: scale(0.95);
}
form .signup-link{
  color: #262626;
  margin-top: 20px;
  text-align: center;
}
form .pass-link a,
form .signup-link a{
  color: #4158d0;
  text-decoration: none;
}
form .pass-link a:hover,
form .signup-link a:hover{
  text-decoration: underline;
}
legend{
font-style:italic;
}
  </style>
</head>

<body>
<!--navigation bar start-->
<div class="wrapper">
<?php include('navbar.php'); ?>
    <div class="main_content">
        <div class="header"> Hi,Welcome back <?php echo "".$_SESSION["username"]; ?></div>  
        <h1 class="text-center">Admin Profile Page</h1>
        <div class="row justify-content-center text-center" >
        <div class="col-md-4">
      <a href="admin-profile.php">Go back</a>
        </div>
        <div class="col-md-4">
        <div class="wait overlay1">
      	<div class="loader"></div>
        </div>
          <fieldset>
            <legend>Change Username</legend>
            <div class="container-fluid">
            <div class="panel-footer" id="e_msg"></div> 
            <div class="panel-footer" id="signup_msg"></div>
          	<form id="change_user_form" onsubmit="return false" >
                <div class="field">
                  <input type="text" name="username"  id="u_name" required  class="form-control"> 
                  <label>Username</label>
                </div>
                <div class="field">
                  <input type="password" name="password" id="password" required  class="form-control"> 
                  <label>Password</label>
                </div>
        <div class="field">
                  <input type="text" name="newusername" id="newpassword" required  class="form-control"> 
                  <label>New username</label>
                </div>
        <div class="content">
             
        </div>
        <div class="field">
                  <input type="submit" value="Update" >
                </div>
        </form>
          </fieldset>
        </div>
        <div class="col-md-4">
        
        </div>
        </div>
    </div>
</div>
<!--navigation bar end-->
</body>

</html>
<!--custom script-->
<script>
  $(document).ready(function(){
	//change username
	$("#change_user_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay1").show();
		$.ajax({
			url	:	"admin_login.php",
			method:	"POST",
			data	:$("#change_user_form").serialize(),
			success	:function(data){
				if(data == "login_success"){
						event.preventDefault();
						
						$.ajax({
							url : "changeusername.php",
							method : "POST",
							data : $("#change_user_form").serialize(),
							success : function(data){
								$(".overlay1").hide();
								if (data == "register_success") {
									window.location.href = "admin-profile.php";
								}else{
									$("#signup_msg").html(data);
								}
								
							}
						})
					
				}else{
					$("#e_msg").html(data);
					$(".overlay1").hide();
				}
			}
		})
	})
//change username end

})
  
</script>
<script src="script.js">
</script>
<!--custom script-->
<!--Bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<!--Bootstrap script end-->