<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/**
 * Plugin Name:       Ammu Demo Import
 * Plugin URI: 
 * Description:       One click demo installation plugin install demo for theme created by Ammuthemes and Ponvendhan
 * Version:           1.0.6
 * Author:            Ammuthemes
 * Author URI:        https://www.ammuthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ammu-demo-import
 * Domain Path:       /languages
 */


// Define AMMU_DEMO_IMPORT_FILE
if( ! defined( 'AMMU_DEMO_IMPORT_FILE' ) ) :
    define( 'AMMU_DEMO_IMPORT_FILE', __FILE__ );
endif;

// Define AMMU_DEMO_IMPORT_URL
if( ! defined( 'AMMU_DEMO_IMPORT_URL' ) ) :
    define( 'AMMU_DEMO_IMPORT_URL', plugins_url( '/', __FILE__ ) );
endif;

// Define AMMU_DEMO_IMPORT_DIR_URL
if( ! defined( 'AMMU_DEMO_IMPORT_DIR_URL' ) ) :
    define( 'AMMU_DEMO_IMPORT_DIR_URL', plugin_dir_url( __FILE__ ) );
endif;

// Define AMMU_DEMO_IMPORT_PATH
if( ! defined( 'AMMU_DEMO_IMPORT_PATH' ) ) :
    define( 'AMMU_DEMO_IMPORT_PATH', plugin_dir_path( __FILE__ ) );
endif;



class Ammu_Demo_Import {
    /**
     * Get the theme name using wp_get_theme.
     *
     * @var string $theme_name The theme name.
     */
    private $theme_name;
    /**
     * Get the theme slug ( theme folder name ).
     *
     * @var string $theme_slug The theme slug.
     */
    private $theme_slug;
    /**
     * The current theme object.
     *
     * @var WP_Theme $theme The current theme.
     */
    private $theme;
    /**
     * Holds the theme version.
     *
     * @var string $theme_version The theme version.
     */
    private $theme_version;
    /**
     * Holds the ocdi slug.
     *
     * @var string $ocdi_slug The ocdi slug.
     */
    private $ocdi_slug;
    /**
     * Define the html notification content displayed upon activation.
     *
     * @var string $notification The html notification content.
     */
    private $notification;

    // Activate
    function activate() {
        if ( ! is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) and current_user_can( 'activate_plugins' ) ) {
            // Stop activation redirect and show error
            wp_die('Sorry, but this plugin requires the <a href="' . esc_url( 'https://wordpress.org/plugins/one-click-demo-import/' ) . '" target="_blank"> One Click Demo Import Plugin </a> to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
        }
    }
    
    // Deactivate
    function deactivate() {
    
    }

    function __construct() {

        $theme = wp_get_theme();
        if ( get_template_directory() !== get_stylesheet_directory() ) :
            $this->theme_name = $theme->get( 'Name' );
            $this->theme      = $theme->get( 'Name' );
        else :
            $this->theme_name = $theme->get( 'Name' );
            $this->theme      = $theme->parent();
        endif;

        $this->theme_version = $theme->get( 'Version' );
        $this->theme_slug    = $theme->get( 'TextDomain');

        $this->ocdi_slug    = 'one-click-demo-import';
        
    }
  
    // ammu site library functions
    function ammu_demo_import_functions() {

        if ('real-estate-salient' == $this->theme_slug ) :
            require_once AMMU_DEMO_IMPORT_PATH . '/inc/real-estate-salient-functions.php';
        endif;
        if ('real-estate-calibre' == $this->theme_slug ) :
            require_once AMMU_DEMO_IMPORT_PATH . '/inc/real-estate-calibre-functions.php';
        endif;
        if ('store-expert' == $this->theme_slug ) :
            require_once AMMU_DEMO_IMPORT_PATH . '/inc/store-expert-functions.php';
        endif;
        if ('real-estate-vital' == $this->theme_slug ) :
            require_once AMMU_DEMO_IMPORT_PATH . '/inc/real-estate-vital-functions.php';
        endif;
        if ('real-estate-papi' == $this->theme_slug ) :
            require_once AMMU_DEMO_IMPORT_PATH . '/inc/real-estate-papi-functions.php';
        endif;
    }
    
    //Load plugin text domain
    function ammu_demo_import_load_plugin_textdomain() {
        load_plugin_textdomain('ammu-demo-import', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

}

// Class Register

if ( class_exists( 'Ammu_Demo_Import' ) ) :
    # code...
    $ammu_demo_import = new Ammu_Demo_Import();
    $ammu_demo_import->ammu_demo_import_functions();
    $ammu_demo_import->ammu_demo_import_load_plugin_textdomain();

endif;

// Activation
register_activation_hook( __FILE__, array( $ammu_demo_import, 'activate' ) );
// Deactivation
register_deactivation_hook( __FILE__, array( $ammu_demo_import, 'deactivate' ) );