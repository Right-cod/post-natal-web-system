<?php
session_start();
include "admindb.php";
if (isset($_POST["username"])) {
    
    $password = md5($_POST["password"]);
    $newusername= $_POST['newusername'];
    $name = "/^[a-zA-Z ]+$/";
    if(empty($newusername)){  
        echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
            </div>
        ";
        exit();
    } else {
        if(!preg_match($name,$newusername)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>this $newusername is not valid..!</b>
                </div>
            ";
            exit();
        }
   else {
        $sql = "update  admin set username='$newusername' where password='$password'";
        $_SESSION["uid"] = mysqli_insert_id($con);
        $_SESSION["name"] = $username;
        $ip_add = getenv("REMOTE_ADDR");
        if(mysqli_query($con,$sql)){
            echo "register_success";
            exit();
        }
    }
    }

	
}
?>
