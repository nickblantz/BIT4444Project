<?php
$restricted_level = 3;
$page_name = 'Restaurant Stats';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

generate_html_beginning($page_name);
?>
 <div class="row justify-content-center">
  <figure class="col-12 col-md-10 figure m-3">
   <h3>Search Appearances</h3>
   <svg width="100%" height="100"></svg>
  </figure>
  <figure class="col-12 col-md-10 figure m-3">
   <h3>Researches</h3>
   <svg width="100%" height="100"></svg>
  </figure>
 </div>
<?php
generate_html_ending($page_name);
?>