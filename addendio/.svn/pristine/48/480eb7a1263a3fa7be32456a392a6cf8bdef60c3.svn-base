<?php
/*
* Plugin Name: Addendio LITE - Search Plugins and Themes
* Plugin URI: https://addendio.com
* Description: Find plugins and themes, then try them on a separate WordPress sandbox for FREE.
* Version: 1.2.2
* Author: Addendio
* Author URI: https://addendio.com
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//=====================================================================================
// Config

$freemius_id = '181'; // PRODUCTION
$freemius_pk = 'pk_cb7849a653bc4ddf11403eb7762f9'; // PRODUCTION

$addendio_version = '1.2.2';
$addendio_env = '';


//=====================================================================================

		// Plugin Version
		if ( ! defined( 'ADDENDIO_LITE_VERSION' ) ) {
            define ( 'ADDENDIO_LITE_VERSION' , $addendio_version );
		}

        // ADDENDIO_DEV environment
		if ( ! defined( 'ADDENDIO_LITE_ENV' ) ) {
            define ( 'ADDENDIO_LITE_ENV' , $addendio_env );
		}
		
		// FREEMIUS PK
		if ( ! defined( 'ADDENDIO_FREEMIUS_PK' ) ) {
            define ( 'ADDENDIO_FREEMIUS_PK' , $freemius_pk );
		}
		
		// FREEMIUS ID
		if ( ! defined( 'ADDENDIO_FREEMIUS_ID' ) ) {
            define ( 'ADDENDIO_FREEMIUS_ID' , $freemius_id );
		}
		
		
//=====================================================================================


//=====================================================================================
// FREEMIUS
//=====================================================================================

// Create a helper function for easy SDK access.
function add_fs() {
    global $add_fs;

    if ( ! isset( $add_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $add_fs = fs_dynamic_init( array(
            'id'                => ADDENDIO_FREEMIUS_ID,
            'slug'              => 'addendio',
            'public_key'        => ADDENDIO_FREEMIUS_PK,
            'is_premium'        => false,
            'has_addons'        => false,
            'has_paid_plans'    => false,
            'menu'              => array(
                'slug'       => 'awppt_addendio_settings',
                'support'    => false,
                'parent'     => array(
                    'slug' => 'options-general.php',
                ),
            ),
        ) );
    }

    return $add_fs;
}

// Init Freemius.
add_fs();

//=====================================================================================
// / FREEMIUS
//=====================================================================================

		
		// Make sure that wp_get_current_user function is available
		if(!function_exists('wp_get_current_user()')) {
    	include(ABSPATH . 'wp-includes/pluggable.php'); 
		}

		// Plugin Folder Path
		if ( ! defined( 'AWPPT_PLUGIN_DIR' ) ) {
			define( 'AWPPT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		}
		
		if ( is_admin() && current_user_can( 'administrator' ) ) {			
			require_once AWPPT_PLUGIN_DIR . 'includes/awppt-functions.php';
		} 

		// Plugin Folder URL
		if ( ! defined( 'AWPPT_PLUGIN_URL' ) ) {
			define( 'AWPPT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		}

		// Images Folder URL
		if ( ! defined( 'AWPPT_PLUGIN_IMAGES_URL' ) ) {
		define( 'AWPPT_PLUGIN_IMAGES_URL', plugin_dir_url( __FILE__ ).'assets/images/' );
		}

		// Admin Folder URL
		if ( ! defined( 'AWPPT_ADMIN_FOLDER' ) ) {
		define( 'AWPPT_ADMIN_FOLDER', get_admin_url());
		}

