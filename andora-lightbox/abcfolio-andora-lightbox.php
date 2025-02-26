<?php
/*
 * Plugin Name: Andora Lightbox
 * Plugin URI: http://abcfolio.com/help/wordpress-plugin-andora-lightbox/
 * Description: Grid Gallery with Lightbox. Fast, light and responsive.
 * Author: abcFolio
 * Author URI: http://www.abcfolio.com
 * Version: 0.5.9
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Indicates that a clean exit occured. Handled by set_exception_handler
 */
if (!class_exists('E_Clean_Exit')) {
	class E_Clean_Exit extends RuntimeException{}
}

if ( ! class_exists( 'ABCFAL_Andora_Lightbox' ) ) {

/**
 * Main ABCFAL_Andora_Lightbox Class
 */
final class ABCFAL_Andora_Lightbox {

    private static $instance;
    protected $plugin_slug = 'abcfal';

    /**
     * Main PLUGIN Instance
     *
     * Insures that only one instance of plugin exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     */
    public static function instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof ABCFAL_Andora_Lightbox ) ) {
                    self::$instance = new ABCFAL_Andora_Lightbox;
                    self::$instance->setup_constants();
                    self::$instance->includes();
                    self::$instance->setup_actions();
                    self::$instance->load_textdomain();
            }
            return self::$instance;
    }

    private function __construct (){
    }

     //Throw error on object clone. We don't want the object to be cloned.
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'abcfal-td' ), '1.5' );
    }

    //Disable unserializing of the class
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'abcfal-td' ), '1.5' );
    }

    private function setup_constants() {

        // Plugin version $pversion
        if ( ! defined( 'ABCFAL_VERSION' ) ) { define( 'ABCFAL_VERSION', '0.5.9' ); }
        if ( ! defined( 'ABCFAL_ABSPATH' ) ) {  define('ABCFAL_ABSPATH', ABSPATH); }

        // Plugin Folder QPath
        if( ! defined( 'ABCFAL_PLUGIN_DIR' ) ){ define( 'ABCFAL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
        // Plugin Folder URL
        if ( ! defined( 'ABCFAL_PLUGIN_URL' ) ) { define( 'ABCFAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }

        // Plugin folder name
        if( ! defined( 'ABCFAL_PLUGIN_FOLDER' ) ){ define('ABCFAL_PLUGIN_FOLDER', basename( dirname(__FILE__) ) ); }
        // Plugin Root File QPath
        if ( ! defined( 'ABCFAL_PLUGIN_FILE' ) ){ define( 'ABCFAL_PLUGIN_FILE', __FILE__ ); }

        if( ! defined( 'ABCFAL_POST_GALLERYL' ) ){ define( 'ABCFAL_POST_GALLERYL', 'abcfal_post_galleryl'); }

        if( ! defined( 'ABCFAL_MENU_SLUG' ) ){ define( 'ABCFAL_MENU_SLUG', 'abcfal_menu'); }
     }

    //Include required files
    private function includes() {

        require_once ABCFAL_PLUGIN_DIR . 'includes/post-types.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/scripts.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/content-bldrs-light.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/db.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/lib-css-builders.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/lib-html-builders.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/shortcode.php';
        require_once ABCFAL_PLUGIN_DIR . 'includes/txt-bldrs.php';

        if( is_admin() ) {
            require_once ABCFAL_PLUGIN_DIR . 'includes/options.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/class-menu.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/input-bldrs.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/mbox-shortcode.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/mbox-save.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/mbox-coll.php';
            require_once ABCFAL_PLUGIN_DIR . 'includes/mbox-options.php';

        }
    }

    public function get_plugin_slug() {
            return $this->plugin_slug;
    }

    private function setup_actions() {
        add_action( 'admin_print_styles-post-new.php', array( $this, 'remove_permalink' ), 1 );
        add_action( 'admin_print_styles-post.php', array( $this, 'remove_permalink' ), 1 );
        add_filter( 'post_row_actions', array( $this, 'remove_post_edit_links' ), 10, 1 );
    }

    //Remove permalink and preview buttons from custom post screen.
    public function remove_permalink() {
        global $post_type;
         if( abcfal_optns_is_custom_post( $post_type)) {
            echo '<style type="text/css">#edit-slug-box,#view-post-btn,#post-preview,.updated p a{display: none;}</style>';
        }
    }

    //Remove view and quick edit from custom posts list.
    function remove_post_edit_links( $actions ){

        $postType = get_post_type();
        if(abcfal_optns_is_custom_post( $postType)) {
            unset( $actions['view'] );
            unset( $actions['inline hide-if-no-js'] );
        }
        return $actions;
    }

     public function load_textdomain() {
        $pslug = $this->plugin_slug;

        // Set filter for plugin's languages directory
        $langDir = ABCFAL_PLUGIN_FOLDER . '/languages/';
        $langDir = apply_filters( 'abcfal_languages_directory', $langDir );

        // Traditional WordPress plugin locale filter
        $locale        = apply_filters( 'plugin_locale',  get_locale(), $pslug );
        $mofile        = sprintf( '%1$s-%2$s.mo', $pslug, $locale );

        // Setup paths to current locale file
        $mofileLocal  = $langDir . $mofile;
        $mofileGlobal = WP_LANG_DIR . '/' . $pslug . '/' . $mofile;

        if ( file_exists( $mofileGlobal ) ) {
                load_textdomain( $pslug, $mofileGlobal );
        } elseif ( file_exists( $mofileLocal ) ) {
                load_textdomain( $pslug, $mofileLocal );
        } else {
                // Load the default language files. ( 'abcfal-td', false, ABCFAL_PLUGIN_DIR . 'languages/' )
                load_plugin_textdomain( $pslug, false, $langDir );
        }
    }

}
} // End class_exists check
/**
 * The main function responsible for returning the one true ABCFAL_Main instance to functions everywhere.
 * Use this function like you would a global variable, except without needing to declare the global.
 */
function ABCFAL_Main() {
    return ABCFAL_Andora_Lightbox::instance();
}
// Get Image_Collections Running
ABCFAL_Main();
