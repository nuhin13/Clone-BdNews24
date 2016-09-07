<?php  include("admin.php"); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "clone_bdnews24";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: ");
}

if(isset($_POST['submit'])){
	if($_POST['News_id']or die("failed")){
			//$username=mysql_real_escape_string($_POST['username']);
			  $News_id = $_POST['News_id'];
            $english_heading = $_POST['english_heading'];
            $english_description = $_POST['english_description'];
            $ctg=$_POST['ctg'];
            echo"$english_heading";
            echo"$ctg";
		}
}


?>
<!DOCTYPE html>
<html>
<head>
				<meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

			  
			

			         
</head>
<body>












		 <form action ="" method="POST" enctype="multipart/form-data" >

    
        <div class ="col-sm-2"></div>

    <div class ="col-sm-8">

        <div class="form-group">
            <label for="news_id" >News ID :</label>
            <input type="text" class="form-control" name="News_id" placeholder="News Id Should be Unique">
        </div>

        <!-- Search box Start -->
				<form>
				  <div class="well carousel-search hidden-phone">
				    <div class="btn-group">

				      <a  class="btn dropdown-toggle btn-select" data-toggle="dropdown"  href="#"> Category <span class="caret"></span></a>
				     
				      <ul class="dropdown-menu" >

				       
				        <?php
						$result = mysqli_query($conn,"SELECT * FROM category"); 
						while($row = mysqli_fetch_array($result))
						{
							//echo '<li><a href="#">$row['category_name']</a></li>' ;
							echo '<li>' . '<a href="#" id=>' .$row['category_name'] .  '</li>';
							
							
						} 

						?>
				       </ul>
				        
				        
				    </div>
				    
				   
				     <div class="form-group">
                <label for="english_heading">News Heading in English :</label>
                <textarea class="form-control" rows="2" name="english_heading"></textarea>
          </div>

          <div class="form-group">
                <label for="english_description">News Description in English:</label>
                <textarea class="form-control" rows="7" name="english_description"></textarea>
          </div>

          

                <table class="table table-bordered table-striped" id="fieldsWrapper">
        

          <input type="file" data-filename-placement="inside" name="image_input">
          
          </p> 
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                
          </p>


     

</div>
				</form>
				//<!-- Search box End -->
                                  
				<script >
									$(".dropdown-menu li a").click(function(){
				  var selText = $(this).text();
				  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
				});

				$("#btnSearch").click(function(){
					alert($('.btn-select').text()+", "+$('.btn-select2').text());
				});	

				</script>



      

</body>
</html>