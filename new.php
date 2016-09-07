<?php
include 'functions.php';
if(!logedin()){
	header("Location:login.php");
	exit();
}
?>

You are loggedin <p/>
<a href="logout.php">Log Out</a>