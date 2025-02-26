<?php
namespace Author_Profile_Widget_Wp;

final class Profile_Widget_WP {
	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The addon version.
	 */

	const VERSION = '1.0.3';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the addon.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '3.5.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */

	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Author_Profile_Widget\Profile_Widget The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \Author_Profile_Widget\Profile_Widget  An instance of the class.
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
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function __construct() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	 
	public function is_compatible() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	public function wpdeen_allowed_tags()
    {
        $allowed_tags = array(
            'strong' => array(),
        );

        return $allowed_tags;
    }


	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_missing_main_plugin() {

		$message = sprintf(
			/* translators: %1$s is replaced with "Deen Author Profile Widget"  and %2$s is replaced with "Elementor"*/
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'deen-author-profile-widget' ),
			'<strong>' . esc_html__( 'Deen Author Profile Widget', 'deen-author-profile-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'deen-author-profile-widget' ) . '</strong>'

		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->wpdeen_allowed_tags()) );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_minimum_elementor_version() {

		$message = sprintf(
			/* translators: %1$s is replaced with "Deen Author Profile Widget", %2$s is replaced with "Elementor", %3$s is replaced with "3.8.0" */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'deen-author-profile-widget' ),
			'<strong>' . esc_html__( 'Deen Author Profile Widget', 'deen-author-profile-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'deen-author-profile-widget' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION

		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->wpdeen_allowed_tags()) );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_minimum_php_version() {

		$message = sprintf(
			/* translators: %1$s is replaced with "Deen Author Profile Widget", %2$s is replaced with "php", %3$s is replaced with "7.4" */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'deen-author-profile-widget' ),
			'<strong>' . esc_html__( 'Deen Author Profile Widget', 'deen-author-profile-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'deen-author-profile-widget' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
			 
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->wpdeen_allowed_tags()) );

	}

	/**
	 * Initialize
	 *
	 * Load the addons functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	
	public function init() {
		add_action( 'plugins_loaded', [$this, 'wpdeen_load_text_domain'] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'wpdeen_frontend_styles' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'wpdeen_frontend_scripts' ] );
		add_action( 'elementor/editor/before_enqueue_styles', [ $this, 'wpdeen_editor_styles' ] );
		add_action( 'elementor/widgets/register', [ $this, 'wpdeen_register_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [$this,'wpdeen_add_categories']);
	}

	public function wpdeen_load_text_domain() {
		load_plugin_textdomain( 'deen-author-profile-widget' , false, WPDEEN_URL . '/languages' );
	}

	public function wpdeen_frontend_styles() {

		wp_register_style( 'wpdeen-bootstrap-css', WPDEEN_ASSETS_URL . 'css/bootstrap.min.css', null, self::VERSION , false );
		wp_register_style( 'wpdeen-style-css', WPDEEN_ASSETS_URL . 'css/style.css' , null, self::VERSION , false);

		wp_enqueue_style( 'wpdeen-bootstrap-css' );
		wp_enqueue_style( 'wpdeen-style-css' );

	}

	public function wpdeen_frontend_scripts(){ 

		wp_register_script( 'wpdeen-fontawesome-js', WPDEEN_ASSETS_URL  . 'js/fontawesome.min.js' , [ 'jquery' ] , self::VERSION , true );
		wp_register_script( 'wpdeen-bootstrap-js', WPDEEN_ASSETS_URL  . 'js/bootstrap.bundle.min.js' , [ 'jquery' ] , self::VERSION , true );

		wp_enqueue_script( 'wpdeen-fontawesome-js' );
		wp_enqueue_script( 'wpdeen-bootstrap-js' );

	}

	public function wpdeen_editor_styles(){

		wp_register_style( 'wpdeen-editor-css', WPDEEN_ASSETS_URL . 'css/editor.css',  null, self::VERSION , false);
		wp_enqueue_style( 'wpdeen-editor-css' );

	}
	
	function wpdeen_register_widgets( $widgets_manager ) {

		require_once(  __DIR__ . '/widgets/wpdeen-profile-widget.php' );
		$widgets_manager->register( new \Profile_Widget_WP() );

	}

	function wpdeen_add_categories( $wpdeen_elements_manager ) {

		$wpdeen_elements_manager->add_category(
			'wpdeen_profile_category',
			[
				'title' => esc_html__( 'Deen Author Profile Widget', 'deen-author-profile-widget' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}

  

}