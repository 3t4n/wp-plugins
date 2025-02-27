<?php

if ( ! class_exists( 'WCSKU_Admin' ) ) {

    class WCSKU_Admin {

        private static $_instance = null;
 
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct() {
            require_once __DIR__ . '/appsero.php';
            add_action('admin_enqueue_scripts', array( $this,'wcsku_admin_scripts'));
            // add_action( 'admin_notices', array( $this, 'wcsku_admin_notice' ) );
            // add_filter( 'plugin_action_links_', array( $this, 'wcsku_action_links' ) );
            // add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wcsku_action_links' );
            add_action( 'admin_menu', array( $this, 'wcsku_admin_page' ) );

            // plugin ajax

            add_action( 'wp_ajax_update_skutext', array( $this, 'wcsku_update_text' ) );
        }

        
        // Admin Enqueue Scripts

        public function wcsku_admin_scripts() {
            $current_screen = get_current_screen();
            $screen_1 = 'toplevel_page_sku-label-changer';       


            if ($screen_1 == $current_screen->base) {
                $default_options = array(
                    'isEnabled' => 'Enable'
                );
                $options = get_option('wcsku_options');
                $text = get_option('wcsku_text');

                wp_enqueue_style( 'app', plugin_dir_url( __FILE__ ) . 'inc/app.css' );
                wp_enqueue_style( 'admin', plugin_dir_url( __FILE__ ) . 'inc/admin.css' );
                wp_enqueue_script( 'admin', plugin_dir_url( __FILE__ ) . '/inc/admin.js',['jquery'], true, '2.0' );
                wp_localize_script( 'admin', 'api_settings', array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'nonce' => wp_create_nonce('sku_ajax'),
                    'skutext' => !empty($text) ? $text : 'SKU',
                    'skuoptions' => !empty($options) ? $options : wp_json_encode($default_options),
                ) );
            }
        
        }

        public function wcsku_update_text() {
            check_ajax_referer( 'sku_ajax' );
            if ( ! current_user_can( 'manage_options' ) ) {
                wp_die();
            }

            $skutext = sanitize_text_field($_POST['skutext']);
            $skuoptions = sanitize_text_field($_POST['skuoptions']);

            update_option('wcsku_text', $skutext);
            update_option('wcsku_options', $skuoptions); 
            
            wp_send_json(
                array(
                    'success' => true, 
                    'message' => 'SKU Text & Options Updated Successfully'
            ));

            // if(isset($_POST['skutext'])) {
            //     $skutext = sanitize_text_field($_POST['skutext']);
                
                
            // } else {
            //     wp_send_json(
            //         array(
            //             'success' => false, 
            //             'message' => 'Error: SKUText not provided'
            //         ));
            // }
        }

        // Plugin Admin Notice

        public function wcsku_admin_notice() {

            $wcsku_notice = "false";
            if (isset($_COOKIE["wcsku-hide-notice"])) {
                $wcsku_notice = $_COOKIE["wcsku-hide-notice"];
            }

            if ($wcsku_notice == "false") {
                echo '<div class="notice notice-success is-dismissible" id="wcsku-notice" style="background-color:#0280FA; color:#ffffff;">
                <p>Hey! Thanks for using SKU Label Changer. Recently we relesed SKU Label Changer Pro.Where you will be able to add MPN, UPC or any other custom Product Code.</p>
                <a href="https://codember.com/sku-label-changer-pro-for-woocommerce/" class="button-primary button-large" style="background-color:#ffffff;color:#0280FA;margin:10px;padding:8px;"><strong>Get SKU Label Changer Pro</strong></a>
                <button id="wcsku-none" type="submit" class="button-primary button-large" style="background-color:#ffffff;color:#0280FA;margin:10px;padding:8px;"><strong>No Thanks</strong></button>
            </div>';
            }
        }

        // Plugin Action Links to Pro Version

        public function wcsku_action_links ( $links ) {
            $wcsku_links = array(
                '<a href="' . admin_url( 'options-general.php' ) . '">Plugin Settings</a>',
                '<a style="color:#0280FA;" href="https://codember.com/sku-label-changer-pro-for-woocommerce/"><strong>Get Pro Version</strong></a>',
            );
            return array_merge( $links, $wcsku_links );
        }

        public function wcsku_admin_page(){
            add_menu_page( 
                __( 'SKU Label Changer For WooCommerce', 'wcsku-label' ),
                'SKU Changer',
                'manage_options',
                'sku-label-changer',
                array($this,'wcsku_admin_page_callback'),
                plugin_dir_url( __FILE__ ) . 'assets/icon-16x16.png',
            ); 
        }
        
        public function wcsku_admin_page_callback(){
            ?>
            <div id="wcsku-admin"></div>
            <?php
        }
    }
}

WCSKU_Admin::instance();