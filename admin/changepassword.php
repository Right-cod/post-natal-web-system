<?php
session_start();
include "admindb.php";
if (isset($_POST["username"])) {

	$u_name = $_POST["username"];
	$newpassword = $_POST['newpassword'];
	$repassword = $_POST['repassword'];
	$name = "/^[a-zA-Z ]+$/";

if(empty($u_name) ||empty($newpassword) || empty($repassword)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
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
	else {
		$password = md5($newpassword);
		$sql ="update  admin set password='$password' where username='$u_name'";
		$_SESSION["uid"] = mysqli_insert_id($con);
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