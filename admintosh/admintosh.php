<?php
/*
Plugin Name:  Admintosh
Plugin URI:   http://wpmobo.com/admintosh
Description:  WordPress admin customization and security tools
Version:      1.1.0
Author:       wpmobo
Author URI:   http://wpmobo.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  admintosh
Domain Path:  /languages
*/

// Block Direct access
if( !defined( 'ABSPATH' ) ) { die( 'You should not access this file directly!.' ); }

// Define Constants for direct access alert message.
if( !defined( 'ADMINTOSH_ALERT_MSG' ) )
	define( 'ADMINTOSH_ALERT_MSG', esc_html__( 'You should not access this file directly.!', 'admintosh' ) );

// Define Constants for direct access alert message.
if( !defined( 'ADMINTOSH_OPTION_NAME' ) )
	define( 'ADMINTOSH_OPTION_NAME', 'admintosh_options' );

// Define Constants for __FILE__.
if( !defined( 'ADMINTOSH_FILE' ) )
	define( 'ADMINTOSH_FILE', __FILE__ );

// Define constants for plugin directory path.
if( !defined( 'ADMINTOSH_DIR_PATH' ) )
	define( 'ADMINTOSH_DIR_PATH', plugin_dir_path( __FILE__ ) );

// Define constants for plugin dirname.
if( !defined( 'ADMINTOSH_DIR_NAME' ) )
	define( 'ADMINTOSH_DIR_NAME', dirname( __FILE__ ) );

// Define constants for plugin directory path.
if( !defined( 'ADMINTOSH_DIR_URL' ) )
	define( 'ADMINTOSH_DIR_URL', plugin_dir_url( __FILE__ ) );

// Define constants for plugin basenam.
if( !defined( 'ADMINTOSH_BASENAME' ) )
	define( 'ADMINTOSH_BASENAME', plugin_basename( __FILE__ ) );

if( !defined( 'ADMINTOSH_UNIQID' ) )
define( 'ADMINTOSH_UNIQID', md5( mt_rand( 1, 999999999 ) . 'I32hTcaJFM4WdpeojYNfc3TwdulA60MpWWocB7OAKzm8n2' ) );


require_once ADMINTOSH_DIR_PATH.'vendor/autoload.php';

final class Admintosh {

	private static $instance;

	function __construct() {
		
		add_action( 'init', [ $this, 'client_insights' ] );
		$this->include();
		$this->init();
	}
	
	public static function getInstance() {

		if( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init() {
		new \Admintosh\Admin\Admin();
		new \Admintosh\Inc\Modules_Setup();
		new \Admintosh\Inc\General_Settings();
	}

	public function include() {
		require_once ADMINTOSH_DIR_PATH.'inc/functions.php';
	}

	public function client_insights() {

		if ( ! class_exists( 'Appsero\Client' ) ) {
	      require_once __DIR__ . '/appsero/src/Client.php';
	    }

	    $client = new Appsero\Client( 'ed558a76-2ead-4e54-804f-6b4aaa5eee8c', 'Admintosh &#8211; WordPress admin customization and security tools', __FILE__ );

	    // Active insights
	    $client->insights()->init();

	}

}


Admintosh::getInstance();

