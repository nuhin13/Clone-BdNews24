<?php

session_start();
mysql_connect("localhost","root","")or die();
mysql_select_db("clone_bdnews24")or die();

function logedin(){
	  if(isset($_SESSION['username'])|| isset($_COOKIE['username'])){
	  	$loggedin=TRUE;
	  	return $loggedin;

	  }
}

?>