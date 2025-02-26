<?php
/**
 *
 * Main model
 *
 * @package christmas-panda
 * @subpackage _models
 * @since Christmas Panda 1.0.0
 */

namespace PixChristmasPanda\Models;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Class Christmas Panda Model Main
 *
 * @category Model
 * @package  christmas-panda
 * @author  IV | PIXOLETTE
 * @license  http://wp.pixollete.com
 * @link     http://wp.pixollete.com
 */
class Main {

	/**
	 * The option_name of plugin data options
	 *
	 * @access public
	 * @var string
	 */
	public $plugin_options = 'pix_cp_options';

	/**
	 * Will store in an array all plugin options
	 *
	 * @access public
	 * @var array
	 */
	public $options_data = array();

	/**
	 * The class constructor. Init plugin options data;
	 *
	 * @access public
	 * @var function
	 */
	function __construct() {

		$this->options_data = get_option( $this->plugin_options, true );

	}

	/**
	 * Init plugin options data;
	 *
	 * @access public
	 * @var function
	 */
	function init() {

		$this->options_data = get_option( $this->plugin_options, true );

	}

	/**
	 * Update/add the plugin options.
	 *
	 * @access public
	 * @param array $data An array of plugin option.
	 * @var function
	 */
	public function save_options( $data = array() ) {

		$data_to_save = wp_json_encode( $data );

		if ( false !== $this->options_data ) {

			update_option( $this->plugin_options, $data_to_save );

		} else {

			add_option( $this->plugin_options, $data_to_save );

		}

		$this->options_data = $data;
	}

}
