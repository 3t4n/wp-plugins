<?php

namespace CoffeCode\ExtraShippingMethods;

class Main {
	private static $instance = null;

	private function __construct() {
		add_action( 'plugins_loaded', [ $this, 'check_woocommerce' ] );
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function check_woocommerce() {
		if ( class_exists( 'WooCommerce' ) ) {
			$this->init();
		} else {
			add_action('admin_notices', [ $this, 'woocommerce_inactive_notice' ] );
		}
	}

	public function init() {
		add_filter( 'woocommerce_shipping_methods', [ $this, 'add_shipping_method' ] );

		Exclusive_Shipping_Methods::instance();
	}

	public function add_shipping_method( $methods ) {
		$methods['coffee-code_free_shipping_class'] = WC_Free_Shipping_Class::class;

		return $methods;
	}

	public function woocommerce_inactive_notice() {
		echo '<div class="error"><p><strong>Extra Shipping Methods</strong> requires WooCommerce to be active. Please install and activate WooCommerce.</p></div>';
	}
}
