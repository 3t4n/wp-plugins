<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Clayful
 * @since      1.0.0
 *
 * @package    Clayful_Thunder
 * @subpackage Clayful_Thunder/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Clayful_Thunder
 * @subpackage Clayful_Thunder/public
 * @author     Clayful <dev@clayful.io>
 */
class Clayful_Thunder_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->thunder_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Clayful_Thunder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Clayful_Thunder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/clayful-thunder-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Clayful_Thunder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Clayful_Thunder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/clayful-thunder-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Adds Clayful Thunder's styles and scripts
	 *
	 * @since    1.0.0
	 */

	// Add Clayful Thunder's styles in the `head` tag
	public function clayful_thunder_styles() {

		if ($this->thunder_options['styles']){
			echo $this->thunder_options['styles'];
		}
	}

	// Add Clayful Thunder's scripts in the end of `body` tag
	public function clayful_thunder_scripts() {

		if ($this->thunder_options['scripts']){
			echo $this->thunder_options['scripts'];
		}
	}

	// Define Clayful Thunder's shortcode function
	public function clayful_thunder_shortcode_builder($attrs = array(), $content = "") {

		$attrs = array_merge(array(
			"action" => "render",
			"container" => null
		), $attrs);

		if ($attrs["container"] === null) {
			if ($attrs["action"] === "render") {
				$attrs["container"] = "div";
			}
			if ($attrs["action"] === "open") {
				$attrs["container"] = "button";
			}
		}

		$container = $attrs['container'];
		$component = $attrs['component'];
		$action = $attrs['action'];

		unset($attrs['container']);
		unset($attrs['component']);
		unset($attrs['action']);

		$options = "";

		foreach ($attrs as $key => $value) {
			$options .= " data-{$key}=\"{$value}\"";
		}

		$shortcode = implode("", array(
			"<{$container} data-thunder-{$action}=\"{$component}\"",
			"{$options}>",
			$content,
			"</{$container}>"
		));

		return $shortcode;

	}

	// Add Clayful Thunder's shortcodes
	public function clayful_thunder_shortcodes() {
		add_shortcode( 'thunder', array( $this, 'clayful_thunder_shortcode_builder') );
	}

}
