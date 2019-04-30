<?php
$restricted_level = -1;
$page_name = 'Login';
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

generate_html_beginning($page_name);
?>
 <form method="POST">
  <input type="text "name="username" placeholder="Username" />
  <input type="password" name="password" placeholder="Password" />
  <input type="submit" name="login_submit" />
 </form>
<?php
generate_html_ending($page_name);
?>