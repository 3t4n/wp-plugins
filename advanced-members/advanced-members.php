<?php
/**
 * Plugin Name: Advanced Members for ACF
 * Plugin URI: https://advanced-members.com/
 * Description: Lightweight & All-in-One Membership Plugin for ACF Fans.
 * Version: 0.9.6
 * Author: DanbiLabs
 * Author URI: https://danbistore.com
 * Text Domain: advanced-members
 * Domain Path: /languages/
 * Requires at least: 5.8
 * Requires PHP: 7.1
 * Requires ACF: 6.2
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Advanced Members for ACF
 */

/**
 *
 * This plugin is inspired by Advanced Forms
 * https://wordpress.org/plugins/advanced-forms/
 * by Phil Kurth (Hookturn) http://hookturn.io/
 *
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

if ( ! trait_exists('AMem\Singleton') ) {
	require_once __DIR__ . '/core/traits/singleton.php';
}

if ( ! class_exists( 'AMem' ) ) :

/**
 * The main AMem class
 */
#[AllowDynamicProperties]
class AMem {
	use AMem\Singleton;

	public static $name = 'advanced-members';

	/** @var string version */
	public static $version = '0.9.6';

	/** @var string version */
	protected static $acf_required = '6.2.0';

	/** @var string */
	public static $plugin_file = __FILE__;

	/** @var array curront form data */
	protected $form = null;

	protected $form_args = null;

	/** @var array locally registered forms */
	public $local_forms = [];

	/** @var array locally registered forms */
	public $local_field_groups = [];

	/** @var array AMem Controller Modules */
	private $modules = [];

	/** @var array AMem Controller Extra/Pro Modules */
	private $ext_modules = [];

	/** @var mixed|null */
	public $show_admin;

	/** @var array temporary submission data */
	public $submission = [];

	/** @var array Form actions */
	private $actions = [];

	/** @var array Form remote actions */
	private $remote_actions = [];

	/** @var array AddOn container */
	private $addons = [];

	protected $dev = false;

	protected $is_amem = false;

	function __construct() {
		add_action( 'setup_theme', array( $this, 'setup_plugin' ), 10, 0 );
		$this->dev = defined( 'AMEM_DEV') && AMEM_DEV;
	}

	function __get($key) {
		if ( $class = $this->get_module($key) )
			return $class;

		if ( isset($this->$key) )
			return $this->$key;

		return null;
	}

	function __call($method, $args) {
		if ( ($class = $this->get_module($method)) && (is_a($class, 'AMem\Module') || is_a($class, 'AMem\Addon')) )
			return $class;
	}

	function is_dev() {
		return $this->dev;
	}

	function get($key) {
		return $this->__get($key);
	}

	function set_form($form, $args) {
		$this->form = $form;
		$this->form_args = $args;
	}

	function reset_form() {
		$this->form = $this->form_args = null;
	}

	function acf_version_check() {
		return defined('ACF_VERSION') && version_compare( ACF_VERSION, static::$acf_required, '>=' );
	}

	function acf_exists() {
		return function_exists('acf');
	}

	function acf_is_pro() {
		if ( function_exists('acf_is_pro') )
			return acf_is_pro();
		return defined( 'ACF_PRO' ) && ACF_PRO;
	}

	public function acf_inactive_notice() {
		if ( current_user_can( 'activate_plugins' ) && !$this->acf_exists() ) {
			$install_url = wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => 'advanced-custom-fields',
					),
					admin_url( 'update.php' )
				),
				'install-plugin_advanced-custom-fields'
			);

			$admin_notice_content = sprintf(
				/* translators: 1: strong open tag, 2: strong close tag, 3: ACF anchor open, 4: anchor close, 5: ACF Install anchor open, 6: anchor close */
				esc_html__( '%1$s Advanced Members for ACF is inactive.%2$s The %3$s Advanced Custom Fields plugin %4$s must be activated for Advanced Members for ACF to work. Please %5$s install & activate Advanced Custom Fields %6$s', 'advanced-members' ),
				'<strong>',
				'</strong>',
				'<a href="https://wordpress.org/plugins/advanced-custom-fields/">',
				'</a>',
				'<a href="' . esc_url( $install_url ) . '">',
				'</a>'
			);

			echo '<div class="notice notice-error error">';
			echo '<p>' . wp_kses_post( $admin_notice_content ) . '</p>';
			echo '</div>';
		}
	}

	public function acf_version_notice() {
		if ( current_user_can( 'activate_plugins' ) && !$this->acf_version_check() ) {
			if ( $this->acf_is_pro() )
				$plugin = 'advanced-custom-fields-pro/acf.php';
			else
				$plugin = 'advanced-custom-fields/acf.php';

			$update_url = wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'upgrade-plugin',
						'plugin' => urlencode($plugin),
					),
					admin_url( 'update.php' )
				),
				'upgrade-plugin_' . $plugin
			);

			$admin_notice_content = sprintf(
				/* translators: 1: strong open tag, 2: strong close tag, 3: ACF anchor open, 4: anchor close, 5: ACF update anchor open, 6: anchor close */
				esc_html__( '%1$sAdvanced Members for ACF is inactive.%2$s Installed %3$sAdvanced Custom Fields plugin%4$s is not compatible with Advanced Members for ACF. Please %5$supdate the plugin%6$s to 6.2.0 or later for Advanced Members for ACF to work.', 'advanced-members' ),
				'<strong>',
				'</strong>',
				'<a href="https://wordpress.org/plugins/advanced-custom-fields/">',
				'</a>',
				'<a href="' . esc_url( $update_url ) . '">',
				'</a>'
			);

			echo '<div class="notice notice-error error">';
			echo '<p>' . wp_kses_post( $admin_notice_content ) . '</p>';
			echo '</div>';
		}
	}

	/**
	 * Set up global constants and load textdomain.
	 * This needs to be called separately from acf/init to enable integration with translate.wordpress.org.
	 *
	 * @since 1.0
	 */
	function setup_plugin() {
		require_once( __DIR__ . '/core/functions-helpers.php' );

		$this->define( 'AMEM_NAME', static::$name );
		$this->define( 'AMEM_PATH', plugin_dir_path( __FILE__ ) );
		$this->define( 'AMEM_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'AMEM_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'AMEM_VERSION', static::$version );

		load_plugin_textdomain( 'advanced-members', false, basename( __DIR__ ) . '/languages' );

		if ( !$this->acf_exists() ) {
			add_action( 'admin_notices', array( $this, 'acf_inactive_notice' ), 10, 0 );
			return;
		}

		if ( !$this->acf_version_check() ) {
			add_action( 'admin_notices', array( $this, 'acf_version_notice' ), 10, 0 );
			return;
		}

		// Setup global plugin defaults
		$this->show_admin = false;

		add_action( 'acf/init', array( $this, 'load_plugin' ), 1, 0 );

		// load core functions
		amem_include( 'core/functions-submissions.php' );// submissions / submit 둘 중 하나 사용
		amem_include( 'core/functions-submit.php' );
		amem_include( 'core/functions-submissions.php' );
		amem_include( 'core/functions-forms.php' );

		// load abstracts
		amem_include( 'core/abstracts/module.php' );
		amem_include( 'core/abstracts/addon.php' );
		amem_include( 'core/abstracts/action.php' );
		amem_include( 'core/class-modules.php' );

		// load core modules
		amem_include( 'core/class-files.php' );
		amem_include( 'core/class-setup.php' );
		amem_include( 'core/class-config.php' );
		amem_include( 'core/class-options.php' );
		amem_include( 'core/class-fields.php' );
		amem_include( 'core/class-local.php' );
		amem_include( 'core/class-errors.php' );
		amem_include( 'core/class-template.php' );
		amem_include( 'core/class-user.php' );
		amem_include( 'core/class-account.php' );
		amem_include( 'core/class-locations.php' );
		amem_include( 'core/class-logout.php' );
		amem_include( 'core/class-password-reset.php' );
		amem_include( 'core/class-mail.php' );

		amem_include( 'core/class-blocks.php' );
		amem_include( 'core/class-rest.php' );

		do_action( 'amem/setup_plugin', AMEM_VERSION );

		// Apply hooks by modules
		$this->config->get_core_pages();
		$this->options->get_core_pages();
	}

	function load_plugin() {
		if ( ! $this->acf_exists() ) {
			return;
		}

		if ( is_admin() ) {
			amem_include( 'admin/class-admin.php' );
			amem_include( 'admin/class-admin-options.php' );
			amem_include( 'admin/class-admin-forms.php' );
		}

		// Register basic post types
		add_action( 'init', array( $this, 'register_post_types' ), 10, 0 );

		// Action used to register forms
		do_action( 'amem/register_forms' );

		// Load members form features for frontend
		amem_include( 'core/forms/render.php' );
		amem_include( 'core/foms/db.php' );
		amem_include( 'core/forms/submissions.php' );

		// Load Actions
		amem_include( 'core/forms/actions.php' );
		amem_include( 'core/actions/user.php' );
		do_action( 'amem/register_actions', AMEM_VERSION );

		// Load core addons
		global $wp_version;
		if ( version_compare( $wp_version, '5.4.0', '>=' ) && amem()->options->getmodule('_use_menu') )
			amem_include( 'core/modules/menu/class-items.php' );

		if ( amem()->options->getmodule('_use_redirects') )
			amem_include( 'core/modules/class-redirects.php' );

		if ( amem()->options->getmodule('_use_adminbar') )
			amem_include( 'core/modules/class-adminbar.php' );

		// Load AddOns
		do_action( 'amem/register_addons', AMEM_VERSION );

		do_action( 'amem/load' );
	}

	/**
	 * Plugin Activation
	 *
	 * @since 1.0
	 */
	function activation() {
		$this->single_activation();
	}

	function single_activation() {
		$this->setup->run_setup();
	}

	/**
	 * Register custom post types, forms and entries
	 *
	 * @since 1.0
	 */
	function register_post_types() {
		// Members post type
		$labels = array(
			'name' => _x( 'Members Forms', 'Post Type General Name', 'advanced-members' ),
			'singular_name' => _x( 'Form', 'Post Type Singular Name', 'advanced-members' ),
			'menu_name' => __( 'Members Forms', 'advanced-members' ),
			'name_admin_bar' => __( 'Form', 'advanced-members' ),
			'archives' => __( 'Form Archives', 'advanced-members' ),
			'parent_item_colon' => __( 'Parent Form:', 'advanced-members' ),
			'all_items' => __( 'Forms', 'advanced-members' ),
			'add_new_item' => __( 'Add New Form', 'advanced-members' ),
			'add_new' => __( 'Add New', 'advanced-members' ),
			'new_item' => __( 'New Form', 'advanced-members' ),
			'edit_item' => __( 'Edit Form', 'advanced-members' ),
			'update_item' => __( 'Update Form', 'advanced-members' ),
			'view_item' => __( 'View Form', 'advanced-members' ),
			'search_items' => __( 'Search Form', 'advanced-members' ),
			'not_found' => __( 'Not found', 'advanced-members' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'advanced-members' ),
			'featured_image' => __( 'Featured Image', 'advanced-members' ),
			'set_featured_image' => __( 'Set featured image', 'advanced-members' ),
			'remove_featured_image' => __( 'Remove featured image', 'advanced-members' ),
			'use_featured_image' => __( 'Use as featured image', 'advanced-members' ),
			'insert_into_item' => __( 'Insert into form', 'advanced-members' ),
			'uploaded_to_this_item' => __( 'Uploaded to this form', 'advanced-members' ),
			'items_list' => __( 'Forms list', 'advanced-members' ),
			'items_list_navigation' => __( 'Forms list navigation', 'advanced-members' ),
			'filter_items_list' => __( 'Filter forms list', 'advanced-members' ),
		);
		$args = array(
			'label' => __( 'Form', 'advanced-members' ),
			'description' => __( 'Form', 'advanced-members' ),
			'labels' => $labels,
			'supports' => array( 'title', ),
			'hierarchical' => false,
			'public' => false,
			// 'show_ui' => $this->show_admin,
			'show_ui' => true,
			'_builtin' => false,
			'show_in_menu' => $this->show_admin,
			'menu_icon' => 'dashicons-list-view',
			'menu_position' => 80,
			'show_in_admin_bar' => false,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'page',
			'query_var' => false,
		);
		register_post_type( 'amem-form', $args );
	}

	public function define( $name, $value = true ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	private function register_thing($type, $name, $class) {
		$baseClasses = [
			'addons' => 'AMem\AddOn',
			'modules' => 'AMem\Module',
			'actions' => 'AMem\Action',
			// 'user' => 'AMem\User',
			'ext_modules' => 'AMem\Module',
		];

		if ( !isset($this->modules[$type]) ) {
			$this->modules[$type] = new AMem\Modules($type, $baseClasses[$type]);
		}

		return $this->modules[$type]->register($name, $class);
	}

	private function get_thing($type, $name) {
		if ( !isset($this->modules[$type]) || !is_a($this->modules[$type], 'AMem\Modules') )
			return null;

		return $this->modules[$type]->get($name);
	}

	private function get_things() {
		if ( !isset($this->modules[$type]) || !is_a($this->modules[$type], 'AMem\Modules') )
			return null;

		return $this->modules[$type]->modules();

		// @todo: Returns sorted by priority
		// this means all class objects has public $priority variable
		return array_keys($this->$type);
	}

	public function register_module($name, $class) {
		return $this->register_thing('modules', $name, $class);
	}

	public function get_module($name='') {
		return $this->get_thing('modules', $name);
	}

	public function register_ext_module($name, $class) {
		return $this->register_thing('ext_modules', $name, $class);
	}

	public function get_ext_module($name='') {
		return $this->get_thing('ext_modules', $name);
	}

	public function get_modules() {
		return $this->get_things('modules');
	}

	public function register_addon($name, $class) {
		return $this->register_thing('addons', $name, $class);
	}

	public function get_addon($name='') {
		return $this->get_thing('addons', $name);
	}

	public function get_addons() {
		return $this->get_things('addons');
	}

	public function register_action($name, $class) {
		return $this->register_thing('actions', $name, $class);
	}

	public function get_action($name='') {
		return $this->get_thing('actions', $name);
	}

	public function get_actions() {
		return $this->get_things('actions');
	}

	public function is_amem() {
		return $this->is_amem || amem()->submission;
	}

	public function set_amem($bool=true) {
		$this->is_amem = $bool;
	}

	public function is_request( $type ) {
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' ) && DOING_AJAX;
			case 'cron' :
				return defined( 'DOING_CRON' ) && DOING_CRON;
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}

		return false;
	}

}

function amem() {
	global $amem;

	if ( ! isset( $amem ) ) {
		$amem = AMem::getInstance();
	}

	return $amem;
}

// Initalize plugin
amem();

endif;
