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
	 <div class="row justify-content-center no-gutters mx-auto">
	  <div class="col-12 col-sm-8 col-md-6 col-lg-5 border">
	   <div class="m-2 justify-center">
	    <h5 class="d-inline">Current Thumbnail:&nbsp;</h5>
	    <img src="https://s3-media2.fl.yelpcdn.com/bphoto/CPc91bGzKBe95aM5edjhhQ/o.jpg" class="rounded-circle search-result-thumbnail">
	   </div>
	   <hr />
	   <form>
		<h5 class="ml-3">New Thumbnail</h5>
		<div class="input-group mb-3">
         <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
         </div>
         <div class="input-group-append">
		  <button class="btn btn-primary" type="submit">Update</button>
         </div>
        </div>
	   </form>
	  </div>
	 </div>
	 <br />
	 <div class="row justify-content-center no-gutters border">
	  <div class="col-12 col-md-6 my-2">
	   <h5>Current Blurb</h5>
	   <div class="">
	    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet euismod urna, varius accumsan libero pulvinar ut. Sed nec est at ipsum pharetra tincidunt. Nunc venenatis cursus massa quis malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce vel lectus id urna faucibus congue. Phasellus nec nunc congue, gravida dolor et, rutrum mi. Donec accumsan quis felis et eleifend.</p>
	   </div>
	  </div>
	  <div class="col-12 col-md-6 border-left my-2">
	   <form>
	    <div class="form-group">
         <h5 for="exampleFormControlTextarea1">New Blurb</h5>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
		<div class="justify-right">
		 <button class="btn btn-primary" type="submit">Update</button>
	     <button class="btn btn-secondary" type="reset">Clear</button>
		</div>
	   </form>
	  </div>
	 </div>
	 <br />
	 <div class="justify-center">
	  <form>
	   <button class="btn btn-lg btn-primary" type="submit">View Public Page</button>
	  </form>
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