<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Pages;

use Bright_Delivery_for_Woocommerce\Base\BaseController;

class Email extends BaseController {

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
		add_action( 'woocommerce_email_order_meta', [$this, 'add_email_order_meta'], 10, 3 );

	}
	/**
	 * Safe set of allowed HTML tags & attributes
	 *
	 * @return array
	 */
	public static function allowed_html() {
		$allowed_tags = array(
			'strong' => [],
			'br'     => [],
			'li'     => [],
		);
		return $allowed_tags;
	}
	/**
	 * @param  $label
	 * @param  $text
	 * @param  $plain
	 * @return mixed
	 */
	public function textMailInfo( $label, $text, $plain = false ) {
		$textResult = '';
		if ( !empty( $text ) ) {
			if ( false === $plain ) {
				$textResult = '<li><strong>' . __( $label, 'wc-wdda-delivery-timeslots' ) . ':</strong> ' . $text . '</li>';
			} else {
				$textResult = __( $label, 'wc-wdda-delivery-timeslots' ) . ":  " . $text . "\n";
			}
		}

		return $textResult;

	}

	/**
	 * Update order details data
	 *
	 * @param  object $order         Order object
	 * @param  bool   $sent_to_admin if the recipient is admin or customer
	 * @param  bool   $plain_text    if text is plain or html
	 * @return void
	 */
	public function add_email_order_meta( $order, $sent_to_admin, $plain_text ) {

		$delivery_time = '';

		$delivery_time = $order->get_meta( 'bp_delivery_time' );
		$delivery_date = $order->get_meta( 'bp_delivery_date' );
		$pick_time     = $order->get_meta( 'bp_pick_time' );
		$pick_date     = $order->get_meta( 'bp_pick_date' );
		$pick_location = $order->get_meta( 'bp_pick_location' );

		$deliveryInfoTxt = '';
		$deliveryInfoTxt .= $this->textMailInfo( 'Delivery Date', $delivery_date, $plain_text );
		$deliveryInfoTxt .= $this->textMailInfo( 'Delivery Time', $delivery_time, $plain_text );
		$deliveryInfoTxt .= $this->textMailInfo( 'Pickup Date', $pick_date, $plain_text );
		$deliveryInfoTxt .= $this->textMailInfo( 'Pickup Time', $pick_time, $plain_text );
		$deliveryInfoTxt .= $this->textMailInfo( 'Pickup Location', $pick_location, $plain_text );

		if ( !empty( $deliveryInfoTxt ) ) {
			if ( false === $plain_text ) {
				echo '
            <h2>', __( 'Delivery Information', 'wc-wdda-delivery-timeslots' ) . '</h2>
      		    <ul>
      		      ' . wp_kses( $deliveryInfoTxt, self::allowed_html() ) . '
      		    </ul>';

			} else {
				echo __( 'Delivery Information', 'wc-wdda-delivery-timeslots' ) . "\n" . wp_kses( $deliveryInfoTxt, self::allowed_html() );
			}
		}
	}

}
