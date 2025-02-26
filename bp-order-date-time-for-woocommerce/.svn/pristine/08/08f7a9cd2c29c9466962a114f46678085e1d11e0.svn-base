<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Traits;

class MessageTrait {

	const NOTICE_ERROR = 'NOTICE_ERROR';

	/**
	 * Print an message of error
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @param  string $msg    the message to show
	 * @param  string $type   message type NOTICE_ERROR | ...
	 * @return void   message prinf
	 */
	public static function showError( $msg, $type ) {

		if ( $type === self::NOTICE_ERROR ) {

			$class = 'notice notice-error';

			$msg_full = self::registerMessageI18n( $msg, $type );

			echo '<div class="' . esc_attr( $class ) . '"><p>' . esc_html( $msg_full ) . '</p></div>';

		}

	}

	/**
	 * Register the message in I18n
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @param  string $msg     the message to be stored
	 * @param  string $type    message type NOTICE_ERROR | ...
	 * @return string Retrieve the translation of $text. (sanitized message)
	 */
	public static function registerMessageI18n( $msg, $type ) {

		if ( $type === self::NOTICE_ERROR ) {
			return __( $msg, 'wc-wdda-delivery-timeslots' );
		}
	}
}
