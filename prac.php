<?php include('connection.php');?>
<?php
	
	if(isset($_POST['submit'])){
		if($_POST['name'] && $_POST['password'] &&$_POST['birthday']&& $_POST['gender'] &&$_POST['mobile'] &&$_POST['email'] &&$_POST['username']){
			//$username=mysql_real_escape_string($_POST['username']);
			  $name = $_POST['name'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $birthday = $_POST['birthday'];
            $gender=$_POST['gender'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $username=$_POST['username'];
            $confirmation="0";
            $confirmationcode="12345";
			

			if (strlen($password) < 8 ){
				die ("Password must be more or equal than 8 characters <a href='prac.php'>&larr;Back</a>") ;
			}

			if($password == $confirm_password){
			 	$result= mysql_query("INSERT INTO admin (username, name, password, birthday, gender, mobile,email,confirmation,confirmationcode) VALUES ('{$username}', '{$name}', '{$password}', '{$birthday}', '{$gender}', '{$mobile}', '{$email}','{$confirmation}','{$confirmationcode}')");
			 	if(!$result){
                	echo "doesn't add";

            	}else {
            		//mail('nasif.cse12@gmail.com', 'registration', 'confirmation','From:riyadhaxiom@gmail.com')or die("can't send mail");
                	echo "successfully add";
            	}
			}else {
				echo "password must be same <a href='prac.php'>&larr;Back</a>";
			}

		}else{
			echo"something missing";
		}

	}else{
			    
		
	echo "
	<body style='font-family:verdana, sans-serif;'>
			<div style='width:80%' padding:5px 15px 5px;border:1px solid #e3e3e3; background-color:#fff;color:#000;margin:left:auto;margin:>
			<h1>SIGN UP</h1>
			<br/>
			<form action ='' method='POST'>
				<table>
					<tr>
						<td>
							<b>Name</b>
						</td>
						<td>
							<input type='text' name='name' style='padding: 4px;'/>
						</td>
					</tr>
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
							<b>password</b>
						</td>
						<td>
							<input type='password' name='password' style='padding: 4px;'/>
						</td>
					</tr>
					<tr>
						<td>
							<b>Confirm Password</b>
						</td>
						<td>
							<input type='password' name='confirm_password' style='padding: 4px;'/>
						</td>
					</tr>

					<tr>
						<td>
							<b>Birthday</b>
						</td>
						<td>
							
 								 <input type='date' name='birthday'/>
						</td>
					</tr>
					<tr>
						<td>
							<b>Gender</b>
						</td>
						<td>
							<input type='radio' name='gender' value='male'>Male
							<input type='radio' name='gender' value='female'>Female
						</td>
					</tr>
					<tr>
						<td>
							<b>Mobile</b>
						</td>
						<td>
							<input type='text' name='mobile' style='padding: 4px;'/>
						</td>
					</tr>
					<tr>
						<td>
							<b>email</b>
						</td>
						<td>
							<input type='text' name='email' style='padding: 4px;'/>
						</td>
					</tr>
					<tr>
							
						<td>
							<input type='submit' name='submit' value='register'/>
						</td>
					</tr>

				</table>
			</form>
			</div>
		</body>	
	";

	}			

	
?>