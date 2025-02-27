<?php
/**
 * Plugin Name: Easy Populate Posts
 * Plugin URI:  https://iuliacazan.ro/easy-populate-posts/
 * Description: Populate your site with randomly generated content, by configuring the post type, content, excerpt, tags, custom fields, terms, images, publish date, status, parent, author, sticky, etc.
 * Text Domain: spp
 * Domain Path: /langs
 * Version:     4.4.1
 * Author:      Iulia Cazan
 * Author URI:  https://profiles.wordpress.org/iulia-cazan
 * Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ
 * License:     GPL2
 *
 * @package spp
 *
 * Copyright (C) 2015-2024 Iulia Cazan
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

declare( strict_types = 1 );

define( 'SPP_PLUGIN_VERSION', 4.41 );
define( 'SPP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SPP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SPP_PLUGIN_SLUG', 'spp' );

/**
 * The main class.
 */
class SISANU_Popupate_Posts {

	const PLUGIN_NAME        = 'Easy Populate Posts';
	const PLUGIN_SUPPORT_URL = 'https://wordpress.org/support/plugin/easy-populate-posts/';
	const PLUGIN_TRANSIENT   = 'spp-plugin-notice';

	/**
	 * Class instance.
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Class instance.
	 *
	 * @var object
	 */
	public static $max_random = 30;

	/**
	 * Plugin exclude post types.
	 *
	 * @var array
	 */
	public static $exclude_post_type = [];

	/**
	 * Plugin allowed post types.
	 *
	 * @var array
	 */
	public static $allowed_post_types = [];

	/**
	 * Plugin allowed post statuses.
	 *
	 * @var array
	 */
	public static $allowed_post_statuses = [];

	/**
	 * Plugin allowed taxonomies.
	 *
	 * @var array
	 */
	public static $allowed_taxonomies = [];

	/**
	 * Plugin exclude taxonomies.
	 *
	 * @var array
	 */
	public static $exclude_tax_type = [];

	/**
	 * Plugin admin page URL.
	 *
	 * @var string
	 */
	public static $plugin_url = '';

	/**
	 * Plugin default settings.
	 *
	 * @var array
	 */
	public static $default_settings = [];

	/**
	 * Plugin current settings.
	 *
	 * @var array
	 */
	public static $settings = [];

	/**
	 * Plugin current settings groups.
	 *
	 * @var array
	 */
	public static $settings_groups = [];

	/**
	 * Get active object instance.
	 *
	 * @return object
	 */
	public static function get_instance() { // phpcs:ignore
		if ( ! self::$instance ) {
			self::$instance = new SISANU_Popupate_Posts();
		}
		return self::$instance;
	}

	/**
	 * Class constructor
	 *
	 * @access public
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Run action and filter hooks.
	 *
	 * @access private
	 */
	private function init() {
		$class = get_called_class();
		add_action( 'init', [ $class, 'load_plugin_settings' ], 99 );

		// Text domain load.
		add_action( 'after_setup_theme', [ $class, 'load_textdomain' ], 20 );
		add_action( 'admin_init', [ $class, 'add_admin_filters' ], 99 );

		if ( is_admin() ) {
			add_action( 'admin_menu', [ $class, 'admin_menu' ] );
			add_action( 'admin_enqueue_scripts', [ $class, 'load_assets' ] );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ $class, 'plugin_action_links' ] );
			add_action( 'wp_ajax_spp_save_settings', [ $class, 'spp_save_settings' ] );
			add_action( 'wp_ajax_spp_populate', [ $class, 'spp_populate' ] );
			add_action( 'wp_ajax_spp_pattern_test', [ $class, 'spp_pattern_test' ] );
			add_action( 'wp_ajax_spp_groups_list', [ $class, 'display_groups' ] );
			add_filter( 'spp_filter_acf_fields', [ $class, 'filter_acf_fields' ] );
			add_filter( 'spp_filter_post_meta', [ $class, 'filter_post_meta' ] );
			add_action( 'wp_ajax_spp_max_tax_listing', [ $class, 'spp_max_tax_listing' ] );
			add_action( 'wp_ajax_spp_max_meta_listing', [ $class, 'spp_max_meta_listing' ] );
		}

		add_action( 'admin_notices', [ $class, 'plugin_admin_notices' ] );
		add_action( 'wp_ajax_plugin-deactivate-notice-spp', [ $class, 'plugin_admin_notices_cleanup' ] );
		add_action( 'plugins_loaded', [ $class, 'plugin_ver_check' ] );
		add_action( 'added_post_meta', [ $class, 'reset_spp_meta_list' ] );
		add_action( 'updated_post_meta', [ $class, 'reset_spp_meta_list' ] );
		add_action( 'deleted_post_meta', [ $class, 'reset_spp_meta_list' ] );
		add_action( 'spp_after_post_image_attached', [ $class, 'spp_after_post_image_attached' ], 10, 4 );
		add_action( 'spp_after_post_processed', [ $class, 'spp_after_post_processed' ], 10, 4 );
	}

	/**
	 * Load the plugin settings.
	 */
	public static function load_plugin_settings() {
		self::get_plugin_settings();
		self::get_allowed_post_types();
		self::get_allowed_post_statuses();
		self::get_allowed_taxonomies();
	}

	/**
	 * Prepare the plugin settings.
	 */
	public static function get_plugin_settings() {
		self::$plugin_url        = admin_url( 'tools.php?page=populate-posts-settings' );
		self::$exclude_post_type = [
			'nav_menu_item',
			'revision',
			'attachment',
			'custom_css',
			'customize_changeset',
			'oembed_cache',
			'user_request',
			'wp_block',
			'wp_template',
			'wp_global_styles',
			'wp_template_part',
			'wp_navigation',
			'elementor_library',
			'wp_font_family',
			'wp_font_face',
			'patterns_ai_data',
		];

		self::$exclude_tax_type = [
			'nav_menu',
			'link_category',
			'post_format',
			'wp_template_part_area',
			'wp_theme',
			'elementor_library_type',
			'elementor_library_category',
			'wp_pattern_category',
		];

		$upload_dir = wp_upload_dir();
		$initial    = [];
		for ( $i = 1; $i <= 10; $i++ ) {
			$initial[] = plugins_url( '/assets/images/sample' . $i . '.jpg', __FILE__ );
		}

		$images_initial_string  = implode( chr( 13 ), $initial );
		self::$default_settings = [
			'post_type'             => 'post',
			'content_type'          => 0,
			'excerpt'               => 0,
			'date_type'             => 1,
			'has_sticky'            => 2,
			'max_number'            => 10,
			'content_p'             => 0,
			'meta_key'              => '', // phpcs:ignore
			'meta_value'            => '', // phpcs:ignore
			'meta_key2'             => '',
			'meta_value2'           => '',
			'meta_key3'             => '',
			'meta_value3'           => '',
			'meta_key4'             => '',
			'meta_value4'           => '',
			'meta_key5'             => '',
			'meta_value5'           => '',
			'taxonomy'              => '',
			'term_id'               => '',
			'term_slug'             => '',
			'taxonomy2'             => '',
			'term_id2'              => '',
			'term_slug2'            => '',
			'title_prefix'          => '',
			'post_author'           => '',
			'post_parent'           => '',
			'specific_date'         => '',
			'specific_hour'         => '',
			'specific_status'       => '',
			'initial_images'        => $images_initial_string,
			'images_list'           => '',
			'images_path'           => '',
			'legacy_images_path'    => $upload_dir['basedir'] . '/spp_tmp/',
			'start_counter'         => 0,
			'cleanup_on_deactivate' => 0,
			'gutenberg_block'       => 0,
			'gutenberg_template'    => '',
			'all_images'            => [],
			'random_no_image'       => 0,
			'max_tax'               => 3,
			'max_meta'              => 5,
		];

		$settings = get_option( 'spp_settings', [] );
		if ( ! is_array( $settings ) ) {
			$settings = [];
		}

		$settings['default_images'] = self::$default_settings['initial_images'];
		self::$settings             = wp_parse_args( $settings, self::$default_settings );
		self::$settings_groups      = get_option( 'spp_settings_groups', [] );

		if ( ! empty( self::$settings['tags_list'] ) ) {
			self::prepare_the_settings();
		}
	}

	/**
	 * Unify settings for backward compatibility.
	 */
	public static function prepare_the_settings() {
		$opt  = self::$settings;
		$list = [];
		$max  = self::sanitize_max_value( $opt['max_tax'] ?? 0 );
		for ( $i = 1; $i <= $max; ++$i ) {
			$p = 1 === $i ? '' : $i;
			if ( ! empty( $opt[ 'term_slug' . $p ] ) || ! empty( $opt[ 'term_id' . $p ] ) ) {
				$list[] = [
					'tax'  => $opt[ 'taxonomy' . $p ],
					'rand' => $opt[ 'term_rand' . $p ],
					'slug' => $opt[ 'term_slug' . $p ],
					'id'   => $opt[ 'term_id' . $p ],
				];
			}
		}
		array_unshift( $list, [
			'tax'  => 'post_tag',
			'rand' => 0,
			'slug' => self::$settings['tags_list'],
			'id'   => '',
		] );

		if ( count( $list ) > $max ) {
			$opt['max_tax'] = count( $list );
		}

		foreach ( $list as $i => $tax ) {
			$p = 0 === (int) $i ? '' : $i + 1;

			$opt[ 'taxonomy' . $p ]  = $tax['tax'];
			$opt[ 'term_rand' . $p ] = $tax['rand'];
			$opt[ 'term_slug' . $p ] = $tax['slug'];
			$opt[ 'term_id' . $p ]   = $tax['id'];
		}

		unset( $opt['tags_list'] );
		self::$settings = $opt;
	}

	/**
	 * Load the plugin assets.
	 */
	public static function load_assets() {
		$current_screen = \get_current_screen();
		if ( empty( $current_screen->id ) || 'tools_page_populate-posts-settings' !== $current_screen->id ) {
			// Fail-fast, we only add assets to this page.
			return;
		}

		include_once __DIR__ . '/inc/assets.php';
	}

	/**
	 * Load text domain for internalization.
	 */
	public static function load_textdomain() {
		load_plugin_textdomain( 'spp', false, basename( __DIR__ ) . '/langs' );
	}

	/**
	 * Maybe reset cache.
	 */
	public static function maybe_reset_cache() {
		$list = [ 'ssp-post-meta-list' ];
		if ( ! empty( $list ) ) {
			foreach ( $list as $item ) {
				delete_transient( $item );
			}
		}
		self::reset_spp_meta_list();
	}

	/**
	 * Set the class property for all the post types registered in the application.
	 */
	public static function get_allowed_post_types() {
		$post_types = get_post_types( [], 'objects' );
		if ( ! empty( $post_types ) && ! empty( self::$exclude_post_type ) ) {
			foreach ( self::$exclude_post_type as $k ) {
				unset( $post_types[ $k ] );
			}
		}
		self::$allowed_post_types = wp_list_pluck( $post_types, 'label', 'name' );
	}

	/**
	 * Set the class property for of all the post statuses registered in the application.
	 */
	public static function get_allowed_post_statuses() {
		global $wp_post_statuses;
		$post_status = $wp_post_statuses;
		unset( $post_status['auto-draft'] );
		unset( $post_status['trash'] );
		unset( $post_status['inherit'] );
		unset( $post_status['request-pending'] );
		unset( $post_status['request-confirmed'] );
		unset( $post_status['request-failed'] );
		unset( $post_status['request-completed'] );
		self::$allowed_post_statuses = apply_filters(
			'spp_filter_post_statuses',
			wp_list_pluck( $post_status, 'label', 'name' )
		);
	}

	/**
	 * Set the class property for of all the taxonomies registered in the application.
	 */
	public static function get_allowed_taxonomies() {
		$tax = get_taxonomies( [], 'objects' );
		if ( ! empty( $tax ) && ! empty( self::$exclude_tax_type ) ) {
			foreach ( self::$exclude_tax_type as $k ) {
				unset( $tax[ $k ] );
			}
		}
		self::$allowed_taxonomies = apply_filters(
			'spp_filter_post_taxonomies',
			wp_list_pluck( $tax, 'label', 'name' )
		);
	}

	/**
	 * Filter ACF fields.
	 *
	 * @param  array $the_list The ACF fields list.
	 * @return array
	 */
	public static function filter_acf_fields( array $the_list = [] ): array {
		global $wpdb;
		$the_list = $wpdb->get_results( $wpdb->prepare( // phpcs:ignore
			' SELECT DISTINCT post_title as `name`, post_excerpt as `slug` FROM ' . $wpdb->posts . '
			WHERE 1 = %d AND post_type = %s AND post_status = %s
			AND post_title != %s
			ORDER BY post_title ASC ',
			1,
			'acf-field',
			'publish',
			''
		) );
		if ( ! empty( $the_list ) ) {
			return $the_list;
		}

		return [];
	}

	/**
	 * Filter post meta.
	 *
	 * @param  array $the_list The post meta list.
	 * @return array
	 */
	public static function filter_post_meta( array $the_list = [] ): array {
		global $wpdb;
		$the_list = $wpdb->get_col( $wpdb->prepare( // phpcs:ignore
			' SELECT DISTINCT meta_key FROM ' . $wpdb->postmeta . '
			WHERE 1 = %d AND meta_key NOT BETWEEN %s AND %s HAVING meta_key NOT LIKE %s
			ORDER BY meta_key ASC ',
			1, '_', '_z', $wpdb->esc_like( '_' ) . '%'
		) );
		if ( ! empty( $the_list ) ) {
			$the_list = array_diff( $the_list, [
				'spp_sample',
				'spp_sample_url',
				'_',
				'_encloseme',
				'_edit_last',
				'_edit_lock',
				'_wp_trash_meta_status',
				'_wp_trash_meta_time',
				'_customize_changeset_uuid',
				'_customize_draft_post_name',
				'_customize_restore_dismissed',
				'_menu_item_classes',
				'_menu_item_menu_item_parent',
				'_menu_item_object',
				'_menu_item_object_id',
				'_menu_item_type',
				'_menu_item_url',
			] );

			return $the_list;
		}

		return [];
	}

	/**
	 * Returns all the meta_keys.
	 *
	 * @return array
	 */
	public static function get_post_meta_keys() { //phpcs:ignore
		global $wpdb;
		$trans_id = 'ssp-post-meta-list';
		$list     = get_transient( $trans_id );
		if ( false === $list ) {
			$list_acf  = apply_filters( 'spp_filter_acf_fields', [] );
			$list_meta = apply_filters( 'spp_filter_post_meta', [] );

			$list = '<select>
			<option value="">' . esc_html__( 'See the list of existing custom fields', 'spp' ) . '</option>';
			if ( ! empty( $list_acf ) ) {
				$list .= '<optgroup label="' . esc_html__( 'Advanced Custom Fields', 'spp' ) . '">';
				foreach ( $list_acf as $item ) {
					$list .= '<option value="' . esc_attr( $item->slug ) . '">' . esc_attr( $item->slug ) . ' (' . esc_attr( $item->name ) . ')</option>';

					$list_meta = array_diff( $list_meta, [ $item->slug, '_' . $item->slug ] );
				}
				$list .= '</optgroup>';
			}
			if ( ! empty( $list_meta ) ) {
				$list .= '<optgroup label="' . esc_html__( 'Other', 'spp' ) . '">';
				foreach ( $list_meta as $item ) {
					$list .= '<option value="' . esc_attr( $item ) . '">' . esc_attr( $item ) . '</option>';
				}
				$list .= '</optgroup>';
			}
			$list .= '</select>';

			set_transient( $trans_id, $list, 30 * MINUTE_IN_SECONDS );
		}

		return $list;
	}

	/**
	 * When the post meta are updated, deleted, created, the transient must be refreshed to reflect the new set.
	 */
	public static function reset_spp_meta_list() { // phpcs:ignore
		delete_transient( 'ssp-post-meta-list' );
	}

	/**
	 * Add the new menu in general options section that allows to configure the plugin settings.
	 */
	public static function admin_menu() {
		add_submenu_page(
			'tools.php',
			'<div class="dashicons dashicons-admin-generic"></div> ' . __( 'Easy Populate Posts', 'spp' ),
			'<div class="dashicons dashicons-admin-generic"></div> ' . __( 'Easy Populate Posts', 'spp' ),
			'manage_options',
			'populate-posts-settings',
			[ get_called_class(), 'populate_posts_settings' ]
		);
	}

	/**
	 * Create the plugin images sources from a list of URLs.
	 *
	 * @param  string $images_list List of images separated by new line.
	 * @return array
	 */
	public static function set_local_images_from_options( string $images_list ): array {
		$list = [];
		if ( ! empty( $images_list ) ) {
			if ( substr_count( $images_list, chr( 13 ) ) ) {
				$photos = explode( chr( 13 ), $images_list );
			} elseif ( substr_count( $images_list, chr( 10 ) ) ) {
				$photos = explode( chr( 10 ), $images_list );
			} else {
				$photos = explode( ' ', $images_list );
			}
			if ( ! empty( $photos ) ) {
				foreach ( $photos as $p ) {
					$list[] = self::make_image_from_url( trim( $p ) );
				}
			}
		}

		return array_filter( $list );
	}

	/**
	 * Read the plugin images ids and return the array.
	 *
	 * @return array
	 */
	public static function get_local_images(): array {
		// Identify the attachment already created, so we do not generate the same one.
		$args = [
			'post_type'      => 'attachment',
			'post_status'    => 'any',
			'posts_per_page' => 100,
			'fields'         => 'ids',
			'meta_query'  => [ // phpcs:ignore
				[
					'key'     => 'spp_sample',
					'value'   => 1,
					'compare' => '=',
				],
			],
		];

		$posts = new WP_Query( $args );
		if ( ! empty( $posts->posts ) ) {
			return $posts->posts;
		}
		return [];
	}

	/**
	 * Return true if the nonce is posted and is valid.
	 */
	public static function spp_validate_nonce() { // phpcs:ignore
		if ( ! empty( $_POST ) ) {
			$nonce = filter_input( INPUT_POST, 'spp_settings_nonce', FILTER_DEFAULT );
			if ( ! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'spp_settings_save' ) ) {
				esc_html_e( 'Action not allowed.', 'spp' );
				die();
			}
			return true;
		}

		return false;
	}

	/**
	 * Return true if the current user can manage options, hence allowed to use the plugin.
	 */
	public static function spp_current_user_can() { // phpcs:ignore
		// Verify user capabilities in order to deny the access if the user does not have the capabilities.
		if ( ! current_user_can( 'manage_options' ) ) {
			esc_html_e( 'Action not allowed.', 'spp' );
			die();
		}

		return true;
	}

	/**
	 * Remove trailing chars from string.
	 *
	 * @param  string $text String to be trimmed.
	 * @return string
	 */
	public static function trim_endings( string $text ): string {
		$text  = str_replace( '...', '.', $text );
		$text  = str_replace( '…', '.', $text );
		$text  = str_replace( '?!', '?', $text );
		$text  = str_replace( '!?', '!', $text );
		$text  = str_replace( '--', '-', $text );
		$last  = mb_substr( $text, -1 );
		$check = preg_replace( '/[^a-zA-Z0-9]/', '', $last );
		if ( $check !== $last ) {
			$text = mb_substr( $text, 0, -1 );
		}

		return $text;
	}

	/**
	 * Returns a random string.
	 *
	 * @param  int  $min   Min number of words.
	 * @param  int  $max   Max number of chars.
	 * @param  bool $lower Return lowercase string.
	 * @return string
	 */
	public static function get_random_string( int $min, int $max = 0, bool $lower = false ): string {
		$text_elements = self::get_text_elements( self::$settings['content_type'] );
		shuffle( $text_elements );
		$text_elements = implode( ' ', $text_elements );
		if ( ! empty( $max ) ) {
			$pos = strpos( $text_elements, ' ', (int) $max );
			if ( ! empty( $pos ) ) {
				$text_elements = substr( $text_elements, 0, $pos );
			} else {
				$text_elements = substr( $text_elements, 0, (int) $max );
			}
			$text_elements = self::trim_endings( $text_elements );
		}
		$text = wp_trim_words( $text_elements, (int) $min, '' );
		if ( ! empty( $max ) && strlen( $text ) > (int) $max ) {
			$text = wp_trim_words( $text, (int) $min - 1, '' );
		}
		$text = self::trim_endings( $text );

		if ( true === $lower ) {
			$text = mb_strtolower( $text );
		}

		return $text;
	}

	/**
	 * Returns a random number.
	 *
	 * @param  int $min Min value.
	 * @param  int $max Max value.
	 * @return int
	 */
	public static function get_random_number( int $min = 0, int $max = 0 ): int {
		return wp_rand( (int) $min, (int) $max );
	}

	/**
	 * Generate a random geo location coordinates set.
	 *
	 * @param  int   $radius    The radius in km.
	 * @param  float $longitude Initial longitude from where to expand the area.
	 * @param  float $latitude  Initial latitude from where to expand the area.
	 * @return array
	 */
	public static function generate_random_geo( int $radius = 0, float $longitude = 44.43225, float $latitude = 26.10626 ): array {
		/*
		The valid range of latitude in degrees is -90 and +90 for the southern and northern hemisphere respectively. Longitude is in the range -180 and +180 specifying coordinates west and east of the Prime Meridian, respectively.

		For reference, the Equator has a latitude of 0°, the North pole has a latitude of 90° north (written 90° N or +90°), and the South pole has a latitude of -90°.

		The Prime Meridian has a longitude of 0° that goes through Greenwich, England. The International Date Line (IDL) roughly follows the 180° longitude. A longitude with a positive value falls in the eastern hemisphere and negative value falls in the western hemisphere.
		 */

		$longitude = (float) $longitude;
		$latitude  = (float) $latitude;

		$radius = ( 0 === $radius ) ? wp_rand( 1, 2500 ) : $radius; // in km.
		$sign   = ( 0 === wp_rand( 0, 1 ) ) ? -1 : 1;
		$degree = wp_rand( - 100, 100 );
		if ( 0 === $degree ) {
			$degree = 1;
		}
		$lng = $longitude + $sign * $radius / abs( cos( deg2rad( $longitude ) ) * $degree );
		if ( $lng <= -70 || $lng >= 70 || 'INF' === $lng ) {
			$lng = $longitude / 2;
		}

		$radius = ( 0 === $radius ) ? wp_rand( 1, 2500 ) : $radius; // in km.
		$sign   = ( 0 === wp_rand( 0, 1 ) ) ? -1 : 1;
		$degree = wp_rand( - 60, 60 );
		if ( 0 === $degree ) {
			$degree = 1;
		}
		$lat = $latitude + $sign * $radius / abs( cos( deg2rad( $latitude ) ) * $degree ); // 69.
		if ( $lat <= -160 || $lat >= 160 || 'INF' === $lat ) {
			$lat = $latitude / 2;
		}

		// $lng <= 70 for safety;
		// $lat <= 160 for safety;
		return [ number_format( $lng, 10, '.', '' ), number_format( $lat, 9, '.', '' ) ];
	}

	/**
	 * Returns randomized string.
	 *
	 * @param  string $text Initial text.
	 * @return string
	 */
	public static function replace_text_tags( $text ) { // phpcs:ignore
		if ( empty( $text ) ) {
			return '';
		}

		if ( ! is_scalar( $text ) || is_numeric( $text ) ) {
			return $text;
		}

		if ( substr_count( $text, '#[EMAIL]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[EMAIL\]/i',
				function ( $matches ) { // phpcs:ignore
					$string = self::get_random_string( 2, 15 ) . '-' . self::get_random_string( 2, 15 ) . '@' . self::get_random_string( 2, 15 ) . self::get_random_number( 1, 999 ) . '.com';
					$string = mb_strtolower( preg_replace( '/[^a-zA-Z0-9\-\.\@]/', '', $string ) );
					$string = str_replace( '-i@', '@', $string );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[URL]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[URL\]/i',
				function ( $matches ) { // phpcs:ignore
					$string = self::get_random_string( 2, 15 ) . '-' . str_replace( '', '-', self::get_random_string( 3, 15 ) ) . '.' . chr( 97 + wp_rand( 0, 25 ) ) . chr( 97 + wp_rand( 0, 25 ) );
					$string = 'https://' . mb_strtolower( preg_replace( '/[^a-zA-Z0-9\-\.]/', '', $string ) );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[MOBILE]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[MOBILE\]/i',
				function ( $matches ) { // phpcs:ignore
					$string = '+' . self::get_random_number( 30, 48 ) . ' 0' . self::get_random_number( 700, 724 ) . ' ' . self::get_random_number( 100, 999 ) . ' ' . self::get_random_number( 100, 999 );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[DATEP]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[DATEP\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = -1;
					$string = gmdate( 'Y-m-d', time() + $op * wp_rand( 0, 1000 ) * DAY_IN_SECONDS );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[DATEF]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[DATEF\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = 1;
					$string = gmdate( 'Y-m-d', time() + $op * wp_rand( 0, 1000 ) * DAY_IN_SECONDS );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[DATE]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[DATE\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = wp_rand( 0, 1 ) ? 1 : -1;
					$string = gmdate( 'Y-m-d', time() + $op * wp_rand( 0, 1000 ) * DAY_IN_SECONDS );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[DATETIME]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[DATETIME\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = \wp_rand( 0, 1 ) ? 1 : -1;
					$string = gmdate( 'Y-m-d H:i:s', time() + $op * wp_rand( 0, 100000 ) * MINUTE_IN_SECONDS );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[TIMESTAMP]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[TIMESTAMP\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = wp_rand( 0, 1 ) ? 1 : -1;
					$string = strtotime( gmdate( 'Y-m-d H:i:s', time() + $op * wp_rand( 0, 10000 ) * MINUTE_IN_SECONDS ) );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[TIME]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[TIME\]/i',
				function ( $matches ) { // phpcs:ignore
					$op     = wp_rand( 0, 1 ) ? 1 : -1;
					$string = gmdate( 'H:i:s', time() + $op * wp_rand( 0, 10000 ) * MINUTE_IN_SECONDS );
					return $string;
				},
				$text
			);
		}

		if ( substr_count( $text, '#[LON]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[LON\]/i',
				function ( $matches ) { // phpcs:ignore
					$lonlat = self::generate_random_geo();
					return $lonlat[0];
				},
				$text
			);
		}

		if ( substr_count( $text, '#[LAT]' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[LAT\]/i',
				function ( $matches ) { // phpcs:ignore
					$lonlat = self::generate_random_geo();
					return $lonlat[1];
				},
				$text
			);
		}

		if ( substr_count( $text, '#[LCOLOR]' ) ) {
			$string = '#' . substr( str_shuffle( 'ABCDEF' ), 0, 3 ) . substr( str_shuffle( '89ABCDEF' ), 0, 3 );
			$text   = @preg_replace( '/\#\[LCOLOR\]/i', $string, $text ); // phpcs:ignore
		}

		if ( substr_count( $text, '#[DCOLOR]' ) ) {
			$string = '#' . substr( str_shuffle( '0123456' ), 0, 2 ) . substr( str_shuffle( '0123456789AB' ), 0, 4 );
			$text   = @preg_replace( '/\#\[DCOLOR\]/i', $string, $text ); // phpcs:ignore
		}

		if ( substr_count( $text, '#[COLOR]' ) ) {
			$string = '#' . substr( str_shuffle( 'ABCDEF0123456789' ), 0, 6 );
			$text   = @preg_replace( '/\#\[COLOR\]/i', $string, $text ); // phpcs:ignore
		}

		if ( substr_count( $text, '#[s' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[s\-([0-9]+)\:([0-9]+)\]/',
				function ( $matches ) { // phpcs:ignore
					return self::get_random_string( (int) $matches[1], (int) $matches[2], true );
				},
				$text
			);
		}

		if ( substr_count( $text, '#[S' ) ) {
			$text = @preg_replace_callback( // phpcs:ignore
				'/\#\[S\-([0-9]+)\:([0-9]+)\]/',
				function ( $matches ) { // phpcs:ignore
					return self::get_random_string( (int) $matches[1], (int) $matches[2], false );
				},
				$text
			);
		}

		if ( substr_count( $text, '#[N' ) ) {
			$text = preg_replace( '#\#\[N#', '#[123', $text );
			$text = preg_replace( '#:L(.+)#', ':234$1', $text );
			$text = preg_replace( '#:T(.+)#', ':345$1', $text );

			$new_text = @preg_replace_callback( // phpcs:ignore
				'/\#\[123\-([0-9]+)\:([0-9]+)\:234(.+)\]/i',
				function ( $matches ) { // phpcs:ignore
					$max = strlen( $matches[2] );
					$nr  = (string) self::get_random_number( (int) $matches[1], (int) $matches[2] );
					return str_pad( $nr, $max, (string) $matches[3], STR_PAD_LEFT );
				},
				$text
			);

			$text = $new_text ?? $text;

			$new_text = @preg_replace_callback( // phpcs:ignore
				'/\#\[123\-([0-9]+)\:([0-9]+)\:345(.+)\]/i',
				function ( $matches ) { // phpcs:ignore
					$max = strlen( $matches[2] );
					$nr  = (string) self::get_random_number( (int) $matches[1], (int) $matches[2] );
					return str_pad( $nr, $max, (string) $matches[3], STR_PAD_RIGHT );
				},
				$text
			);

			$text = $new_text ?? $text;

			$new_text = @preg_replace_callback( // phpcs:ignore
				'/\#\[123\-([0-9]+)\:([0-9]+)\]/i',
				function ( $matches ) { // phpcs:ignore
					return self::get_random_number( (int) $matches[1], (int) $matches[2] );
				},
				$text
			);

			$text = $new_text ?? $text;
		}

		if ( substr_count( $text, '#[l]' ) ) {
			$text = preg_replace_callback( // phpcs:ignore
				'/\#\[l\]/',
				function ( $matches ) { // phpcs:ignore
					return chr( 97 + wp_rand( 0, 25 ) );
				},
				$text
			);
		}

		if ( substr_count( $text, '#[L]' ) ) {
			$text = preg_replace_callback( // phpcs:ignore
				'/\#\[L\]/',
				function ( $matches ) { // phpcs:ignore
					return mb_strtoupper( chr( 97 + wp_rand( 0, 25 ) ) );
				},
				$text
			);
		}
		return $text;
	}

	/**
	 * Filter the images ids, to result in a uniques, non-empty and exisiting images IDs.
	 *
	 * @param  mixed $list A string of IDs separated by comma, or an array of IDs.
	 * @return mixed
	 */
	public static function filter_images_ids( $list ) { // phpcs:ignore
		$as_string = ! is_array( $list ) ? true : false;
		if ( $as_string ) {
			$list = explode( ',', $list );
		}

		if ( ! empty( $list ) ) {
			$list = array_filter( $list );
			$list = ! empty( $list ) ? array_unique( $list ) : [];
			foreach ( $list as $k => $v ) {
				$url = wp_get_attachment_image_src( $v );
				if ( empty( $url[0] ) ) {
					unset( $list[ $k ] );
				}
			}
			$list = array_filter( $list );
		}

		if ( $as_string ) {
			return implode( ',', $list );
		}

		return $list;
	}

	/**
	 * Return the content generated after an ajax call
	 *
	 * @param bool $return True if the method returns result.
	 */
	public static function spp_save_settings( $return = true ) { // phpcs:ignore
		self::maybe_reset_cache();

		if ( self::spp_current_user_can() && self::spp_validate_nonce() ) {
			$spp_del = filter_input( INPUT_POST, 'spp_del', FILTER_VALIDATE_INT );
			if ( ! empty( $spp_del ) ) {
				$all = self::get_local_images();
				$im  = ! empty( self::$settings['images_path'] ) ? explode( ',', self::$settings['images_path'] ) : [];
				$im  = ( ! empty( $im ) ) ? array_diff( $im, [ (int) $spp_del ] ) : [];
				if ( ! empty( $im ) ) {
					$im = self::filter_images_ids( $im );
				}

				self::$settings['all_images']  = $all;
				self::$settings['images_path'] = ! empty( $im ) ? implode( ',', $im ) : '';

				update_option( 'spp_settings', self::$settings );
				if ( false !== $return ) {
					self::load_plugin_settings();
					self::spp_show_plugin_images();
					die();
				}
			}

			self::load_plugin_settings();
			$ds     = self::$settings;
			$ds_new = $ds;
			$ints   = [ 'content_type', 'content_p', 'date_type', 'has_sticky', 'max_number', 'post_parent', 'post_author' ];
			$pspp   = filter_input( INPUT_POST, 'spp', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );

			// Default resets.
			$ds_new['gutenberg_block']       = 0;
			$ds_new['gutenberg_template']    = '';
			$ds_new['specific_date']         = '';
			$ds_new['specific_hour']         = '';
			$ds_new['specific_status']       = '';
			$ds_new['cleanup_on_deactivate'] = 0;
			$ds_new['random_no_image']       = 0;
			foreach ( $pspp as $key => $value ) {
				switch ( $key ) {
					case 'max_tax':
					case 'max_meta':
						$ds_new[ $key ] = self::sanitize_max_value( (int) $value );
						break;

					case 'title_prefix':
					case 'post_type':
					case 'gutenberg_template':
						$ds_new[ $key ] = trim( $value );
						break;

					case 'start_counter':
						if ( ! substr_count( $pspp['title_prefix'], '#NO' ) ) {
							$ds_new[ $key ] = 0;
						} else {
							$ds_new[ $key ] = (int) $value;
						}
						break;

					case 'content_type':
					case 'excerpt':
					case 'date_type':
					case 'has_sticky':
					case 'max_number':
					case 'post_parent':
					case 'post_author':
						$ds_new[ $key ] = (int) $value;
						break;

					case 'gutenberg_block':
					case 'cleanup_on_deactivate':
					case 'random_no_image':
						$ds_new[ $key ] = 1;
						break;

					case 'specific_date':
					case 'specific_hour':
					case 'specific_status':
						$ds_new[ $key ] = ( 3 === (int) $pspp['date_type'] ) ? $value : '';
						break;

					case 'images_list':
					case 'images_path':
						$ds_new['images_list'] = implode( chr( 13 ), array_map( 'sanitize_text_field', explode( chr( 13 ), $value ) ) );

						$new_ids = self::set_local_images_from_options( $ds_new['images_list'] );
						if ( ! empty( $new_ids ) ) {
							$img = implode( ',', $new_ids ) . ',' . $ds_new['images_path'];
							$img = explode( ',', $img );
							$img = self::filter_images_ids( $img );

							$ds_new['images_path'] = ! empty( $img ) ? implode( ',', $img ) : '';
						}
						break;

					default:
						if ( substr_count( $key, 'term_slug' ) ) {
							$ds_new[ $key ] = implode( ', ', self::spp_cleanup_terms_slugs( $value ) );
						} else {
							$maybe = maybe_unserialize( $value );
							if ( is_array( $maybe ) || is_object( $maybe ) ) {
								$ds_new[ $key ] = $maybe;
							} else {
								$ds_new[ $key ] = sanitize_text_field( $value );
							}
						}
						break;
				}
			}

			if ( 3 !== (int) $ds_new['content_type'] ) {
				$ds_new['gutenberg_template'] = '';
			}

			update_option( 'spp_settings', $ds_new );
			self::load_plugin_settings();

			$groups_save = filter_input( INPUT_POST, 'spp_groups', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
			if ( ! empty( $groups_save ) ) {
				$dir      = wp_upload_dir();
				$data_url = trailingslashit( site_url() );
				$data_dir = $dir['basedir'] . '/spp_tmp/';
				if ( ! empty( $groups_save['add_title'] ) ) {
					$hash = md5( $groups_save['add_title'] );
					$data = self::$settings;
					if ( ! empty( $data['initial_images'] ) ) {
						$data['initial_images'] = str_replace( chr( 13 ), '#', $data['initial_images'] );
					}
					if ( ! empty( $data['default_images'] ) ) {
						$data['default_images'] = str_replace( chr( 13 ), '#', $data['default_images'] );
					}
					self::$settings_groups[ $hash ] = [
						'name'    => $groups_save['add_title'],
						'hash'    => $hash,
						'content' => wp_json_encode( [
							'name'    => $groups_save['add_title'],
							'hash'    => $hash,
							'url'     => $data_url,
							'path'    => $data_dir,
							'content' => $data,
						] ),
					];
					update_option( 'spp_settings_groups', self::$settings_groups );
				}

				if ( ! empty( $groups_save['discard'] ) ) {
					unset( self::$settings_groups[ $groups_save['discard'] ] );
					update_option( 'spp_settings_groups', self::$settings_groups );
				}

				if ( ! empty( $groups_save['load'] ) ) {
					$hash = trim( $groups_save['load'] );
					if ( ! empty( self::$settings_groups[ $hash ]['content'] ) ) {
						$array = json_decode( self::$settings_groups[ $hash ]['content'], true );
						if ( ! empty( $array['content'] ) && is_array( $array['content'] ) ) {
							$data = $array['content'];
							if ( ! empty( $data['initial_images'] ) ) {
								$data['initial_images'] = str_replace( '#', chr( 13 ), $data['initial_images'] );
							}
							if ( ! empty( $data['default_images'] ) ) {
								$data['default_images'] = str_replace( '#', chr( 13 ), $data['default_images'] );
							}
							update_option( 'spp_settings', $data );
						}
					}
				}

				if ( ! empty( $groups_save['import'] ) ) {
					$data = json_decode( $groups_save['import'], true );
					if ( ! empty( $data['hash'] ) && ! empty( $data['name'] ) && ! empty( $data['content'] ) ) {
						if ( ! empty( $data['content']['url'] ) && $data['content']['url'] !== $data_url ) {
							$data['content']['url'] = $data_url;

							$data['content']['initial_images'] = str_replace( $data['content']['url'], $data_url, $data['content']['initial_images'] );
							$data['content']['default_images'] = str_replace( $data['content']['url'], $data_url, $data['content']['default_images'] );

							$data['content']['legacy_images_path'] = str_replace( $data['content']['legacy_images_path'], $data_dir, $data['content']['legacy_images_path'] );
							$data['content']['gutenberg_template'] = str_replace( $data['content']['url'], $data_url, $data['content']['gutenberg_template'] );

							$data['content']['images_path'] = self::filter_images_ids( $data['content']['images_path'] );
						}
						self::$settings_groups[ $data['hash'] ] = [
							'name'    => $data['name'],
							'hash'    => $data['hash'],
							'content' => wp_json_encode( [
								'name'    => $data['name'],
								'hash'    => $data['hash'],
								'url'     => $data_url,
								'path'    => $data_dir,
								'content' => $data['content'],
							] ),
						];
					}
					update_option( 'spp_settings_groups', self::$settings_groups );
				}

				self::load_plugin_settings();
			}
		}

		if ( false !== $return ) {
			self::load_plugin_settings();
			self::spp_show_plugin_images();
			die();
		}
	}

	/**
	 * Test pattern AJAX handler.
	 */
	public static function spp_pattern_test() {
		if ( self::spp_current_user_can() ) {
			$sample = filter_input( INPUT_POST, 'sample', FILTER_DEFAULT );
			if ( ! empty( $sample ) ) {
				$item  = '';
				$class = '';
				$value = self::replace_text_tags( $sample );
				if ( substr_count( $sample, '#[COLOR]' ) || substr_count( $sample, '#[LCOLOR]' ) || substr_count( $sample, '#[DCOLOR]' ) ) {
					$class = ' color';
					$item  = '<div class="color" style="background:' . esc_html( $value ) . '"></div>';
				}
				echo '<div class="result' . esc_html( $class ) . '"><div>' . esc_html( $value ) . '</div>' . $item . '</div>'; // phpcs:ignore
			}
		}

		die();
	}

	/**
	 * Ajax call handler for populating posts.
	 */
	public static function spp_populate() {
		if ( self::spp_current_user_can() && self::spp_validate_nonce() ) {
			self::spp_save_settings( false );
			self::execute_add_random_posts();
		}
		die();
	}

	/**
	 * Default text mentioning how the images work.
	 *
	 * @return string
	 */
	public static function spp_images_mention(): string {
		return '<em>' . esc_html__( 'images to be set randomly as featured image', 'spp' ) . '</em>';
	}

	/**
	 * Output the plugin images.
	 */
	public static function spp_show_plugin_images() {
		if ( ! empty( self::$settings['images_path'] ) ) {
			$p = explode( ',', self::$settings['images_path'] );
			if ( count( $p ) !== 0 ) :
				?>
				<div class="spp_figures">
					<?php
					foreach ( $p as $id ) :
						$url     = wp_get_attachment_image_src( $id, 'thumbnail' );
						$img_src = ( ! empty( $url[0] ) ) ? $url[0] : '';
						if ( ! empty( $img_src ) ) {
							?>
							<button class="spp_figure hint-icon" data-target="do-remove-image" data-id="<?php echo (int) $id; ?>">
								<span class="dashicons dashicons-no"></span>
								<img src="<?php echo esc_url( $img_src . '?v=' . time() ); ?>">
							</button>
							<?php
						}
					endforeach;
					?>
				</div>
				<?php
			endif;
		}
	}

	/**
	 * Maybe donate or rate.
	 *
	 * @return string
	 */
	public static function donate_text(): string {
		$donate = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ&item_name=' . rawurlencode( 'Support for development and maintenance (' . self::PLUGIN_NAME . ')' );
		$thanks = __( 'A huge thanks in advance!', 'spp' );

		return sprintf(
				// Translators: %1$s - donate URL, %2$s - rating, %3$s - thanks.
			__( 'If you find the plugin useful and would like to support my work, please consider making a <a href="%1$s" target="_blank">donation</a>. It would make me very happy if you would leave a %2$s rating. %3$s', 'spp' ),
			$donate,
			'<a href="' . self::PLUGIN_SUPPORT_URL . 'reviews/?rate=5#new-post" class="rating" target="_blank" rel="noreferrer" title="' . esc_attr( $thanks ) . '">★★★★★</a>',
			$thanks
		);
	}

	/**
	 * Maybe donate or rate.
	 */
	public static function show_donate_text() {
		?>
		<div class="donate">
			<img src="<?php echo esc_url( SPP_PLUGIN_URL . 'assets/images/icon-128x128.gif' ); ?>" width="32" height="32" alt="">
			<div>
				<?php
				if ( ! apply_filters( 'spp_filter_remove_donate_info', false ) ) {
					echo wp_kses_post( self::donate_text() );
				}
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Returns the maximum number of tax/meta available fileds.
	 *
	 * @return int
	 */
	public static function spp_max_fields() {
		return apply_filters( 'spp_max_fields', 20 );
	}

	/**
	 * Sanitize max value.
	 *
	 * @param  int $value Initial value.
	 * @return int
	 */
	public static function sanitize_max_value( int $value = 0 ): int {
		$max   = self::spp_max_fields();
		$value = abs( (int) $value );
		$value = ( $value >= $max ) ? $max : $value;
		$value = ( $value <= 1 ) ? 1 : $value;
		return $value;
	}

	/**
	 * Get current max taxonomies.
	 *
	 * @return int
	 */
	public static function get_max_tax(): int {
		$max_tax = isset( self::$settings['max_tax'] ) ? (int) self::$settings['max_tax'] : 3;
		$max_tax = apply_filters( 'spp_max_options_tax', $max_tax );

		return $max_tax;
	}

	/**
	 * Get current max meta.
	 *
	 * @return int
	 */
	public static function get_max_meta(): int {
		$max_meta = isset( self::$settings['max_meta'] ) ? (int) self::$settings['max_meta'] : 5;
		$max_meta = apply_filters( 'spp_max_options_meta', $max_meta );

		return $max_meta;
	}

	/**
	 * List the taxonomies options.
	 *
	 * @param int $max_tax Maximum to show.
	 */
	public static function spp_max_tax_listing( $max_tax = 0 ) { //phpcs:ignore
		include_once __DIR__ . '/inc/tax.php';
	}

	/**
	 * List the post meta options.
	 *
	 * @param int $max_meta Maximum to show.
	 */
	public static function spp_max_meta_listing( $max_meta = 0 ) { //phpcs:ignore
		include_once __DIR__ . '/inc/meta.php';
	}

	/**
	 * Assess that the text has one of the patterns.
	 *
	 * @param  string $text Text to be assessed.
	 * @return bool
	 */
	public static function has_pattern( string $text = '' ): bool {
		return substr_count( $text, '#[' ) ? true : false;
	}

	/**
	 * Display settings groups, if any.
	 */
	public static function display_groups() {
		include_once __DIR__ . '/inc/groups.php';
	}

	/**
	 * The plugin settings and trigger for the populate of posts.
	 */
	public static function populate_posts_settings() {
		?>
		<div class="wrap spp-feature">
			<h1 class="plugin-title">
				<span class="dashicons dashicons-admin-generic"></span>
				<span class="h1"><?php esc_html_e( 'Easy Populate Posts', 'spp' ); ?></span>
			</h1>

			<p>
				<?php esc_html_e( 'This is a helper plugin that allows developers to populate the sites with randomly generated content (including tags, images, date in the past or future, sticky, etc.), but with more control over the generated values.', 'spp' ); ?>
			</p>

			<form id="spp_settings_frm" action="" method="post" class="spp">
				<?php wp_nonce_field( 'spp_settings_save', 'spp_settings_nonce' ); ?>
				<input type="hidden" name="spp_del" id="spp_del" value="">

				<div class="options-boxes">
					<?php
					include_once __DIR__ . '/inc/content.php';
					include_once __DIR__ . '/inc/post.php';
					include_once __DIR__ . '/inc/terms.php';
					include_once __DIR__ . '/inc/metadata.php';
					include_once __DIR__ . '/inc/images.php';
					?>
				</div>
				<div id="spp_populate_wrap"></div>
			</form>

			<?php self::show_donate_text(); ?>
		</div>
		<?php
	}

	/**
	 * Cleanup terms by ids.
	 *
	 * @param  string $ids List of terms ids separated by comma.
	 * @return array
	 */
	public static function spp_cleanup_terms_ids( $ids = '' ) { // phpcs:ignore
		$ids = preg_replace( '!\s+!', '', $ids );
		$ids = explode( ',', $ids );
		if ( ! is_array( $ids ) ) {
			$ids = [ (int) $ids ];
		}
		$ids = array_map( 'intval', $ids );
		$ids = array_unique( $ids );
		$ids = array_filter( $ids );
		$ids = array_values( $ids );
		return $ids;
	}

	/**
	 * Cleanup terms by slugs.
	 *
	 * @param  string $slugs List of terms names separated by comma.
	 * @return array
	 */
	public static function spp_cleanup_terms_slugs( $slugs = '' ) { // phpcs:ignore
		if ( empty( $slugs ) ) {
			return [];
		}
		$slugs = preg_replace( '!\s+!', ' ', $slugs );
		$terms = explode( ',', $slugs );
		if ( ! is_array( $terms ) ) {
			$terms = [ trim( $slugs ) ];
		}
		$terms = array_map( 'trim', $terms );
		$terms = array_unique( $terms );
		$terms = array_filter( $terms );
		$terms = array_values( $terms );
		return $terms;
	}

	/**
	 * Create a random post title.
	 *
	 * @param  array $text_elements Text elements.
	 * @param  int   $min_w         Mimumum words.
	 * @return string
	 */
	public static function get_random_title( $text_elements, $min_w = 4 ) { // phpcs:ignore
		if ( empty( $text_elements ) ) {
			if ( 3 === (int) self::$settings['content_type'] ) {
				$text_elements = self::get_text_elements( 0 );
			} else {
				$text_elements = self::get_text_elements( self::$settings['content_type'] );
			}
		}
		$nn = $text_elements[ wp_rand( 0, count( $text_elements ) - 1 ) ];
		$nn = preg_replace( '[\!\?]', '.', $nn );
		$nn = str_replace( '. ', '.', $nn );
		$n  = explode( '.', $nn );
		$n  = array_filter( $n );
		shuffle( $n );

		$name  = trim( $n[0] ) ?? $text_elements[0];
		$words = explode( ' ', $name );
		$max_w = count( $words ) - 1;
		if ( $max_w <= $min_w ) {
			$min_w = $max_w;
		}
		$name = trim( implode( ' ', array_slice( $words, 0, wp_rand( $min_w, $max_w ) ) ) );
		$name = ucfirst( $name );
		return $name;
	}

	/**
	 * Create a random post content.
	 *
	 * @param  array $text_elements Text elements.
	 * @param  int   $max_blocks    Mimumum paragraphs.
	 * @param  int   $rand          Start for elements.
	 * @return string
	 */
	public static function get_random_description( $text_elements, $max_blocks = 1, $rand = 0 ) { // phpcs:ignore
		$texts = array_slice( $text_elements, (int) $rand, $max_blocks );

		if ( ! empty( self::$settings['gutenberg_block'] ) ) {
			$text = '<!-- wp:paragraph --><p>' . implode( '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>', $texts ) . '</p><!-- /wp:paragraph -->';
		} else {
			$text = '<p>' . implode( '</p><p>', $texts ) . '</p>';
		}

		return $text;
	}

	/**
	 * Check if date is valid.
	 *
	 * @param  string $date Date string.
	 * @return bool
	 */
	public static function spp_is_valide_date( $date ) { // phpcs:ignore
		$d = DateTime::createFromFormat( 'Y-m-d H:i:s', $date );
		if ( false !== $d ) {
			return ( $d->format( 'Y-m-d H:i:s' ) === $date );
		}
		return false;
	}

	/**
	 * Get text elements, with all their paragraphs.
	 *
	 * @param  int $settings_content_type Selected content type.
	 * @return array
	 */
	public static function get_text_elements( int $settings_content_type = 0 ) { // phpcs:ignore
		require __DIR__ . '/inc/text.php';

		if ( 0 === (int) $settings_content_type || 3 === (int) $settings_content_type ) {
			$list = array_merge( $text_elements[0], $text_elements[1] );
		} else {
			$list = $text_elements[ (int) $settings_content_type - 1 ];
		}

		if ( ! empty( $list ) ) {
			shuffle( $list );
		}

		return $list;
	}

	/**
	 * Get random tags.
	 *
	 * @param  string $tags_list List of tags.
	 * @param  int    $type      Type of random (1 = more, 2 = only one).
	 * @return array
	 */
	public static function get_random_tags( $tags_list = '', $type = 1 ) { // phpcs:ignore
		$tags = [];
		if ( ! empty( $tags_list ) ) {
			if ( ! is_array( $tags_list ) ) {
				$list = explode( ',', $tags_list );
			} else {
				$list = $tags_list;
			}
			$list  = array_map( 'trim', $list );
			$list  = array_unique( $list );
			$total = count( $list );
			if ( 1 === $total ) {
				$tags = $list;
			} else {
				shuffle( $list );
				$tags = array_slice( $list, 0, wp_rand( 1, $total - 1 ) );
			}

			if ( ! empty( $tags ) ) {
				if ( 2 === $type ) {
					$tags = array_slice( $list, 0, 1 );
				}

				foreach ( $tags as $k => $tag ) {
					$tags[ $k ] = self::replace_text_tags( $tag );
				}
			}
		}
		return $tags;
	}

	/**
	 * Assess and maybe create new taxonomy terms, and return the list of ids.
	 *
	 * @param  string       $tax   Taxonomy slug/name.
	 * @param  string|array $names Terms list.
	 * @return array
	 */
	public static function assess_create_taxonomy_terms( $tax, $names ) { // phpcs:ignore
		$ids = [];
		if ( ! empty( $names ) ) {
			if ( is_scalar( $names ) ) {
				$names = explode( ',', $names );
			}
			foreach ( $names as $val ) {
				$val  = self::replace_text_tags( $val );
				$term = term_exists( trim( $val ), $tax );
				if ( 0 !== $term && null !== $term ) {
					if ( ! empty( $term['term_id'] ) && is_numeric( $term['term_id'] ) ) {
						$ids[] = (int) $term['term_id'];
					}
				} else {
					$add = wp_insert_term( $val, $tax );
					if ( ! empty( $add['term_id'] ) && is_numeric( $add['term_id'] ) ) {
						$ids[] = (int) $add['term_id'];
					}
				}
			}
		}
		return $ids;
	}

	/**
	 * Select a random placeholder.
	 *
	 * @param  string $string The list of placeholders separated by comma.
	 * @return string
	 */
	public static function select_random_image( $string = '' ) { // phpcs:ignore
		global $select_random_placeholder;
		$list   = ( ! is_array( $string ) ) ? explode( ',', $string ) : $string;
		$usable = $list;
		if ( empty( $select_random_placeholder ) ) {
			$select_random_placeholder = [];
		} else {
			$diff = array_diff( $list, $select_random_placeholder );
			if ( ! empty( $diff ) ) {
				$list = array_values( $diff );
			} else {
				$list                      = $usable;
				$select_random_placeholder = [];
			}
		}
		$index = array_rand( $list, 1 );
		$item  = ( ! empty( $list[ $index ] ) ) ? $list[ $index ] : $usable[0];

		$select_random_placeholder[] = $item;
		return $item;
	}

	/**
	 * Compute the taxonomies terms from the settings.
	 *
	 * @return array
	 */
	public static function compute_taxonomies_terms(): array {
		$maybe_terms = [];
		$max_tax     = self::get_max_tax();
		for ( $k = 1; $k <= $max_tax; ++$k ) {
			$mk = ( $k > 1 ) ? $k : '';
			if ( ! empty( self::$settings[ 'taxonomy' . $mk ] ) && ( ! empty( self::$settings[ 'term_id' . $mk ] )
				|| ! empty( self::$settings[ 'term_slug' . $mk ] ) ) ) {
				$terms_ids = self::spp_cleanup_terms_ids( self::$settings[ 'term_id' . $mk ] );
				$match_ids = self::assess_create_taxonomy_terms(
					self::$settings[ 'taxonomy' . $mk ],
					self::$settings[ 'term_slug' . $mk ]
				);
				$terms_ids = array_unique( array_merge( $match_ids, $terms_ids ) );
				if ( ! empty( $terms_ids ) ) {
					$maybe_terms[] = [
						'taxonomy'  => self::$settings[ 'taxonomy' . $mk ],
						'terms_ids' => array_values( $terms_ids ),
						'random'    => (int) self::$settings[ 'term_rand' . $mk ],
					];
				}
			}
		}

		if ( ! empty( $maybe_terms ) ) {
			$all_tax = [];
			foreach ( $maybe_terms as $type ) {
				$tax = $type['taxonomy'];
				if ( empty( $type['terms_ids'] ) ) {
					continue;
				}

				if ( empty( $all_tax[ $tax ] ) ) {
					$all_tax[ $tax ] = [
						'ids'    => [],
						'random' => 0,
					];
				}
				$ids = array_unique( array_merge( $all_tax[ $tax ]['ids'], $type['terms_ids'] ) );

				$all_tax[ $tax ]['ids']    = $ids;
				$all_tax[ $tax ]['random'] = $type['random'];
			}

			$maybe_terms = $all_tax;
		}

		return $maybe_terms;
	}

	/**
	 * Compute the post meta from the settings.
	 *
	 * @return array
	 */
	public static function compute_post_meta(): array {
		$mybe_meta = [];
		$max_meta  = self::get_max_meta();
		for ( $k = 1; $k <= $max_meta; ++$k ) {
			$mk = ( $k > 1 ) ? $k : '';
			if ( ! empty( self::$settings[ 'meta_key' . $mk ] ) && ! empty( self::$settings[ 'meta_value' . $mk ] ) ) {
				$value = self::replace_text_tags( self::$settings[ 'meta_value' . $mk ] );
				$meta  = [
					'meta_key'   => self::$settings[ 'meta_key' . $mk ], //phpcs:ignore
					'meta_value' => $value, //phpcs:ignore
				];

				$mybe_meta[] = apply_filters( 'spp_meta_value', $meta );
			}
		}

		return $mybe_meta;
	}

	/**
	 * Execute the content populate and outputs the result.
	 */
	public static function execute_add_random_posts() {
		$text_type     = 3 === (int) self::$settings['content_type'] ? 0 : self::$settings['content_type'];
		$text_elements = self::get_text_elements( $text_type );
		$photos        = [];
		if ( ! empty( self::$settings['images_path'] ) ) {
			$photos = explode( ',', self::$settings['images_path'] );
		}

		$now           = current_time( 'timestamp' ); // phpcs:ignore
		$return_result = '<ol>';
		$last          = 0;
		$all_statuses  = array_keys( self::$allowed_post_statuses );

		for ( $i = 0; $i < (int) self::$settings['max_number']; $i++ ) {
			shuffle( $text_elements );

			self::get_plugin_settings();
			$info = self::$settings;

			$maybe_terms = self::compute_taxonomies_terms();
			$maybe_meta  = self::compute_post_meta();
			$skip_prefix = false;
			if ( substr_count( $info['title_prefix'], '#[' ) ) {
				$name        = $info['title_prefix'];
				$skip_prefix = true;
			} else {
				$name = self::get_random_title( $text_elements );
			}

			$diez_no = '';
			if ( ! empty( $info['title_prefix'] ) ) {
				if ( substr_count( $info['title_prefix'], '#NO' ) ) {
					$diez_no = (string) $info['start_counter'];
				}
			}

			if ( ! empty( $diez_no ) ) {
				foreach ( $info as $k => $v ) {
					if ( ! is_numeric( $v ) && 'title_prefix' !== $k ) {
						if ( is_scalar( $v ) ) {
							$info[ $k ] = str_replace( '#NO', (string) $diez_no, (string) $v );
						} else {
							foreach ( $v as $k1 => $v1 ) {
								$info[ $k ][ $k1 ] = str_replace( '#NO', (string) $diez_no, (string) $v1 );
							}
						}
					}
				}
			}

			if ( ! empty( $name ) ) {
				$max_blocks = ( 0 === (int) $info['content_p'] ) ? wp_rand( 1, 6 ) : $info['content_p'];
				if ( 3 === (int) self::$settings['content_type'] ) {
					// Gutenberg template.
					$description = self::$settings['gutenberg_template'];
				} else {
					$description = self::get_random_description( $text_elements, (int) $max_blocks );
				}

				$tags = [];
				if ( ! empty( $info['tags_list'] ) ) {
					$tags = self::get_random_tags( $info['tags_list'] );
				}

				/** Date and status related. */
				if ( ! empty( $info['specific_date'] ) ) {
					// This is the explict date selected by the user.
					$hour = empty( $info['specific_hour'] ) ? '00:00:00' : $info['specific_hour'] . ':00';
					$date = $info['specific_date'] . ' ' . $hour;
					$date = substr( $date, 0, 19 );
					$time = strtotime( $date );
				} else {
					$now_pref = - 1;
					if ( 2 === (int) $info['date_type'] ) {
						$now_pref = 1;
					} elseif ( 0 === (int) $info['date_type'] ) {
						$now_pref = wp_rand( 0, 10 );
						$now_pref = ( $now_pref > 5 ) ? 1 : - 1;
					}
					$time = $now + $now_pref * wp_rand( 1, 60 ) * DAY_IN_SECONDS;
					$date = gmdate( 'Y-m-d H:i:s', $time );
				}

				$status = $time > $now ? 'future' : 'publish';
				if ( 3 === $info['date_type'] && empty( $info['specific_status'] ) ) {
					if ( $time <= $now ) {
						$all_statuses = array_diff( $all_statuses, [ 'future' ] );
					}
					shuffle( $all_statuses );
					$status = reset( $all_statuses );
				} elseif ( 'future' !== $status && ! empty( $info['specific_status'] ) ) {
					$status = $info['specific_status'];
				}

				$prefix = '';
				if ( ! empty( $info['title_prefix'] ) ) {
					$last = $info['start_counter'];
					$last = (string) $last;
					if ( substr_count( $info['title_prefix'], '#NO' ) ) {
						$prefix = str_replace( '#NO', $last, $info['title_prefix'] ) . ' ';
						++self::$settings['start_counter'];
						update_option( 'spp_settings', self::$settings );
						$time += $last;
						$date  = gmdate( 'Y-m-d H:i:s', $time );
					} else {
						if ( ! empty( $last ) ) {
							// Reset the counter.
							self::$settings['start_counter'] = 0;
							update_option( 'spp_settings', self::$settings );
						}
						$prefix = $info['title_prefix'] . ' ';
					}
				}

				if ( true === $skip_prefix ) {
					$name = $prefix;
				} else {
					$name = $prefix . lcfirst( $name );
				}
				$name        = ucfirst( self::replace_text_tags( $name ) );
				$description = self::replace_text_tags( $description );

				$excerpt = '';
				if ( ! empty( $info['excerpt'] ) ) {
					if ( 2 === (int) $info['excerpt'] ) {
						$excerpt = wp_trim_words( self::get_random_description( $text_elements, 1, wp_rand( 0, count( $text_elements ) - 1 ) ), 25, '.' );
					} else {
						$excerpt = wp_trim_words( $description, 25, '.' );
					}
				}

				$cats = [];
				if ( ! empty( $maybe_terms['category']['ids'] ) ) {
					if ( empty( $maybe_terms['category']['random'] ) ) {
						$cats = $maybe_terms['category']['ids'];
					} else {
						$cats = self::get_random_tags( $maybe_terms['category']['ids'], $maybe_terms['category']['random'] );
					}

					if ( ! empty( $cats ) ) {
						// Map as integers, to link as terms ids.
						$cats = array_map( 'intval', $cats );
					}
				}

				$description = str_replace( '#[POST_TITLE]', $name, $description );
				$description = str_replace( '#[POST_EXCERPT]', $excerpt, $description );
				$author      = (int) $info['post_author'];

				$post = [
					'post_content'  => $description,
					'post_excerpt'  => $excerpt,
					'post_name'     => sanitize_title( $name ),
					'post_title'    => $name,
					'post_status'   => $status,
					'post_type'     => $info['post_type'],
					'post_date'     => $date,
					'tags_input'    => $tags,
					'post_author'   => ! empty( $author ) ? $author : get_current_user_id(),
					'post_parent'   => (int) $info['post_parent'],
					'post_category' => $cats,
				];

				$post    = apply_filters( 'spp_prepare_post_data', $post );
				$post_id = wp_insert_post( $post, true );
				if ( ! empty( $post_id ) ) {
					do_action( 'spp_after_post_inserted', $post_id, $post );
					update_post_meta( $post_id, 'spp_sample', 1 );

					if ( 0 === $info['has_sticky'] ) {
						if ( 1 === wp_rand( 0, 1 ) ) {
							stick_post( $post_id );
						}
					} elseif ( 1 === $info['has_sticky'] ) {
						stick_post( $post_id );
					}

					if ( ! empty( $maybe_terms ) ) {
						foreach ( $maybe_terms as $tax => $terms ) {
							if ( 'category' === $tax ) {
								// This is mapped separately.
								continue;
							}
							if ( ! empty( $terms['ids'] ) ) {
								if ( empty( $terms['random'] ) ) {
									$ids = $terms['ids'];
								} else {
									$ids = self::get_random_tags( $terms['ids'], $terms['random'] );
								}
							}
							if ( ! empty( $ids ) ) {
								// Map as integers, to link as terms ids.
								$ids = array_map( 'intval', $ids );
								wp_set_object_terms( $post_id, $ids, $tax, true );
							}
						}
					}
					if ( ! empty( $maybe_meta ) ) {
						foreach ( $maybe_meta as $meta ) {
							update_post_meta( $post_id, $meta['meta_key'], $meta['meta_value'] );
						}
					}

					do_action( 'spp_after_post_updated', $post_id, $post );

					$photo_src  = '';
					$thumb_src  = '';
					$photo_id   = 0;
					$skip_photo = ! empty( self::$settings['random_no_image'] ) && 0 === \wp_rand( 0, 10 ) % 2 ? true : false;
					if ( ! empty( $photos ) && ! $skip_photo ) {
						$photo_id = self::select_random_image( $photos );
						$photo_id = apply_filters( 'spp_before_post_image_attached', $photo_id, $post_id );
						if ( ! empty( $photo_id ) ) {
							// Set the image as post featured image.
							update_post_meta( (int) $post_id, '_thumbnail_id', $photo_id );

							$src       = wp_get_attachment_image_src( $photo_id, 'full' );
							$photo_src = ( ! empty( $src[0] ) ) ? $src[0] : '';

							$src       = wp_get_attachment_image_src( $photo_id, 'thumbnail' );
							$thumb_src = ( ! empty( $src[0] ) ) ? $src[0] : '';

							do_action( 'spp_after_post_image_attached', (int) $post_id, (int) $photo_id, $photo_src, $description );
						}
					}

					do_action( 'spp_after_post_processed', (int) $post_id, (int) $photo_id, $photo_src, $description );

					$image_embed    = ( ! empty( $thumb_src ) ) ? '<img src="' . esc_url( $thumb_src ) . '" width="80" style="max-width: 100%;" loading="lazy">' : '<span class="thumb_placeholder"></span>';
					$return_result .= '
					<li>
						<div class="row-span one-three">
							' . $image_embed . '
							<div>
								<a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '" class="button">' . __( 'Edit', 'spp' ) . '</a>
								<div>' . __( 'Status', 'spp' ) . ' <em class="tag-preview">' . $status . '</em></div>
								<div>' . __( 'Date', 'spp' ) . ' <em class="tag-preview">' . $date . '</em></div>
							</div>
						</div>
						<hr><h2>' . $name . '</h2>';
					if ( count( $tags ) !== 0 ) {
						$return_result .= '<br><b>' . __( 'Tags', 'spp' ) . '</b>: <em class="tag-preview">' . implode( ', ', $tags ) . '</em> ';
					}

					$post_categories = get_the_terms( $post_id, 'category' );
					if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
						$categories     = wp_list_pluck( $post_categories, 'name' );
						$return_result .= '<br><b>' . __( 'Categories', 'spp' ) . '</b>: <em class="tag-preview">' . implode( ', ', $categories ) . '</em>';
					}

					$first = explode( '</p>', $description );
					$first = $first[0];

					$return_result .= '<p>' . wp_trim_words( wp_strip_all_tags( $first ), 20 ) . '</p>
						<div class="clear"></div>
					</li>
					';
				}
			}
		}
		$return_result .= '</ol>';
		echo $return_result; // phpcs:ignore

		++$last;
		?>
		<input type="hidden" id="spp_latest_counter" value="<?php echo (int) $last; ?>">
		<?php
	}

	/**
	 * Extra actions after post image was attached.
	 *
	 * @param int    $post_id     Post ID.
	 * @param int    $image_id    Featured image ID.
	 * @param string $image_src   Featured image URL.
	 * @param string $description Post content.
	 */
	public static function spp_after_post_image_attached( $post_id, $image_id, $image_src = '', $description = '' ) { // phpcs:ignore
		$description = str_replace( '#[POST_ID]', (string) $post_id, $description );
		$description = str_replace( '#[FEATURED_IMAGE_ID]', (string) $image_id, $description );
		$description = str_replace( '#[FEATURED_IMAGE_URL]', (string) $image_src, $description );
		wp_update_post( [
			'ID'           => $post_id,
			'post_content' => $description,
		] );
	}

	/**
	 * Extra actions after the post was processed. When using Gutenberg
	 * templates, the blocks validation relies on real IDs for the media files.
	 *
	 * @param int    $post_id     Post ID.
	 * @param int    $image_id    Featured image ID.
	 * @param string $image_src   Featured image URL.
	 * @param string $description Post content.
	 */
	public static function spp_after_post_processed( $post_id, $image_id, $image_src = '', $description = '' ) { // phpcs:ignore
		$description = str_replace( '#[POST_ID]', (string) $post_id, $description );
		$description = str_replace( '#[FEATURED_IMAGE_ID]', (string) $image_id, $description );
		$description = str_replace( '#[FEATURED_IMAGE_URL]', (string) $image_src, $description );

		preg_match_all( '/#\[META_(.*?)\]/', $description, $matches );
		if ( ! empty( $matches[1] ) ) {
			foreach ( $matches[1] as $meta_key ) {
				$meta        = get_post_meta( $post_id, $meta_key, true );
				$description = str_replace( '#[META_' . $meta_key . ']', $meta ?? '', $description );
			}
		}

		wp_update_post( [
			'ID'           => $post_id,
			'post_content' => $description,
		] );
	}

	/**
	 * Make media image from URL and returns the new ID.
	 *
	 * @param  string $file_url An image URL.
	 * @return int
	 */
	public static function make_image_from_url( $file_url = '' ) { // phpcs:ignore
		$attach_id = 0;
		if ( ! empty( $file_url ) ) {
			if ( ! empty( intval( $file_url ) ) ) {
				update_post_meta( $file_url, 'spp_sample', 1 );
				return (int) $file_url;
			}

			$url_hash = str_replace( 'https:', '', $file_url );
			$url_hash = str_replace( 'http:', '', $url_hash );
			$url_hash = md5( $url_hash );
			// Identify the attachment already created, so we do not generate the same one.
			$args  = [
				'post_type'   => 'attachment',
				'post_status' => 'any',
				'meta_query'  => [ // phpcs:ignore
					'relation' => 'AND',
					[
						'key'     => 'spp_sample',
						'value'   => 1,
						'compare' => '=',
					],
					[
						'key'     => 'spp_sample_url',
						'value'   => $url_hash,
						'compare' => '=',
					],
				],
				'fields'      => 'ids',
			];
			$posts = new WP_Query( $args );
			if ( ! empty( $posts->posts ) ) {
				// This means that this image was already uploaded.
				return (int) reset( $posts->posts );
			}

			// Attempt to create a new image.
			$new_file_content = '';

			// Let's fetch the remote image.
			$response = wp_remote_get( $file_url );
			$code     = wp_remote_retrieve_response_code( $response );
			if ( 200 === $code ) {
				// Seems that we got a successful response from the remore URL.
				$content_type = wp_remote_retrieve_header( $response, 'content-type' );
				if ( ! empty( $content_type ) && substr_count( $content_type, 'image/' ) ) {
					// Seems that the content type is an image, let's get the body as the file content.
					$new_file_content = wp_remote_retrieve_body( $response );
				}
			} else {
				if ( empty( $new_file_content ) && substr_count( $file_url, get_site_url() ) ) {
					$new_file_content = @file_get_contents( $file_url ); // phpcs:ignore
				}

				if ( empty( $new_file_content ) ) {
					// Maybe try the non-https version.
					$file_url = str_replace( 'https', 'http', $file_url );
					$response = wp_remote_get( $file_url );
					$code     = wp_remote_retrieve_response_code( $response );
					if ( 200 === $code ) {
						// Seems that we got a successful response from the remore URL.
						$content_type = wp_remote_retrieve_header( $response, 'content-type' );
						if ( ! empty( $content_type ) && substr_count( $content_type, 'image/' ) ) {
							// Seems that the content type is an image, let's get the body as the file content.
							$new_file_content = wp_remote_retrieve_body( $response );
						}
					}
				}
			}
			if ( empty( $new_file_content ) ) {
				$new_file_content = @file_get_contents( $file_url ); // phpcs:ignore
			}

			if ( ! empty( $new_file_content ) ) {
				$parts        = wp_parse_url( $file_url );
				$new_filename = basename( $parts['path'] );
				$upload       = wp_upload_bits( $new_filename, null, $new_file_content );
				if ( empty( $upload['error'] ) ) {
					// Prepare an array of post data for the attachment.
					$attachment = [
						'guid'           => $upload['url'],
						'post_mime_type' => $upload['type'],
						'post_title'     => preg_replace( '/\.[^.]+$/', '', $new_filename ),
						'post_status'    => 'inherit',
						'comment_status' => 'closed',
						'ping_status'    => 'closed',
						'post_type'      => 'attachment',
					];

					// Insert the attachment.
					$attach_id = wp_insert_attachment( $attachment, $upload['file'] );
					if ( ! empty( $attach_id ) ) {
						$attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
						wp_update_attachment_metadata( $attach_id, $attach_data );
						update_post_meta( $attach_id, 'spp_sample', 1 );
						update_post_meta( $attach_id, 'spp_sample_url', $url_hash );
					}
				}
			}
		}

		return $attach_id;
	}

	/**
	 * Cleanup populated posts.
	 */
	public static function cleanup_plugin_posts() {
		// Identify the plugin populated posts and attempt to remove these.
		$args  = [
			'post_type'      => 'any',
			'post_status'    => 'any',
			'meta_query'     => [ // phpcs:ignore
				[
					'key'     => 'spp_sample',
					'value'   => 1,
					'compare' => '=',
				],
			],
			'fields'         => 'ids',
			'posts_per_page' => -1,
		];
		$posts = new WP_Query( $args );
		if ( ! empty( $posts->posts ) ) {
			foreach ( $posts->posts as $id ) {
				wp_delete_post( $id );
			}
		}
	}

	/**
	 * Add the rows actions filters.
	 */
	public static function add_admin_filters() {
		if ( ! empty( self::$allowed_post_types ) ) {
			add_filter( 'media_row_actions', [ get_called_class(), 'spp_post_listing_hint' ], 10, 2 );
			foreach ( self::$allowed_post_types as $slug => $name ) {
				add_filter( $slug . '_row_actions', [ get_called_class(), 'spp_post_listing_hint' ], 10, 2 );
			}
		}
	}

	/**
	 * Add the small icon in the listing for the post that was generated with this plugin.
	 *
	 * @param  array    $actions Actions.
	 * @param  \WP_Post $post    Current object.
	 * @return array
	 */
	public static function spp_post_listing_hint( array $actions = [], \WP_Post $post = null ): array {
		if ( empty( $post->ID ) ) {
			// Fail-fast, not a post.
			return $actions;
		}

		$meta = get_post_meta( $post->ID, 'spp_sample', true );
		if ( ! empty( $meta ) ) {
			$actions['spp-action'] = '<div class="dashicons dashicons-admin-generic" style="color: #facb35" title="' . esc_attr__( 'Easy Populate Posts', 'spp' ) . '"></div>';
		}

		return $actions;
	}

	/**
	 * Append the plugin URL.
	 *
	 * @param  array $links The plugin links.
	 * @return array
	 */
	public static function plugin_action_links( array $links ): array {
		$all   = [];
		$all[] = '<a href="' . esc_url( self::$plugin_url ) . '">' . __( 'Settings', 'spp' ) . '</a>';
		$all[] = '<a href="https://iuliacazan.ro/easy-populate-posts">' . __( 'Plugin URL', 'spp' ) . '</a>';
		$all   = array_merge( $all, $links );
		return $all;
	}

	/**
	 * The actions to be executed when the plugin is activated.
	 */
	public static function activate_plugin() {
		self::load_plugin_settings();
		update_option( 'spp_settings', self::$settings );
		update_option( 'spp_settings_groups', self::$settings_groups );
		set_transient( self::PLUGIN_TRANSIENT, true );
	}

	/**
	 * The actions to be executed when the plugin is deactivated.
	 */
	public static function deactivate_plugin() {
		self::plugin_admin_notices_cleanup( false );
		if ( ! empty( self::$settings['cleanup_on_deactivate'] ) ) {
			self::cleanup_plugin_posts();

			delete_option( 'spp_settings' );
			delete_option( 'spp_settings_groups' );
			// Attempt to remove the legacy temporary images, the new version is handling the images differently.
			if ( file_exists( self::$settings['legacy_images_path'] )
				&& is_dir( self::$settings['legacy_images_path'] ) ) {
				$dir = opendir( self::$settings['legacy_images_path'] );
				@rmdir( self::$settings['legacy_images_path'], true ); // phpcs:ignore
				while ( ( false !== ( $file = readdir( $dir ) ) ) ) {  // phpcs:ignore
					if ( '.' !== $file && '..' !== $file ) {
						@unlink( self::$settings['legacy_images_path'] . $file ); // phpcs:ignore
					}
				}
				closedir( $dir );
				@rmdir( self::$settings['legacy_images_path'] ); // phpcs:ignore
			}
		}
	}

	/**
	 * The actions to be executed when the plugin is updated.
	 */
	public static function plugin_ver_check() {
		$opt = str_replace( '-', '_', self::PLUGIN_TRANSIENT ) . '_db_ver';
		$dbv = get_option( $opt, 0 );
		if ( SPP_PLUGIN_VERSION !== (float) $dbv ) {
			update_option( $opt, SPP_PLUGIN_VERSION );
			self::activate_plugin();
		}
	}

	/**
	 * Execute notices cleanup.
	 *
	 * @param bool $ajax Is AJAX call.
	 */
	public static function plugin_admin_notices_cleanup( $ajax = true ) { // phpcs:ignore
		// Delete transient, only display this notice once.
		delete_transient( self::PLUGIN_TRANSIENT );

		if ( true === $ajax ) {
			// No need to continue.
			wp_die();
		}
	}

	/**
	 * Admin notices.
	 */
	public static function plugin_admin_notices() {
		if ( apply_filters( 'spp_filter_remove_update_info', false ) ) {
			return;
		}

		$maybe_trans = get_transient( self::PLUGIN_TRANSIENT );
		if ( ! empty( $maybe_trans ) ) {
			$slug   = md5( SPP_PLUGIN_SLUG );
			$ptitle = __( 'Easy Populate Posts', 'spp' );

			// Translators: %1$s - plugin name.
			$activated = sprintf( __( '%1$s plugin was activated!', 'spp' ), '<b>' . $ptitle . '</b>' );
			$donate    = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ&item_name=Support for development and maintenance (' . rawurlencode( $ptitle ) . ')';

			$thanks       = __( 'A huge thanks in advance!', 'spp' );
			$maybe_pro    = '';
			$other_notice = sprintf(
				// Translators: %1$s - plugins URL, %2$s - heart icon, %3$s - extensions URL, %4$s - star icon, %5$s - maybe PRO details.
				__( '%5$sCheck out my other <a href="%1$s" target="_blank" rel="noreferrer">%2$s free plugins</a> on WordPress.org and the <a href="%3$s" target="_blank" rel="noreferrer">%4$s other extensions</a> available!', 'spp' ),
				'https://profiles.wordpress.org/iulia-cazan/#content-plugins',
				'<span class="dashicons dashicons-heart"></span>',
				'https://iuliacazan.ro/shop/',
				'<span class="dashicons dashicons-star-filled"></span>',
				$maybe_pro
			);
			?>

			<div id="item-<?php echo \esc_attr( $slug ); ?>" class="notice is-dismissible">
				<div class="content">
					<a class="icon" href="<?php echo esc_url( self::$plugin_url ); ?>"><img src="<?php echo esc_url( SPP_PLUGIN_URL . 'assets/images/icon-128x128.gif' ); ?>"></a>
					<div class="details">
						<div>
							<h3><?php echo \wp_kses_post( $activated ); ?></h3>
							<div class="notice-other-items"><?php echo wp_kses_post( $other_notice ); ?></div>
						</div>
						<div><?php echo wp_kses_post( self::donate_text() ); ?></div>
						<a class="notice-plugin-donate" href="<?php echo esc_url( $donate ); ?>" target="_blank"><img src="<?php echo esc_url( SPP_PLUGIN_URL . 'assets/images/buy-me-a-coffee.png?v=' . SPP_PLUGIN_VERSION ); ?>" width="200"></a>
					</div>
				</div>
				<button type="button" class="notice-dismiss" onclick="dismiss_notice_for_<?php echo esc_attr( $slug ); ?>()"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'spp' ); ?></span></button>
			</div>
			<?php
			$style = '#trans123super{--color-bg:rgba(250,203,53,.1); --color-border:rgb(250,203,53); border-left-color:var(--color-border);padding:0 38px 0 0!important}#trans123super *{margin:0}#trans123super .dashicons{color:var(--color-border)}#trans123super a{text-decoration:none}#trans123super img{display:flex;}#trans123super .content,#trans123super .details{display:flex;gap:1rem;padding-block:.5em}#trans123super .details{align-items:center;flex-wrap:wrap;padding-block:0}#trans123super .details>*{flex:1 1 35rem}#trans123super .details .notice-plugin-donate{flex:1 1 auto}#trans123super .details .notice-plugin-donate img{max-width:100%}#trans123super .icon{background:var(--color-bg);flex:0 0 4rem;margin:-.5em 0;padding:1rem}#trans123super .icon img{display:flex;height:auto;width:4rem} #trans123super h3{margin-bottom:0.5rem;text-transform:none}';
			$style = str_replace( '#trans123super', '#item-' . esc_attr( $slug ), $style );
			echo '<style>' . $style . '</style>'; // phpcs:ignore
			?>
			<script>function dismiss_notice_for_<?php echo esc_attr( $slug ); ?>() { document.getElementById( 'item-<?php echo esc_attr( $slug ); ?>' ).style='display:none'; fetch( '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>?action=plugin-deactivate-notice-<?php echo esc_attr( SPP_PLUGIN_SLUG ); ?>' ); }</script>
			<?php
		}
	}
}

$spp = SISANU_Popupate_Posts::get_instance();
register_activation_hook( __FILE__, [ $spp, 'activate_plugin' ] );
register_deactivation_hook( __FILE__, [ $spp, 'deactivate_plugin' ] );
