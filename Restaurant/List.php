<?php
$restricted_level = 0;
$page_name = 'My Restaurants';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div id="restaurant-list">
	<?php
	$connector = new MySQLConnector();
	$result = $connector -> query("SELECT * FROM `restaurant` WHERE `owner_id` = " . $_SESSION['active_user']->user_id);
	while($row = mysqli_fetch_array($result)) {
		echo "<div class='row border mx-auto'>";
		echo "<div class='col-sm-3 d-none d-sm-block justify-center'>";
		echo "<img src='" . 'https://s3-media2.fl.yelpcdn.com/bphoto/OqwAQIh_rUn4MAm0LcN5nA/o.jpg' . "' class='rounded-circle search-result-thumbnail'>";
		echo "</div>";
		echo "<div class='col-8 col-sm-6'>";
		echo "<h2>" . 'restaurant_name' . "</h2>";
		echo "</div>";
		echo "<div class='col-4 col-sm-3 justify-center'>";
		echo "<button name='rest_id' value='" . $row['restaurant_id'] . "' class='btn btn-outline-secondary border search-result-claim'>";
		echo "<span>Edit</span>";
		echo "</button>";
		echo "</div>";
		echo "</div>";
		echo "<br />";
	}
	?>	
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>