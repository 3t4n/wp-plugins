<?php

define( 'DAIO_ADDONS_DIR', DIVI_AIO_DIR . 'includes/addons/' );

class DaioExtension extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'daio';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'aio-for-divi';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	private $get_settings;

	/**
	 * DAIO_AioForDivi constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'aio-for-divi', $args = array() ) {

		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
		
		add_action( 'customize_preview_init', array( $this, 'preview_scripts' ) );

		$this->load_require_files();
		$this->load_enabled_extensions();

		add_action( 'wp_enqueue_scripts', array( $this, 'register_module_scripts'), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts') );

		if ( is_admin() ) {
			// Ajax requests.
			// add_action( 'wp_ajax_daio_activate_module', array( $this, 'activate_module' ) );
			// add_action( 'wp_ajax_daio_deactivate_module', array( $this, 'deactivate_module' ) );
		}
		
		add_filter( 'body_class', array( $this, 'body_classes' ), 11, 1 );
	}

	/**
	 * Body class
	 */
	public function body_classes( $classes ) {
		$classes[] = esc_attr( 'divi-aio-' . DIVI_AIO_VER );
		return $classes;
	}

	/**
	 * Includes
	 */
	public function load_require_files() {
		
		// Core
		require_once DIVI_AIO_DIR . 'includes/core/common-functions.php';
		require_once DIVI_AIO_DIR . 'includes/core/class-plugin-strings.php';
		require_once DIVI_AIO_DIR . 'includes/core/daio-hooks.php';

		require_once DIVI_AIO_DIR . 'includes/class-daio-helper.php';
		require_once DIVI_AIO_DIR . 'includes/class-daio-admin-settings.php';
		require_once DIVI_AIO_DIR . 'includes/customizer/class-daio-customizer.php';
	}

		/**
	 * Enable Active Extensions
	 */
	public function load_enabled_extensions() {

		$this->get_settings = DAIO_Admin::get_enabled_settings();

		if( $this->get_settings['svg-support'] === 1 ) :
			require_once DAIO_ADDONS_DIR . 'svg-support/class-daio-svg-support.php';
		endif;

		if( $this->get_settings['advanced-headers'] === 1 ) :
			require_once DAIO_ADDONS_DIR . 'advanced-headers/class-daio-advanced-headers.php';
		endif;

		if( $this->get_settings['advanced-footer'] === 1 ) :
			require_once DAIO_ADDONS_DIR . 'advanced-footer/class-daio-advanced-footer.php';
		endif;

	}

	/**
	 *  Module Script
	 *  
	 * @since 1.0.0
	 */
	function register_module_scripts() {
		
		$js_files = DAIO_Helper::get_module_scripts();

		foreach ( $js_files as $handle => $data ) {
			wp_register_script( $handle, DIVI_AIO_URI . $data['path'], $data['dep'], DIVI_AIO_VER, $data['in_footer'] );
   		wp_enqueue_script( $handle );
		}

	}

	/**
	 * Plugin Script
	 * 
	 * @since 1.0.0
	 */
	function register_plugin_scripts() {
		wp_enqueue_style( 'daio-styles', DIVI_AIO_URI . 'assets/css/daio-styles.css' , array(), DIVI_AIO_VER, 'all' );
		wp_add_inline_style( 'daio-styles', apply_filters( 'daio_dynamic_css', '' ) );
	}

	/**
	 * Customizer Preview
	 */
	function preview_scripts() {
		wp_enqueue_script( 
			'daio-customize-preview-js',
			DIVI_AIO_URI . 'assets/js/customizer-preview.js', 
			array( 'customize-preview' ), 
			DIVI_AIO_VER, 
			true 
		);
	}

	/**
	 * Debug when dev mode
	 * @return [type] [description]
	 */
	protected function _enqueue_debug_bundles() {
		$site_url       = wp_parse_url( get_site_url() );
		$hot_bundle_url = "http://localhost:3000/static/js/frontend-bundle.js";
		wp_enqueue_script( "{$this->name}-frontend-bundle", $hot_bundle_url, $this->_bundle_dependencies['frontend'], $this->version, true );
		if ( et_core_is_fb_enabled() ) {
			$hot_bundle_url = "http://localhost:3000/static/js/builder-bundle.js";
			wp_enqueue_script( "{$this->name}-builder-bundle", $hot_bundle_url, $this->_bundle_dependencies['builder'], $this->version, true );
		}
	}

}

new DaioExtension;