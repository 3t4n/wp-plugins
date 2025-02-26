<?php
if (!defined('ABSPATH')) { exit(); }

(function() {	
	if (!function_exists('atec_header')) @require(__DIR__.'/atec-tools.php');	
	atec_integrity_check(__DIR__);
	
	$optName 	= 'atec_WMS_settings';
	$options		= get_option($optName,[]);
	if ($options['width']=='') $options['width'] = '100%';
	if ($options['height']=='') $options['height'] = '100%';
	update_option($optName,$options); 
})();
?>