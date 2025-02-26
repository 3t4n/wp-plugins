<?php

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

$all_services = $wpdb->get_results(

@$wpdb->prepare(

"SELECT * from ".my_sercices_detaildata()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);

 ?>


<div>
  <h3 class="wp-heading-inline">Services List <a class="page-title-action" style="border:solid;border-width: 1px;padding: 5px;font-size: 16px;" href="<?php echo site_url().'/wp-admin/admin.php?page=add-services'; ?>">Add New</a></h3>
</div><br>
<div class="container">
  <div class="">
    <div class="table table-striped table-bordered">
  <div class="panel-body">
    
      <table id="my-services" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Client Name</th>
                <th>Documents</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      <?php

        if(count($all_services) > 0  ){
            $i = 1;
          foreach ($all_services as $key => $value) {  ?>


      <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo esc_html($value['name']); ?></td>
          <td><?php echo esc_html($value['client_name']); ?></td>

<td>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?php echo $i;  ?>">View Now</button>


<!--*************** Documents popup ***********-->

<div class="modal" id="myModal-<?php echo $i; // Displaying the increment ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
  <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 20%;float: right;">Close</button>
    </div>

       <div class="modal-header">
  <h3 class="modal-title" style="font-size: 18px;font-weight: 600;text-align: center; background-color: orange;border-radius:10px; ">Detail of <?php echo esc_html($value['name']); ?>.</h3>
      </div>

<div style="width: 100%;background-color: green;background-color: #003080;
    color: #ffffff;">
  <div><span style="font-size: 16px;">Description</span></div>
<span style="font-size: 14px;"><?php echo esc_html($value['description']); ?></span>
</div>

<table>
   <tr>
    <th>Documents</th>
    <?php 
$mydata = $value['service_documnts'];
$mydata = unserialize($mydata); ?> 

<?php $dummyfileurlvw = plugin_dir_url( __DIR__ ).'assets/images/dummy12.jpg';?>

<?php foreach ($mydata as $key => $valuedocfile) { ?>
<?php if(!empty($valuedocfile)) { ?>
<th><embed src="<?php echo esc_html($valuedocfile); ?>" style='width:70px;height:70px;'/></th>
<?php } else { ?>
<th><embed src="<?php echo esc_html($dummyfileurlvw); ?>" style='width:70px;height:70px;'/></th>
 <?php } ?> 
<?php } ?>

  </tr>
</table>


    </div>
  </div>
</div>

<!--*************** Documents popup ***********-->
          </td>



          <td><img src="<?php echo esc_url($value['serviceimage']); ?>" style="width: 50px;height: 50px;"></td>
          <td><a class="btn btn-info" href="admin.php?page=edit-services&edit=<?php echo esc_html($value['id']); ?>" >Edit</a>|<a class="btn btn-danger deleteservices" href="javascript:void(0)" data-id="<?php echo esc_html($value['id']); ?>">Delete</a></td>
      </tr>

<?php } }  ?>


        </tbody>
  </div>
</div>  
    </table>
  </div>
</div>

