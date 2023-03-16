<?php
session_start();
include "admindb.php";
if (isset($_POST["username"])) {

	$u_name = $_POST["username"];
	$question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
	$answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
	$name = "/^[a-zA-Z ]+$/";

if(empty($answer1) ||empty($answer2)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		$sql ="update  admin set question1='$question1', answer1='$answer1', question2='$question2', answer2='$answer2' where username='$u_name'";
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $u_name;
		$ip_add = getenv("REMOTE_ADDR");
		if(mysqli_query($con,$sql)){
			echo "register_success";

			exit();
		}
	}
	}
?>