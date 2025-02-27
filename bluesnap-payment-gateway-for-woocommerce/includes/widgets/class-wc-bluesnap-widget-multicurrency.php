<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WC_Bluesnap_Widget_Multicurrency
 */
class WC_Bluesnap_Widget_Multicurrency extends WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'bluesnap_multicurrency_widget',
			'description' => esc_html__( 'Displays a currency selector.', 'woocommerce-bluesnap-gateway' ),
		);
		parent::__construct(
			'bluesnap_multicurrency_widget',
			esc_html__( 'BlueSnap Multicurrency Widget', 'woocommerce-bluesnap-gateway' ),
			$widget_ops
		);
	}


	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		WC_Bluesnap_Multicurrency::render_multicurrency_selector();
	}
}
