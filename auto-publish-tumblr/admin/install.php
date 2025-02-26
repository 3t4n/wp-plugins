<?php
if( !defined('ABSPATH') ){ exit();}
function tbap_free_network_install($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				tbap_install_free();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	tbap_install_free();
}

function tbap_install_free()
{
	/* $pluginName = 'xyz-wp-smap/xyz-wp-smap.php';
	if (is_plugin_active($pluginName)) {
		wp_die( "The plugin WP Tumblr Auto Publish cannot be activated unless the premium version of this plugin is deactivated. Back to <a href='".admin_url()."plugins.php'>Plugin Installation</a>." );
	} */
	
	global $current_user;
	wp_get_current_user();
	if(get_option('xyz_credit_link')=="")
	{
		add_option("xyz_credit_link", '0');
	}
	
	$tbap_installed_date = get_option('tbap_installed_date');
	if ($tbap_installed_date=="") {
		$tbap_installed_date = time();
		update_option('tbap_installed_date', $tbap_installed_date);
	}

	add_option('xyz_tbap_tbconsumer_secret', '');
	add_option('xyz_tbap_tbconsumer_id','');
	add_option('xyz_tbap_tb_id', '');
	add_option('xyz_tbap_current_tbappln_token', '');
	add_option('xyz_tbap_tbpost_permission', '1');
	add_option('xyz_tbap_tbpost_media_permission', '1');///
	add_option('xyz_tbap_tbaccestok_secret', '');
	add_option('xyz_tbap_tbmessage', '{POST_TITLE} - {PERMALINK}');
	add_option('xyz_tbap_future_to_publish', '1');
	add_option('xyz_tbap_apply_filters', '');
	$currentversion=xyz_tbap_plugin_get_version();
	update_option('xyz_tbap_free_version', $currentversion);
	
	add_option('xyz_tbap_include_pages', '0');
	add_option('xyz_tbap_include_posts', '1');
	add_option('xyz_tbap_include_categories', 'All');
	add_option('xyz_tbap_include_customposttypes', '');
	add_option('xyz_tbap_peer_verification', '1');
	add_option('xyz_tbap_post_logs', '');
	add_option('xyz_tbap_premium_version_ads', '1');
	add_option('xyz_tbap_default_selection_edit', '0');
	add_option('xyz_tbap_default_selection_create', '1');
	add_option('xyz_tbap_dnt_shw_notice','0');
	add_option("xyz_tbap_credit_dismiss",0);
	
}
register_activation_hook(XYZ_TBAP_PLUGIN_FILE,'tbap_free_network_install');
?>
