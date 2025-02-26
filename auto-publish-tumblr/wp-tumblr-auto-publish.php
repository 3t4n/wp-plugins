<?php
/*
 Plugin Name: WP Tumblr Auto Publish
Plugin URI: https://xyzscripts.com/wordpress-plugins/tumblr-auto-publish/
Description:   Publish posts automatically from your blog to Tumblr social media. You can publish your posts to Tumblr as simple text message, text message with link or image. The plugin supports filtering posts by post-types and categories.
Version: 1.2.4
Author: xyzscripts.com
Author URI: https://xyzscripts.com/
License: GPLv2 or later
Text Domain: auto-publish-tumblr
Domain Path: /languages/
*/

/*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
if( !defined('ABSPATH') ){ exit();}
if ( !function_exists( 'add_action' ) ) {
    _e('Hi there!  I'.'m just a plugin, not much I can do when called directly.','auto-publish-tumblr');
    exit;
}
function plugin_load_tbaptextdomain() {
    load_plugin_textdomain( 'auto-publish-tumblr', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'plugin_load_tbaptextdomain' );
//error_reporting(E_ALL);
include_once(ABSPATH.'wp-includes/version.php');
global $wp_version;
define('XYZ_TBAP_WP_VERSION',$wp_version);
define('XYZ_TBAP_PLUGIN_FILE',__FILE__);
global $wpdb;

require_once( dirname( __FILE__ ) . '/admin/install.php' );
require_once( dirname( __FILE__ ) . '/xyz-functions.php' );
require_once( dirname( __FILE__ ) . '/admin/menu.php' );
require_once( dirname( __FILE__ ) . '/admin/destruction.php' );
require_once( dirname( __FILE__ ) . '/admin/ajax-backlink.php' );
require_once( dirname( __FILE__ ) . '/admin/metabox.php' );
require_once( dirname( __FILE__ ) . '/admin/publish.php' );
require_once( dirname( __FILE__ ) . '/admin/admin-notices.php' );
require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

if(get_option('xyz_credit_link')=="tbap")
	add_action('wp_footer', 'xyz_tbap_credit');
if(isset($_GET['page']) && ($_GET['page']=='tumblr-auto-publish-suggest-features')){
	ob_start();
}
function xyz_tbap_credit() {
	$content = '<div style="clear:both;width:100%;text-align:center; font-size:11px; "><a target="_blank" title="WP Tumblr Auto Publish" href="https://xyzscripts.com/wordpress-plugins/tumblr-auto-publish/details" >WP Tumblr Auto Publish</a> Powered By : <a target="_blank" title="PHP Scripts & Programs" href="http://www.xyzscripts.com" >XYZScripts.com</a></div>';
	echo $content;
}
if(!function_exists('get_post_thumbnail_id'))
	add_theme_support( 'post-thumbnails' );
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'xyz_tbap_add_action_links' );
function xyz_tbap_add_action_links( $links ) {
	$xyz_tbap_links = array(
			'<a href="' . admin_url( 'admin.php?page=tumblr-auto-publish-settings' ) . '">Settings</a>',
	);
	return array_merge( $links, $xyz_tbap_links);
}
?>
