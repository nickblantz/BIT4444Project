<?php
$restricted_level = 0;
$page_name = 'Home Page';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
	<?php
	require_once('Resources/lib/yelp_connector.php');
	$connector = new YelpConnector();
	$radius_miles = 10;
	$address = '23059';
	$price = array(1, 2);

	$result = $connector -> restaurant_details('WDpeRcUdWEgt1sPHZy-10Q');
	echo json_encode($result);
	?>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>