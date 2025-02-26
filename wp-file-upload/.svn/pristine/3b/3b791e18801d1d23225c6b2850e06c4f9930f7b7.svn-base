<?php

/**
 * View Log Page in Dashboard Area of Plugin
 *
 * This file contains functions related to View Log page of plugin's Dashboard
 * area.
 *
 * @link /lib/wfu_admin_log.php
 *
 * @package WordPress File Upload Plugin
 * @subpackage Core Components
 * @since 2.4.1
 */

/**
 * Display the View Log Page.
 *
 * This function displays the View Log page of the plugin's Dashboard area.
 *
 * @since 2.4.1
 *
 * @param integer $page Optional. The page to display in case log contents are
 *        paginated.
 * @param bool $only_table_rows Optional. Return only the HTML code of the table
 *        rows.
 * @param bool $located_rec Optional. The unique ID of a log record to focus and
 *        highlight.
 *
 * @return string The HTML output of the plugin's View Log Dashboard page.
 */
function wfu_view_log($page = 1, $only_table_rows = false, $located_rec = -1) {
	$a = func_get_args(); $a = WFU_FUNCTION_HOOK(__FUNCTION__, $a, $out); if (isset($out['vars'])) foreach($out['vars'] as $p => $v) $$p = $v; switch($a) { case 'R': return $out['output']; break; case 'D': die($out['output']); }
	global $wpdb;
	$siteurl = site_url();
	$table_name1 = $wpdb->prefix . "wfu_log";
	$table_name2 = $wpdb->prefix . "wfu_userdata";
	$plugin_options = wfu_decode_plugin_options(get_option( "wordpress_file_upload_options" ));

	if ( !current_user_can( 'manage_options' ) ) return;
	
	$maxrows = (int)WFU_VAR("WFU_HISTORYLOG_TABLE_MAXROWS");
	//get log data from database
	$files_total = $wpdb->get_var('SELECT COUNT(idlog) FROM '.$table_name1);
	//if we need to locate and focus on a specific record, then we need to
	//recalculate and define the right page
	if ( $located_rec > 0 && $maxrows > 0 ) {
		$files_before = $wpdb->get_var('SELECT COUNT(idlog) FROM '.$table_name1.' WHERE idlog > '.(int)$located_rec);
		$page = floor( $files_before / $maxrows ) + 1;
	}
	$filerecs = $wpdb->get_results('SELECT * FROM '.$table_name1.' ORDER BY date_from DESC'.( $maxrows > 0 ? ' LIMIT '.$maxrows.' OFFSET '.(($page - 1) * $maxrows) : '' ));

	$echo_str = "";
	if ( !$only_table_rows ) {
		$echo_str .= "\n".'<div class="wrap">';
		$echo_str .= wfu_generate_dashboard_menu_title("\n\t");
		$echo_str .= "\n\t".'<div style="margin-top:20px;">';
		$echo_str .= wfu_generate_dashboard_menu("\n\t\t", "View Log");
		$echo_str .= "\n\t".'<div style="position:relative;">';
		$echo_str .= wfu_add_loading_overlay("\n\t\t", "historylog");
		$echo_str .= "\n\t\t".'<div class="wfu_historylog_header" style="width: 100%;">';
		if ( $maxrows > 0 ) {
			$pages = max(ceil($files_total / $maxrows), 1);
			if ( $page > $pages ) $page = $pages;
			$echo_str .= wfu_add_pagination_header("\n\t\t\t", "historylog", $page, $pages);
		}
		$echo_str .= "\n\t\t".'</div>';
		$echo_str .= "\n\t\t".'<table id="wfu_historylog_table" class="wfu-historylog wp-list-table widefat fixed striped">';
		$echo_str .= "\n\t\t\t".'<thead>';
		$echo_str .= "\n\t\t\t\t".'<tr>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="5%" class="manage-column">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>#</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="30%" class="manage-column column-primary">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>File</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="10%" class="manage-column">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>Action</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="15%" class="manage-column">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>Date</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="15%" class="manage-column">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>User</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<th scope="col" width="25%" class="manage-column">';
		$echo_str .= "\n\t\t\t\t\t\t".'<label>Remarks</label>';
		$echo_str .= "\n\t\t\t\t\t".'</th>';
		$echo_str .= "\n\t\t\t\t".'</tr>';
		$echo_str .= "\n\t\t\t".'</thead>';
		$echo_str .= "\n\t\t\t".'<tbody>';
	}

	$uploadids = wp_list_pluck($filerecs, 'uploadid');
	$userdatarecs = $wpdb->get_results('SELECT * FROM '.$table_name2.' WHERE uploadid IN (\''.implode('\',\'', $uploadids).'\')');
	$deletedfiles = array();
	$filecodes = array();
	$logpagecode = wfu_safe_store_browser_params('view_log&tag='.$page);
	$i = ($page - 1) * $maxrows;
	$filerecs_count = count($filerecs);
	foreach ( $filerecs as $ind => $filerec ) {
		$remarks = wfu_generate_log_remarks($filerec, $ind, $userdatarecs);
		if ( $filerec->action == 'delete' ) {
			array_push($deletedfiles, $filerec->linkedto);
		}
		elseif ( $filerec->action == 'other' ) {
			$filerec->filepath = '';
		}
		$displayed_path = wfu_hide_credentials_from_ftpurl($filerec->filepath);
		$i ++;
		$echo_str .= "\n\t\t\t\t".'<tr'.( $located_rec > 0 && $filerec->idlog == $located_rec ? ' class="wfu-highlighted"' : '' ).'>';
		$echo_str .= "\n\t\t\t\t\t".'<th style="word-wrap: break-word;">'.$i.'</th>';
		$echo_str .= "\n\t\t\t\t\t".'<td class="column-primary" data-colname="File">';
		if ( $filerec->action == 'other' ) $echo_str .= "\n\t\t\t\t\t\t".'<span>Other action not related to file</span>';
		elseif ( $filerec->action == 'datasubmit' ) $echo_str .= "\n\t\t\t\t\t\t".'<span>Submission of data without file</span>';
		elseif ( in_array($filerec->linkedto, $deletedfiles) || in_array($filerec->idlog, $deletedfiles) ) $echo_str .= "\n\t\t\t\t\t\t".'<span>'.$displayed_path.'</span>';
		else {
			//find newest linked record
			$newestidlog = $filerec->idlog;
			$newestind = $ind;
			$parind = $ind;
			while ( $parind >= 0 && $filerecs[$newestind]->date_to != "0000-00-00 00:00:00" ) {
				if ( isset($filerecs[$parind]->linkedto) && $filerecs[$parind]->linkedto == $newestidlog ) {
					$newestind = $parind;
					$newestidlog = $filerecs[$parind]->idlog;
				}
				$parind --;
			}
			//find oldest linked record
			$oldestidlog = $filerec->idlog;
			$oldestind = $ind;
			$parind = $ind;
			while ( $parind < $filerecs_count && isset($filerecs[$oldestind]->linkedto) ) {
				if ( $filerecs[$parind]->idlog == $filerecs[$oldestind]->linkedto ) {
					$oldestind = $parind;
					$oldestidlog = $filerecs[$parind]->idlog;
				}
				$parind ++;
			}
			$lid = $oldestidlog;
			//make the file linkable only if the record is still valid, the
			//filename has not changed (due to a rename action) and the file
			//exists
			$file_abspath = wfu_path_rel2abs($filerec->filepath);
			if ( $filerecs[$newestind]->date_to == "0000-00-00 00:00:00" && $filerec->filepath == $filerecs[$newestind]->filepath && wfu_file_exists($file_abspath, "wfu_view_log") ) {
				if ( !isset($filecodes[$lid]) ) {
					$filecodes[$lid] = ( wfu_check_file_remote_basic($file_abspath) ? "byID:".$filerec->idlog : wfu_safe_store_filepath($filerec->filepath) );
				}
				$echo_str .= "\n\t\t\t\t\t\t".'<a class="row-title" href="'.$siteurl.'/wp-admin/options-general.php?page=wordpress_file_upload&action=file_details&file='.$filecodes[$lid].'&invoker='.$logpagecode.'" title="View and edit file details" style="font-weight:normal;">'.$displayed_path.'</a>';
			}
			else $echo_str .= "\n\t\t\t\t\t\t".'<span>'.$displayed_path.'</span>';
		}
		$echo_str .= "\n\t\t\t\t\t\t".'<button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button>';
		$echo_str .= "\n\t\t\t\t\t".'</td>';
		$echo_str .= "\n\t\t\t\t\t".'<td data-colname="Action">'.( $filerec->action != 'other' && $filerec->action != 'datasubmit' ? $filerec->action : '' ).'</td>';
		$echo_str .= "\n\t\t\t\t\t".'<td data-colname="Date">'.get_date_from_gmt($filerec->date_from).'</td>';
		$echo_str .= "\n\t\t\t\t\t".'<td data-colname="User">'.wfu_get_username_by_id($filerec->userid).'</td>';
		$echo_str .= "\n\t\t\t\t\t".'<td data-colname="Remarks">';
		$echo_str .= $remarks;
		$echo_str .= "\n\t\t\t\t\t".'</td>';
		$echo_str .= "\n\t\t\t\t".'</tr>';
	}
	if ( !$only_table_rows ) {
		$echo_str .= "\n\t\t\t".'</tbody>';
		$echo_str .= "\n\t\t".'</table>';
		$echo_str .= "\n\t".'</div>';
		$echo_str .= "\n\t".'</div>';
		$echo_str .= "\n".'</div>';
	}
	if ( $located_rec > 0 ) {
		$handler = 'function() { wfu_focus_table_on_highlighted_file("wfu_historylog_table"); }';
		$echo_str .= "\n\t".'<script type="text/javascript">if(window.addEventListener) { window.addEventListener("load", '.$handler.', false); } else if(window.attachEvent) { window.attachEvent("onload", '.$handler.'); } else { window["onload"] = '.$handler.'; }</script>';
	}

	return $echo_str;
}

function wfu_generate_log_remarks($filerec, $index, $userdatarecs) {
	$render_plain_remarks = function($content) {
		// extract icon from $content, it will be enclosed in HTML comments
		$icon = preg_replace("/^(<!--\s*(.*?)\s*-->)?.*/", "$2", $content);
		$icon = ( $icon === "" ? "" : "&#x".$icon );
		$content = preg_replace("/^<!--.*?-->/", "", $content);
		$remarks = "\n\t\t\t\t\t\t".'<label class="wfu-historylog-remarks-plain'.( $icon === "" ? '' : ' wfu-icon' ).'" data-icon="'.$icon.'">'.$content.'</label>';
		return $remarks;
	};
	$render_keyvalue_remarks_content = function($content) {
		$remarks = '';
		foreach ( $content as $item ) {
			$remarks .= "\n\t\t\t\t\t\t\t\t".'<div class="wfu-historylog-remarks-row">';
			$remarks .= "\n\t\t\t\t\t\t\t\t\t".'<span class="wfu-historylog-remarks-label">'.esc_attr($item["key"]).':</span>';
			$remarks .= "\n\t\t\t\t\t\t\t\t\t".'<span class="wfu-historylog-remarks-value">'.esc_attr($item["value"]).'</span>';
			$remarks .= "\n\t\t\t\t\t\t\t\t".'</div>';
		}
		return $remarks;
	};
	$render_remarks_block = function($title, $content, $index, $icon) {
		$icon = ( $icon === "" ? "" : "&#x".$icon );
		$remarks = "\n\t\t\t\t\t\t".'<div class="wfu-historylog-remarks">';
		if ( $title !== "" ) {
			$remarks .= "\n\t\t\t\t\t\t\t".'<input type="checkbox" class="wfu-historylog-remarks-switch" id="wfu_historylog_remarks_switch_'.$index.'" checked />';
			$remarks .= "\n\t\t\t\t\t\t\t".'<div class="wfu-historylog-remarks-header">';
			$remarks .= "\n\t\t\t\t\t\t\t\t".'<label class="wfu-historylog-remarks-title'.( $icon === "" ? '' : ' wfu-icon' ).'" data-icon="'.$icon.'">'.esc_attr($title).'</label>';
			$remarks .= "\n\t\t\t\t\t\t\t\t".'<label class="wfu-historylog-remarks-toggle" for="wfu_historylog_remarks_switch_'.$index.'"></label>';
			$remarks .= "\n\t\t\t\t\t\t\t".'</div>';
		}
		$remarks .= "\n\t\t\t\t\t\t\t".'<div class="wfu-historylog-remarks-content'.( $title === "" ? ' wfu-visible' : ' wfu-indent' ).'">'.$content;
		$remarks .= "\n\t\t\t\t\t\t\t".'</div>';
		$remarks .= "\n\t\t\t\t\t\t".'</div>';
		return $remarks;
	};
	$time0 = strtotime("0000-00-00 00:00:00");
	$remarks = '';
	if ( $filerec->action == 'rename' || $filerec->action == 'move' ) {
		$prevfilepath = '';
		$prevfilerec = wfu_get_file_rec_from_id($filerec->linkedto);
		if ( $prevfilerec != null ) $prevfilepath = $prevfilerec->filepath;
		if ( $prevfilepath != '' )
			$remarks = $render_plain_remarks("Previous filepath: $prevfilepath");
	}
	elseif ( $filerec->action == 'upload' || $filerec->action == 'modify' || $filerec->action == 'datasubmit' ) {
		$userdata_remarks = array();
		foreach ( $userdatarecs as $userdata ) {
			if ( $userdata->uploadid == $filerec->uploadid ) {
				$userdata_datefrom = strtotime($userdata->date_from);
				$userdata_dateto = strtotime($userdata->date_to);
				$filerec_datefrom = strtotime($filerec->date_from);
				if ( $filerec_datefrom >= $userdata_datefrom && ( $userdata_dateto == $time0 || $filerec_datefrom < $userdata_dateto ) ) {
					$item = array( "key" => $userdata->property, "value" => $userdata->propvalue );
					array_push( $userdata_remarks, $item );
				}
			}
		}
		if ( count($userdata_remarks) > 0 ) {
			$remarks_content = $render_keyvalue_remarks_content($userdata_remarks);
			$remarks .= $render_remarks_block("Userdata", $remarks_content, $index, 'f337');
		}
	}
	elseif ( $filerec->action == 'changeuser' ) {
		$prevuploaduserid = '';
		$prevfilerec = wfu_get_file_rec_from_id($filerec->linkedto);
		if ( $prevfilerec != null ) $prevuploaduserid = $prevfilerec->uploaduserid;
		if ( $prevuploaduserid != '' ) {
			$prevuploaduser = wfu_get_username_by_id($prevuploaduserid);
			$remarks = $render_plain_remarks("Previous upload user: $prevuploaduser");
		}
	}
	elseif ( $filerec->action == 'other' ) {
		$info = $filerec->filepath;
		$remarks = $render_plain_remarks($info);
	}
	
	$render_functions = compact( "render_plain_remarks", "render_keyvalue_remarks_content", "render_remarks_block" );
	/**
	 * Custom Log Remarks
	 * 
	 * Allow extensions to customize the generated log remarks.
	 *
	 * @since 4.25.0
	 *
	 * @param string $remarks The generated remarks.
	 * @param object $filerec The file db record.
	 * @param integer $index The row index in the table.
	 * @param array $userdatarecs The list of userdata records of the visible
	 *        log entries.
	 * @param array $render_functions A list of helper functions that generate
	 *        the HTML of the log remarks.
	 */
	$remarks = apply_filters("_wfu_generate_log_remarks", $remarks, $filerec, $index, $userdatarecs, $render_functions);
	
	return $remarks;
}