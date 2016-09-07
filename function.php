<?php

session_start();
mysql_connect("localhost","root","")or die();
mysql_select_db("rememberme")or die();

function logedin(){
	  if(isset($_SESSION['username'])|| isset($_COOKIES['username'])){
	  	$logedin=TRUE;
	  	return logedin;

	  }
}

?>