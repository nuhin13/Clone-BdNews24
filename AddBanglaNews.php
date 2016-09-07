<?php  include('C:\wamp\www\clone_bdnews24\admin.php'); ?>

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
            <input type="text" class="form-control" name="News_id" placeholder="News Id Should be Unique And Write in English">
        </div>

        <!-- Search box Start -->
				<form>
				  <div class="well carousel-search hidden-phone">
				    <div class="btn-group">
				      <a class="btn dropdown-toggle btn-select" data-toggle="dropdown" href="#"> Category <span class="caret"></span></a>
				      <ul class="dropdown-menu">
				        <li><a href="#">Politcis</a></li>
				        <li><a href="#">Sports</a></li>
				        <li><a href="#">Others</a></li>
				        </ul>
				    </div>
				    
				    <div class="btn-group">
				      <a class="btn dropdown-toggle btn-select2" data-toggle="dropdown" href="#">Author <span class="caret"></span></a>
				      <ul class="dropdown-menu">
				        <li><a href="#">Mr.Jodu</a></li>
				        <li><a href="#">Mrs.Jodu</a></li>
				        <li><a href="#">Mr.X</a></li>
				        </ul>
				    </div>
				    <div >
				      
				    </div>
				  </div>
				</form>
				<!-- Search box End -->
                                  
				<script >
									$(".dropdown-menu li a").click(function(){
				  var selText = $(this).text();
				  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
				});

				$("#btnSearch").click(function(){
					alert($('.btn-select').text()+", "+$('.btn-select2').text());
				});	

				</script>



         <div class="form-group">
                <label for="english_heading">News Heading in Bangla :</label>
                <textarea class="form-control" rows="2" name="english_heading"></textarea>
          </div>

          <div class="form-group">
                <label for="english_description">News Description in Bangla:</label>
                <textarea class="form-control" rows="7" name="english_description"></textarea>
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