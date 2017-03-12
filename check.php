<?php

session_start();
require_once('main-functions.php');
$laptop = getLaptopLists();


function getCheckTitle(){
	$title = '';
	$laptop = getLaptopLists();
	foreach ($laptop as $keys => $value) {
		if($keys==$_GET['key']){
			$title = $value["prod_name"]." ".$value['cpu']." ".$value['storage']." ".$value['memory']." ".$value['graphics']." ".$value['screen']." ".$value['os'].", ".$value['color'];
		}
	}
	return $title;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo getCheckTitle()." - NotebookCheck.com"; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="res/favicon.ico" />

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

	<!-- My Style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Main Page Item Heading Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

	<!-- Code for adding icon on web browser window -->
	<link rel="shortcut icon" type="image/x-icon" href="res/favicon4.ico" />

	<style type="text/css">
		.col-lg-8{
			/*border-left: 1px solid #cecece;*/
			/*padding-left: 35px;*/
		}
		.col-lg-8 h3{
			margin-top: 0;
			/*width: 700px;*/
		}
		.col-lg-4{
			border: 0px;
		}
		.item-desc{
			border: 1px dotted #cecece;
			overflow: auto;
			box-sizing: border-box;
			padding: 20px;
		}
	</style>

</head>
<body>

<header>

	
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

	      <?php echoNavbarRight(); ?>
	    </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


</header>

<main>
<div class="container-fluid" style="padding: 30px;">
	<div class="row">
		<div class="col-lg-4" style="padding: 20px">
			<?php
				foreach ($laptop as $key_a => $laptop_key) {
					if($key_a==$_GET['key']){
						echo "<div style='background:url(".$laptop_key['image'].") center/contain no-repeat; height:200px;'>
						</div>";
										
			?>
		</div>
		
		<div class="col-lg-8 item-desc">
			<?php
						echo "<h3 style='font-weight:bold'>".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os'].", ".$laptop_key['color']."</h3>";
					
			?>
			<?php
						if($laptop_key['disc_price']==''){
							// echo "<br><p style='font-size:16px;'>Price: <span style='font-size:16px; color:#b12704'>".$laptop_key['curr_price']."</span></p>";
							echo "
							<span style='font-size: 16px;'>".$laptop_key['curr_price']."</span><br>";

						}
						else{
							// echo "<br><p style='font-size:16px;'>Price: <span style='font-size:16px; color:#b12704'>".$laptop_key['disc_price']."</span></p>";
							echo "
							<span style='font-size: 16px;'>".$laptop_key['disc_price']."</span><br>
							<span style='font-size: 12px;'>Before:</span>
							<span style='font-size: 12px; /*text-decoration: line-through; color: grey;*/'>".$laptop_key['curr_price']."</span>
							<span style='font-weight: bold; font-size: 12px;'>(".$laptop_key['disc_off']." off)
							</span>
							";
						}

						echo "
						<form method='POST'>
							<br>
							<label style='font-size:18px; font-weight:normal'>Quantity:&nbsp;</label>

							<input type='number' min='-";
						countItemsOnCart($laptop_key);
						echo "' max='100' id='quantity_num' name='quantity_num' value='0' oninput='calculateAmt()'  >
							<label>&times;</label>
							<label style='font-size:18px;font-weight:normal' name='price' id='price'>".$laptop_key['disc_price']."</label> <label> = </label>

							<span style='font-size:20px;font-weight:normal'>&nbsp;$
								<label style='font-weight:bold' name='item-amt' id='item-amt'>0</label>
							</span><br>";
						echo 	"<br>
							<input type='text' name='prod_model' value='".$laptop_key['prod_model']."' style='display:none' readonly>
							";
						echoLoginOrAddCart($laptop_key);
						removeCartItem($laptop_key);
						echo "
						</form>";


					}
				}
			?>
		</div>
	</div>

	<?php

		// echo login first or add cart button
		function echoLoginOrAddCart($laptop_key){
			if($_SESSION['role']!==''){
				echo "<label>In Cart: ";
				countItemsOnCart($laptop_key);
				echo "<br><br>
					<input type='submit' name='addCartBtn' value='Add to Cart' class='btn btn-danger'>&nbsp;&nbsp;";
			}
			else{
				echo "<a href='login.php'>
						<input type='button' class='btn btn-primary' value='Login to Add Cart'>
					</a>";
			}

		}


		// adding items on cart
		if(isset($_POST['addCartBtn'])){
			if(!isset($_SESSION['cart_items'][$_POST['prod_model']])){
				$x = $_POST['prod_model'];
				$_SESSION['cart_items'][$x]=(int) $_POST['quantity_num'];
				// echo var_dump($_SESSION['cart_items']);
				echo "<script>window.location.href= 'check.php?key=".$_GET['key']."'</script>";


			}
			else{
				$_SESSION['cart_items'][$_POST['prod_model']]+=(int)$_POST['quantity_num'];
				// echo var_dump($_SESSION['cart_items']);
				echo "<script>window.location.href= 'check.php?key=".$_GET['key']."'</script>";
			}
		}

		// remove items on cart
		function removeCartItem($laptop_key){

			
			if(!empty($_SESSION['cart_items'])&&isset($_SESSION['cart_items'][$laptop_key['prod_model']])&&$_SESSION['cart_items'][$laptop_key['prod_model']]!=0){
				echo "<input type='submit' name='removeCartBtn' value='Remove from Cart' class='btn btn-warning'>";
			}else{

			}

			if(isset($_POST['removeCartBtn'])){
				unset($_SESSION['cart_items'][$laptop_key['prod_model']]);
				echo "<script>window.location.href= 'check.php?key=".$_GET['key']."'</script>";
			}
		}

		function countItemsOnCart($laptop_key){
			if(!isset($_SESSION['cart_items'][$laptop_key['prod_model']])){
				echo "0";
			}
			else{
				echo $_SESSION['cart_items'][$laptop_key['prod_model']];
			}
		}

	?>
	
	


	
</div>

<script type="text/javascript">
	//Calculate the item price to the quantity and display on page
	function calculateAmt(){
		document.getElementById('item-amt').innerHTML =  parseInt(document.getElementById('quantity_num').value) * parseInt(document.getElementById('price').innerHTML.substring(1));
	}

	//Turn off submit on "Enter" key
	$("form").bind("keypress", function (e) {
	    if (e.keyCode == 13) {
	        $("#btnSearch").attr('value');
	        //add more buttons here
	        return false;
	    }
	});
</script>

</main>


<footer>

	<div class="container-fluid footer-1">
		<div class="col-lg-12"style="text-align: center">
			<?php clickToTop(); ?>
		</div>		
	</div>
	<div class="container footer-2">
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
</footer>



</body>
</html>