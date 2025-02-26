<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Plugin Name:  atec web-map-service
* Plugin URI: https://atecmap.com/
* Description: Include the atecmap.com web map, with customizable location icon. Fully GDPR conform.
* Version: 1.6.24
* Requires at least:4.9
* Tested up to: 6.7
* Tested up to PHP: 8.4.2
* Requires PHP: 7.4
* Requires CP: 1.7
* Premium URI: https://atecplugins.com
* Author: Chris Ahrweiler ℅ atecplugins.com
* Author URI: https://atec-systems.com/
* Plugin URI: https://de.wordpress.org/plugins/atec-web-map-service/
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  atec-web-map-service
*/
  
if (is_admin()) 
{
	wp_cache_set('atec_wms_version','1.6.7');
   	register_activation_hook(__FILE__, function() { @require('includes/atec-wms-activation.php'); });
	
	if (!function_exists('atec_plugin_settings')) @require('includes/atec-admin.php');
  	add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'atec_plugin_settings', 10, 2);
	  
	if (!function_exists('atec_query')) @require('includes/atec-init.php');
	add_action('admin_menu', function() 
	{
		$options=get_option('atec_WMS_settings',[]);
		$active=(($options['lat']??'')!=='' && ($options['lng']??'')!=='');
		$pn='WebMapService';
		atec_wp_menu(__FILE__,'atec_wms',$active?$pn:'<span style="font-size: 9.5px;" title="Not configured">'.$pn.'</span>❗');
	});
	
	if (in_array($atec_active_slug=atec_get_slug(), ['atec_group','atec_wms'])) @require('includes/atec-wms-install.php');
	
	(function() {
		
		$atec_query = atec_query();
		// @codingStandardsIgnoreStart
		// This is not a FORM request, it is just a test, whether an options.php request is related to the plugin, thus register-settings must be loaded or otherwise can be skipped
		if (preg_match('/atec_wms$|atec_wms&settings-updated|atec_wms&nav=Dashboard/', $atec_query)
		|| (str_contains($atec_query,'wp-admin/options.php') && isset($_POST['atec_WMS_settings'])))		
		@require('includes/atec-wms-register-settings.php'); 
		// @codingStandardsIgnoreEnd
		
	})();
}

function atec_wms_shortcode(): string
{ 
  $options=get_option('atec_WMS_settings',[]);
  return '<iframe style="border:none; width:'.($options['width']??'auto').'; height:'.($options['height']??'auto').';" src="https://atecmap.com?apikey='.($options['key']??'').'&mono='.($options['mono']?'true':'').'&lat='.($options['lat']??'').'&lon='.($options['lng']??'').'" sandbox="allow-scripts allow-popups"></iframe>';
}
add_shortcode( 'atec_wms_shortcode', 'atec_wms_shortcode' );
add_shortcode( 'include_atec_wms_here', 'atec_wms_shortcode' );
?>