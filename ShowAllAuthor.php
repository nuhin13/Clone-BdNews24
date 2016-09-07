<?php  include('admin.php'); ?>
<?php include('connection.php');?>
<!DOCTYPE html>
<html>
<head>
	 	      <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">



          
</head>

<body>
		
	                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
                            <h3 id="myModalLabel">Delete</h3>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
                        </div>
   </div><table class="table table-condensed table-striped table-bordered table-hover no-margin">
                <thead>
                    <tr>
                        
                        
                        <th class="text-center">Author Name</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Phone No.</th>
                        
                        <th class="text-center">Action</th>
                    
                        
                    </tr>
                </thead>

                <tbody>
                    
                    <tr>
                    <?php 
                   
                    $result=mysql_query("SELECT * FROM author"); 


                    
                    ?>
                    <?php while($row=mysql_fetch_array($result)){

                        ?>

                        <td class="text-center"><?php echo $row['Author_name']?></td>
                        <td class="text-center"><?php echo $row['Email']?></td>
                        <td class="text-center"><?php echo $row['Phone']?></td>
                           <td class="text-center">
                                       
                                         <a href="delete-author.php?id=<?php echo $row['Author_id']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </td>
                                            
                        <!--<td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>-->
                    </tr>
                    <?php 

                    }
                       
                   ?>
                        
                      
                                            
                     
                   
                   </tbody>

            </table>



            <div class="container">
  

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Serial No. 1 </h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12">
         
          <div class="form-group"><label>Author Id </label><textarea class="form-control" rows="1" placeholder="Id Should be Unique.." data-placement="top" data-trigger="manual"></textarea></div>
          
          <div class="form-group"><label>Author Name</label><textarea class="form-control" rows="4" placeholder="Discription.." data-placement="top" data-trigger="manual"></textarea></div>
        
          <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
          <div class="form-group"><label>Phone</label><input class="form-control phone" placeholder="01---------" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number " type="text"></div>

         
         
          <div class="form-group">
          <button type="submit" class="btn btn-success pull-right">Update</button> 
          
          <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Delete This News</button>
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
     
    </div>
  </div>
</div>


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
        <!--    <script >

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