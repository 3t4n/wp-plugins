<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_tools {

public function finishCounter($ret, &$success)
{
	echo '<span class="atec-counter">';
	if ($ret === FTP_FAILED) { echo '🚩'; $success=false; } else { echo '🏁'; }
	echo '</span>';
}	
	
public function getBackupType($str)
{ 
	return str_contains($str,'_DB')?'DB':(str_contains($str,'_FILES')?'FILES':(str_contains($str,'_CONTENT')?'CONTENT':(str_contains($str,'_install')?'INSTALL':'-/-'))); 
}

public function secondsToTime($seconds) 
{
	$dtF = new \DateTime('@0');
	$dtT = new \DateTime("@$seconds");
	return $dtF->diff($dtT)->format('%a days, %H:%I');
}

public function fileList($wpbDirPath,$sort=false)
{
	if (!class_exists('ATEC_fs')) @require('atec-fs.php');
	$arr=(new ATEC_fs)->dirlist($wpbDirPath);
	if ($sort && !empty($arr))
	{
		usort($arr, function($a, $b) 
		{ 
			if ($a['lastmodunix'] == $b['lastmodunix']) return 0;
			return $a['lastmodunix']<$b['lastmodunix']?1:-1; 
		});
	}
	return $arr;
}

function __construct() {
	
}}
?>