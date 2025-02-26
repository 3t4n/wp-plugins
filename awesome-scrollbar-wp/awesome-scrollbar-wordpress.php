<?php
/**
* @link : https://profiles.wordpress.org/jewel1994
* @since : 1.0.0
* @package : scrollbar-wordPress
*
* @wordpress-plugin
* plugin name: Awesome Scrollbar Wordpress
* Plugin URI: http://codecanyon/user/nasir2015
* Description: This plugin will enable scrollbar in your wordpress site. You can change scrollbar color , bacground , border , border-radius , animation , animation speed & much more from Option panel.
* Author: nasir2015
* Author URI: https://profiles.wordpress.org/jewel1994
* Version: 1.0.0
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: wp-scrollbar
* Domain Path: /languages
*/

/*===============================================
    Donot call the file directly
=================================================*/
if (! defined( 'ABSPATH' )) {
	exit;
}

/*===============================================
	Load plugin textdomain
	@since 1.0.0
=================================================*/
function nnf_scrollbar_textdomain(){
	load_plugin_textdomain('wp-scrollbar' , false , plugins_basename(dirname(__FILE__)).'/languages');
}
add_action('plugin_loaded' , 'nnf_scrollbar_textdomain');

/*===============================================
    Require Scrollbar File 
=================================================*/
if(is_admin()){
//  Load only if we are viewing an admin page
require_once( dirname( __FILE__ ) . '/admin/admin_function_settings.php' );
}
require_once( dirname( __FILE__ ) . '/includes/scrollbar_enqueue_functions.php' );
require_once( dirname( __FILE__ ) . '/includes/scrollbar_options_settings.php' );

/*===============================================
    Default options values
=================================================*/ 
$nnf_scrollbar_default_options = array(
	'scrollbar_color' => '#000000',
	'scrollbar_bg' => '#81D742',
	'scrollbar_minopactiy' => 0,
	'scrollbar_maxopactiy' => 1,
	'scroll_bar_width' =>'5px',
	'scrollbar_border' =>'1px',
	'scrollbar_border_style' =>'solid',
	'scrollbar_border_color' =>'#FFFFFF',
	'scrollbar_border_radius' =>'5px',
	'scrollbar_zindex' =>'auto',
	'scrollbar_speed' =>60,
	'scrollbar_mousestep_speed' =>40,
	'scrollbar_touchbehavior' =>'false',
	'scrollbar_autohide' =>'true',
	'scrollbar_railalign' =>'right',
	'scrollbar_hidecursordelay' =>400,
	'scrollbar_smoothscroll' =>'true',
	'scrollbar_enablemousewheel' =>'true',
	'scrollbar_cursorfixedheight' =>'false',
	'scrollbar_cursorminheight' =>32,
	'scrollbar_enablekeyboard' =>'true',
);
?>