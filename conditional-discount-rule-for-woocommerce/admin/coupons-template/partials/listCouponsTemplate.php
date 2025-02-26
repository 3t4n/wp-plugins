<div class="row">
    <div class="col-12 py-3 text-right"><a class="btn btn-primary btn-sm mr-3" href="<?php echo admin_url( 'admin.php?page=pisol-cdrw&tab=pi_cdrw_add_coupon_template' ); ?>"><span class="dashicons dashicons-plus"></span> Add Coupon template</a>
    </div>
</div>
<?php

$coupons_templates = pisol_cdrw_coupon_template::getAllTemplates();

?>
<div id="pisol-cdrw-discount-list-view">
<table class="table text-center table-striped">
				<thead>
				<tr class="afrsm-head">
					<th><?php _e( 'Coupon template', 'conditional-discount-rule-woocommerce'); ?></th>
					<th><?php _e( 'Actions', 'conditional-discount-rule-woocommerce'); ?></th>
				</tr>
				</thead>
                <tbody >
                

<?php
if(count($coupons_templates) > 0){
    foreach($coupons_templates as $method){
        echo '<tr>';
        echo '<td class="text-center">';
        echo '<a href="'.admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_coupon_template&action=edit&id='.$method->ID ).'">'.$method->post_title.'</a>';
        echo '</td>';
        echo '<td class="text-center">';
        echo '<a href="'.wp_nonce_url(admin_url( '/admin.php?page=pisol-cdrw&action=cdrw_delete_template&id='.$method->ID ), 'cdrw-delete-'.$method->ID).'" class="btn btn-warning btn-sm pi-cdrw-delete"><span class="dashicons dashicons-trash"></span> Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
}else{
    echo '<tr>';
    echo '<td colspan="5" class="text-center">';
    echo __('There are no coupons template','conditional-discount-rule-woocommerce' );
    echo '</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</div>