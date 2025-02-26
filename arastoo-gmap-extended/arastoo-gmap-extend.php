<?php
/**
 * @package Arastoo GMap Extended
 * @version 1.0.0
 */
/*
Plugin Name: Arastoo GMap Extended
Plugin URI: https://www.michaelcastrillo.com/arastoo-plugins/arastoo-gmap-extended/
Description: Smart Plugin which embed Google Map with multiple markers. Settings > Arastoo GMap
Author: Arteo
Version: 1.0.0
Author URI: https://www.michaelcastrillo.com/
*/

// Insert script in the WordPress Footer
function arastoo_gmap_marker_scripts() { 
	include plugin_dir_path( __FILE__ ) . 'parts/gmap-marker.php';
	include plugin_dir_path( __FILE__ ) . 'parts/gmap-marker-style.php';
}
add_action ('wp_footer', 'arastoo_gmap_marker_scripts', '', '', true);

// Insert script in the WordPress Head
function arastoo_gmap_marker_head() { ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_option('arastoo_gmap_api'); ?>&callback=initMap&libraries=&v=weekly" defer></script>
	
<?php }
	
add_action('wp_head', 'arastoo_gmap_marker_head' );

// Register shortcode
add_shortcode( 'arastoo_gmap', 'arastoo_gmap_extended_markers' );
function arastoo_gmap_extended_markers() {
    echo '<div id="map"></div>';
}

// Include parts & assets files
include plugin_dir_path( __FILE__ ) . 'parts/gmap-register.php';

// Initiate functions
add_action( 'init', 'arastoo_gmap_create_main' );
add_action('admin_init', 'arastoo_gmap_group_settings');
add_action( 'admin_menu', 'arastoo_gmap_options' );


?>