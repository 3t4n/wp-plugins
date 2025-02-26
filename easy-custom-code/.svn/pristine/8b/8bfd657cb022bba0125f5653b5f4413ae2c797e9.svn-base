<?php
/* ======================================================
 # Easy Custom Code (LESS/CSS/JS) - Live editing for WordPress - v1.1.2 (free version)
 # -------------------------------------------------------
 # Author: Web357
 # Copyright © 2014-2025 Web357. All rights reserved.
 # License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
 # Website: https://www.web357.com/easy-custom-code-wordpress-plugin
 # Demo: https://demo-wordpress.web357.com/
 # Support: https://www.web357.com/support
 # Last modified: Friday 31 January 2025, 12:48:01 AM
 ========================================================= */
class EasyCustomCode_Public {

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
	 * The options of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options    The current options of this plugin.
	 */
	public $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options = (object) get_option( 'easy_custom_code_options' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// CSS Libraries
		$items_css = json_decode(get_option('hidden_web357_customizer_json_items_css', ''));
		if (!empty($items_css)) {
			for ($i = 0; $i < count($items_css); $i++) {
				wp_enqueue_style('easy-custom-code-lib-' . ($i + 1), esc_url($items_css[$i]), [], '[VERSION]');
			}
		}

		// Less compiling
		if (is_customize_preview()) {
			$web357_theme_customizer_code_less_css = get_option('web357_theme_customizer_code_less_css', '');
			echo '<style rel="stylesheet/less" type="text/less">'.($web357_theme_customizer_code_less_css).'</style>';
			wp_enqueue_script('less-js', plugins_url('js/less.min.js', __FILE__), [], $this->version, true); 
		} else {
			// Custom CSS
			$wp_upload_dir = wp_upload_dir();
			$upload_dir = $wp_upload_dir['basedir'] . '/easy-custom-code/css';
			$upload_dir_base_url = $wp_upload_dir['baseurl'] . '/easy-custom-code/css';
			$get_web357_customizer_random_file_name_suffix = get_option('web357_customizer_random_file_name_suffix', '');
			$css_file_name = 'style'; // remove this in v1.0.2

			if (!file_exists($upload_dir)) {
				$upload_dir = $wp_upload_dir['basedir'];
				$upload_dir_base_url = $wp_upload_dir['baseurl'];
				$get_web357_customizer_random_file_name_suffix = '';
				$css_file_name = 'custom'; // remove this in v1.0.2
			}

			$css_file_name = (!empty($get_web357_customizer_random_file_name_suffix)) ? 'style_' . $get_web357_customizer_random_file_name_suffix : $css_file_name;

			if (file_exists($upload_dir . '/' . $css_file_name . '.css')) {
				wp_register_style('easy-custom-code', $upload_dir_base_url . '/' . $css_file_name . '.css', [], '[VERSION]');
				wp_enqueue_style('easy-custom-code');
			}
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() 
	{
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.min.js', array( 'jquery' ), $this->version, false );
	}
}