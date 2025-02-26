<?php
/*
Plugin Name: Open Browser Window
Version: 1.2.2
Plugin URI: http://ajaydsouza.com/wordpress/plugins/open-browser-window-plugin/
Description: Opens a new browser window using JavaScript. You have the option to choose the features as well as choose if you want it to be centered.
Author: Ajay D'Souza 
Author URI: http://ajaydsouza.com/

*/

if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

define('ALD_OBW', dirname(__FILE__));

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
// Guess the location
$obw_path = WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__));
$obw_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));

function ald_openbrwindow()
{
	global $obw_path;
	global $obw_url;
?>
<script type="text/javascript" src="<?php echo $obw_url ?>/ald-openbrwindow.js"></script>
<?php
}

if (is_admin() || strstr($_SERVER['PHP_SELF'], 'wp-admin/')) {
	require_once(ALD_OBW . "/quicktag.inc.php");
}

//add action when the head is written
add_action('wp_head', 'ald_openbrwindow');
?>