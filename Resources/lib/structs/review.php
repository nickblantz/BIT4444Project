<?php
class Review {
	public  $review_id,
			$user_id,
			$restaurant_id,
			$timestamp,
			$star_review,
			$text_review;
	
	/**
	 * Constructor
	 */
	function __construct($review_id, $user_id, $restaurant_id, $timestamp, $star_review, $text_review){
		$this->review_id = $review_id;
		$this->user_id = $user_id;
		$this->restaurant_id = $restaurant_id;
		$this->timestamp = $timestamp;
		$this->star_review = $star_review;
		$this->text_review = $text_review;
	}
	
	public function __toString() {
        return "(" . $this->review_id . ", " . $this->user_id . ", " . $this->restaurant_id . ", " . $this->timestamp . ", " . $this->star_review . ", " . $this->text_review . ")";
    }
}
?>