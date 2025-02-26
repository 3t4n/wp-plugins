<?php
/*
Plugin Name: Open Picture Window
Version: 1.6.1
Plugin URI: http://ajaydsouza.com/wordpress/plugins/open-picture-window-plugin/
Description: Opens a new browser window with the image using JavaScript. All window options settable. Use <code>ald_OpenPictureWindow(theURL, winName, features, myWidth, myHeight, isCenter, myTitle) </code>
Author: Ajay D'Souza 
Author URI: http://ajaydsouza.com/
*/

if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

define('ALD_OPW', dirname(__FILE__));

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
// Guess the location
$opw_path = WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__));
$opw_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));

function ald_openpicturewindow()
{
	global $opw_path;
	global $opw_url;
?>
<script type="text/javascript" src="<?php echo $opw_url ?>/ald-openpicturewindow.js"></script>
<?php
}

if (is_admin() || strstr($_SERVER['PHP_SELF'], 'wp-admin/')) {
	require_once(ALD_OPW . "/quicktag.inc.php");
}

//add action when the head is written
add_action('wp_head', 'ald_openpicturewindow');
add_action('admin_head', 'ald_openpicturewindow');
?>