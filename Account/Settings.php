<?php
$restricted_level = 1;
$page_name = 'Account Settings';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['login_submit']) && $_POST['login_submit'] != "") {
	
}

if (isset($_POST['account_submit']) && $_POST['account_submit'] != "") {
	$first_name = null;
	$last_name = null;
	$phone_number = null;
	$email = null;
	$address_1 = null;
	$address_2 = null;
	$city = null;
	$state = null;
	$zipcode = null;
	$error = false;
	
	if (isset($_POST['first_name']) && $_POST['first_name'] != "") {
		$first_name =  $_POST['first_name'];
	} else {
		$error = true;
	}
	if (isset($_POST['last_name']) && $_POST['last_name'] != "") {
		$last_name =  $_POST['last_name'];
	} else {
		$error = true;
	}
	if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") {
		$phone_number =  $_POST['phone_number'];
	} else {
		$error = true;
	}
	if (isset($_POST['email']) && $_POST['email'] != "") {
		$email =  $_POST['email'];
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
		update_account($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
	}
} else {
	$first_name = $_SESSION['active_user']->first_name;
	$last_name = $_SESSION['active_user']->last_name;
	$phone_number = $_SESSION['active_user']->phone_number;
	$email = $_SESSION['active_user']->email;
	$address_1 = $_SESSION['active_user']->address_1;
	$address_2 = $_SESSION['active_user']->address_2;
	$city = $_SESSION['active_user']->city;
	$state = $_SESSION['active_user']->state;
	$zipcode = $_SESSION['active_user']->zipcode;
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
	<div class="col-8 col-md-6 col-lg-4 mx-auto">
	 <h4>Login Information</h4>
	 <label>Password:</label><input type="password" name="password" class="form-control" />
	 <small class="form-text text-muted">Your password must be 8-32 characters long, have at least one lower-case letter, have at least upper-case letter, have at least one number, have at least one special character, and must not contain spaces.</small>
     <label>Re-enter Password:</label><input type="password" name="password_re" class="form-control" />
	 <br />
	 <div class="row">
	  <div class="col-6">
	   <input class="btn btn-primary" type="submit" name="login_submit">
	  </div>
	  <div class="col-6 justify-right">
       <input class="btn btn-secondary" type="reset" name="reset">
	  </div>
	 </div>
	</div>
   </form>
   <br />
   <form method="POST">
	<div class="col-8 col-md-6 col-lg-4 mx-auto">
	 <h4>Account Information</h4>
	 <label>First Name:</label><input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"/>
     <label>Last Name:</label><input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>" />
	 <label>Email:</label><input type="text" name="email" class="form-control" value="<?php echo $email; ?>" />
	 <label>Phone Number:</label><input type="text" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>" />
	 <label>Address 1:</label><input type="text" name="address_1" class="form-control" value="<?php echo $address_1; ?>" />
	 <label>Address 2:</label><input type="text" name="address_2" class="form-control" value="<?php echo $address_2; ?>" />
	 <label>City:</label><input type="text" name="city" class="form-control" value="<?php echo $city; ?>" />
	 <label>State:</label><input type="text" name="state" class="form-control" value="<?php echo $state; ?>" />
	 <label>Zipcode:</label><input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode; ?>" />
	 <br />
	 <div class="row">
	  <div class="col-6">
	   <input class="btn btn-primary" type="submit" name="account_submit">
	  </div>
	  <div class="col-6 justify-right">
       <input class="btn btn-secondary" type="reset" name="reset">
	  </div>
	  <br /><br /><br />
	  <div class="col-6 justify-center">
	   <button type="button" class="btn btn-danger">Delete Account</button>
	  </div>
	 </div>
	</div>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>