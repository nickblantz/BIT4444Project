<?php
$restricted_level = 0;
$page_name = 'About Us';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <?php generate_head($page_name); ?>
 </head>
 <body>
  <?php generate_main_beginning(); ?>
   <div id="au-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
     <li data-target="#au-carousel" data-slide-to="0" class="active"></li>
     <li data-target="#au-carousel" data-slide-to="1"></li>
     <li data-target="#au-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
     <div class="carousel-item active">
      <img class="d-block w-100" src="Resources/images/AUCarousel1.jpeg" alt="First slide">
	  <div class="carousel-caption" style="color: black;">
       <span>Indecisive Eats is designed to supply indecisive diners with a platform to randomly select a restaurant in their area to eat at.</span>
      </div>
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="Resources/images/AUCarousel2.jpeg" alt="Second slide">
	  <div class="carousel-caption" style="">
       <span>It will allow them to serach based on a culinary style (Mexican, Japanese, Indian, etc.), location, price, or no filters.</span>
      </div>
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="Resources/images/AUCarousel3.jpeg" alt="Third slide">
	  <div class="carousel-caption" style="">
       <span>Diners can use the application to find places to eat and the representatives can use the application to see statistics and reviews about their restaurant.</span>
      </div>
     </div>
    </div>
    <a class="carousel-control-prev" href="#au-carousel" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#au-carousel" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  <?php generate_main_end(); ?>
  <?php generate_header($page_name); ?>
  <?php generate_footer(); ?>
 </body>
</html>