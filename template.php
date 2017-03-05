<?php 
	session_start(); 
	if(!isset($_SESSION['username'])){
		$_SESSION['username']="";
		$_SESSION['role']="";
	} 
	else{
		echo "<script>alert('Hello ".$_SESSION['username'].")</script>";
	}

	echo $_SESSION['username']." ".$_SESSION['role'];

?>
<?php require_once('main-functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Ecommerce</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Carousel Assets -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">

	<!-- My Style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Main Page Item Heading Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">


</head>
<body>
<header>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" id="logo"></div>
		</div>
	</div>
</header>

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
            <li><a href="#">Acer</a></li>
            <li><a href="#">Asus</a></li>
            <li><a href="#">Apple</a></li>
            <li><a href="#">Dell</a></li>
            <li><a href="#">Lenovo</a></li>
            <li><a href="#">LG</a></li>
            <li><a href="#">MSI</a></li>
            <li><a href="#">Razer</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Tablets</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Cellphones</a></li>
          </ul>
        </li>
        <li><a href="#">Deals & Promos</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">How To Order</a></li>

      </ul>
      
      <ul class="nav navbar-nav navbar-right" style="display: none">
        <li class="dropdown" style="padding-right: 15px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
            <li><a href="#">View Cart Items</a></li>
            <li><a href="#">My Wishlist</a></li>
            <li><a href="#">Check Out</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Log Out</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      	<li><a href='login.php'>Login or Register</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div id="adCarousel">
	<div class="container-fluid" id="banner" style="height: auto;">
		<div class="owl-carousel owl-theme owl-loaded" id="owl-demo">
		   <?php echoCarouselItems(); ?>
		   
		</div>
	</div>
</div>


<main>
	
	<br>

	<div class="featured-title">
		<h2><span style="background: white;padding: 0 10px;font-family: 'Open Sans Condensed', sans-serif; font-weight: bold; font-size: 30px;">Featured Items</span></h2>
	</div>

	<div class="container-fluid">
		<section class="col-lg-3 col-md-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Trending</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-1">
					<?php echoFeaturedLaptop()?>
				</div>	
				<?php 
					echoAdminBtn(1);
					
					if(isset($_POST['manageItemBtn1'])){
						echo "<script>window.location.href='template.php'</script>";
					}
					?>
			</div>
		</section>

		<section class="col-lg-3 col-md-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Recommendations</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-2">
					<?php echoFeaturedLaptop()?>
				</div>
				<?php echoAdminBtn(2)?>
				
			</div>
		</section>

		<section class="col-lg-3 col-md-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Top Rated</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-3">
					<?php echoFeaturedLaptop();?>
				</div>
				<?php echoAdminBtn(3)?>
				
			</div>
		</section>
		
		<section class="col-lg-3 col-md-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Deals of the Day</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-4">
					<?php echoFeaturedLaptop();?>
				</div>
				<?php echoAdminBtn(4)?>
				
			</div>
		</section>



	</div>
	<br>
	<br>

	<div class="featured-title">
		<h2><span style="background: white;padding: 0 10px;font-family: 'Open Sans Condensed', sans-serif; font-weight: bold; font-size: 30px;">New Arrivals</span></h2>
	</div>

</main>
<footer>
	<div class="container">
		<div class="row" >
			<div class="col-lg-12"style="text-align: center">
				<a href="">Back to top</a>
			</div>
			<br>
			<br>

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
</footer>



<!-- Javascript at the bottom to make pages load faster -->
<script src="js/owl.carousel.min.js"></script>
<script>
	$(document).ready(function(){

		$("#owl-demo").owlCarousel({
			nav:true,
			items:1,
			loop:true,
			autoplay: 1000,
			mouseDrag: false,
			navText:["<i class='fa fa-long-arrow-left' aria-hidden='true' style='color:#e0e0e0;opacity:0.4;font-size:30px'></i>",
			"<i class='fa fa-long-arrow-right' aria-hidden='true' style='color:#e0e0e0;opacity:0.4;font-size:30px'></i>",]		
			});
		// Script for owl carousel of featured items
		for (var i = 1; i < 5; i++) {
			$("#owl-main-items-"+i).owlCarousel({
			nav:true,
			items:1,
			loop:true,
			autoplay: 3000,
			mouseDrag: false,
			navText:["<i class='fa fa-arrow-left' aria-hidden='true' style='color:#e0e0e0;opacity:0.4;font-size:22px'></i>",
			"<i class='fa fa-arrow-right' aria-hidden='true' style='color:#e0e0e0;opacity:0.4;font-size:22px'></i>",]		
			});			
		}

	});
</script>

<!-- Login PHP function -->
<?php 

	$strings = file_get_contents('users.json');
	$json_users=json_decode($strings,true);

	if(isset($_POST['submit_log'])){

		$user = $_POST['username'];
		$pass = sha1($_POST['password']);
		$login = false;
		echo "example";
		// Comparison of Input Login Info vs JSON Login Info
		foreach ($json_users as $user_in) {
			if ($user_in['username']==$user&&$user_in['password']==$pass) {
				echo "<script>alert('Login Successful')</script>";
				$login = true;
				
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				$_SESSION['role'] = $user_in['role'];
			}
		}
		if($login==false){
			echo "<script>alert('Wrong Login Information. Try Again.')</script>";
		}
	}

?>


</body>
</html>