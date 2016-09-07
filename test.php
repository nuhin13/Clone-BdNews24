<?php include('connection.php');?>
<?php

$id = $_REQUEST['id'];

$result = mysql_query("SELECT * FROM news where news_id=$id");
$update = mysql_fetch_assoc($result);
// $update = array(1,2);


?>
<body>
  <form method="POST" action="update.php" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">News for Id : <?php echo $id;?> </h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal col-sm-12">
            <form>
              <div class="well carousel-search hidden-phone">
                <div class="btn-group">

                  <ul class="dropdown-men"> <select name = "Category">
                    <?php 
                    $result = mysql_query("SELECT * FROM category"); 
                    while($row = mysql_fetch_array($result))
                    {
                  //echo '<li><a href="#">$row['category_name']</a></li>' ;
                      echo ' <option value="'.$row['category_id'].'"><li>' . '<a href="#" id=>' .$row['category_name'] .  '</li></option>';


                    } 
                     
                    ?>
                    
                  </select></ul>
                </div>

                <div class="btn-group">

                  <ul class="dropdown-men"> <select name = "Author">
                    <?php 
                    $result = mysql_query("SELECT * FROM author"); 
                    while($row = mysql_fetch_array($result))
                    {
            //echo '<li><a href="#">$row['category_name']</a></li>' ;
                      echo '<option value="'.$row['Author_id'].'"><li>' . '<a href="#" id=>' .$row['Author_name'] .  '</li></option>';


                    } ?>
                  </select> </ul>
                </div>
                <div >

                </div>
              </div>
            </form>

            <div class="form-group"><label> New Heading </label><input class="form-control" rows="1" name="NewsHeading"placeholder="Heading.." value="<?php echo $update['english_heading'];?>" data-placement="top" data-trigger="manual"></div>

            <div class="form-group"><label>News Discription</label><textarea class="form-control" rows="4" name="NewsDescription" placeholder="Discription.." data-placement="top" data-trigger="manual"><?php echo $update['english_description'];?></textarea></div>

            <input type="file" data-filename-placement="inside" name="image_input">
            <div class="form-group">
              <input type="hidden"  name="id" value=<?php echo $id;?> >
              <button type="submit" name="submit" class="btn btn-success pull-right">Update</button> 

              <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="delete-news.php?id=<?php echo $id; ?>" class="btn btn-danger delete" >Delete This News</a>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
          </div>

        </div>
      </div>
    </form>

  </body>