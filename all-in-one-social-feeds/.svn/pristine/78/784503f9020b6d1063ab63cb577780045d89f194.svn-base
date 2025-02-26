<?php
global $wpdb;
//sanitize all post values
//echo '<pre>';print_r($_POST);die;
$add_opt_submit= sanitize_text_field( $_POST['add_opt_submit'] );

//Get fb data
$netgo_fb_enable= sanitize_text_field( $_POST['netgo_fb_enable'] );
$netgo_facebook_app_id= sanitize_text_field( $_POST['netgo_facebook_app_id'] );
$netgo_facebook_secret_key= sanitize_text_field( $_POST['netgo_facebook_secret_key'] );
$netgo_facebook_page_id= sanitize_text_field( $_POST['netgo_facebook_page_id'] );
//Get Tw data
$netgo_tw_enable= sanitize_text_field( $_POST['netgo_tw_enable'] );
$netgo_consumer_key= sanitize_text_field( $_POST['netgo_consumer_key'] );
$netgo_screen_name= sanitize_text_field( $_POST['netgo_screen_name'] );
$netgo_consumer_secret= sanitize_text_field( $_POST['netgo_consumer_secret'] );
$netgo_access_token= sanitize_text_field( $_POST['netgo_access_token'] );
$netgo_access_token_secret= sanitize_text_field( $_POST['netgo_access_token_secret'] );

//Get Ins data
$netgo_ins_enable= sanitize_text_field( $_POST['netgo_ins_enable'] );
$netgo_ins_user_id= sanitize_text_field( $_POST['netgo_ins_user_id'] );
$netgo_ins_access_token= sanitize_text_field( $_POST['netgo_ins_access_token'] ); 

//Get Pi data
$netgo_pi_enable= sanitize_text_field( $_POST['netgo_pi_enable'] );
$netgo_pi_user_name= sanitize_text_field( $_POST['netgo_pi_user_name'] );

//Get Yt data
$netgo_yt_enable= sanitize_text_field( $_POST['netgo_yt_enable'] );
$netgo_youtube_video_url= sanitize_text_field( $_POST['netgo_youtube_video_url'] );

//Get Settings
$netgo_box_h= sanitize_text_field( $_POST['netgo_box_h'] );
$netgo_feeds= sanitize_text_field( $_POST['netgo_feeds'] );
$netgo_jquery_include= sanitize_text_field( $_POST['netgo_jquery_include'] );

$saved= sanitize_text_field( $_POST['saved'] );

if($add_opt_submit!='') { 
    //Update FB data
	if(isset($netgo_facebook_app_id) ) {
		update_option('netgo_facebook_app_id', $netgo_facebook_app_id);
    }
	if(isset($netgo_facebook_secret_key) ) {
		update_option('netgo_facebook_secret_key', $netgo_facebook_secret_key);
    }
	if(isset($netgo_facebook_page_id) ) {
		update_option('netgo_facebook_page_id', $netgo_facebook_page_id);
    } 
	if(isset($netgo_facebook_enable_jquery) ) {
		update_option('netgo_facebook_enable_jquery', $netgo_facebook_enable_jquery);
    }
	if(isset($netgo_fb_enable) ) {
		update_option('netgo_fb_enable', $netgo_fb_enable);
    }
	
	//Update Tw data
	if(isset($netgo_tw_enable) ) {
		update_option('netgo_tw_enable', $netgo_tw_enable);
    }
	if(isset($netgo_consumer_key) ) {
		update_option('netgo_consumer_key', $netgo_consumer_key);
    }
	if(isset($netgo_consumer_secret) ) {
		update_option('netgo_consumer_secret', $netgo_consumer_secret);
    }
	if(isset($netgo_access_token) ) {
		update_option('netgo_access_token', $netgo_access_token);
    }
	if(isset($netgo_access_token_secret) ) {
		update_option('netgo_access_token_secret', $netgo_access_token_secret);
    }
	if(isset($netgo_screen_name) ) {
		update_option('netgo_screen_name', $netgo_screen_name);
    }
	
	//Update Ins data
	if(isset($netgo_ins_enable) ) {
		update_option('netgo_ins_enable', $netgo_ins_enable);
    }
	if(isset($netgo_ins_user_id) ) {
		update_option('netgo_ins_user_id', $netgo_ins_user_id);
    }
	if(isset($netgo_ins_access_token) ) {
		update_option('netgo_ins_access_token', $netgo_ins_access_token);
    } 
	
	//Update Ins data
	if(isset($netgo_pi_enable) ) {
		update_option('netgo_pi_enable', $netgo_pi_enable);
    }
	if(isset($netgo_pi_user_name) ) {
		update_option('netgo_pi_user_name', $netgo_pi_user_name);
    }
	
	//Update Yt data
	if(isset($netgo_yt_enable) ) {
		update_option('netgo_yt_enable', $netgo_yt_enable);
    }
	if(isset($netgo_pi_user_name) ) {
		update_option('netgo_youtube_video_url', $netgo_youtube_video_url);
    }

	//Update St data
	if(isset($netgo_yt_enable) ) {
		update_option('netgo_box_h', $netgo_box_h);
    }
	if(isset($netgo_pi_user_name) ) {
		update_option('netgo_feeds', $netgo_feeds);
    }
	if(isset($netgo_jquery_include) ) {
		update_option('netgo_jquery_include', $netgo_jquery_include);
    }
	
	if($saved==true) {
		
		$message='saved';
	} 
}
 
?>
  <?php
        if ( $message == 'saved' ) {
		echo ' <div class="added-success"><p><strong>Settings Saved.</strong></p></div>';
		}
   ?>
   
    <div class="wrap netgo-facebook-post-setting">
        <form method="post" id="settingForm" action="">
		<h2><?php _e('All in one Social Feeds','');?></h2> 
		<table class="form-table">
		<tr valign="top">
			<td>
				<ul class="tabs">
					<li><a href="javascript:void(0);" class="active" id="fb" onclick="stTab('fb')">FaceBook Credentials</a></li>
					<li><a href="javascript:void(0);" id="tw" onclick="stTab('tw')">Twitter Credentials</a></li>
					<li><a href="javascript:void(0);" id="in" onclick="stTab('in')">Instagram Credentials</a></li>
					<li><a href="javascript:void(0);" id="pi" onclick="stTab('pi')">Pinterest Credentials</a></li>
					<li><a href="javascript:void(0);" id="yt" onclick="stTab('yt')">YouTube Credentials</a></li>
					<!--<li><a href="javascript:void(0);" id="st" onclick="stTab('st')">Settings</a></li>--> 
				</ul>
			</td>
			<td>
				<table id="fb-setting" class="stgs">
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_fb_enable"><?php _e('Enable','');?></label></th>
						<td><select name="netgo_fb_enable"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_fb_enable') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y"  <?php echo $sel = (esc_attr( get_option('netgo_fb_enable') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_facebook_app_id"><?php _e('Facebook App Id','');?></label></th>
						<td><input type="text" name="netgo_facebook_app_id" size="50" value="<?php echo get_option('netgo_facebook_app_id'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_facebook_secret_key"><?php _e('Facebook Secret Key','');?></label></th>
						<td><input type="text" name="netgo_facebook_secret_key" size="50" value="<?php echo get_option('netgo_facebook_secret_key'); ?>" /></td>
					</tr> 
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_facebook_page_id"><?php _e('Facebook Page Id','');?></label></th>
						<td><input type="text" name="netgo_facebook_page_id" size="50" value="<?php echo get_option('netgo_facebook_page_id'); ?>" /></td>
					</tr> 
				</table>
				
				<table id="tw-setting" class="stgs" style="display:none;">
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_tw_enable"><?php _e('Enable','');?></label></th>
						<td><select name="netgo_tw_enable"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_tw_enable') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y" <?php echo $sel = (esc_attr( get_option('netgo_tw_enable') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_screen_name"><?php _e('Screen Name','');?></label></th>
						<td><input type="text" name="netgo_screen_name" size="50" value="<?php echo get_option('netgo_screen_name'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_consumer_key"><?php _e('Consumer Key','');?></label></th>
						<td><input type="text" name="netgo_consumer_key" size="50" value="<?php echo get_option('netgo_consumer_key'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_consumer_secret"><?php _e('Consumer Secret','');?></label></th>
						<td><input type="text" name="netgo_consumer_secret" size="50" value="<?php echo get_option('netgo_consumer_secret'); ?>" /></td>
					</tr> 
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_access_token"><?php _e('Access Token','');?></label></th>
						<td><input type="text" name="netgo_access_token" size="50" value="<?php echo get_option('netgo_access_token'); ?>" /></td>
					</tr> 
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_access_token_secret"><?php _e('Access Token Secret','');?></label></th>
						<td><input type="text" name="netgo_access_token_secret" size="50" value="<?php echo get_option('netgo_access_token_secret'); ?>" /></td>
					</tr> 
				</table>
				
				<table id="in-setting" class="stgs" style="display:none;"> 
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_ins_enable"><?php _e('Enable','');?></label></th>
						<td><select name="netgo_ins_enable"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_ins_enable') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y" <?php echo $sel = (esc_attr( get_option('netgo_ins_enable') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_ins_user_id"><?php _e('User Id','');?></label></th>
						<td><input type="text" name="netgo_ins_user_id" size="50" value="<?php echo get_option('netgo_ins_user_id'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_ins_access_token"><?php _e('Access Token','');?></label></th>
						<td><input type="text" name="netgo_ins_access_token" size="50" value="<?php echo get_option('netgo_ins_access_token'); ?>" /></td>
					</tr>  
				</table>
				
				<table id="pi-setting" class="stgs" style="display:none;">
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_pi_enable"><?php _e('Enable','');?></label></th>
						<td><select name="netgo_pi_enable"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_pi_enable') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y" <?php echo $sel = (esc_attr( get_option('netgo_pi_enable') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_pi_user_name"><?php _e('User Name','');?></label></th>
						<td><input type="text" name="netgo_pi_user_name" size="50" value="<?php echo get_option('netgo_pi_user_name'); ?>" /></td>
					</tr> 
				</table>
				
				<table id="yt-setting" class="stgs" style="display:none;">
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_yt_enable"><?php _e('Enable','');?></label></th>
						<td><select name="netgo_yt_enable"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_yt_enable') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y" <?php echo $sel = (esc_attr( get_option('netgo_yt_enable') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_youtube_video_url"><?php _e('YouTube Video URL','');?></label></th>
						<td><input type="text" name="netgo_youtube_video_url" size="50" value="<?php echo get_option('netgo_youtube_video_url'); ?>" /></td>
					</tr> 
				</table> 
				
				<table id="st-setting" class="stgs" style="display:none;">
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_box_h"><?php _e('Box Height','');?></label></th>
						<td><input type="text" name="netgo_box_h" size="50" value="<?php echo get_option('netgo_box_h'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_feeds"><?php _e('Number Of Feeds','');?></label></th>
						<td><input type="text" name="netgo_feeds" size="50" value="<?php echo get_option('netgo_feeds'); ?>" /></td>
					</tr> 
					<tr valign="top">
						<th scope="row" style="width: 370px;"><label for="netgo_jquery_include"><?php _e('jQuery include','');?></label></th>
						<td>
						<select name="netgo_jquery_include"><option value="n" <?php echo $sel = (esc_attr( get_option('netgo_jquery_include') ) == 'n') ? 'selected="selected"' : '';?>>No</option><option value="y" <?php echo $sel = (esc_attr( get_option('netgo_jquery_include') ) == 'y') ? 'selected="selected"' : '';?>>Yes</option></select>
						</td>
					</tr> 
				</table> 
				
			</td>
		</tr>
         <tr>
		    <td>
				<p class="submit">
				<input type="hidden" name="saved"  value="saved"/>
				<input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes" />
				  <?php if(function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
				</p>
			</td>
		</tr>
		
		</table> 

       </form> 
</div>
<script>
	function stTab(tab_id){
		jQuery('.stgs').hide();
		jQuery('.tabs li a').removeClass('active');
		
		jQuery('#'+tab_id+'-setting').show();
		jQuery('#'+tab_id).addClass('active');
		
		
	}
</script>
