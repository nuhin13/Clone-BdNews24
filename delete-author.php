<?php
	$id = $_REQUEST['id'];
	$conn= mysqli_connect("localhost", "root", "", "clone_bdnews24");
	 $result = mysqli_query($conn,"delete FROM author where Author_id=$id");
	 header('Location:ShowAllAuthor.php');
?>