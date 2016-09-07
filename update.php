   
  
  <?php
  $id = $_REQUEST['id'];
  $conn= mysqli_connect("localhost", "root", "", "clone_bdnews24");

  $author_id=$_REQUEST['Author'];
  $category_id=$_REQUEST['Category'];
  $english_heading = $_REQUEST['NewsHeading'];
  $english_description = $_REQUEST['NewsDescription'];
  

	 if(getimagesize($_FILES['image_input']['tmp_name']) == FALSE)
                      {
                        $result= mysqli_query($conn , "UPDATE news SET author_id='$author_id',category_id='$category_id',english_heading='$english_heading',english_description='$english_description' WHERE news_id='$id' ");
                     		header('Location:ShowDateWiseNews.php');
                      }
                      else
                      {
                             $filetmp = $_FILES["image_input"]["tmp_name"];
						      $filename = $_FILES["image_input"]["name"];
						      $filetype = $_FILES["image_input"]["type"];
						      $filepath = "photo/".$filename;
      
      						move_uploaded_file($filetmp,$filepath);
   $result= mysqli_query($conn , "UPDATE news SET author_id='$author_id',category_id='$category_id',english_heading='$english_heading',english_description='$english_description', image_name='$filename',image_path='$filepath' WHERE news_id='$id' ");
        //$result= mysqli_query($conn , "INSERT INTO news (news_id, author_id, category_id) VALUES ('{$news_id}', '{$author_id}', '{$category_id}')");
   if(!$result){
    echo "doesn't add";

  }else {
         // mail('nasif.cse12@gmail.com', 'registration', 'confirmation','From:riyadhaxiom@gmail.com')or die("can't send mail");
   
    header('Location:ShowDateWiseNews.php');

  }
}

?>