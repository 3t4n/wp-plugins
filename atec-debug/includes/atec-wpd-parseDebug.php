<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpd_parseDebug { function __construct($customLog, $debugPath, $url, $nonce) {		

if (!class_exists('ATEC_fs')) @require('atec-fs.php');
$afs = new ATEC_fs();

atec_little_block_with_info('Log file',[],'',array('update','delete'),$url,$nonce);

if ($lastMod = $afs->mtime($debugPath));
{
	$date = new DateTime(); $date->setTimestamp($lastMod);
	echo '<h4>Last modified: ',esc_attr($date->format('Y-m-d H:i:s')),'</h4>';
}

if ($afs->exists($debugPath)) 
{
	if ($afs->size($debugPath)>50000000) atec_error_msg('The debug.log file exceeds 5MB - skipped. Please delete the log');
	else
	{ 
		$debug 	= $afs->get($debugPath);
		if ($debug)
		{
			$debug		= strtr($debug,['PHP Parse error:  '=>'', 'PHP Fatal error:  '=>'', 'PHP Warning:  '=>'Error: ']);
			$home		= preg_replace('/\//','\/',get_home_path());
			$debug		= preg_replace('/'.$home.'/', './', $debug);
		}
		else $debug='';
		
		echo '<div class="atec-code" id="debug" style="display:none; font-size: 1em; line-height: 1.6em;">',esc_html($debug),'</div>';
		atec_reg_inline_script('wpd_parseDebug', 'parseDebug();', true);
	}
}
else atec_info_msg('No debug file');

}}
?>