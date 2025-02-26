<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
gyrojob_seo_meta_tags_handle_site();

if( is_multisite() ){
	
	// wordpress 4.6
	if( function_exists( 'get_sites' ) && class_exists( 'WP_Site_Query' ) ) {
		$sites = get_sites();
		foreach( $sites as $site ){
			switch_to_blog( $site->blog_id );
			gyrojob_seo_meta_tags_handle_site();
		}
	}
	else{
		
		// wordpress < 4.6
		if( function_exists( 'get_sites' ) ) {
			$sites = get_sites();
			foreach ( $sites as $site ) {
				switch_to_blog( $site['blog_id'] );
				gyrojob_seo_meta_tags_handle_site();
			}
		}
	}
}















function gyrojob_seo_meta_tags_handle_site(){
    
    
    
    
    
	// drop option
	delete_option( 'gyrojob_seo_meta_title' );
	delete_option( 'gyrojob_seo_meta_description' );
	delete_option( 'gyrojob_seo_noindex' );
	delete_option( 'gyrojob_seo_nofollow' );
	delete_option( 'gyrojob_seo_canonical' );

	
	
	// drop meta & taxonomy
	delete_post_meta_by_key( '_gyrojob_seo_post_meta_title' );	
	delete_post_meta_by_key( '_gyrojob_seo_post_meta_description' );
	delete_post_meta_by_key( '_gyrojob_seo_post_meta_noindex' );
	delete_post_meta_by_key( '_gyrojob_seo_post_meta_nofollow' );
	delete_post_meta_by_key( '_gyrojob_seo_post_meta_canonical' );

	
}
 
 

?>