<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */

class General_Settings {


    function __construct() {

        $settings = get_option( ADMINTOSH_OPTION_NAME );

        // Hide wp version number
        if( !empty( $settings['hide_wp_version'] ) ) {
            self::hideWPVersion();
            // Remove version query strings from CSS and JS links
            add_filter( 'script_loader_src', [ __CLASS__, 'remove_script_version' ], 15, 1 );
            add_filter( 'style_loader_src', [ __CLASS__, 'remove_script_version' ], 15, 1 );
        }

        // Disallow file edit
        if( !empty( $settings['disable_file_editing'] ) ) {
            self::disableFileEditing();
        }

        // Disable Login Hints Error Messages
        if( !empty( $settings['disable_login_hint_msg'] ) ) {
            add_filter( 'login_errors', [ __CLASS__, 'hidingLoginHintsErrorMsg'] );
        }

        // Disable xml_rpc
        if( !empty( $settings['disable_xml_rpc'] ) ) {
            self::disableXMLRPC();
            add_filter( 'xmlrpc_methods', [ __CLASS__, 'remove_xmlrpc_methods' ] );
        }
        // Disable Right Click
        if( !empty( $settings['disable_right_click'] ) ) {
            add_action( 'wp_head', [ __CLASS__, 'jQuerySupport' ] );
            add_action( 'wp_footer', [ __CLASS__, 'disableRightClick' ], 99 );
        }
        
    }


    public static function hideWPVersion() {
        add_filter( 'the_generator', '__return_empty_string' );
        remove_action('wp_head', 'wp_generator');
    }

    public static function remove_script_version( $src ) {
        $parts = explode( '?ver', $src );
        return $parts[0];
    }

    public static function disableXMLRPC() {
        add_filter( 'xmlrpc_enabled', '__return_false' );

        /***
         *  This will add in htaccess
         * ***/

        // # disable xmlrpc
        // <FilesMatch "^xmlrpc\.php$">
        //   Require all denied
        // </FilesMatch>
    }

    public static function remove_xmlrpc_methods( $methods ) {
      return [];
    }

    public static function hidingLoginHintsErrorMsg() {
        return esc_html__( 'Something is wrong!', 'admintosh' );
    }

    public static function disableRightClick() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {

            //Disable cut copy paste

            jQuery('body').bind('cut copy paste', function (e) {

            e.preventDefault();

            });

            //Disable mouse right click

            jQuery(document).on("contextmenu",function(e){

            return false;

            });

            });
        </script>
        <?php
    }

    public static function jQuerySupport() {
        wp_enqueue_script('jquery');
    }

    public static function disableFileEditing() {
       
        if ( !defined('DISALLOW_FILE_EDIT') ) {
            define( 'DISALLOW_FILE_EDIT', true );
        }
    }



}