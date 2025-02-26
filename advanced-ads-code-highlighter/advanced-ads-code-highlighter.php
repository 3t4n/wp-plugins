<?php
/*
  Plugin Name: Advanced Ads – Code Highlighter
  Plugin URI: https://wordpress.org/plugins/advanced-ads-code-highlighter
  Description: Highlight code in the textarea field of the plain text ads
  Version: 1.0.3
  Tested up to: 4.8.1
  Author: Thomas Maier
  Author URI: https://wpadvancedads.com
  Text Domain: advanced-ads-code-highlighter
  Domain Path: /languages/
 */
if (!defined('ABSPATH')) {
    exit;
}

class Advanced_Ads_Code_Highlighter {

    public static function init() {
		$class = __CLASS__;
		new $class;
    }

    # To run this class function 0

    public function __construct() {
		add_action('plugins_loaded', array($this, 'advanced_ads_code_highlighter_load_plugin_textdomain'));
		add_action('admin_enqueue_scripts', array($this, 'add_css'));
		add_action('admin_enqueue_scripts', array($this, 'add_js'));
		add_action('admin_footer', array($this, 'run_js'));
    }

    public function add_css() {
	// only load on ad edit pages
	if( ! $this->is_ad_edit_screen() ){
	    return;
	}
	wp_register_style('codemirror-css', plugins_url('/codemirror/lib/codemirror.css', __FILE__), false, false);
	wp_enqueue_style('codemirror-css');
    }

    public function add_js() {
	// only load on ad edit pages
	if( ! $this->is_ad_edit_screen() ){
	    return;
	}
	wp_register_script('codemirror-js', plugins_url('/codemirror/lib/codemirror.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-js');

	wp_register_script('codemirror-addon-js', plugins_url('/codemirror/addon/edit/matchbrackets.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-addon-js');

	wp_register_script('codemirror-htmlmixed-js', plugins_url('/codemirror/mode/htmlmixed/htmlmixed.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-htmlmixed-js');

	wp_register_script('codemirror-xml-js', plugins_url('/codemirror/mode/xml/xml.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-xml-js');

	wp_register_script('codemirror-javascript-js', plugins_url('/codemirror/mode/javascript/javascript.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-javascript-js');

	wp_register_script('codemirror-css-js', plugins_url('/codemirror/mode/css/css.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-css-js');

	wp_register_script('codemirror-clike-js', plugins_url('/codemirror/mode/clike/clike.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-clike-js');

	wp_register_script('codemirror-php-js', plugins_url('/codemirror/mode/php/php.js', __FILE__), array('jquery'), '5.15.2', false);
	wp_enqueue_script('codemirror-php-js');
    }
    
    public function is_ad_edit_screen(){
	// only load on ad edit pages
	if (!function_exists('get_current_screen')) {
	    return false;
	}
	$screen = get_current_screen();
	if( isset( $screen->id ) && 'advanced_ads' === $screen->id ) {
	    return true;
	}
	
	return false;
    }

    public function run_js() {
	// only load on ad edit pages
	if( ! $this->is_ad_edit_screen() ){
	    return;
	}
	?><script>
	    var editor = CodeMirror.fromTextArea(document.getElementById("advads-ad-content-plain"), {
		lineNumbers: true,
		matchBrackets: true,
		mode: "application/x-httpd-php",
		indentUnit: 4,
		indentWithTabs: true
	    });
	</script><?php
    }

	function advanced_ads_code_highlighter_load_plugin_textdomain() {
		load_plugin_textdomain( 'advanced-ads-code-highlighter', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

}

add_action('plugins_loaded', array('Advanced_Ads_Code_Highlighter', 'init'));
