<!DOCTYPE html>
<html>
<head>
	<title>Admin/Regular Pages</title>
</head>
<body>


<?php 
	session_start();
	try{
		if($_SESSION['role']==null){
			echo "you are not allowed here.";
		}
		elseif($_SESSION['role']=='admin'){
			echo "<h1>Welcome Admin!</h1>";
		}
		else{
			echo "you are not allowed here.";
		}
	}
	catch (Exception $e) {
    	// echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	

	if(isset($_POST['logout'])){
		session_destroy();
		echo "You are logged out";
	}

?>


<form method="post">
	<input type="submit" value="logout" name="logout"></input>
</form>

</body>
</html>