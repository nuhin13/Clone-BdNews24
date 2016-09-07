<?php include('connection.php');?>
<?php
	$id = $_REQUEST['id'];
	
	 $result = mysql_query("delete FROM category where category_id=$id");
	 header('Location:ShowAllCategory.php');
?>