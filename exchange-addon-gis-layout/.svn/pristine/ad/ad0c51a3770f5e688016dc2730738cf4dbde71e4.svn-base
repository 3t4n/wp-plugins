<?php
/*
 * Plugin Name: iThemes Exchange - GIS Layout
 * Version: 1.0.0
 * Description: This add-on for iThemes Exchange creates a "Google Image Search (GIS)" inspired layout for products on the store page.
 * Author: Ronald van Weerd
 * Author URI: http://weerdpress.com
 
 * Installation:
 * 1. Download and unzip the latest release zip file.
 * 2. If you use the WordPress plugin uploader to install this plugin skip to step 4.
 * 3. Upload the entire plugin directory to your `/wp-content/plugins/` directory.
 * 4. Activate the plugin through the 'Plugins' menu in WordPress Administration.
 *
*/

/**
 * This registers our plugin as an addon
 *
 * @since 1.0.0
 *
 * @return void
*/
function it_exchange_register_gis_layout_addon() {
	$options = array(
		'name'              => __( 'GIS Layout', 'rvw-exchange-addon-gis-layout' ),
		'description'       => __( 'iThemes Exchange GIS Layout.', 'rvw-exchange-addon-gis-layout' ),
		'author'            => 'Ronald van Weerd',
		'author_url'        => 'http://vanweerd.com/',
		'icon'              => ITUtility::get_url_from_file( dirname( __FILE__ ) . '/lib/assets/gis-layout50px.png' ),
		'file'              => dirname( __FILE__ ) . '/init.php',
		'category'          => 'product-feature',
		'basename'          => plugin_basename( __FILE__ ),
		'settings-callback' => 'it_exchange_gis_layout_settings_callback',
	);
	it_exchange_register_addon( 'gis-layout', $options );
}
add_action( 'it_exchange_register_addons', 'it_exchange_register_gis_layout_addon' );