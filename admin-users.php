<?php 
	session_start(); 
	if(!isset($_SESSION['username'])){
		$_SESSION['username']="";
		$_SESSION['role']="";
	} 
	else{
		echo "<script>alert('Hello ".$_SESSION['username'].")</script>";
	}

	// echo $_SESSION['username']." ".$_SESSION['role'];

?> 	

<?php require_once('main-functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Ecommerce</title>

	<!-- Normalize CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Latest compiled and minified CSS Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Carousel Assets -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css"> -->


	<!-- My Style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Main Page Item Heading Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

	<!-- Code for adding icon on web browser window -->
	<link rel="shortcut icon" type="image/x-icon" href="res/favicon4.ico" />


</head>
<body>
<header>

	<br>
	<div class="container-fluid">
		<div class="row">
			<a href="template.php">
				<div class="col-lg-1" id="logo"></div>
			</a>
		</div>
	</div>
	


	<nav class="navbar navbar-default ">
	  	<div class="container-fluid">

	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brands <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="brand.php?brand=acer">Acer</a></li>
	            <li><a href="brand.php?brand=asus">Asus</a></li>
	            <li><a href="brand.php?brand=apple">Apple</a></li>
	            <li><a href="brand.php?brand=dell">Dell</a></li>
	            <li><a href="brand.php?brand=lenovo">Lenovo</a></li>
	            <li><a href="brand.php?brand=lg">LG</a></li>
	            <li><a href="brand.php?brand=microsoft">Microsoft</li>
	            <li><a href="brand.php?brand=msi">MSI</a></li>
	            <li><a href="brand.php?brand=razer">Razer</a></li>
	          </ul>
	        </li>
	        <li><a href="#">Deals & Promos</a></li>
	        <li><a href="#">New Arrivals</a></li>
	        <li><a href="#">How To Order</a></li>

	      </ul>

	      <?php echoNavbarRight(); ?>
	    </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


</header>

<main class="container">
	<br>
	<h4>All Users <span class="glyphicon glyphicon-user"></span></h4>
	<br>
	<table class='table table-condensed'>
		<tr class="danger">
			<th>Username</th>
			<th>Password</th>
			<th>Account Type</th>
			<th>Action</th>
		</tr>
		<?php

			$users = json_decode(file_get_contents('users.json'),true);
			foreach ($users as $key => $value) {
				echo "<tr>
						<form method='POST' action='admin-users.php?index=".$key."'>
							<td>".$value['username']."</td>
							<td>".$value['password']."</td>
							<th>".$value['role']."</th>
							<th><input class='btn btn-danger' type='submit' name='delUser' value='Delete User' onclick='<?php deleteUser($key) ?>'></th>
						</form>
					</tr>";
			}

			if(isset($_POST['delUser'])){
				$delAcc = $_GET['index'];
				unset($users[$delAcc]);
				// array_values($users);
				$fp = fopen('users.json', 'w');
				fwrite($fp, json_encode($users,JSON_PRETTY_PRINT));
				fclose($fp);
				echo "<script> window.location.href='admin-users.php'</script>";
			}
			


		?>
	</table>
</main>

<footer>

	<div onclick='toTop()' class="container-fluid footer-1" style="cursor: pointer">
		<div class="col-lg-12"style="text-align: center">
			<?php clickToTop(); ?>
		</div>		
	</div>
	<div class="container-fluid footer-2">
		<div class="container">
			<div class="row" >
				<div class="col-lg-3">
					<h4>Get to know us</h4>
					<a>About Us</a><br>
					<a>Careers</a><br>
					<a>Highlights</a>
				</div>
				<div class="col-lg-3">
					<h4>Get to know us</h4>
					<a>About Us</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Highlights</a>
				</div>
				<div class="col-lg-3">
					<h4>Get to know us</h4>
					<a>About Us</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Highlights</a>
				</div>
				<div class="col-lg-3">
					<h4>Get to know us</h4>
					<a>About Us</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Careers</a><br>
					<a>Highlights</a>
				</div>
			</div>
		</div>
	</div>
</footer>


</body>
</html>