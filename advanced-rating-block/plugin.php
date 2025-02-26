<?php
/**
 * Plugin Name:       Advanced Rating Block
 * Description:       A Custom Gutenberg Block to show rating system in Gutenberg Editor.
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Version:           1.0.2
 * Author:            Zakaria Binsaifullah
 * Author URI:        https://makegutenblock.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advanced-rating-block
 *
 * @package           @wordpress/create-block 
 */

 /**
  * @package Zero Configuration with @wordpress/create-block
  *  [adrb] && [ADRB] ===> Prefix
  */

// Stop Direct Access 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// admin page 
require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';

/**
 * Blocks Final Class
 */

final class ADRB_BLOCKS_CLASS {
	public function __construct() {
		// block initialization
		add_action( 'init', [ $this, 'adrb_blocks_init' ] );

		// redirecting 
		add_action( 'activated_plugin', [ $this, 'adrb_user_redirecting' ] );
	}

	/**
	 * Initialize the plugin
	 */

	public static function init(){
		static $instance = false; 
		if( ! $instance ) {
			$instance = new self();
		}
		return $instance;
	}
	/**
	 * Blocks Registration 
	 */

	public function adrb_register_block( $name, $options = array() ) {
		register_block_type( __DIR__ . '/build/' . $name, $options );
	 }

	/**
	 * Blocks Initialization
	*/
	public function adrb_blocks_init() {
		// register single block
		$this->adrb_register_block( 'rating' );
	}

	/*
	* Redirecting
	*/
	function adrb_user_redirecting( $plugin ) {
			if( plugin_basename(__FILE__) == $plugin ){
				wp_redirect( admin_url( 'tools.php?page=adrb-rating' ) );
				die();
			}
		}
	}

/**
 * Kickoff
*/

ADRB_BLOCKS_CLASS::init();
