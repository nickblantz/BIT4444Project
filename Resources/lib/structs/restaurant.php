<?php
class Restaurant {
	public  $restaurant_id,
			$owner_id,
			$blurb;
	
	/**
	 * Constructor
	 */
	function __construct($restaurant_id, $owner_id, $blurb){
		$this->restaurant_id = $restaurant_id;
		$this->owner_id = $owner_id;
		$this->blurb = $blurb;
	}
	
	public function __toString() {
        return "(" . $this->restaurant_id . ", " . $this->owner_id . ", " . $this->blurb . ")";
    }
}
?>