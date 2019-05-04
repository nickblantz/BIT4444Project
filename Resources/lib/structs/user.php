<?php
class User {
	public  $user_id,
			$username,
			$is_owner,
			$first_name,
			$last_name,
			$phone_number,
			$email,
			$address_1,
			$address_2,
			$city,
			$state,
			$zipcode;
	
	/**
	 * Constructor
	 */
	function __construct($user_id, $username, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode){
		$this->user_id = $user_id;
		$this->username = $username;
		$this->is_owner = $is_owner;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->phone_number = $phone_number;
		$this->email = $email;
		$this->address_1 = $address_1;
		$this->address_2 = $address_2;
		$this->city = $city;
		$this->state = $state;
		$this->zipcode = $zipcode;
	}
	
	public function __toString() {
        return "(" . $this->user_id . ", " . $this->username . ", " . $this->is_owner . ", " . $this->first_name . ", " . $this->last_name . ", " . $this->phone_number . ", " . $this->email . ", " . $this->address_1 . ", " . $this->address_2 . ", " . $this->city . ", " . $this->state . ", " . $this->zipcode . ")";
    }
	
	public function update($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->phone_number = $phone_number;
		$this->email = $email;
		$this->address_1 = $address_1;
		$this->address_2 = $address_2;
		$this->city = $city;
		$this->state = $state;
		$this->zipcode = $zipcode;
	}
	
	public static function create_account($username, $password, $is_owner, $first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
		$pw_hash = password_hash($password, PASSWORD_BCRYPT);
		$connector = new MySQLConnector();
		$connector -> query("INSERT INTO `user` (`username`, `password`, `is_owner`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zipcode`) VALUES ('" . $username . "', '" . $pw_hash . "', " . $is_owner . ", '" . $first_name . "', '" . $last_name . "', '" . $phone_number . "', '" . $email . "', '" . $address_1 . "', '" . $address_2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "')");
	}
	
	public static function update_account($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode) {
		$connector = new MySQLConnector();
		$connector -> query("UPDATE `user` SET `first_name` = '" . $first_name . "', `last_name` = '" . $last_name . "', `phone_number` = '" . $phone_number . "', `email` = '" . $email . "', `address_1` = '" . $address_1 . "', `address_2` = '" . $address_2 . "', `city` = '" . $city . "', `state` = '" . $state . "', `zipcode` = '" . $zipcode . "' WHERE `user_id` = " . $_SESSION['active_user']->user_id);
		$_SESSION['active_user']->update($first_name, $last_name, $phone_number, $email, $address_1, $address_2, $city, $state, $zipcode);
	}
	
	public static function update_password($password) {
		$pw_hash = password_hash($password, PASSWORD_BCRYPT);
		$connector = new MySQLConnector();
		$connector -> query("UPDATE `user` SET `password` = '" . $pw_hash . "' WHERE `user_id` = " . $_SESSION['active_user']->user_id);
	}
	
	public static function delete_account() {
		$connector = new MySQLConnector();
		$connector -> query("DELETE FROM `user` WHERE `user_id` = " . $_SESSION['active_user']->user_id);
		logout();
	}
}
?>