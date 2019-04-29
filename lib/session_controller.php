<?php
require_once('mysql_connector.php');
require_once('structs/user.php');
session_start();

function create_account($user_id, $username, $password, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
	// Hashing password for security
	$pw_hash = password_hash($password, PASSWORD_BCRYPT);
	
	$connector = new MySQLConnector();
	$connector -> query("INSERT INTO `user` (`username`, `password`, `is_owner`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zipcode`) VALUES ('" . $username . "', '" . $pw_hash . "', " . $is_owner . ", '" . $first_name . "', '" . $last_name . "', '" . $phone_number . "', '" . $email . "', '" . $address_1 . "', '" . $address_2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "')");
}

function login($username, $password) {
	$connector = new MySQLConnector();
	$result = mysqli_fetch_array($connector -> query("SELECT * FROM `user` WHERE `username` = '" . $username . "'"));
	
	if(password_verify($pass, $result['password'])) {
		$_SESSION['active_user'] = new User($result['user_id'], $result['username'], $result['is_owner'], $result['first_name'], $result['last_name'], $result['phone_number'], $result['email'], $result['address_1'], $result['address_2'], $result['city'], $result['state'], $result['zipcode']);
		return true;
	} else {
		return false;
	}
}

function logout() {
	
}

function redirect_prefix($str) {
	$dirs = substr_count($_SERVER['REQUEST_URI'], '/') - 2;
	$output = '';
	for($i = 0; $i < $dirs; $i++) {
		$output .= '../';
	}
	return $output . $str;
}

if(!isset($restricted_level)) $restricted_level = 0;
if($restricted_level = 1) {
	if(isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
		// Do nothing (security guaranteed)
	} else {
		header('location: ' . redirect_prefix('login.php'));
	}
} elseif ($restricted_level = 2) {
	if(isset($_SESSION['active_user']) && $_SESSION['active_user'] != null) {
		$connector = new MySQLConnector();
		$db_rid = mysqli_fetch_array($connector -> query("SELECT `owner_id` FROM `restaurant` WHERE `restaurant_id` = '" . $_SESSION['active_restaurant']->restaurant_id . "'"))['restaurant_id'];
		if($_SESSION['active_user']->user_id != $db_rid) {
			header('location: ' . redirect_prefix('index.php'));
		}
	} else {
		header('location: ' . redirect_prefix('login.php'));
	}
}
?>