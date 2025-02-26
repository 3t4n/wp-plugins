<?php
if ( !defined( 'ABSPATH' ) ) exit;

class EbizzPay_WC_Admin {

    // Constructor
    public function __construct() {

        add_action( 'plugin_action_links_' . EBIZZPAY_WC_BASENAME, array( $this, 'register_settings_link' ) );
        add_action( 'admin_notices', array( $this, 'woocommerce_notice' ) );

    }

    // Register plugin settings link
    public function register_settings_link( $links ) {

        $url = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=ebizzpay' );
        $label = esc_html__( 'Settings', 'ebizzpay-wc' );

        $settings_link = '<a href="' . esc_url( $url ) . '">' . $label . '</a>';
        array_unshift( $links, $settings_link );

        return $links;

    }

    // Show notice if WooCommerce not installed
    public function woocommerce_notice() {

        if ( !$this->is_woocommerce_activated() ) {
            ebizzpay_wc_notice( __( 'WooCommerce needs to be installed and activated.', 'ebizzpay-wc' ), 'error' );
        }

    }

    // Check if WooCommerce is installed and activated
    private function is_woocommerce_activated() {
        return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    }

}
new EbizzPay_WC_Admin();
