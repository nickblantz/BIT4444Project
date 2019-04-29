<?php
	session_start();
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Search</title>
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
	 <form>
      <div class="input-group row justify-content-md-center no-gutters mx-auto">
	   <div class="col-xl-2 col-sm-4 col-6">
        <input class="form-control py-2 border" type="search" placeholder="Address 1" />
	   </div>
	   <div class="col-xl-2 col-sm-4 col-6">
	    <input class="form-control py-2 border" type="search" placeholder="Address 2" />
	   </div>
	   <div class="col-xl-2 col-sm-4 col-6">
	    <input class="form-control py-2 border" type="search" placeholder="City" />
	   </div>
	   <div class="col-xl-2 col-sm-4 col-6">
	    <input class="form-control py-2 border" type="search" placeholder="State" />
	   </div>
	   <div class="col-xl-2 col-sm-4 col-6">
	    <input class="form-control py-2 border" type="search" placeholder="Zipcode" />
	   </div>
	    <div class="col-xl-1 col-sm-4 col-6">
         <span class="input-group-append" style="height: 38px;">
          <input class="btn btn-outline-secondary border" type="submit" value="Search" />
        </span>
		</div>
       </div>
	  </form>
	  <br /><br />
	  <form method="" action="">
	   <div id="search-results">
	    <div class="row border mx-auto"> 
	     <div class="col-sm-3 d-none d-sm-block justify-center">
		  <img src="https://s3-media2.fl.yelpcdn.com/bphoto/CPc91bGzKBe95aM5edjhhQ/o.jpg" class="rounded-circle search-result-thumbnail">
		 </div>
		 <div class="col-8 col-sm-6">
		  <h2>Restaurant Name</h2>
		  <p>1234 Fake St.<br />Apt. 1<br />Blacksburg, VA 24060</p>
		 </div>
		 <div class="col-4 col-sm-3 justify-center">
		  <button name="rest_id" value="1" class="btn btn-outline-secondary border search-result-claim">
		  <img src="../images/checkmark-26.png" />
		  <span>Claim</span>
		  </button>
		 </div>
	    </div>
		<br />
		<div class="row border mx-auto"> 
	     <div class="col-sm-3 d-none d-sm-block justify-center">
		  <img src="https://s3-media2.fl.yelpcdn.com/bphoto/CPc91bGzKBe95aM5edjhhQ/o.jpg" class="rounded-circle search-result-thumbnail">
		 </div>
		 <div class="col-8 col-sm-6">
		  <h2>Restaurant Name</h2>
		  <p>1234 Fake St.<br />Apt. 1<br />Blacksburg, VA 24060</p>
		 </div>
		 <div class="col-4 col-sm-3 justify-center">
		  <button name="rest_id" value="1" class="btn btn-outline-secondary border search-result-claim">
		  <img src="../images/checkmark-26.png" />
		  <span>Claim</span>
		  </button>
		 </div>
	    </div>
		<br />
	   </div>
	  </form>
	 </div>
	<div class="col-md-2 col-sm-1 d-none d-sm-block side-panel"></div>
   </div>
  </main>
  <header id="header-container" class="container-fluid">
   <div class="row h-100">
    <div class="col-md-2 col-sm-2 d-none d-sm-block justify-left"><img src="../images/logo.png" /></div>
	<div class="col-md-8 col-sm-8 col-9 center-content">
	 <h2>Restaurant Search</h2>
	</div>
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