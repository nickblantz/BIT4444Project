<?php
$restricted_level = 1;
$page_name = 'Logout';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['logout_submit']) && $_POST['logout_submit'] != "") {
	logout();
}

generate_html_beginning($page_name);
?>
 <form method="POST">
  <input type="submit" name="logout_submit" value="Logout"/>
 </form>
<?php
generate_html_ending($page_name);
?>