<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/public
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */
class Aarambha_Kits_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * [get_styles] All Style
	 *
	 * @return [array]
	 */
	public function get_styles() {

		$style_list = array(
			'swiper'      => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/library/swiper/swiper-bundle.css',
				'version' => '8.0.7',
			),
			'aarambha-kits-heroslider'   => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/heroslider.css',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'swiper' ),
			),
			'aarambha-kits-newsticker'   => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/newsticker.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postslayout1' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postslayout1.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postslayout2' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postslayout2.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postslayout3' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postslayout3.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postslayout4' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postslayout4.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postslayout5' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postslayout5.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-postsslider'  => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/postsslider.css',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'swiper' ),
			),
			'aarambha-kits-featuredpost' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/featuredpost.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-cta'          => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/cta.css',
				'version' => AARAMBHA_KITS_VERSION,
			),
			'aarambha-kits-service'      => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/service.css',
				'version' => AARAMBHA_KITS_VERSION,
			),

		);
		return $style_list;

	}

	/**
	 * [get_scripts] All Script
	 *
	 * @return [array]
	 */
	public function get_scripts() {

		$script_list = array(

			'swiper'      => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/library/swiper/swiper-bundle.js',
				'version' => '8.0.7',
				'deps'    => array( 'jquery' ),
			),
			'newsTicker'  => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/library/jquery-newsTicker/jquery.newsTicker.js',
				'version' => '1.0.11',
				'deps'    => array( 'jquery' ),
			),
			'aarambha-kits-heroslider'   => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/js/heroslider.js',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'swiper' ),
			),
			'aarambha-kits-newsticker'   => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/js/newsticker.js',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'newsTicker' ),
			),
			'aarambha-kits-postsslider'  => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/js/postsslider.js',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'swiper' ),
			),
		);

		return $script_list;

	}


	/**
	 * Register the CSS/JavaScript Resources for the admin area.
	 *
	 * Use Condition to Load it Only When it is Necessary
	 *
	 * @since    1.0.0
	 */
	public function enqueue_resources() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aarambha_Kits_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aarambha_Kits_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 // Enquery Script
		wp_enqueue_script( 'aarambha-kits-public', AARAMBHA_KITS_URL . 'assets/build/js/public.js', array( 'jquery' ), AARAMBHA_KITS_VERSION );
		wp_script_add_data( 'aarambha-kits-public', 'strategy', 'defer' );

		// Enquery Styles
		wp_enqueue_style( 'aarambha-kits-public', AARAMBHA_KITS_URL . 'assets/build/css/public.css', false, AARAMBHA_KITS_VERSION );

		// inline style
		wp_add_inline_style( 'aarambha-kits-public', Aarambha_Kits_Inline_Style::css_output( 'front-end' ) );

		$scripts = self::get_scripts();
		$styles  = self::get_styles();

		// Register Scripts
		foreach ( $scripts as $handle => $script ) {
			$deps = ( isset( $script['deps'] ) ? $script['deps'] : false );
			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
			wp_script_add_data( $handle, 'strategy', 'defer' );
		}
		
		// Register Styles
		foreach ( $styles as $handle => $style ) {
			$deps = ( isset( $style['deps'] ) ? $style['deps'] : false );
			wp_register_style( $handle, $style['src'], $deps, $style['version'] );
		}

	}

}
