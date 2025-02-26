<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('WPMICONSLITE_Enqueue_Scripts') ) {
    class WPMICONSLITE_Enqueue_Scripts extends WPMICONSLITE_Library{

        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
          add_action('admin_enqueue_scripts', array( $this, 'wpmicon_register_admin_assets' ));
          add_action('wp_enqueue_scripts', array( $this, 'wpmicon_register_frontend_assets' ));
        }

        function wpmicon_register_admin_assets(  $hook  ) {
            if($hook == "nav-menus.php"){
              $this->fn_common_enqueue_styles();
              $this->fn_loadCSS();
              $this->fn_loadJSScript();
              $wpmi_variable = array(
                    'icon_box_text' => __('Add Menu Icon','ak-menu-icons-lite'),
                    'enable_setting_msg' => __('Settings has been enabled successfully.','ak-menu-icons-lite'),
                    'disable_setting_msg' => __('Settings has been disabled.','ak-menu-icons-lite'),
                    'enable_icon_message' => __('Please enable menu icon first from WP Menu Icons Lite Settings Left Metabox for further configuration.','ak-menu-icons-lite'),
                    'success_msg' => __('Settings Saved Successfully.','ak-menu-icons-lite'),
                    'ajax_url' => admin_url() . 'admin-ajax.php',
                    'ajax_nonce' => wp_create_nonce('wpmenuicon-ajax-nonce'));

              wp_localize_script( 'wpmi-admin-scripts', 'wpmi_variable', $wpmi_variable ); //localization
           }
            $plugin_pages = array('ak-menu-icons-lite', 'akml-how-to-use');
            if (isset($_GET['page']) && in_array($_GET['page'], $plugin_pages)) {
              wp_enqueue_style( 'wpmi-backend', WPMICONSLITE_CSS_DIR . 'backend.css', WPMICONSLITE_VERSION );
            }
        }

        public function wpmicon_register_frontend_assets(){
            $this->fn_common_enqueue_styles();
             wp_enqueue_style( 'wpmi-frontend', WPMICONSLITE_CSS_DIR . 'wpmi-frontend.css', WPMICONSLITE_VERSION );
        }

        function fn_common_enqueue_styles(){
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'wpmi-hover-animation', WPMICONSLITE_CSS_DIR . 'hover.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-genericons', WPMICONSLITE_CSS_DIR . 'genericons.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-icomoon', WPMICONSLITE_CSS_DIR . 'icomoon.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-fontawesome', WPMICONSLITE_CSS_DIR . 'fontawesome.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-fa-solid', WPMICONSLITE_CSS_DIR . 'fa-solid.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-fa-regular', WPMICONSLITE_CSS_DIR . 'fa-regular.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker-fa-brands', WPMICONSLITE_CSS_DIR . 'fa-brands.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-font-awesome-style', WPMICONSLITE_CSS_DIR . 'font-awesome.min.css', array(), WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-themify', WPMICONSLITE_CSS_DIR . 'themify-icons.css', WPMICONSLITE_VERSION );
            wp_enqueue_style( 'wpmi-icon-picker', WPMICONSLITE_CSS_DIR . 'icon-picker.css', WPMICONSLITE_VERSION );
        }

        function fn_loadCSS(){
            wp_enqueue_style('wp-color-picker'); //for including color picker css
            wp_enqueue_style( 'wpmi-admin-style', WPMICONSLITE_CSS_DIR . 'wpmi-admin-style.css', false, WPMICONSLITE_VERSION );
        }

        function fn_loadJSScript(){
          wp_enqueue_script( 'wp_megamenu-color-alpha-scripts', WPMICONSLITE_JS_DIR . '/wp-color-picker-alpha.js',array('wp-color-picker') ,false, WPMICONSLITE_VERSION );
          wp_enqueue_script( 'wpmi-icon-picker-script', WPMICONSLITE_JS_DIR . 'icon-picker.js', array( 'jquery'), WPMICONSLITE_VERSION );
          wp_enqueue_media();
          wp_enqueue_script('wpmi-admin-scripts', WPMICONSLITE_JS_DIR . 'wpmi-admin.js',array('jquery','wp-color-picker','wpmi-icon-picker-script') ,false, WPMICONSLITE_VERSION );
        }
    }
    new WPMICONSLITE_Enqueue_Scripts();
}
