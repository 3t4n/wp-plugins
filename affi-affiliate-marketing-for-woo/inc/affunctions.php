<?php

namespace AffiAffiliate\Inc;

use AffiAffiliate\AffiEnv;

defined( 'ABSPATH' ) || exit;


class AFFunctions {
	protected static $instance = null;
	/**
	 * Referance classes. Used to provide objects on runtime.
	 *
	 * @var string
	 */
	public static $ref_classes;

	protected $settings;

	/**
	 * Initialize class
	 */
	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct() {
		$this->settings = Data::instance();
	}

	/**
	 * Return search string given in model filters array
	 *
	 * @param array $filter - filter array.
	 *
	 * @return string|array
	 */
	public static function get_filter_search_str( $filter ) {

		if ( isset( $filter['search'] ) ) {
			if ( is_array( $filter['search'] ) ) {
				return array_map( 'trim', $filter['search'] );
			} else {
				return addslashes( trim( $filter['search'] ) );
			}
		}

		return '';
	}

	/**
	 * Parse filter
	 *
	 * @param string $class - Class name of the model.
	 * @param array $filters - User filters array.
	 *
	 * @return string
	 */
	public static function parse_user_filters( $class, $filters ) {

		// Invalid filter.
		if ( ! isset( $filters['relation'] ) || count( $filters ) < 2 ) {
			return '1=1';
		}

		$relation   = $filters['relation'];
		$filter_str = array();

		foreach ( $filters as $key => $filter ) {

			// Skip if current element is relation indicator.
			if ( $key === 'relation' ) {
				continue;
			}

			// Invalid filter if it is not an array.
			if ( ! is_array( $filter ) ) {
				return '1=1';
			}

			// Call recursively if there is multi-layer filter detected.
			if ( isset( $filter['relation'] ) ) {
				$filter_str[] = self::parse_user_filters( $class, $filter );
				continue;
			}

			// Invalid filter if it does not contain slug, compare and val indexes.
			$slug    = isset( $filter['slug'] ) ? $filter['slug'] : false;
			$compare = isset( $filter['compare'] ) ? $filter['compare'] : false;
			$val     = isset( $filter['val'] ) || $filter['val'] == null ? $filter['val'] : false;
			if ( ! $slug || ! $compare || $val === false ) {
				return '1=1';
			}

			switch ( $compare ) {
				case '<':
				case '=':
				case '>':
				case '<=':
				case '>=':
					$filter_str[] = $slug . ' ' . $compare . ' \'' . $val . '\'';
					break;
				case 'BETWEEN':
					$filter_str[] = $slug . ' BETWEEN \'' . $val[0] . '\' AND \'' . $val[1] . '\'';
					break;
				case 'IN':
					$filter_str[] = $slug . ' IN ( \'' . implode( '\', \'', $val ) . '\' )';
					break;
				case 'NOT IN':
					$filter_str[] = $slug . ' NOT IN ( \'' . implode( '\', \'', $val ) . '\' )';
					break;
				case 'LIKE':
					$filter_str[] = $slug . ' LIKE  \'%' . $val . '%\' ';
					break;
				case 'NOT LIKE':
					$filter_str[] = $slug . ' NOT LIKE  \'%' . $val . '%\' ';
					break;
				case 'IS':
					$filter_str[] = $slug . ' IS NULL';
					break;
				case 'IS NOT':
					$filter_str[] = $slug . ' IS NOT NULL';
					break;
			}
		}

		return count( $filter_str ) > 1 ?
			'( ' . implode( ' ' . $relation . ' ', $filter_str ) . ' )' :
			$filter_str[0];
	}

	/**
	 * Get order for find method of models
	 *
	 * @param array $filter - filter array.
	 *
	 * @return string
	 */
	public static function parse_order( $filter ) {

		$orderby = isset( $filter['orderby'] ) && $filter['orderby'] ?
			$filter['orderby'] : '';

		if ( ! $orderby ) {
			return '';
		}

		$order = isset( $filter['order'] ) && $filter['order'] ? $filter['order'] : 'ASC';

		return 'ORDER BY ' . $orderby . ' ' . $order . ' ';

	}

	/**
	 * Get order for find method of models
	 *
	 * @param array $filter - filter array.
	 *
	 * @return string
	 */
	public static function parse_limit( $filter ) {

		$items_per_page = isset( $filter['items_per_page'] ) ?
			intval( $filter['items_per_page'] ) : 0;

		if ( $items_per_page == 0 ) {
			return '';
		}

		$page_no = isset( $filter['page_no'] ) && is_numeric( $filter['page_no'] ) ?
			intval( $filter['page_no'] ) : 1;

		$offset = ( $page_no - 1 ) * $items_per_page;

		return 'LIMIT ' . $offset . ', ' . $items_per_page;
	}

	/**
	 * Calculate total pages, has_next_page, results, etc. for models
	 *
	 * @param string $results - page result.
	 * @param int $total_items - total page items.
	 * @param array $filter - filter items.
	 *
	 * @return array
	 */
	public static function parse_response( $results, int $total_items, $filter ) {

		$items_per_page = isset( $filter['items_per_page'] ) ?
			intval( $filter['items_per_page'] ) : 0;

		if ( ! $items_per_page ) {
			return array(
				'total_items' => $total_items,
				'results'     => $results,
			);
		}

		$page_no = isset( $filter['page_no'] ) && is_numeric( $filter['page_no'] ) ?
			intval( $filter['page_no'] ) : 1;

		$total_pages = ceil( $total_items / $items_per_page );

		$has_next_page = $page_no < $total_pages ? 1 : 0;

		return array(
			'total_items'    => $total_items,
			'items_per_page' => $items_per_page,
			'current_page'   => $page_no,
			'total_pages'    => $total_pages,
			'has_next_page'  => $has_next_page,
			'results'        => $results,
		);
	}

	/**
	 * Check whether current use is site admin or not
	 *
	 * @return boolean
	 */
	public static function is_site_admin() {

		global $current_user;

		return $current_user->ID && $current_user->has_cap( 'manage_options' ) ? true : false;
	}

	/**
	 * Sort an array with key
	 *
	 * @param array $array - macro array.
	 * @param array $on - title.
	 * @param array $order - SORT_ASC.
	 *
	 * @return array
	 */
	public static function array_sort( $array, $on, $order = SORT_ASC ) {

		$new_array      = array();
		$sortable_array = array();

		if ( count( $array ) > 0 ) {
			foreach ( $array as $k => $v ) {
				if ( is_array( $v ) ) {
					foreach ( $v as $k2 => $v2 ) {
						if ( $k2 == $on ) {
							$sortable_array[ $k ] = $v2;
						}
					}
				} else {
					$sortable_array[ $k ] = $v;
				}
			}
			switch ( $order ) {
				case SORT_ASC:
					asort( $sortable_array );
					break;
				case SORT_DESC:
					arsort( $sortable_array );
					break;
			}
			foreach ( $sortable_array as $k => $v ) {
				$new_array[ $k ] = $array[ $k ];
			}
		}

		return $new_array;
	}

	/**
	 * Convert date from WP timezone date to UTC equivalant date
	 *
	 * @param string $date_str - date to UTC equivalant date.
	 *
	 * @return DateTime/string
	 */
	public static function get_utc_date_str( $date_str ) {

		$tz   = wp_timezone();
		$date = DateTime::createFromFormat( 'Y-m-d H:i:s', $date_str, $tz );
		$date->setTimezone( new DateTimeZone( '+0000' ) );

		return $date->format( 'Y-m-d H:i:s' );
	}

	/**
	 * Create a random string
	 *
	 * @param integer $length -  random string lenght.
	 *
	 * @return string
	 */
	public static function get_random_string( $length = 8 ) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string     = '';
		for ( $i = 0; $i < $length; $i ++ ) {
			$string .= $characters[ wp_rand( 0, strlen( $characters ) - 1 ) ];
		}

		return $string;
	}

	public static function track_the_visit( $data ) {
		$stop           = false;
		$stop = apply_filters( 'affi_filter_insert_visitor', $stop, $data['affiliate_id'], $data['referral_id'], $data['url'], $data['ip'] );
		if ( $stop ) {
			return 0;
		}

//		$tableHasRef = $wpdb->get_row( "SHOW COLUMNS FROM {$visit_table} LIKE 'ref_url';" );
//		if ( $tableHasRef ) {
//			// insert with ref url
//			$q = $wpdb->prepare( "INSERT INTO $visit_table
//										VALUES(null, %s, %d, %d, %s, %s, %s, %s, %s, %s, %s, null);",
//				$visitor_hash, $referral_id, $affiliate_id, $campaign_name, $ip, $url, $ref_url, $browser, $os_platform, $now );
//		}

		// insert without ref url
		$query    = QueryDB::instance();
		$insertId = $query->insert_tracking_visitor( $data );
		do_action( 'affi_public_action_track_the_visitor', $data );

		return $insertId;
	}

	public static function get_os_platform() {
		$os_platform = esc_html__( "Unknown OS Platform", 'affi-affiliate-marketing-for-woo' );
		if ( $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$os_array = array(
				'/windows nt 10/i'      => 'Windows 10',
				'/windows nt 6.3/i'     => 'Windows 8.1',
				'/windows nt 6.2/i'     => 'Windows 8',
				'/windows nt 6.1/i'     => 'Windows 7',
				'/windows nt 6.0/i'     => 'Windows Vista',
				'/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',
				'/windows nt 5.1/i'     => 'Windows XP',
				'/windows xp/i'         => 'Windows XP',
				'/windows nt 5.0/i'     => 'Windows 2000',
				'/windows me/i'         => 'Windows ME',
				'/win98/i'              => 'Windows 98',
				'/win95/i'              => 'Windows 95',
				'/win16/i'              => 'Windows 3.11',
				'/macintosh|mac os x/i' => 'Mac OS X',
				'/mac_powerpc/i'        => 'Mac OS 9',
				'/linux/i'              => 'Linux',
				'/ubuntu/i'             => 'Ubuntu',
				'/iphone/i'             => 'iPhone',
				'/ipod/i'               => 'iPod',
				'/ipad/i'               => 'iPad',
				'/android/i'            => 'Android',
				'/blackberry/i'         => 'BlackBerry',
				'/webos/i'              => 'Mobile'
			);

			foreach ( $os_array as $regex => $value ) {
				if ( preg_match( $regex, $user_agent ) ) {
					$os_platform = $value;
				}
			}
		}

		return $os_platform;
	}

	protected function get_device_type() {
//		if (!class_exists('MobileDetect')){
//			require AffiEnv::get('url') . 'classes/MobileDetect.php';
//		}
//		$detect = new MobileDetect();
//		if (($detect->isMobile()) || ($detect->isTablet())){
//			return 'mobile';
//		}
//		return 'web';
	}
}


