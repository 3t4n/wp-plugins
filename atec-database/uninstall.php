<?php
	if (!defined('ABSPATH')) { exit(); }
	wp_cache_delete('atec_wpdb_version');
	delete_option('atec_WPDB_settings');
?>