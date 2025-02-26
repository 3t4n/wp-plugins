<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

$all_clients = $wpdb->get_results(

@$wpdb->prepare(

"SELECT * from ".my_services_clientdetaildata()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);

 ?>


<div>
  <h3>Manage Client List</h3>
</div>
<div class="container">
  <div class="">
    <div class="table table-striped table-bordered">
  <div class="panel-body">
    
      <table id="my-services" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>FB Link</th>
                <th>Description</th>
               <!--  <th>Image</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      <?php

        if(count($all_clients) > 0  ){
            $i = 1;
          foreach ($all_clients as $key => $value) {  ?>


      <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo esc_html($value['name']); ?></td>
          <td><?php echo esc_html($value['socila_link']); ?></td>
          <td><?php echo esc_html($value['about_client']); ?></td>
          <!-- <td><img src="<?php echo $value['serviceimage']; ?>" style="width: 50px;height: 50px;"></td> -->
          <td>
<!-- 
            <a class="btn btn-info" href="admin.php?page=edit-services&edit=<?php echo $value['id']; ?>" >Edit</a>| -->

            <a class="btn btn-danger deleteclient" href="javascript:void(0)" data-id="<?php echo esc_html($value['id']); ?>">Delete</a>

          </td>
      </tr>

<?php } }  ?>


        </tbody>
  </div>
</div>  
    </table>
  </div>
</div>
