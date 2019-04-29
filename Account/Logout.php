<?php
$restricted_level = 1;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['logout_submit']) && $_POST['logout_submit'] != "") {
	logout();
}
?>
<!doctype html>
<html lang="en">
 <head><?php generate_head('Logout'); ?></head>
 <body>
  <main id="main-container" class="container-fluid">
   <div id="main-container-row" class="row h-100">
    <div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
	<div id="content" class="col-md-8 col-sm-10 col-12">
	 <br />
     <form method="POST">
	  <input type="submit" name="logout_submit" value="Logout"/>
	 </form>
	 <br /><br />
	</div>
	<div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
   </div>
  </main>
  <header id="header-container" class="container-fluid"> <?php generate_header('Logout'); ?></header>
  <footer id="footer-container" class="container-fluid"> <?php generate_footer(); ?></footer>
 </body>
</html>