<?php
function generate_header($page_name) {
	function generate_nav() {
		if (isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
			echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Logout.php') . "'>Logout</a>";
			echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Settings.php') . "'>My Account</a>";
			if ($_SESSION['active_user']->is_owner) {
				echo "<a class='dropdown-item' href='" . redirect_prefix('Restaurant/List.php') . "'>My Restaurants</a>";
				echo "<div class='dropdown-divider'></div>";
				echo "<a class='dropdown-item' href='" . redirect_prefix('Restaurant/Search.php') . "'>Restaurant Search</a>";
			} else {
				echo "<div class='dropdown-divider'></div>";
			}
		} else {
			echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Login.php') . "'>Login</a>";
			echo "<a class='dropdown-item' href='" . redirect_prefix('Account/Create.php') . "'>Create Account</a>";
			echo "<div class='dropdown-divider'></div>";
		}
		echo "<a class='dropdown-item' href='" . redirect_prefix('index.php') . "'>Home</a>";
		echo "<a class='dropdown-item' href='" . redirect_prefix('AboutUs.php') . "'>About Us</a>";
		echo "<a class='dropdown-item' href='" . redirect_prefix('ContactUs.php') . "'>Contact Us</a>";
	}
	echo "<header id='header-container' class='container-fluid'>";
	echo "<div class='row h-100'>";
	echo "<div class='col-md-2 col-sm-2 d-none d-sm-block justify-left pl-0'><a href='" . redirect_prefix('index.php') . "'><img height='56' src='" . redirect_prefix('Resources/images/logo.png') . "' /></a></div>";
	echo "<div class='col-md-8 col-sm-8 col-9 center-content'><h2>" . $page_name . "</h2></div>";
	echo "<div class='col-md-2 col-sm-2 col-3 pr-2'>";
	echo "<ul class='nav navbar-light nav-pills justify-right'>";
	echo "<li class='nav-item dropdown'>";
	echo "<a class='nav-link dropdown-toggle navbar-toggler' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>";
	echo "<span class='navbar-toggler-icon'></span>";
	echo "</a>";
	echo "<div class='dropdown-menu dropdown-menu-right'>";
	generate_nav();
	echo "</div></li></ul></div></div></header>";
}
?>