<?php

namespace AffiAffiliate\Frontend;

use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;

class TrackingVisits {
	protected static $instance = null;

	protected $c_check_name = 'affi_referral';
	protected $settings = array();
	public $query;

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct() {

		$this->settings = Data::instance();
		$this->query = QueryDB::instance();
		$current_url    = AffiEnv::get( 'protocol' );
		$current_url    = isset( $_SERVER['HTTP_HOST'] ) ? $current_url . sanitize_text_field( $_SERVER['HTTP_HOST'] ) : $current_url;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$current_url    = isset( $_SERVER['REQUEST_URI'] ) ? $current_url . sanitize_text_field( $_SERVER['REQUEST_URI'] ) : $current_url;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$base_prefix    = $this->settings->get_param( 'base_prefix' );

		// NO Referral Variable
		if ( ! $base_prefix ) {
			return;
		}

		if ( $this->settings->get_param( 'blocked_referers' ) && isset( $_SERVER['HTTP_REFERER'] ) ) {
			$url_referer        = sanitize_text_field( $_SERVER['HTTP_REFERER'] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			$block_referer_urls = preg_split( "/(\r\n|\n|\r)/", $this->settings->get_param( 'affi_blocked_referers' ) );
			$search_block       = in_array( $url_referer, $block_referer_urls );

			if ( $search_block ) {
				return;
			}
		}

		$get_value        = '';
		$campaign         = '';
		$affIdLandingPage = apply_filters( 'affi_init_affiliate_url_id_value', '', $current_url );

		// SET THE REFERRAL & CAMPAIGN
		if ( ! empty( $_GET[ $base_prefix ] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			/// REFERRAL
			$get_value   = sanitize_text_field( $_GET[ $base_prefix ] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.NonceVerification.Recommended
			$current_url = remove_query_arg( $base_prefix, $current_url );

			// CAMPAIGN
//			if ( $this->settings->get_param( 'campaign_variable' ) && ! empty( $_GET[ $this->settings->get_param( 'campaign_variable' ) ] ) ) {
//				$campaign    = sanitize_text_field( $_GET[ $this->settings->get_param( 'campaign_variable' ) ] );
//				$current_url = remove_query_arg( $this->settings->get_param( 'campaign_variable' ), $current_url );// remove param from url
//			}
		} else if ( strpos( $current_url, '/' . $base_prefix . '/' ) !== false ) {
			$temp_get = explode( '/', $current_url );
			if ( is_array( $temp_get ) && count( $temp_get ) ) {
				/// REFERRAL
				$search_key = array_search( $base_prefix, $temp_get );

				if ( $search_key ) {
					$key = $search_key + 1;
					if ( isset( $temp_get[ $key ] ) ) {
						$get_value   = $temp_get[ $key ];
						$current_url = str_replace( '/' . $base_prefix . '/' . $get_value, '', $current_url );
					}
				}

				// CAMPAIGN
				if ( strpos( $current_url, '/' . $this->settings->get_param( 'campaign_variable' ) . '/' ) !== false ) {
					$search_key = array_search( $this->settings->get_param( 'campaign_variable' ), $temp_get );
					if ( $search_key ) {
						$key = $search_key + 1;
						if ( isset( $temp_get[ $key ] ) ) {
							$campaign    = $temp_get[ $key ];
							$current_url = str_replace( '/' . $this->settings->get_param( 'campaign_variable' ) . '/' . $campaign, '', $current_url );
						}
					}
				}
				$force_redirect = true;
			}
		} else if ( $this->settings->get_param( 'encode_link' ) ) {
			$http_ref = isset( $_SERVER['HTTP_REFERER'] ) ? sanitize_text_field( $_SERVER['HTTP_REFERER'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			if ( $http_ref ) {
				$get_value = self::get_uid_by_encode_link( $http_ref );
			}
		}

		if ( empty( $get_value ) && empty( $affIdLandingPage ) ) {
			return;
		}

		$affiliate_id = $this->getAffiliateId( $get_value );

		// landing pages
		if ( empty( $affiliate_id ) && ! empty( $affIdLandingPage ) ) {
			$affiliate_id = $affIdLandingPage;
		}

		// change the cookie name. Used in Split Commission
		$this->c_check_name = apply_filters( 'affi_public_filter_change_c_check_name', $this->c_check_name, $affiliate_id );

		$rewrite_referrals_enable = $this->settings->get_param( 'rewrite_referrals' );

		$saved_cookie = $this->settings->getcookie( $this->c_check_name );

		if ( $saved_cookie && empty( $rewrite_referrals_enable ) ) {
			if ( $this->settings->get_param( 'redirect_without_param' ) || ! empty( $force_redirect ) ) {
				$this->do_redirect( $current_url );
			}

			return;
		}

		if ( ! $saved_cookie ) {
			$referral_hash = isset( $_SERVER['REMOTE_ADDR'] ) ? md5( sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) . time() ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		} else {
			$cookie_data = unserialize( stripslashes( $saved_cookie ) );
			if ( ! empty( $cookie_data['referral_hash'] ) ) {
				$referral_hash = $cookie_data['referral_hash'];
			}
		}

		$browser     = $this->get_browser();
		$os_platform = AFFunctions::get_os_platform();
		$ip          = ( ! isset( $_SERVER['REMOTE_ADDR'] ) || empty( $_SERVER['REMOTE_ADDR'] ) ) ? '' : sanitize_text_field( $_SERVER['REMOTE_ADDR'] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput

		if ( $this->query->is_affiliate_active( $affiliate_id ) ) {
			$ref_url  = isset( $_SERVER['HTTP_REFERER'] ) ? sanitize_text_field( $_SERVER['HTTP_REFERER'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			$visit_id = AFFunctions::track_the_visit( [
//					'referral_hash' => $referral_hash,
				'referral_id'  => 0,
				'affiliate_id' => $affiliate_id,
				'url'          => $current_url,
				'ip'           => $ip,
				'os_platform'  => $os_platform,
				'browser'      => $browser,
				'campaign'     => $campaign,
//					'ref_url'      => $ref_url,
				'date'         => current_time( 'U' )
			] );
			if ( ! $visit_id ) {
				return;
			}
			// SET COOKIE
			$this->set_cookie( $affiliate_id, $campaign, $referral_hash, $visit_id );
			if ( ! empty( $affIdLandingPage ) && $affIdLandingPage == $affiliate_id ) {
				return;
			}

			// REDIRECT
			if ( $this->settings->get_param( 'redirect_without_param' ) ) {
				$this->do_redirect( $current_url );
			}
		}

		// FORCE REDIRECT - FOR FRIENDLY LINKS
		if ( ! empty( $force_redirect ) ) {
			$this->do_redirect( $current_url );
		}
	}


	/**
	 * @param string
	 *
	 * @return int
	 */
	protected function getAffiliateId( $getValue = '' ) {
		global $indeed_db;
		$affiliateId = 0;

		if ( $this->settings->get_param( 'affiliate_link_format' ) == 'username' ) {
			$getValue = urldecode( $getValue );
//				$affiliateId = $indeed_db->get_affiliate_id_by_custom_slug( $getValue );
			$affiliateId = $this->query->get_affiliate_id_by_username( $getValue );
		} else {
			if ( is_numeric( $getValue ) ) {
				$affiliateId = $getValue;
			}
		}

		if ( ! empty( $affiliateId ) ) {
			return $affiliateId;
		}

		// check if the value from $getValue is actually an affiliate id
		if ( $getValue != '' && is_numeric( $getValue ) && $this->query->is_affiliate_active( $getValue ) ) {
			return $getValue;
		}

		if ( $this->settings->get_param( 'affiliate_link_format' ) == 'username' ) {
			if ( is_numeric( $getValue ) ) {
				$affiliateId = $getValue;
			}
		} else {
			$getValue    = urldecode( $getValue );
			$affiliateId = $this->query->get_affiliate_id_by_username( $getValue );
		}

		return $affiliateId;
	}


	protected function do_redirect( $target_url = '' ) {
		// check if original url is the with target url in order to prevent infinite loop
		$originalUrl = AffiEnv::get( 'protocol' );
		$originalUrl    = isset( $_SERVER['HTTP_HOST'] ) ? $originalUrl . sanitize_text_field( $_SERVER['HTTP_HOST'] ) : $originalUrl;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$originalUrl    = isset( $_SERVER['REQUEST_URI'] ) ? $originalUrl . sanitize_text_field( $_SERVER['REQUEST_URI'] ) : $originalUrl;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput

		if ( $target_url === $originalUrl ) {
			return;
		}

		wp_safe_redirect( $target_url );
		exit();
	}

	protected function set_cookie( $affiliate_id = 0, $campaign = '', $referral_hash = '', $visit_id = 0 ) {
		//pay per click
//		if ( ! $this->settings->getcookie( $this->c_check_name ) ) {
//			do_action( 'affi_insert_into_cookie_new_affiliate', $affiliate_id );
//		} else {
//			$cookieData = unserialize( stripslashes( $this->settings->getcookie( $this->c_check_name ) ) );
//			if ( $cookieData['affiliate_id'] != $affiliate_id ) {
//				do_action( 'affi_insert_into_cookie_new_affiliate', $affiliate_id );
//			}
//		}

		$data['affiliate_id']  = $affiliate_id;
		$data['campaign']      = $campaign;
		$data['referral_hash'] = $referral_hash;
		$data['visit_id']      = $visit_id;
		$data['timestamp']     = time();
		$data['site_referer']  = ( empty( $_SERVER['HTTP_REFERER'] ) ) ? '' : sanitize_text_field( $_SERVER['HTTP_REFERER'] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$cookie_time           = $this->settings->get_param( 'cookie_expire' );//day format

		if ( empty( $cookie_time ) ) {
			$cookie_time = $data['timestamp'] + 360 * 24 * 60 * 60;
		} else {
			$cookie_time = $data['timestamp'] + intval( $cookie_time ) * 24 * 60 * 60;
		}
		$path = '/';
		if ( is_multisite() && $this->settings->get_param( 'cookie_sharing' ) == '0' ) {
			$path = isset( $_SERVER['HTTP_HOST'] ) ? sanitize_text_field( $_SERVER['HTTP_HOST'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		}

		$this->settings->setcookie( $this->c_check_name, serialize( $data ), $cookie_time, $path );

		return $data['referral_hash'];
	}


	protected function get_browser() {
		/*
		 * @param none
		 * @return string
		 */
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			if ( preg_match( '/MSIE/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) &&// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			     ! preg_match( '/Opera/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				return 'Internet Explorer';
			} else if ( preg_match( '/Firefox/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				return 'Firefox';
			} else if ( preg_match( '/Chrome/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				return 'Chrome';
			} else if ( preg_match( '/Safari/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				return 'Safari';
			} else if ( preg_match( '/Opera/i', sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				return 'Opera';
			} else {
				return 'Other';
			}
		}

		return '';
	}

	protected function get_device_type() {
		/*
		 * @param none
		 * @return string
		 */
		if ( ! class_exists( 'MobileDetect' ) ) {
			require UAP_PATH . 'classes/MobileDetect.php';
		}

		$detect = new MobileDetect();
		if ( ( $detect->isMobile() ) || ( $detect->isTablet() ) ) {
			return 'mobile';
		}

		return 'web';
	}

	protected function get_uid_by_encode_link( $encode_link ) {

		return $encode_link;
	}
}