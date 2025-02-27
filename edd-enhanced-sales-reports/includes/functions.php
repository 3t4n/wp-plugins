<?php
/**
 * Helper Functions
 *
 * @package     EDD_Enhanced_Sales_Reports\Functions
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_admin_pages' ) ) {
	/**
	 * A short helper function to get admin registered pages
	 *
	 * @return array[]
	 */
	function edd_enhanced_sales_reports_get_admin_pages() {
		$admin_pages = array(
			'main'    => array(
				'title'     => __( 'EDD Enhanced Sales Reports', 'edd-enhanced-sales-reports' ),
				'sub_title' => __( 'Settings', 'edd-enhanced-sales-reports' ),
				'icon'      => 'admin-menu-icon.svg',
				'slug'      => 'edd-enhanced-sales-reports-settings',
			),
			'license' => array(
				'title' => __( 'License', 'edd-enhanced-sales-reports' ),
				'slug'  => 'edd-enhanced-sales-reports-license',
			),
		);

		return $admin_pages;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_admin_page_by_name' ) ) {
	/**
	 * A small helper function to return Title and Slug for an admin page
	 *
	 * @param string $page_name The name of page for which data is required.
	 *
	 * @return array
	 */
	function edd_enhanced_sales_reports_get_admin_page_by_name( $page_name = 'main' ) {

		$pages = edd_enhanced_sales_reports_get_admin_pages();

		if ( ! isset( $pages[ $page_name ] ) ) {
			$page = array(
				'title' => __( 'Page Title', 'edd-enhanced-sales-reports' ),
				'slug'  => 'edd-enhanced-sales-reports-not-available',
			);
		} else {
			$page = $pages[ $page_name ];
		}

		return $page;
	}
}


if ( ! function_exists( 'edd_enhanced_sales_reports_show_message' ) ) {
	/**
	 * Generic function to show a message to the user using WP's
	 * standard CSS classes to make use of the already-defined
	 * message colour scheme.
	 *
	 * @param string  $message message you want to tell the user.
	 * @param boolean $error_message true, the message is an error, so use
	 * the red message style. If false, the message is a status
	 * message, so use the yellow information message style.
	 */
	function edd_enhanced_sales_reports_show_message( $message, $error_message = false ) {

		if ( $error_message ) {
			echo '<div id="message" class="error">';
		} else {
			echo '<div id="message" class="updated fade">';
		}

		echo '<p><strong>' . esc_html( $message ) . '</strong></p></div>';
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_is_admin_page' ) ) {
	/**
	 * Helper function for checking an admin page or sub view
	 *
	 * @param string $page_name page to check.
	 * @param string $sub_view sub view to check.
	 *
	 * @return boolean
	 */
	function edd_enhanced_sales_reports_is_admin_page( $page_name, $sub_view = '' ) {
		if ( ! is_admin() ) {
			return false;
		}

		global $pagenow;
		$page_id = get_current_screen()->id;

		if ( ! $pagenow === $page_name ) {
			return false;
		}

		if ( ! empty( $sub_view ) && ! stristr( $page_id, $sub_view ) ) {
			return false;
		}

		return true;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_is_front_end_page' ) ) {
	/**
	 * Helper function for checking a front page or sub view
	 *
	 * @param string $page_name page to check.
	 * @param string $sub_view sub view to check.
	 *
	 * @return boolean
	 */
	function edd_enhanced_sales_reports_is_front_end_page( $page_name, $sub_view = '' ) {
		if ( is_admin() ) {
			return false;
		}

		/* Add Custom Logic Here */

		return true;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_settings' ) ) {
	/**
	 * Helper function for returning an array of saved settings
	 *
	 * @return array
	 */
	function edd_enhanced_sales_reports_get_settings() {
		$defaults = array(
			'checkbox'                  => '0',
			'radio'                     => 'yes',
			'textbox'                   => '',
			'numberbox'                 => '',
			'selectbox'                 => '',
			'selectbox_multi'           => array(),
			'textarea'                  => '',
			'file_upload'               => '',
			'remove_data'               => '',
			'show_products_in_payments' => '1',
		);

		$settings = get_option( 'edd_enhanced_sales_reports_settings' );

		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		foreach ( $defaults as $key => $value ) {
			if ( ! isset( $settings[ $key ] ) ) {
				$settings[ $key ] = $value;
			}
		}

		return $settings;
	}
}

if ( ! function_exists( 'edd_enhances_sales_reports__get_oldest_import_record' ) ) {
	/**
	 * Returns the oldest record in lookup table
	 *
	 * @return array|object|null
	 */
	function edd_enhances_sales_reports__get_oldest_import_record() {
		global $wpdb;

		return $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}enhanced_sales_report ORDER BY order_date, id ASC LIMIT 1", ARRAY_A );
	}
}

if ( ! function_exists( 'edd_enhances_sales_reports__get_countries' ) ) {
	/**
	 * A small utility function to return an associated array of countries names
	 * in abbreviation => name format
	 *
	 * @return string[]
	 */
	function edd_enhances_sales_reports__get_countries() {
		return array(
			'US' => 'United States',
			'CA' => 'Canada',
			'GB' => 'United Kingdom',
			'AF' => 'Afghanistan',
			'AX' => 'Åland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BQ' => 'Bonaire, Saint Eustatius and Saba',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darrussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CD' => 'Congo, Democratic People\'s Republic',
			'CG' => 'Congo, Republic of',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => 'Cote d\'Ivoire',
			'HR' => 'Croatia/Hrvatska',
			'CU' => 'Cuba',
			'CW' => 'CuraÇao',
			'CY' => 'Cyprus',
			'CZ' => 'Czechia',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'TP' => 'East Timor',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'GQ' => 'Equatorial Guinea',
			'SV' => 'El Salvador',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GR' => 'Greece',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard and McDonald Islands',
			'VA' => 'Holy See (City Vatican State)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Lao People\'s Democratic Republic',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libyan Arab Jamahiriya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macau',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova, Republic of',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'KP' => 'North Korea',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territories',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Island',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'XK' => 'Republic of Kosovo',
			'RE' => 'Reunion Island',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barthélemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin (French)',
			'SX' => 'Saint Martin (Dutch)',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'SM' => 'San Marino',
			'ST' => 'São Tomé and Príncipe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovak Republic',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia',
			'KR' => 'South Korea',
			'SS' => 'South Sudan',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen Islands',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'UY' => 'Uruguay',
			'UM' => 'US Minor Outlying Islands',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'VG' => 'Virgin Islands (British)',
			'VI' => 'Virgin Islands (USA)',
			'WF' => 'Wallis and Futuna Islands',
			'EH' => 'Western Sahara',
			'WS' => 'Western Samoa',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_gateway_name' ) ) {
	/**
	 * Helper function to return a user friendly name for a given gateway
	 *
	 * @param string $gateway Name of gateway.
	 *
	 * @return string
	 */
	function edd_enhanced_sales_reports_get_gateway_name( $gateway ) {
		$common_gateways = array(
			'stripe'                   => 'Stripe',
			'manual'                   => 'Manual',
			'amazon'                   => 'Amazon',
			'paypal_adaptive_payments' => 'Paypal Adaptive',
			'paypal_commerce'          => 'Paypal',
		);

		if ( isset( $common_gateways[ $gateway ] ) ) {
			return $common_gateways[ $gateway ];
		}

		return ucwords( str_replace( '_', ' ', $gateway ) );
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_strip_product_option' ) ) {
	/**
	 * Removes option name from provided product name
	 *
	 * @param string $full_product_name Name of product with option name.
	 *
	 * @return string
	 */
	function edd_enhanced_sales_reports_strip_product_option( $full_product_name ) {
		$full_product_name = explode( ' — ', $full_product_name );
		$full_product_name = trim( $full_product_name[0] );

		return $full_product_name;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_oldest_order_date' ) ) {
	/**
	 * Returns date of oldest record in lookup table
	 *
	 * @return string|null
	 */
	function edd_enhanced_sales_reports_get_oldest_order_date() {
		global $wpdb;
		$date = $wpdb->get_var( "SELECT MIN( DATE( order_date ) ) FROM {$wpdb->prefix}enhanced_sales_report" );

		if ( ! $date ) {
			$date = gmdate( 'Y-m-d' );
		}

		return $date;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_latest_order_date' ) ) {
	/**
	 * Returns date of newest record in lookup table
	 *
	 * @return string|null
	 */
	function edd_enhanced_sales_reports_get_latest_order_date() {
		global $wpdb;
		$date = $wpdb->get_var( "SELECT MAX( DATE( order_date ) ) FROM {$wpdb->prefix}enhanced_sales_report" );

		if ( ! $date ) {
			$date = gmdate( 'Y-m-d' );
		}

		return $date;
	}
}

if ( ! function_exists( 'edd_enhanced_sales_reports_get_oldest_get_days_between_dates' ) ) {
	/**
	 * Returns number of days between two given dates
	 *
	 * @param string $start_date The start date.
	 * @param string $end_date The end date.
	 *
	 * @return int
	 */
	function edd_enhanced_sales_reports_get_oldest_get_days_between_dates( $start_date, $end_date ) {
		$start_date = DateTime::createFromFormat( 'Y-m-d', $start_date );
		$end_date   = DateTime::createFromFormat( 'Y-m-d', $end_date );
		$interval   = $end_date->diff( $start_date );

		return absint( $interval->days );
	}
}
