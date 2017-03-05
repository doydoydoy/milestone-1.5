

<!DOCTYPE html>
<html>
<head>
	<title>Login Sample</title>
</head>
<body>

<h1>LOGIN PAGE</h1>

<?php 
	// Data on ecommerce/users.json
	// $users = [
	// ["username"=>"jonathan",
	// "password"=>"doydora"],
	// ["username"=>"john",
	// "password"=>"doyle"],
	// ["username"=>"abc",
	// "password"=>"def"]
	// ];

	// Use to write JSON file for logins
	// $fp = fopen('users.json','w');
	// fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
	// fclose($fp);

	$strings = file_get_contents('users.json');
	$json_users=json_decode($strings,true);

	if(isset($_POST['submit'])){

		$user = $_POST['username'];
		$pass = sha1($_POST['password']);
		$login = false;
		// Comparison of Input Login Info vs JSON Login Info
		foreach ($json_users as $user_in) {
			if ($user_in['username']==$user&&$user_in['password']==$pass) {
				echo "Login Successful";
				$login = true;
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				$_SESSION['role'] = $user_in['role'];
			}
		}
		if($login==false){
			echo "Wrong Login Information. Try Again.";
		}
	}

?>


<form method="post">

	<label>Username: </label>
	<input type="text" name="username" placeholder="Username"></input><br>
	<label>Password: </label>
	<input type="password" name="password" placeholder="Password"></input><br>
	<input type="submit" name="submit" value="Submit"></input>
</form>

<h1>Registration Page</h1>
<form method="post">
	<label>Username: </label>
	<input type="text" name="reg_user" placeholder="Username"></input><br>
	<label>Password: </label>
	<input type="password" name="reg_pass" placeholder="Password"></input><br>
	<label>Confirm Password: </label>
	<input type="password" name="reg_pass2" placeholder="Password"></input><br>
	<input type="submit" name="submit_reg" value="Submit"></input>
</form>

<?php 

	if(isset($_POST['submit_reg'])){
		// Account to register
		$reg = [
		"username"=>$_POST['reg_user'],
		"password"=>sha1($_POST['reg_pass']) 	];
		$reg_con = sha1($_POST['reg_pass2']);


		// Validation of username & password
		if($reg['password']==$reg_con && (substr($reg['username'],0,1)!="") && (substr($reg['username'],0,1))!=" "){
			$string = file_get_contents('users.json');
			$arrays = json_decode($string, true);

			// Determine if new admin / regular user
			if($reg['username']=='admin'){
				$reg['role']='admin';
			}
			else{
				$reg['role']='regular';
			}

			// Push new user to list of users
			$arrays[] = $reg;

			// Write to JSON file the new user
			$fp = fopen('users.json','w');
			fwrite($fp, json_encode($arrays,JSON_PRETTY_PRINT));
			fclose($fp);
			echo "Registration Successful";

		}
		else{
			echo "Registration Failed";
		}
	}

?>



</body>
</html>