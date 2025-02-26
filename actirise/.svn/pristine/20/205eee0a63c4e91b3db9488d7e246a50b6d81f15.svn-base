<?php
namespace ActiriseAdmin\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\AbstractCore;
use Actirise\Includes\Api;
use Actirise\Includes\Cron;
use Actirise\Includes\Helpers;
use Actirise\Includes\Options;
use Actirise\Includes\I18n;
use ActiriseAdmin\Includes\View;
use ActiriseAdmin\Includes\Ajax;
use ActiriseAdmin\Includes\BadgeManager;
use ActirisePublic\Includes\AdsTxt;
use ActirisePublic\Includes\Debug;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two hooks to
 * enqueue the admin-facing stylesheet and JavaScript.
 * As you add hooks and methods, update this description.
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/admin/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class Core extends AbstractCore {
	/**
	 * The ajax of the plugin.
	 *
	 * @since    2.0.0
	 * @access   public
	 * @var      Ajax    $ajax    The ajax of the plugin.
	 */
	public $ajax;

	/**
	 * The views of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      View    $views    The views of the plugin.
	 */
	private $views;

	private $badge_manager;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param    string                    $plugin_name                            The name of this plugin.
	 * @param    string                    $plugin_prefix                          The unique prefix of this plugin.
	 * @param    string                    $version                                The version of this plugin.
	 * @param    \Actirise\Includes\I18n   $i18n           The i18n of this plugin.
	 * @param    \Actirise\Includes\Loader $loader     The loader of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_prefix, $version, $i18n, $loader ) {
		$this->plugin_name   = $plugin_name;
		$this->plugin_prefix = $plugin_prefix;
		$this->version       = $version;
		$this->i18n          = $i18n;
		$this->loader        = $loader;

		$this->badge_manager = new BadgeManager();
		$this->views         = new View();
		$this->ajax          = new Ajax( $plugin_name );

		$this->register_ajax_event();
		$this->settings_init();
		$this->check_debug_token();

		$this->badge_manager->init();
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.0.0
	 * @param string $hook_suffix The current admin page.
	 * @return void
	 */
	public function enqueue_scripts( $hook_suffix ) {
		wp_register_script( $this->plugin_name, ACTIRISE_URL . 'admin/assets/js/main-' . $this->version . '.js', array(), $this->version, true );
		wp_register_style( $this->plugin_name, ACTIRISE_URL . 'admin/assets/css/main-' . $this->version . '.css', array(), $this->version );


		$this->localize_script( $hook_suffix );

		wp_enqueue_script( $this->plugin_name );
		wp_enqueue_style( $this->plugin_name );

		add_filter( 'script_loader_tag', array( $this, 'transform_to_module' ), 10, 3 );
	}

	/**
	 * Transform script to module
	 *
	 * @param string $tag The script tag.
	 * @param string $handle The script handle.
	 * @param string $src The script src.
	 *
	 * @return string
	 */
	public function transform_to_module( $tag, $handle, $src ) {
		if ( 'actirise' === $handle ) {
			$tag = str_replace( '<script ', '<script type="module" ', $tag );
		}

		return $tag;
	}

	/**
	 * Register the page for the admin area.
	 *
	 * @since    2.0.0
	 * @param string $hook_suffix The current admin page.
	 * @return void
	 */
	public function add_plugin_admin_menu( $hook_suffix ) {
		$count_mod = count( $this->badge_manager->get_badges() );

		add_menu_page( 'Actirise', $count_mod > 0 ? 'Actirise <span class="awaiting-mod actirise-badge" style="padding: 0 6px;">' . $count_mod . '</span>' : 'Actirise', 'manage_options', 'actirise-settings', array( $this, 'view_settings' ), plugins_url( 'actirise/admin/assets/images/icon-actirise.png' ), 2 );
	}

	/**
	 * Register the page for the admin area.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function view_settings() {
		$this->views->render( 'page-settings', array() );
	}

	/**
	 * Register the settings link in the plugins list.
	 *
	 * @since    2.0.0
	 * @param array<string> $links The current links.
	 * @return array<string>
	 */
	public function add_action_links( $links ) {
		$settings_link = '<a href="' . $this->get_page_url() . '">' . __( 'Settings', 'actirise' ) . '</a>';

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Check if plugin is configured.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function check_settings() {
		if ( ( Options::get( 'settings-uuid' ) === null || Options::get( 'settings-uuid' ) === false ) ) {
			$this->views->admin_notice( 'notice-uuid-setting', array( 'url' => $this->get_page_url() ) );
		}
	}

	/**
	 * Run the migrations of the plugin.
	 *
	 * @since    2.4.0
	 * @return void
	 */
	public function migrations() {
		$migrations = new Migrations( $this->plugin_name, $this->version );
		$migrations->migrate();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.0.0
	 * @access   public
	 * @return   void
	 */
	public function set_locale() {
		$plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

		$this->i18n = $plugin_i18n;
	}

	/**
	 * Add action to check if debug token exists.
	 *
	 * @since    2.5.5
	 * @access   private
	 * @return   void
	 */
	private function check_debug_token() {
		$debug = new Debug( $this->plugin_name );
		$this->loader->add_action( 'admin_init', $debug, 'check_token' );
	}

	/**
	 * Register actirise js object
	 *
	 * @since    2.0.0
	 * @param string $hook_suffix The current admin page.
	 * @return void
	 */
	private function localize_script( $hook_suffix ) {
		$current_user = wp_get_current_user();

		wp_localize_script(
			$this->plugin_name,
			'actiriseJS',
			array(
				'api_url'       => ACTIRISE_URL_API,
				'api_url_v2'    => ACTIRISE_URL_API_V2,
				'api_token'     => Options::get( 'settings-analytics-token', '' ),
				'api_userid'    => Options::get( 'settings-analytics-userid', '' ),
				'currency'      => Options::get( 'currency', 'USD' ),
				'plugin_url'    => plugins_url( $this->plugin_name ),
				'current_theme' => wp_get_theme()->get( 'Name' ),
				'nonce'         => wp_create_nonce( $this->plugin_name . '-settings' ),
				'init'          => Options::get( 'init', 'false' ),
				'uuid'          => Options::get( 'settings-uuid' ),
				'type'          => Options::get( 'settings-uuid-type', 'boot' ),
				'ajaxurl'       => admin_url( 'admin-ajax.php' ),
				'siteurl'       => site_url(),
				'domain'        => wp_parse_url( site_url() ),
				'cron'          => defined( 'ACTIRISE_CRON' ) && ACTIRISE_CRON === 'true',
				'tidy'          => extension_loaded( 'tidy' ),
				'bidders'       => array(),
				'noPub'         => Options::get( 'nopub', array() ),
				'debug'         => Options::get( 'debug-enabled', true ) ? 'true' : 'false',
				'country_code'  => substr( get_bloginfo( 'language', 'raw' ), 3 ),
				'website_name'  => get_bloginfo( 'name' ),
				'website_url'   => get_bloginfo( 'url' ),
				'email'         => $current_user->user_email,
				'auto_update'   => Helpers::has_auto_update() ? 'true' : 'false',
				'customVar'     => array(
					'form'     => $this->get_custom_v_form(),
					'selected' => array(
						'custom1' => Options::get( 'custom1', 'author_ID' ),
						'custom2' => Options::get( 'custom2', 'category_0_slug' ),
						'custom3' => Options::get( 'custom3', 'post_ID' ),
						'custom4' => Options::get( 'custom4', '' ),
						'custom5' => Options::get( 'custom5', '' ),
					),
				),
				'version'       => array(
					'current' => ACTIRISE_VERSION,
					'wp'      => get_bloginfo( 'version' ),
				),
				'adstxt'        => array(
					'actirise' => AdsTxt::get_adstxt( false ),
					'file'     => Options::get( 'adstxt-file', 'false' ) === 'true',
					'custom'   => Options::get( 'adstxt-custom', array() ),
					'enabled'  => Options::get( 'adstxt-active', 'false' ) === 'true',
					'update'   => Options::get( 'adstxt-update', 'false' ) === 'true',
				),
				'presizedDiv'   => array(
					'actirise' => Options::get( 'presizeddiv-actirise', array() ),
					'selected' => Options::get( 'presizeddiv-selected', array() ),
					'enabled'  => Options::get( 'presizeddiv-active', 'false' ) === 'true',
					'notif'    => Options::get( 'presizeddiv-notif', array() ),
				),
				'cache'         => array(
					'wprocket'     => defined( 'WP_ROCKET_VERSION' ),
					'wpmeteor'     => defined( 'WPMETEOR_VERSION' ),
					'litespeed'    => defined( 'LSCWP_V' ),
					'w3totalcache' => defined( 'W3TC_VERSION' ),
					'notif'        => Options::get( 'cta-cache-200', false ) === false,
				),
				'fastcmp'       => Helpers::get_fastcmp_options( false ),
				'badges'        => $this->badge_manager->get_badges(),
			)
		);
	}

	/**
	 * Register the ajax event for the admin area.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	private function register_ajax_event() {
		$this->loader->add_action( 'wp_ajax_' . $this->get_plugin_prefix() . 'ajax_action', $this->ajax, 'dispatch' );
	}

	/**
	 * Get all custom v available
	 *
	 * @since 2.0.0
	 * @return array<mixed> All custom v available
	 */
	private function get_custom_v_form() {
		$base_array = array(
			array(
				'name'  => __( 'Not used', 'actirise' ),
				'value' => '',
			),
			array(
				'name'  => __( 'Author', 'actirise' ),
				'value' => 'author_ID',
			),
			array(
				'name'  => __( 'Post', 'actirise' ),
				'value' => array(
					array(
						'name'  => __( 'ID', 'actirise' ),
						'value' => 'post_ID',
					),
					array(
						'name'  => __( 'Slug', 'actirise' ),
						'value' => 'post_post_name',
					),
					array(
						'name'  => __( 'Type', 'actirise' ),
						'value' => 'post_post_type',
					),
				),
			),
			array(
				'name'  => __( 'Category Level 1', 'actirise' ),
				'value' => array(
					array(
						'name'  => __( 'ID', 'actirise' ),
						'value' => 'category_0_cat_ID',
					),
					array(
						'name'  => __( 'Slug', 'actirise' ),
						'value' => 'category_0_slug',
					),
					array(
						'name'  => __( 'Title', 'actirise' ),
						'value' => 'category_0_name',
					),
					array(
						'name'  => __( 'Parent', 'actirise' ),
						'value' => 'category_0_category_parent',
					),
				),
			),
			array(
				'name'  => __( 'Category Level 2', 'actirise' ),
				'value' => array(
					array(
						'name'  => __( 'ID', 'actirise' ),
						'value' => 'category_1_cat_ID',
					),
					array(
						'name'  => __( 'Slug', 'actirise' ),
						'value' => 'category_1_slug',
					),
					array(
						'name'  => __( 'Title', 'actirise' ),
						'value' => 'category_1_name',
					),
					array(
						'name'  => __( 'Parent', 'actirise' ),
						'value' => 'category_1_category_parent',
					),
				),
			),
			array(
				'name'  => __( 'Tag Level 1', 'actirise' ),
				'value' => array(
					array(
						'name'  => __( 'ID', 'actirise' ),
						'value' => 'tag_0_term_id',
					),
					array(
						'name'  => __( 'Slug', 'actirise' ),
						'value' => 'tag_0_slug',
					),
					array(
						'name'  => __( 'Title', 'actirise' ),
						'value' => 'tag_0_name',
					),
					array(
						'name'  => __( 'Parent', 'actirise' ),
						'value' => 'tag_0_parent',
					),
				),
			),
			array(
				'name'  => __( 'Tag Level 2', 'actirise' ),
				'value' => array(
					array(
						'name'  => __( 'ID', 'actirise' ),
						'value' => 'tag_1_term_id',
					),
					array(
						'name'  => __( 'Slug', 'actirise' ),
						'value' => 'tag_1_slug',
					),
					array(
						'name'  => __( 'Title', 'actirise' ),
						'value' => 'tag_1_name',
					),
					array(
						'name'  => __( 'Parent', 'actirise' ),
						'value' => 'tag_1_parent',
					),
				),
			),
		);

		$custom_fields = $this->get_custom_fields();

		if ( $custom_fields !== null && count( $custom_fields ) > 0 ) {
			$custom_fields = array_map(
				function ( $field ) {
					return array(
						'name'  => ucfirst( $field['meta_key'] ),
						'value' => 'customFields_' . $field['meta_key'],
					);
				},
				$custom_fields
			);

			$base_array[] = array(
				'name'  => __( 'Custom Field', 'actirise' ),
				'value' => $custom_fields,
			);
		}

		return $base_array;
	}

	/**
	 * Get all custom fields.
	 *
	 * @since 2.0.0
	 * @return array<array<string>>
	 */
	private function get_custom_fields() {
		global $wpdb;

		$cache_key = 'actirise_cache_custom_fields';
		$_posts    = wp_cache_get( $cache_key );

		if ( false === $_posts ) {
			$_posts = $wpdb->get_results(
				"SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key NOT LIKE '\_%'",
				ARRAY_A
			);

			wp_cache_set( $cache_key, $_posts, '', 3600 );
		}

		return $_posts;
	}

	/**
	 * Init settings option
	 *
	 * @since 2.0.0
	 * @return void
	 */
	private function settings_init() {
		$cron = new Cron();

		if ( Options::get( 'fastcmp-uuid', '' ) === '' ) {
			$cron->get_fast_cmp();
		}

		if ( Options::get( 'presizeddiv-init' ) !== '1' ) {
			$cron->check_presized_div();

			Options::update( 'presizeddiv-init', true );
		}

		if ( ! Options::exists( 'debug-enabled' ) ) {
			Options::update( 'debug-enabled', true );
		}

		if (
			Options::get( 'settings-analytics-userid', '' ) !== '' &&
			Options::get( 'settings-analytics-token', '' ) !== ''
		) {
			$this->get_user_currency();
		}

		if ( Options::get( 'custom1' ) === false ) {
			Options::update( 'custom1', 'author_ID' );
		}

		if ( Options::get( 'custom2' ) === false ) {
			Options::update( 'custom2', 'category_0_slug' );
		}

		if ( Options::get( 'custom3' ) === false ) {
			Options::update( 'custom3', 'post_ID' );
		}
	}

	/**
	 * Get page url.
	 *
	 * @since 2.0.0
	 * @return string
	 */
	private function get_page_url() {
		return add_query_arg( array( 'page' => 'actirise-settings' ), admin_url( 'admin.php' ) );
	}

	/**
	 * Get user currency
	 *
	 * @since 2.3.15
	 * @return void
	 */
	private function get_user_currency() {
		/** @var string $token */
		$token = Options::get( 'settings-analytics-token', '' );

		if ( $token === '' ) {
			return;
		}

		$api      = new Api();
		$response = $api->get( 'api', 'users/' . Options::get( 'settings-analytics-userid', '' ), array(), $token );

		if ( is_wp_error( $response ) ) {
			return;
		}

		/** @var array<object{currency: string}> $response */
		if ( isset( $response['currency'] ) ) {
			Options::update( 'currency', $response['currency'] );
		}
	}
}
