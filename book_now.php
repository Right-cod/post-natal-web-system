<?php
require './includes/PHPMailer.php';
require './includes/SMTP.php';
require './includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//
session_start();
include "db.php";
if (isset($_POST["email"])) {
    $id=$_POST['id'];
    $time=date("d-m-Y h:i:sa");
	$email = $_POST['email'];
	$date = $_POST['date'];
	$dat=strtotime($date);
	$lst=date("d-m-Y",$dat);
	$der=strtotime($lst);
	$age=ceil((time()-$der)/60/60/24);
    $department = $_POST['department'];
    $mobile = $_POST['mobile'];
	$message = $_POST['message'];
	$name = "/^[a-zA-Z]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($email) || empty($message) ||empty($mobile)||empty($date)){
		
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
else {
		$sql = "INSERT INTO `appointment` 
		(`id`, `user_id`, `email`, `mobile`, `department`, `child_age`,  
		`message`, `application_day`, `reply`, `posted`, `reply_day`, `time_posted`,`pay_status`) 
		VALUES (NULL, '$id', '$email', '$mobile', 
		'$department','$age Days', '$message','$time','Your reply is Pending...','','','','paid')";
		if(mysqli_query($con,$sql)){
			header("Location:MpesaProcessor.php?phone=$mobile");
			//
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "denohkim12@gmail.com";
//Set gmail password
$mail->Password = "deniskim4882";
//Email subject
$mail->Subject = "OUTSPAN POSTNATAL CARE";
//Set sender email
$mail->setFrom('denohkim12@gmail.com','OUTSPAN');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "
<h1 style='color:cyan;'>POST NATAL CLINIC BOOKING</h1></br>
<p>
	This is to inform you that you successfully booked a post natal clinic.Please keep checking in our website to see the posted date.
</p>";
//Add recipient
$mail->addAddress($email,$email);
if ( $mail->send() ) {
	//echo "email_success";
}
//Closing smtp connection
$mail->smtpClose();

			//
			exit();
		}
	}
	}
	
}



?>