<?php
function generate_head($page_name) {
	echo "<meta charset='utf-8'>";
	echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
	echo "<title>" . $page_name . "</title>";
	echo "<link rel='shortcut icon' type='image/png' href='" . redirect_prefix('Resources/images/favicon.png') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/bootstrap.min.css') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/bootstrap-grid.min.css') . "' />";
	echo "<link rel='stylesheet' type='text/css' href='" . redirect_prefix('Resources/css/sitestyles.css') . "' />";
	echo "<script src='" . redirect_prefix('Resources/js/jquery.js') . "'></script>";
	echo "<script src='" . redirect_prefix('Resources/js/popper.js') . "'></script>";
	echo "<script src='" . redirect_prefix('Resources/js/bootstrap.min.js') . "'></script>";
}
?>