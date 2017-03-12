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

	require_once('main-functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart Items: <?php echo $_SESSION['username']?></title>

	<!-- Latest compiled and minified CSS Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Carousel Assets -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">

	<!-- Bootstrap 4 CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css"> -->

	<!-- Bootstrap 4 JS -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> -->


	<!-- My Style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Main Page Item Heading Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

	<!-- Code for adding icon on web browser window -->
	<link rel="shortcut icon" type="image/x-icon" href="res/favicon4.ico" />

	<style type="text/css">
		table, table *, table * *{
			box-sizing: border-box;
		}
		thead{
			background-color: #474747;
		}
		thead th{
			color: white;
		}
		tr th:first-of-type{
			width: 150px;
		    text-align: center;

		}
		.table-price{
			width: 150px;
		}/*
		.table-items{
			width: 400px;
		}*/

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

<div class="container-fluid">

<h3 style="padding:10px 0"><?php echo $_SESSION['username']?>'s Shopping Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>
</h3>


<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Quantity</th>
      <th class="text-center table-items">Items</th>
      <th class="table-price text-center">Unit Price</th>
      <th class="text-center table-price">Total Price</th>
      <th class="text-center">Action</th>
    </tr>

  </thead>
  <tbody>


  	<?php

  	
		if ($_SESSION['role']!='regular') {
		}
		else{
			$laptop = getLaptopLists();
			if(!empty($_SESSION['cart_items'])){
				foreach (array_keys($_SESSION['cart_items']) as $prod_mod) {
					foreach ($laptop as $key => $laptop_key) {
						if($laptop_key['prod_model']==$prod_mod){
							echo "<tr class='table-items'>
						      	<th scope='row' style='line-height: 70px'>".$_SESSION['cart_items'][$prod_mod]."</th>
						      	<td class='row' style='padding:15px 0 10px'>
									<div class='col-lg-3' style='background: url(".$laptop_key['image'].") center/contain no-repeat; height: 70px; '></div>
									<div class='col-lg-9' style='display: inline-block; vertical-align: middle;'>".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os'].", ".$laptop_key['color']."</div>
								</td>
						      	<td class='table-price text-center' style='line-height: 70px'>".$laptop_key['disc_price']." /ea</td>
						      	<td class='text-center table-price' style='line-height: 70px'>";
						    echo "$".(substr($laptop_key['disc_price'],1)*$_SESSION['cart_items'][$prod_mod]);
						    echo  	"</td>
						    	<td class='text-center'>"; ?>
						    		<form method='POST' action='cart-items.php?del=<?php echo $laptop_key['prod_model'] ?>'>
						    			<input class='btn btn-danger' type='submit' value='Delete' name='submit_delete' style="line-height: 70px">
						    		</form>
						    		
						    <?php
						    removeCartItem($laptop_key);		
						    echo "</td>
						    </tr>";
						}
					}
				}
			}
			else{
				echo "<tr>
				<th class='text-center' colspan='5' style='padding:20px'>Empty Cart <i class='fa fa-cart-arrow-down' aria-hidden='true'></i>
</th>
				</tr>";

			}
		}

		function removeCartItem($laptop_key){

			if(isset($_POST['submit_delete'])){
				unset($_SESSION['cart_items'][$_GET['del']]);
				echo "<script>window.location.href= 'cart-items.php'</script>";
			}
		}

		if(isset($_POST['submit_checkOut'])){

			$time = date("Y-m-d h:i:sa");
			$transactions = file_get_contents('transaction.json');
			$checkOutItems = json_decode($transactions,true);
			$laptop = getLaptopLists();
			$checkOutItems[$_SESSION['username']][$time]=[];

			foreach (array_keys($_SESSION['cart_items']) as $prod_mod) {
				foreach ($laptop as $key => $laptop_key) {
					if ($prod_mod == $laptop_key['prod_model']) {
						$checkOutItems[$_SESSION['username']][$time][]= array(
						"prod_name"=>$laptop_key['prod_name'],
						"prod_model"=>$laptop_key['prod_model'],
						"os"=>$laptop_key['os'],
						"screen"=>$laptop_key['screen'],
						"memory"=>$laptop_key['memory'],
						"cpu"=>$laptop_key['cpu'],
						"storage"=>$laptop_key['storage'],
						"graphics"=>$laptop_key['graphics'],
						"color"=>$laptop_key['color'],
						"image"=>$laptop_key['image'],
						"curr_price"=>$laptop_key['curr_price'],
						"disc_off"=>$laptop_key['disc_off'],
						"disc_price"=>$laptop_key['disc_price'],
						"quantity"=>$_SESSION['cart_items'][$prod_mod],
						"total_price"=>(substr($laptop_key['disc_price'],1)*$_SESSION['cart_items'][$prod_mod]),
						);
					}
				}
			}
			// echo var_dump($checkOutItems);
			$fp = fopen('transaction.json', 'w');
			fwrite($fp, json_encode($checkOutItems,JSON_PRETTY_PRINT));
			fclose($fp);
			$_SESSION['cart_items']=[];

			
			echo "<script>window.location.href= 'cart-items.php'</script>";


		}


  	?>



  </tbody>
</table>

<div class="row">
	<div class="col-lg-offset-8 col-lg-4">
		<form method="POST" class="btn-group btn-group-justified">
			<div class="btn-group">
				<input class="btn btn-warning" type="button" value="Go back to shopping" onclick="goBack()"></input>
			</div>
			<?php 

				if(empty($_SESSION['cart_items'])){

				}
				else{
					echo "<div class='btn-group'>
					<input class='btn btn-success' type='submit' value='Check Out' name='submit_checkOut'></input>
					</div>";
				}
			?>
		</form>
	</div>
</div>



<!-- Scripts -->
<script type="text/javascript">
	
	function goBack(){
		// window.history.back();
		window.location.href='template.php';
	}
</script>
</div>

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