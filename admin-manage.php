<!DOCTYPE html>
<html>
<head>
	<title>Manage Featured Items: Admin</title>
	<style type="text/css">
		form label{
			font-weight: bold;
		}
		form input{
			width: 50%;
		}
	</style>
</head>
<body>

<?php
	session_start();
	require_once('main-functions.php');

	if($_SESSION['role']=='admin'){
		echo "<script>alert('Welcome Admin.')</script>";
		$laptop = getLaptopLists();
		$ctr_lap = -1;
		foreach ($laptop as $laptop_key) {
			$ctr_lap++;
			echo "			<p>(".$ctr_lap.") ".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os']." - ".$laptop_key['color']."</p>";
		}

		echo "<form method='POST'>
			<label>Pick the number of the item you want to delete</label><br>
			<input type='number' name='delItemInput' min='0' max='".$ctr_lap."'><br>
			<input type='submit' name='submit_del' value='Delete Item'>
			</form>";

		// function for deleting an item
		if(isset($_POST['submit_del'])){
			
			// Before unset
			// print_r($laptop);
			// echo "<br>";
			// echo "<br>";

			$delete = $_POST['delItemInput'];
		 	unset($laptop[$delete]);
		 	
		 	// After unset
		 	// print_r($laptop);
		 	// echo "<br>";
			// echo "<br>";

		 	// Renumbered the newly updated arrays
		 	$laptop = array_values($laptop);
		 	
		 	// print_r($laptop);

		 	// $fp = fopen('featured.json', 'w');
		 	// fwrite($fp, json_encode($laptop,JSON_PRETTY_PRINT));
		 	// fclose($fp);
		}

		// function for adding a new featured item
		if(isset($_POST['submit_add'])){
			$add_item = [
			"prod_name"=>$_POST['prod_name_add'],
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

			// Get Laptop list and then push a new item on list
			$laptop = getLaptopLists();
			$laptop[] = $add_item;
			$laptop = array_values($laptop);

			// Convert Array to JSON and write onto file.
			$fp = fopen('featured.json', 'w');
			fwrite($fp, json_encode($laptop,JSON_PRETTY_PRINT));

			echo "<script>alert('Added Item Successfully')</script>";
		}
	}

	else{
		echo "<script>alert('Wrong page. Redirecting to main page.')</script>";
		echo "<script>windows.location.href='template.php'</script>";
	}

?>

<hr>
<h4>Add an Item</h4>
<p>Enter the information of the item you want to add on the main page.</p>
<form method="POST">
	<label>Product Name</label><br>
	<input type="text" name="prod_name_add"><br>
	<label>CPU</label><br>
	<input type="text" name="cpu_add"><br>
	<label>Storage</label><br>
	<input type="text" name="storage_add"><br>
	<label>Memory</label><br>
	<input type="text" name="memory_add"><br>
	<label>Graphics</label><br>
	<input type="text" name="graphics_add"><br>
	<label>Screen Display & Size</label><br>
	<input type="text" name="screen_add"><br>
	<label>Operating System</label><br>
	<input type="text" name="os_add"><br>
	<label>Device Color</label><br>
	<input type="text" name="color_add"><br>
	<label>Image of the item (HTML link for the meantime)</label><br>
	<input type="text" name="image_add"><br>
	<label>Undiscounted price of the item</label><br>
	<input type="text" name="curr_price_add"><br>
	<label>Percentage discount of the item (50%, 25%, etc.)</label><br>
	<input type="text" name="disc_off_add"><br>
	<label>Discounted price of the item</label><br>
	<input type="text" name="disc_price_add"><br><br>
	<input type="submit" name="submit_add">
</form>



</body>
</html>