<!DOCTYPE html>
<html>
<head>
  	<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
  	<meta charset='UTF-8'/>
  	
</head>
<body>

<?php

	include("admin.php");

	$servername = "localhost";
   	$username = "root";
    $password = "";
    $dbname= "clone_bdnews24";




// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
	if (!$conn) {
    	die("Connection failed: ");
	}


	if(isset($_POST['delete'])){

		//$id= $_POST['id'] ;

		$sql2 = "DELETE FROM news WHERE news_id='$_POST[id]'";

		//mysql_query($sql2, $conn);

		if (mysqli_query($conn, $sql2)) {
   		 	//echo "Record deleted successfully";
			$_POST['delete']="";
		} else {
   		 	echo "Error deleting record: " . mysqli_error($conn);
		}
	}
	echo '<div class ="col-sm-1"></div>

	<div class ="col-sm-10">';


	$result = mysqli_query($conn,"SELECT * FROM news");

	echo "<table border='1'>
	<tr>
		<th>News id</th>
		<th>Author id</th>
		<th>Category id</th>
		<th>Date and Time</th>
		<th>English Heading</th>
		<th>English Description</th>
		<th>Bangla Heading</th>
		<th>bangla Description</th>
		<th>image</th>
	
		<th>Action</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<form action ='' method='POST'>";
		echo "<tr>";
			echo "<td>" . "<input type=text name =id value=" . $row['news_id'] . " </td>";
			echo "<td>" . $row['author_id'] . "</td>";
			echo "<td>" . $row['category_id'] . "</td>";
			echo "<td>" . $row['date_time'] . "</td>";
			echo "<td>" . $row['english_heading'] . "</td>";
			echo "<td>" . $row['english_description'] . "</td>";
			echo "<td>" . $row['bangla_heading'] . "</td>";
			echo "<td>" . $row['bangla_description'] . "</td>";
			echo "<td>" . $row['image_name'] . "</td>";
			echo "<td> <img src='data:image/png;base64, base64_encode(".$row['image'].") /> </td>";


				$result_image_id = mysqli_query($conn,"SELECT image FROM news WHERE news_id = '{$row['news_id']}'");
				$row_image = mysqli_fetch_array($result_image_id);
				//$result_image = mysqli_query($conn,"SELECT image FROM news WHERE news_id = '{$row_image['news_id']}'");


				//$row_2 = mysqli_fetch_array($result_image);
				$content=$row['image'];
				echo "<td>" ;
				echo '<img src="data:image/png;base64,' . base64_encode($content) . '" />';
				echo "</td>";
				echo "</tr>";
			//echo "<td>
			//	 '<img height="20" width="20" src="data:image;base64,'.$row[2].' "> ';
			//	</td>";




			//echo "<td>" . $row['bangla_description'] . "</td>";
			//echo "<td>" . "<img> src=". $row['image'] . "></img>"  "</td>";

			echo "<td>" . "<input type=submit class='btn btn-primary' name=delete value=delete" . " </td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>"; 

	echo '</div>';
	/*$sql = "SELECT news_id FROM news";
	$result2 = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
	} else {
    	echo "0 results";
	}*/
	
	

	mysqli_close($conn);
	
?>  

</body>
</html>