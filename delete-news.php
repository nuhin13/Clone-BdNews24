<?php
	$id = $_REQUEST['id'];
	$conn= mysqli_connect("localhost", "root", "", "clone_bdnews24");
	 $result = mysqli_query($conn,"delete FROM news where news_id=$id");
	 header('Location:ShowAllNews.php');
?>