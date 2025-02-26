<?php
if (!defined('ABSPATH')) { exit(); }

function atec_str_starts_with_array($str, $arr)
{
	foreach ($arr as $a) { if (str_starts_with($str,$a)) return true; }
	return false;
}

class ATEC_wpdb_dashboard { 

function __construct() {		
	
echo 
'<div class="atec-page">';
	$licenseOk = atec_header(__DIR__,'wpdb','Database');
	
	echo 
	'<div class="atec-main">';
		atec_progress();

		$url			= atec_get_url();
		$nonce 	= wp_create_nonce(atec_nonce());
		$action 	= atec_clean_request('action');
		$id 			= atec_clean_request('id');			
		$nav 		= atec_clean_request('nav');
		if ($nav=='') $nav='Tables';
	
		$navs=['#editor-table Tables'];
		if ($nav==='Table') $navs[] = 'Table';
		$navs = array_merge($navs, ['#rocket Optimize','#admin-comments Comments','#blog Posts','#backup Revisions','#hourglass Transients','#settings Options']);
		atec_nav_tab($url, $nonce, $nav, $navs, $licenseOk?999:($nav==='Table'?2:1), $licenseOk);

		echo
		'<div class="atec-g atec-border">';
			atec_flush();
			
			if ($nav=='Info') { @require('atec-info.php'); new ATEC_info(__DIR__); }
			else
			{
				global $wpdb; 	
				// @codingStandardsIgnoreStart
				$prefix=$wpdb->prefix;
				// @codingStandardsIgnoreEnd
				
				if (!function_exists('atec_opt_arr')) @require('atec-check.php');
				@require('atec-wpdb-plugins.php'); $pluginTools=new ATEC_wpdb_plugin_names();
	
				if ($nav=='Optimize') 
				{ if (atec_pro_feature('„Optimize“ reorganizes the physical storage of table and index data, to reduce storage space and increase speed')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-optimize-pro.php');
						if (class_exists('ATEC_wpdb_optimize')) new ATEC_wpdb_optimize($url, $nonce, $action, $prefix);
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Comments') 
				{ if (atec_pro_feature('„Comments“ shows all comments with status SPAM/TRASH – cleanup with a single click')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-comments-pro.php');
						if (class_exists('ATEC_wpdb_comments')) new ATEC_wpdb_comments($url, $nonce, $action, $prefix); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Posts') 
				{ 
					if (atec_pro_feature('„Posts“ shows all pages and posts with status TRASH – cleanup with a single click')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-posts-pro.php');
						if (class_exists('ATEC_wpdb_posts')) new ATEC_wpdb_posts($url, $nonce, $action, $prefix); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Revisions') 
				{ 
					if (atec_pro_feature('„Revisions“ shows all revisions – cleanup with a single click')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-revisions-pro.php');
						if (class_exists('ATEC_wpdb_revisions')) new ATEC_wpdb_revisions($url, $nonce, $action, $prefix); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Table') { @require(__DIR__.'/atec-wpdb-table.php'); new ATEC_wpdb_table($url, $nonce, $action); }
				elseif ($nav=='Transients') 
				{
					if (atec_pro_feature('„Transients“ shows all timed out transients – cleanup with a single click')) 
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-transients-pro.php');
						if (class_exists('ATEC_wpdb_transients')) new ATEC_wpdb_transients($url, $nonce, $action, $prefix); 
						else atec_missing_class_check();
					} 
				}
				elseif ($nav=='Options') 
				{ 
					if (atec_pro_feature('„Options“ shows all entries in the options table. You can selectively delete them and set the autoload value'))
					{ 
						atec_include_if_exists(__DIR__,'atec-wpdb-options-pro.php');
						if (class_exists('ATEC_wpdb_options')) new ATEC_wpdb_options($url, $nonce, $action, $prefix, $pluginTools); 
						else atec_missing_class_check();
					}
				}
				else
				{
				
				$result 	= true;
				if ($action==='delete_table') 
				{ 
					if (($id=atec_clean_request('id'))!=='') 
					{
						// @codingStandardsIgnoreStart
						$result = $wpdb->query($wpdb->prepare('TRUNCATE TABLE %1s', sanitize_text_field($id)))!==false;
						// @codingStandardsIgnoreEnd
						atec_badge('Table '.esc_attr($id).' truncated','Truncation failed ('.$wpdb->last_error.')', $result);	
					}
				}
				elseif ($action==='drop') 
				{ 
					if (($id=atec_clean_request('id'))!=='') 
					{
						// @codingStandardsIgnoreStart
						$result = $wpdb->query($wpdb->prepare('DROP TABLE %1s', sanitize_text_field($id)))!==false;
						// @codingStandardsIgnoreEnd
						atec_badge('Table '.esc_attr($id).' droped','Droping failed ('.$wpdb->last_error.')', $result);	
					}
				}
				elseif ($action==='optimize') 
				{ 
					// @codingStandardsIgnoreStart | Optimizing can take some time.
					set_time_limit(600);
					// @codingStandardsIgnoreEnd
					if (($id=atec_clean_request('id'))!=='') 
					{
						// @codingStandardsIgnoreStart
						$wpdb->show_errors( true );
						$result = $wpdb->query($wpdb->prepare('OPTIMIZE TABLE %1s', sanitize_text_field($id)))!==false;
						// @codingStandardsIgnoreEnd
						atec_badge('Table '.esc_attr($id).' optimized','Optimization of table '.esc_attr($id).' failed ('.$wpdb->last_error.')', $result);	
					}
				}
				
				$arr=array('#database Server'=>$wpdb->db_server_info(), '#database Name'=>$wpdb->dbname, '#database Prefix'=>$prefix);
				atec_little_block_with_info('Tables'.(is_multisite()?' (site-wide)':''), $arr, '', array('update'),$url, $nonce);
				
				atec_table_header_tiny(['#','Name','#admin-plugins','Engine','Format','Rows','Size','Updated','Check','Optimize','Truncate','Drop']);
		
					//https://www.gradually.ai/wordpress-datenbank-tabellen/				
					$wpTables=['commentmeta','comments','links','options','postmeta','posts','terms','termmeta','term_relationships','term_taxonomy','usermeta','users'];	
					$c 			= 0;
					$totalSize = 0;
					$table='Tables_in_'.esc_attr($wpdb->dbname);
					// @codingStandardsIgnoreStart
					$tables = $wpdb->get_results('SHOW TABLES');
					// @codingStandardsIgnoreEnd
					$iconPath=plugin_dir_url(__DIR__).'assets/img/';
					$atec_icon=$iconPath.'atec-group/atec_wpa_icon.svg';
					$woo_icon=$iconPath.'icons/woocommerce.svg';
					$cp_icon=$iconPath.'icons/classicpress.svg';
					$ls_icon=$iconPath.'icons/litespeed.svg';	
					$test=(array) $tables[0];
					if (!isset($test[$table])) $table='name';
					unset($test);
					$isClassic=function_exists('classicpress_version');
					foreach ($tables as $t) 
					{
						$c++;
						$isAtec = str_contains($t->$table,'atec_');
						$isWp 	= in_array(str_ireplace($prefix,'',$t->$table), $wpTables);
						$isWoo 	= str_contains($t->$table,'woocommerce_') || str_contains($t->$table,'wc_') || str_contains($t->$table,'actionscheduler_');
						$isLS 	= str_contains($t->$table,'litespeed_');
						echo '
						<tr>
							<td>', esc_attr($c), '</td>';
							echo '
							<td class="atec-nowrap">',
							'<a class="atec-cursor" onclick="window.location.assign(\'', esc_url($url.'&action=&nav=Table&id='.$t->$table.'&_wpnonce='.$nonce), '\');">', (str_starts_with($t->$table,$prefix)?'<span class="atec-grey">'.esc_attr($prefix).'</span>'.esc_attr(str_replace($prefix,'',$t->$table)):esc_attr($t->$table)), '</a>',
							'</td>';
							// @codingStandardsIgnoreStart | Image is not an attachement
							echo '
							<td>', 
								(
								($isAtec?'<img class="atec-logo" src="'.esc_url($atec_icon).'">':
								($isLS?'<img class="atec-logo" src="'.esc_url($ls_icon).'">':
								($isWp?(
									$isClassic?'<img class="atec-logo" src="'.esc_url($cp_icon).'">':
									'<span class="'.esc_attr(atec_dash_class('wordpress','atec-grey')).'"></span>'):
								($isWoo?'<img class="atec-logo" src="'.esc_url($woo_icon).'">':
								'<span class="atec-small">'.esc_attr($pluginTools->atec_wpdb_getPluginName($t->$table,'_')))))).'</span>'
								),
							'</td>';
							$items =$wpdb->get_results($wpdb->prepare('SELECT count(*) AS count FROM %1s', $t->$table));
							$check =$wpdb->get_results($wpdb->prepare('CHECK TABLE %1s', $t->$table));
							$info = $wpdb->get_results($wpdb->prepare('SHOW TABLE STATUS LIKE %s', $t->$table));
							$size = $info[0]->Data_length+$info[0]->Index_length;
							$totalSize+=$size;
							// @codingStandardsIgnoreEnd
							echo '
							<td>', esc_attr($info[0]->Engine), '</td>
							<td ', ($info[0]->Row_format==='Compressed'?'class="atec-green"':''), '>', esc_attr($info[0]->Row_format), '</td>
							<td class="atec-table-right">', esc_attr($items[0]->count), '</td>
							<td class="atec-table-right">', esc_attr(size_format($size)), '</td>
							<td class="atec-table-right">', (isset($info[0]->Update_time)?esc_attr(gmdate('y/m/d',strtotime($info[0]->Update_time))):''), '</td>
							<td class="atec-table-right ', ($check[0]->Msg_text==='OK'?'atec-green':'atec-red') ,'">', esc_attr($check[0]->Msg_text), '</td>';
							atec_create_button('optimize','performance',true,$url,$t->$table,$nonce);
							if (!$isWp && $items[0]->count>0) atec_button_confirm($url,$nav,$nonce,'delete_table&id='.$t->$table);
							else echo '<td></td>';	
							if (!$isWp && $items[0]->count==0) atec_create_button('drop','trash',true,$url,$t->$table,$nonce);
							else echo '<td></td>';	
						echo '
						</tr>';
					}
					echo '
					<tr>
						<td class="atec-bold">', esc_attr($c), '</td><td colspan="4"></td><td class="atec-bold atec-table-right">', esc_attr(size_format($totalSize)) ,'</td><td colspan="5"></td>
					</tr>
					</tbody>
				</table>';
			}
			}
	
	echo'
		</div>
	</div>
</div>';  

@require('atec-footer.php');

}}

new ATEC_wpdb_dashboard();
?>