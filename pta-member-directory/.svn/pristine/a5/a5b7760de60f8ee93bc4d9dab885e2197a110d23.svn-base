<?php

function pta_directory_save_order () {
	if (!current_user_can('manage_options') && !current_user_can('manage_pta'))  {
		exit;
	}
	if ( ! wp_verify_nonce( $_POST['nonce'], 'pta-member-update-order' ) ) {
		die ( 'Invalid nonce!');
	}
	$pta_categories = get_option( 'pta_member_categories' );

	$list = $pta_categories;
	parse_str($_POST['list_items'],$new_order);
	$new_list = array();

	// update order
	foreach ($new_order['list_items'] as $v) {
		if(isset($list[$v])) {
			$new_list[$v] = $list[$v];
		}
	}

	// save the new order
	update_option( 'pta_member_categories', $new_list );

	die();
}

add_action('wp_ajax_pta_directory_update_order', 'pta_directory_save_order');

/*EOF*/