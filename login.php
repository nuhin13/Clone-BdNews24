
<?php



include ("functions.php");
 

    if(logedin()){
    	header("location:admin.php"); 
    	exit();
    }

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "clone_bdnews24";
// Create connection
//$conn = new mysqli($servername, $username, $password);
//$conn=mysqli_connect($servername, $username, $password,$dbname);
$connection=mysql_connect($servername,$username,$password) or die("couldnt connect to server");
mysql_select_db($dbname,$connection)or die("couldnt connect to database");

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
					
					die("That username doesnt exists ! Try making <i>$username</i> Today! <a href='login.php'>&larr;Back</a>");
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
						die("Incorrect password <a href='login.php'>&larr;Back</a>");

					}
				header("location:admin.php");

				//header("location:new.php");
				
				
		}
	}else{



	echo "
	<body style='font-family:verdana, sans-serif;'>
			<div style='width:80%' padding:5px 15px 5px;border:1px solid #e3e3e3; background-color:#fff;color:#000;margin:left:auto;margin:>
			<h1>LogIn</h1>
			<br/>
			<form action ='' method='POST'>
				<table>
					<tr>
						<td>
							<b>UserName</b>
						</td>
						<td>
							<input type='text' name='username' style='padding: 4px;'/>
						</td>
					</tr>
					
					<tr>
						<td>
							<b>Password</b>
						</td>
						<td>
							<input type='password' name='password' style='padding: 4px;'/>
						</td>
					</tr>
					<tr>
						
						<td>
							<input type='checkbox' name='rememberme' style='padding: 4px;'/>RememberMe<br/>
						</td>
					</tr>
					<tr>
						<td>
							<input type='submit' value='login' name='login'/>
						</td>
					</tr>

					<br/>
					<h6>
						No Account ? <a href='prac.php'>Register</a>
					</h6>

				</table>
			</form>
			</div>
		</body>	
	";
	}
?>
