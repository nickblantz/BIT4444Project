<?php
$restricted_level = 1;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['logout_submit']) && $_POST['logout_submit'] != "") {
	logout();
}
?>
<!doctype html>
<html lang="en">
 <?php generate_head('Logout'); ?>
 <body>
  <?php generate_main_beginning(); ?>
   <form method="POST">
    <input type="submit" name="logout_submit" value="Logout"/>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header('Logout'); ?>
  <?php generate_footer(); ?>
 </body>
</html>