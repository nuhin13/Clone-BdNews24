
<?php  include('admin.php'); ?>
<?php include('connection.php');?>
<?php



if(isset($_POST['submit'])){
    $flag = 1;

   
    $category_name=$_POST['category_name'];


    

    $check= mysql_query( "SELECT * FROM category");

    while($row = mysql_fetch_array($check))
    {
        if($category_name == $row['category_name']){
            $flag = 0;
        }
    }

    if($flag == 1){
        
        $result= mysql_query("INSERT INTO category (category_id,category_name) VALUES (NULL,'{$category_name}')");

        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      }
    else{
        echo "<script type='text/javascript'>alert('The Name has been included...')</script>";
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
                <label for="english_heading">Category Name :</label>
                <textarea class="form-control" rows="1" name="category_name"></textarea>
          </div>
	         
        
          </p> 
             <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Category</button> </a>
                
          </p>


				    <div >
				      
				    </div>
				  </div>
				</form>
				<!-- Search box End -->
         
      </form>

</div>

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                      Content for the dialog / modal goes here.
                    </div>
                    <div class="modal-footer">
                      <a href="#" data-dismiss="modal" class="btn">Close</a>
                      <a href="#" class="btn btn-primary">Save changes</a>
                    </div>
                  </div>
                </div>
            </div>

            <script type="text/javascript">
                $('#openBtn').click(function(){
                $('#myModal').modal({show:true})
            });

            </script>

            <script>
        function myFunction() {
            alert("Hello! I am an alert box!");
        }
        </script>
</body>
</html>