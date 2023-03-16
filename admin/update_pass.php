<?php
session_start();
include "admindb.php";
if (isset($_POST["newpassword"])) {

	$u_name = $_POST["username"];
	$newpassword = $_POST['newpassword'];
	$repassword = $_POST['repassword'];
	$name = "/^[a-zA-Z ]+$/";

if(empty($newpassword) || empty($repassword)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
if(!preg_match($name,$u_name)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>this $u_name is not valid..!</b>
                </div>
            ";
            exit();
   }
	if(strlen($newpassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>New password is weak</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if($newpassword != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password does not match..!!</b>
			</div>
		";
	}
    $sql = "SELECT user_id FROM admin WHERE username ='$u_name' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
        $password = md5($newpassword);
        $sql ="update  admin set password='$password' where username='$u_name'";
        $_SESSION["uid"] = mysqli_insert_id($con);
        $_SESSION["name"] = $u_name;
        $ip_add = getenv("REMOTE_ADDR");
        if(mysqli_query($con,$sql)){
            echo "register_success";

            exit();
        }
        else{
            echo "<span style='color:red;'>username is incorrect..!!</span>";
            exit();
        }
	}
      else {
        echo "
        <div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>username not  available....! Try Another username</b>
        </div>
    ";
    exit();                                                        
          }                                                                                                                
	}
	
}



?>