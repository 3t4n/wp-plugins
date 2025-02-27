<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Cookie_Control
 * @subpackage Cookie_Control/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/public
 * @author     Civic Uk <info@civicuk.com>
 */
class CCC_Cookie_Control_Public
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	public function ccc_options_apikey_version()
	{

		return $ccc_options_apikey_version_front = get_option('civic_cookiecontrol_apikey_version') ? get_option('civic_cookiecontrol_apikey_version') : '';
	}

	public  function ccc_get_default_values_public()
	{
		$plugin_admin = new CCC_Cookie_Control_Admin($this->plugin_name, $this->version);
		$ccc_cookiecontrol_settings_defaults_admin =  $plugin_admin->ccc_cookiecontrol_settings_defaults();
		return $ccc_cookiecontrol_settings_defaults_admin;
	}

	public function ccc_govuk_consent()
	{
		$ccc_options = get_option('civic_cookiecontrol_settings_v9');
		$ccc_options_govuk = isset($ccc_options['initialState']) ? $ccc_options['initialState'] : "";
		return $ccc_options_govuk;
	}

	public function ccc_gov_uk_details($attributes)
	{
		// Extract the shortcode attributes
		extract(shortcode_atts(array(
			'layout' => 'default',
		), $attributes));
		include plugin_dir_path(__FILE__) . 'templates/govuk-cookiecontrol-details.php';
		return $output;
	}

	public function ccc_check_body_open()
	{
		if (doing_action('wp_body_open')) {
			remove_action('wp_footer',  array($this, 'ccc_check_body_open'), 1);
		}
		include plugin_dir_path(__FILE__) . 'templates/govuk-cookiecontrol-banner.php';
	}
	
	public function ccc_check_body_actions()
	{
		add_action('wp_body_open', array($this, 'ccc_check_body_open'), 1);

		add_action('wp_footer', array($this, 'ccc_check_body_open'), 1);
	}

	public function ccc_enque_header_or_footer($position)
	{
		if ($this->ccc_options_apikey_version() == "v9") {

			wp_enqueue_script('ccc-cookie-control', '//cc.cdn.civiccomputing.com/9/cookieControl-9.x.min.js', array(), '', $position);

			if ($this->ccc_govuk_consent() == "GOVUK") {

				$this->ccc_check_body_actions();

				wp_enqueue_script('ccc-cookie-control_govuk_script', plugin_dir_url(__FILE__) . 'assets/asset_dist/cookie_control_public.js', array('ccc-cookie-control'), '', true);
			}
		} else {

			wp_enqueue_script('ccc-cookie-control', '//cc.cdn.civiccomputing.com/8/cookieControl-8.x.min.js', array(), '', $position);
		}
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function ccc_enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in CCC_Cookie_Control_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The CCC_Cookie_Control_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ($this->ccc_govuk_consent() == "GOVUK") {

			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'assets/asset_dist/cookie_control_public.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */

	public function ccc_enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in CCC_Cookie_Control_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The CCC_Cookie_Control_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.s
		 */

		$this->ccc_enque_header_or_footer(true);
	}

	public function ccc_cookie_head_script()
	{

		$this->ccc_enque_header_or_footer(false);
	}
}
