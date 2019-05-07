<?php
$restricted_level = 1;
$page_name = 'Account Settings';
require_once('../Resources/lib/session_controller.php');

if (isset($_POST['login_submit']) && $_POST['login_submit'] != "") {
	$password = null;
	$password_re = null;
	$error = false;
	$password_character_error = false;
	$password_match_error = false;
	
	if (isset($_POST['password']) && $_POST['password'] != "") {
		$password =  $_POST['password'];
	} else {
		$error = true;
	}
	if (isset($_POST['password_re']) && $_POST['password_re'] != "") {
		$password_re =  $_POST['password_re'];
	} else {
		$error = true;
	}
	
	if (!$error) {
		$password_character_error = !is_password_valid($password);
		$password_match_error = !($password === $password_re);
		if (!$password_character_error && !$password_match_error) {
			User::update_password($password);
		}
	}
}

if (isset($_POST['delete_account']) && $_POST['delete_account'] === "delete") {
	header('location: DeleteConfirmation');
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
		User::update_account($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
		$_POST = array();
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
	 <?php
	 if (isset($password_character_error) && $password_character_error) {
		 echo "<span class='form-error'>Password does not match requirements</span>";
	 }
	 ?>
	 <small class="form-text text-muted">Your password must be 8-32 characters long, have at least one lower-case letter, have at least upper-case letter, have at least one number, have at least one special character, and must not contain spaces.</small>
     <label>Re-enter Password:</label><input type="password" name="password_re" class="form-control" />
	 <?php
	 if (isset($password_match_error) && $password_match_error) {
		 echo "<span class='form-error'>Passwords do not match</span>";
	 }
	 ?>
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
	<div class="col-8 col-md-6 col-lg-4 mx-auto">
	<form method="POST">
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
	  </form>
	  <br /><br /><br />
	  <div class="col-6">
	   <form method="POST" action="Stats">
        <button class="btn btn-lg btn-primary" type="submit" name="stats_submit">View Statistics</button>
       </form>
	  </div>
	  <div class="col-6 justify-right">
	   <form method="POST">
	    <button class="btn btn-danger" name="delete_account" value="delete">Delete Account</button>
	   <form method="POST" action="Stats">
	  </div>
	 </div>
	</div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>