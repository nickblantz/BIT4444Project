<?php
class Comment {
	public  $comment_id,
			$timestamp,
			$comment;
	
	/**
	 * Constructor
	 */
	function __construct($comment_id, $timestamp, $comment){
		$this->comment_id = $comment_id;
		$this->timestamp = $timestamp;
		$this->comment = $comment;
	}
	
	public function __toString() {
        return "(" . $this->comment_id . ", " . $this->timestamp . ", " . $this->comment . ")";
    }
	
	public static function create_comment($comment) {
		$connector = new MySQLConnector();
		$connector -> query("INSERT INTO `comment` (`timestamp`, `comment`) VALUES ('" . date("Y/m/d H:i:s") . "', '" . $comment . "')");
	}
}
?>