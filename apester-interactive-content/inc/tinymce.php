<?php
/*
 * Security check:
 * Exit if file accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class tinyMce {

	public $name = 'apester';

	/**
	 * Constructor. Called when the plugin is initialized.
	 */
	function __construct() {
		// using 'admin_init' hook (instead of 'init') to only run this logic on the admin side of WordPress
		add_action( 'admin_init', array( &$this, 'init' ) );
	}

	/*
	 * Create TinyMCE
	 */
	function init() {
		global $wp_version;

		// Check WordPress Version (WordPress 3.9 minimum is the required version for using TinyMCE 4.0)
		if ( $wp_version < 3.9 )
			return;

		// Check if the current user has post editing privilege
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) )
			return;

		// Check if the current user is using rich editing
		if ( 'false' == get_user_option( 'rich_editing' ) )
			return;

		// get plugin settings
		$options = get_option( 'qmerce-settings-admin' );
		$js_exposed_data = $options['apester_tokens'];
		$apester_tags = $options['apester_tags'];

		// register vendor libraries js
		wp_register_script( 'apester_tiny_mce_vendor_js', plugins_url( '/public/js/apester_tinymce.vendor.dist.js', QMERCE__PLUGIN_FILE ) );

		// register localized scripts - expose WordPress version into global window parameter
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'wp_version', $wp_version );
		// register localized scripts - expose php version into global window parameter
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'php_version', phpversion() );
		// register localized scripts - expose data from plugins options into global window parameter
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'apester_tokens', $js_exposed_data );
		// register localized scripts - expose data from plugins options into global window parameter
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'apester_tags', $apester_tags );
		// register localized scripts - expose plugin version into global window parameter
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'apester_plugin_version', QMERCE_VERSION );
		// register localized scripts - expose plugin path into global window parameter (for usage angular template's images)
		wp_localize_script( 'apester_tiny_mce_vendor_js', 'apester_plugin_path', QMERCE_PLUGIN_DIR_RELATIVE );
		wp_enqueue_script( 'apester_tiny_mce_vendor_js' );


		// register apester font CSS
		wp_register_style( 'apester_font_css', APESTER_FONT_URL );
		wp_enqueue_style( 'apester_font_css' );

		// register Lora font CSS
		wp_register_style( 'lora_font_css', LORA_FONT_URL );
		wp_enqueue_style( 'lora_font_css' );

		// register Apester plugin
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_js_plugin' ) );
		// register Apester shortcode handler plugin
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_shortcode_plugin' ) );


		// register css of applying within TinyMCE editor iframe context
		add_filter( 'mce_css', array( $this, 'add_tinymce_shortcode_css' ) );
	}
	
	function add_tinymce_shortcode_plugin( $plugin_array ) {
		$plugin_array['apester_shortcode_handler'] = plugins_url( '/public/js/apester_tinymce_shorcode.dist.js', QMERCE__PLUGIN_FILE );
		return $plugin_array;
	}

	// register css of applying within TinyMCE editor iframe context
	function add_tinymce_shortcode_css( $mce_css_paths ) {
		// If the site has other css, add a comma
		if ( ! empty( $mce_css_paths ) )
			$mce_css_paths .= ',';

		// chain the path to the plugins css
		$mce_css_paths .= plugins_url( '/public/css/tinymce-shortcode-replacement.css', QMERCE__PLUGIN_FILE );
		// chain apester font so it will be available in the TinyMCE editor's iframe context as well as the plugin window loaded above
		$mce_css_paths .= ',' . APESTER_FONT_URL;

		// Return the css list
		return $mce_css_paths;

	}
}

$apesterTinyMce = new tinyMce();
