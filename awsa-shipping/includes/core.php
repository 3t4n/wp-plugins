<?php
/**
 * Core Functions
 *
 * @version           1.1.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/* Store Functions Start */

if ( !function_exists( 'awsa_convert_price_to_rial' ) ) {
	/**
	 * Convert Price to Rial(IRR)
	 *
	 * @param int|float      $price
	 * @param boolean|string $from IRT|IRR|IRHR|IRHT
	 *
	 * @version 1.0.0
	 * @return int|float
	 */
	function awsa_convert_price_to_rial( $price, $from = false ) {

		if ( !$price ) {
			return 0;
		}
		if ( !$from ) {
			$from = get_woocommerce_currency();
		}
		switch ( $from ) {
			case 'IRR':
				$price = $price;
				break;
			case 'IRT':
				$price = $price * 10;
				break;
			case 'IRHR':
				$price = $price * 1000;
				break;
			case 'IRHT':
				$price = $price * 10000;
				break;
		}

		return $price;
	}
}

if ( !function_exists( 'awsa_convert_rial_to' ) ) {
	/**
	 * Convert Rial to Woocommerce Currency | Custom Currency
	 *
	 * @param int|float $price
	 * @param string    $to
	 *
	 * @return int|float
	 */
	function awsa_convert_rial_to( $price, $to = null ) {

		if ( !$price ) {
			return 0;
		}
		if ( is_null( $to ) ) {
			$to = get_woocommerce_currency();
		}

		switch ( $to ) {
			case 'IRR':
				$price = $price;
				break;
			case 'IRT':
				$price = $price / 10;
				break;
			case 'IRHR':
				$price = $price / 1000;
				break;
			case 'IRHT':
				$price = $price / 10000;
				break;
		}

		return $price;
	}
}

if ( !function_exists( 'awsa_convert_price' ) ) {
	/**
	 * Convert Price From $from to $to
	 *
	 * @param int    $price
	 * @param string $from
	 * @param string $to
	 *
	 * @version 1.0.1
	 * @return int
	 */
	function awsa_convert_price( $price, $from, $to ) {

		if ( !$price ) {
			return 0;
		}
		if ( false !== strpos( $from, 'IR' ) ) {
			$price = awsa_convert_price_to_rial( $price, $from );
			$price = awsa_convert_rial_to( $price, $to );
		}

		return $price;
	}
}

if ( !function_exists( 'awsa_get_weight' ) ) {
	/**
	 * Convert Weight to g
	 *
	 * @param float $weight
	 *
	 * @return int
	 */
	function awsa_get_weight( $weight ) {

		$weight_unit = get_option( 'woocommerce_weight_unit' );

		return wc_get_weight( $weight, 'g', $weight_unit );
	}
}

if ( !function_exists( 'awsa_fa_to_en_number' ) ) {
	/**
	 * Convert fa Numbers to en Numbers
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	function awsa_fa_to_en_number( $string ) {

		$persian = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
		$arabic  = array( '٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠' );

		$num              = range( 0, 9 );
		$converted_string = str_replace( $persian, $num, $string );
		$converted_string = str_replace( $arabic, $num, $converted_string );

		return $converted_string;
	}
}

if ( !function_exists( 'awsa_get_gateways' ) ) {
	/**
	 * Get Payment Methods , Getaways
	 *
	 * @return array
	 */
	function awsa_get_gateways() {

		$gateways = array();
		if ( function_exists( 'WC' ) ) {
			if ( method_exists( WC()->payment_gateways, 'payment_gateways' ) ) {
				$gateways = WC()->payment_gateways->payment_gateways();
			}
		}

		return (array) $gateways;
	}
}

if ( !function_exists( 'awsa_get_payment_methods' ) ) {
	/**
	 * Get WC Payment Methods
	 *
	 * @return array key => title
	 */
	function awsa_get_payment_methods(): array {

		global $awsa_payment_methods;
		if ( empty( $awsa_payment_methods ) ) {
			$gateways = awsa_get_gateways();
			foreach ( $gateways as $gateway ) {

				$awsa_payment_methods[ $gateway->id ] = $gateway->title;
			}
		}

		return (array)$awsa_payment_methods;
	}
}

if ( !function_exists( 'awsa_is_online_payment' ) ) {
	/**
	 * Check Is Online Payment Method by Id
	 *
	 * @param string|null $payment_method_id
	 *
	 * @version 1.0.3
	 * @return bool
	 */
	function awsa_is_online_payment( ?string $payment_method_id ): bool {

		$is_online = false;
		switch ( $payment_method_id ) {
			case 'paypal':
			case 'bankmellat':
			case 'behpardakht':
			case 'wc_behpardakht':
			case 'zarinpalwg':
			case 'wc_zpal':
			case 'pasargad_bwg':
			case 'pasargad':
			case 'payir':
			case 'mellat':
			case 'bacs': // Bank transfer
				$is_online = true;
				break;
			case 'cod':
				// case 'default':
				$is_online = false;
				break;
		}

		return apply_filters( 'awsa_is_online_payment', $is_online, $payment_method_id );
	}
}

if ( !function_exists( 'awsa_check_postal_code' ) ) {
	/**
	 * Check Validate $postal_code
	 *
	 * @param int    $postal_code
	 * @param string $country_id
	 *
	 * @version 1.1.0
	 * @return bool
	 */
	function awsa_check_postal_code( $postal_code, $country_id = 'IR' ) {

		switch ( $country_id ) {
			case 'IR':
			default:
				if ( !is_numeric( $postal_code ) || in_array(
						(int) substr( $postal_code, 0, 1 ),
						array(
							0,
							2,
							5,
						),
						true
					) || 10 !== strlen( $postal_code ) ) {
					return false;
				}
				break;
		}

		return true;
	}
}
/* Store Functions End */

/* Dokan Functions Start */
if ( !function_exists( 'awsa_dokan_get_page_id' ) ) {
	/**
	 * Return dokan page id
	 *
	 * @param string $page
	 *
	 * @return int|false
	 */
	function awsa_dokan_get_page_id( $page ) {

		$pages = get_option( 'dokan_pages', false );

		return is_array( $pages ) && isset( $pages[ $page ] ) ? $pages[ $page ] : false;
	}
}

if ( !function_exists( 'awsa_dokan_is_paged' ) ) {
	/**
	 * Check Current page is $page
	 *
	 * @param string $page
	 *
	 * @return bool
	 */
	function awsa_dokan_is_paged( $page ) {

		$page_id         = awsa_dokan_get_page_id( $page );
		$current_page_id = get_the_ID();

		if ( false !== $page_id && $page_id === $current_page_id ) {
			return true;
		}

		return false;
	}
}

if ( !function_exists( 'awsa_get_seller_id_by_order' ) ) {
	/**
	 * Get Seller ID by Order ID
	 *
	 * @param int $order_id
	 *
	 * @version 1.0.0
	 * @return int
	 */
	function awsa_get_seller_id_by_order( $order_id ) {

		$seller = 0;
		if ( class_exists( 'WeDevs_Dokan' ) ) {
			$seller = dokan_get_seller_id_by_order( $order_id );
		}

		return $seller;
	}
}

if ( !function_exists( 'awsa_get_seller_info' ) ) {
	/**
	 * Get Seller Info by User_id
	 *
	 * @param int $seller_id
	 *
	 * @return array
	 */
	function awsa_get_seller_info( $seller_id ) {

		return dokan_get_store_info( $seller_id );
	}
}
/* Dokan Functions End */
if ( !function_exists( 'awsa_sanitize_mobile_number' ) ) {
	/**
	 * Check and Sanitize Mobile Number
	 *
	 * @param string $mobile
	 *
	 * @return string|bool
	 */
	function awsa_sanitize_mobile_number( $mobile ) {

		$mobile = $mobile . '';

		if ( is_rtl() ) {
			$mobile = awsa_fa_to_en_number( $mobile );
		}

		if ( '0' !== substr( $mobile, 0, 1 ) ) {
			$mobile = '0' . $mobile;
		}

		if ( 11 !== strlen( $mobile ) ) {
			return false;
		}

		if ( '09' !== substr( $mobile, 0, 2 ) ) {
			return false;
		}

		return $mobile;
	}
}

if ( !function_exists( 'awsa_get_lang_locale' ) ) {
	/**
	 * Get User|WP Local lang
	 *
	 * @return string
	 */
	function awsa_get_lang_locale() {

		$lang = get_user_locale() ? get_user_locale() : get_locale();
		switch ( $lang ) {
			case 'fa_IR':
				$language = 'fa';
				break;
			case 'en_EN':
			default:
				$language = 'en';
				break;
		}

		return $language;
	}
}

if ( !function_exists( 'awsa_is_persian_string' ) ) {

	/**
	 * Check is Persian
	 *
	 * @param string $string
	 *
	 * @return bool
	 */
	function awsa_is_persian_string( $string ) {

		$rtl_chars_pattern = '/[\x{0590}-\x{05ff}\x{0600}-\x{06ff}]/u';

		return preg_match( $rtl_chars_pattern, $string );
	}
}

// awsa-post-actions.php start
if ( !function_exists( 'awsa_order_actions_meta_box_child_info' ) ) {
	/**
	 * Add Detail of Child Order
	 *
	 * @param int $order_id
	 *
	 * @since 1.1.0
	 * @return void
	 */
	function awsa_order_actions_meta_box_child_info( $order_id ) {

		$seller_id  = awsa_get_seller_id_by_order( $order_id );
		$store_info = awsa_get_seller_info( $seller_id );
		echo '<br/><strong>' . esc_html__( 'Seller', 'awsa-shipping' ) . '</strong>: ' . esc_html( $store_info['store_name'] ) . ' #' . $seller_id;
	}
}
// awsa-post-actions.php end


if ( !function_exists( 'awsa_gregorian_to_jalali' ) ) {
	/**
	 * Convert Gregorian to Jalali
	 *
	 * @param string $datetime
	 * @param string $mod
	 *
	 * @return string
	 */
	function awsa_gregorian_to_jalali( $datetime, $mod = '/' ) {

		if ( empty( $datetime ) ) {
			return '';
		}

		if ( function_exists( 'gregorian_to_jalali' ) ) {
			$datetime = explode( ' ', $datetime );
			$d        = explode( '-', $datetime[0] );

			$date = gregorian_to_jalali( $d[0], $d[1], $d[2] );
			$date = implode( $mod, $date );
			$date = isset( $datetime[1] ) ? $date . ' ' . $datetime[1] : $date;
		}

		return !empty( $date ) ? $date : $datetime;
	}
}


if ( !function_exists( 'awsa_jalali_to_gregorian' ) ) {
	/**
	 * Convert Jalali to Gregorian
	 *
	 * @param string $datetime
	 * @param string $mod
	 *
	 * @return string
	 */
	function awsa_jalali_to_gregorian( $datetime, $mod = '-' ) {

		if ( empty( $datetime ) ) {
			return;
		}
		if ( function_exists( 'jalali_to_gregorian' ) ) {
			$datetime = explode( ' ', $datetime );
			$d        = explode( '/', $datetime[0] );

			$date = jalali_to_gregorian( $d[0], $d[1], $d[2] );
			$date = implode( $mod, $date );
			$date = isset( $datetime[1] ) ? $date . ' ' . $datetime[1] : $date;
		}

		return !empty( $date ) ? $date : $datetime;
	}
}

// awsa_admin_menus.php core
if ( !function_exists( 'awsa_admin_menus' ) ) {
	/**
	 * Manage AWSA Menus in WP Admin
	 *
	 * @return \AWSA_Core\Admin_Menus\Admin_Menus
	 */
	function awsa_admin_menus() {

		return \AWSA_Core\Admin_Menus\Admin_Menus::instance();
	}
}

//Excel function
if ( !function_exists( 'awsa_create_excel' ) ) {
	/**
	 * Create Excel
	 *
	 * @param $name
	 * @param $header
	 * @param $rows
	 *
	 * @since   1.2.0
	 * @version 1.0.0
	 * @return string
	 * @return string url of file
	 */
	function awsa_create_excel( $name, $header, $rows ): string {

		return \AWSA_Core\Excel\Excel_Writer::getInstance()->create_excel( $name, $header, $rows );
	}
}

if ( !function_exists( 'awsa_excel_reader' ) ) {
	/**
	 * @param string       $filename
	 * @param array|string $allowed_columns
	 *
	 * @since   1.2.0
	 * @version 1.0.0
	 * @return array|null
	 */
	function awsa_excel_reader( string $filename, $allowed_columns = 'all' ): ?array {

		return \AWSA_Core\Excel\Excel_Reader::getInstance()->get_sheet_rows( $filename, $allowed_columns );
	}
}

if ( !function_exists( 'awsa_handle_attachment' ) ) {
	/**
	 * @param $file_handler
	 *
	 * @return false|int|\WP_Error
	 */
	function awsa_handle_attachment( $file_handler ) {

		if ( $_FILES[ $file_handler ]['error'] !== UPLOAD_ERR_OK ) {
			return false;
		}

		require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
		require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
		require_once( ABSPATH . "wp-admin" . '/includes/media.php' );

		return media_handle_upload( $file_handler, 0 );
	}
}
