<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Fixit: 1.0.18 | NOT critical
* Delete wrong cron
* Download random string was missing
*/

(function() {
	$autoArr=['db','files','content'];
	foreach($autoArr as $a) wp_clear_scheduled_hook('atec_wpdp_auto_backup_'.$a);

	$atec_wpb_settings=get_option('atec_WPB_settings',[]);
	$randomStr=$atec_wpb_settings['random']??'';
	if ($randomStr==='')
	{

		if (!function_exists('atec_header')) @require(__DIR__.'/includes/atec-tools.php');
		$randomStr = atec_random_string(8,true);

		if (!class_exists('ATEC_fs')) @require(__DIR__.'/includes/atec-fs.php');
		$afs = new ATEC_fs();
		$uploadDir = $afs->upload_dir('backup');
		$afs->touch($uploadDir.'/'.$randomStr.'.txt');
		$atec_wpb_settings['random']=$randomStr;
		update_option('atec_WPB_settings', $atec_wpb_settings);
	}
})();
?>