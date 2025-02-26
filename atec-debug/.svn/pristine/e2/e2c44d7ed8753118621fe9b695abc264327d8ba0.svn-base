<?php
if (!defined('ABSPATH')) { exit(); }
if (!class_exists('ATEC_wp_memory')) @require('atec-wp-memory.php');

class ATEC_wpd_dashboard { 
	
private function replaceConfig($config,$key,$subst): string 
{ 
	$regArr=$this->regExp($config,$key,$subst);
	return preg_replace($regArr['reg'], $regArr['subst'], $config, 1); 
}

private function regExp($config,$key,$subst): array
{
	if (!str_contains($config, '\''.$key.'\'')) 
	{ 
		$reg = '/\<\?php\n{0,0}/'; 
		$subst="<?php\n/* Added by atec-debug */\n".$subst; 
	}
	else { $reg = '/define\(\s?\''.$key.'\',\s?[\']?('.$this->regBase.'*)[\']?\s?\);/'; }
	return ['reg'=>$reg, 'subst'=>$subst];
}

private $regBase;

function __construct() {	

$url		= atec_get_url();
$nonce = wp_create_nonce(atec_nonce());
$action = atec_clean_request('action');
$nav 	= atec_clean_request('nav');
if ($nav==='') $nav='Debug';

if ($action==='adminBar') atec_check_admin_bar('wpd',$url,$nonce,$nav);

$this->regBase = '[\/_\-\.\w\d]';
$mem_tools=new ATEC_wp_memory();

echo 
'<div class="atec-page">';
	$mem_tools->memory_usage();
	$licenseOk = atec_header(__DIR__,'wpd','Debug');	
	
	echo 
	'<div class="atec-main">';
		atec_progress();
		
		$navs=['#bug Debug','#memory Memory','#admin-tools Repair','#bug Script','#update Updates','#database Queries','#hourglass Cron','#scroll Includes','#admin-settings wp-config'];
		if (extension_loaded('xdebug')) $navs[] = '#bug Xdebug';
		atec_nav_tab($url, $nonce, $nav, $navs, $licenseOk?999:5, $licenseOk);
		
		echo
		'<div class="atec-g atec-border">';
			atec_flush();
			
			if ($nav=='Info') { @require('atec-info.php'); new ATEC_info(__DIR__); }
			{
				if (!class_exists('ATEC_fs')) @require('atec-fs.php');
				$afs = new ATEC_fs();
				
				$memlimit=atec_clean_request('memlimit');
				
				$configPath 	= get_home_path().'/wp-config.php';
				$config = $afs->get($configPath,'');
				$customLog = false;
				$defaultdebugPath 	= WP_CONTENT_DIR.'/debug.log';
				$debugPath 				= $defaultdebugPath;
				
				$debugWP_ 	= ['WP_DEBUG','WP_DEBUG_DISPLAY','WP_DEBUG_LOG'];
				$otherWP_ 	= ['SCRIPT_DEBUG','WP_ALLOW_REPAIR','SAVEQUERIES','WP_AUTO_UPDATE_CORE'];
				$allWP_			= array_merge($debugWP_,$otherWP_,['WP_MEMORY_LIMIT']);
				$status			= [];
				foreach($allWP_ as $wp_) $status[$wp_]=$wp_==='WP_DEBUG_DISPLAY'?true:($wp_==='WP_MEMORY_LIMIT'?'40M':false);
				preg_match_all('/define\(\s?\'([\w]+)\',\s?[\']?('.$this->regBase.'*)[\']?\s?\);/',$config,$m1);
				foreach($m1[0] as $m)
				{
					preg_match('/define\(\s?\'([\w]+)\',\s?[\']?('.$this->regBase.'*)[\']?\s?\);/',$m,$m2);
					if (in_array($m2[1],$allWP_) && isset($m2[2])) 
					{
						$status[$m2[1]] = (bool) (strtolower($m2[2])=='true');
						if ($m2[1]==='WP_DEBUG_LOG')
						{ if (!in_array(strtolower($m2[2]),['true','false'])) { $status[$m2[1]]=true; $customLog=true; $debugPath=$m2[2]!==''?$m2[2]:WP_DEBUG_LOG; } }
					}
				}
				
				$actionInfoMsg = '';
				$debugStatusBefore = $status['WP_DEBUG'];
				if (in_array($nav,['Debug','Memory','Queries','Repair','Updates','Script'])) // All tabs with WP_ checkbox
				{
					if ($action=='defaultMemLimit') { $action='memlimit'; $memlimit='40M'; }
					if ($action=='delete') { $afs->unlink($debugPath); }
					else 
					if (in_array($action, $debugWP_) || in_array($action, $otherWP_) || in_array($action,['memlimit','default','saveLog']))
					{
						$set = atec_clean_request('set')=='true';
						$backupPath=str_replace('.php','.atec-debug-bck.php',$configPath);
						$afs->put($backupPath,$config);
						if ($action=='saveLog') 
						{ 
							$newLog = atec_clean_request('custom_log');
							$key='WP_DEBUG_LOG';
							if ($newLog==='' || $newLog===$defaultdebugPath) { $actionInfoMsg='Reseted to default'; $subst="define( '{$key}', true );"; $debugPath=$defaultdebugPath; $customLog=false; }
							else
							{
								if (!preg_match('/'.$this->regBase.'+/',$newLog) || !str_starts_with($newLog,'/')) 
								{  $actionInfoMsg='Invalid path – reseted to default'; $subst="define( '{$key}', true );"; $debugPath=$defaultdebugPath; $customLog=false; }
								else { $subst="define( '{$key}', '{$newLog}' );"; $debugPath=$newLog; $customLog=true; }
							}
							$status[$key]=true;
						}
						elseif ($action=='memlimit') 
						{ 
							if ($memlimit=='') { $memlimit='40M'; $actionInfoMsg='WP_MEMORY_LIMIT set to default value: 40M'; }
							$key='WP_MEMORY_LIMIT'; $subst="define( '{$key}', '{$memlimit}' );"; 
						}
						elseif ($action!='default') 
						{ $key=$action; $status[$action]=$set; $subst="define( '{$key}', ".($status[$action]?"true":"false")." );"; }
						
						if ($action=='default')
						{
							foreach ($debugWP_ as $key)
							if ($key!='WP_DEBUG_LOG' || !$customLog)
							{ 
								$default=$key=='WP_DEBUG_DISPLAY'?'true':'false';
								$subst="define( '{$key}', {$default} );"; 
								$status[$key]=$value;
								$config=$this->replaceConfig($config,$key,$subst); 
							}
						}
						else 
						{ 
							$config=$this->replaceConfig($config,$key,$subst);
						}
						
						if ($config!=='') $afs->put($configPath,$config);
						
						if (in_array($action,['default','WP_DEBUG']) && $status['WP_DEBUG']==false) 
							atec_reg_inline_script('wpd_hide','jQuery("#wp-admin-bar-atec_wpd_admin_bar").remove();');
						if (in_array($action,['SAVEQUERIES']) && $status['SAVEQUERIES']==false) 
							atec_reg_inline_script('wpd_hide_sq','jQuery("#wp-admin-bar-atec_wpd_admin_bar_sq").remove();');
						atec_flush();
						
						if ($debugStatusBefore!==$status['WP_DEBUG'])
						{				
							$htaccessPath = WP_CONTENT_DIR.'/.htaccess';
							$htaccess = $afs->get($htaccessPath);
							if ($htaccess)
							{
								$reg = '/#{0,4} BEGIN ATEC-DEBUG-LOG[\n|\s|\S]*#{0,4} END ATEC-DEBUG-LOG\n{0,2}([\n|\s|\S]*)/';
								$htaccess = preg_replace($reg, "$1", $htaccess);
							}
						
							if ($status['WP_DEBUG'])
							{
								$installDir = plugin_dir_path(__DIR__).'install/';
								$installPath = $installDir.'htaccess_debug_log.txt';
								$replace = $afs->get($installPath);
								if ($replace) $htaccess = $replace."\n\n".$htaccess;
							}
							
							if ($htaccess==='') @$afs->unlink($htaccessPath);
							else 
							{
								$result = @$afs->put($htaccessPath,$htaccess);
								if (!is_wp_error($result) && $status['WP_DEBUG']) 
									$actionInfoMsg='The debug.log file is now protected through a rewrite rule - if mod_rewrite.c is enabled on your server';
							}
						}
					}
					
				}
				
				if (!function_exists('atec_opt_arr')) @require('atec-check.php');
				
				if ($nav=='Cron') 
				{ 
					if (atec_pro_feature('”Cron“ lists all cron jobs with the option to selective delete')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpd-parseCron-pro.php');
						if (class_exists('ATEC_wpd_parseCron')) new ATEC_wpd_parseCron($url, $nonce, $action); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Includes') 
				{ 
					if (atec_pro_feature('„Included“ lists all php scripts included on current page'))
					{ 
						atec_include_if_exists(__DIR__,'atec-wpd-parseIncludes-pro.php');
						if (class_exists('ATEC_wpd_included')) new ATEC_wpd_included(); 
						else atec_missing_class_check();
					}	
				}
				elseif ($nav=='Queries') 
				{ 
					if (atec_pro_feature('„Queries“ enables SAVEQUERIES to capture and display all database queries on the last page called')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpd-parseQueries-pro.php');
						if (class_exists('ATEC_wpd_parseQueries')) new ATEC_wpd_parseQueries($status, $url, $nonce); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Xdebug') 
				{ 
					if (atec_pro_feature('„Xdebug“ shows all information about the Xdebug extension')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpd-Xdebug-pro.php');
						if (class_exists('ATEC_wpd_Xdebug')) new ATEC_wpd_Xdebug();
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='wp_config') 
				{ 
					if (atec_pro_feature('„WP-Config“ shows the content of the wordpress wp-config.php file')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-parseWPconfig-pro.php');
						if (class_exists('ATEC_parseWPconfig')) new ATEC_parseWPconfig();
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Memory') {@require(__DIR__.'/atec-wpd-memory.php'); new ATEC_wpd_memory($memlimit, $url, $nonce); }
				elseif ($nav=='Repair') {@require(__DIR__.'/atec-wpd-repair.php'); new ATEC_wpd_repair($status, $url, $nonce); }
				elseif ($nav=='Script') {@require(__DIR__.'/atec-wpd-script.php'); new ATEC_wpd_script($status, $url, $nonce); }
				elseif ($nav=='Updates') {@require(__DIR__.'/atec-wpd-updates.php'); new ATEC_wpd_updates($status, $url, $nonce); }
				elseif ($nav=='Debug')
				{
					$optName='atec_wpd_new_error'; delete_option($optName);
					atec_reg_inline_style('wpd_admin_bar', '#atec_wpd_admin_span { color: white !important; }');

					echo '
					<div class="atec-btn-div">
						<div class="tablenav">
							<div class="atec-btn-chk-div">';
									foreach ($debugWP_ as $key) 
									{
										$disabled=$key=='WP_DEBUG_LOG' && $customLog;
										atec_checkbox_button_div($key,str_replace('WP_','',$key),$disabled,$status[$key],$url,'&action='.$key.'&set='.($status[$key]?'false':'true'),$nonce);
									}
									if ((WP_DEBUG_LOG || $status['WP_DEBUG_LOG'] || $customLog) && $action!=='editLog') { echo '<div class="atec-mt-2 atec-mr-10">'; atec_nav_button($url,$nonce,'editLog','','#edit'); echo '</div>'; }
									echo '<div class="atec-mt-2 atec-mr-10">'; atec_nav_button($url,$nonce,'default','','Reset to default'); echo '</div>';
									atec_help('debug','Options');	
									echo '
									<div id="debug_help" class="atec-help atec-dn">
										All of these options are constants defined in the wp-config.php file.
										<ul>';
										$desc	=[ 'WP_DEBUG'=>'WP_DEBUG triggers the „debug” mode. Will show errors, notices, and warnings.',
														'WP_DEBUG_DISPLAY'=>'WP_DEBUG_DISPLAY controls whether debug messages are shown inside the HTML of pages.',
														'WP_DEBUG_LOG'=>'WP_DEBUG_LOG causes all errors to also be saved to a debug.log.'];
										foreach ($debugWP_ as $key) echo '<li class="small" style="margin: 0;">',esc_html($desc[$key]),'</li>';
									echo '
										</ul>
										Make sure to prevent file access to debug.log by adding this to your .htaccess file:<br>
										&lt;FilesMatch "debug.log"&gt;Require all denied&lt;/FilesMatch&gt;
									</div>';
									
									if ($action==='editLog')
									{
										echo 
										'<br><div>
										<form class="atec-border-tiny" method="post" action="'.esc_url($url).'&action=saveLog&_wpnonce='.esc_attr($nonce).'">
											<table>
											<tr>
												<td class="atec-left"><label for="custom_log">Log absolute path</label></td>
												<td><input size="45" type="text" placeholder="/var/www/html/debug.log" name="custom_log" value="', esc_url($debugPath), '"></td>
												<td><input class="button button-primary"  type="submit" value="Save"></td>
											</tr>
											</table>
										</form>
										</div>';
									}
									else if ($customLog!='') echo '<br><div><p style="margin: -2px 0 5px 5px;"><strong>Custom log file:</strong> ',esc_html($debugPath),'</p></div>';
									echo '
							</div>
						</div>
					</div>';
					
					if ($actionInfoMsg!=='') atec_info_msg($actionInfoMsg);
		
					@require('atec-wpd-parseDebug.php');
					new ATEC_wpd_parseDebug($customLog, $debugPath, $url, $nonce);
					}	
			}
		
		echo '
		</div>
	</div>
</div>';  

@require('atec-footer.php');

}}

new ATEC_wpd_dashboard();
?>