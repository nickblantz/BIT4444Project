<?php
$restricted_level = -1;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['create_submit']) && $_POST['create_submit'] != "") {
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
		$is_owner =  $_POST['is_owner'];
	} else {
		$error = true;
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
	
	if (!$error && !$password_character_error && !$password_match_error) {
		$is_owner = true;
		create_account($username, $password, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
	}
}
?>
<!doctype html>
<html lang="en">
 <head><?php generate_head('Create Account'); ?></head>
 <body>
  <main id="main-container" class="container-fluid">
   <div id="main-container-row" class="row h-100">
    <div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
	<div id="content" class="col-md-8 col-sm-10 col-12">
	 <br />
     <form method="POST">
	  <input type="text" name="username" placeholder="Username" /><br />
	  <input type="password" name="password" placeholder="Password" /><br />
	  <input type="password" name="password_re" placeholder="Re-enter Password" /><br />
	  <input type="text" name="is_owner" placeholder="is_owner" /><br />
	  <input type="text" name="first_name" placeholder="First Name" /><br />
	  <input type="text" name="last_name" placeholder="Last Name" /><br />
	  <input type="text" name="phone_number" placeholder="Phone Number" /><br />
	  <input type="text" name="email" placeholder="Email" /><br />
	  <input type="text" name="address_1" placeholder="Address 1" /><br />
	  <input type="text" name="address_2" placeholder="Address 2" /><br />
	  <input type="text" name="city" placeholder="City" /><br />
	  <input type="text" name="state" placeholder="State" /><br />
	  <input type="text" name="zipcode" placeholder="Zipcode" /><br />
	  <input type="submit" name="create_submit" />
	 </form>
	 <br /><br />
	</div>
	<div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
   </div>
  </main>
  <header id="header-container" class="container-fluid"> <?php generate_header('Create Account'); ?></header>
  <footer id="footer-container" class="container-fluid"> <?php generate_footer(); ?></footer>
 </body>
</html>