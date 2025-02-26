<?php

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

$all_accessible_users = $wpdb->get_results(

@$wpdb->prepare(

"SELECT * from ".my_services_accessible_users()." ORDER by id DESC",""),ARRAY_A);

//print_r($all_services);accessible_users 

 ?>


<div>
  <h3>Manage Acceble User List</h3>
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
                <th>Email</th>
                <th>Username</th>
                <th>created on</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      <?php

       if(count($all_accessible_users) > 0  ){
            $i = 1;
          foreach ($all_accessible_users as $key => $value) {  ?>


      <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo esc_html($value['name']); ?></td>
          <td><?php echo esc_html($value['email_id']); ?></td>
          <td>
            <?php $serviceregisteruser = $value['user_login_id']; ?>
            <?php $the_user = get_user_by( 'id', $serviceregisteruser ); 
            echo esc_html($the_user->user_login); ?>
            </td>
          <td><?php echo esc_html($value['created_on']); ?></td>
          <td>
            <a class="btn btn-danger deleteaccebleuser" href="javascript:void(0)" data-id="<?php echo esc_html($value['user_login_id']); ?>">Delete</a>

          </td>
      </tr>

<?php } }  ?>

        </tbody>
  </div>
</div>  
    </table>
  </div>
</div>
