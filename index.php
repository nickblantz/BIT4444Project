<?php
$restricted_level = 0;
$page_name = 'Home Page';
require_once('Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>