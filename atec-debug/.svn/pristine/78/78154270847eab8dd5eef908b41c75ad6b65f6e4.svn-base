<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Plugin Name:  atec Debug
* Plugin URI: https://atecplugins.com/
* Description: Essential toolbox to debug a WordPress installation.
* Version: 1.1.32
* Requires at least:4.9
* Tested up to: 6.7
* Tested up to PHP: 8.4.2
* Requires PHP: 7.4
* Requires CP: 1.7
* Premium URI: https://atecplugins.com
* Author: Chris Ahrweiler ℅ atecplugins.com
* Author URI: https://atec-systems.com/
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  atec-debug
*/
	
wp_cache_set('atec_wpd_version','1.1.32');

if (is_admin()) 
{
	register_activation_hook(__FILE__, function() { @require('includes/atec-wpd-activation.php'); });
	
	if (!function_exists('atec_query')) @require('includes/atec-init.php');
	add_action('admin_menu', function() 
	{ 
		$str=WP_DEBUG?'WP_DEBUG':''; 
		if ($str==='') $str=defined('SAVEQUERIES') && SAVEQUERIES?'SAVEQUERIES':'';
		atec_wp_menu(__FILE__,'atec_wpd',$str===''?'Debug':'<span title="'.$str.' is enabled">Debug</span>❕');
	});
	
	if (in_array($atec_active_slug=atec_get_slug(), ['atec_group','atec_wpd'])) @require('includes/atec-wpd-install.php');
	
	function atec_wpd_admin_bar($wp_admin_bar): void
	{
		$str = get_option('atec_wpd_new_error')?'Errors':'Debug';
		// @codingStandardsIgnoreStart | Image is not an attachement
		$args = ['id' => 'atec_wpd_admin_bar', 
				'title' => 
				'<span style="font-size:12px; color:'.($str==='Debug'?'white':'red').';"">
				<img title="WP_DEBUG is enabled" src="'.esc_url(plugins_url( '/assets/img/atec_wpd_icon_admin.svg', __FILE__ )).'" style="vertical-align: bottom; height:14px; margin:9px 4px 9px 0;">'.esc_attr($str).
				'</span>',
				'href' => get_admin_url().'admin.php?page=atec_wpd'];
		// @codingStandardsIgnoreEnd
		$wp_admin_bar->add_node($args);
	}
	
	function atec_wpd_admin_bar_sq($wp_admin_bar): void
	{
		$nonce = wp_create_nonce('atec_wpd_nonce');
		// @codingStandardsIgnoreStart | Image is not an attachement
		$args = ['id' => 'atec_wpd_admin_bar_sq', 
					'title' => '
						<span style="font-size:12px;">
							<img title="SAVEQUERIES is enabled" src="'.esc_url( plugins_url( '/assets/img/atec_wpd_icon_admin.svg', __FILE__ ) ) .'" style="vertical-align: bottom; height:14px; margin:9px 4px 9px 0;">
							<span style="color:red;">QUERIES</span>
						</span>',
					'href' => get_admin_url().'admin.php?page=atec_wpd&nav=Queries&_wpnonce='.esc_attr($nonce)];
		// @codingStandardsIgnoreEnd
		$wp_admin_bar->add_node($args);		
	}

	if (get_option('atec_wpd_admin_bar'))
	{
		if (WP_DEBUG) add_action('admin_bar_menu', 'atec_wpd_admin_bar', PHP_INT_MAX);
		if (defined('SAVEQUERIES') && SAVEQUERIES) add_action('admin_bar_menu', 'atec_wpd_admin_bar_sq', PHP_INT_MAX);
		if (!class_exists('ATEC_wp_memory')) 
		{
			@require('includes/atec-wp-memory.php');
			add_action('admin_bar_menu', function($args) { (new ATEC_wp_memory)->atec_wp_memory_admin_bar($args); }, PHP_INT_MAX);
		}
	}

	if (WP_DEBUG && WP_DEBUG_LOG)
	{
		function atec_wpd_error($code, $message) 
		{ 
			if (trim($message)!=='') 
			{
				// @codingStandardsIgnoreStart
				error_log('WPD: '.$code.' | '.$message);
				// @codingStandardsIgnoreEnd
				update_option('atec_wpd_new_error',true); 
			}
		}
		add_action('wp_error_added', 'atec_wpd_error', 10, 2);
	};
}

(function() {
	
	if ((($atec_fit_it = get_option('atec_fix_it',[]))['debug']??'')!==wp_cache_get('atec_wpd_version'))
	{ 
		if (!class_exists('ATEC_fixit')) @require('includes/atec-fixit.php');
		(new ATEC_fixit)->atec_fixit(__DIR__,'debug','wpd',$atec_fit_it);
	}

})();
?>