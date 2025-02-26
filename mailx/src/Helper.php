<?php
/**
 * All helpers functions
 */
namespace codexpert\Mailx;
use codexpert\plugin\Base;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Helper
 * @author Codexpert <hi@codexpert.io>
 */
class Helper extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->server	= $this->plugin['server'];
		$this->version	= $this->plugin['Version'];
	}

	public static function pri( $data ) {
		echo '<pre>';
		if( is_object( $data ) || is_array( $data ) ) {
			print_r( $data );
		}
		else {
			var_dump( $data );
		}
		echo '</pre>';
	}

	public static function get_option( $key, $section, $default = '' ) {

		$options = get_option( $key );

		if ( isset( $options[ $section ] ) ) {
			return $options[ $section ];
		}

		return $default;
	}

	public static function default_sender_name() {
		return 'WordPress';
	}

	public static function default_sender_email() {
		return 'wordpress@' . str_replace( [ 'http://', 'https://' ], [], untrailingslashit( get_bloginfo( 'url' ) ) );
	}
}