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




<!-- Carousel for main page ads -->
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
		<section class="col-lg-3 col-sm-6">
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
						echo "<script>window.location.href='admin-manage.php'</script>";
					}
					?>
			</div>
		</section>

		<section class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Recommendations</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-2">
					<?php echoFeaturedLaptop()?>
				</div>
				<?php echoAdminBtn(2);
					if(isset($_POST['manageItemBtn2'])){
						echo "<script>window.location.href='admin-manage.php'</script>";
					}

				?>

				
			</div>
		</section>

		<section class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Top Rated</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-3">
					<?php echoFeaturedLaptop();?>
				</div>
				<?php echoAdminBtn(3);
					if(isset($_POST['manageItemBtn3'])){
						echo "<script>window.location.href='admin-manage.php'</script>";
					}

				?>
				
			</div>
		</section>
		
		<section class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="row text-center carousel-main-item-head">
					<h4>Deals of the Day</h4>
				</div>
				<div class="row carousel-main-items owl-carousel owl-theme owl-loaded" id="owl-main-items-4">
					<?php echoFeaturedLaptop();?>
				</div>
				<?php echoAdminBtn(4);
					if(isset($_POST['manageItemBtn4'])){
						echo "<script>window.location.href='admin-manage.php'</script>";
					}

				?>
				
			</div>
		</section>



	</div>
	<br>
	<br>

	<div class="featured-title">
		<h2><span style="background: white;padding: 0 10px;font-family: 'Open Sans Condensed', sans-serif; font-weight: bold; font-size: 30px;">New Arrivals</span></h2>
	</div>
	<!-- <br> -->
	<div class="container-fluid">
		<section class="col-lg-9">
			<div class="owl-new owl-carousel owl-theme owl-loaded " id='owl-new' style="">
			<?php echoFeaturedLaptop()?>	
			</div>	
		</section>
		<section class="col-lg-3">
			<div style="box-sizing: border-box; padding: 5px; outline: 1px solid #cecece; text-align: right">
			<div style="background: url(http://cdn5.thinkcomputers.org/wp-content/uploads/2015/03/sDHnexg.png) center/cover no-repeat; height: 320px; box-sizing: border-box;">
				
			</div>
			<a style="font-size: 10px; text-decoration: none; cursor: grab;">Ad by Asus&copy;</a>
			</div>
			
		</section>
	</div>

	<br>
	<br>

	<div class="featured-title">
		<h2><span style="background: white;padding: 0 10px;font-family: 'Open Sans Condensed', sans-serif; font-weight: bold; font-size: 30px;">Latest Promotions</span></h2>
	</div>

	<div class="container-fluid sale-ads">
		<div class="row">
			<div class="col-lg-3" style="box-sizing: border-box;">
				<div style="background: url(http://ph-live.slatic.net/original/db8107b99682a8c32f9c14ba39f3347a.jpg) center/cover no-repeat; height: 410px;"></div>
			</div>
			<div class="col-lg-9" style=" box-sizing: border-box;">
				<div style="background: url(http://ph-live.slatic.net/cms/category_banner/03042016/Category.jpg) top/cover no-repeat; height: 200px;"></div>
				
			</div>
			<div class="col-lg-2" style="box-sizing: border-box;">
				<div style="background: url(http://ph-live.slatic.net/cms/electronics/laptops/affordable-2-1.jpg) center/cover no-repeat; height: 200px"></div>
			</div>
			<div class="col-lg-5" style="height: 200px; box-sizing: border-box;">
				<div style="background: url(http://blog.dealrocker.com/wp-content/uploads/2011/07/Sony-laptop.jpg) bottom/cover no-repeat; height: 200px;"></div>
			</div>
			<div class="col-lg-2" style=" box-sizing: border-box;">
				<div style="background: url(http://ph-live.slatic.net/cms/electronics/laptops/gaming-laptop.jpg) center/cover no-repeat; height: 200px"></div>
			</div>

		</div>
	</div>

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



<!-- Javascript at the bottom to make pages load faster -->
<script src="js/owl.carousel.min.js"></script>
<script>
	$(document).ready(function(){

		$("#owl-demo").owlCarousel({
			nav:true,
			items:1,
			loop:true,
			autoplay: 2000,
			mouseDrag: false,
			navText:["<i class='glyphicon glyphicon-chevron-left ' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:30px'></i>",
			"<i class='glyphicon glyphicon-chevron-right' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:30px'></i>",]		
			});
		// Script for owl carousel of featured items
		for (var i = 1; i < 5; i++) {
			$("#owl-main-items-"+i).owlCarousel({
			nav:true,
			items:1,
			loop:true,
			autoplay: 5000,
			mouseDrag: false,
			navText:["<i class='glyphicon glyphicon-chevron-left' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:22px'></i>",
			"<i class='glyphicon glyphicon-chevron-right' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:22px'></i>",]		
			});			
		}

		$("#owl-new").owlCarousel({
			nav:true,
			items:4,
			loop:true,
			// autoplay: 3000,
			mouseDrag: false,
			navText:["<i class='glyphicon glyphicon-chevron-left ' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:22px'></i>",
			"<i class='glyphicon glyphicon-chevron-right' aria-hidden='true' style='color:#cecece;opacity:0.4;font-size:22px'></i>",]
		});

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