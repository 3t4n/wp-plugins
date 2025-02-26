<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="wrap">
   <div class="dig-main-form-wrapper all_dig">
   
   
   <?php
	 global $wpdb;  
	 $table_name =  $wpdb->prefix . 'dashboard_instruction_guide';
	 $allResults =  $wpdb->get_results("SELECT * FROM $table_name");
 
	 ?>
	 <div class="dig-list-wrappers">
		 <table class='wp-list-table widefat striped'>
          <thead>
            <tr>
              <th>#<?php _e( 'SL', 'dashboard-instruction-guide' ); ?></th>
              <th class="title-column"><?php _e( 'Title', 'dashboard-instruction-guide' ); ?></th>
                <th> <?php _e( 'Assigned to', 'dashboard-instruction-guide' ); ?></th>
              <th><?php _e( 'Status', 'dashboard-instruction-guide' ); ?></th>
               <th><?php _e( 'Actions', 'dashboard-instruction-guide' ); ?></th>
            </tr>
          </thead>
          <tbody>
 			
			<?php 
			$i=1;
			foreach($allResults as $allResult){ ?>
              <tr>
			  <td><strong><?php  esc_html_e( $i, 'dashboard-instruction-guide' ); ?></strong></td>
                <td class="dig-list-title"><?php echo esc_html($allResult->title) ?></td>
                <td><?php echo  ucfirst($allResult->assigned_into); ?></td>
                <td>
				<?php 
					if($allResult->status == 1){
						echo '<span class="published badge">'.__('Publish','dashboard-instruction-guide') . '</span>';
					}else{
						echo '<span class="draft badge">'.__('Draft','dashboard-instruction-guide') . '</span>';
					}
				?>
			  </td>
                  <td width='250px'>
				   <button data-id="<?php echo esc_attr($allResult->id); ?>" class='button view-button'><?php _e('View','dashboard-instruction-guide') ?></button> 
				   <a class="button" href="<?php echo esc_url( admin_url( "/admin.php?page=dashboard-instruction-guide&edit_id=$allResult->id" )); ?>"><?php _e('Edit','dashboard-instruction-guide') ?></a>
  				 	 <button data-id="<?php echo esc_attr($allResult->id); ?>" class='button delete-button'><?php _e('Delete','dashboard-instruction-guide') ?></button> 

 				 </td>
              </tr>
			<?php $i++; } ?>
          </tbody>
        </table>
		</div>
		<div class="dig-response-wrapper">
			<div class="dig-response-inner">
				<div id="dig_response"></div>
			</div>
		</div>
   </div>
   </div>