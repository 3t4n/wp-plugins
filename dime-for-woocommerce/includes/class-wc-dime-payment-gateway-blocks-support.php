<?php
use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class WC_Dime_Payment_Gateway_Blocks_Support extends AbstractPaymentMethodType {
    private $gateway;
    protected $name = 'dime_payment';
    public function initialize() {
        $this->settings = get_option( "woocommerce_{$this->name}_settings", array() );
    }

    public function is_active() {
		return ! empty( $this->settings[ 'enabled' ] ) && 'yes' === $this->settings[ 'enabled' ];
	}

    public function get_payment_method_script_handles() {
        wp_register_script(
            'wc-dime-pay-blocks-integration',
            plugin_dir_url( __DIR__ ) . 'scripts/wc-dime-pay-blocks.js',
            array(
                'wc-blocks-registry',
                'wc-settings',
                'wp-element',
                'wp-html-entities',
            ),
            filemtime( plugin_dir_path( __DIR__ ) . 'scripts/wc-dime-pay-blocks.js' ), // Use file modification time as version
            true
        );
    
        return array( 'wc-dime-pay-blocks-integration' );
    }

    public function get_payment_method_data() {
        return array(
			'title'        => $this->get_setting( 'title' ),
			'description'  => $this->get_setting( 'description' ),
            'icon'         => plugin_dir_url( __DIR__ ) . 'images/DimeFullLogo-dark.png',
		);
    }
}