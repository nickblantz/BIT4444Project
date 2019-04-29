<?php
$restricted_level = -1;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

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
			header('location: ' . redirect_prefix('index'));
		} else {
			$password_error = true;
		}
	}
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php
  generate_head('Login');
  ?>
 </head>
 <body>
  <main id="main-container" class="container-fluid">
   <div id="main-container-row" class="row h-100">
    <div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
	<div id="content" class="col-md-8 col-sm-10 col-12">
	 <br />
     <form method="POST">
	  <input type="text "name="username" placeholder="Username" />
	  <input type="password" name="password" placeholder="Password" />
	  <input type="submit" name="login_submit" />
	 </form>
	 <br /><br />
	</div>
	<div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
   </div>
  </main>
  <header id="header-container" class="container-fluid"> <?php generate_header('Login'); ?></header>
  <footer id="footer-container" class="container-fluid"> <?php generate_footer(); ?></footer>
 </body>
</html>