<?php
function generate_main_beginning() {
	echo "<main id='main-container' class='container-fluid'>";
	echo "<div id='main-container-row' class='row h-100'>";
	echo "<div class='col-md-2 col-sm-1 d-none d-sm-block side-panel'></div>";
	echo "<div id='content' class='col-md-8 col-sm-10 col-12'>";
	echo "<br />";
}

function generate_main_end() {
	echo "<br /><br />";
	echo "</div>";
	echo "<div class='col-md-2 col-sm-1 d-none d-sm-block side-panel'></div>";
	echo "</div></main>";
}
?>