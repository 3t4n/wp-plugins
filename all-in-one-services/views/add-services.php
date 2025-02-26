<?php

if ( ! defined( 'ABSPATH' ) ) exit;

 wp_enqueue_media(); ?>


<div class="container">
  <div class="">
    <div class="alert alert-info">
      <h4>Add Services</h4>
    </div><!-- 
    <div class="panel panel-primary"> -->
      <div class="table table-striped table-bordered">
  <div class="panel-body">

    <form class="form-horizontal" action="javascript:void(0)" id="addServices">
  
  <div class="form-group">    
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name">
    </div>
  </div>

  <div class="form-group">    
    <label class="control-label col-sm-2" for="client_name">Client:</label>
    <div class="col-sm-10">
      <select class="form-control required" id="client_name" name="client_name">
        <option value=" ">  -- Chose Client --  </option>
<?php

global $wpdb;

$all_clients = $wpdb->get_results(

$wpdb->prepare(

"SELECT * from ".my_services_clientdetaildata()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);

 ?>

  <?php
          foreach ($all_clients as $key => $value) {  ?>

<option value="<?php echo esc_html($value['name']) ?>"><?php echo esc_html($value['name']) ?></option>

<?php  } ?>

      </select>
      <!-- <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name"> -->
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Description:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" required name="description" rows="5"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Upload Image:</label>
    <div class="col-sm-10">
      <span id="imgservec"></span>
      <input type="hidden" id="image_name" name="image_name">
     <input type="button" class="btn btn-info" required value="Upload Image" id="servicesimage">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Upload Documents:</label>
    <div class="col-sm-10">
      <span id="docservec"></span>
      <input type="hidden" id="docfille_name" name="docfille_name">
     <input type="button" class="btn btn-info" required value="Upload 1" id="servicsdocfilee" style="background-color: black;">
     <span id="docservec1"></span>
      <input type="hidden" id="docfille_name1" name="docfille_name1">
     <input type="button" class="btn btn-info" required value="Upload 2" id="servicsdocfilee1" style="background-color: black;">
     <span id="docservec2"></span>
      <input type="hidden" id="docfille_name2" name="docfille_name2">
     <input type="button" class="btn btn-info" required value="Upload 3" id="servicsdocfilee2" style="background-color: black;">
     <span id="docservec3"></span>
      <input type="hidden" id="docfille_name3" name="docfille_name3">
     <input type="button" class="btn btn-info" required value="Upload 4" id="servicsdocfilee3" style="background-color: black;">
      <span id="docservec4"></span>
      <input type="hidden" id="docfille_name4" name="docfille_name4">
     <input type="button" class="btn btn-info" required value="Upload 5" id="servicsdocfilee4" style="background-color: black;">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>


  </div>
</div>
  </div>
</div>

