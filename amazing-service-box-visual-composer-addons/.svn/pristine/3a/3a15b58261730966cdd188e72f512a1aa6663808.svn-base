<?php 
	if ( ! defined( 'ABSPATH' ) ) { exit; }
	
	if(function_exists('vc_add_param')){
		require_once(ASB_PLUGIN_PATH.'vc_elements/vc_param/vc_param.php');
		 
			foreach(glob(ASB_PLUGIN_PATH.'vc_elements/map_shortcodes/*.php') as $shortcode) {
				require_once($shortcode);
			}
		 
	}