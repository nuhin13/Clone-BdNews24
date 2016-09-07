<?php include("admin.php");?>
<?php include('connection.php');?>
<?php

   


  if(isset($_POST['submit'])){
    if($_POST['news_id']){

      $news_id = $_POST['news_id'];
      //echo"$news_id";
      $author_id = $_POST['author_id'];
      $category_id = $_POST['category_id'];
      $date_time = $_POST['date_time'];
      $english_heading=$_POST['english_heading'];
      $english_description=$_POST['english_description'];
      $bangla_heading=$_POST['bangla_heading'];
      $bangla_description=$_POST['bangla_description'];
      //$image=$_POST['image'];

      
      

      if(getimagesize($_FILES['image_input']['tmp_name']) == FALSE)
                      {
                          echo "Please select an image.";
                      }
                      else
                      {
                          $image= addslashes($_FILES['image_input']['tmp_name']);
                          $name= addslashes($_FILES['image_input']['name']);
                          $image= file_get_contents($image);
                          $image= base64_encode($image);
                          //saveimage($name,$image);

                              

         
          $result= mysql_query( "INSERT INTO news (news_id, author_id, category_id, date_time, english_heading, english_description, bangla_heading, bangla_description, image_name, image) VALUES ('{$news_id}', '{$author_id}', '{$category_id}', '{$date_time}', '{$english_heading}', '{$english_description}', '{$bangla_heading}', '{$bangla_description}', '{$name}', '{$image}')");
          //$result= mysqli_query($conn , "INSERT INTO news (news_id, author_id, category_id) VALUES ('{$news_id}', '{$author_id}', '{$category_id}')");
          if(!$result){
            echo "doesn't add";

          }else {
           // mail('nasif.cse12@gmail.com', 'registration', 'confirmation','From:riyadhaxiom@gmail.com')or die("can't send mail");
            echo "successfully add"; 

                      }



          }

}


 }

  function saveimage($name,$image)
            {
            
                

                $qry="INSERT INTO news (image_name,image) VALUES ('$name','$image')";
                $result=mysql_query($qry);
   
                if($result)
                {
                    echo "<br/>Image uploaded.";
                }
                else
                {
                    echo "<br/>Image not uploaded.";
                }
            }  
            ?> 

		 
    
    <html lang="en">	
    <head>
  	    
            <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

   <link href="css/drop.css" rel="stylesheet">
   <script src="js/dropbutton.js"></script>
<script src="js/dropdown.js"></script>
         
    </head>
    <body>
  	
    
      <form action ="" method="POST" enctype="multipart/form-data" >

    
        <div class ="col-sm-2"></div>

    <div class ="col-sm-8">

        <div class="form-group">
            <label for="news_id" >News ID :</label>
            <input type="text" class="form-control" name="News_id">
        </div>
       
        
                                    
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Author Id
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a >HTML</a></li>
            <li><a >CSS</a></li>
            <li><a >JavaScript</a></li>
          </ul>
        </div>


               
 

        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Category Id
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a >HTML</a></li>
            <li><a >CSS</a></li>
            <li><a >JavaScript</a></li>
          </ul>
        </div>

          <div class="container">
            
            <h2>Dropdown as Select</h2>
            <div class="btn-group">
              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Select a Country <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Item I</a></li>
                <li><a href="#">Item II</a></li>
                <li><a href="#">Item III</a></li>
                <li><a href="#">Item IV</a></li>
                <li><a href="#">Item V</a></li>
                <li class="divider"></li>
                <li><a href="#">Other</a></li>
              </ul>
            </div>
            
          </div>


         <div class="form-group">
                <label for="english_heading">News Heading in English :</label>
                <textarea class="form-control" rows="2" name="english_heading"></textarea>
          </div>

          <div class="form-group">
                <label for="english_description">News Description in English:</label>
                <textarea class="form-control" rows="7" name="english_description"></textarea>
          </div>

          <div class="form-group"> 
                <label for="bangla_heading">News Heading in Bangla :</label>
                <textarea class="form-control" rows="2" name="bangla_heading"></textarea>
          </div>

          <div class="form-group">
                <label for="bangla_description">News Description in Bangla :</label>
                <textarea class="form-control" rows="7" name="bangla_description"></textarea>
          </div>

                <table class="table table-bordered table-striped" id="fieldsWrapper">
        

          <input type="file" data-filename-placement="inside" name="image_input">
          
          </p> 
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                
          </p>


      </form>

</div>
</body>
</html>

