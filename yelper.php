<html>
<head>

</head>
<body>
<?php
include_once('lib/yelp_connector.php');

$connector = new YelpConnector();
$radius_miles = 10;
$address = '23059';
$price = array(1, 2);

$result = $connector -> restaurant_search(array( 'location' => $address, 'radius' => $radius_miles * 1609, 'price' => $price ));
foreach($result['businesses'] as $restaurant) {
	echo '<p>' . $restaurant['name'] . $restaurant['location']['address1'] . '</p>';
}

$result = $connector -> restaurant_details('WDpeRcUdWEgt1sPHZy-10Q');
echo '<p>' . $result['name'] . $result['location']['address1'] . '</p>';

// include_once('lib/mysql_connector.php');

// $connector = new MySqlConnector();

// $result = $connector -> query('SELECT * FROM `user`');
// while($row = mysqli_fetch_array($result)) {
	// echo '<p>' . $row['first_name'] . '</p>';
// }
?>
</body>
<html>