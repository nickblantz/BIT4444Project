<?php
	session_start();
	require_once("lib/db.php");
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Page Name</title>
  <link rel="shortcut icon" type="image/png" href="resources/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/sitestyles.css" />
  <script src="resources/js/jquery.js"></script>
  <script src="resources/js/bootstrap.min.js"></script>
 </head>
 <body>
  <header id="header-container" class="container-fluid">
   header
  </header>
  <main id="main-container" class="container-fluid">
   <div class="row h-100">
    <div class="col-md-2 col-sm-1 hidden-xs side-panel">&nbsp;</div>
	<div class="col-md-8 col-sm-10 col-xs-12">
     mid
	</div>
	<div class="col-md-2 col-sm-1 hidden-xs side-panel">&nbsp;</div>
   </div>
  </main>
  <footer id="footer-container" class="container-fluid">
   <div>legal stuff</div>
  </footer>
 </body>
</html>