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
}
?>