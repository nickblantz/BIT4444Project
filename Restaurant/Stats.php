<?php
	session_start();
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Name</title>
  <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/sitestyles.css" />
  <script src="../js/jquery.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 </head>
 <body>
  <main id="main-container" class="container-fluid">
   <div id="main-container-row" class="row h-100">
    <div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
	<div id="content" class="col-md-8 col-sm-10 col-12">
	 <br />
	 <div class="row justify-content-center">
	 <figure class="col-12 col-md-10 figure m-3">
	  <h3>Search Appearances</h3>
      <svg width="100%" height="100">
	   <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />
	  </svg>
     </figure>
	 <figure class="col-12 col-md-10 figure m-3">
	  <h3>Researches</h3>
      <svg width="100%" height="100">
	   <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />
	  </svg>
     </figure>
	 </div>
	</div>
    <div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
   </div>
  </main>
  <header id="header-container" class="container-fluid">
   <div class="row h-100">
    <div class="col-md-2 col-sm-2 d-none d-sm-block justify-left"><img src="../images/logo.png" /></div>
	<div class="col-md-8 col-sm-8 col-9 center-content"><h2>Restaurant Name</h2></div>
	<div class="col-md-2 col-sm-2 col-3" style="padding-left: 0px; padding-right: 10px;">
     <ul class="nav navbar-light nav-pills justify-right">
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle navbar-toggler" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	    <span class="navbar-toggler-icon"></span>
	   </a>
       <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">Login / My Account</a>
		<div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Home</a>
        <a class="dropdown-item" href="#">Contact Us</a>
       </div>
      </li>
     </ul>
	</div>
   </div>
  </header>
  <footer id="footer-container" class="container-fluid">
   <div class="row h-100">
    <div class="col-sm-2 d-none d-sm-block"></div>
	<div class="col-sm-8 col-6 center-content">Blantz - Mateen - Yeh</div>
	<div class="col-sm-2 col-6 justify-right">Legal</div>
   </div>
  </footer>
 </body>
</html>