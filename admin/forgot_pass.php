<?php
include "admin_db.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 
if(isset($_POST["username"]) && isset($_POST["answer1"])){
	$username = mysqli_real_escape_string($con,$_POST["username"]);
	$question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
	$answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
	$sql = "SELECT * FROM admin WHERE username = '$username' and question1='$question1' and answer1='$answer1'and question2='$question2' AND answer2 = '$answer2'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	//if user record is available in database then $count will be equal to 1
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["username"] = $row["username"];
		$ip_add = getenv("REMOTE_ADDR");
			//if user is login from page we will send login_success
			echo "login_success";
			exit();
		}else{
			echo "<span style='color:red;'>Credentials are incorrect..!!</span>";
			exit();
		}
	
}

?>