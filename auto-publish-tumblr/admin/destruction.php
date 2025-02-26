<?php
if( !defined('ABSPATH') ){ exit();}
function tbap_free_network_destroy($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				tbap_free_destroy();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	tbap_free_destroy();
}

function tbap_free_destroy()
{
	global $wpdb;
	
	if(get_option('xyz_credit_link')=="tbap")
	{
		update_option("xyz_credit_link", '0');
	}
	
		
	delete_option('xyz_tbap_tbconsumer_secret');
	delete_option('xyz_tbap_tbconsumer_id');
	delete_option('xyz_tbap_tb_id');
	delete_option('xyz_tbap_current_tbappln_token');
	delete_option('xyz_tbap_tbpost_permission');
	delete_option('xyz_tbap_tbpost_media_permission');//
	delete_option('xyz_tbap_tbaccestok_secret');
	delete_option('xyz_tbap_tbmessage');
	delete_option('xyz_tbap_future_to_publish');
	delete_option('xyz_tbap_apply_filters');
	delete_option('xyz_tbap_free_version');
	delete_option('xyz_tbap_include_pages');
	delete_option('xyz_tbap_include_posts');
	delete_option('xyz_tbap_include_categories');
	delete_option('xyz_tbap_include_customposttypes');
	delete_option('xyz_tbap_peer_verification');
	delete_option('xyz_tbap_post_logs');
	delete_option('xyz_tbap_premium_version_ads');
	delete_option('xyz_tbap_default_selection_edit');
	delete_option('xyz_tbap_default_selection_create');
	delete_option('tbap_installed_date');
	delete_option('xyz_tbap_dnt_shw_notice');
	delete_option('xyz_tbap_credit_dismiss');
}

register_uninstall_hook(XYZ_TBAP_PLUGIN_FILE,'tbap_free_network_destroy');


?>