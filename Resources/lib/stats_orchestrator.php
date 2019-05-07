<?php
$restricted_level = 0;
require_once('session_controller.php');

require_once('mysql_connector.php');
$connector = new MySQLConnector();
if(isset($_POST['restaurant_id']) && $_POST['restaurant_id'] != '' && isset($_POST['is_skip']) && $_POST['is_skip'] != '') {
	$restaurant_id = $_POST['restaurant_id'];
	$is_skip = $_POST['is_skip'];
	if(isset($_SESSION['active_user'])) {
		$connector->query("INSERT INTO `user_stats`(`user_id`, `timestamp`, `is_skip`) VALUES ('" . $_SESSION['active_user']->user_id . "', '" . date("Y/m/d H:i:s") . "', " . $is_skip . ")");
	}
	if (mysqli_fetch_array($connector->query("SELECT COUNT(1) FROM `restaurant` WHERE `restaurant_id` = '" . $restaurant_id . "'"))['COUNT(1)'] == 1) {
		$connector->query("INSERT INTO `restaurant_stats`(`restaurant_id`, `timestamp`, `is_skip`) VALUES ('" . $restaurant_id . "', '" . date("Y/m/d H:i:s") . "', " . $is_skip . ")");
	}
}
?>