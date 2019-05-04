<?php
$restricted_level = 1;
$page_name = 'New Review';
require_once('../Resources/lib/session_controller.php');

if (isset($_POST['review_submit']) && $_POST['review_submit'] != "") {
	$star_review = null;
	$text_review = null;
	$error = false;
	
	if (isset($_POST['star_review']) && $_POST['star_review'] != "") {
		$star_review =  $_POST['star_review'];
	} else {
		$error = true;
	}
	if (isset($_POST['text_review']) && $_POST['text_review'] != "") {
		$text_review =  $_POST['text_review'];
	} else {
		$error = true;
	}
	
	if (!$error) {
		Review::create_review($star_review, $text_review);
		header('location: ' . redirect_prefix('Restaurant/View'));
	}
}
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <form method="POST">
     <div class="col-8 col-md-6 col-lg-4 mx-auto">
      <label for="star_review">Stars:</label><input type="number" min=1 max=5 name="star_review" class="form-control" value=5 />
      <label for="text_review">Review:</label><textarea name="text_review" rows=6 class="form-control"/></textarea>
     </div>
	 <br />
	 <div class="col-6 justify-center">
      <input class="btn btn-primary" type="submit" name="review_submit" />
	 </div>
	</form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>