<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
exit();

$option_name = 'mfp_mod_options';

if (!is_multisite()){
	delete_option($option_name);
	delete_option('mfp_version');
	delete_option('mfp_mod_image_url');
	delete_option('mfp_mod_logo_url');
}else{
	global $wpdb;
	$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
	$original_blog_id = get_current_blog_id();
	foreach ($blog_ids as $blog_id){
		switch_to_blog($blog_id);
		delete_site_option($option_name);
		delete_site_option('mfp_version');
		delete_site_option('mfp_mod_image_url');
		delete_site_option('mfp_mod_logo_url');
	}
	switch_to_blog($original_blog_id);
}