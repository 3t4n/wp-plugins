<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Pages;
use Bright_Delivery_for_Woocommerce\Base\BaseController;
use Bright_Delivery_for_Woocommerce\Traits\OptionsTrait;

class Checkout extends BaseController {

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
		add_action( 'woocommerce_after_order_notes', [$this, 'custom_checkout_field'] );
		add_action( 'woocommerce_checkout_update_order_meta', [$this, 'update_order_meta'] );
		add_action( 'woocommerce_new_order_item', [$this, 'bp_add_values_to_order_item_meta'], 1, 2 );
		add_action( 'woocommerce_thankyou', [$this, 'add_content_thankyou'] );
		add_action( 'wp_enqueue_scripts', [$this, 'add_scripts'] );
	}

	/**
	 * Enqueue scrips
	 *
	 * @return void
	 */
	function add_scripts() {
		wp_enqueue_style( "flatpickr_css", BV_BDFW_ASSETS . '/css/flatpickr.min.css', array(), '0.1', 'all' );
		wp_enqueue_script( "flatpickr_js", BV_BDFW_ASSETS . '/js/flatpickr.min.js', [], '0.1', true );
		wp_enqueue_script( "bdfwmain_js", BV_BDFW_ASSETS . '/js/main.js', [], '0.2', true );

		$str_locale = 'default';
		$options    = get_option( 'wc-wdda-delivery-timeslots' );
		if ( isset( $options['bpwd_calendar_locale'] ) && !empty( $options['bpwd_calendar_locale'] ) ) {
			$str_locale = $options['bpwd_calendar_locale'];
		}
		wp_enqueue_script(
			'wdda-datepicker-locale',
			'https://npmcdn.com/flatpickr/dist/l10n/' . $str_locale . '.js',
			array(),
			'0.1',
			true
		);
	}

	/**
	 * Add delivery info on thank you page
	 *
	 * @param  int      $order_id Order ID.
	 * @return string
	 */
	function add_content_thankyou( $order_id ) {
		$order         = wc_get_order( $order_id );
		$delivery_time = $order->get_meta( 'bp_delivery_time' );
		$delivery_date = $order->get_meta( 'bp_delivery_date' );
		$pick_time     = $order->get_meta( 'bp_pick_time' );
		$pick_date     = $order->get_meta( 'bp_pick_date' );
		$pick_location = $order->get_meta( 'bp_pick_location' );

		$deliveryInfoTxt = '';
		$deliveryInfoTxt .= $this->textInfoCheckout( 'Delivery Date', $delivery_date, true );
		$deliveryInfoTxt .= $this->textInfoCheckout( 'Delivery Time', $delivery_time, true );
		$deliveryInfoTxt .= $this->textInfoCheckout( 'Pickup Date', $pick_date, true );
		$deliveryInfoTxt .= $this->textInfoCheckout( 'Pickup Time', $pick_time, true );
		$deliveryInfoTxt .= $this->textInfoCheckout( 'Pickup Location', $pick_location, true );

		if ( !empty( $deliveryInfoTxt ) ) {
			echo wp_kses( $deliveryInfoTxt, order::allowed_html() );
		}

	}

	/**
	 * Formats text to display
	 *
	 * @param  string   $label  (ex Delivery date, pickup time)
	 * @param  string   $text   the time slot/date
	 * @param  bool     $strong Format Html version or text
	 * @return string
	 */
	public function textInfoCheckout( $label, $text, $strong = false ) {
		$textResult = '';
		if ( !empty( $text ) ) {
			if ( $strong ) {
				$textResult = '<strong>' . esc_html( $label ) . ':</strong>  ' . esc_html( $text ) . '<br/>';
			} else {
				$textResult = esc_html( $label ) . ':  ' . esc_html( $text ) . '<br/>';
			}
		}
		return $textResult;
	}

	/**
	 * Insert delivery/pickup fields to checkout
	 *
	 * @return void
	 */
	public function custom_checkout_field() {

		$options                   = get_option( 'wc-wdda-delivery-timeslots' );
		$delivery_weekdays         = isset( $options['bpwd_deliverydate_days'] ) && is_array( $options['bpwd_deliverydate_days'] ) ? $options['bpwd_deliverydate_days'] : '';
		$pickup_weekdays           = isset( $options['bpwd_pickupdate_days'] ) && is_array( $options['bpwd_pickupdate_days'] ) ? $options['bpwd_pickupdate_days'] : '';
		$weekdays                  = ['0', '1', '2', '3', '4', '5', '6'];
		$delivery_weekdays_disable = [];
		$pickup_weekdays_disable   = [];
		if ( !empty( $delivery_weekdays ) ) {
			$delivery_weekdays_disable = array_diff( $weekdays, $delivery_weekdays );
		}
		if ( !empty( $pickup_weekdays ) ) {
			$pickup_weekdays_disable = array_diff( $weekdays, $pickup_weekdays );
		}

		if ( isset( $options['bpwd_deliverydatefield'] ) && 1 == $options['bpwd_deliverydatefield'] ) {
			woocommerce_form_field( 'bp-woopick-delivery_date_field',
				[
					'type'              => 'date',
					'class'             => [
						' bp-woopick-delivery-select-picker ',
					],
					'label'             => __( 'Delivery Date', "wc-wdda-delivery-timeslots" ),
					'placeholder'       => __( 'Delivery Date', "wc-wdda-delivery-timeslots" ),
					'required'          => false,
					'custom_attributes' => [
						'data-unableweekdays' => implode( ',', $delivery_weekdays_disable ),
					],
				], WC()->checkout->get_value( 'bp-woopick-delivery_date_field' ) );
		}

		if ( isset( $options['bpwd_deliverytime_field'] ) && 1 == $options['bpwd_deliverytime_field'] ) {
			woocommerce_form_field( 'bp-woopick-delivery_time_field',
				[
					'type'              => 'select',
					'class'             => [
						'  ',
					],
					'label'             => __( 'Delivery Time', "wc-wdda-delivery-timeslots" ),
					'placeholder'       => __( 'Delivery', "wc-wdda-delivery-timeslots" ),
					'options'           => OptionsTrait::delivery_time_option( $options, 'delivery' ),
					'required'          => false,
					'custom_attributes' => [
						'data-default_time'       => '',
						'data-order_limit_notice' => '',
					],
				], WC()->checkout->get_value( 'bp-woopick-delivery_time_field' ) );
		}

		if ( isset( $options['bpwd_pickupdatefield'] ) && 1 == $options['bpwd_pickupdatefield'] ) {
			woocommerce_form_field( 'bp-woopick-pickup_date_field',
				[
					'type'              => 'date',
					'class'             => [
						' bp-woopick-delivery-select-picker ',
					],
					'label'             => __( 'Pickup Date', "wc-wdda-delivery-timeslots" ),
					'placeholder'       => __( 'Pickup Date', "wc-wdda-delivery-timeslots" ),
					'required'          => false,
					'custom_attributes' => [
						'data-unableweekdays' => implode( ',', $pickup_weekdays_disable ),
					],
				], WC()->checkout->get_value( 'bp-woopick-pickup_date_field' ) );
		}

		if ( isset( $options['bpwd_pickuptime_field'] ) && 1 == $options['bpwd_pickuptime_field'] ) {
			woocommerce_form_field( 'bp-woopick-pickup_time_field',
				[
					'type'              => 'select',
					'label'             => __( 'Pickup Time', "wc-wdda-delivery-timeslots" ),
					'placeholder'       => __( 'Pickup Time', "wc-wdda-delivery-timeslots" ),
					'options'           => OptionsTrait::delivery_time_option( $options, 'pickup' ),
					'required'          => false,
					'custom_attributes' => [
						'data-default_time'       => '',
						'data-order_limit_notice' => '',
					],
				], WC()->checkout->get_value( 'bp-woopick-pickup_time_field' ) );
		}

		if (  ( isset( $options['bpwd_deliverydatefield'] ) && 1 == $options['bpwd_deliverydatefield'] ) ||
			( isset( $options['bpwd_pickupdatefield'] ) && 1 == $options['bpwd_pickupdatefield'] )
		) {
			$str_locale = 'default';
			$dt_format  = 'Y-m-d';
			if ( isset( $options['bpwd_calendar_locale'] ) && !empty( $options['bpwd_calendar_locale'] ) ) {
				$str_locale = $options['bpwd_calendar_locale'];
			}
			if ( isset( $options['bpwd_dateformat'] ) && !empty( $options['bpwd_dateformat'] ) ) {
				$dt_format = $options['bpwd_dateformat'];
			}
			woocommerce_form_field( 'bp-woopick-general_field',
				[
					'type'              => 'hidden',
					'class'             => [' '],
					'custom_attributes' => [
						'data-general_locale'   => $str_locale,
						'data-general_dtformat' => $dt_format,
					],
				], WC()->checkout->get_value( 'bp-woopick-general_field' ) );
		}

		if ( isset( $options['bpwd_pickupdatefield'] ) && 1 == $options['bpwd_pickupdatefield'] ) {
			//pickup-locations
			$pickup_location_label_default = 'Choose one of the locations to pickup';

			$location_is_required  = 1 == $options['pickup-locations-required'] ? true : false;
			$pickup_location_label = !empty( trim( $options['pickup-locations-label'] ) ) ?  $options['pickup-locations-label'] : $pickup_location_label_default;

			if( is_array( $options['pickup-locations'] ) ) {

				woocommerce_form_field( 'bp-woopick-delivery_location',
					[
						'type'              => 'select',
						'label'             => __( $pickup_location_label, 'wc-wdda-delivery-timeslots' ),
						'placeholder'       => __( 'Pickup location', 'wc-wdda-delivery-timeslots' ),
						'options'           => OptionsTrait::pickup_options( $options, 'pickup' ),
						'required'          => $location_is_required,
						'custom_attributes' => [
							'data-default_time'       => '',
							'data-order_limit_notice' => '',
						],
					], WC()->checkout->get_value( 'bp-woopick-delivery_location' ) );
			}

		}

	}

	/**
	 * Formats text to display
	 *
	 * @param  int    $item_id Item meta
	 * @param  array  $values  new field values
	 * @return void
	 */
	public function bp_add_values_to_order_item_meta( $item_id, $values ) {

		$bp_delivery_time = sanitize_text_field( $values['bp-woopick-delivery_time_field'] ) ?? '';
		if ( !empty( $bp_delivery_time ) ) {
			wc_add_order_item_meta( $item_id, 'bp_delivery_time', $bp_delivery_time );
		}

		$bp_pick_time = sanitize_text_field( $values['bp-woopick-pickup_time_field'] ) ?? '';
		if ( !empty( $bp_pick_time ) ) {
			wc_add_order_item_meta( $item_id, 'bp_pick_time', $bp_pick_time );
		}

		$bp_delivery_date = sanitize_text_field( $values['bp-woopick-delivery_date_field'] ) ?? '';
		if ( !empty( $bp_delivery_date ) ) {
			wc_add_order_item_meta( $item_id, 'bp_delivery_date', $bp_delivery_date );
		}

		$bp_pick_date = sanitize_text_field( $values['bp-woopick-pickup_date_field'] ) ?? '';
		if ( !empty( $bp_pick_date ) ) {
			wc_add_order_item_meta( $item_id, 'bp_pick_date', $bp_pick_date );
		}

		$bp_pick_location = sanitize_text_field( $values['bp-woopick-delivery_location'] ) ?? '';
		if ( !empty( $bp_pick_location ) ) {
			wc_add_order_item_meta( $item_id, 'bp_pick_location', $bp_pick_location );
		}
	}

	/**
	 * Update order details data
	 *
	 * @param  int    $order_id Order ID
	 * @return void
	 */
	public function update_order_meta( $order_id ) {

		$order = wc_get_order( $order_id );

		$delivery_time   = isset( $_POST['bp-woopick-delivery_time_field'] ) ? sanitize_text_field( $_POST['bp-woopick-delivery_time_field'] ) : '';
		$delivery_date   = isset( $_POST['bp-woopick-delivery_date_field'] ) ? sanitize_text_field( $_POST['bp-woopick-delivery_date_field'] ) : '';
		$pickup_time     = isset( $_POST['bp-woopick-pickup_time_field'] ) ? sanitize_text_field( $_POST['bp-woopick-pickup_time_field'] ) : '';
		$pickup_date     = isset( $_POST['bp-woopick-pickup_date_field'] ) ? sanitize_text_field( $_POST['bp-woopick-pickup_date_field'] ) : '';
		$pickup_location = isset( $_POST['bp-woopick-delivery_location'] ) ? sanitize_text_field( $_POST['bp-woopick-delivery_location'] ) : '';

		if ( !empty( $delivery_time ) ) {
			// update_post_meta( $order_id, 'bp_delivery_time', sanitize_text_field( $delivery_time ) );
			$order->update_meta_data( 'bp_delivery_time', $delivery_time );
		}

		if ( !empty( $delivery_date ) ) {
			// update_post_meta( $order_id, 'bp_delivery_date', sanitize_text_field( $delivery_date ) );
			$order->update_meta_data( 'bp_delivery_date', $delivery_date );
		}

		if ( !empty( $pickup_time ) ) {
			// update_post_meta( $order_id, 'bp_pick_time', sanitize_text_field( $pickup_time ) );
			$order->update_meta_data( 'bp_pick_time', $pickup_time );
		}

		if ( !empty( $pickup_date ) ) {
			// update_post_meta( $order_id, 'bp_pick_date', sanitize_text_field( $pickup_date ) );
			$order->update_meta_data( 'bp_pick_date', $pickup_date );
		}

		if ( !empty( $pickup_location ) ) {
			// update_post_meta( $order_id, 'bp_pick_location', sanitize_text_field( $pickup_location ) );
			$order->update_meta_data( 'bp_pick_location', $pickup_location );
		}

		$order->save();

	}

}
