<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Pages;
use Bright_Delivery_for_Woocommerce\Base\BaseController;

class Order extends BaseController {

	const PREFIX = 'bdfw';
	/**
	 * @var mixed
	 */
	public $handler_callback = null;

	/**
	 * Initialize all the class configuration
	 */
	public function __construct() {

		parent::__construct();
		add_action( 'woocommerce_admin_order_data_after_shipping_address', [$this, 'display_admin_order_meta'], 10, 1 );
		add_action( 'manage_shop_order_posts_custom_column', [$this, 'custom_orders_list_column_content'], 20, 2 );
		add_filter( 'manage_edit-shop_order_columns', [$this, 'custom_shop_order_column'], 20 );

	}

	/** 
	 *  Display delivery info on order edit page
	 * 
	 *  @param $order
	 */
	public static function display_admin_order_meta( $order ) {

		$delivery_time = $order->get_meta( 'bp_delivery_time' );
		$delivery_date = $order->get_meta( 'bp_delivery_date' );
		$pick_time     = $order->get_meta( 'bp_pick_time' );
		$pick_date     = $order->get_meta( 'bp_pick_date' );
		$pick_location = $order->get_meta( 'bp_pick_location' );

		$deliveryInfoTxt = '';
		$deliveryInfoTxt .= self::textInfo( 'Delivery Date', $delivery_date, true );
		$deliveryInfoTxt .= self::textInfo( 'Delivery Time', $delivery_time, true );
		$deliveryInfoTxt .= self::textInfo( 'Pickup Date', $pick_date, true );
		$deliveryInfoTxt .= self::textInfo( 'Pickup Time', $pick_time, true );
		$deliveryInfoTxt .= self::textInfo( 'Pickup Location', $pick_location, true );

		if ( !empty( $deliveryInfoTxt ) ) {
			echo '<div>' . wp_kses( $deliveryInfoTxt, self::allowed_html() ) . '</div>';
		}

	}
	/**
	 * Safe set of allowed HTML tags & attributes
	 *
	 * @return array
	 */
	public static function allowed_html() {
		$allowed_tags = array(
			'strong' => [],
			'br'     => []
		);
		return $allowed_tags;
	}
	/**
	 * @param  $columns
	 * @return mixed
	 */
	function custom_shop_order_column( $columns ) {
		$reordered_columns = array();

		// Inserting columns to a specific location
		foreach ( $columns as $key => $column ) {
			$reordered_columns[$key] = $column;
			if ( 'order_status' == $key ) {
				// Inserting after "Status" column
				$reordered_columns['bp_delivery_info'] = __( 'Delivery Info', 'wc-wdda-delivery-timeslots' );

			}
		}
		return $reordered_columns;
	}

	/**
	 * @param  $label
	 * @param  $text
	 * @param  $strong
	 * @return mixed
	 */
	public static function textInfo( $label, $text, $strong = false ) {
		$textResult = '';
		if ( !empty( $text ) ) {
			if ( $strong ) {
				$textResult = '<p><strong>' . esc_html( $label ) . ':</strong>  ' . esc_html( $text ) . '<p/><br/>';
			} else {
				$textResult = esc_html( $label ) . ':  ' . esc_html( $text ) . '<br/>';
			}

		}

		return $textResult;

	}

	// Adding custom fields meta data for new column
	/**
	 * @param $column
	 * @param $post_id
	 */
	function custom_orders_list_column_content( $column, $post_id ) {
		switch ( $column ) {
		case 'bp_delivery_info':
			// Get custom post meta data
			$order         = wc_get_order( $post_id );
			$delivery_time = $order->get_meta( 'bp_delivery_time' );
			$delivery_date = $order->get_meta( 'bp_delivery_date' );
			$pick_time     = $order->get_meta( 'bp_pick_time' );
			$pick_date     = $order->get_meta( 'bp_pick_date' );
			$pick_location = $order->get_meta( 'bp_pick_location' );

			$deliveryInfoTxt = '';
			$deliveryInfoTxt .= self::textInfo( 'Delivery Date', $delivery_date, true );
			$deliveryInfoTxt .= self::textInfo( 'Delivery Time', $delivery_time, true );
			$deliveryInfoTxt .= self::textInfo( 'Pickup Date', $pick_date, true );
			$deliveryInfoTxt .= self::textInfo( 'Pickup Time', $pick_time, true );

			if ( !empty( $deliveryInfoTxt ) ) {
				echo wp_kses( $deliveryInfoTxt, self::allowed_html() );
			} else
			//
			{
				break;
			}

		}
	}

	/**
	 * Registers the "actions"
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register() {

		//$this->plugin_options();
	}

	/**
	 * It create the settings of the plugin
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function plugin_options() {

	}

	/**
	 * Get values list
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_values_list( $key ) {

	}
}
