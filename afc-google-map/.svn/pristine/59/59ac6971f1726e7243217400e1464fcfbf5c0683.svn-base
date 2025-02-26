<?PHP
/*
Plugin Name: AFC Google Map
Plugin URI: http://www.afcomponents.com/ext/wp/afc-google-map/
Description: The AFC Google Map plugin provides easy map navigation and displays geographical locations with your markers, polylines, polygons and layers. Based on extraordinary useful <a href="http://www.afcomponents.com/components/g_map/">G Map</a> from <a href="http://www.afcomponents.com">Advanced Flash Components</a>.
Version: 0.9
Author: Vic Farazdagi
Author URI: http://www.afcomponents.com/team/torio/
*/

/*
AFC Google Map for Wordpress
(c) 2007 Advanced Flash Components / CrabDish LLC (email : support@afcomponents.com)

This plugin uses free embeddable version of	Advanced Flash Component's G Map.
For more details on component itself see http://www.afcomponents.com/components/g_map/
	
This Wordpress plugin is released "as is". Without any warranty. The author cannot
be held responsible for any damage that this script might cause.
*/

require_once(dirname(__FILE__).'/plugin_funcs.php');

      
function afc_google_map() {return '0.9';}	// dummy function to let the others know that plugin has been loaded

add_filter('the_content', 'afc_gmap_the_content', '10');	// <flv> tag -> HTML tags
add_filter('admin_footer','afc_gmap_quicktag_button',1);
add_action('admin_menu', 'afc_google_map_reqs_failed'); // on failed reqs, user would see requirements.php in menu
add_filter('mce_valid_elements', 'afc_google_map_mce_valid_elements', 0); // just to make sure that TinyMCE leaves our quicktag alone

?>