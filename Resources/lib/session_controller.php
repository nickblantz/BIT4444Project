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
	$pw_hash = password_hash($password, PASSWORD_BCRYPT);
	$connector = new MySQLConnector();
	$connector -> query("INSERT INTO `user` (`username`, `password`, `is_owner`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zipcode`) VALUES ('" . $username . "', '" . $pw_hash . "', " . $is_owner . ", '" . $first_name . "', '" . $last_name . "', '" . $phone_number . "', '" . $email . "', '" . $address_1 . "', '" . $address_2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "')");
	header('location: ' . redirect_prefix('Account/Login'));
}

function update_account($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
	$connector = new MySQLConnector();
	$connector -> query("UPDATE `user` SET `first_name` = '" . $first_name . "', `last_name` = '" . $last_name . "', `phone_number` = '" . $phone_number . "', `email` = '" . $email . "', `address_1` = '" . $address_1 . "', `address_2` = '" . $address_2 . "', `city` = '" . $city . "', `state` = '" . $state . "', `zipcode` = '" . $zipcode . "' WHERE `user_id` = '" . $_SESSION['active_user']->user_id . "'");
	$_SESSION['active_user']->update($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
}

/* REGular EXpression (regex) for validating the strength of enteredPassword
        
	^                   start of regex
	(?=.{8,32})         minimum 8 and maximum 32 characters long  
	(?=.*[!@#$%^&*()])  contain at least one of the special characters
						above the numbers 1, 2, 3, ..., 9, 0 on the keyboard.
	(?=.*[A-Z])         contain at least one uppercase letter
	(?=.*[a-z])         contain at least one lowercase letter
	(?=.*[0-9])         contain at least one digit from 0 to 9.
	$                   end of regex
 */
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