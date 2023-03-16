<?php
session_start();
include "db.php";
if (isset($_POST["emaill"])) {

	$email = $_POST['emaill'];
    $mobile = $_POST['mobilee'];
    $question = $_POST['question'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
    $time=date("d-m-Y h:i:sa");
	$name = "/^[a-zA-Z]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($email) ||empty($mobile) || empty($question)||empty($password) || empty($repassword)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$password) || !preg_match($number,$repassword)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>The code must be a digit. eg 3456</b>
			</div>
		";
		exit();
	}
	if(!(strlen($password) ==4) || !(strlen($repassword) ==4)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Code number must be 4 digit</b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Code does not match</b>
			</div>
		";
	}
	else {
		$password=md5($password);
		$sql = "INSERT INTO `questions` 
		(`id`, `email`, `mobile`,`password`, `question`, `date`, `reply_message`, `date_replied`) 
		VALUES (NULL, '$email', '$mobile','$password', '$question', '$time','Pending reply.....','')";
		if(mysqli_query($con,$sql)){
			echo "register_success";
			exit();
		}
	}
	}
	
}



?>