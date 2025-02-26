<?php 

$mg_options = get_option( 'mg_options' ); 

// If the version numbers don't match, run the upgrade script
if ( $mg_options['version'] < MOBILE_GALLERY_VERSION ) { 
	require ( MOBILE_GALLERY_PATH . 'inc/upgrader.php' );
}

//action link http://www.wpmods.com/adding-plugin-action-links
function mgp_action_links( $links, $file ) {
	static $this_plugin;

	if ( !$this_plugin ) {
		$this_plugin = MOBILE_GALLERY_LOCATION;
	}

	// check to make sure we are on the correct plugin
	if ( $file == $this_plugin ) {
		// the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
		$settings_link = '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page=mobile_gallery">Settings</a>';
		// add the link to the list
		array_unshift( $links, $settings_link );
	}
	return $links;
}
add_filter( 'plugin_action_links', 'mgp_action_links', 10, 2 );


/* Load scripts for front */

function mgp_photoswipe() {
	global $mg_options;
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'klass', MOBILE_GALLERY_URL . '/js/klass.min.js', false, '1.0', false ); 
	wp_enqueue_script( 'photoswipe', MOBILE_GALLERY_URL . '/js/code.photoswipe.jquery-3.0.4.min.js', false, '3.0.4', false ); 
	wp_enqueue_script( 'mgp-public', MOBILE_GALLERY_URL . '/js/mobile-gallery-public.js', false, $mg_options['version'], false ); 
	wp_enqueue_style( 'photoswipe', MOBILE_GALLERY_URL . '/css/photoswipe.css', false, $mg_options['version'], 'screen' );
}

if ( $mg_options['add_to_front'] == "true" && ! is_admin() ) {
	add_action('init', 'mgp_photoswipe');
}

?>