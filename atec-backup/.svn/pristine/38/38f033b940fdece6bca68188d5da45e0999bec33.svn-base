<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_dashboard { 
	
public function atec_wbp_open_window()
{
	echo 
	'<br><div class="atec-db">
		<a href="', esc_url(get_admin_url()), '" target="_blank"><button class="button button-secondary"><span>Open new admin window</span></button></a>
	</div>';
}

function __construct() {
	
atec_admin_debug('Backup','wpb');

echo 
'<div class="atec-page">';
	$licenseOk=atec_header(__DIR__,'wpb','Backup');

	echo 
	'<div class="atec-main">';
		atec_progress();
	
		global $atec_wpb_settings;
		$atec_wpb_settings=get_option('atec_WPB_settings',[]);
		$atec_wpb_zipEnabled=extension_loaded('zip');
		$atec_wpb_pdoEnabled=extension_loaded('pdo');
		$atec_wpb_pdoMysqlEnabled=extension_loaded('pdo_mysql');
		
		$url			= atec_get_url();
		$nonce		= wp_create_nonce(atec_nonce());
		$action 	= atec_clean_request('action');
		$nav 		= atec_clean_request('nav');
		if ($nav==='') $nav='Dashboard';
	
    	$navs=['#admin-home Dashboard']; $break=999;
		if ($atec_wpb_zipEnabled && $atec_wpb_pdoEnabled && $atec_wpb_pdoMysqlEnabled && ($atec_wpb_settings['path']??'')!=='') 
		{ $navs=array_merge($navs,['#admin-generic Settings','#archive Backup','#archive Restore','#admin-generic FTP Settings','#ftp FTP']); $break=3; }
		atec_nav_tab($url, $nonce, $nav, $navs,$break, $licenseOk);
		
		echo 
		'<div class="atec-g atec-border">';
	
		if ($nav==='Info') { @require(__DIR__.'/atec-info.php'); new ATEC_info(__DIR__); }
		else
		{
			if (!class_exists('ATEC_wpb_tools')) @require(__DIR__.'/atec-wpb-tools.php');
			$wpb_tools = new ATEC_wpb_tools();

			if (in_array($nav, ['Backup','Restore'])) 
			{
				if ($nav==='Restore' && !$licenseOk) atec_pro_feature('„Restore“ allows to restore database and files backups');
				else { @require(__DIR__.'/atec-wpb-backup-restore.php'); new ATEC_wpb_backup_restore($this,$url,$nonce,$action,$nav,$wpb_tools); }
			}
			elseif ($nav==='Settings') { @require(__DIR__.'/atec-wpb-settings.php'); new ATEC_wpb_settings($url,$nonce,$nav); }
			elseif (str_contains($nav,'Settings')) 
			{ 
				if (atec_pro_feature('„FTP Settings“ allows to set the FTP storage credentials')) 
				{ 
					atec_include_if_exists(__DIR__,'atec-wpb-ftp-settings-pro.php');
					if (class_exists('ATEC_wpb_ftp_settings')) new ATEC_wpb_ftp_settings();
					else atec_missing_class_check();
				}
			}
			elseif ($nav==='FTP') 
			{ 
				if (atec_pro_feature('„FTP“ allows to sycn backups with an FTP storage')) 
				{ 
					atec_include_if_exists(__DIR__,'atec-wpb-ftp-pro.php');
					if (class_exists('ATEC_wpb_FTP')) new ATEC_wpb_FTP($this,$url,$nonce,$action,$nav,$wpb_tools);
					else atec_missing_class_check();
				}
			}
			else
			{	
				if (!class_exists('ATEC_fs')) @require('atec-fs.php');
				$afs = new ATEC_fs();
				
				$wpDirSize 		= get_dirsize(get_home_path());
				$wpbDirPath 	= $atec_wpb_settings['path']??'';
				$wpbDirSize  	= 0;
				$wpbFiles			= 0;
				
				echo '
				<div class="atec-g atec-g-50">
					<div>';
						atec_little_block('Backup options & schedule');
						echo 
						'<div class="atec-border-white">';
											
							if ($atec_wpb_zipEnabled && $atec_wpb_pdoEnabled)
							{
								$cronBaseName = 'atec_wpb_auto_backup_';
	
								$nextDB = wp_next_scheduled($cronBaseName.'db');
								$nextDB_TS = $nextDB ? $wpb_tools->secondsToTime($nextDB-time()) :'';
		
								$nextFILES = wp_next_scheduled($cronBaseName.'files');
								$nextFILES_TS = $nextFILES ? $wpb_tools->secondsToTime($nextFILES-time()): '';
								
								$nextCONTENT = wp_next_scheduled($cronBaseName.'content');
								$nextCONTENT_TS = $nextCONTENT ? $wpb_tools->secondsToTime($nextCONTENT-time()): '';
									
								atec_reg_inline_style('wpb_options','.optinsSPAN { background:white; padding:4px 8px; border-radius:5px; border:solid 1px #f0f0f0; }');
								$automatic = filter_var($atec_wpb_settings['automatic']??0,258);
								atec_table_header_tiny(['#hourglass-start','Automatic','#backup DB&nbsp;cron','#backup Files&nbsp;cron','#backup Content&nbsp;cron']);
								echo '<td></td>
										<td>
											<span class="optinsSPAN" style="background:', ($automatic?'rgba(0,255,0,0.2)':'rgba(255,0,0,0.2)'), '; color:', ($automatic?'rgba(0,125,0,1)':'rgba(125,0,0,1)'), '">', esc_attr($automatic?'enabled':'disabled'), '</span>
										</td>';
	
										$autoArr=['db','files','content'];
										foreach($autoArr as $a)
										{
											$next = wp_next_scheduled($cronBaseName.$a);
											$next_TS = $next ? $wpb_tools->secondsToTime($next-time()): '';
											echo
											'<td', (!$automatic?' style="color:#ddd;"':''), '>
												<div class="optinsSPAN"><strong>', esc_attr($atec_wpb_settings['cron_'.$a]??'-/-'), '</strong><br>
													<div class="atec-mt-10 atec-mr-5 atec-bg-w">', esc_attr($next_TS), '</div>
												</div>
											</td>';
										}
										
								atec_table_footer();
								
								if (!$automatic) atec_warning_msg('No automatic backup schedule defined');
													
								$logPath=$wpbDirPath.DIRECTORY_SEPARATOR.'backup.log'; $content=false;
								if ($afs->exists($logPath)) 
								{
									if ($content = $afs->get($logPath))
									{
										echo '
										<br>
										<h4>Automatic backup log</h4>
										<div class="atec-code" id="backup_log">', esc_html($content), '</div>';
										atec_reg_inline_script('wpb_log','
										const backupLog=jQuery("#backup_log");
										if (backupLog)
										{
											let html=backupLog.html();
											html=html.replace(/(.*failed([^\n]*)\n?)/gm, "<font class=\'atec-red\'>$1</font>");
											backupLog.html(html);
										}
										');
									}
								}
								
							}
								
						echo '
						</div>
					</div>
					
					<div>';
						atec_little_block('System info'); 
						echo '
						<div class="atec-border-white">';
							
							$dt	= disk_total_space(get_home_path());
							$df	= disk_free_space(get_home_path());
							$dp	= ($dt && $df)?'('.round($df/$dt*100,1).'%)':'';
														
							$arr=$wpb_tools->fileList($wpbDirPath,true);
							if (!empty($arr)) foreach($arr as $a) 
							{ 
								if (str_ends_with($a['name'],'.zip')) { $wpbFiles++; $wpbDirSize+=$a['size']; }
								elseif (str_ends_with($a['name'],'.part')) $afs->unlink($wpbDirPath.DIRECTORY_SEPARATOR.$a['name']);
							} 
							
							echo '
							<div class="atec-g">
								<div class="atec-dilb">';
							
									global $wpdb;
									// @codingStandardsIgnoreStart
									$tablesstatus = $wpdb->get_results('SHOW TABLE STATUS');
									$dbVersion=$wpdb->get_var('SELECT VERSION()');
									// @codingStandardsIgnoreEnd
									$dbName=str_contains(strtolower($dbVersion), 'mariadb')?'MariaDB':'MySQL';
								
									$db_disk		= 0;
									$db_index	= 0;
									foreach ($tablesstatus as $tablestatus) 
									{ $db_disk += $tablestatus->Data_length; $db_index += $tablestatus->Index_length; }
								
									atec_table_header_tiny(['#admin-home','Disk total','Disk free','WP size']);
										echo '<td></td>
										<td class="atec-nowrap">', ($dt?esc_attr(size_format($dt)):'-/-'), '</td>
										<td class="atec-nowrap">', ($df?esc_attr(size_format($df)):'-/-'), '&nbsp;', esc_attr($dp), '</td>
										<td class="atec-nowrap atec-bold">', esc_attr(size_format($wpDirSize)),'</td>';
									atec_table_footer();
							
							echo '
								</div>
								<div class="atec-dilb">';
							
									atec_table_header_tiny(['#database','DB&nbsp;server','DB&nbsp;host','Tables','DB&nbsp;size']);
										echo '<td></td>
												<td>', esc_attr($dbName), '</td>
												<td>', esc_attr(defined('DB_HOST')?DB_HOST:'-/-'), '</td>
												<td class="atec-nowrap">', esc_attr(count($tablesstatus)),'</td>
												<td class="atec-nowrap atec-bold">', ($db_disk?esc_attr(size_format($db_disk+$db_index)):'-/-'), '</td>';
									atec_table_footer();		
							
							echo '
								</div>
								<div class="atec-dilb">';
							
								atec_table_header_tiny(['#open-folder','Backup path','Backup files','Backup size']);
								echo '<td></td>
										<td>', esc_attr(str_replace(get_home_path(),'',$wpbDirPath)), '</td>
										<td class="atec-nowrap">', esc_attr($wpbFiles),'</td>
										<td class="atec-nowrap atec-bold">', esc_attr(size_format($wpbDirSize)),'</td>';
								atec_table_footer();		
								
								$textStr='Please deaktivate & reactivate the plugin to run the install routine';
								if ($wpbDirPath=='') atec_error_msg('Backup path is not defined. '.$textStr);
								else { if (!$afs->exists($wpbDirPath)) atec_error_msg('Backup directory does not exist. '.$textStr); }
								
							echo '
								</div>
							</div>
							
							<div class="atec-box-white">
								<p class="atec-bold atec-mt-0">Required extensions:</p>';
								
								atec_badge('ZIP extension is enabled','Please enable the ZIP extension before creating backups',$atec_wpb_zipEnabled,false,false,true);
								atec_badge('PDO extension is enabled','Please enable the PDO extension',$atec_wpb_pdoEnabled,false,false,true);
								atec_badge('PDO_MySQL extension is enabled','Please enable the PDO_MySQL extension',$atec_wpb_pdoMysqlEnabled,false,false,true);
								
								if (!$atec_wpb_pdoEnabled)
								{
									atec_help('exec','PDO extension');
									echo '<div id="exec_help" class="atec-help atec-dn">The PDO extension is a database driver, that is required to create backups – please ask your hoster to enable it.</div>';
								}
								
							echo 
							'</div>';
							
							if (is_multisite()) 
							{
								atec_warning_msg('„atec-backup“ is not specifically designed for multisite use.<br>It will always backup the full database and site, incl. sub-sites. Therefore you should only activate it on the main site.<br>Plus, if you restore files, it will overwrite the „WP root“ / „wp-content“ folder, incl. the sub-sites „uploads“ folders. If you restore the database, it will overwrite all tables, incl. the tables of the sub-sites');
								if (get_current_blog_id()!==1) atec_warning_msg('When using „atec-backup“ from a sub-site, backups also contain the database tables and files of all other sites',true);
							}
						echo 
						'</div>
					</div>

				</div>';
			}
		}
	
		echo 
		'</div>
	</div>
</div>';

@require('atec-footer.php');

}}

new ATEC_wpb_dashboard();
?>