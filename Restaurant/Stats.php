<?php
$restricted_level = 3;
$page_name = 'Restaurant Stats';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row justify-content-center">
    <figure class="col-12 col-md-10 figure m-3">
     <h3>Search Appearances</h3>
      <svg width="100%" height="100"></svg>
    </figure>
	<figure class="col-12 col-md-10 figure m-3">
	 <h3>Researches</h3>
     <svg width="100%" height="100"></svg>
    </figure>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>