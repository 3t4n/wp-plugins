<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class ACDM_AcademyDiviModules extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'academy-divi-modules';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'academy-divi-modules';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = ACDM_VERSION;

	/**
	 * ACDM_AcademyDiviModules constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */	

	public function __construct( $name = 'academy-divi-modules', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );

		$this->load_dependencies();
	}

	public function load_dependencies() {
		require_once $this->plugin_dir . 'classes/Dependency.php';
		require_once $this->plugin_dir . 'classes/Assets.php';
		require_once $this->plugin_dir . 'classes/Helper.php';
	}
	
}

new ACDM_AcademyDiviModules;