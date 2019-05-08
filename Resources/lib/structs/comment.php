<?php
class Comment {
	public  $comment_id,
			$uid,
			$timestamp,
			$comment;
	
	/**
	 * Constructor
	 */
	function __construct($comment_id, $uid, $timestamp, $comment){
		$this->comment_id = $comment_id;
		$this->uid = $uid;
		$this->timestamp = $timestamp;
		$this->comment = $comment;
	}
	
	public function __toString() {
        return "(" . $this->comment_id . ", " . $this->uid . ", " . $this->timestamp . ", " . $this->comment . ")";
    }
	
	public static function create_comment($uid, $comment) {
		$connector = new MySQLConnector();
		$connector -> query("INSERT INTO `comment` (`uid`, `timestamp`, `comment`) VALUES ('". $uid. "', '" . date("Y/m/d H:i:s") . "', '" . $comment . "')");
	}
	
	public static function delete_comment($comment_id) {
		$connector = new MySQLConnector();
		$connector -> query("DELETE FROM `comment` WHERE `comment_id` = '" . $comment_id . "'");
	}
	
	public static function update_comment($comment_id, $comment) {
		$connector = new MySQLConnector();
		$connector -> query("UPDATE `comment` SET `comment` = '" . $comment . "' WHERE `comment_id` = " . $comment_id);
	}
	
	public static function get_comments($uid) {
		$connector = new MySQLConnector();
		return $connector -> query("SELECT * FROM `comment` WHERE `uid` = '" . $uid . "'");
	}
	
	
}
?>