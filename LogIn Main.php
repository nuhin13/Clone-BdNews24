
<?php
include('connection.php');
include ('functions.php');
    if(logedin()){
        header("location:admin.php"); 
        exit();
    }

/*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "clone_bdnews24";

$connection=mysql_connect($servername,$username,$password) or die("couldnt connect to server");
mysql_select_db($dbname,$connection)or die("couldnt connect to database");*/

    if(isset($_POST['login'])){
        if($_POST['username'] &&  $_POST['password']){
                $username= $_POST['username'] ;
                $password=$_POST['password'];
                if(isset($_POST['rememberme'])){

                    $rememberme ="on" ;                 
                }
                 else{
                    $rememberme="off";
                 }
                
                $user=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username = '$username'"));
                
                
                if($user=='0'){
                    
                    die("That username doesnt exists ! Try making <i>$username</i> Today! <a href='login Main.php'>&larr;Back</a>");
                }
                if($user['password']==$password){
                    
                    //die("Incorrect password <a href='login.php'>&larr;Back</a>");
                    $loginok=TRUE;

                }else{
                    $loginok=FALSE;
                    
                }
                    
                    if($loginok==TRUE){
                        if($rememberme=="on"){
                                setcookie("username",$username,time()+7200);
                        }else{
                            $_SESSION['username']=$username;
                            header("location:admin.php");
                            exit();
                        }

                    }else{
                        die("Incorrect password <a href='logIn Main.php'>&larr;Back</a>");

                    }
                header("location:admin.php");

                //header("location:new.php");
                
                
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn Form</title>


  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='bootstrap-3.3.5-dist/3.3.5/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='bootstrap-3.3.5-dist/js/bootstrap.min.js'></script>



  <style >

  		body { 
 background: url('image/im2.jpg') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}
  </style>
</head>
<body>


		<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Login</strong>

                </div>
                <div class="panel-body">
                    <form action ='' method='POST' class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" name="rememberme" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="login" class="btn btn-success btn-sm">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Not Registered? <a href="prac.php" class="">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>