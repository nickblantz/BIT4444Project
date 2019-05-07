<?php
$restricted_level = -1;
$page_name = 'Login';
require_once('../Resources/lib/session_controller.php');

if (isset($_POST['login_submit']) && $_POST['login_submit'] != "") {
	$username = null;
	$password = null;
	$error = false;
	
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
	
	if (!$error) {
		if(login($username, $password)) {
			header('location: ' . redirect_prefix('index.php'));
		} else {
			$password_error = true;
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
      <label for="username">Username:</label><input type="text" name="username" class="form-control" placeholder="Username" />
      <label for="password">Password:</label><input type="password" name="password" class="form-control" placeholder="Password" />
	  <?php
		 if (isset($password_error) && $password_error) {
			 echo "<span class='form-error'>Incorrect username or password</span>";
		 }
	  ?>
     </div>
	 <br />
	 <div class="col-6 justify-center">
      <input class="btn btn-primary" type="submit" name="login_submit" />
	 </div>
	</form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>