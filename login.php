<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Login Page</title>
	<style type="text/css">
		form label{
			font-weight: bolder;
		}
	</style>
</head>
<body>



<div style="padding:20px; margin: 0 30%;">

	<div>
		<h1>Sign In</h1>
	</div>

	<form method="POST">
		<label>Username/Email</label><br>
		<input type="text" name="user_log"></input><br>
		<label>Password</label><br>
		<input type="password" name="pass_log"></input><br><br>
		<input type="submit" value="Sign In" name="submit_log"></input>
	</form>

	<div>
		<h1>Register Here</h1>
	</div>

	<form method="POST">
		<label>Username/Email</label><br>
		<input type="text" name="user_reg"></input><br>
		<label>Password</label><br>
		<input type="password" name="pass_reg"></input><br>
		<label>Confirm Password</label><br>
		<input type="password" name="pass_reg_conf"></input><br><br>
		<input type="submit" value="Register" name="submit_reg"></input>
	</form>
</div>

<?php 

	session_start();


	// Get list of users in JSON file
	function getUsers(){
		$user_strings = file_get_contents('users.json');
		$decoded_users = json_decode($user_strings,true); 
		return $decoded_users;
	}
	// Login verification
	if(isset($_POST['submit_log'])){
		$user = $_POST['user_log'];
		$pass = sha1($_POST['pass_log']);
		$login = false;
		$decoded_users = getUsers();

		//Comparison to validated if provided login is in JSON list
		foreach ($decoded_users as $dec_user) {
			if($dec_user['username']==$user&&$dec_user['password']==$pass){
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				$_SESSION['role'] = $dec_user['role'];
				$login = true;
				echo "<script>alert('Login Successful')</script>";
				echo "<script>window.location.href='template.php'</script>";
			}
		}

		if($login==false){
			echo "<script>alert('Wrong Login Info. Try Again.')</script>";
		}
	}

	if(isset($_POST['submit_reg'])){
		$pass_conf = sha1($_POST['pass_reg_conf']);
		$reg = [
		"username"=>$_POST['user_reg'],
		"password"=>sha1($_POST['pass_reg']),
		];

		// Validation of password
		if($reg['password']==$pass_conf && (substr($reg['username'],0,1)!="") && (substr($reg['username'],0,1))!=" "){	

			// Determine if Admin or Regular account type
			if($reg['username']=='admin'){
				$reg['role']='admin';
			}
			else{
				$reg['role']='regular';
			}

			$decoded_users = getUsers();

			// Push new user to list of users in array form
			$decoded_users[] = $reg;

			// Convert array to JSON then write the updated list on the file
			$fp = fopen('users.json', 'w');
			fwrite($fp, json_encode($decoded_users,JSON_PRETTY_PRINT));
			echo "<script>alert('Registration Successful!')</script>";
			fclose($fp);
		}
		else{
			echo "<script>alert('Registration Failed!')</script>";
		}
	}
?>

</body>
</html>


