<?php
$restricted_level = 2;
$page_name = 'My Restaurants';
require_once('../Resources/lib/session_controller.php');

if(isset($_POST['rest_id']) && $_POST['rest_id'] != "") {
	$connector = new MySQLConnector();
	$result = mysqli_fetch_array($connector->query("SELECT * FROM `restaurant` WHERE `restaurant_id` = '" . $_POST['rest_id'] . "'"));
	$_SESSION['active_restaurant'] = new Restaurant($result['restaurant_id'], $result['owner_id'], $result['name'], $result['local_img'], $result['image_url'], $result['phone_number'], $result['price'], $result['address_1'], $result['address_2'], $result['city'] , $result['state'], $result['zipcode']);
	header('location: ' . redirect_prefix('Restaurant\Edit'));
}

?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div id="restaurant-list">
    <form method="POST">
	 <?php
		$connector = new MySQLConnector();
		$result = $connector -> query("SELECT * FROM `restaurant` WHERE `owner_id` = " . $_SESSION['active_user']->user_id);
		while($row = mysqli_fetch_array($result)) {
			echo "<div class='row border mx-auto'>";
			echo "<div class='col-sm-3 d-none d-sm-block justify-center'>";
			echo "<img src='" . (($row['local_img']) ? redirect_prefix($row['image_url']) : $row['image_url']) . "' class='rounded-circle search-result-thumbnail' />";
			echo "</div>";
			echo "<div class='col-8 col-sm-6'>";
			echo "<h2>" . $row['name'] . "</h2>";
			if ($row['address_2'] != "") {
				echo "<p>" . $row['address_1'] . "<br />" . $row['address_2'] . "<br />" . $row['city'] . ", " . $row['state'] . " " . $row['zipcode'] . "</p>";
			} else {
				echo "<p>" . $row['address_1'] . "<br />" . $row['city'] . ", " . $row['state'] . " " . $row['zipcode'] . "</p>";
			}
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
	</form>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>