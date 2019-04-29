<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/Template/head.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/Template/header.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/Template/main.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/Template/footer.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/mysql_connector.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/structs/user.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/structs/restaurant.php');
session_start();

function redirect_prefix($str) {
	$dirs = substr_count($_SERVER['REQUEST_URI'], '/') - 2;
	$output = '';
	for($i = 0; $i < $dirs; $i++) {
		$output .= '../';
	}
	return $output . $str;
}

function create_account($username, $password, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
	// Hashing password for security
	$pw_hash = password_hash($password, PASSWORD_BCRYPT);
	
	$connector = new MySQLConnector();
	$connector -> query("INSERT INTO `user` (`username`, `password`, `is_owner`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zipcode`) VALUES ('" . $username . "', '" . $pw_hash . "', " . $is_owner . ", '" . $first_name . "', '" . $last_name . "', '" . $phone_number . "', '" . $email . "', '" . $address_1 . "', '" . $address_2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "')");
	header('location: ' . redirect_prefix('Account/Login'));
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
		header('location: ' . redirect_prefix('index'));
	}
}
// Pages for only registered sessions
elseif ($restricted_level >= 1) {
	if(isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
		// Pages for only registered sessions who are owners
		if ($restricted_level >= 2) {
			if (!$_SESSION['active_user']->is_owner) {
				header('location: ' . redirect_prefix('index'));
			}
			// Pages for only registered sessions who own a specific business
			if ($restricted_level === 3) {
				$connector = new MySQLConnector();
				$restaurant_owner = mysqli_fetch_array($connector -> query("SELECT `owner_id` FROM `restaurant` WHERE `restaurant_id` = '" . $_SESSION['active_restaurant']->restaurant_id . "'"))['owner_id'];
				if($_SESSION['active_user']->user_id != $restaurant_owner) {
					header('location: ' . redirect_prefix('index'));
				}
			}
		}
	} else {
		header('location: ' . redirect_prefix('Account/Login'));
	}
}
?>