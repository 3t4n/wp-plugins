<?php
/**
 * Plugin Name: 		Awesome Blocks
 * Plugin URI: 			https://gutenbergblocks.zintathemes.com
 * Description: 		Awesome Blocks plugin comes with about 30 advanced blocks
 * Author: 					ZintaThemes
 * Author URI: 			https://zintathemes.com/
 * Version: 				1.0.1
 * License:         GPLv2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @link
 * @since 						1.0.0
 * @package 					AwesomeBlocks
 * @category 				 *
 * @author 					 ZintaThemes
 */

! defined('ABSPATH') && die('This file cannot be accessed directly');

// Define AwesomeBlocks constants
defined('AWESOMEBLOCKS_VERSION') 	|| define('AWESOMEBLOCKS_VERSION', '1.0.1');
defined('AWESOMEBLOCKS_PATH') 		|| define('AWESOMEBLOCKS_PATH', plugin_dir_path(__FILE__));
defined('AWESOMEBLOCKS_URL') 			|| define('AWESOMEBLOCKS_URL', plugin_dir_url(__FILE__));

/**
 *
 * This class describes a Awesome Blocks start.
 *
 * @since 						1.0.0
 * @package 					AwesomeBlocks
 */
class AwesomeBlocks
{

	/**
	 * The single instance of AwesomeBlocks.
	 *
	 * @access		private
	 * @since		1.0.0
	 * @var			unown
	 */
	private static $_instance = false;

	/**
	 * Constructor function.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function __construct() {
		require AWESOMEBLOCKS_PATH . 'includes' . DIRECTORY_SEPARATOR . 'class-awesome-blocks-hooks.php';
		return self::$_instance = new AwesomeBlocksHooks();
	} // End __construct()

	/**
	 * Begins execution of the plugin.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function starter() {
		return ! self::$_instance ? new self() : true;
	} // End starter()

} // End AwesomeBlocks {}

// Run AwesomeBlocks plugin
AwesomeBlocks::starter();
