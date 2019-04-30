<?php
$restricted_level = 3;
$page_name = 'Restaurant Edit';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

generate_html_beginning($page_name);
?>
 <div class="row justify-content-center no-gutters mx-auto">
  <div class="col-12 col-sm-8 col-md-6 col-lg-5 border">
   <div class="m-2 justify-center">
    <h5 class="d-inline">Current Thumbnail:&nbsp;</h5>
    <img src="https://s3-media2.fl.yelpcdn.com/bphoto/CPc91bGzKBe95aM5edjhhQ/o.jpg" class="rounded-circle search-result-thumbnail">
   </div>
   <hr />
   <form>
    <h5 class="ml-3">New Thumbnail</h5>
    <div class="input-group mb-3">
     <div class="custom-file">
      <input type="file" class="custom-file-input" id="inputGroupFile02">
      <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
     </div>
     <div class="input-group-append">
      <button class="btn btn-primary" type="submit">Update</button>
     </div>
    </div>
   </form>
  </div>
 </div>
 <br />
 <div class="row justify-content-center no-gutters border">
  <div class="col-12 col-md-6 my-2">
   <h5>Current Blurb</h5>
   <div class="">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet euismod urna, varius accumsan libero pulvinar ut. Sed nec est at ipsum pharetra tincidunt. Nunc venenatis cursus massa quis malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce vel lectus id urna faucibus congue. Phasellus nec nunc congue, gravida dolor et, rutrum mi. Donec accumsan quis felis et eleifend.</p>
   </div>
  </div>
  <div class="col-12 col-md-6 border-left my-2">
   <form>
    <div class="form-group">
     <h5 for="exampleFormControlTextarea1">New Blurb</h5>
     <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    <div class="justify-right">
     <button class="btn btn-primary" type="submit">Update</button>
     <button class="btn btn-secondary" type="reset">Clear</button>
    </div>
   </form>
  </div>
 </div>
 <br />
 <div class="justify-center">
  <form method="POST" action="View">
   <button class="btn btn-lg btn-primary" type="submit" name="view_submit">View Public Page</button>
  </form>
  <br />
  <form method="POST" action="Stats">
   <button class="btn btn-lg btn-primary" type="submit" name="stats_submit">View Statistics</button>
  </form>
 </div>
<?php
generate_html_ending($page_name);
?>