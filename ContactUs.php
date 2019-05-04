<?php
$restricted_level = 0;
$page_name = 'Contact Us';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div class="row">
    <div class="col justify-center">
     <form>
	  <div>
       <h4>Please insert your comments:</h4>
       <textarea class="form-control" name="comments" rows="5" cols="70"></textarea>
	  </div>
	  <br />
	  <div class="border">
	   <br />
       <p>We look forward to reading your feedback on ways that we can improve our application. We appreciate the time and effort you put into providing us with comments on how we can make our page more suitable for you. </p>
	   <p>Thank you for choosing Indecisive Eats!</p>
	  </div>
	  <br />
      <div>
       <input class="btn btn-primary" type="submit" name="submit" value="Submit">
       <input class="btn btn-secondary" type="reset" name="reset" value="Reset">
      </div>
	 </div>
	</div>
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>