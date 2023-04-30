<?php
//this is to start the session so, session can be executed
session_start();

//this will delete the username variable info
unset($_SESSION['name']);

//displaying a success message of logged out
$_SESSION['success'] = "You are now logged out!!";

//this will redirect the user to login page
header("Location: /index.php");

?>