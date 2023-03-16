<?php
include "admin_db.php";
session_start();
if (isset($_POST["u_name"])) {

	$u_name = $_POST["u_name"];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$name = "/^[a-zA-Z ]+$/";

if(empty($u_name) || empty($password) || empty($repassword)){
		
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
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
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
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>password is not same</b>
			</div>
		";
	}
	//existing email address in our database
	$sql = "SELECT user_id FROM admin WHERE username ='$u_name' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>username is already available Try Another username</b>
			</div>
		";
		exit();
	} else {
		$password = md5($password);
		
		$sql = "insert into admin (username,password,question1,answer1,question2,answer2) VALUES ('$u_name','$password','notset','notset','notset','notset')";
		$_SESSION["id"] = mysqli_insert_id($con);
		$_SESSION["name"] = $u_name;
		$ip_add = getenv("REMOTE_ADDR");
		if(mysqli_query($con,$sql)){
			echo "register_success";

			exit();
		}
	}
	}
	
}



?>






















































