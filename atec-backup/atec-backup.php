<?php
if (!defined('ABSPATH')) { exit(); }

/**
* Plugin Name:  atec Backup
* Plugin URI: https://atecplugins.com/
* Description: All-in-one Backup and restore solution – fast & reliable.
* Version: 1.0.32
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
* Text Domain:  atec-backup
*/

wp_cache_set('atec_wpb_version','1.0.32');

if (is_admin()) 
{	
	register_activation_hook(__FILE__, function() { @require('includes/atec-wpb-activation.php'); });
	register_deactivation_hook(__FILE__, function() { @require('includes/atec-wpb-deactivation.php'); });

	if (!function_exists('atec_plugin_settings')) @require('includes/atec-admin.php');
	add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'atec_plugin_settings', 10, 2);
	
	if (!function_exists('atec_query')) @require('includes/atec-init.php');
	add_action('admin_menu', function() 
	{ 
		$atec_wpb_settings=get_option('atec_WPB_settings',[]);
		$active=filter_var($atec_wpb_settings['automatic']??0,258);
		atec_wp_menu(__FILE__,'atec_wpb',$active?'Backup':'<span title="Automatic backup is disabled">Backup</span>❗');
	});
	
	if (in_array($atec_active_slug=atec_get_slug(), ['atec_group','atec_wpb'])) { @require('includes/atec-wpb-install.php'); }
	
	(function() {
		// @codingStandardsIgnoreStart
		// This is not a FORM request, it is just a test, whether an options.php request is related to the plugin, thus register-settings must be loaded or otherwise can be skipped
		$atec_query = atec_query();
		if (preg_match('/atec_wpb$|atec_wpb&settings-updated|atec_wpb&nav=Settings|atec_wpb&nav=FTP_Settings/', $atec_query)
		|| (str_contains($atec_query,'wp-admin/options.php') && isset($_POST['atec_WPB_settings'])))		
		@require('includes/atec-wpb-register-settings.php'); 
		// @codingStandardsIgnoreEnd
	})();
}
	
function atec_wpb_write_log($str) 
{
	$atec_wpb_settings=get_option('atec_WPB_settings',[]);
	$wpbDirPath = atec_trailingslashit($atec_wpb_settings['path']??'');
	$date=gmdate('ymd_Hi',time());
	// @codingStandardsIgnoreStart | WP_Filesystem does not provide FILE_APPEND method.
	@file_put_contents($wpbDirPath.'backup.log', str_pad($date,12)."\t".$str."\n", FILE_APPEND); 
	// @codingStandardsIgnoreEnd
}

function atec_wpb_auto_backup($type) 
{ 
	if (!function_exists('atec_header')) @require(__DIR__.'/includes/atec-tools.php');	
	$atec_wpb_settings=get_option('atec_WPB_settings',[]);
	$wpbDirPath = trailingslashit($atec_wpb_settings['path']??'');
	$prefix='atec_backup_'.$type.'_CRON_'.gmdate('ymd_Hi').'_'.atec_random_string(5,true);
	if ($type==='DB') { if (!class_exists('ATEC_wpb_db_tools')) @require(__DIR__.'/includes/atec-wpb-db-tools.php'); $wpb_tools = new ATEC_wpb_db_tools(); }
	else { if (!class_exists('ATEC_wpb_files_tools')) @require(__DIR__.'/includes/atec-wpb-files-tools.php'); $wpb_tools = new ATEC_wpb_files_tools(); }
	@ob_start();
	$result = $wpb_tools->atec_wpb_backup($wpbDirPath.$prefix.($type==='DB'?'.sql':'.zip'),false,$atec_wpb_settings['ex_'.strtolower($type)]??'',$type==='FILES'?ABSPATH:WP_CONTENT_DIR);
	if (@ob_get_length() > 0) @ob_clean();
	$logStr=str_pad($type,7)."\t".(is_numeric($result)?'created':'failed: '.$result).'.';
	atec_wpb_write_log($logStr);
}

add_action( 'atec_wpb_auto_backup_db', function() { atec_wpb_auto_backup('DB'); });
add_action( 'atec_wpb_auto_backup_files', function() { atec_wpb_auto_backup('FILES'); });
add_action( 'atec_wpb_auto_backup_content', function() { atec_wpb_auto_backup('CONTENT'); });

function atec_wpb_monthly( $schedules ) { $schedules['monthly'] = array('interval' => 2592000, 'display' => 'monthly' ); return $schedules; } 
add_filter( 'cron_schedules', 'atec_wpb_monthly' );
function atec_wpb_half_hour( $schedules ) { $schedules['half_hour'] = array('interval' => 1800, 'display' => 'half_hour' ); return $schedules; } 
add_filter( 'cron_schedules', 'atec_wpb_half_hour' );

add_action('init', function() {
	if (!class_exists('ATEC_fixit')) @require(__DIR__.'/includes/atec-fixit.php');
	$fixit = new ATEC_fixit();
	$fixit->atec_fixit(__DIR__,'backup','wpb'); // fix missing random string
});
?>