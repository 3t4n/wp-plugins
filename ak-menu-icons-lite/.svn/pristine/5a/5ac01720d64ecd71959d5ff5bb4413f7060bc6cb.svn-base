<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
if ( !class_exists( 'WPMICONSLITE_Activation' ) ) {
    class WPMICONSLITE_Activation extends WPMICONSLITE_Library{
        /**
         * Executes all the tasks on Plugin activation
         *
         * @since 1.0.0
         */
        function __construct() {
            add_action( 'init', array( $this, 'wpmenuicon_init' ) );
            register_activation_hook( WPMICONSLITE_PATH . 'ak-menu-icons-lite.php', array( $this, 'fn_wpmi_on_activation' ) );
        }

       /*
       * Define Text Domain
       */
       function wpmenuicon_init() {
        load_plugin_textdomain('ak-menu-icons-lite', false, basename(dirname(__FILE__)) . '/languages/');
       }

        /**
         * All the activation tasks
         * @since 1.0.0
         */
        function fn_wpmi_on_activation() {
            if (!get_option('wpmicon_animation_options')) {
               $wpmicon_animation_options = $this->wpmi_animation_options();
               update_option('wpmicon_animation_options', $wpmicon_animation_options);
           }

           if(!get_option('wpmenu_available_icons')){
               $preicons = $this->get_available_preicons();
               update_option('wpmenu_available_icons', $preicons);
           }
        }
    }
    new WPMICONSLITE_Activation();
}
