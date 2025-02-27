<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class UM_ForumWP
 */
class UM_ForumWP {

	/**
	 * @var
	 */
	private static $instance;

	/**
	 * @return UM_ForumWP
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * UM_ForumWP constructor.
	 */
	function __construct() {
		add_filter( 'plugins_loaded', array( &$this, 'init' ) );

		add_filter( 'um_call_object_ForumWP', array( &$this, 'get_this' ) );
		add_filter( 'um_settings_default_values', array( &$this, 'default_settings' ), 10, 1 );

		add_filter( 'um_override_templates_scan_files', array( &$this, 'extend_scan_files' ) );
		add_filter( 'um_override_templates_get_template_path__um-forumwp', array( &$this, 'get_path_template' ), 10, 2 );
	}


	/**
	 * @return $this
	 */
	function get_this() {
		return $this;
	}


	/**
	 * @param $defaults
	 *
	 * @return array
	 */
	function default_settings( $defaults ) {
		$defaults = array_merge( $defaults, $this->setup()->settings_defaults );
		return $defaults;
	}


	/**
	 * Init
	 */
	function init() {
		$this->account();
		$this->profile();
		$this->permissions();
		$this->integrations();

		if ( is_admin() ) {
			$this->admin();
		}
	}


	/**
	 * @return um_ext\um_forumwp\core\ForumWP_Setup()
	 */
	function setup() {
		if ( empty( UM()->classes['um_forumwp_setup'] ) ) {
			UM()->classes['um_forumwp_setup'] = new um_ext\um_forumwp\core\ForumWP_Setup();
		}
		return UM()->classes['um_forumwp_setup'];
	}

	/**
	 * @return um_ext\um_forumwp\core\Account
	 */
	function account() {
		if ( empty( UM()->classes['um_forumwp_account'] ) ) {
			UM()->classes['um_forumwp_account'] = new um_ext\um_forumwp\core\Account();
		}
		return UM()->classes['um_forumwp_account'];
	}

	/**
	 * @return um_ext\um_forumwp\core\ForumWP_Profile()
	 */
	function profile() {
		if ( empty( UM()->classes['um_forumwp_profile'] ) ) {
			UM()->classes['um_forumwp_profile'] = new um_ext\um_forumwp\core\ForumWP_Profile();
		}
		return UM()->classes['um_forumwp_profile'];
	}


	/**
	 * @return um_ext\um_forumwp\core\Integrations()
	 */
	function integrations() {
		if ( empty( UM()->classes['um_forumwp_integrations'] ) ) {
			UM()->classes['um_forumwp_integrations'] = new um_ext\um_forumwp\core\Integrations();
		}
		return UM()->classes['um_forumwp_integrations'];
	}


	/**
	 * @return um_ext\um_forumwp\core\ForumWP_Admin()
	 */
	function admin() {
		if ( empty( UM()->classes['um_forumwp_admin'] ) ) {
			UM()->classes['um_forumwp_admin'] = new um_ext\um_forumwp\core\ForumWP_Admin();
		}
		return UM()->classes['um_forumwp_admin'];
	}


	/**
	 * @return um_ext\um_forumwp\core\ForumWP_Permissions()
	 */
	function permissions() {
		if ( empty( UM()->classes['um_forumwp_permissions'] ) ) {
			UM()->classes['um_forumwp_permissions'] = new um_ext\um_forumwp\core\ForumWP_Permissions();
		}
		return UM()->classes['um_forumwp_permissions'];
	}

	/**
	 * Scan templates from extension
	 *
	 * @param $scan_files
	 *
	 * @return array
	 */
	public function extend_scan_files( $scan_files ) {
		$extension_files['um-forumwp'] = UM()->admin_settings()->scan_template_files( um_forumwp_path . '/templates/' );
		$scan_files                    = array_merge( $scan_files, $extension_files );

		return $scan_files;
	}

	/**
	 * Get template paths
	 *
	 * @param $located
	 * @param $file
	 *
	 * @return array
	 */
	public function get_path_template( $located, $file ) {
		if ( file_exists( get_stylesheet_directory() . '/ultimate-member/um-forumwp/' . $file ) ) {
			$located = array(
				'theme' => get_stylesheet_directory() . '/ultimate-member/um-forumwp/' . $file,
				'core'  => um_forumwp_path . 'templates/' . $file,
			);
		}

		return $located;
	}
}

//create class var
add_action( 'plugins_loaded', 'um_init_forumwp', -10 );
function um_init_forumwp() {
	if ( function_exists( 'UM' ) ) {
		UM()->set_class( 'ForumWP', true );
	}
}
