<?php
$restricted_level = -1;
$page_name = 'Create Account';
require_once('../Resources/lib/session_controller.php');

$username = null;
$password = null;
$password_re = null;
$is_owner = null;
$first_name = null;
$last_name = null;
$phone_number = null;
$email = null;
$address_1 = null;
$address_2 = null;
$city = null;
$state = null;
$zipcode = null;
if (isset($_POST['create_submit']) && $_POST['create_submit'] != "") {
	$error = false;
	$password_character_error = false;
	$password_match_error = false;
	
	if (isset($_POST['username']) && $_POST['username'] != "") {
		$username =  $_POST['username'];
	} else {
		$error = true;
	}
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
	if (isset($_POST['is_owner']) && $_POST['is_owner'] != "") {
		$is_owner = 1;
	} else {
		$is_owner = 0;
	}
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
		$password_character_error = !is_password_valid($password);
		$password_match_error = !($password === $password_re);
		$username_error = is_username_taken($username);
		if (!$password_character_error && !$password_match_error && !$username_error) {
			User::create_account($username, $password, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
			header('location: ' . redirect_prefix('Account/Login'));
		}
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
	<div class="col-8 col-md-6 col-lg-4 mx-auto">
	 <input class="form-check-input ml-1" type="checkbox" name="is_owner" /><label class="ml-3" for="gridCheck1">&nbsp;&nbsp;Restaurant Owner</label><br />
	 <label>Username:</label><input type="text" name="username" class="form-control" value="<?php echo $username; ?>"/>
	 <?php
	 if (isset($username_error) && $username_error) {
		 echo "<span class='form-error'>Username is already taken</span>";
	 }
	 ?>
	 <label for="password">Password:</label><input type="password" name="password" class="form-control" />
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
	   <input class="btn btn-primary" type="submit" name="create_submit">
	  </div>
	  <div class="col-6 justify-right">
       <input class="btn btn-secondary" type="reset" name="reset">
	  </div>
	 </div>
	</div>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>