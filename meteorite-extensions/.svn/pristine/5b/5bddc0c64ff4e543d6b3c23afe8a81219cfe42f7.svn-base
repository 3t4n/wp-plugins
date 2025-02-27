<?php

/**
 *
 * @link			https://terra-themes.com
 * @since			1.0
 * @package			Meteorite_Extensions
 *
 * @wordpress-plugin
 * Plugin Name:		Meteorite Extensions
 * Description:		Meteorite Extensions registers many widgets and extends support for the page builder by SiteOrigin and Elementor for the Meteorite Theme by Terra Themes.
 * Version:			1.10.1
 * Author:			Terra Themes
 * Author URI:		https://terra-themes.com
 * License:			GPL-2.0+
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:		meteorite_extensions
 * Domain Path:		/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Meteorite_Extensions {

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'setup_theme', array( $this, 'includes' ), 11 );
		add_action( 'admin_notices', array( $this, 'admin_notice' ), 4 );
		add_action( 'widgets_init', array( $this, 'meteorite_extensions_widgets_init' ), 10 );
		add_action( 'admin_enqueue_scripts', array( $this, 'meteorite_extensions_enqueue_widget_scripts' ), 9 );

		// Elementor actions
		add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'meteorite_extensions_elementor_editor_scripts' ), 4 );
		add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'meteorite_extensions_elementor_frontend_scripts' ), 4 );
	}

	/**
	 * Constants
	 */
	function constants() {
		define( 'ME_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'ME_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * Translations
	 */
	function i18n() {
		load_plugin_textdomain( 'meteorite_extensions', false, 'meteorite-extensions/languages' );
	}

	/**
	 * Includes
	 */
	function includes() {
		require_once( ME_DIR . 'inc/page-builder.php' );
		require_once( ME_DIR . 'inc/page-options.php' );
		require_once( ME_DIR . 'inc/post-options.php' );
		require_once( ME_DIR . 'inc/project-options.php' );
		require_once( ME_DIR . 'inc/widgets/loader.php' );
		require_once( ME_DIR . 'inc/functions.php' );
		require_once( ME_DIR . 'inc/customizer.php' );
		require_once( ME_DIR . 'inc/admin/demo-import-setup.php' );
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Register widget area.
	 */
	function meteorite_extensions_widgets_init() {
		//Register widgets
		register_widget( 'Meteorite_List_With_Icons' );
		register_widget( 'Meteorite_Clients' );
		register_widget( 'Meteorite_Testimonials' );
		register_widget( 'Meteorite_Skills' );
		register_widget( 'Meteorite_Action' );
		register_widget( 'Meteorite_Video_Widget' );
		register_widget( 'Meteorite_Employees' );
		register_widget( 'Meteorite_Projects' );
		register_widget( 'Meteorite_Projects_Carousel' );
		register_widget( 'Meteorite_Text_With_Icon' );
		register_widget( 'Meteorite_Contact_Info' );
		register_widget( 'Meteorite_Latest_News' );
		register_widget( 'Meteorite_Latest_News_Carousel' );
		register_widget( 'Meteorite_Social_Media' );
		register_widget( 'Meteorite_Facts' );
		register_widget( 'Meteorite_Tabs' );
		register_widget( 'Meteorite_Image_Frame' );
		register_widget( 'Meteorite_Pricing_Table' );
		register_widget( 'Meteorite_Skills_Circle' );
		register_widget( 'Meteorite_Buttons' );
	}

	/**
	 * Enqueue media upload scripts and styles for widgets
	 */
	function meteorite_extensions_enqueue_widget_scripts() {
		wp_enqueue_style( 'tt-metabox', ME_URI . 'inc/widgets/assets/terra-themes-metabox-style.css', array(), true );
		wp_enqueue_script( 'tt-metabox-scripts', ME_URI . 'inc/widgets/assets/terra-themes-metabox-scripts.js', array('jquery'), '', true );
		// WordPress library
		wp_enqueue_media();
	}

	/**
	 * Enqueue media upload scripts and styles for widgets in Elementor Page Builder (editor)
	 */
	function meteorite_extensions_elementor_editor_scripts() {
		wp_enqueue_style( 'tt-metabox', ME_URI . 'inc/widgets/assets/terra-themes-metabox-style.css', array(), true );
		wp_enqueue_script( 'tt-metabox-scripts', ME_URI . 'inc/widgets/assets/terra-themes-metabox-scripts.js', array('jquery'), '', true );
	}

	/**
	 * Enqueue media upload scripts and styles for widgets in Elementor Page Builder (frontend)
	 */
	function meteorite_extensions_elementor_frontend_scripts() {
		wp_enqueue_script( 'tt-metabox-scripts', ME_URI . 'inc/widgets/assets/elementor-frontend.js', array('jquery'), '', true );
	}

	/**
	 * Admin notice
	 */
	function admin_notice() {
		$theme 	= wp_get_theme();
		$parent = wp_get_theme()->parent();

		if ( $theme != 'Meteorite' && $parent != 'Meteorite' ) {
			echo '<div class="error">';
			echo 	'<p>' . __('The <strong>Meteorite Extensions</strong> plugin might not work with your current theme. It is meant to be used with <a href="http://wordpress.org/themes/meteorite/" target="_blank">Meteorite</a> from Terra Themes.</p>', 'meteorite-extensions');
			echo '</div>';
		}
	}

}

function meteorite_extensions_plugin() {
		return Meteorite_Extensions::get_instance();
}
add_action( 'plugins_loaded', 'meteorite_extensions_plugin', 1 );

