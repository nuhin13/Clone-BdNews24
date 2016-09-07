
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Admin Panel</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
 
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>



   
<style>
        .marginBottom-0 {margin-bottom:0;}

.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
.dropdown-submenu>a:after{display:block;content:'';float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
.dropdown-submenu:hover>a:after{border-left-color:#555;}
.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}

</style>

</head>
<body>


<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'><img class='img-responsive2' src='bds.png'></a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li ><a href='admin.php'>Home</a></li>
        <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Category <span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='ShowAllCategory.php'>Existing Category</a></li>
            <li><a href='AddCategory.php'>Add Category</a></li>
           
          </ul>
        </li>
         <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Author <span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='ShowAllAuthor.php'>Existing Author</a></li>
            <li><a href='AddAuthor.php'>Add Author</a></li>           
          </ul>
        </li>
        <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'> News <span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='AddEnglishNews.php'>Add English News</a></li>           
          </ul>
        </li>
        <!-- <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>News <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
                            
                            
                            <li class='dropdown dropdown-submenu'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Add News</a>
                <ul class='dropdown-menu'>
                  
                  <li><a href='AddEnglishNews.php'>English News</a></li>
                  
                </ul>
              </li>
                          
              </ul>
            </li> -->

            <script>
                        (function($){
          $(document).ready(function(){
            $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
              event.preventDefault(); 
              event.stopPropagation(); 
              $(this).parent().siblings().removeClass('open');
              $(this).parent().toggleClass('open');
            });
          });
        })(jQuery);


            </script>

        <li><a href='ShowDateWiseNews.php'>View All News </a></li>
        <li><a href='http://bdnews24.com/'>View Website</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
         <li><a href='#'><span class='glyphicon glyphicon-user'></span> User Name</a></li>
        <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>

