<?php

/*
Plugin Name: Photo Portfolio Gallery
Plugin URI: https://webpace.net/wordpress-photo-portfolio-gallery/
Description: Portfolio Gallery plugin offers best solutions for demonstrating you photo and video projects. Categorize your images and let your visitors enjoy them.
Version: 1.0.5
Author: Portfolio Gallery Team
Author URI: https://webpace.net
License: GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: photo-photo-portfolio
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

include_once('configuration.php');


//registerBlockType( 'photo-portfolio-gallery/photo-portfolio', { title: __( 'Book' ) } );



function gutenberg_photo_portfolio_gallery_block()
{

	wp_register_script(
		'photo-portfolio-gallery-block-1',
		plugins_url('assets/js/block.js', __FILE__),
		array('wp-blocks', 'wp-element', 'wp-components')
	);
	wp_register_style(
		'photo-portfolio-gallery-block-1',
		plugins_url('assets/style/editor.css', __FILE__),
		array('wp-edit-blocks'),
		filemtime(plugin_dir_path(__FILE__) . 'assets/style/editor.css')
	);

	global $wpdb;

	$portfolios = $wpdb->get_results("SELECT id,name FROM " . $wpdb->prefix . "web_paceportfolio_portfolios");

	$options = array(
		array(
			'value' => '',
			'label' => 'Select Portfolio'
		)
	);

	foreach ($portfolios as $portfolio) {
		$options[] = array(
			'value' => $portfolio->id,
			'label' => $portfolio->name,
		);
	}

	wp_localize_script('photo-portfolio-gallery-block-1', 'photoPortfolioBlockI10n', array(
		'portfolios' => $options
	));
	if (function_exists('register_block_type')) {
		register_block_type('photo-portfolio-gallery/photo-portfolio', array(
			'editor_script' => 'photo-portfolio-gallery-block-1',
			'editor_style' => 'photo-portfolio-gallery-block-1',
		));
	}
}
add_action( 'init', 'gutenberg_photo_portfolio_gallery_block' );


function photo_portfolio_gallery_block_categories( $categories, $post ) {
	if ( $post->post_type !== 'post' ) {
		return $categories;
	}
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'photo-portfolio-gallery',
				'title' => __( 'WebPace Portfolio', 'photo-portfolio' ),
				'icon'  => 'wordpress',
			),
		)
	);
}
add_filter( 'block_categories', 'photo_portfolio_gallery_block_categories', 10, 2 );



if ( ! class_exists( 'Photo_Gallery' ) ) :

final class Photo_Gallery {

	/**
	 * Version of plugin
	 * @var float
	 */
	public $version = '1.0.5';

	/**
	 * Instance of Photo_Gallery_Admin class to manage admin
	 * @var Photo_Gallery_Admin instance
	 */
	public $admin = null;

	/**
	 * Instance of Photo_Gallery_Template_Loader class to manage admin
	 * @var Photo_Gallery_Template_Loader instance
	 */
	public $template_loader = null;

	/**
	 * The single instance of the class.
	 *
	 * @var Photo_Gallery
	 */
	protected static $_instance = null;

	/**
	 * Main Photo_Gallery Instance.
	 *
	 * Ensures only one instance of Photo_Gallery is loaded or can be loaded.
	 *
	 * @static
	 * @see Photo_Gallery()
	 * @return Photo_Gallery - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'photo-portfolio' ), '2.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	private function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'photo-portfolio' ), '2.1' );
	}

	/**
	 * Photo_Gallery Constructor.
	 */
	private function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
		global $photo_gallery_url,$photo_gallery_path;
		$photo_gallery_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
		$photo_gallery_url = plugins_url('', __FILE__ );
		do_action( 'photo_gallery_loaded' );
	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {
		register_activation_hook( __FILE__, array( 'Photo_Gallery_Install', 'install' ) );
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'plugins_loaded', array($this,'load_plugin_textdomain') );
		add_action( 'widgets_init', array( 'Photo_Gallery_Widgets', 'init' ) );
	}

	/**
	 * Define Photo Portfolio Constants.
	 */
	private function define_constants() {
		$this->define( 'PHOTO_PORTFOLIO_PLUGIN_FILE', __FILE__ );
		$this->define( 'PHOTO_PORTFOLIO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'PHOTO_PORTFOLIO_VERSION', $this->version );
		$this->define( 'PHOTO_PORTFOLIO_IMAGES_PATH', $this->plugin_path(). DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR );
		$this->define( 'PHOTO_PORTFOLIO_IMAGES_URL', untrailingslashit($this->plugin_url() . '/assets/images/' ));
		$this->define( 'PHOTO_PORTFOLIO_TEMPLATES_PATH', $this->plugin_path() . DIRECTORY_SEPARATOR . 'views');
		$this->define( 'PHOTO_PORTFOLIO_TEMPLATES_URL', untrailingslashit($this->plugin_url()) . '/views/');
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	
	/**
	 * What type of request is this?
	 * string $type ajax, frontend or admin.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return  ! is_admin() && ! defined( 'DOING_CRON' );
		}
	}
	
	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {
		include_once( 'includes/photo-portfolio-functions.php' );
		include_once( 'includes/photo-portfolio-video-functions.php' );
		if ( $this->is_request( 'admin' ) ) {
			include_once( 'includes/admin/photo-portfolio-admin-functions.php' );
		}
		if ( $this->is_request( 'frontend' ) ) {
			$this->frontend_includes();
		}

	}

	/**
	 * Include required core files used in front end
	 */
	public function frontend_includes(){
        include_once( 'includes/admin/photo-portfolio-admin-functions.php' );
	}

	/**
	 * Load plugin text domain
	 */
	public function load_plugin_textdomain(){
		load_plugin_textdomain( 'photo-portfolio', false, $this->plugin_path() . '/languages/' );
	}

	/**
	 * Init Photo Portfolio when WordPress `initialises.
	 */
	public function init() {
		// Before init action.
		do_action( 'before_photo_gallery_init' );

        Photo_Gallery_Install::init();

		$this->template_loader = new Photo_Gallery_Template_Loader();

		if ( $this->is_request( 'admin' ) ) {

			$this->admin = new Photo_Gallery_Admin();

			new Photo_Gallery_Admin_Assets();

		}

		new Photo_Gallery_Frontend_Scripts();

		new Photo_Gallery_Ajax();

		new Photo_Gallery_Shortcode();



		// Init action.
		do_action( 'photo_gallery_init' );
	}

	/**
	 * Get Ajax URL.
	 * @return string
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}

	/**
	 * Photo Portfolio Plugin Path.
	 *
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Photo Portfolio Plugin Url.
	 * @return string
	 */
	public function plugin_url() {
		return plugins_url( '', __FILE__ );
	}
}

endif;

function Photo_Gallery(){
	return Photo_Gallery::instance();
}

$GLOBALS['Photo_Gallery'] = Photo_Gallery();