<?php 

add_action('admin_enqueue_scripts', 'accodps_advance_payment_order_total');
function accodps_advance_payment_order_total(){
    
    wp_enqueue_script('admin-product-list', plugin_dir_url('../../../assets/js/wp-admin-scripts.js'), array('jquery'), '1.0', true);

}