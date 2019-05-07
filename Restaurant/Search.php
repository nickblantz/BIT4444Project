<?php
$restricted_level = 2;
$page_name = 'Restaurant Search';
require_once('../Resources/lib/session_controller.php');
require_once('../Resources/lib/yelp_connector.php');

if(isset($_POST['rest_id']) && $_POST['rest_id'] != "") {
	$connector = new MySQLConnector();
	if (mysqli_fetch_array($connector->query("SELECT COUNT(1) FROM `restaurant` WHERE `restaurant_id` = '" . $_POST['rest_id'] . "'"))['COUNT(1)'] < 1) {
		$yelp_connector = new YelpConnector();
		$result = $yelp_connector -> restaurant_details($_POST['rest_id']);
		
		Restaurant::create_restaurant($result['id'], $_SESSION['active_user']->user_id, $result['name'], 0, $result['image_url'], $result['display_phone'], $result['price'], $result['location']['address1'], $result['location']['address2'], $result['location']['city'] , $result['location']['state'], $result['location']['zip_code']);
		header('location: ' . redirect_prefix('Restaurant\Edit.php'));
	} else {
		$claim_error = true;
	}
}

if (isset($_POST['search_submit']) && $_POST['search_submit'] != "") {
	$address_1 = null;
	$address_2 = null;
	$city = null;
	$state = null;
	$zipcode = null;
	$error = false;
	
	if (isset($_POST['address_1']) && $_POST['address_1'] != "") {
		$address_1 =  $_POST['address_1'];
	} else {
		$error = true;
	}
	if (isset($_POST['address_2']) && $_POST['address_2'] != "") {
		$address_2 =  $_POST['address_2'];
	} else {
		
	}
	if (isset($_POST['city']) && $_POST['city'] != "") {
		$city =  $_POST['city'];
	} else {
		$error = true;
	}
	if (isset($_POST['state']) && $_POST['state'] != "") {
		$state =  $_POST['state'];
	} else {
		$error = true;
	}
	if (isset($_POST['zipcode']) && $_POST['zipcode'] != "") {
		$zipcode =  $_POST['zipcode'];
	} else {
		$error = true;
	}
	
	if (!$error) {
		$connector = new YelpConnector();
		$radius_miles = 0.05;
		$address = $address_1 . ', ' . $city . ', ' . $state . ' ' . $zipcode;
		$result = $connector -> restaurant_search(array( 'location' => $address, 'radius' => (integer) ($radius_miles * 1609)));
	}
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <form method="POST">
    <div class="input-group row justify-content-md-center no-gutters mx-auto">
     <div class="col-xl-2 col-sm-4 col-6">
      <input class="form-control py-2 border <?php if (isset($address_1) && $address_1 == null) echo "border-danger"; ?>" value="<?php if (isset($address_1)) echo $address_1; ?>" type="search" placeholder="Address 1" name="address_1" />
     </div>
	 <div class="col-xl-2 col-sm-4 col-6">
	  <input class="form-control py-2 border <?php if (isset($address_2) && $address_2 == null) echo "border-danger"; ?>" value="<?php if (isset($address_2)) echo $address_2; ?>" type="search" placeholder="Address 2" name="address_2" />
	 </div>
	 <div class="col-xl-2 col-sm-4 col-6">
	  <input class="form-control py-2 border <?php if (isset($city) && $city == null) echo "border-danger"; ?>" value="<?php if (isset($city)) echo $city; ?>" type="search" placeholder="City" name="city" />
	 </div>
	 <div class="col-xl-2 col-sm-4 col-6">
	  <input class="form-control py-2 border <?php if (isset($state) && $state == null) echo "border-danger"; ?>" value="<?php if (isset($state)) echo $state; ?>" type="search" placeholder="State" name="state" />
	 </div>
	 <div class="col-xl-2 col-sm-4 col-6">
	  <input class="form-control py-2 border <?php if (isset($zipcode) && $zipcode == null) echo "border-danger"; ?>" value="<?php if (isset($zipcode)) echo $zipcode; ?>" type="search" placeholder="Zipcode" name="zipcode" />
	 </div>
	 <div class="col-xl-1 col-sm-4 col-6">
      <span class="input-group-append" style="height: 38px;">
       <input class="btn btn-outline-secondary border" type="submit" value="Search" name="search_submit" />
      </span>
	 </div>
    </div>
   </form>
   <br /><br />
   <form method="POST">
	<div id="search-results">
	 <?php 
		if (isset($error) && !$error) {
			foreach($result['businesses'] as $restaurant) {
				if ($address_1 == $restaurant['location']['address1']) {
					echo "<div class='row border mx-auto'>";
					echo "<div class='col-sm-3 d-none d-sm-block justify-center'>";
					echo "<img src='" . $restaurant['image_url'] . "' class='rounded-circle search-result-thumbnail'>";
					echo "</div>";
					echo "<div class='col-8 col-sm-6'>";
					echo "<h2>" . $restaurant['name'] . "</h2>";
					if ($restaurant['location']['address2'] != "") {
						echo "<p>" . $restaurant['location']['address1'] . "<br />" . $restaurant['location']['address2'] . "<br />" . $restaurant['location']['city'] . ", " . $restaurant['location']['state'] . " " . $restaurant['location']['zip_code'] . "</p>";
					} else {
						echo "<p>" . $restaurant['location']['address1'] . "<br />" . $restaurant['location']['city'] . ", " . $restaurant['location']['state'] . " " . $restaurant['location']['zip_code'] . "</p>";
					}
					echo "</div>";
					echo "<div class='col-4 col-sm-3 justify-center'>";
					echo "<button name='rest_id' value='" . $restaurant['id'] . "' class='btn btn-outline-secondary border search-result-claim'>";
					echo "<img src='../Resources/images/checkmark-26.png' />";
					echo "<span>Claim</span>";
					echo "</button>";
					echo "</div>";
					echo "</div>";
					echo "<br />";
				}
			}
		} elseif (isset($claim_error) && $claim_error) {
			echo "<h3>Selected restaurant has already been claimed</h3>";
		}
     ?>
	</div>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>