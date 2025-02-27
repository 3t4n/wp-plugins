<?php
/**
 * @package Make Builder
 */

/**
 * Class MAKE_API
 *
 * Class to manage and provide access to all of the modules that make up the Make API.
 *
 * Access this class via the global Make() function.
 *
 * @since 1.0.0.
 */
final class MAKE_API extends MAKE_Util_Modules implements MAKE_APIInterface, MAKE_Util_HookInterface {
	/**
	 * An associative array of required modules.
	 *
	 * @since 1.0.0.
	 *
	 * @var array
	 */
	protected $dependencies = array(
		'notice'     => 'MAKE_Admin_NoticeInterface',
		'error'      => 'MAKE_Error_CollectorInterface',
		'plus'       => 'MAKE_Plus_MethodsInterface',
		'scripts'    => 'MAKE_Setup_ScriptsInterface',
		'style'      => 'MAKE_Style_ManagerInterface',
		'sanitize'   => 'MAKE_Settings_SanitizeInterface',
		'formatting' => 'MAKE_Formatting_ManagerInterface',
		'builder'    => 'MAKE_Builder_SetupInterface',
		'setup'      => 'MAKE_Setup_MiscInterface',
		'sections'   => 'MAKE_Sections_SetupInterface',
		'gutenberg'  => 'MAKE_Gutenberg_ManagerInterface'
	);

	/**
	 * An associative array of the default classes to use for each dependency.
	 *
	 * @since 1.0.0.
	 *
	 * @var array
	 */
	private $defaults = array(
		'notice'     => 'MAKE_Admin_Notice',
		'error'      => 'MAKE_Error_Collector',
		'plus'       => 'MAKE_Plus_Methods',
		'scripts'    => 'MAKE_Setup_Scripts',
		'style'      => 'MAKE_Style_Manager',
		'sanitize'   => 'MAKE_Settings_Sanitize',
		'formatting' => 'MAKE_Formatting_Manager',
		'builder'    => 'MAKE_Builder_Setup',
		'setup'      => 'MAKE_Setup_Misc',
		'sections'   => 'MAKE_Sections_Setup',
		'gutenberg'  => 'MAKE_GutenberG_Manager'
	);

	/**
	 * Indicator of whether the hook routine has been run.
	 *
	 * @since 1.0.0.
	 *
	 * @var bool
	 */
	private static $hooked = false;

	/**
	 * MAKE_API constructor.
	 *
	 * @since 1.0.0.
	 *
	 * @param array $modules
	 */
	public function __construct( array $modules = array() ) {
		$modules = wp_parse_args( $modules, $this->get_default_modules() );

		parent::__construct( $this, $modules );
	}

	/**
	 * Hook into WordPress.
	 *
	 * @since 1.0.0.
	 *
	 * @return void
	 */
	public function hook() {
		if ( $this->is_hooked() ) {
			return;
		}

		// Hooking has occurred.
		self::$hooked = true;
	}

	/**
	 * Check if the hook routine has been run.
	 *
	 * @since 1.0.0.
	 *
	 * @return bool
	 */
	public function is_hooked() {
		return self::$hooked;
	}

	/**
	 * Getter for the private defaults array.
	 *
	 * @since 1.0.0.
	 *
	 * @return array
	 */
	private function get_default_modules() {
		return $this->defaults;
	}

	/**
	 * Return the specified module without running its load routine.
	 *
	 * @since 1.0.0.
	 *
	 * @param string $module_name
	 *
	 * @return null
	 */
	public function inject_module( $module_name ) {
		// Module exists.
		if ( $this->has_module( $module_name ) ) {
			return $this->modules[ $module_name ];
		}

		// Module doesn't exist. Use the get_module method to generate an error.
		else {
			return $this->get_module( $module_name );
		}
	}
}
