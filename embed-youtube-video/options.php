
<?php
if(!defined('ABSPATH')) exit;
global $wpdb;
$table_name = $wpdb->prefix . 'youtube_embed_video_gk';
if(isset($_POST['Save_Options']))
{
	$title=sanitize_text_field($_POST['title']);
	$youtube_url=sanitize_text_field($_POST['youtube_url']);
	$autoplay=sanitize_text_field($_POST['autoplay']);
	$width=sanitize_text_field($_POST['width']);
	$height=sanitize_text_field($_POST['height']);
	$loop_video=sanitize_text_field($_POST['loop_video']);
	$showinfo=sanitize_text_field($_POST['showinfo']);
	$allowfullscreen=sanitize_text_field($_POST['allowfullscreen']);
	$closecaption=sanitize_text_field($_POST['closecaption']);
	$progress_bar=sanitize_text_field($_POST['progress_bar']);
	$related_video=sanitize_text_field($_POST['related_video']); 
	$video_title=sanitize_text_field($_POST['video_title']);
	$start_time=sanitize_text_field($_POST['start_time']);
	$end_time=sanitize_text_field($_POST['end_time']);
	$add_playlist=sanitize_text_field($_POST['add_playlist']);
	$as_ratio=sanitize_text_field($_POST['as_ratio']);
	$show_advance_option=sanitize_text_field($_POST['show_advance_option']);
	
	$nonce=$_POST['eyv_wpnonce'];
	if($show_advance_option == 1){
		$origin=sanitize_text_field($_POST['origin']);
		$genie_menu=sanitize_text_field($_POST['genie_menu']);
		$disable_keyboard=sanitize_text_field($_POST['disable_keyboard']);
		$color=sanitize_text_field($_POST['color']);
	}else{
		$origin='';
		$genie_menu='';
		$disable_keyboard='';
		$color='';
	}	
	$options=json_encode(
		array('autoplay' => $autoplay,'width' => $width,'height' => $height,'loop' => $loop_video,'iv_load_policy' => $showinfo,'allowfullscreen' => $allowfullscreen,'cc_load_policy' => $closecaption,'autohide' => $progress_bar,'start' => $start_time,'end' => $end_time,'playlist' => $add_playlist,'as_ratio' => $as_ratio,'show_advance_option' => $show_advance_option,'origin' => $origin,'genie_menu' => $genie_menu,'disable_keyboard' => $disable_keyboard,'color' => $color,'showinfo' => $video_title,'rel' =>$related_video)
	);
	$insertdata=array(
		'title' => $title,
		'url_video' => $youtube_url,
		'option_value' => $options,
	);
	if(wp_verify_nonce( $nonce, 'eyv_nonce' ))
	{
		if(isset($_GET['editid'])){
			$wpdb->update($table_name,$insertdata,array('id'=>$_GET['editid']));
			
		}else{
			$wpdb->insert($table_name,$insertdata);
		}
		$successmsg=evygk_success_option_msg_add('Video Saved!');
		wp_redirect( site_url().'/wp-admin/admin.php?page=embed-youtube-video-list' );
	}
	else
	{
        $errormsg= evygk_failure_option_msg_add('An error has occurred.');
		
    }    
}

if(isset($_GET['editid'])){
	$getdata = $wpdb->get_row("SELECT * FROM $table_name WHERE id=".$_GET['editid']);
	$options=json_decode($getdata->option_value);
}
 ?>
<div class="wrap">
<h2>Add Embed Youtube Video</h2>
<?php
    if ( isset( $successmsg ) ) 
	{
		echo $successmsg; 
    }
	
    if ( isset( $errormsg ) ) 
	{
        echo $errormsg;
    }
    ?>
	<div class='eyv_embed_inner'>
	<form method="POST" name="embed_youtube" id="embed_youtube" enctype="multipart/form-data">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">YouTube Video Title<span class="description">(required)</span>
						<span class="dashicons dashicons-warning eyv_icon-color" title="Enter YouTube Video Title"></span>
					</th>

					<td>
						<input type="text"  name="title" id="title" value="<?php if(isset($_GET['editid'])){ echo $getdata->title; } ?>" class="regular-text" >
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">YouTube Video URL<span class="description">(required)</span>
						<span class="dashicons dashicons-warning eyv_icon-color" title="The URL (web address) to the YouTube video you want to embed."></span>
					</th>
					<td>
						<input type="text"  name="youtube_url" id="youtube_url" class="regular-text" value="<?php if(isset($_GET['editid'])){ echo $getdata->url_video; } ?>" >
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Autoplay video
						<span class="dashicons dashicons-warning eyv_icon-color" title="Do you want the video to auto play automatically when the webpage opens?"></span>
					</th>
					<td>
						<input type="checkbox" name="autoplay" value="1" id="autoplay" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->autoplay == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Width (in pixels) <span class="description">(required)</span>
						<span class="dashicons dashicons-warning eyv_icon-color" title="Enter a custom video width in pixels, eg 500."></span>
					</th>
					<td>
						<input type="number"  name="width" id="width" class="regular-text"  value="<?php if(isset($_GET['editid'])){ echo $options->width; } ?>" >
						<div class="eyvfk_video_ration_info">This Width affected on only desktop view</div>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Height (in pixels) <span class="description">(required)</span>
					<span class="dashicons dashicons-warning eyv_icon-color" title="Enter a custom video height in pixels, eg 500."></span></th>
					<td>
						<input type="number"  name="height" id="height"  class="regular-text" value="<?php if(isset($_GET['editid'])){ echo $options->height; } ?>" >
						<div class="eyvfk_video_ration_info">This Height affected on only desktop view</div>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Loop video
						<span class="dashicons dashicons-warning eyv_icon-color" title="Repeat (loop) the video repeatedly."></span>
					</th>
					<td>
						<input type="checkbox" name="loop_video" value="1" id="loop_video" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->loop == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show Annotations
						<span class="dashicons dashicons-warning eyv_icon-color" title="Enable or disable text annotations in the video."></span>
					</th>
					<td>
						<input type="checkbox" name="showinfo" value="1" id="showinfo" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->iv_load_policy == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Allow full screen
					<span class="dashicons dashicons-warning eyv_icon-color" title="Enable or disable users from using the video in fullscreen."></span>
					</th>
					<td>
						<input type="checkbox" name="allowfullscreen" value="1" id="allowfullscreen" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->allowfullscreen == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Closed captions</th>
					<td>
						<input type="checkbox" name="closecaption" value="1" id="closecaption" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->cc_load_policy == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Progress bar</th>
					<td>
						<select name="progress_bar" id="progress_bar">
							<option value="">— Select—</option>
							<option <?php if(isset($_GET['editid'])){ if($options->autohide == '1'){ ?> selected <?php } } ?> value="1">Autohide</option>
							<option <?php if(isset($_GET['editid'])){ if($options->autohide == '0'){ ?> selected <?php } } ?>  value="0">Visible</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show related videos
					<span class="dashicons dashicons-warning eyv_icon-color" title="Show or hide related videos at the end of your video."></span>
					</th>
					<td>
						<input type="checkbox" name="related_video" value="1" id="related_video" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->rel == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show  videos title
					<span class="dashicons dashicons-warning eyv_icon-color" title="Show or hide the video's text title."></span>
					</th>
					<td>
						<input type="checkbox" name="video_title" value="1" id="video_title" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->showinfo == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Start time (in sec)
					<span class="dashicons dashicons-warning eyv_icon-color" title="Force the video to start at a specific point, in seconds. EG '5'."></span>
					</th>
					<td>
						<input type="number" name="start_time" value="<?php if(isset($_GET['editid'])){ echo $options->start; }?>" id="start_time">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">End time (in sec)
					<span class="dashicons dashicons-warning eyv_icon-color" title="Force the video to end at a specific point, in seconds. EG '50'."></span>
					</th>
					<td>
						<input type="number" name="end_time" value="<?php if(isset($_GET['editid'])){ echo $options->end; }?>" id="end_time">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Add to Playlist
						<span class="dashicons dashicons-warning eyv_icon-color" title="Add a playlist ID (number) to play as part of your playlist."></span>
					</th>
					<td>
						<input type="number" name="add_playlist" value="<?php if(isset($_GET['editid'])){ echo $options->playlist; }?>" id="add_playlist">
					</td>
				</tr>
			
				<tr valign="top">
					<th scope="row">Aspect ratio</th>
					<td>
						<select name="as_ratio" id="as_ratio">
							<option value="">— Select—</option>
							<option <?php if(isset($_GET['editid'])){ if($options->as_ratio == '16:9'){ ?> selected <?php } } ?> value="16:9">16:9</option>
							<option <?php if(isset($_GET['editid'])){ if($options->as_ratio == '4:3'){ ?> selected <?php } } ?> value="4:3">4:3</option>
							<option <?php if(isset($_GET['editid'])){ if($options->as_ratio == '1:1'){ ?> selected <?php } } ?> value="1:1">1:1</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show advanced options</th>
					<td>
						<input type="checkbox" name="show_advance_option" value="1" id="show_advance_option" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->show_advance_option == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top" id="trorigin">
					<th scope="row">Origin</th>
					<td>
						<input type="number" name="origin"  id="origin" class="regular-text" value="<?php if(isset($_GET['editid'])){ echo $options->origin; } ?>" >
					</td>
				</tr>
				<tr valign="top" id="trgenie_menu">
					<th scope="row">Genie menu</th>
					<td>
						<input type="checkbox" name="genie_menu" value="1" id="genie_menu" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->genie_menu == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top" id="trdisable_keyboard">
					<th scope="row">Disable keyboard</th>
					<td>
						<input type="checkbox" name="disable_keyboard" value="1" id="disable_keyboard" class="regular-text" <?php if(isset($_GET['editid'])){ if($options->disable_keyboard == '1'){ ?> checked <?php } } ?>>
					</td>
				</tr>
				<tr valign="top" id="trcolor">
					<th scope="row">Color</th>
					<td>
						<select name="color" id="color">
							<option value="">— Select—</option>
							<option <?php if(isset($_GET['editid'])){ if($options->color == 'red'){ ?> selected <?php } } ?> value="red">Red</option>
							<option <?php if(isset($_GET['editid'])){ if($options->color == 'white'){ ?> selected <?php } } ?> value="white">Desaturated</option>
						</select>
					</td>
				</tr>

			</tbody>
		</table>
		<input type="hidden" name="eyv_wpnonce" value="<?php echo $nonce= wp_create_nonce('eyv_nonce'); ?>">
		<input  class="button-primary" type="submit" value="<?php if(isset($_GET['editid'])){ echo "Update"; } else { echo "Add";} ?>" name="Save_Options">

	</form>  

	</div>

</div>
<script type="text/javascript">
	
	jQuery(document).ready(function () {
		jQuery("#embed_youtube").submit(function(){
		  var title=jQuery("#title").val();
		  var youtube_url=jQuery("#youtube_url").val();
		  var height=jQuery("#height").val();
		  var width=jQuery("#width").val();
		  var count = '0';
		  	if(title != ''){
		  		jQuery("#title").removeClass('eyv_error');
		  	}else{
		  		jQuery("#title").addClass('eyv_error');
		  		count=1;
		  	}
			if(youtube_url != ''){
		  		jQuery("#youtube_url").removeClass('eyv_error');
			}else{
		  		jQuery("#youtube_url").addClass('eyv_error');
		  		count=1;
			}
			if(height != ''){
		  		jQuery("#height").removeClass('eyv_error');
			}else{
		  		jQuery("#height").addClass('eyv_error');
		  		count=1;
			}
			if(width != ''){
				jQuery("#width").removeClass('eyv_error');
			}else{
		  		jQuery("#width").addClass('eyv_error');
		  		count=1;
			}
			if(count == 0){
				return true;
			}else{
				return false;
			}
		});
	});
	jQuery(document).ready(function(){
		if(jQuery("#show_advance_option").prop('checked') == true){
			jQuery("#trorigin").show();
			jQuery("#trjs_api").show();
			jQuery("#trgenie_menu").show();
			jQuery("#trdisable_keyboard").show();
			jQuery("#trcolor").show();
		}else{
			jQuery("#trorigin").hide();
			jQuery("#trjs_api").hide();
			jQuery("#trgenie_menu").hide();
			jQuery("#trdisable_keyboard").hide();
			jQuery("#trcolor").hide();
		}
	});

	jQuery("#show_advance_option").click(function($){
            if(jQuery("#show_advance_option").prop('checked') == true){
    			jQuery("#trorigin").show();
				jQuery("#trjs_api").show();
				jQuery("#trgenie_menu").show();
				jQuery("#trdisable_keyboard").show();
				jQuery("#trcolor").show();
			}else{
				jQuery("#trorigin").hide();
				jQuery("#trjs_api").hide();
				jQuery("#trgenie_menu").hide();
				jQuery("#trdisable_keyboard").hide();
				jQuery("#trcolor").hide();
			}
    });

 
</script>