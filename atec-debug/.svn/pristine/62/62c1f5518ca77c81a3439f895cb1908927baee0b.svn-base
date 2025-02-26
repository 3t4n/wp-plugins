<?php
if (!defined('ABSPATH')) { exit(); }
wp_cache_delete('atec_wpd_version');
wp_cache_delete('atec_wpd_debug_size');

(function() {
	if (!class_exists('ATEC_fs')) @require('includes/atec-fs.php');
	$afs = new ATEC_fs();
	
	if (WP_DEBUG)
	{
		$atec_wpd_log_filename='atec-wpd-debug-log.php';
		$MU_wpd_log_path=WPMU_PLUGIN_DIR.'/@'.$atec_wpd_log_filename;
		$afs->unlink($MU_wpd_log_path);
	}
	$afs->unlink(ABSPATH.'/wp-config.atec-debug-bck.php');
})();
?>