<?php 
session_start(); 
require_once('main-functions.php'); 
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Manage Featured Items: Admin</title>
	<style type="text/css">
		form label{
			font-weight: bold;
		}
		form input{
			width: 50%;
		}
		table, th, td, tr{
			border-collapse: collapse;
			border: 1px solid black;
		}
		.tab-content > div {
			margin: 0 20px;
		}
		input[type="text"]{
			box-shadow: none;
			border:1px solid grey;
		}
	</style>

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
		.featured-admin{
			border: 1px solid #eee;
			padding-top: 20px;
			padding-bottom: 20px;
			height: 300px;
		}
		.addDiv:hover{
			cursor: cell;
		}
		#addModal{
			height: 600px;
		}
		.modal-dialog{
			margin:0;
			margin-right: 0;
			width: 100%;
		}
		.modal{
			height: 90vh;
		}
		.form-control{
			border-radius: none;
		}
	</style>

</head>
<body>

<header>

	<a href="template.php">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12" id="logo"></div>
			</div>
		</div>
	</a>


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
<br>
<div class="container-fluid">
	<div class="row featured-title">
		<h2><span style="background: white;padding: 0 10px;font-family: 'Open Sans Condensed', sans-serif; font-weight: bold; font-size: 30px;">Featured Items</span></h2>
	</div>

	<div class="row">
		<?php 

			$laptop = getLaptopLists();
			foreach ($laptop as $key => $laptop_key) {
				# code...

			echo "<div class='col-lg-3 featured-admin' style='height: 300px;position: relative; margin-top:'>
				<div style='background: url(".$laptop_key['image'].") center/cover no-repeat; height: 150px; width:250px'>
				</div>

				<div>
					<p>".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os'].", ".$laptop_key['color']."</p>
				</div>

				<div role='group' aria-label='...' style='position: absolute;bottom:0' class=''>
					<div class='btn-group' role='group'>
						<a href='#addModal$key'><input type='button' class='btn btn-info' value='Insert New Item' data-toggle='modal' data-target='#addModal$key'></a>
					</div>
					<div class='btn-group' role='group'>
						<a href='#editModal$key'><input type='button' class='btn btn-warning' value='Edit'  data-toggle='modal' data-target='#editModal$key'></a>
					</div>
					<div class='btn-group' role='group'>
						<a href='#deleteModal$key'><input type='button' class='btn btn-danger' value='Delete' data-toggle='modal' data-target='#deleteModal$key'></a>
					</div>
				</div>
			</div>";

			?>

<!-- Add Modal -->
<div id="addModal<?php echo $key; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item Info</h4>
      </div>
      <div class="modal-body">
        <form method='POST' style='' action='admin-manage.php?index=<?php echo $key; ?>'>
				<label>Product Name</label><br>
				<input class="form-control" type='text' name='prod_name_add'><br>
				<label>Product Brand</label><br>
				<input class="form-control" type='text' name='brand_add'><br>
				<label>Product Model</label><br>
				<input class="form-control" type='text' name='prod_model_add'><br>
				<label>CPU</label><br>
				<input class="form-control" type='text' name='cpu_add'><br>
				<label>Storage</label><br>
				<input class="form-control" type='text' name='storage_add'><br>
				<label>Memory</label><br>
				<input class="form-control" type='text' name='memory_add'><br>
				<label>Graphics</label><br>
				<input class="form-control" type='text' name='graphics_add'><br>
				<label>Screen Display and Size</label><br>
				<input class="form-control" type='text' name='screen_add'><br>
				<label>Operating System</label><br>
				<input class="form-control" type='text' name='os_add'><br>
				<label>Device Color</label><br>
				<input class="form-control" type='text' name='color_add'><br>
				<label>Image of the item (HTML link for the meantime)</label><br>
				<input class="form-control" type='text' name='image_add'><br>
				<label>Undiscounted price of the item</label><br>
				<input class="form-control" type='text' name='curr_price_add'><br>
				<label>Percentage discount of the item (50%, 25%, etc.)</label><br>
				<input class="form-control" type='text' name='disc_off_add'><br>
				<label>Discounted price of the item</label><br>
				<input class="form-control" type='text' name='disc_price_add'><br><br>
				<input class="form-control btn btn-danger" type='submit' name='submit_add'>
			</form>
      </div>
      <div class="modal-footer">
      	<form>
	        <input type="button" class="form-control btn btn-warning" data-dismiss="modal" value="Close"></input>
        </form>
      </div>
    </div>

  </div>
</div>



<!-- Edit Modal -->
<div id="editModal<?php echo $key; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item Info</h4>
      </div>
      <div class="modal-body">
        <form method='POST' style='' action='admin-manage.php?index=<?php echo $key; ?>'>
				<label>Product Name</label><br>
				<input class="form-control" type='text' name='prod_name_edit' value="<?php echo $laptop_key['prod_name']?>"><br>
				<label>Product Brand</label><br>
				<input class="form-control" type='text' name='brand_edit' value='<?php echo $laptop_key['brand'] ?>'><br>
				<label>Product Model</label><br>
				<input class="form-control" type='text' name='prod_model_edit'><br>
				<label>CPU</label><br>
				<input class="form-control" type='text' name='cpu_edit' value="<?php echo $laptop_key['cpu']?>"><br>
				<label>Storage</label><br>
				<input class="form-control" type='text' name='storage_edit' value="<?php echo $laptop_key['storage']?>"><br>
				<label>Memory</label><br>
				<input class="form-control" type='text' name='memory_edit' value="<?php echo $laptop_key['memory']?>"><br>
				<label>Graphics</label><br>
				<input class="form-control" type='text' name='graphics_edit' value="<?php echo $laptop_key['graphics']?>"><br>
				<label>Screen Display & Size</label><br>
				<input class="form-control" type='text' name='screen_edit' value="<?php echo $laptop_key['screen']?>"><br>
				<label>Operating System</label><br>
				<input class="form-control" type='text' name='os_edit' value="<?php echo $laptop_key['os']?>"><br>
				<label>Device Color</label><br>
				<input class="form-control" type='text' name='color_edit' value="<?php echo $laptop_key['color']?>"><br>
				<label>Image of the item (HTML link for the meantime)</label><br>
				<input class="form-control" type='text' name='image_edit' value="<?php echo $laptop_key['image']?>"><br>
				<label>Undiscounted price of the item</label><br>
				<input class="form-control" type='text' name='curr_price_edit' value="<?php echo $laptop_key['curr_price']?>"><br>
				<label>Percentage discount of the item (50%, 25%, etc.)</label><br>
				<input class="form-control" type='text' name='disc_off_edit' value="<?php echo $laptop_key['disc_off']?>"><br>
				<label>Discounted price of the item</label><br>
				<input class="form-control" type='text' name='disc_price_edit' value="<?php echo $laptop_key['disc_price']?>"><br><br>
				<input class="form-control btn btn-danger" type='submit' name='submit_edit' value="Modify" >
			</form>
      </div>
      <div class="modal-footer">
      	<form>
	        <input type="button" class="form-control btn btn-warning" data-dismiss="modal" value="Close"></input>
        </form>
      </div>
    </div>

  </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal<?php echo $key ?>" role='dialog'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Deleting an Item</h4>
			</div>
			<div class="modal-body">
				<p>You are deleting an item. Do you wish to continue?</p>
			</div>
			<div class="modal-footer">
				<form method="POST" action='admin-manage.php?index=<?php echo $key; ?>'>			
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group">
					        <input type="submit" class="btn btn-danger" value="Yes" name="submit_delete"></input>
				        </div>
						<div class="btn-group">
					        <input type="button" class="btn btn-warning" data-dismiss="modal" value="Go back"></input>
				        </div>
			        </div>
		        </form>
			</div>
		</div>
	</div>
</div>

			<?php
			}

			echo "<div class='featured-admin col-lg-3 addDiv' style='height:300px'>
				<a data-toggle='modal' data-target='#addModal".($key+1)."'><div style='background: url(res/add.ico) center/contain no-repeat; height:250px' alt='Add Item' title='Add Item'></div></a>
			</div>";
		?>

<!-- Add Modal on last part -->
<div id="addModal<?php echo $key+1; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item Info</h4>
      </div>
      <div class="modal-body">
        <form method='POST' style='' action='admin-manage.php?index=<?php echo $key+1; ?>'>
				<label>Product Name</label><br>
				<input class="form-control" type='text' name='prod_name_add'><br>
				<label>Product Brand</label><br>
				<input class="form-control" type='text' name='brand_add'><br>
				<label>Product Model</label><br>
				<input class="form-control" type='text' name='prod_model_add'><br>
				<label>CPU</label><br>
				<input class="form-control" type='text' name='cpu_add'><br>
				<label>Storage</label><br>
				<input class="form-control" type='text' name='storage_add'><br>
				<label>Memory</label><br>
				<input class="form-control" type='text' name='memory_add'><br>
				<label>Graphics</label><br>
				<input class="form-control" type='text' name='graphics_add'><br>
				<label>Screen Display & Size</label><br>
				<input class="form-control" type='text' name='screen_add'><br>
				<label>Operating System</label><br>
				<input class="form-control" type='text' name='os_add'><br>
				<label>Device Color</label><br>
				<input class="form-control" type='text' name='color_add'><br>
				<label>Image of the item (HTML link for the meantime)</label><br>
				<input class="form-control" type='text' name='image_add'><br>
				<label>Undiscounted price of the item</label><br>
				<input class="form-control" type='text' name='curr_price_add'><br>
				<label>Percentage discount of the item (50%, 25%, etc.)</label><br>
				<input class="form-control" type='text' name='disc_off_add'><br>
				<label>Discounted price of the item</label><br>
				<input class="form-control" type='text' name='disc_price_add'><br><br>
				<input class="form-control btn btn-danger" type='submit' name='submit_add'>
			</form>
      </div>
      <div class="modal-footer">
      	<form>
	        <input type="button" class="form-control btn btn-warning" data-dismiss="modal" value="Close"></input>
        </form>
      </div>
    </div>

  </div>
</div>
	</div>




<?php

	if($_SESSION['role']=='admin'){
		
		if(isset($_POST['submit_add'])){
			$laptop = getLaptopLists();
			$add_item[] = [
			"prod_name"=>$_POST['prod_name_add'],
			"prod_model"=>$_POST['prod_model_add'],
			"brand"=>$_POST['brand_add'],
			"os"=>$_POST['os_add'],
			"screen"=>$_POST['screen_add'],
			"memory"=>$_POST['memory_add'],
			"cpu"=>$_POST['cpu_add'],
			"storage"=>$_POST['storage_add'],
			"graphics"=>$_POST['graphics_add'],
			"color"=>$_POST['color_add'],
			"image"=>$_POST['image_add'],
			"curr_price"=>$_POST['curr_price_add'],
			"disc_off"=>$_POST['disc_off_add'],
			"disc_price"=>$_POST['disc_price_add'],
			];
			$slice_start = array_slice($laptop, 0,$_GET['index']);
			$slice_end = array_slice($laptop,$_GET['index']);
			$slice_merge = array_merge($slice_start,$add_item,$slice_end);
			print_r($slice_merge);
			
			$fp = fopen('featured.json', 'w');
			fwrite($fp, json_encode($slice_merge,JSON_PRETTY_PRINT));
			fclose($fp);
			echo "<script> window.location.href = 'admin-manage.php';</script>";
		}

		if(isset($_POST['submit_delete'])){
			$laptop = getLaptopLists();

			// Deleting an item and rearranging index
			unset($laptop[$_GET['index']]);
			$laptop = array_values($laptop);

			$fp = fopen('featured.json', 'w');
			fwrite($fp, json_encode($laptop,JSON_PRETTY_PRINT));
			fclose($fp);
			echo "<script> window.location.href = 'admin-manage.php';</script>";
		}

		if(isset($_POST['submit_edit'])){
			$laptop = getLaptopLists();

			$editItem = [
			"prod_name"=>$_POST['prod_name_edit'],
			"prod_model"=>$_POST['prod_model_edit'],
			"brand"=>$_POST['brand_edit'],
			"os"=>$_POST['os_edit'],
			"screen"=>$_POST['screen_edit'],
			"memory"=>$_POST['memory_edit'],
			"cpu"=>$_POST['cpu_edit'],
			"storage"=>$_POST['storage_edit'],
			"graphics"=>$_POST['graphics_edit'],
			"color"=>$_POST['color_edit'],
			"image"=>$_POST['image_edit'],
			"curr_price"=>$_POST['curr_price_edit'],
			"disc_off"=>$_POST['disc_off_edit'],
			"disc_price"=>$_POST['disc_price_edit'],
			];

			$laptop[$_GET['index']]=$editItem;

			$fp = fopen('featured.json', 'w');
			fwrite($fp, json_encode($laptop,JSON_PRETTY_PRINT));
			fclose($fp);

			echo "<script> document.location = 'admin-manage.php';</script>";

		}


	}

	else{
		echo "<script> document.location = 'template.php';</script>";
	}

?>

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