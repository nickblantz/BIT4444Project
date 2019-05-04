<?php
class Restaurant {
	public  $restaurant_id,
			$owner_id,
			$name,
			$local_img,
			$image_url,
			$phone_number,
			$price,
			$address_1,
			$address_2,
			$city,
			$state,
			$zipcode;
	
	/**
	 * Constructor
	 */
	function __construct($restaurant_id, $owner_id, $name, $local_img, $image_url, $phone_number, $price, $address_1, $address_2, $city, $state, $zipcode) {
		$this->restaurant_id = $restaurant_id;
		$this->owner_id = $owner_id;
		$this->name = $name;
		$this->local_img = $local_img;
		$this->image_url = $image_url;
		$this->phone_number = $phone_number;
		$this->price = $price;
		$this->address_1 = $address_1;
		$this->address_2 = $address_2;
		$this->city = $city;
		$this->state = $state;
		$this->zipcode = $zipcode;
	}
	
	public function __toString() {
        return "(" . $this->restaurant_id . ", " . $this->owner_id . ", " . $this->name . ", " . $this->local_img . ", " . $this->image_url . ", " . $this->phone_number . ", " . $this->price . ", " . $this->address_1 . ", " . $this->address_2 . ", " . $this->city . ", " . $this->state . ", " . $this->zipcode . ")";
    }
	
	public static function create_restaurant($restaurant_id, $owner_id, $name, $local_img, $image_url, $phone_number, $price, $address_1, $address_2, $city, $state, $zipcode) {
		$connector = new MySQLConnector();
		
		$connector->query("INSERT INTO `restaurant` (`restaurant_id`, `owner_id`, `name`, `local_img`, `image_url`, `phone_number`, `price`, `address_1`, `address_2`, `city`, `state`, `zipcode`) VALUES ('" . $restaurant_id . "', '" . $owner_id . "', '" . $name . "', " . $local_img . ", '" . $image_url . "', '" . $phone_number . "', '" . $price . "', '" . $address_1 . "', '" . $address_2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "')");
		$_SESSION['active_restaurant'] = new Restaurant($restaurant_id, $owner_id, $name, $local_img, $image_url, $phone_number, $price, $address_1, $address_2, $city, $state, $zipcode);
	}
	
	public static function update_restaurant($phone_number, $price, $address_1, $address_2, $city, $state, $zipcode) {
		$connector = new MySQLConnector();
		$connector->query("UPDATE `restaurant` SET `phone_number` = '" . $phone_number . "', `price` = '" . $price . "', `address_1` = '" . $address_1 . "', `address_2` = '" . $address_2 . "', `city` = '" . $city . "', `state` = '" . $state . "', `zipcode` = '" . $zipcode . "'");
		$_SESSION['active_restaurant']->phone_number = $phone_number;
		$_SESSION['active_restaurant']->price = $price;
		$_SESSION['active_restaurant']->address_1 = $address_1;
		$_SESSION['active_restaurant']->address_2 = $address_2;
		$_SESSION['active_restaurant']->city = $city;
		$_SESSION['active_restaurant']->state = $state;
		$_SESSION['active_restaurant']->zipcode = $zipcode;
	}
	
	public static function update_thumbnail($local_img, $image_url) {
		$connector = new MySQLConnector();
		$connector->query("UPDATE `restaurant` SET `local_img` = " . $local_img . ", `image_url` = '" . $image_url . "'");
		$_SESSION['active_restaurant']->local_img = $local_img;
		$_SESSION['active_restaurant']->image_url = $image_url;
	}
}
?>