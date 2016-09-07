<?php  include('C:\xampp\htdocs\clone_bdnews2\admin.php'); ?>
<?php

$id = $_REQUEST['id'];



?>
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
                                $conn= mysqli_connect("localhost", "root", "", "clone_bdnews24");
                                $result = mysqli_query($conn,"SELECT * FROM news where date_time='$id'");
                                while($row = mysqli_fetch_array($result)){
                                  ?>
                                     <div class="col-xs-3" data-toggle="modal" data-target="#myModal">
                                          <a href="#" class="thumbnail modal-click" data-id="<?php echo $row['news_id'];?>">
                               
                                        <img src ="<?php echo $row["image_path"];?>" alt="125x125">
                                                <div class="caption">
                                             <h3><?php echo $row["english_heading"];?></h3>
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

<div id="stage"></div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
</div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('.modal-click').click(function(){
      var id = $(this).data('id');
      $.ajax({
        type: "POST",
        data: "type=modal",
        url: "test.php?id="+id,
        success: function(result){
          $("#myModal").html(result);
        }
      });
    });
  });
  
  </script>
    <script >
       
                    $(".dropdown-menu li a").click(function(){
                      var selText = $(this).text();
                      $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
                    });

                    $("#btnSearch").click(function(){
                        alert($('.btn-select').text()+", "+$('.btn-select2').text());
                    }); 

     </script>

     <script >
            
            $('#myIn').click(function(){
          $(this).css({"padding-bottom":"60px"});
        });

    </script>

<script >
    
    /* form validation plugin */
$.fn.goValidate = function() {
    var $form = this,
        $inputs = $form.find('input:text');
  
    var validators = {
        name: {
            regex: /^[A-Za-z]{3,}$/
        },
        pass: {
            regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/
        },
        email: {
            regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
        },
        phone: {
            regex: /^[2-9]\d{2}-\d{3}-\d{4}$/,
        }
    };
    var validate = function(klass, value) {
        var isValid = true,
            error = '';
            
        if (!value && /required/.test(klass)) {
            error = 'This field is required';
            isValid = false;
        } else {
            klass = klass.split(/\s/);
            $.each(klass, function(i, k){
                if (validators[k]) {
                    if (value && !validators[k].regex.test(value)) {
                        isValid = false;
                        error = validators[k].error;
                    }
                }
            });
        }
        return {
            isValid: isValid,
            error: error
        }
    };
    var showError = function($input) {
        var klass = $input.attr('class'),
            value = $input.val(),
            test = validate(klass, value);
      
        $input.removeClass('invalid');
        $('#form-error').addClass('hide');
        
        if (!test.isValid) {
            $input.addClass('invalid');
            
            if(typeof $input.data("shown") == "undefined" || $input.data("shown") == false){
               $input.popover('show');
            }
            
        }
      else {
        $input.popover('hide');
      }
    };
   
    $inputs.keyup(function() {
        showError($(this));
    });
  
    $inputs.on('shown.bs.popover', function () {
        $(this).data("shown",true);
    });
  
    $inputs.on('hidden.bs.popover', function () {
        $(this).data("shown",false);
    });
  
    $form.submit(function(e) {
      
        $inputs.each(function() { /* test each input */
            if ($(this).is('.required') || $(this).hasClass('invalid')) {
                showError($(this));
            }
        });
        if ($form.find('input.invalid').length) { /* form is not valid */
            e.preventDefault();
            $('#form-error').toggleClass('hide');
        }
    });
    return this;
};
$('form').goValidate();


</script>
    	<!--	<script >

				    				  $('#myModal').on('show', function() {
				    var tit = $('.confirm-delete').data('title');

				    $('#myModal .modal-body p').html("Desea eliminar al usuario " + '<b>' + tit +'</b>' + ' ?');
				    var id = $(this).data('id'),
				    removeBtn = $(this).find('.danger');
				})

				$('.confirm-delete').on('click', function(e) {
				    e.preventDefault();

				    var id = $(this).data('id');
				    $('#myModal').data('id', id).modal('show');
				});

				$('#btnYes').click(function() {
				    // handle deletion here
				    var id = $('#myModal').data('id');
				    $('[data-id='+id+']').parents('tr').remove();
				    $('#myModal').modal('hide');
				    
				});

    		</script>
-->

</body>
</html>