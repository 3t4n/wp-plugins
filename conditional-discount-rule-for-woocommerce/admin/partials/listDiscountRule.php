<div class="row">
    <div class="col-12 py-3 text-right"><a class="btn btn-primary btn-sm mr-3" href="<?php echo admin_url( 'admin.php?page=pisol-cdrw&tab=pi_cdrw_add_rule' ); ?>"><span class="dashicons dashicons-plus"></span><?php _e('Add Discount Rule','conditional-discount-rule-woocommerce'); ?></a>
    </div>
</div>
<?php

$shipping_methods = get_posts(array(
    'post_type'=>'pi_discount_rule',
    'numberposts'      => -1
));

?>
<div id="pisol-cdrw-discount-list-view">
<table class="table text-center table-striped">
				<thead>
				<tr class="afrsm-head">
					<th><?php _e( 'Discount', 'conditional-discount-rule-woocommerce'); ?></th>
					<th><?php _e( 'Amount', 'conditional-discount-rule-woocommerce'); ?></th>
					<th><?php _e( 'Status', 'conditional-discount-rule-woocommerce'); ?></th>
					<th><?php _e( 'Actions', 'conditional-discount-rule-woocommerce'); ?></th>
				</tr>
				</thead>
                <tbody >
                

<?php
if(count($shipping_methods) > 0){
foreach($shipping_methods as $method){
    $discount   = get_post_meta( $method->ID, 'pi_discount', true );
    $discount_type   = get_post_meta( $method->ID, 'pi_discount_type', true );
    $discount_title  = get_the_title( $method->ID ) ? get_the_title( $method->ID ) : 'Shipping Method';
    $discount_status = get_post_meta( $method->ID, 'pi_status', true );
    echo '<tr  id="pisol_tr_container_'.$method->ID.'">';
    echo '<td><a href="'.admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_rule&action=edit&id='.$method->ID ).'">'.esc_html($discount_title).'</a></td>';
    echo '<td>';
    
								if ( $discount_type == 'fixed' ) {
									echo $discount;
								} elseif ( $discount_type == 'percentage' ) {
									echo esc_html($discount).' %';
								} elseif ( $discount_type == 'future_coupon' ) {
                                    $coupon_template_id   = get_post_meta( $method->ID, 'pi_coupon_template', true );
                                    $coupon_temp_name = get_the_title( $coupon_template_id );
									echo $coupon_temp_name;
								}
							
    echo '</td>';
    echo '<td>';
    echo '<div class="custom-control custom-switch">
    <input type="checkbox" value="1" '.checked($discount_status,'on', false).' class="custom-control-input pi-cdrw-status-change" name="pi_status" id="pi_status_'.$method->ID.'" data-id="'.esc_attr($method->ID).'">
    <label class="custom-control-label" for="pi_status_'.$method->ID.'"></label>
    </div>';
    echo '</td>';
    echo '<td>';
    echo '<a href="'.wp_nonce_url(admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_rule&action=edit&id='.$method->ID ), 'cdrw-edit').'" class="btn btn-primary btn-sm mr-2"><span class="dashicons dashicons-admin-customizer"></span> Edit</a>';
    echo '<a href="'.wp_nonce_url(admin_url( '/admin.php?page=pisol-cdrw&action=cdrw_delete&id='.$method->ID ), 'cdrw-delete-'.$method->ID).'" class="btn btn-warning btn-sm pi-cdrw-delete"><span class="dashicons dashicons-trash"></span> Delete</a>';
    echo '</td>';
    echo '</tr>';
}
}else{
    echo '<tr>';
    echo '<td colspan="4" class="text-center">';
    echo __('There are no discount rule added yet, add them first','conditional-discount-rule-woocommerce' );
    echo '</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</div>