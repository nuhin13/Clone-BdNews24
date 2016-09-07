<?php include('connection.php');?>
<?php

$id = $_REQUEST['id'];

$result = mysql_query("SELECT * FROM news where news_id=$id");
$news = mysql_fetch_assoc($result);
// $update = array(1,2);


?>
<body>
  <form method="POST" action="update.php" enctype="multipart/form-data">
     <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">

                            <img src=<?php echo $row["image_path"];?> class="img-responsive"  width="560" height="250" >
                            <div class="form-group"><label><?php echo $row["english_heading"];?></label>
                            <div class="form-group"><label><?php echo $row["english_description"];?></label><textarea class="form-control" rows="4" placeholder="Discription.." data-placement="top" data-trigger="manual"></textarea></div>


                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

  </body>