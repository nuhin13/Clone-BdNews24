<?php  include('admin.php'); ?>
<?php include ('connection.php');?>
<!DOCTYPE html>
<html>
<head>
	 	      <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

              <style >body {
    
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                 background-size: cover;
                 background-color:#333;
                            }

                h1 .btn {
                    font-size:30px;
                }
              </style>

        
</head>

<body>
		
		
                    <div class="container">
                        <div class="row">
                         <?php
                         $i=0;
                                
                                $result=mysql_query("SELECT * FROM news group by date_time");
                                while($row = mysql_fetch_array($result)){
                                	$id=$row['date_time'];
                                  ?>
                                     <div class="col-xs-3" data-toggle="modal" data-target="#myModal">

                                          <a href="ShowAllNews.php?id=<?php echo $id ; ?>" class="thumbnail modal-click" >
                               
                                        <img src ="file.png" alt="125x125" style="width:175px;height:175px">
                                                <div class="caption">
                                             <h3><?php echo $row["date_time"];?></h3>
                                          </div>
                                                </a>
                                        </div>
                                  <?php
                                  $i++;
                                  if($i%4==0)
                                  {
                                    ?>
                                    <div class="row">
                                     </div>
                                     <?php
                                  }
                                }

                                ?>
                          
                    </div>
</body>
</html>