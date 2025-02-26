<?php
/**
 * Defines the public-facing functionality of the plugin.
 *
 *
 * @package    Aqi_Widget
 * @subpackage Aqi_Widget/public
 * @author     Mid-Ohio Regional Planning Commission <gohio@morpc.org>
 */
class Aqi_Widget_Public {
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
	 * Initializes the class and sets its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name  The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Registers the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function aqi_register_styles() {
		wp_register_style( 'aqi-styles', plugin_dir_url( __FILE__ ) . 'css/aqi-widget-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Registers the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function aqi_register_scripts() {
		wp_register_script( 'aqi-settings-script', plugin_dir_url( __FILE__ ) . 'js/aqi-widget-settings.js', array( 'jquery' ), $this->version, false );
		wp_register_script( 'aqi-public-script', plugin_dir_url( __FILE__ ) . 'js/aqi-widget-public.js', array( 'jquery' ), $this->version, false );

		//Thank you - https://atomiks.github.io/tippyjs/
		//See /public/js/tippy-license.txt
		wp_register_script( 'aqi-tippy', plugin_dir_url( __FILE__ ) . 'js/tippy.all.min.js', array( 'jquery' ), null, false );
	}

	/**
	 * Registers the shortcodes for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function aqi_add_shortcode( $atts ) {
		//Enqueues the scripts/styles if the shortcode is encountered
		//The css and js has already been registered.
		wp_enqueue_style( 'aqi-styles' );
		wp_enqueue_script( 'aqi-settings-script' );
		wp_enqueue_script( 'aqi-public-script' );

		//Normalizes attribute keys to lowercase
		$atts = array_change_key_case( (array)$atts, CASE_LOWER );

		//Overrides default attributes with the user's attributes
		$aqi_atts = shortcode_atts( [ 'type' => 'compact', ], $atts, '[aqi-widget]' );

		//If no reporting area is associated with the specified Zip Code,
		//return a forecast from a nearby reporting area within this distance (in miles).
		//Hardcoding to 100 miles. I don't think there's a need to expose this as a setting.
		$default_distance= '100';
		$default_zip = '43215';

		$show_forecast = 0;
		if( strtolower( get_option( 'aqi_widget_show_forecast' ) ) === 'yes' ) {
			$show_forecast = 1;
		}

		$show_legend = 0;
		if( strtolower( get_option( 'aqi_widget_show_legend' ) ) === 'yes' ) {
			$show_legend = 1;
		}

		$aqi_options = array(
			'api_key' => get_option( 'aqi_api_key', '' ),
			'zip' => get_option( 'aqi_api_zip', $default_zip ),
			'distance' => $default_distance,
			'show_forecast' => $show_forecast,
			'show_legend'	=> $show_legend,
			'theme' => strtolower( get_option( 'aqi_widget_theme', 'light' ) ),
		);

		//widget is configured to show the forecast - enqueue the tippy script.
		if( $show_forecast === 1 ) {
			wp_enqueue_script( 'aqi-tippy' );
		}

		//Sets the values from the plugin settings in admin
		//which will be used by aqi-widget-public.js
		wp_localize_script(
			'aqi-public-script',
			'aqi_remote_settings',
			array(
				'airnow_uri' => 'https://www.airnowapi.org/aq/forecast/zipCode/?format=application/json&',
				'key' => $aqi_options['api_key'],
				'proxy_uri' => 'https://cors.bridged.cc/',
				'proxy_key' => '63c67789-5f58-404f-889d-c70ecffadf89',
				'zip' => $aqi_options['zip'],
				'distance' => $aqi_options['distance'],
				'show_forecast' => $aqi_options['show_forecast'],
				'show_legend'	=> $aqi_options['show_legend'],
				'theme' => $aqi_options['theme'],
				'aqi_compact_1'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_compact_1.png',
				'aqi_compact_2'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_compact_2.png',
				'aqi_compact_3'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_compact_3.png',
				'aqi_compact_4'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_compact_4.png',
				'aqi_compact_5'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_compact_5.png',
				'aqi_page_1'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_page_1.png',
				'aqi_page_2'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_page_2.png',
				'aqi_page_3'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_page_3.png',
				'aqi_page_4'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_page_4.png',
				'aqi_page_5'	=> plugin_dir_url( __FILE__ ) . 'img/aqi_page_5.png',
			)
		);

		//Defined in aqi-widget-public-display.php
		return render_aqi_widget( $aqi_atts );
	}
}
