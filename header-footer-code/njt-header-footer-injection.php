<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ninjateam.org/
 * @since             1.0.8
 * @package           Nj_Product
 *
 * @wordpress-plugin
 * Plugin Name:       NinjaTeam Header Footer Custom Code
 * Plugin URI:        https://ninjateam.org/header-footer-code
 * Description:       This is simple plugin to insert script, CSS, tag to header and footer
 * Version:           1.2
 * Author:            Ninja Team
 * Author URI:        https://ninjateam.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       njt-header-footer
 * Domain Path:       /languages
 */
/**
* Class Header and Footer Injection
*/

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * 
 */
define( 'NJT_HEADER_FOOTER_VERSION', '1.2' );

define( 'NJT_HEADER_FOOTER_TEXT_DOMAIN', 'njt-header-footer' );

define( 'NJT_HEADER_FOOTER_DISPLAY_NAME', 'Header Footer Code' );

class Njt_Header_Footer{
	
	public function __construct()
	{

		add_action( 'admin_init', array( $this, 'register_setting' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_action( 'admin_enqueue_scripts',  array( $this, 'enqueue_styles' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'wp_head', array( $this, 'front_header' ) );

		add_action( 'wp_head', array( $this, 'front_css' ) );

		add_action( 'wp_footer', array( $this, 'front_footer' ) );

	}

	public function admin_menu() {

        add_options_page(
            $this->get_display_name(),
            $this->get_display_name(),
            'manage_options',
            'njt-header-footer',
            array(
                $this,
                'settings_page'
            )
        );

    }

	public function register_setting(){

	 	register_setting( 'njt-header-footer-settings-group', 'njt_hf_header' );

	 	register_setting( 'njt-header-footer-settings-group', 'njt_hf_css' );

		register_setting( 'njt-header-footer-settings-group', 'njt_hf_footer' );

	}

	public function settings_page(){

		include 'view/setting.php';

	}

	public function enqueue_styles() {

		wp_enqueue_style( NJT_HEADER_FOOTER_TEXT_DOMAIN . 'codemirror', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/codemirror.css', array(), NJT_HEADER_FOOTER_VERSION, 'all' );

		wp_enqueue_style( NJT_HEADER_FOOTER_TEXT_DOMAIN, plugin_dir_url( __FILE__ ) . 'assets/css/admin.css', array(), NJT_HEADER_FOOTER_VERSION, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_media();

		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'codemirror', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/codemirror.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );

		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'xml', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/xml.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );
		
		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'javascript', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/javascript.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );

		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'css', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/css.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );

		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'htmlmixed', plugin_dir_url( __FILE__ ) . 'assets/lib/codemirror/htmlmixed.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );

		wp_enqueue_script(NJT_HEADER_FOOTER_TEXT_DOMAIN . 'admin', plugin_dir_url( __FILE__ ) . 'assets/js/app.js', array( 'jquery' ), NJT_HEADER_FOOTER_VERSION, false );

	}

	public function front_header(){

		$meta =get_option( 'njt_hf_header' );
		$this->render($meta);
	}

	public function front_footer(){

		$meta = get_option( 'njt_hf_footer' );
		$this->render($meta);
	}

	public function front_css(){

		$meta = esc_html( get_option( 'njt_hf_css' ) );
		$content = "<style type=\"text/css\">{$meta}</style>" ;
		$this->render($content);
	}

	private function get_display_name(){

		return __(NJT_HEADER_FOOTER_DISPLAY_NAME, NJT_HEADER_FOOTER_TEXT_DOMAIN);

	}

	private function wp_kses_allowed_html( $cus_attr_tags = [] ){
		$allowed_html_tags           = wp_kses_allowed_html( 'post' );
        $allowed_html_tags['style']  = true;
		$allowed_html_tags['script']   = [];

        $allowed_html_attr           = $cus_attr_tags;

        return array_map(
            function ( $item ) use ( $allowed_html_attr ) {
                return is_array( $item ) ? array_merge( $item, $allowed_html_attr ) : $item;
            },
            $allowed_html_tags
        );
	}

	private function render($content){
		$allowed_html = $this->wp_kses_allowed_html();

		echo wp_kses( $content, $allowed_html);
	}
}

new Njt_Header_Footer();