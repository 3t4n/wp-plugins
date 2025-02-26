<?php 

require_once("header.php"); 
$section_url = get_admin_url(false, "admin.php?page=cuterecords-admin"); 

$uploads = wp_upload_dir();
$baseurl = $uploads['baseurl'];

if($_POST['submit_cuterecord'] == "Y") { 
	global $wpdb;
	$oldfile = $wpdb->get_var("SELECT cover FROM ".$wpdb->prefix."cuterecords WHERE id='".$id."'");
	$filename = $oldfile ? $oldfile : '';
	if(is_uploaded_file($_FILES['cuterecords_cover']['tmp_name'])) { 
		require_once("class.image.php");
		require_once("upload_image.php");
		$success = upload_image("cuterecords_cover");
		if(is_array($success)) { 
			$filename = $success[0];
			if($oldfile && $oldfile != "na.jpg") { 
			
				$upload_base = $uploads['basedir'];
			
				$path = $upload_base.cuterecords_DIRS."covers".cuterecords_DIRS.$oldfile;
				if(file_exists($path)){ 
					unlink($path);
				}
				$path = $upload_base.cuterecords_DIRS."covers".cuterecords_DIRS."thumbs".cuterecords_DIRS.$oldfile;
				if(file_exists($path)){ 
					unlink($path);
				}
			}
		}
	}

	$data = array(
		'name' => $_POST['cuterecords_name'],
		'artist' => $_POST['cuterecords_artist'],
		'more_info' => $_POST['cuterecords_more_info'],
		'format' => $_POST['cuterecords_format'],
		'releasedate' => $_POST['cuterecords_releasedate'], 
		'button1_label' => $_POST['cuterecords_button1_label'], 
		'button1_url' => $_POST['cuterecords_button1_url'], 
		'button1_target' => $_POST['cuterecords_button1_target'], 
		'button2_label' => $_POST['cuterecords_button2_label'], 
		'button2_url' => $_POST['cuterecords_button2_url'], 
		'button2_target' => $_POST['cuterecords_button2_target'], 
		'button3_label' => $_POST['cuterecords_button3_label'], 
		'button3_url' => $_POST['cuterecords_button3_url'], 
		'button3_target' => $_POST['cuterecords_button3_target'], 
		'label' => $_POST['cuterecords_label'], 
		'catalog_num' => $_POST['cuterecords_catalog_num'], 
		'cover' => $filename
	);

	if($action == "edit") { 
		global $wpdb; 
		$wpdb->update($wpdb->prefix."cuterecords", $data, array("id"=>$id)); 		
		?>
		<div class="updated"><p><strong><?php _e('Successfully updated record!'); ?></strong></p></div>
		<?php
	} else { 
		global $wpdb; 
		$wpdb->insert($wpdb->prefix."cuterecords", $data); 
		$newid = $wpdb->insert_id;
		$action = "";  ?>
		<div class="updated"><p><strong><?php _e('Successfully created new record!'); ?></strong></p></div>
		<?php
	}

}

if($action == "trash") { 
	global $wpdb; 
	$oldfile = $wpdb->get_var("SELECT cover FROM ".$wpdb->prefix."cuterecords WHERE id='".$id."'");
	if($oldfile != "na.jpg") { 

		$upload_base = $uploads['basedir'];
	
		$path = $upload_base.cuterecords_DIRS."covers".cuterecords_DIRS.$oldfile;
		if(file_exists($path)){ 
			unlink($path);
		}
	}
	$wpdb->query("DELETE FROM ".$wpdb->prefix."cuterecords WHERE id='".$id."'"); 
	$wpdb->query("DELETE FROM ".$wpdb->prefix."cuterecords_tracks WHERE record_id='".$id."'"); 
	?>
	<div class="updated"><p><strong><?php _e('Successfully deleted record!'); ?></strong></p></div>
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
		$row = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."cuterecords WHERE id='".$id."'");
		echo $action == "edit" ? __( 'Edit Record' ) : __( 'New Record' ); 
		 ?>
		</h2>
		<form name="cuterecords_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">	
		<input type="hidden" name="submit_cuterecord" value="Y">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div class="stuffbox">
						<h3><?php echo  __( 'Record Details' ); ?></h3>
						<div class="inside">
							<table class="links-table" cellpadding="0">
								<tbody>
								<tr>
									<th scope="row"><label for="cuterecords_cover">* <?php echo __('Front Cover Art'); ?></label></th>
									<td>
									<input id="cuterecords_cover" type="file" name="cuterecords_cover"><br>
									<?php if($row) { if($row->cover) { ?><img alt="" style="float: right" src="<?php echo $baseurl.'/covers/thumbs/'.$row->cover; ?>"><?php } } ?>
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_artist"><?php echo __('Artist Name'); ?></label></th>
									<td><input name="cuterecords_artist" id="cuterecords_artist" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->artist)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_name">* <?php echo __('Album Name'); ?></label></th>
									<td><input name="cuterecords_name" id="cuterecords_name" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->name)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_releasedate">* <?php echo __('Release Date'); ?></label></th>
									<td><input name="cuterecords_releasedate" id="cuterecords_releasedate" size="100" class="datepicker" value="<?php echo $row ? esc_attr(stripslashes($row->releasedate)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_label">* <?php echo __('Record Label'); ?></label></th>
									<td><input name="cuterecords_label" id="cuterecords_label" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->label)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_catalog_num"><?php echo __('Catalog Number'); ?></label></th>
									<td><input name="cuterecords_catalog_num" id="cuterecords_catalog_num" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->catalog_num)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_format">* <?php echo __('Album Format'); ?></label></th>
									<td><input name="cuterecords_format" id="cuterecords_format" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->format)) : '' ?>" type="text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="cuterecords_more_info"><?php echo __('Additional Info'); ?></label></th>
									<td><input name="cuterecords_more_info" id="cuterecords_more_info" size="100" value="<?php echo $row ? esc_attr(stripslashes($row->more_info)) : '' ?>" type="text"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="stuffbox">
						<h3><?php echo  __( 'Buttons (optional)'); ?></h3>
						<div class="inside">
							<table class="links-table" cellpadding="0">
								<tbody>
								<tr>
									<th scope="row"><label><?php echo __('Button 1'); ?></label></th>
									<td><label for="cuterecords_button1_label"><?php echo __('Text'); ?></label>
									<input name="cuterecords_button1_label" id="cuterecords_button1_label" size="64" value="<?php echo $row ? esc_attr(stripslashes($row->button1_label)) : '' ?>" type="text" style="width: 30%"> 
									&nbsp;<label for="cuterecords_button1_url"><?php echo __('URL'); ?></label>
									<input name="cuterecords_button1_url" id="cuterecords_button1_url" size="256" value="<?php echo $row ? esc_attr(stripslashes($row->button1_url)) : '' ?>" type="text" style="width: 40%"></td>
								</tr>
								<tr>
									<th scope="row">&nbsp;</th>
									<td>
									<input name="cuterecords_button1_target" id="cuterecords_button1_target" type="checkbox" value="1"<?php echo $row && $row->button1_target ? ' checked="checked"' : ''; ?>>&nbsp;
									<label for="cuterecords_button1_target"><?php echo __('Open link in new window'); ?></label>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php echo __('Button 2'); ?></label></th>
									<td><label for="cuterecords_button2_label"><?php echo __('Text'); ?></label>
									<input name="cuterecords_button2_label" id="cuterecords_button2_label" size="64" value="<?php echo $row ? esc_attr(stripslashes($row->button2_label)) : '' ?>" type="text" style="width: 30%">
									&nbsp;<label for="cuterecords_button2_url"><?php echo __('URL'); ?></label>
									<input name="cuterecords_button2_url" id="cuterecords_button2_url" size="256" value="<?php echo $row ? esc_attr(stripslashes($row->button2_url)) : '' ?>" type="text" style="width: 40%"></td>
								</tr>
								<tr>
									<th scope="row">&nbsp;</th>
									<td>
									<input name="cuterecords_button2_target" id="cuterecords_button2_target" type="checkbox" value="1"<?php echo $row && $row->button2_target ? ' checked="checked"' : ''; ?>>&nbsp;
									<label for="cuterecords_button2_target"><?php echo __('Open link in new window'); ?></label>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php echo __('Button 3'); ?></label></th>
									<td><label for="cuterecords_button3_label"><?php echo __('Text'); ?></label>
									<input name="cuterecords_button3_label" id="cuterecords_button3_label" size="64" value="<?php echo $row ? esc_attr(stripslashes($row->button3_label)) : '' ?>" type="text" style="width: 30%">
									&nbsp;<label for="cuterecords_button3_url"><?php echo __('URL'); ?></label>
									<input name="cuterecords_button3_url" id="cuterecords_button3_url" size="256" value="<?php echo $row ? esc_attr(stripslashes($row->button3_url)) : '' ?>" type="text" style="width: 40%"></td>
								</tr>
								<tr>
									<th scope="row">&nbsp;</th>
									<td>
									<input name="cuterecords_button3_target" id="cuterecords_button3_target" type="checkbox" value="1"<?php echo $row && $row->button3_target ? ' checked="checked"' : ''; ?>>&nbsp;
									<label for="cuterecords_button3_target"><?php echo __('Open link in new window'); ?></label>
									</td>
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
	default : ?>
	
		<h2>
		<?php echo  __( 'Cute Records' ); ?> - <?php echo  __( 'All Records' ); ?>
		<a class="add-new-h2" href="<?php echo add_query_arg($new_params, $section_url) ?>"><?php echo __('New Record'); ?></a> 
		</h2>
				
		<br class="clear">

		<table class="wp-list-table widefat fixed posts" cellspacing="0">
			<thead>
			<tr>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Type'); ?></th>
				<th><?php echo __('Format'); ?></th>
				<th><?php echo __('Release Date'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php 
			global $wpdb;
			$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cuterecords ORDER BY releasedate DESC");
			foreach($res as $row) { 
				$edit_params = array('action' => "edit", 'id' => $row->id);
				$delete_params = array('action' => "trash", 'id' => $row->id);
				?>
				<tr>
					<td>
						<strong><?php echo stripslashes($row->name); ?></strong>
						<div class="row-actions">
							<span class="edit"><a href="<?php echo add_query_arg($edit_params, $section_url); ?>">Edit</a> | </span>
							<span class="trash"><a class="submitdelete" href="<?php echo add_query_arg($delete_params, $section_url); ?>">Trash</a></span>
						</div>
					</td>
					<td>
						<?php echo stripslashes($row->type); ?>
					</td>
					<td>
						<?php echo stripslashes($row->format); ?>
					</td>
					<td>
						<?php echo date("d F Y", strtotime($row->releasedate)); ?>
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