<?php

session_start();

unset($_SESSION["aid"]);

unset($_SESSION["username"]);

header("location:admin-login.html");

?>