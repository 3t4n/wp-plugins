<?php

/*
Plugin Name: AMP Revolution
Description: Powerful AMP Integration in your WordPress
Version: 0.1.1
Author: Savage Codes
Text Domain: amp-revolution
Author URI: https://www.savagecodes.com
License: GPL2
*/

// Avoid direct calls to this file.
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

class ARSCP_AMP_Revolution {

var $version = '0.1';
var $templateLoader;
var $options;
var $commentHandler;
var $cssLoader;
var $plugin_path;

	public static $instance;

function __construct() {

	self::$instance = $this;
	$this->plugin_path = dirname(__FILE__).'/';
    require_once dirname( __FILE__ ) . '/core/class-arscp-options.php';
	require_once dirname( __FILE__ ) . '/core/class-comments-handler.php';
	require_once dirname( __FILE__ ) . '/core/class-arscp-css-generator.php';
    require_once dirname( __FILE__ ) . '/core/class-arscp-template-loader.php';
	require_once dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php';
    $this->commentHandler = new ARSCP_Comments_Handler();


}

	public static function get() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

/*
*		Run during the activation of the plugin
*/
function activate() {


}

/*
*		Run during the initialization of Wordpress
*/
function initialize() {
    $this->options = new ARSCP_Options();
    $this->templateLoader = new ARSCP_Template_Loader();
    $this->cssLoader = new ARSCP_CSS_Generator();
	add_action( 'tgmpa_register', array($this,'my_theme_register_required_plugins') );
	add_action('amp_post_template_css', array($this->cssLoader,'build_css_styles'),11);
	add_action('amp_post_template_css', array($this->cssLoader,'add_custom_css_amp'),12);
}

	function my_theme_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin from the WordPress Plugin Repository.
			array(
				'name'      => 'AMP',
				'slug'      => 'amp',
				'required'  => true
			)
		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'required-plugins',      // Menu slug.
			'parent_slug'  => 'amp-revolution',        // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

		);
		tgmpa( $plugins, $config );
	}

}

function arscp_register_amp_menu() {
	register_nav_menu( 'amp-header', 'AMP Header' );
}

// Initalize the plugin
$ampRev = new ARSCP_AMP_Revolution();

// Add an activation hook
register_activation_hook(__FILE__, array(&$ampRev, 'activate'));
add_action('after_setup_theme' , 'arscp_register_amp_menu' );

// Run the plugins initialization method
add_action('init', array(&$ampRev, 'initialize'));

