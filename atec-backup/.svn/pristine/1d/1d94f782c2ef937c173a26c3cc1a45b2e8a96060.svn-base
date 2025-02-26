<?php
if (!defined('ABSPATH')) { exit(); }

function atec_wpb_sanitize_fields($input)
{
	atec_sanitize_boolean($input, ['automatic']);
	atec_sanitize_textarea($input, ['ex_db','ex_files','ex_content']);
	atec_sanitize_text_in_array($input, ['ftp_conn'=>['SFTP','FTPS'],'ftp_port'=>['21','22']]);
	atec_sanitize_text($input, ['ftp_host','ftp_pwd','ftp_path']);
	atec_sanitize_key($input, ['random']);

	$schedule=['–none–','half_hour','hourly','daily','weekly','monthly'];
	$scheduleArr = ['cron_db','cron_files','cron_content'];
	foreach($scheduleArr as $s) $input[$s] = in_array($input[$s]??'', $schedule)?sanitize_text_field($input[$s]):$schedule[0];

	$input['ftp_login'] = sanitize_user($input['ftp_login']??'');
	return $input;
}

function atec_wpb_settings_fields()
{ 
	if (!function_exists('atec_opt_arr')) @require('atec-check.php');
	@require(__DIR__.'/atec-wpb-tools.php');
	$wpb_tools = new ATEC_wpb_tools();
	
	$page_slug 		= 'atec_WPB';
    $option_group 	= $page_slug.'_options';
	$option_name 	= $page_slug.'_settings';
    $section		= $page_slug.'_section';
	$options		= get_option($option_name,[]);
	$cronBaseName	= 'atec_wpb_auto_backup_';

	if (str_contains(atec_query(),'settings-updated=true')) 
	{
		$autoArr=['db','files','content'];
		if (!filter_var($options['automatic']??0,258)) { foreach($autoArr as $a) wp_clear_scheduled_hook($cronBaseName.$a); }
		else
		{
			foreach($autoArr as $a)
			{
				$cronName = $cronBaseName.$a;
				if (($options['cron_'.$a]??'–none–')==='–none–') wp_clear_scheduled_hook($cronName);
				else { if (!wp_next_scheduled($cronName)) { wp_schedule_event( time(), esc_attr($options['cron_'.$a]), $cronName); } }
			}
		}		
	}
	
  	register_setting($option_group,$option_name,'atec_wpb_sanitize_fields');
	
  	add_settings_section($section,__('Backup options','atec-backup'),'',$option_group);
	
  	$dash='<span class="atec-mr-5 dashicons dashicons-backup"></span>';
  	add_settings_field('automatic', __('Automatic backups<br><span class="atec-fs-10 atec-grey">(Using WP cron)</span>','atec-backup'), 'atec_checkbox', $option_group, $section, atec_opt_arr('automatic','WPB'));
	  
	$section.='_options';
	add_settings_section($section,'Schedule','',$option_group);

	$schedule=['–none–','half_hour','hourly','daily','weekly','monthly'];

	$next 			= ''; 
	$automatic 	= filter_var($options['automatic']??0,258);
	if ($automatic)
	{
		$cron = wp_next_scheduled($cronBaseName.'db');
		$next = $cron ? '<br><small class="atec-green" style="margin-left: 25px;">'.$wpb_tools->secondsToTime($cron-time()).'</small>':'';
	}
	add_settings_field('cron_db', $dash.__('DB backup','atec-backup').$next, 'atec_input_select', $option_group, $section, atec_opt_arr_select('cron_db','WPB',$schedule));
	add_settings_field('ex_db', __('Exclude tables','atec-backup'), 'atec_input_textarea', $option_group, $section, atec_opt_arr('ex_db','WPB'));

	if ($automatic)
	{
		$cron = wp_next_scheduled($cronBaseName.'files');
		$next = $cron ? '<br><small class="atec-green" style="margin-left: 25px;">'.$wpb_tools->secondsToTime($cron-time()).'</small>':'';
	}

	add_settings_field('cron_files', $dash.__('FILES backup','atec-backup').$next, 'atec_input_select', $option_group, $section, atec_opt_arr_select('cron_files','WPB',$schedule));
	add_settings_field('ex_files', __('Exclude files/directories','atec-backup'), 'atec_input_textarea', $option_group, $section, atec_opt_arr('ex_files','WPB'));
	if ($automatic)
	{
		$cron = wp_next_scheduled($cronBaseName.'content');
		$next = $cron ? '<br><small class="atec-green" style="margin-left: 25px;">'.$wpb_tools->secondsToTime($cron-time()).'</small>':'';
	}
	
	add_settings_field('cron_content', $dash.__('CONTENT backup','atec-backup').$next.'
	<br><span class="atec-fs-10 atec-grey" style="margin-left: 25px;">Backup of wp-content folder only.</span>', 'atec_input_select', $option_group, $section, atec_opt_arr_select('cron_content','WPB',$schedule));
	add_settings_field('ex_content', __('Exclude files/directories','atec-backup'), 'atec_input_textarea', $option_group, $section, atec_opt_arr('ex_content','WPB'));

	$section.='_ftp';
	add_settings_section($section,'FTP server','',$option_group);

	add_settings_field('ftp_conn', 'Connection type.<br><small>SFTP (SSH2 FTP) or FTPS (FTP over TLS/SSL)', 'atec_input_select', $option_group, $section, array_merge(atec_opt_arr('ftp_conn','WPB'),['array'=>['SFTP','FTPS']]));
	
	add_settings_field('ftp_host', 'Host', 'atec_input_text', $option_group, $section, atec_opt_arr('ftp_host','WPB'));
	add_settings_field('ftp_port', 'Host', 'atec_input_select', $option_group, $section, array_merge(atec_opt_arr('ftp_port','WPB'),['array'=>['21','22']]));
	add_settings_field('ftp_login', 'Login', 'atec_input_text', $option_group, $section, atec_opt_arr('ftp_login','WPB'));
	add_settings_field('ftp_pwd', 'Password', 'atec_input_password', $option_group, $section, atec_opt_arr('ftp_pwd','WPB'));
	add_settings_field('ftp_path', 'Remote path', 'atec_input_text', $option_group, $section, atec_opt_arr('ftp_path','WPB'));

}
add_action( 'admin_init',  'atec_wpb_settings_fields' );
?>