<?php
namespace Actirise\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use WP_Error;
use WP_Filesystem_Base;
use DateTime;
use DateTimeZone;
use Actirise\Includes\Options;

/**
 * Helpers class.
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/includes
 * @author     actirise <wordpress@actirise.com>
 */
class Helpers {
	/**
	 * Get page type.
	 *
	 * @since 2.0.0
	 * @return string
	 */
	public static function get_page_type() {
		$page_type = 'notfound';

		if ( is_home() || is_front_page() ) {
			$page_type = 'home';
		} elseif ( is_page() ) {
			$page_type = 'page';
		} elseif ( is_single() ) {
			$page_type = 'article';
		} elseif ( is_category() ) {
			$page_type = 'category';
		} elseif ( is_tag() ) {
			$page_type = 'tag';
		} elseif ( is_tax() ) {
			$page_type = 'tax';
		} elseif ( is_archive() ) {
			$page_type = 'archive';
		} elseif ( is_search() ) {
			$page_type = 'search';
		} elseif ( is_404() ) {
			$page_type = 'notfound';
		}

		return $page_type;
	}

	/**
	 * Get page url.
	 *
	 * @since 2.0.0
	 * @return string
	 */
	public static function get_url() {
		return esc_url_raw( self::get_server_details()['host'] . self::get_server_details()['uri'] );
	}

	/**
	 * Get all options for FastCmp
	 *
	 * @since 2.2.0
	 * @param bool $light If true, return only the light options.
	 * @return array{name: string, enabled: boolean, headOffice: string, logo: string, privacyPolicy: string, targetedAudience: string, excludedIabVendors: array<int>, excludedGoogleVendors: array<int>, stubLight: string, vendors: array<mixed>, uuid: string, customsVendor: array{name: string, id: string}, acceptButtonStyle: array{bg: string, font: string}, declineButtonStyle: array{bg: string, font: string, border: string}, parametersButtonStyle: array{bg: string, font: string, border: string}, customStyle: string}
	 */
	public static function get_fastcmp_options( $light ) {
		$default_country_code = substr( get_bloginfo( 'language', 'raw' ), 3 );

		/** @var string $image */
		$image = Options::get( 'fastcmp-logo', '' );

		if ( $image === '' ) {
				/** @var int|boolean $logo_id */
			$logo_id = get_theme_mod( 'custom_logo' );

			if ( $logo_id ) {
				/** @var int $logo_id */
				$image_attachment = wp_get_attachment_image_src( $logo_id, 'full' );

				if ( $image_attachment !== false && count( $image_attachment ) > 0 ) {
					/** @var string $image */
					$image = $image_attachment[0];
				}
			}
		}

		$privacy_policy_option = Options::get( 'fastcmp-privacypolicy', '' );
		if ( function_exists( 'get_privacy_policy_url' ) ) {
			/** @var string $privacy_policy */
			$privacy_policy = get_privacy_policy_url();
		} else {
			$privacy_policy = '';
		}

		/** @var string $privacy_policy */
		$privacy_policy = $privacy_policy_option === '' ? $privacy_policy : $privacy_policy_option;
		/** @var string $name */
		$name = Options::get( 'fastcmp-name', get_bloginfo( 'name', 'raw' ) );
		/** @var boolean $enabled */
		$enabled = Options::get( 'fastcmp-enabled', 'false' ) === true;
		/** @var string $head_office */
		$head_office = Options::get( 'fastcmp-headoffice', $default_country_code );
		/** @var array<int> $excluded_iab_vendors */
		$excluded_iab_vendors = Options::get( 'fastcmp-excludediabvendors', array() );
		/** @var array<int> $excluded_google_vendors */
		$excluded_google_vendors = Options::get( 'fastcmp-excludedgooglevendors', array() );
		/** @var string $stub_light */
		$stub_light = Options::get( 'fastcmp-stub-light', '' );
		/** @var string $targeted_audience */
		$targeted_audience = Options::get( 'fastcmp-targetedaudience', 'tcfeuv2' );
		/** @var array<mixed> $vendors */
		$vendors = $light ? array() : Options::get( 'fastcmp-vendors', array() );
		/** @var string $uuid */
		$uuid = Options::get( 'fastcmp-uuid', '' );
		/** @var array{name: string, id: string} $customs_vendor */
		$customs_vendor = Options::get( 'fastcmp-customsvendor', array() );
		/** @var array{bg: string, font: string} $accept_button_style */
		$accept_button_style = Options::get(
			'fastcmp-acceptButtonStyle',
			array(
				'bg'   => '#0071f2',
				'font' => '#ffffff',
			)
		);
		/** @var string $accept_button_style_string */
		$accept_button_style_string = wp_json_encode( $accept_button_style );
		/** @var array{bg: string, font: string} $accept_button_style */
		$accept_button_style = json_decode( $accept_button_style_string, true );

		/** @var array{bg: string, font: string, border: string} $decline_button_style */
		$decline_button_style = Options::get(
			'fastcmp-declineButtonStyle',
			array(
				'bg'     => 'transparent',
				'font'   => '#0071f2',
				'border' => '#0071f2',
			)
		);
		/** @var string $decline_button_style_string */
		$decline_button_style_string = wp_json_encode( $decline_button_style );
		/** @var array{bg: string, font: string, border: string} $decline_button_style */
		$decline_button_style = json_decode( $decline_button_style_string, true );

		/** @var array{bg: string, font: string, border: string} $parameters_button_style */
		$parameters_button_style = Options::get(
			'fastcmp-parametersButtonStyle',
			array(
				'bg'     => 'transparent',
				'font'   => '#0071f2',
				'border' => '#0071f2',
			)
		);
		/** @var string $parameters_button_style_string */
		$parameters_button_style_string = wp_json_encode( $parameters_button_style );
		/** @var array{bg: string, font: string, border: string} $parameters_button_style */
		$parameters_button_style = json_decode( $parameters_button_style_string, true );

		/** @var string $custom_style */
		$custom_style = Options::get( 'fastcmp-customStyle', '' );

		return array(
			'name'                  => $name,
			'enabled'               => $enabled,
			'headOffice'            => $head_office,
			'logo'                  => $image,
			'privacyPolicy'         => $privacy_policy,
			'targetedAudience'      => $targeted_audience,
			'excludedIabVendors'    => $excluded_iab_vendors,
			'excludedGoogleVendors' => $excluded_google_vendors,
			'customsVendor'         => $customs_vendor,
			'stubLight'             => $stub_light,
			'vendors'               => $vendors,
			'uuid'                  => $uuid,
			'acceptButtonStyle'     => $accept_button_style,
			'declineButtonStyle'    => $decline_button_style,
			'parametersButtonStyle' => $parameters_button_style,
			'customStyle'           => $custom_style,
		);
	}

	/**
	 * Get server details.
	 *
	 * @since 2.3.0
	 * @return array<string>
	 */
	public static function get_server_details() {
		$data = array();

		$data['host']   = isset( $_SERVER['HTTP_HOST'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) : '';
		$data['scheme'] = isset( $_SERVER['REQUEST_SCHEME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_SCHEME'] ) ) : '';
		$data['uri']    = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$data['method'] = isset( $_SERVER['REQUEST_METHOD'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) : '';

		if ( $data['host'] !== '' ) {
			/** @var string $host */
			$host         = preg_replace( '/^www\.(.*)$/', '$1', strtolower( $data['host'] ) );
			$data['host'] = $host;
		}

		return $data;
	}

	/**
	 * Check if plugin auto update is active.
	 *
	 * @since    2.4.0
	 * @return bool
	 */
	public static function has_auto_update() {
		/** @var string $plugin_file */
		$plugin_file = plugin_basename( ACTIRISE_FILE );
		/** @var array<string> $auto_updates */
		$auto_updates = get_site_option( 'auto_update_plugins', array() );
		/** @var bool $auto_updates_enabled */
		$auto_updates_enabled = in_array( $plugin_file, $auto_updates, true );

		return $auto_updates_enabled;
	}

	/**
	 * Get all custom value.
	 *
	 * @since    2.0.0
	 * @param    string $type_custom The type of custom.
	 * @param    string $custom_name The name of custom.
	 * @return   string
	 */
	public static function get_custom_value( $type_custom, $custom_name ) {
		$value = '';

		if ( is_home() || is_front_page() ) {
			return '';
		}

		if ( $type_custom !== '' ) {
			$custom_exploded = explode( '_', $type_custom, 2 );
			$type_custom_key = $custom_exploded[0];
			$level_custom    = '0';
			$key             = $custom_exploded[1];

			if ( $type_custom_key === 'category' || $type_custom_key === 'tag' ) {
				$custom_exploded = explode( '_', $type_custom, 3 );
				$level_custom    = $custom_exploded[1];
				$key             = $custom_exploded[2];
			}

			$post_id    = get_the_ID();
			$post_value = get_post( ! $post_id ? null : $post_id );

			if ( ! $post_value || ! $post_id ) {
				$value = '';
			} else {
				switch ( $type_custom_key ) {
					case 'post':
						if ( is_single() || is_page() ) {
							if ( $post_value->$key ) {
								$value = $post_value->$key;
							}
						}
						break;
					case 'category':
						$category = get_the_category();

						if ( $category && isset( $category[ $level_custom ] ) ) {
							$value = $category[ $level_custom ]->$key;
						}
						break;
					case 'tag':
						$tags = get_the_tags( $post_id );

						if ( $tags && ! is_wp_error( $tags ) && isset( $tags[ $level_custom ] ) ) {
							$value = $tags[ $level_custom ]->$key;
						}

						break;
					case 'author':
						if ( is_single() || is_page() ) {
							/** @var int $author_id */
							$author_id = $post_value->post_author;
							/** @var string $value */
							$value = get_the_author_meta( 'display_name', $author_id );

							if ( $value === '' ) {
								/** @var string $value */
								$value = get_the_author_meta( $key, $author_id );
							}
						}
						break;
					case 'customFields':
						/** @var string $value */
						$value = get_post_meta( $post_id, $key, true );

						break;
					default:
						$value = '';
						break;
				}
			}
		}

		$filter_name = 'actirise_' . $custom_name . '_value';

		/** @var string|null $filter_value */
		$filter_value = apply_filters( $filter_name, $value );

		if ( ! empty( $filter_value ) ) {
			/** @var string $filter_value */
			return sanitize_text_field( $filter_value );
		}

		return $value;
	}

	/**
	 * Get WordPress filesystem.
	 *
	 * @since 2.5.0
	 * @return WP_Filesystem_Base|WP_Error
	 */
	public static function get_wp_fs() {
		global $wp_filesystem;

		if ( ! $wp_filesystem instanceof WP_Filesystem_Base ) {
			$initialized = self::init_wp_fs();

			if ( false === $initialized ) {
				return new WP_Error( 'WP_FS_HELPER', 'The WordPress filesystem could not be initialized.' );
			}
		}

		return $wp_filesystem;
	}

	/**
	 * Init WP_Filesystem.
	 *
	 * @since 2.5.0
	 * @return bool
	 */
	protected static function init_wp_fs() {
		global $wp_filesystem;

		if ( $wp_filesystem instanceof WP_Filesystem_Base ) {
			return true;
		}

		require_once ABSPATH . 'wp-admin/includes/file.php';

		$method      = get_filesystem_method();
		$initialized = false;

		if ( 'direct' === $method ) {
			$initialized = WP_Filesystem();
		} elseif ( false !== $method ) {
			// See https://core.trac.wordpress.org/changeset/56341.
			ob_start();
			$credentials = request_filesystem_credentials( '' );
			ob_end_clean();

			$initialized = $credentials && WP_Filesystem( $credentials );
		}

		return is_null( $initialized ) ? false : $initialized;
	}

	/**
	 * Generate a random token in uuid v4 format
	 *
	 * @since 2.5.5
	 * @param  string $prefix
	 * @return string
	 */
	public static function generate_token( $prefix = '' ) {
		$uid = uniqid( '', true );
		$uid = str_replace( '.', '', $uid );

		$uid = str_shuffle( $uid );

		$uuid = sprintf(
			'%05s-%05s-%05d-%05d',
			substr( $uid, 0, 5 ),
			substr( $uid, 5, 5 ),
			( hexdec( substr( $uid, 10, 5 ) ) & 0x0fff ) | 0x5000,
			( hexdec( substr( $uid, 15, 5 ) ) & 0x3fff ) | 0x5000
		);

		return $prefix . $uuid;
	}

	/**
	 * Hash token for API request
	 *
	 * @since 2.5.5
	 * @param string $token
	 * @return string
	 */
	public static function hash_token( $token = '' ) {
		/** @var string $domain */
		$domain = self::get_server_details()['host'];
		/** @var string $datetime */
		$datetime = ( new DateTime( 'now', new DateTimeZone( 'UTC' ) ) )->format( 'Y-m-d' );
		/** @var string $concatenated_string */
		$concatenated_string = $token . $domain . $datetime;

		return md5( $concatenated_string );
	}
}
