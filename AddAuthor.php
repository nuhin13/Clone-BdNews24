
<?php  include("admin.php"); ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "clone_bdnews24";


if(isset($_POST['submit'])){
    $flag = 1;

   
    $author_name=$_POST['Author_name'];
    $author_email = $_POST['Author_email'];
    $author_phone = $_POST['Author_phone'];
   


    $conn=mysqli_connect($servername, $username, $password,$dbname)or die("connection failed");

    $check= mysqli_query($conn , "SELECT * FROM author")or die("sql failed");
     
      while($row = mysqli_fetch_array($check))
          {
              if($author_name == $row['Author_name'] && $author_email == $row['Email'] && $author_phone == $row['Phone']){
                  $flag = 0;
              }
          }

  

    if($flag == 1){
      
        
       $result=mysqli_query($conn,"INSERT INTO author (Author_id,Author_name,Email,Phone) VALUES (NULL,'{$author_name}','{$author_email}','{$author_phone}')")or die("failed");
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

    }
    else{
      echo "<script type='text/javascript'>alert('The name is already included..')</script>";
      
    }

}

?>
<!DOCTYPE html>
<html>
<head>
		    <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

</head>
<body>
	



	<form action ="" method="POST" enctype="multipart/form-data" >

    
        <div class ="col-sm-2"></div>

    <div class ="col-sm-8">

        

        <!-- Search box Start -->
				<form>
				  <div class="well carousel-search hidden-phone">
				    
				     
				    
				    <div class="form-group">
                <label for="english_heading">Author Name :</label>
                <textarea class="form-control" rows="1" name="Author_name"></textarea>
          </div>

          <div class="form-group">
                <label for="english_description">E-mail Id:</label>
                <textarea class="form-control" rows="1" name="Author_email"></textarea>
          </div>

	          
		      <div class="form-group">
                <label for="english_description">Phone Number:</label>
                <textarea class="form-control" rows="1" name="Author_phone"></textarea>
          </div>
	         
        
          </p> 
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Author</button>
                
          </p>


				    <div >
				      
				    </div>
				  </div>
				</form>
				<!-- Search box End -->
                                  
			



         
      </form>

</div>

</body>
</html>