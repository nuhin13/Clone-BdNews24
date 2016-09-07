<?php  include("admin.php"); ?>
<?php include("connection.php");
 date_default_timezone_set("Asia/Dhaka");
 //$date = date('mm/dd/yyyy');
 $timezone=date('H:i:s');

?>
<!DOCTYPE html>
<html>
<head>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

			         
</head>
<body>



<?php
		

		// Create connection
		
		
if(isset($_POST['submit'])){
	
			//$username=mysql_real_escape_string($_POST['username']);
			 // $News_id = $_POST['News_id'];
			  
			 $author_id=$_POST['Author'];
			 $category_id=$_POST['Category'];
             $english_heading = $_POST['english_heading'];
             $english_description = $_POST['english_description'];
             $date=$_POST['date'];     
             $topnews=$_POST['news'];     
             $time=$_POST['time']; 
	
		 if(getimagesize($_FILES['image_input']['tmp_name']) == FALSE)
                      {
                          echo "Please select an image.";
                      }
                      else
                      {
                              $filetmp = $_FILES["image_input"]["tmp_name"];
						      $filename = $_FILES["image_input"]["name"];
						      $filetype = $_FILES["image_input"]["type"];
						      $filepath = "photo/".$filename;
      
      						move_uploaded_file($filetmp,$filepath);

       		$result= mysql_query( "INSERT INTO news (news_id, author_id, category_id, english_heading, english_description,image_name,image_path,date_time,top_news,time) VALUES (NULL, '{$author_id}', '{$category_id}', '{$english_heading}', '{$english_description}', '{$filename}', '{$filepath}', '{$date}', '{$topnews}', '{$time}')");
          //$result= mysqli_query($conn , "INSERT INTO news (news_id, author_id, category_id) VALUES ('{$news_id}', '{$author_id}', '{$category_id}')");
           
           if(!$result){
             echo "<script type='text/javascript'>alert('Doesn't add to Database...')</script>"; 


           }else {
            // mail('nasif.cse12@gmail.com', 'registration', 'confirmation','From:riyadhaxiom@gmail.com')or die("can't send mail");
            

           echo "<script type='text/javascript'>alert('Successfully add to Database...')</script>"; 

                      }

          }

}





// Check connection

		 echo'<form action ="" method="POST" enctype="multipart/form-data" >

    
         <div class ="col-sm-2"></div>

         	<div class ="col-sm-8">

       
        <!-- Search box Start -->
				
				  <div class="well carousel-search hidden-phone">
				    <div class="btn-group">
				      <ul class="dropdown-men" > <select name = "Category" >';

						$result = mysql_query("SELECT * FROM category"); 
						while($row = mysql_fetch_array($result))
						{
							//echo '<li><a href="#">$row['category_name']</a></li>' ;
							echo '<option value="'.$row['category_id'].'"><li>' . '<a href="#" id=>' .$row['category_name'] .  '</li></option>';
							
							
						} 
	
				        echo '</select></ul>
				        <input type="hidden" class="form-control" name="ctg" >
				    </div>
				    
				    <ul class="dropdown-men" > <select name = "Author">';

				        //echo <li><a href="#">Politcis</a></li>
				        //echo <li><a href="#">Sports</a></li>
				        //echo <li><a href="#">Others</a></li>
						$result = mysql_query("SELECT * FROM author"); 

						while($row = mysql_fetch_array($result))
						{
							//echo '<li><a href="#">$row['category_name']</a></li>' ;
							echo '<option value="'.$row['Author_id'].'"><li>' . '<a href="#" id=>' .$row['Author_name'] .  '</li></option>';
							
							
						} 

						
				        echo '</select></ul>
				   </div>
				   
				   			
				   <div class="form-group">
		                <label for="date">Date</label>
		                <input type="date" class="form-control" rows="7"  name="date" >
		          </div>

		           <div class="form-group">
		                <label for="time">Time</label>
		                <input type="time" class="form-control" rows="7"  name="time"  value="'."$timezone".'">
		          </div>


				   <div class="form-group">
		                <label for="english_heading">News Heading in English :</label>
		                <textarea class="form-control" rows="2" name="english_heading" ></textarea>
		   			</div>

		          <div class="form-group">
		                <label for="english_description">News Description in English:</label>
		                <textarea class="form-control" rows="7" name="english_description"></textarea>
		          </div>
		          <div class="form-group">
		                <input type="radio" name="news" value="true">topnews<br>
						<input type="radio" name="news" value="false">generalnews
		          </div>


          

                <table class="table table-bordered table-striped" id="fieldsWrapper">
        

          <input type="file" data-filename-placement="inside" name="image_input">
          
          </p> 
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                
          </p>


     

</div>
				</form>';


				//<!-- Search box End -->
 ?>                                 
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