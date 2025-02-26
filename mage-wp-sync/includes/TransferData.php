<?php
/**
 * Mage WP Sync plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

function transferdata_from_magento() {
	global $wpdb;
	global $process_id;
	$get_last_process_id = $wpdb->get_results("select process_id from wp_smack_sync_process_id order by id desc limit 1");
	$last_process_id = $get_last_process_id[0]->process_id;
	$process_id['last_process_id'] = $last_process_id;
	$new_process_id = $last_process_id + 1;
	$process_id['new_process_id'] = $new_process_id;
	$action = $_POST['option'];
	$filename = WP_CONST_MAGE_WOOCOM_DIRECTORY . "/lib/$action.php";
	if (file_exists($filename)) {
		require_once($filename);
	} else {
		echo "This feature doesn't exist";
	}
	die();
}
add_action('wp_ajax_transferdata_from_magento', 'transferdata_from_magento');
