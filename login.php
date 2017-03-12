<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Login Page</title>

	<!-- Normalize CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Latest compiled and minified CSS Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/
	bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		form label{
			font-weight: bolder;
		}
		form input{
			border-radius: none; 
		}
	</style>
</head>
<body>


<main style="position: relative; height: 99vh;">

<?php 

	session_start();

	
	if($_SESSION['username']==""&&$_SESSION['role']==""){
		echo "<div style='padding:20px; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);border: 1px solid black; width:50vh'>

			<div>
				<h1 style='margin-top:0'>Sign In</h1>
			</div>

			<form method='POST'>
				<div class='form-group'>
				<label>Username/Email</label><br>
				<input type='text' name='user_log' class='form-control'></input><br>
				<label>Password</label><br>
				<input type='password' name='pass_log' class='form-control'></input><br><br>
				<input type='submit' value='Sign In' name='submit_log' class='form-control btn btn-danger'></input>
				</div>
			</form>

			<div style='border-top: 2px dashed grey'>
				<h1>Register Here</h1>
			</div>

			<form method='POST'>
				<label>Username/Email</label><br>
				<input type='text' name='user_reg' class='form-control'></input><br>
				<label>Password</label><br>
				<input type='password' name='pass_reg' class='form-control'></input><br>
				<label>Confirm Password</label><br>
				<input type='password' name='pass_reg_conf' class='form-control'></input><br><br>
				<input type='submit' value='Register' name='submit_reg' class='form-control btn btn-danger'></input>
			</form>
		</div>";
	}
	else{
		echo "<script>window.location.href='template.php'</script>";

	}


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
				$_SESSION['cart_items']=[];
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

			// Get users in JSON file
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

</main>
</body>
</html>


