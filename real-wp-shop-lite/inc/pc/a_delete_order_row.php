<?php

add_action('wp_ajax_DELETE_ORDER_ROW', 'vkrwps_delete_order_row');
function vkrwps_delete_order_row() {

	$oid = (int) $_POST['oid'];
	
	global $wpdb;

    $wpdb->delete( 'wp_vkrwps_order_info', array( 'id' => $oid ) );

	die();
}

?>