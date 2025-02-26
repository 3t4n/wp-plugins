<?php

/*
Plugin Name: Admin IDE Dark Mode
Description: It changes the colors of your WordPress Admin IDE. Work on : Theme files edit, Plugin files edit, Custom CSS (customize panel), HFCM and more.
Author: Thomas Chary
Author URI: https://thomas-chary.dev
Text Domain: aidm
Version: 2.04
License: GNU GPL
*/

// if access directly -> exit
if ( ! defined( 'WPINC' ) ) {
    die;
}

// don't load plugin if on frontend
if ( ! is_admin() ) {
    return;
}

/**
 * const
 */

define( 'AIDM_PLUGIN_ID', 'admin-ide-dark-mode' );
define ( 'AIDM_PLUGIN_FILE_PATH', plugin_basename(__FILE__) );
define( 'AIDM_FORM_ID', 'aidm-admin-form' );
define( 'AIDM_POST_ID', 'aidm_save_changes' );
define( 'AIDM_AJAX_ID', 'aidm_load_help_panel' );
define( 'AIDM_PLUGIN_URL', WP_PLUGIN_URL.'/admin-ide-dark-mode' );
define( 'AIDM_PLUGIN_DIR', WP_PLUGIN_DIR.'/admin-ide-dark-mode' );
define( 'AIDM_CM_DIR', AIDM_PLUGIN_DIR.'/code-mirror-css-themes/' );
define( 'AIDM_CM_URL', AIDM_PLUGIN_URL.'/code-mirror-css-themes/' );
define( 'AIDM_VIEWS_DIR', AIDM_PLUGIN_DIR.'/views/' );
define( 'AIDM_INCLUDE_DIR', AIDM_PLUGIN_DIR.'/includes/' );
define( 'AIDM_CLASSES_DIR', AIDM_INCLUDE_DIR.'/classes/' );
define( 'AIDM_JS_URL', AIDM_PLUGIN_URL.'/assets/js/' );
define( 'AIDM_CSS_URL', AIDM_PLUGIN_URL.'/assets/css/' );
define( 'AIDM_IMG_URL', AIDM_PLUGIN_URL.'/assets/img/' );
define( 'AIDM_LANG_DIR', AIDM_PLUGIN_DIR.'/languages/' );

/**
 * supp. functions
 */
require_once AIDM_INCLUDE_DIR.'aidm-functions.php';

// add aidm in admin menu
add_action( 
    'admin_menu', 
    'aidm_add_menu' 
);

// load translations
add_action( 
    'plugins_loaded', 
    'aidm_load_textdomain' 
);

if ( 
    aidm_is_home_page()
) {
    /**
     * load form to set IDE colors preferences
     */
    require_once AIDM_CLASSES_DIR.'class-aidm-form.php';

    new Aidm_Form();

} else {
    if ( aidm_is_plugins_page() ) {
        /**
         * load script that display help panel
         */
        require_once AIDM_CLASSES_DIR.'class-aidm-help-panel.php';

        new Aidm_Help_Panel();

    } else {
        /** 
         * load script that changes IDE colors all over admin section
         */
        require_once AIDM_CLASSES_DIR.'class-aidm.php';

        new Aidm();
    }
}
