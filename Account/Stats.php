<?php
$restricted_level = 1;
$page_name = 'My Stats';
require_once('../Resources/lib/session_controller.php');

$connector = new MySQLConnector();
$result = $connector -> query("SELECT * FROM `user_stats` WHERE `user_id` = '" . $_SESSION['active_user']->user_id . "'");
$data = array();
while($row = mysqli_fetch_assoc($result)) { $data[] = $row; }

$date_map = array();
$formatted_data = array();
for($i = 0; $i < sizeof($data); $i++) {
	$new_record;
	$date_identifier = date_format(date_create($data[$i]['timestamp']), "d/m/Y");
	
	if(!isset($date_map[$date_identifier])) {
		$date_map[$date_identifier] = sizeof($formatted_data);
		$new_record = array();
		$new_record['date'] = $date_identifier;
		$new_record['searches'] = 1;
		$new_record['skips'] = (int)$data[$i]['is_skip'];
		$formatted_data[] = $new_record;
	} else {
		$formatted_data[$date_map[$date_identifier]]['searches'] += 1;
		$formatted_data[$date_map[$date_identifier]]['skips'] += (int)$data[$i]['is_skip'];
	}
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
  <script> var jsonData = <?php echo json_encode($formatted_data); ?>; </script>
  <script src="../Resources/js/d3.min.js"></script>
  <script src="../Resources/js/graph.js"></script>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row justify-content-center">
    <figure id="appearance-container" class="col-12 col-md-8 col-lg-6 figure m-3">
     <h3>Searches</h3>
      <svg id="search-svg" width="100%" height="200"></svg>
    </figure>
	<figure id="skip-container" class="col-12 col-md-8 col-lg-6 figure m-3">
	 <h3>Skips</h3>
     <svg id="skips-svg" width="100%" height="200"></svg>
    </figure>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>