<?php
/**
 * Plugin Name: AR Model Viewer
 * Description: AR Model Viewer for Woocommerce and Elementor.
 * Plugin URI:  https://bitbute.tech/
 * Version:     2.1.0
 * Author:      BitBute
 * Author URI:  https://bitbute.tech
 * Text Domain: ar-model-viewer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Add widget categories
// include('widget-categories.php');

/**
 * Main AR Model Viewer Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class AR_Model_Viewer {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '2.1.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.2';

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var AR_Model_Viewer The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return AR_Model_Viewer An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->i18n();

		if (is_admin()) {
			add_filter( 'mime_types', [$this, 'my_theme_custom_upload_mimes'] );
			require_once plugin_dir_path(  __FILE__  ) . '/admin/ar-model-viewer-admin.php';
			new AR_Model_Viewer_Admin();
		} else {
			add_action('template_redirect', function () {
				require_once plugin_dir_path(  __FILE__  ) . '/public/ar-model-viewer-public.php';
				new AR_Model_Viewer_Public();
			});
		}


		add_action('plugins_loaded', [$this, 'load_elementor_widget']);


		add_filter('script_loader_tag', [$this, 'add_type_to_script'], 1, 3);
		wp_register_script( 'model-viewer', plugins_url( 'js/libs/model-viewer.min.js', __FILE__, [], '3.0.0' ) );
		wp_enqueue_script('model-viewer');
		remove_filter('script_loader_tag',[ $this, 'add_type_to_script' ]);

        wp_enqueue_style( 'AR Model Viewer', plugins_url( 'css/ar-model-viewer-public.css', __FILE__ ) );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'ar-model-viewer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}


	public function load_elementor_widget()
	{

		if ($this->is_compatible()) {
			add_action('elementor/init', [$this, 'init_elementor']);
		}
	}

	public function init_elementor() {

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		
		// Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        
        // Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// add_action('elementor/editor/after_save', [ $this,'track_model_usage_limit' ], 10, 2);
    }


	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets()
	{

		// Include Widget files
		require_once(__DIR__ . '/widgets/viewer.php');

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \AR_ModelViewer_Widget());
	}


	function my_theme_custom_upload_mimes($existing_mimes)
	{
		// Add webm to the list of mime types.
		$existing_mimes['glb'] = 'application/octet-stream';
		// Return the array back to the function with our added mime type.
		return $existing_mimes;
	}


	/**
	 * Compatibility Checks
	 *
	 * Checks if the installed version of Elementor meets the plugin's minimum requirement.
	 * Checks if the installed PHP version meets the plugin's minimum requirement.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function is_compatible()
	{

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			// add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return false;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			// add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return false;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			// add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return false;
		}

		return true;
	}

	/**
	 * Init Styles
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function widget_styles()
	{

		// EXAMPLES
		// wp_enqueue_style( 'widget-1', plugins_url( 'css/widget-1.css', __FILE__ ) );
		// wp_enqueue_style( 'widget-2', plugins_url( 'css/widget-2.css', __FILE__ ) );

		wp_enqueue_style('AR Model Viewer', plugins_url('../css/elementor-widget.css', __FILE__));
	}

	/**
	 * Init Scripts
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function widget_scripts()
	{
	}

	public function add_type_to_script($tag, $handle, $src)
	{
		if ($handle == 'model-viewer') {
			$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
		}
		return $tag;
	}


	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls()
	{

		// Include Widget files
		require_once(__DIR__ . '/admin/controls/fileselect-control.php');

		// Register controls
		\Elementor\Plugin::$instance->controls_manager->register_control('file-select', new \FileSelect_Control());
	}
/*
	function track_model_usage_limit($post_id, $editor_data)
	{
		// print_r(json_encode($editor_data));

		return;
		if ($widget instanceof \Elementor\AR_ModelViewer_Widget ) {
			// Custom widget is being used
			// Add your tracking code here to capture usage data
			// done
		}

		return $content;
	}
*/
}

AR_Model_Viewer::instance();