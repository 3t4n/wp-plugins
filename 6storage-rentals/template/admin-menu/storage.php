<?php 
global $wpdb;

use SixStorageOnline\models\Six_Storage_LeadTable;

$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );

$retrieve_data =  (new Six_Storage_LeadTable)->find();


?>
<div class="six-storage-online-root-class">
    <h3 class="6storage-heading"> Lead Information  </h3>
    <form action="" name="six_storage_storage_form_submit" method="post">
        <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white six-storage-online-mobile-view-bottom-scroller">
          <thead class="six-storage-grid-thead-light six-storage-grey six-storage-lighten-4">
          <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Country</th>
              <th>ZipCode</th>
              <th>Lead Source</th>
              <th>Contact Me On </th>
              <th> Contact Through </th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ( $retrieve_data as $print )   { 
                
              
                ?>
                <tr>
                  <td>  <?php echo esc_html(empty($print->firstName) !== true ? $print->firstName : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->lastName) !== true ? $print->lastName : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->email) !== true ? $print->email : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->mobile) !== true ? $print->mobile : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->address) !== true ? $print->address : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->city) !== true ? $print->city : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->state) !== true ? $print->state : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->country) !== true ? $print->country : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->zipCode) !== true ? $print->zipCode : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->leadsource) !== true ? $print->leadsource : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->preferred_movein_date) !== true ? $print->preferred_movein_date : 'NA'); ?></td>
                  <td>  <?php echo esc_html(empty($print->contactPreference) !== true ? implode( ',' , $print->contactPreference) : 'NA'); ?> </td>
                  <td>  <?php echo esc_html(empty($print->message) !== true ? $print->message : 'NA'); ?> </td>
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
    </form>
</div>
