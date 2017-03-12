<?php

	$adBanner=[];
	$laptop=[];
	$pagination=1;


	// returns array list of banner to display in main page
	function getAdBanner(){
		$adBanner = ["seagate"=>"https://promotions.newegg.com/seagate/17-0947/1920x360.jpg",
		"hpToner"=>"https://promotions.newegg.com/hp/17-0780/1920x360.jpg",
		"ryzen"=>"https://promotions.newegg.com/amd/17-1212/1920x360.jpg",
		"porsche"=>"https://promotions.newegg.com/marketplace/2017/17-1256/1920x360.jpg",
		"asus"=>"https://promotions.newegg.com/asus/17-0948/1920x360.jpg",
		"msi"=>"https://promotions.newegg.com/msi/17-1113/1920x360.jpg",
		"intel"=>"https://promotions.newegg.com/nepro/17-1450/1920x360.jpg",
		"perfect"=>"https://promotions.newegg.com/nepro/17-1354/1920x360.jpg"];
		return $adBanner;

	}

	// returns Array from featured.json
	function getLaptopLists(){
		// $laptop=[
		// ["prod_name"=>"Dell XPS 13",
		// "prod_model"=>"XPS9350-2008SLV",
		// "screen"=>"13.3 inch",
		// "memory"=>"8GB LPDDR3",
		// "cpu"=>"Intel Core i5-6200U 2.3 GHz",
		// "storage"=>"128GB SSD",
		// "graphics"=>"Intel HD Graphics 520",
		// "color"=>"Silver",
		// "image"=>"http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-03.jpg",
		// "curr_price"=>"$1000",
		// "disc_off"=>"0.01%",
		// "disc_price"=>"$999.99"
		// ],
		// ["prod_name"=>"Razer Blade Stealth",
		// "prod_model"=>"XPS9350-2008SLV",
		// "os"=>"Windows 10",
		// "screen"=>"12.5 inch",
		// "memory"=>"8GB LPDDR3",
		// "cpu"=>"Intel Core i7-6500U 2.5 GHz",
		// "storage"=>"128GB SSD",
		// "graphics"=>"Intel HD Graphics 520",
		// "color"=>"Black",
		// "image"=>"https://assets2.razerzone.com/images/razer-blade-stealth/ee05e32fd4d4fa4b25ef2be529358e4a-rgb-blade-stealth.jpg",
		// "curr_price"=>"$1000",
		// "disc_off"=>"0.01%",
		// "disc_price"=>"$999.99"
		// ],
		// ["prod_name"=>"Acer Predator VX 15",
		// "prod_model"=>"XPS9350-2008SLV",
		// "os"=>"OSX Sierra",
		// "screen"=>"15.6 inch",
		// "memory"=>"8GB LPDDR3",
		// "cpu"=>"Intel Core i7-6700HQ 2.60 GHz",
		// "storage"=>"512 SSD",
		// "graphics"=>"NVIDIA GeForce GTX 1070",
		// "color"=>"White",
		// "image"=>"http://images.anandtech.com/doci/10964/Acer%20Predator%2017%20X_GX-792_left%20facing%20Windows.jpg",
		// "curr_price"=>"$1000",
		// "disc_off"=>"0.01%",
		// "disc_price"=>"$999.99"
		// ],
		// ];

		// featured.json is placeholder and each featured section will have their own json files
		// $fp = fopen('featured.json', 'w');
		// fwrite($fp, json_encode($laptop,JSON_PRETTY_PRINT));

		// Once the arrays above are converted to json. Below will convert from JSON file to array form again.
		$laptop_json = file_get_contents('featured.json');
		$laptop = json_decode($laptop_json,true);
		return $laptop;
	}

	// echoes carousel of items to display in main page
	function echoFeaturedLaptop(){
		$laptops = getLaptopLists();
		foreach ($laptops as $key => $laptop_key) {
			echo "<div class='item' >";
			echo "	<div class='main-inner-item'>";
			echo "		<div class='main-item-photo' style='background: url(".$laptop_key['image'].") center/cover no-repeat; height: 150px'>
						</div>";
			echo "		<div class='main-item-desc'>";
			echo "			<p>".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os'].", ".$laptop_key['color']."</p>
						</div>";
			echo "		<div class='main-item-price'>
							<div class='item-price-curr'><span style='font-size: 16px;'>".$laptop_key['disc_price']."</span>
							</div>
							<div class='item-price-disc'>
								<span style='font-size: 12px;'>Before:</span>
								<span style='font-size: 12px; /*text-decoration: line-through; color: grey;*/'>".$laptop_key['curr_price']."</span>
								<span style='font-weight: bold; font-size: 12px;'>(".$laptop_key['disc_off']." off)</span>
							</div>
						</div>";
			echo "	</div>";
			echo "	<div class='main-item-btn-cust' style='display: block;'>
						<form method='POST'>
							<a href='check.php?key=$key'><input type='button' name='seeItemBtn' class='btn btn-default form-control' value='Check Item'></a>
						</form>
					</div>
				</div>";	
		}
		
	}

	// echoes admin button if user is admin
	function echoAdminBtn($x){
		try{
			if($_SESSION['username']=="admin" && $_SESSION['role']=='admin'){
			echo "<div class='row main-item-btn-admin' style='display: block;'>
						<form method='POST'>
							<input type='submit' name='manageItemBtn$x' class='btn btn-default form-control' value='Admin: Manage Items'>
						</form>
					</div>";
			}
		}
		catch(Exception $e){

		}
	}


	// echoes carousel of ad banners in main page
	function echoCarouselItems(){
		$adBanner = getAdBanner();
		foreach ($adBanner as $key => $value) {
			echo "<div class='item' style='background: url(".$value.") center/cover no-repeat; height:350px;'>
			</div>";

		}
	}

	// echoes navbar change when user is logged in or logged out
	function echoNavbarRight(){
		if($_SESSION['username']==""){
			echo "<ul class='nav navbar-nav navbar-right'>
      	<li><a href='login.php'>Login or Register</a></li>
      </ul>";
		}
		else{
			echo "<ul class='nav navbar-nav navbar-right'>
        
        <li><a class='welcome'>Welcome ".$_SESSION['username'].".</a></li>
        <li class='dropdown' style='margin-right: 15px;'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>My Account<span class='caret'></span></a>
          <ul class='dropdown-menu'>";
            if($_SESSION['username']=='admin'){
            	echo "<li><a>View All Users</a></li>";
            	echo "<li><a href='admin-manage.php'>View All Laptops</a></li>";
            	echo "<li><a>View All Transactions</a></li>";
            }
            else{
            	echo "<li><a href='cart-items.php'>View Cart Items</a></li>
            <li><a href='transactions.php'>Check Transaction History 
              </a></li>";
            }
            echo "<li role='separator' class='divider'></li>
            <li><a href='logout.php'>Log Out</a></li>
          </ul>
        </li>
      </ul>";
		}
	}

	function adminDeleteItem(){

	}

	function clickToTop(){
		echo "<span class='text-center glyphicon glyphicon glyphicon-menu-up' style='color:white;font-size:18	px'></span>
			<div class='text-center' style='color:white;'>Back To Top</div>
			";
		echo "<script>
				function toTop(){
					$('html, body').animate({ scrollTop: 0 }, 'fast');
				}
		</script>";
	}

	function echoNewArrivals(){
		$laptop = getLaptopLists();
		foreach ($laptop as $key => $laptop_key) {
			echo "<div class='item' style='position:relative;'>
					<div class='new-bg'>
						<div style='background: url(".$laptop_key['image'].") center/contain no-repeat; height: 140px;'></div>
						<div style='height: 100px'>
							<p>".$laptop_key["prod_name"]." ".$laptop_key['cpu']." ".$laptop_key['storage']." ".$laptop_key['memory']." ".$laptop_key['graphics']." ".$laptop_key['screen']." ".$laptop_key['os'].", ".$laptop_key['color']."</p>
						</div>
						<div class=''>
							<div class='item-price-curr'><span style='font-size: 16px;'>".$laptop_key['disc_price']."</span>
							</div>
							<div class='item-price-disc'>
								<span style='font-size: 12px;'>Before:</span>
								<span style='font-size: 12px; /*text-decoration: line-through; color: grey;*/'>".$laptop_key['curr_price']."</span>
								<span style='font-weight: bold; font-size: 12px;'>(".$laptop_key['disc_off']." off)</span>
							</div>
						</div>
						<div>
							<form method='POST'>
								<a href='check.php?key=".$key."'>
									<input type='button' name='seeItemBtn' class='btn btn-default form-control' value='Check Item'>
								</a>
							</form>
						</div>
					</div>
				</div>";
		}
	}

?>

				