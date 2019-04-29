<?php
if (isset($error) && !$error) {
	foreach($result['businesses'] as $restaurant) {
		if ($address_1 == $restaurant['location']['address1']) {
			echo "<div class='row border mx-auto'>";
			echo "<div class='col-sm-3 d-none d-sm-block justify-center'>";
			echo "<img src='" . $restaurant['image_url'] . "' class='rounded-circle search-result-thumbnail'>";
			echo "</div>";
			echo "<div class='col-8 col-sm-6'>";
			echo "<h2>" . $restaurant['name'] . "</h2>";
			if ($restaurant['location']['address2'] != "") {
				echo "<p>" . $restaurant['location']['address1'] . "<br />" . $restaurant['location']['address2'] . "<br />" . $restaurant['location']['city'] . ", " . $restaurant['location']['state'] . " " . $restaurant['location']['zip_code'] . "</p>";
			} else {
				echo "<p>" . $restaurant['location']['address1'] . "<br />" . $restaurant['location']['city'] . ", " . $restaurant['location']['state'] . " " . $restaurant['location']['zip_code'] . "</p>";
			}
			echo "</div>";
			echo "<div class='col-4 col-sm-3 justify-center'>";
			echo "<button name='rest_id' value='" . $restaurant['id'] . "' class='btn btn-outline-secondary border search-result-claim'>";
			echo "<img src='../images/checkmark-26.png' />";
			echo "<span>Claim</span>";
			echo "</button>";
			echo "</div>";
			echo "</div>";
			echo "<br />";
		}
	}
} elseif (isset($claim_error) && $claim_error) {
	echo "<h3>Selected restaurant has already been claimed</h3>";
}
?>