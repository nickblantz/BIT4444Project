<?php
$restricted_level = 0;
$page_name = 'Home Page';
require_once('Resources/lib/session_controller.php');

if(isset($_POST['restaurant_redirect']) && $_POST['restaurant_redirect'] === 'true') {
	require_once('Resources/lib/yelp_connector.php');
	$yelper = new YelpConnector();
	$result = $yelper -> restaurant_details($_POST['restaurant_id']);
	$_SESSION['active_restaurant'] = new Restaurant($result['id'], null, $result['name'], 0, $result['image_url'], $result['display_phone'], $result['price'], $result['location']['address1'], $result['location']['address2'], $result['location']['city'] , $result['location']['state'], $result['location']['zip_code']);
	header('location: ' . redirect_prefix('Restaurant/View'));
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
  <link rel="stylesheet" type="text/css" href="Resources/css/spinner.css" />
  <script>
	var RESTAURANT_DATA;
	var SLOTS_PER_REEL;
	
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(getData);
	} else { 
		console.log('not yet');
	}

	function getData(position) {
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'Resources/lib/get_restaurants.php', false);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.onreadystatechange = function(data) {
			if(xhttp.readyState == 4 && xhttp.status == 200) {
				RESTAURANT_DATA = JSON.parse(xhttp.response)['businesses'];
				SLOTS_PER_REEL = RESTAURANT_DATA.length;
			}
		}
		xhttp.send('latitude=' + position.coords.latitude + '&longitude=' + position.coords.longitude);
	}
  </script>
  <script src="Resources/js/spinner.js"></script>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row">
    <div class="col-12 justify-center">
     <h4>Welcome to Indecisive Eats!</h4>
    </div>
    <div id="rotate" class="col-12">
     <div id="ring"><h4 class="justify-center" id="loader">Loading...</h4></div>
	</div>
	<div class="col-md-3 d-none d-md-block justify-center"></div>
	<div class="col-6 col-md-3 justify-center">
     <label>Radius (Miles)</label><input type="number" min=1 max=25 name="search_radius" />
	</div>
	<div class="col-6 col-md-3 justify-center">
     <label>Price</label><input type="number" min=1 max=5 name="search_price" />
	</div>
	<div class="col-md-3 d-none d-md-block justify-center"></div>
	<div class="col-md-3 d-none d-md-block justify-center"></div>
	<div class="col-6 col-md-3 justify-center">
     <button id="go">Start spinning</button>
	</div>
	<div class="col-6 col-md-3 justify-center">
     <button id="redir" disabled >Go to Restaurant</button>
	</div>
	<div class="col-md-3 d-none d-md-block justify-center"></div>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>