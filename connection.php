<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "clone_bdnews24";

$connection=mysql_connect($servername,$username,$password) or die("couldnt connect to server");
mysql_select_db($dbname,$connection)or die("couldnt connect to database");

?>