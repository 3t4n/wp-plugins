<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

$all_services = $wpdb->get_results(

@$wpdb->prepare(

"SELECT * from ".my_services_access_tracker()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);

 ?>


<div>
  <h3>My Services Tracker List</h3>
</div>
<div class="container">
  <div class="">
    <div class="table table-striped table-bordered">
  <div class="panel-body">
    
      <table id="my-services" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>User Name</th>
                <th>Services Name</th>
                <th>Created On</th>
               <!--  <th>Image</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      <?php

        if(count($all_services) > 0  ){
            $i = 1;
          foreach ($all_services as $key => $value) {  ?>


            <?php $serviceregisteruser = esc_html($value['serviceuser_id']); ?>
            <?php $the_user = get_user_by( 'id', $serviceregisteruser ); ?>
<?php if(!empty($the_user)) { ?>
      <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo esc_html($the_user->user_login); ?></td>
          <td><?php echo esc_html($value['service_name']); ?></td>
          <td><?php echo esc_html($value['created_on']); ?></td>
          <td><a class="btn btn-danger deletesevicesacess" href="javascript:void(0)" data-id="<?php echo esc_html($value['id']); ?>">Delete</a></td>
      </tr>
<?php } else ''; ?>
<?php } }  ?>


        </tbody>
  </div>
</div>  
    </table>
  </div>
</div>
