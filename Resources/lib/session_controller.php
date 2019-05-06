<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/Template/head.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/Template/header.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/Template/main.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/Template/footer.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/mysql_connector.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/structs/user.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/structs/restaurant.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/structs/review.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/structs/comment.php');
session_start();

function redirect_prefix($str) {
	$dirs = substr_count($_SERVER['REQUEST_URI'], '/') - 2;
	$output = '';
	for($i = 0; $i < $dirs; $i++) {
		$output .= '../';
	}
	return $output . $str;
}

function is_password_valid($password) {
	$regex = '/^(?=.{8,32})(?=.*[!@#$%^&*()])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/';
	return preg_match($regex, $password) && substr_count($password, ' ') == 0;
}

function is_username_taken($username) {
	$connector = new MySQLConnector();
	$result = mysqli_fetch_array($connector -> query("SELECT 1 FROM `user` WHERE `username` = '" . $username . "'"));
	return $result[0] == 1;
}

function login($username, $password) {
	$connector = new MySQLConnector();
	$result = mysqli_fetch_array($connector -> query("SELECT * FROM `user` WHERE `username` = '" . $username . "'"));
	
	if (password_verify($password, $result['password'])) {
		$_SESSION['active_user'] = new User($result['user_id'], $result['username'], (boolean) $result['is_owner'], $result['first_name'], $result['last_name'], $result['phone_number'], $result['email'], $result['address_1'], $result['address_2'], $result['city'], $result['state'], $result['zipcode']);
		return true;
	} else {
		return false;
	}
}

function logout() {
	$_SESSION['active_user'] = null;
	$_SESSION['active_restaurant'] = null;
	header('location: ' . redirect_prefix('Account/Login'));
}

// Pages for only unregistered sessions
if ($restricted_level === -1) {
	if(isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
		header('location: ' . redirect_prefix(''));
	}
}
// Pages for only registered sessions
elseif ($restricted_level >= 1) {
	if(isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
		// Pages for only registered sessions who are owners
		if ($restricted_level >= 2) {
			if (!$_SESSION['active_user']->is_owner) {
				header('location: ' . redirect_prefix(''));
			}
			// Pages for only registered sessions who own a specific business
			if ($restricted_level === 3) {
				$connector = new MySQLConnector();
				$restaurant_owner = mysqli_fetch_array($connector -> query("SELECT `owner_id` FROM `restaurant` WHERE `restaurant_id` = '" . $_SESSION['active_restaurant']->restaurant_id . "'"))['owner_id'];
				if($_SESSION['active_user']->user_id != $restaurant_owner) {
					header('location: ' . redirect_prefix('Restaurant/View'));
				}
			}
		}
	} else {
		header('location: ' . redirect_prefix('Account/Login'));
	}
}
?>