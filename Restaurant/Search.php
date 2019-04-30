<?php
$restricted_level = 2;
$page_name = 'Search';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if(isset($_POST['rest_id']) && $_POST['rest_id'] != "") {
	$connector = new MySQLConnector();
	if (mysqli_fetch_array($connector->query("SELECT COUNT(1) FROM `restaurant` WHERE `restaurant_id` = '" . $_POST['rest_id'] . "'"))['COUNT(1)'] < 1) {
		$connector->query("INSERT INTO `restaurant` (`restaurant_id`, `owner_id`, `blurb`) VALUES ('" . $_POST['rest_id'] . "', '" . $_SESSION['active_user']->user_id . "', '')");
		$_SESSION['active_restaurant'] = new Restaurant($_POST['rest_id'], $_SESSION['active_user']->user_id, '');
		$_POST = array();
		header('location: ' . redirect_prefix('Restaurant\Edit'));
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
		require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/yelp_connector.php');
		
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
	 <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/components/search_results.php'); ?>
	</div>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>