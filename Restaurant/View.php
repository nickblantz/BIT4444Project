<?php
$restricted_level = 0;
$page_name = 'Restaurant View';
require_once('../Resources/lib/session_controller.php');

if (!isset($_SESSION['active_restaurant'])) {
	header('location: ' . redirect_prefix('index.php'));
}

$restaurant_id = $_SESSION['active_restaurant']->restaurant_id;
$restaurant_name = $_SESSION['active_restaurant']->name;
$restaurant_address = $_SESSION['active_restaurant']->address_1;
if ($_SESSION['active_restaurant']->address_2 != '') {
	$restaurant_address .= '<br />' . $_SESSION['active_restaurant']->address_2;
}
$restaurant_address .= '<br />' . $_SESSION['active_restaurant']->city . ', ' . $_SESSION['active_restaurant']->state . ' ' . $_SESSION['active_restaurant']->zipcode;
$restaurant_phone = $_SESSION['active_restaurant']->phone_number;
$restaurant_price = $_SESSION['active_restaurant']->price;
if ($_SESSION['active_restaurant']->local_img == 1) {
	$restaurant_image = redirect_prefix($_SESSION['active_restaurant']->image_url);
} else {
	$restaurant_image = $_SESSION['active_restaurant']->image_url;
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="container">
    <div class="row">
	 <div id="restaurant-view-photo" class="col-12 col-lg-6 offset-lg-2 order-lg-last" style="background-image: url('<?php echo $restaurant_image; ?>');"></div>
	 
	 <div class="col-12 col-lg-4 my-auto">
	  <br class="d-block d-lg-none"/>
	  <div class="col mb-4"><h3><?php echo $restaurant_name; ?></h3></div>
	  <div class="col ml-4"><h4><?php echo $restaurant_address; ?></h4></div>
	  <div class="col ml-4"><h4><?php echo $restaurant_phone; ?></h4></div>
	  <div class="col ml-4"><h4>Price: <?php echo $restaurant_price; ?></h4></div>
	 </div>
	</div>
	<br />
	<br />
	<div class="row">
	 <div class="col col-lg-7 mx-auto border">
	  <div class="row py-1 border-bottom">
	   <div class="col-6">
	    <h4 class="my-auto">Reviews</h4>
	   </div>
	   <div class="col-6 justify-right">
	    <h4 class="my-auto"><?php if (isset($_SESSION['active_user'])) echo "<a href='Review'>New Review</a>"; ?></h4>
	   </div>
	  </div>
	  <div id="review-container" class="row">
	   <?php
		$connector = new MySQLConnector();
		$result = $connector->query("SELECT r.*, u.`first_name`, u.`last_name` FROM `review` AS r INNER JOIN `user` AS u ON r.`user_id` = u.`user_id` WHERE r.`restaurant_id` = '" . $restaurant_id . "'");
		while($row = mysqli_fetch_array($result)) {
			$stars = '';
			$counter = 0;
			while($counter < $row['star_review']) {
				$stars .= "<img src='../Resources/images/star-filled-25.png' />";
				$counter++;
			}
			while($counter < 5) {
				$stars .= "<img src='../Resources/images/star-unfilled-25.png' />";
				$counter++;
			}
			echo "<div class='row border-bottom mx-1 py-1 w-100'>";
			echo "<div class='col-8 my-2'>";
			echo "<h5>" . $row['first_name'] . " " . $row['last_name'] . "<br />" . $stars . "</h5>";
			echo "</div>";
			echo "<div class='col-4 my-2'>";
			echo "<p style='margin-bottom: 0px;'>" . date_format(date_create($row['timestamp']), 'd/m/Y') . "</p>";
			echo "</div>";
			echo "<div class='col-12'>";
			echo "<p>" . $row['text_review'] . "</p>";
			echo "</div>";
			echo "</div>";
		}
	   ?>
	  </div>
	 </div>
	</div>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>