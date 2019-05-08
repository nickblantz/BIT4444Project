<?php
$restricted_level = 0;
$page_name = 'Contact Us';
require_once('Resources/lib/session_controller.php');

$uid;
if(isset($_COOKIE['uid'])) {
	$uid = $_COOKIE['uid'];
} else {
	$uid = uniqid();
	setcookie('uid', $uid, time() + (86400 * 30));
}

if (isset($_POST['comment_submit']) && $_POST['comment_submit'] != "") {
	$comment = null;
	$error = false;
	
	if (isset($_POST['comment']) && $_POST['comment'] != "") {
		$comment =  $_POST['comment'];
	} else {
		$error = true;
	}
	
	if (!$error) {
		
		Comment::create_comment($uid, $comment);
		header('location: ContactUs.php');
	}
}

if (isset($_POST['update_submit']) && $_POST['update_submit'] != "") {
	Comment::update_comment($_POST['update_submit'], $_POST['update_text']);
}

if (isset($_POST['delete_submit']) && $_POST['delete_submit'] != "") {
	Comment::delete_comment($_POST['delete_submit']);
}

$comments = Comment::get_comments($uid);
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row">
    <form method="POST">
     <div class="col justify-center">
	  <div class="border">
	   <br />
       <p>We look forward to reading your feedback on ways that we can improve our application. We appreciate the time and effort you put into providing us with comments on how we can make our page more suitable for you. </p>
	   <p>Thank you for choosing Indecisive Eats!</p>
	  </div>
	  <br />
	  <div>
       <h4>Please insert your comments:</h4>
       <textarea class="form-control" name="comment" rows="5" cols="70"></textarea>
	  </div>
	  <br />
      <div>
       <input class="btn btn-primary" type="submit" name="comment_submit" value="Submit">
       <input class="btn btn-secondary" type="reset" name="reset" value="Reset">
      </div>
	 </div>
	</div>
   </form>
   <br /><br />
    <h4 class='justify-center'>Your Comments:</h4>
	<?php
	while($row = mysqli_fetch_array($comments)) {
		echo '<hr />';
		echo '<form method="POST">';
		echo '<div class="row">';
		echo '<div class="col-md-2"></div>';
		echo '<div class="col-9 col-md-5">';
		echo '<textarea class="form-control" name="update_text">' . $row['comment'] . '</textarea>';
		echo '</div>';
		echo '<div class="col-3 col-md-3 justify-center">';
		echo '<button name="update_submit" class="btn btn-primary" value="' .  $row['comment_id'] . '">Update</button>&nbsp;';
		echo '<button name="delete_submit" class="btn btn-danger" value="' .  $row['comment_id'] . '">Delete</button>';
		echo '</div>';
		echo '<div class="col-md-2"></div>';
		echo '</div>';
		echo '</form>';
	}
	echo '<hr />';
	?>
   <div class="col-md-2"></div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>