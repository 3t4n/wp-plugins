<?php

/**
 * The plugin bootstrap file
 *
 * @link              ar-ty.com
 * @since             1.0.0
 * @package           3D-Model-Viewer-by-Arty
 *
 * @wordpress-plugin
 * Plugin Name:       3D Model Viewer by Arty
 * Plugin URI:        https://ar-ty.com/3d-viewer
 * Description:       Add 3D models to your products easily.
 * Version:           2.0.0
 * Author:            Arty
 * Author URI:        https://ar-ty.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
	
use Arty_3DModelViewer\Arty_3DModelViewer_Init;
use Arty_3DModelViewer\Base\Arty_3DModelViewer_Activator;
use Arty_3DModelViewer\Base\Arty_3DModelViewer_Deactivator;

if ( ! defined('ABSPATH' ) ) exit;

define("Arty_3DModelViewer_API",
    array(
        'baseUrl' => 'https://platform.ar-ty.com'
    )
);

define("Arty_3DModelViewer_WOO_DEFAULT_POSITION",
    array(
        'position' => 'woocommerce_before_single_product_summary'
    )
);

define("Arty_3DModelViewer_WOO_DEFAULT_VALUES",
    array(
        'height' => 600
    )
);

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function arty_3dmodelviewer_activate_plugin() {
    Arty_3DModelViewer_Activator::arty_3dmodelviewer_activate();
}
register_activation_hook( __FILE__, 'arty_3dmodelviewer_activate_plugin' );

/**
 * The code that runs after plugin activation
 * Redirects user to integration page
 */
function arty_3dmodelviewer_activation_redirect() {
	Arty_3DModelViewer_Activator::arty_3dmodelviewer_activation_redirect();
}
add_action( 'activated_plugin', 'arty_3dmodelviewer_activation_redirect' );

/**
 * The code that runs during plugin deactivation
 */
function arty_3dmodelviewer_deactivate_plugin() {
	Arty_3DModelViewer_Deactivator::arty_3dmodelviewer_deactivate();
}
register_deactivation_hook( __FILE__, 'arty_3dmodelviewer_activate_plugin' );

/**
 * Add options to database
 */
function arty_3dmodelviewer_add_woocommerce_api_values(){
    add_option( 'arty_3dmodelviewer_woocommerce_api', Arty_3DModelViewer_API, '', 'yes' );
}
arty_3dmodelviewer_add_woocommerce_api_values();

function arty_3dmodelviewer_add_woocommerce_position(){
    add_option( 'arty_3dmodelviewer_woocommerce_default_position', Arty_3DModelViewer_WOO_DEFAULT_POSITION, '', 'yes' );
}
arty_3dmodelviewer_add_woocommerce_position();

function arty_3dmodelviewer_add_woocommerce_default_values(){
    add_option( 'arty_3dmodelviewer_woocommerce_default_values', Arty_3DModelViewer_WOO_DEFAULT_VALUES, '', 'yes' );
}
arty_3dmodelviewer_add_woocommerce_default_values();

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Arty_3DModelViewer\\Arty_3DModelViewer_Init' ) ) {
    Arty_3DModelViewer_Init::arty_3dmodelviewer_register_services();
};
