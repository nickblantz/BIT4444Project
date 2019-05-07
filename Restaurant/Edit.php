<?php
$restricted_level = 3;
$page_name = 'Restaurant Edit';
require_once('../Resources/lib/session_controller.php');

if(isset($_POST['image_update']) && $_POST['image_update'] === "image_update") {
    $newFile = 'Restaurant/Thumbnails/' . $_SESSION['active_restaurant']->restaurant_id . '.' . substr($_FILES['new_thumbnail']['type'], 6);
    move_uploaded_file($_FILES['new_thumbnail']['tmp_name'], redirect_prefix($newFile));
	Restaurant::update_thumbnail(1, $newFile);
}
$restaurant_name = $_SESSION['active_restaurant']->name;
if ($_SESSION['active_restaurant']->local_img == 1) {
	$restaurant_image = redirect_prefix($_SESSION['active_restaurant']->image_url);
} else {
	$restaurant_image = $_SESSION['active_restaurant']->image_url;
}

if (isset($_POST['unclaim_restaurant']) && $_POST['unclaim_restaurant'] === "delete") {
	header('location: UnclaimConfirmation.php');
}

if(isset($_POST['restaurant_submit']) && $_POST['restaurant_submit'] != '') {
	$phone_number = null;
	$price = null;
	$address_1 = null;
	$address_2 = null;
	$city = null;
	$state = null;
	$zipcode = null;
	$error = false;
	
	if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") {
		$phone_number =  $_POST['phone_number'];
	} else {
		$error = true;
	}
	if (isset($_POST['price']) && $_POST['price'] != "") {
		$price =  $_POST['price'];
	} else {
		$error = true;
	}
	if (isset($_POST['address_1']) && $_POST['address_1'] != "") {
		$address_1 =  $_POST['address_1'];
	} else {
		$error = true;
	}
	if (isset($_POST['address_2']) && $_POST['address_2'] != "") {
		$address_2 =  $_POST['address_2'];
	} else {
		$address_2 = "";
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
		Restaurant::update_restaurant($phone_number, $price, $address_1, $address_2, $city, $state, $zipcode);
	}
} else {
	$phone_number = $_SESSION['active_restaurant']->phone_number;
	$price = $_SESSION['active_restaurant']->price;
	$address_1 = $_SESSION['active_restaurant']->address_1;
	$address_2 = $_SESSION['active_restaurant']->address_2;
	$city = $_SESSION['active_restaurant']->city;
	$state = $_SESSION['active_restaurant']->state;
	$zipcode = $_SESSION['active_restaurant']->zipcode;
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row justify-content-center no-gutters mx-auto">
    <div class="col-12 justify-center">
	<h3>Restaurant: <?php echo $restaurant_name; ?></h3>
	</div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
	<hr />
     <div class="m-2 justify-center">
      <h5 class="d-inline">Current Thumbnail:&nbsp;</h5>
      <img src="<?php echo $restaurant_image; ?>" class="rounded-circle search-result-thumbnail">
     </div>
     <form method="POST" enctype="multipart/form-data">
      <h5 class="ml-3">New Thumbnail</h5>
      <div class="input-group mb-3">
       <div class="custom-file">
        <input id="thumbnail-input" type="file" class="custom-file-input" name="new_thumbnail">
        <label id="thumbnail-label" class="custom-file-label" for="new_thumbnail">Choose file</label>
		<script>
		$('#thumbnail-input').change(function() {
			$('#thumbnail-label').text($('#thumbnail-input').val());
		});
		</script>
       </div>
       <div class="input-group-append">
        <button class="btn btn-primary" type="submit" name="image_update" value="image_update">Update</button>
       </div>
      </div>
     </form>
	 <hr />
    </div>
   </div>
   <br />
   <div class="row">
    <div class="col-8 col-md-6 col-lg-4 mx-auto">
	 <form method="POST">
      <label>Phone Number:</label><input type="text" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>" />
	  <label>Price:</label><input type="text" name="price" class="form-control" value="<?php echo $price; ?>" />
	  <label>Address 1:</label><input type="text" name="address_1" class="form-control" value="<?php echo $address_1; ?>" />
	  <label>Address 2:</label><input type="text" name="address_2" class="form-control" value="<?php echo $address_2; ?>" />
	  <label>City:</label><input type="text" name="city" class="form-control" value="<?php echo $city; ?>" />
	  <label>State:</label><input type="text" name="state" class="form-control" value="<?php echo $state; ?>" />
	  <label>Zipcode:</label><input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode; ?>" />
	  <br />
	  <div class="row">
	   <div class="col-6">
	    <input class="btn btn-primary" type="submit" name="restaurant_submit">
	   </div>
	   <div class="col-6 justify-right">
        <input class="btn btn-secondary" type="reset" name="reset">
	   </div>
	  </div>
	 </form>
    </div>
   </div>
   <br />
   <div class="justify-center">
    <form method="POST" action="View">
     <button class="btn btn-lg btn-primary" type="submit" name="view_submit">View Public Page</button>
    </form>
    <br />
    <form method="POST" action="Stats">
     <button class="btn btn-lg btn-primary" type="submit" name="stats_submit">View Statistics</button>
    </form>
	<br />
    <form method="POST">
     <button class="btn btn-danger" name="unclaim_restaurant" value="delete">Unclaim Restaurant</button>
    </form>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>