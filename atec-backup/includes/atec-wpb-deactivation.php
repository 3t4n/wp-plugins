<?php
if (!defined('ABSPATH')) { exit(); }

foreach(['db','files'] as $a) wp_clear_scheduled_hook('atec_wpdp_auto_backup_'.$a);

if (!class_exists('ATEC_fs')) @require('atec-fs.php');

$options = get_option('atec_WPB_settings');
$atec_wpb_upload_path = $options['path']??'';
$randomStr = $options['random']??'';
if ($atec_wpb_upload_path!=='' && $randomStr!=='') (new ATEC_fs())->unlink($atec_wpb_upload_path.DIRECTORY_SEPARATOR.$randomStr.'.txt');

$autoArr				= ['db','files','content'];
$cronBaseName	= 'atec_wpb_auto_backup_';
foreach($autoArr as $a) wp_clear_scheduled_hook($cronBaseName.$a);
?>