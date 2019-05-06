<?php
function generate_footer() {
	echo "<footer id='footer-container' class='container-fluid'>";
	echo "<div class='row h-100'>";
	echo "<div class='col-sm-2 d-none d-sm-block'></div>";
	echo "<div class='col-sm-8 col-6 center-content'>Blantz - Mateen - Yeh</div>";
	echo "<div class='col-sm-2 col-6 justify-right'><span class='align-middle'>Powered by&nbsp;</span><img height=30 src='" . redirect_prefix('Resources/images/yelp-logo.png') . "' /></div>";
	echo "</div></footer>";
}
?>