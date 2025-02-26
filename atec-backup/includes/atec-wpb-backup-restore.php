<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_backup_restore {
	
function __construct($parent,$url,$nonce,$action,$nav,$wpb_tools) {	

echo '
<div class="atec-g atec-g-50">
	<div>';
		atec_little_block('Backup list');
		echo '
		<div class="atec-border-white">';
		
			if (!function_exists('atec_opt_arr')) @require('atec-check.php');
			if (!class_exists('ATEC_fs')) @require('atec-fs.php');
			$afs = new ATEC_fs();
			
			global $atec_wpb_settings;
			$wpbDirPath = atec_trailingslashit($atec_wpb_settings['path']??'');

			$id = sanitize_file_name(atec_clean_request('id'));

			if ($action==='delete' && ($id!=='')) 
			{ 
				$path=$wpbDirPath.$id;
				$success = $afs->unlink($path);
				atec_badge('Deleted file: '.$id,'Failed to delete file: '.$id,$success); 
			}

			$wpbDirSize = 0;
			$arr=$wpb_tools->fileList($wpbDirPath,true);

			atec_table_header_tiny(['#','Name','Type','Date','Size',($nav==='Restore'?'':'#cloud'),($nav==='Restore'?'Restore':'Delete')],'backupList');
			$c=0;

			$uploadURL=site_url().'/'.str_replace(ABSPATH,'',$afs->upload_dir('backup'));
			if (!empty($arr)) foreach($arr as $a) 
			{ 
				$downloadScript=$uploadURL.'/atec-wpb-download.php?random='.($atec_wpb_settings['random']??'');
				if (str_contains($a['name'],'.zip') && str_starts_with($a['name'],'atec_backup_') && !(str_ends_with($a['name'],'part'))) 
				{
					$c++;
					$wpbDirSize+=$a['size'];
					$type=$wpb_tools->getBackupType($a['name']);
					$date=gmdate('M d', strtotime($a['lastmod']));
					echo '
					<tr>
						<td>', esc_attr($c), '</td>
						<td>', esc_attr($a['name']), '</td>
						<td>', esc_attr($type), '</td>
						<td class="atec-nowrap">', esc_attr($date), '</td>
						<td class="atec-nowrap">', esc_attr(size_format($a['size'])), '</td>	';
						if ($nav==='Restore')
						{
							echo '<td></td>';
							atec_button_confirm($url,$nav,$nonce,'restore_'.$type.'&id='.$a['name'],'image-rotate');
						} 
						else
						{
							echo '<td>
							<a title="Download backup file" href="', esc_url($downloadScript.'&filename='.$a['name']), '" target="_blank">
								<button style="padding: 0 4px; line-height: 20px !important; min-height:20px !important;" class="button button-secondary">
									<span class="'.esc_attr(atec_dash_class('download')).'"></span>
								</button>
							</a>';
							atec_button_confirm($url,$nav,$nonce,'delete&id='.$a['name']);
						}
					echo '
					</tr>';
				}
			}
			atec_empty_tr();
			if ($c!==0) echo '<tr><td colspan="4">', esc_attr($c), '</td><td colspan="3">', esc_attr(size_format($wpbDirSize)), '</td>';
			echo '</tbody>
			</table>';
						
		echo '
		</div>
	</div>
	
	<div>';
		atec_little_block('Actions');
		echo '
		<div class="atec-border-white">';
		
			$start = hrtime(true);
			$confirmed = false; 
			if (in_array($action,['restore_DB','restore_FILES','restore_CONTENT']))
			{
				$confirmed = atec_clean_request('confirmed')!=='';
				$type=$wpb_tools->getBackupType($id);
				if (!$confirmed) 
				{
					echo '
					<div class="atec-box-white">
						<p class="atec-bold">Selected file: ', esc_attr($id), '.<br>
						<p><span class="atec-red"><strong>WARNING: Restore can destroy your WP installation!</strong></span></p>';
						if ($type==='DB') echo 'Existing tables will be overwriten by the restore except for those tables that do not exist in the backup file.<br>In case of a failure, the rollback feature will try to restore the previous state – but success can not be guaranteed.';
						else echo 'FILES/CONTENT restore will extract the backup content to WordPress root folder: <strong>', esc_attr(get_home_path()), '</strong><br>Existing files will be overwritten with their backup equivalent or stay untouched, if they are not present in the backup.';	
					echo '</p>';
					atec_nav_button($url,$nonce,$action.'&id='.$id.'&confirmed=true',$nav,'Confirm restore',false,true);
					echo '</div><br>';
				}
			}
			
			$activeCreate=false;
			if (in_array($action,['create_DB','create_FILES','create_CONTENT']))
			{			
				$activeCreate=true;
				$type=$wpb_tools->getBackupType($action);
				$prefix='atec_backup_'.$type.'_'.gmdate('ymd_Hi').'_'.atec_random_string(2,true);
			}
			
			if ($confirmed || $activeCreate) 
			{
				$str=$activeCreate?'backup':'restore';
				echo '<p id="atec_wpb_warning" class="atec-box-white atec-orange">
				<strong>WARNING: Do not interrupt the ', esc_attr($str), ' process!</strong><br>';
				if (in_array($action,['restore_FILES','restore_CONTENT']))
				{ echo '<span class="atec-black">There is no progress indicator for FILES/CONTENT restore – check your browser loading indicator.</span><br>'; }
				echo 'Wait until the ', esc_attr($str), ' is completely finished.';
				$parent->atec_wbp_open_window();
				echo '</p>';
				wp_raise_memory_limit( 'admin' );
			}

			$activeCommand=in_array($action,['create_DB','create_FILES','create_CONTENT']) || $confirmed;
			if ($activeCommand)
			{
				echo '<div class="atec-box-white atec-fs-14" style="max-width: 100%;" id="atec_wpb_processing">',
				(str_contains($action,'create_')?'Creating':'Restoring'), ' ', esc_attr($type), ' backup . . . <br>',
				'<div id="atec_wpb_dots" style="line-height: 10px; padding:10px 0;" class="atec-fs-10">';
				if (in_array($action,['restore_FILES','restore_CONTENT']))
				{ if (function_exists('atec_loader_dots')) atec_loader_dots(); }							
				atec_flush();
			}

			$success=false;
			
			if ($action==='restore_DB' && $confirmed)
			{
				$zipPath=$wpbDirPath.$id;
				if (!class_exists('ATEC_wpb_db_tools')) @require(__DIR__.'/atec-wpb-db-tools.php');
				$result = (new ATEC_wpb_db_tools())->atec_wpb_restore($zipPath,$wpbDirPath);
				$success = is_numeric($result);
				echo '</div>';
				if ($success) atec_success_msg(esc_attr(number_format($result)).' tables restored.<br>Backup restored successfully: '.$id);
				else atec_error_msg('Restore failed: '.esc_attr(rtrim($result,'.')));
				echo '<br>';
			}
			
			if (in_array($action,['restore_FILES','restore_CONTENT']) && $confirmed)
			{
				$zipPath=$wpbDirPath.$id;
				if (!class_exists('ATEC_wpb_files_tools')) @require(__DIR__.'/atec-wpb-files-tools.php');
				$result = (new ATEC_wpb_files_tools())->atec_wpb_restore($zipPath,$type==='FILES'?get_home_path():WP_CONTENT_DIR);
				$success = is_numeric($result);
				echo '</div>';
				if ($success) atec_success_msg(esc_attr(number_format($result)).' files restored.<br>Backup restored successfully: '.$id);
				else atec_error_msg('Restore failed: '.esc_attr(rtrim($result,'.')));
				echo '<br>';
			}
			
			elseif ($action==='create_DB')
			{
				$zipName=$prefix.'.zip';
				@require(__DIR__.'/atec-wpb-db-tools.php');
				$result = (new ATEC_wpb_db_tools())->atec_wpb_backup($wpbDirPath.$prefix.'.sql',true,$atec_wpb_settings['ex_db']??'');
				$success = is_numeric($result);
				echo '</div>';
				if ($success) atec_success_msg(esc_attr(number_format($result)).' tables saved.<br>Backup created successfully: '.$zipName);
				else atec_error_msg('Backup failed: '.esc_attr(rtrim($result,'.')));
				echo '<br>';
			}
			
			if (in_array($action,['create_FILES','create_CONTENT']))
			{
				$zipName=$prefix.'.zip';
				if (!class_exists('ATEC_wpb_files_tools')) @require(__DIR__.'/atec-wpb-files-tools.php');
				$root=$afs->fix_separator($type==='FILES'?get_home_path():WP_CONTENT_DIR);
				$result = (new ATEC_wpb_files_tools())->atec_wpb_backup($wpbDirPath.$zipName,true,$atec_wpb_settings['ex_'.strtolower($type)]??'',$root);
				$success = is_numeric($result);
				echo '</div>';
				if ($success) atec_success_msg(esc_attr(number_format($result)).' files saved.<br>Backup created successfully: '.$zipName); 
				else atec_error_msg('Backup failed: '.esc_attr(rtrim($result,'.')));
				echo '<br>';
			}
		
			if ($activeCreate && $success)
			{
				atec_reg_inline_script('wpb_success','
				jQuery("#backupList tbody").append("\
				<tr><td class=\'emptyTR1\' colspan=\'7\'></td></tr>\
				<tr><td class=\'emptyTR2\' colspan=\'7\'></td></tr>\
				<tr><td></td><td colspan=\'7\'>'.esc_attr($zipName).'</td></tr>");');
			}
			
			if ($activeCommand) 
			{
				atec_info_msg('Processing time: '.round((hrtime(true)-$start)/1000000000).' s');
				echo '<br>';
				atec_reg_inline_script('wpb_processing','jQuery("#atec_wpb_warning, .atec-loader-dots").slideUp();');
			}

			if ($nav==='Backup')
			{
				echo '
				<h4>Manual trigger</h4>
				<div class="atec-btn-div atec-fit">
					<div class="tablenav">';
						atec_nav_button($url,$nonce,'create_DB',$nav,'Backup DB now');
						atec_nav_button($url,$nonce,'create_FILES',$nav,'Backup FILES now');
						atec_nav_button($url,$nonce,'create_CONTENT',$nav,'Backup CONTENT now');
					echo '
					</div>
				</div>';
				
				echo '				
				<div class="atec-box-white">
					<span class="atec-headline">Statistics:</span>
					DB backup: ≈ 6 MB/s, ≈ 90% compression.<br>FILES backup: ≈ 25 MB/s, ≈ 75% compression.
				</div>';
			}
			else
			{
				echo '				
				<div class="atec-box-white">
					<span class="atec-headline">Statistics:</span>
					DB restore: ≈ 6 MB/s.<br>FILES restore: ≈ 40 MB/s.
				</div>';
			}
				
		echo '
		</div>
	</div>
	
</div>';
	
}}
?>