<?php
namespace Fw360Connect;

class settings {

    public function __construct() {

    }

    public function init() {
        add_action('admin_init', array($this, 'fw360_register_settings' ) );
        add_action('admin_menu', array($this, 'fw360_register_options_page') );
    }

    public function fw360_register_settings() {

        if(empty(get_option('fw360_api_url'))) add_option( 'fw360_api_url', '');
        if(empty(get_option('fw360_api_key'))) add_option( 'fw360_api_key', '');
        if (empty(get_option('fw360_allowed_roles'))) add_option( 'fw360_allowed_roles' , array('subscriber'));
        if (empty(get_option('fw360_sync_data'))) add_option( 'fw360_sync_data' , array('userdata'));
        if (empty(get_option('fw360_default_tags'))) add_option( 'fw360_default_tags' , '');

        register_setting( 'fw360_options_group', 'fw360_api_url', function($url) {
            return  trim(str_replace(array("http://", "https://", "www."), array("", "", ""), $url), '/');
        } );
        register_setting( 'fw360_options_group', 'fw360_api_key', 'string' );
        register_setting( 'fw360_options_group', 'fw360_allowed_roles', 'array' );
        register_setting( 'fw360_options_group', 'fw360_sync_data', 'array' );
        register_setting( 'fw360_options_group', 'fw360_default_tags', 'string' );
    }
    public function fw360_register_options_page() {
        add_options_page('Framework360', 'Framework360 - Settings', 'manage_options', 'fw360-settings', array($this, 'fw360_options_page'));
    }

    public function fw360_options_page() {
        global $wp_roles;
        include(FW360_DIR . '/inc/settings.php');
    }

    private function isPluginActive($plugin_var) {
        return in_array($plugin_var. '/' .$plugin_var. '.php', apply_filters('active_plugins', get_option('active_plugins')));
    }

    public function getSyncData() {
        $wcStatus = $this->isPluginActive( 'woocommerce' );
        $elementorStatus = $this->isPluginActive( 'elementor-pro');

        $sync_data = get_option('fw360_sync_data') ?: [];

        return [
            'userdata' => [
                'name' => 'Profilo',
                'status' => true,
                'checkable' => false,
                'init' => function() {
                    add_action( 'user_register', [(new \Fw360Connect\customers()), 'syncCustomer'], 10, 1 );
                    add_action( 'profile_update', [(new \Fw360Connect\customers()), 'syncCustomer'], 10, 1 );
                }
            ],
            'cart' => [
                'name' => 'Carrello' . (!$wcStatus ? ' - <u class="dependency-error">WooCommerce mancante</u>' : ''),
                'status' => $wcStatus && in_array('cart', $sync_data, false),
                'checkable' => $wcStatus,
                'init' => function() {
                    add_action('woocommerce_add_to_cart', [(new \Fw360Connect\customers()), 'syncCustomer'], 10, 1);
                    add_action('woocommerce_cart_item_removed', [(new \Fw360Connect\customers()), 'syncCustomer'], 10, 1);
                }
            ],
            'orders' => [
                'name' => 'Ordini' . (!$wcStatus ? ' - <u class="dependency-error">WooCommerce mancante</u>' : ''),
                'status' => $wcStatus && in_array('orders', $sync_data, false),
                'checkable' => $wcStatus,
                'init' => function() {
                    add_action('woocommerce_new_order', function($order_id) {
                        $order = new WC_Order( $order_id );
                        (new \Fw360Connect\customers())->syncCustomer($order->get_user_id());
                    });
                }
            ],
            'elementor-forms' => [
                'name' => 'Forms Elementor' . (!$elementorStatus ? ' - <u class="dependency-error">Elementor Pro mancante</u>' : ''),
                'status' => $elementorStatus && in_array('elementor-forms', $sync_data, false),
                'checkable' => $elementorStatus,
                'init' => function() {
                    add_action( 'elementor_pro/init', function() {
                        include(__DIR__ . '/Integrations/elementor.php');
                        $sendy_action = new \Fw360Connect\Integrations\elementor();
                        \ElementorPro\Plugin::instance()->modules_manager->get_modules('forms')->add_form_action($sendy_action->get_name(), $sendy_action);
                    });
                }
            ]
        ];
    }
}