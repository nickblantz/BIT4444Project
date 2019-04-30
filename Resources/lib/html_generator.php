<?php
function generate_html_beginning($page_name) {
	echo "<!doctype html>";
	echo "<html lang='en'>";
	echo "<head><meta charset='utf-8'>";
	echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
	echo "<title>" . $page_name . "</title>";
	echo "<link rel='shortcut icon' type='image/png' href='" . redirect_prefix('Resources/images/favicon.png') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/bootstrap.min.css') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/bootstrap-grid.min.css') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/sitestyles.css') . "' />";
	echo "<script src='" . redirect_prefix('Resources/js/jquery.js') . "'></script>";
	echo "<script src='" . redirect_prefix('Resources/js/popper.js') . "'></script>";
	echo "<script src='" . redirect_prefix('Resources/js/bootstrap.min.js') . "'></script></head>";
	echo "<body>";
	echo "<main id='main-container' class='container-fluid'>";
	echo "<div id='main-container-row' class='row h-100'>";
	echo "<div class='col-md-2 col-sm-1 d-none d-sm-block side-panel'></div>";
	echo "<div id='content' class='col-md-8 col-sm-10 col-12'>";
	echo "<br />";
}

function generate_html_ending($page_name) {
	echo "<br /><br />";
	echo "</div>";
	echo "<div class='col-md-2 col-sm-1 d-none d-sm-block side-panel'></div>";
	echo "</div></main>";
	echo "<header id='header-container' class='container-fluid'>";
	echo "<div class='row h-100'>";
	echo "<div class='col-md-2 col-sm-2 d-none d-sm-block justify-left pl-2'><img src='" . redirect_prefix('Resources/images/logo.png') . "' /></div>";
	echo "<div class='col-md-8 col-sm-8 col-9 center-content'><h2>" . $page_name . "</h2></div>";
	echo "<div class='col-md-2 col-sm-2 col-3 pr-2'>";
	echo "<ul class='nav navbar-light nav-pills justify-right'>";
	echo "<li class='nav-item dropdown'>";
	echo "<a class='nav-link dropdown-toggle navbar-toggler' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>";
	echo "<span class='navbar-toggler-icon'></span>";
	echo "</a>";
	echo "<div class='dropdown-menu dropdown-menu-right'>";
	if ($_SESSION['active_user'] != null) {
		echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Logout') . "'>Logout</a>";
		echo "<a class='dropdown-item' href='" . redirect_prefix('Account/View') . "'>My Account</a>";
		if ($_SESSION['active_user']->is_owner) {
			echo "<a class='dropdown-item' href='" . redirect_prefix('Restaurant/List') . "'>My Restaurants</a>";
			echo "<div class='dropdown-divider'></div>";
			echo "<a class='dropdown-item' href='" . redirect_prefix('Restaurant/Search') . "'>Restaurant Search</a>";
		} else {
			echo "<div class='dropdown-divider'></div>";
		}
	} else {
		echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Login') . "'>Login</a>";
		echo "<div class='dropdown-divider'></div>";
	}
	echo "<a class='dropdown-item' href='" . redirect_prefix('index') . "'>Home</a>";
	echo "<a class='dropdown-item' href='" . redirect_prefix('ContactUs') . "'>Contact Us</a>";
	echo "</div></li></ul></div></div></header>";
	echo "<footer id='footer-container' class='container-fluid'>";
	echo "<div class='row h-100'>";
	echo "<div class='col-sm-2 d-none d-sm-block'></div>";
	echo "<div class='col-sm-8 col-6 center-content'>Blantz - Mateen - Yeh</div>";
	echo "<div class='col-sm-2 col-6 justify-right'>Legal</div>";
	echo "</div></footer>";
	echo "</body>";
	echo "</html>";
}
?>