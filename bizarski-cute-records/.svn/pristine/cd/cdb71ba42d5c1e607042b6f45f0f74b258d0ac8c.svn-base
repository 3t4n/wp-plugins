<?php 

require_once("header.php"); 

global $wpdb;
$records = $wpdb->get_results("SELECT id, name FROM ".$wpdb->prefix."cuterecords ORDER BY releasedate DESC");
$has_records = count($records);

if(!$has_records) { 
	echo '<div class="error"><p>Please, add a record first.</p></div>';
}

$rid = $rid ? $rid : $records[0]->id;
$section_url = get_admin_url(false, "admin.php?page=cuterecords-tracks&rid=".$rid); 

$uploads = wp_upload_dir();
$baseurl = $uploads['baseurl'];

if($_POST['submit_cuterecord'] == "Y") { 
	global $wpdb;
	$oldfile = $wpdb->get_var("SELECT mp3 FROM ".$wpdb->prefix."cuterecords_tracks WHERE id='".$id."'");
	$filename = $oldfile ? $oldfile : '';
	if($_FILES['cuterecords_mp3']['size']) { 
		require_once("class.browser.php");
		$msg = "";
		$file_type = $_FILES["cuterecords_mp3"]["type"];
		if($file_type == "audio/mp3" || $file_type == "audio/mpeg") {
			$filename = Browser::upload_mp3("cuterecords_mp3");
			if($filename && $oldfile) { 

				$upload_base = $uploads['basedir'];
	
				$path = $upload_base.cuterecords_DIRS."mp3".cuterecords_DIRS.$oldfile;
				if(file_exists($path)){ 
					unlink($path);
				}
			}
		} 
	}

	$data = array(
		'record_id' => $_POST['cuterecords_record_id'],
		'name' => $_POST['cuterecords_name'],
		'songnum' => $_POST['cuterecords_songnum'],
		'lyrics' => $_POST['cuterecords_lyrics'],
		'time' => $_POST['cuterecords_time'], 
		'video' => $_POST['cuterecords_video'], 
		'download' => $_POST['cuterecords_download'], 
		'mp3' => $filename
	);

	if($action == "edit") { 
		global $wpdb; 
		$wpdb->update($wpdb->prefix."cuterecords_tracks", $data, array("id"=>$id)); 		
		?>
		<div class="updated"><p><strong><?php _e('Successfully updated track!'); ?></strong></p></div>
		<?php
	} else { 
		global $wpdb; 
		$wpdb->insert($wpdb->prefix."cuterecords_tracks", $data); 
		$newid = $wpdb->insert_id;
		$action = "";  ?>
		<div class="updated"><p><strong><?php _e('Successfully added new track!'); ?></strong></p></div>
		<?php
	}

}

if($action == "trash") { 
	global $wpdb; 
	
	$oldfile = $wpdb->get_var("SELECT mp3 FROM ".$wpdb->prefix."cuterecords_tracks WHERE id='".$id."'");
	if($oldfile && $oldfile != "") { 

		$upload_base = $uploads['basedir'];
	
		$path = $upload_base.cuterecords_DIRS."mp3".cuterecords_DIRS.$oldfile;
		if(file_exists($path)){ 
			unlink($path);
		}
	}
	
	$wpdb->query("DELETE FROM ".$wpdb->prefix."cuterecords_tracks WHERE id='".$id."'"); 
	?>
	<div class="updated"><p><strong><?php _e('Successfully deleted track!'); ?></strong></p></div>
	<?php
}

?>

<div class="wrap">

<div id="icon-link-manager" class="icon32"><br></div>

<?php 

switch($action) { 
	
	case("new") : 
	case("edit") : ?>
		<h2><?php echo  __( 'Cute Records' ); ?> - 
		<?php 
		
		global $wpdb;
		$row = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."cuterecords_tracks WHERE id='".$id."'");
		echo $action == "edit" ? __( 'Edit Track' ) : __( 'New Track' ); 
		 ?>
		</h2>
		<form name="cuterecords_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">	
		<input type="hidden" name="submit_cuterecord" value="Y">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div class="stuffbox">
						<h3><?php echo  __( 'Track Details' ); ?></h3>
						<div class="inside">
							<table class="links-table" cellpadding="0">
								<tbody>
								<tr>
									<th scope="row"><label for="cuterecords_record_id">* <?php echo __('Record'); ?></label></th>
									<td><select name="cuterecords_record_id" id="cuterecords_record_id">
									<?php 
									foreach($records as $res) { 
										echo '<option value="'.$res->id.'"';
										if($row) { 
											echo $res->id == $row->record_id ? ' selected="selected"' : '';
										} else { 
											echo $res->id == $rid ? ' selected="selected"' : '';
										}
										echo '>'.stripslashes($res->name).'</option>';
									}
									
									?>
									</select></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_songnum">* <?php echo __('Track Number'); ?></label></th>
									<td><input name="cuterecords_songnum" id="cuterecords_songnum" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->songnum)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_name">* <?php echo __('Name'); ?></label></th>
									<td><input name="cuterecords_name" id="cuterecords_name" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->name)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_time">* <?php echo __('Length'); ?></label></th>
									<td><input name="cuterecords_time" id="cuterecords_time" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->time)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_mp3"><?php echo __('MP3'); ?></label></th>
									<td>
									<input id="cuterecords_mp3" type="file" name="cuterecords_mp3"><br>
									<?php if($row) { if($row->mp3) { ?>
									<a target="_blank" href="<?php echo $baseurl.'/mp3/'.$row->mp3; ?>"><?php echo __('Current file'); ?></a>
									<br><label for="cuterecords_download"><?php echo __('Downloadable'); ?></label>&nbsp;
									<input id="cuterecords_download" type="checkbox" name="cuterecords_download" value="1"<?php echo $row && $row->download ? ' checked="checked"' : ''; ?>>
									<?php } } ?>
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_video"><?php echo __('Link to Video'); ?></label></th>
									<td><input name="cuterecords_video" id="cuterecords_video" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->video)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_lyrics"><?php echo __('Lyrics'); ?></label></th>
									<td><textarea cols="40" rows="5" name="cuterecords_lyrics" id="cuterecords_lyrics"><?php echo $row ? stripslashes($row->lyrics) : '' ?></textarea></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
					
				<div id="postbox-container-1" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables">
						<div id="linksubmitdiv" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<input type="hidden" name="submit_cute_agg" value="Y">
							<h3 class="hndle"><span>Save</span></h3>
							<div class="inside">
								<div class="submitbox" id="submitlink">

									<div id="major-publishing-actions">
										<?php if($action == "edit") { ?>
										<div id="delete-action">
											<?php $delete_params = array('action' => "trash", 'id' => $id); ?>
											<a class="submitdelete deletion" href="<?php echo add_query_arg($delete_params, $section_url); ?>"><?php echo __("Trash"); ?></a>
										</div>
										<?php } ?>

										<div id="publishing-action">
											<input name="save" class="button-primary" id="publish" accesskey="p" value="<?php echo __('Save'); ?>" type="submit">
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
			</div>

		</div>
		</form>
		<?php
		break; 
	default : 
		?>
	
		<h2>
		<?php echo  __( 'Cute Records' ); ?> - <?php echo  __( 'All Tracks' ); ?>
		<?php if($has_records) { ?>
		<a class="add-new-h2" href="<?php echo add_query_arg($new_params, $section_url) ?>"><?php echo __('New Track'); ?></a> 
		<?php } ?>
		</h2>
				
		<br class="clear">
		
		<div class="tablenav top">
	
			<div class="alignleft actions">
				<div style="float: left; margin-right: 5px; line-height: 25px;"><?php _e('Select record: '); ?></div>
				<form style="display: inline" name="cuterecords_filter_form" method="GET" action="<?php echo $section_url; ?>">
				<input type="hidden" name="page" value="cuterecords-tracks">
				<select name="rid">
					<?php 
					foreach($records as $res) { 
						echo '<option value="'.$res->id.'"'.($res->id == $rid ? ' selected="selected"' : '').'>'.stripslashes($res->name).'</option>';
					}
					?>
				</select>
				<input name="" id="doaction" class="button-secondary action" value="<?php _e('Filter'); ?>" type="submit">
				</form>
				<br class="clear">
			</div>

			<br class="clear">
		</div>

		<table class="wp-list-table widefat fixed posts" cellspacing="0">
			<thead>
			<tr>
				<th style="width: 30px"><?php echo __('#'); ?></th>
				<th><?php echo __('Track'); ?></th>
				<th><?php echo __('Album'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php 
			global $wpdb;
			$res = $wpdb->get_results("SELECT tracks.id, tracks.songnum, tracks.name, recs.name AS albumname 
			FROM ".$wpdb->prefix."cuterecords_tracks AS tracks JOIN ".$wpdb->prefix."cuterecords AS recs 
			ON tracks.record_id = recs.id WHERE tracks.record_id = '".$rid."' 
			ORDER BY record_id DESC, recs.releasedate DESC, songnum ASC");
			foreach($res as $row) { 
				$edit_params = array('action' => "edit", 'id' => $row->id);
				$delete_params = array('action' => "trash", 'id' => $row->id);
				?>
				<tr>
					<td>
						<?php echo $row->songnum; ?>
					</td>
					<td>
						<strong><?php echo stripslashes($row->name); ?></strong>
						<div class="row-actions">
							<span class="edit"><a href="<?php echo add_query_arg($edit_params, $section_url); ?>">Edit</a> | </span>
							<span class="trash"><a class="submitdelete" href="<?php echo add_query_arg($delete_params, $section_url); ?>">Trash</a></span>
						</div>
					</td>
					<td>
						<?php echo stripslashes($row->albumname); ?>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	
		<?php 
		break; 
}

?>

</div>