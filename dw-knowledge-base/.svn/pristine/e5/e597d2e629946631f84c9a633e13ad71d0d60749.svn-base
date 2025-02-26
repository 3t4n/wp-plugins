<?php
/**
 * Plugin Name: DW Knowledgebase
 * Plugin URI: http://www.designwall.com/wordpress/plugins/dw-knowledge-base/
 * Description: DW Knowledgebase is a free, lightweight plugin that will help you create a knowledgebase in your website.
 * Author: DesignWall
 * Author URI: https://www.designwall.com
 * Version: 1.0.2
 *
 * Text Domain: dw-knowledgebase
 */

// DWKB plugin dir path
if ( ! defined( 'DWKB_DIR' ) ) {
	define( 'DWKB_DIR', plugin_dir_path( __FILE__ ) );
}
// DWKB plugin dir URI
if ( ! defined( 'DWKB_URI' ) ) {
	define( 'DWKB_URI', plugin_dir_url( __FILE__ ) );
}

require_once DWKB_DIR . 'inc/base.php';
require_once DWKB_DIR . 'inc/init.php';
require_once DWKB_DIR . 'inc/widgets.php';
require_once DWKB_DIR . 'inc/template-tags.php';
require_once DWKB_DIR . 'templates/admin/settings.php';



class DW_Knowledgebase {
	public function __construct() {
		$this->dir = DWKB_DIR;
		$this->uri = DWKB_URI;
		$this->version = '1.0.0';
		$this->article = new DWKB_Article_Base();

		add_action( 'init', array( $this, 'init' ) );
		
	}
	public function init() {

	}

}

$GLOBALS['dwkb'] = new DW_Knowledgebase();

function dwkb_scripts_styles() {
	wp_enqueue_style( 'dwkb-style', DWKB_URI . 'assets/css/style.css' );
	wp_enqueue_script( 'jquery-ui-autocomplete' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dwkb-script', DWKB_URI . 'assets/js/script.js', array( 'jquery', 'jquery-ui-autocomplete' ) );
	wp_localize_script( 'dwkb-script', 'dwkb', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'dwkb_scripts_styles' ); 

