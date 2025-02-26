<?php
if (!defined('ABSPATH')) { exit(); }
if (!function_exists('atec_header')) @require(__DIR__.'/atec-tools.php');	

add_action( 'admin_enqueue_scripts', function() 
{ 
	atec_reg_style('atec',__DIR__,'atec-style.min.css','1.0.007');
	
	global $atec_active_slug;
	if ($atec_active_slug!=='atec_group')
	{
		atec_reg_style('atec_wpds',__DIR__,'atec-wpds.min.css','1.0.0');
		atec_reg_script('atec_wpds',__DIR__,'atec-wpds.min.js','1.0.0');

		atec_reg_style('jstree',__DIR__,'themes/default/jstree.min.css','3.3.16');	
		atec_reg_script('jstree',__DIR__,'jstree.min.js','3.3.16');

		atec_reg_style('basicLightbox',__DIR__,'basicLightbox.min.css','1.0.0');	
		atec_reg_script('basicLightbox',__DIR__,'basicLightbox.min.js','1.0.0');	 		
	}
});

if ($atec_active_slug!=='atec_group') { function atec_wpds(): void { @require(__DIR__.'/atec-dir-scan-results.php'); } }
?>