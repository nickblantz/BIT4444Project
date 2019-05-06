<?php
require_once('yelp_connector.php');
$latitude = (isset($_POST['latitude']) && $_POST['latitude'] != '') ? $_POST['latitude'] : null;
$longitude = (isset($_POST['longitude']) && $_POST['longitude'] != '') ? $_POST['longitude'] : null;
$yelper = new YelpConnector();
$result = $yelper -> restaurant_search(array("latitude" => $latitude, "longitude" => $longitude));
echo json_encode($result);
?>