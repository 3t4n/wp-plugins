<?php
/*
 * Plugin Name:       GB Quick Launch
 * Plugin URI:        https://gb-plugins.com/downloads/gb-quick-launch
 * Description:       Add quick launch buttons
 * Version:           1.0.1
 * Author:            gilwebdeveloper
 * Author URI:        https://gbweb.co.il/
 * Text Domain:       gb-quick-launch
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
*/

// no access directly
if ( ! defined( 'ABSPATH' ) ) {
    die( '&ldquo;the door is shut it was made by those who are dead&rdquo;' );
}


defined('GBQL') or define('GBQL', (isset($_GET['gbwebv']) ? (empty($_GET['gbwebv']) ? time() : $_GET['gbwebv']) : '1.0.1'));

/** Plugin url / path */
define('GBQLURL', plugins_url().'/'.basename(dirname(__FILE__)));
define('GBQLDIR', plugin_dir_path( __FILE__ ));


//Load the file to start the plugin
include_once('core/functions.php');