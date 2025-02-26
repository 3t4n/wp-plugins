<?php
if (!defined('ABSPATH')) { exit(); }

(function() {
		
	if (!function_exists('atec_header')) @require(__DIR__.'/atec-tools.php');
	atec_integrity_check(__DIR__);
	
	$notice = [];
	
	if (!class_exists('ATEC_fs')) @require('atec-fs.php');
	$afs = new ATEC_fs();
	$uploadDir = $afs->upload_dir('backup');
	$success = $afs->mkdir($uploadDir);
	
	$randomStr=atec_random_string(8,true);
	if ($success)
	{
		$afs->touch($randomStr.'.txt');
		$arr=['index.php'=>'index.php', 'htaccess.txt'=>'.htaccess', 'atec-wpb-download.php.txt'=>'atec-wpb-download.php'];
		$afs->install(__DIR__,$uploadDir,$arr,$success);
	}

	if (!$success)
	{
		atec_notice($notice, 'warning', 'Failed to create uploads folder and files');
		$uploadDir = '';
		update_option( 'atec_wpb_debug', $notice, false);
	}

	$optName 	= 'atec_WPB_settings';
	$options	= get_option($optName,[]);
	$options['path']					= $uploadDir;
	$options['cron_db']			= 'weekly';
	$options['cron_files'] 		= 'monthly';
	$options['cron_content'] 	= 'weekly';
	$options['random'] 			= $randomStr;
	$options['automatic'] 		= false;
	update_option($optName, $options);

})();
?>