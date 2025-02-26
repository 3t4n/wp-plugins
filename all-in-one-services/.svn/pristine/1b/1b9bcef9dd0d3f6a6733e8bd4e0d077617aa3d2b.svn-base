<?php

if ( ! defined( 'ABSPATH' ) ) exit;

 wp_enqueue_media(); ?>

<?php $service_id = isset($_GET['edit'])?intval($_GET['edit']):0; 

global $wpdb;

$services_detail = $wpdb->get_row(

  $wpdb->prepare(
"SELECT * from ".my_sercices_detaildata()." WHERE id = %d",$service_id

),ARRAY_A);


?>

<div class="container">
  <div class="">
    <div class="alert alert-info">
      <h4>Update Services</h4>
    </div>
    <div class="table table-striped table-bordered">
  <div class="panel-body">

    <form class="form-horizontal" action="javascript:void(0)" id="updateServices">
  <input type="hidden" name="service_id" value="<?php echo isset($_GET['edit'])?intval($_GET['edit']):0; ?>">
  <div class="form-group">    
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo esc_html($services_detail['name']); ?>" id="name" name="name" required placeholder="Enter name">
    </div>
  </div>

    <div class="form-group">    
    <label class="control-label col-sm-2" for="client_name">Client:</label>
    <div class="col-sm-10">
      <select class="form-control" id="client_name" name="client_name">
        <option value="<?php echo esc_html($services_detail['client_name']); ?>"><?php echo esc_html($services_detail['client_name']); ?></option>

        <?php

global $wpdb;

$all_clients = $wpdb->get_results(

$wpdb->prepare(

"SELECT * from ".my_services_clientdetaildata()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);

 ?>

  <?php
          foreach ($all_clients as $key => $value) {  ?>

<option value="<?php echo esc_html($value['name']); ?>"><?php echo esc_html($value['name']); ?></option>

<?php  } ?>

      </select>
      <!-- <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name"> -->
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Description:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" required name="description" rows="5"><?php echo esc_textarea($services_detail['description']); ?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Upload Image:</label>
    <div class="col-sm-10">
      <span id="imgservec">
        <img src="<?php echo esc_url($services_detail['serviceimage']); ?>" style="width: 100px;height: 100px;">
      </span>
      <input type="hidden" id="image_name" name="image_name" value="<?php echo esc_html($services_detail['serviceimage']); ?>">
     <input type="button" class="btn btn-info" required value="Upload Image" id="servicesimage">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Upload Documents:</label>
    

<?php 
$mydata = $services_detail['service_documnts'];
$mydata = unserialize($mydata); 
?> 

    <div class="col-sm-10">
      
      <span id="docservec">
        <?php $dummyfileurl = plugin_dir_url( __DIR__ ).'assets/images/dummy12.jpg';?>
        <embed src="<?php
        if(!empty($mydata['docfille_name'])) {
         echo esc_html($mydata['docfille_name']); } else { echo esc_html($dummyfileurl); } ?>" style='width:70px;height:70px;'/>
      </span>
      <input type="hidden" id="docfille_name" name="docfille_name" value="<?php echo esc_html($mydata['docfille_name']); ?>">
     <input type="button" class="btn btn-info" required value="Upload 1" id="servicsdocfilee" style="background-color: black;">
     
     <span id="docservec1"> 
       <embed src="<?php
        if(!empty($mydata['docfille_name1'])) {
        echo esc_html($mydata['docfille_name1']); } else { echo esc_html($dummyfileurl); } ?>" style='width:70px;height:70px;'/>
     </span>
      <input type="hidden" id="docfille_name1" name="docfille_name1" value="<?php echo esc_html($mydata['docfille_name1']); ?>">
     <input type="button" class="btn btn-info" required value="Upload 2" id="servicsdocfilee1" style="background-color: black;">

     <span id="docservec2"> 
       <embed src="<?php
        if(!empty($mydata['docfille_name2'])) {
        echo esc_html($mydata['docfille_name2']); } else { echo esc_html($dummyfileurl); } ?>" style='width:70px;height:70px;'/>
     </span>
      <input type="hidden" id="docfille_name2" name="docfille_name2" value="<?php echo esc_html($mydata['docfille_name2']); ?>">
     <input type="button" class="btn btn-info" required value="Upload 3" id="servicsdocfilee2" style="background-color: black;">

     <span id="docservec3"> 
       <embed src="<?php
        if(!empty($mydata['docfille_name3'])) {
        echo esc_html($mydata['docfille_name3']); } else { echo esc_html($dummyfileurl); } ?>" style='width:70px;height:70px;'/>
     </span>
      <input type="hidden" id="docfille_name3" name="docfille_name3" value="<?php echo esc_html($mydata['docfille_name3']); ?>">
     <input type="button" class="btn btn-info" required value="Upload 4" id="servicsdocfilee3" style="background-color: black;">

      <span id="docservec4"> 
       <embed src="<?php
        if(!empty($mydata['docfille_name4'])) {
        echo esc_html($mydata['docfille_name4']); } else { echo esc_html($dummyfileurl); } ?>" style='width:70px;height:70px;'/>
     </span>
      <input type="hidden" id="docfille_name4" name="docfille_name4" value="<?php echo esc_html($mydata['docfille_name4']); ?>">
     <input type="button" class="btn btn-info" required value="Upload 5" id="servicsdocfilee4" style="background-color: black;">


    </div>


  </div>



  <br><br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>


  </div>
</div>
  </div>
</div>
