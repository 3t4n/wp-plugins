<?php 
	if ( isset($_POST['ajs_instagram_feed_opt_hidden']) && $_POST['ajs_instagram_feed_opt_hidden'] == 'Y' ) {		
		if( isset($_POST['ajs_access_token']) ){			if ( !empty($_POST['ajs_access_token']) )
				update_option('ajs_access_token', $_POST['ajs_access_token']);
			else
				$error[] = __('Please get your Access Token.', 'ajs-instagram-feed');		}
		
		if( isset($_POST['ajs_user_id']) ){			if ( !empty($_POST['ajs_user_id']) )				update_option('ajs_user_id', $_POST['ajs_user_id']);			else				$error[] = __('Please get your User ID token.', 'ajs-instagram-feed');
		}
		
		if( isset($_POST['ajs_sort_photos']) ){			update_option('ajs_sort_photos', $_POST['ajs_sort_photos']);
		}
		
		if( isset($_POST['ajs_sort_photos']) ){
			update_option('ajs_sort_photos', $_POST['ajs_sort_photos']);
		}
		
		if( isset($_POST['ajs_count']) ){
			update_option('ajs_count', $_POST['ajs_count']);
		}
		
		if( isset($_POST['ajs_show_username']) ){			update_option('ajs_show_username', $_POST['ajs_show_username']);		}else{
			update_option('ajs_show_username', 'no');
		}
		
		if( isset($_POST['ajs_username_text_color']) ){			update_option('ajs_username_text_color', $_POST['ajs_username_text_color']);		}
		
		if( isset($_POST['ajs_show_follow_btn']) ){			update_option('ajs_show_follow_btn', $_POST['ajs_show_follow_btn']);		}else{
			update_option('ajs_show_follow_btn', 'no');
		}
		
		if( isset($_POST['ajs_follow_btn_text_color']) ){			update_option('ajs_follow_btn_text_color', $_POST['ajs_follow_btn_text_color']);		}
		
		if( isset($_POST['ajs_follow_btn_bg_color']) ){			update_option('ajs_follow_btn_bg_color', $_POST['ajs_follow_btn_bg_color']);		}
		
		if( isset($_POST['ajs_follow_btn_text']) ){			update_option('ajs_follow_btn_text', $_POST['ajs_follow_btn_text']);		}
		
		if( isset($_POST['ajs_custom_css']) ){			update_option('ajs_custom_css', $_POST['ajs_custom_css']);		}
		
		if( isset($_POST['ajs_custom_js']) ){			update_option('ajs_custom_js', $_POST['ajs_custom_js']);		}
		
	} else {
		$_POST['ajs_access_token'] = get_option('ajs_access_token');		$_POST['ajs_user_id'] = get_option('ajs_user_id');		$_POST['ajs_sort_photos'] = get_option('ajs_sort_photos');
		$_POST['ajs_count'] = get_option('ajs_count');		$_POST['ajs_show_username'] = get_option('ajs_show_username');		$_POST['ajs_username_text_color'] = get_option('ajs_username_text_color');		$_POST['ajs_show_follow_btn'] = get_option('ajs_show_follow_btn');		$_POST['ajs_follow_btn_text_color'] = get_option('ajs_follow_btn_text_color');		$_POST['ajs_follow_btn_bg_color'] = get_option('ajs_follow_btn_bg_color');		$_POST['ajs_follow_btn_text'] = get_option('ajs_follow_btn_text');		$_POST['ajs_custom_css'] = get_option('ajs_custom_css');		$_POST['ajs_custom_js'] = get_option('ajs_custom_js');
		
		if ( empty($_POST['ajs_access_token']) ){
			$error[] = __('Please get your Access Token', 'ajs-instagram-feed');
		}
		
		if ( empty($_POST['ajs_user_id']) ){
			$error[] = __('Please get your User ID.', 'ajs-instagram-feed');
		}
	}
	?>
	
	<?php if(isset($_POST['ajs_instagram_feed_opt_hidden']) && $_POST['ajs_instagram_feed_opt_hidden'] == 'Y'){ if( empty($error) ){ ?>
		<div class="updated"><p><strong><?php _e('Settings saved.', 'ajs-instagram-feed'); ?></strong></p></div>
		<?php }else{ ?>
		<div class="error"><p><strong><?php 
			foreach ( $error as $key=>$val ) {
				_e($val, 'ajs-instagram-feed'); 
				echo "<br/>";
			}
		?></strong></p></div>
	<?php } } ?>
<div class="wrap">
	<?php echo "<h2>" . __( 'AJS Instagram Feed', 'ajs-instagram-feed') . "</h2>"; ?>
	<?php
		$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'configure';
		if(isset($_GET['tab'])) $active_tab = $_GET['tab'];
	?>
		<form name="ajs_instagram_form" class="ajs-instagram-form" method="post" action="<?php echo admin_url('options-general.php').'?page='.$_GET['page'].'&tab='.$active_tab; ?>">
	<input type="hidden" name="ajs_instagram_feed_opt_hidden" value="Y">
	
	<h2 class="nav-tab-wrapper">
		<a href="<?php echo admin_url('options-general.php').'?page='.$_GET['page']; ?>&tab=configure" class="nav-tab <?php echo $active_tab == 'configure' ? 'nav-tab-active' : ''; ?>"><?php _e('Configure', 'ajs-instagram-feed'); ?></a>
		<a href="<?php echo admin_url('options-general.php').'?page='.$_GET['page']; ?>&tab=customize" class="nav-tab <?php echo $active_tab == 'customize' ? 'nav-tab-active' : ''; ?>"><?php _e('Customize', 'ajs-instagram-feed'); ?></a>
		<a href="<?php echo admin_url('options-general.php').'?page='.$_GET['page']; ?>&tab=usage" class="nav-tab <?php echo $active_tab == 'usage' ? 'nav-tab-active' : ''; ?>"><?php _e('Usage', 'ajs-instagram-feed'); ?></a>
		<a href="<?php echo admin_url('options-general.php').'?page='.$_GET['page']; ?>&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>"><?php _e('Support', 'ajs-instagram-feed'); ?></a>
	</h2>
	<?php if( $_GET['tab'] == "configure" || $_GET['tab']=='' ){ ?>
		<table class="ajs-table">
			<tr>
				<th colspan="2">
					<a href="https://instagram.com/oauth/authorize/?client_id=<?php echo get_option('ajs_client_id');?>&redirect_uri=http://appswifters.com/angularjs-instagram-feed/instagram-token/?return_uri=<?php echo admin_url('options-general.php');?>?page=ajs-instagram-feed&response_type=token" class="ajs-instagram-btn"> <i class="fa fa-instagram fa-2x"></i> Click me to get your Access Token & User ID</a>
				</th>
			</tr>
			<tr>
				<th><label for="access_token"><?php _e('Access Token', 'ajs-instagram-feed'); ?></label></th>
				<td>
					<input type="text" name="ajs_access_token" id="ajs_access_token" value="<?php echo $_POST['ajs_access_token']; ?>" size="60" />
				</td>
			</tr>
			<tr>
				<th><label for="user_id"><?php _e('User ID', 'ajs-instagram-feed'); ?></label></th>
				<td><input type="text" name="ajs_user_id" id="ajs_user_id" value="<?php echo $_POST['ajs_user_id']; ?>" size="20" /> <span class="ajs-help-text"><?php _e('To display photos from other peoples Instagram accounts, you can use <a href="http://www.otzberg.net/iguserid/" target="_blank">this tool</a> to find their User ID.', 'ajs-instagram-feed'); ?></span></td>
			</tr>
		</table>		<input type="hidden" name="ajs_show_username" value="<?php echo $_POST['ajs_show_username']?>" />
		<input type="hidden" name="ajs_show_follow_btn" value="<?php echo $_POST['ajs_show_follow_btn']?>" />
		<input type="submit" name="Submit" class="ajs-btn button-primary" value="<?php _e('Save Changes','rps') ?>" />
	<?php }else if( $_GET['tab'] == "customize" ){ ?>
		<table class="ajs-table">			<tr>				<th colspan="2" class="head">Photos</th>			</tr>
			<tr>
				<th><label for="sort_by"><?php _e('Sort Photos By', 'ajs-instagram-feed'); ?></label></th>
				<td>	
					<select name="ajs_sort_photos">
						<option value="-created_time" <?php if($_POST['ajs_sort_photos']=="-created_time"){echo 'selected';} ?>><?php _e('Newest to oldest', 'ajs-instagram-feed'); ?></option>
						<option value="created_time" <?php if($_POST['ajs_sort_photos']=="created_time"){echo 'selected';} ?>><?php _e('Oldest to newest', 'ajs-instagram-feed'); ?></option>
						<option value="-likes.count" <?php if($_POST['ajs_sort_photos']=="-likes.count"){echo 'selected';} ?>><?php _e('Most Liked', 'ajs-instagram-feed'); ?></option>
						<option value="-comments.count" <?php if($_POST['ajs_sort_photos']=="-comments.count"){echo 'selected';} ?>><?php _e('Most Commented', 'ajs-instagram-feed'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="count"><?php _e('Number of photos', 'ajs-instagram-feed'); ?></label></th>
				<td><input type="text" name="ajs_count" id="ajs_count" value="<?php echo $_POST['ajs_count']; ?>" size="17" /></td>
			</tr>			<tr>				<th colspan="2" class="head">Username</th>			</tr>
			<tr>
				<th><label for="show_username"><?php _e('Show Username', 'ajs-instagram-feed'); ?></label></th>
				<td><input type="checkbox" name="ajs_show_username" value="yes" <?php if ($_POST['ajs_show_username']=="yes") { echo 'checked="checked"';}  ?> /></td>
			</tr>
			<tr>
				<th><label for="username_text_color"><?php _e('Username Text Color', 'ajs-instagram-feed'); ?></label></th>
				<td><input type="text" name="ajs_username_text_color" value="<?php echo $_POST['ajs_username_text_color']; ?>" class="ajs-color-field" data-default-color="#1c5380" /></td>
			</tr>
			<tr>
				<th colspan="2">					<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes','rps') ?>" />
				</th>
			</tr>			<tr>				<th colspan="2" class="head">Follow Button</th>			</tr>
			<tr>				<th><label for="show_follow_btn"><?php _e('Show Follow Button', 'ajs-instagram-feed'); ?></label></th>				<td><input type="checkbox" name="ajs_show_follow_btn" value="yes" <?php if ($_POST['ajs_show_follow_btn']=="yes") { echo 'checked="checked"';}  ?> /></td>			</tr>			<tr>				<th><label for="follow_btn_text_color"><?php _e('Text Color', 'ajs-instagram-feed'); ?></label></th>				<td><input type="text" name="ajs_follow_btn_text_color" value="<?php echo $_POST['ajs_follow_btn_text_color']; ?>" class="ajs-color-field" data-default-color="#effeff" /></td>			</tr>			<tr>				<th><label for="follow_btn_bg_color"><?php _e('Background Color', 'ajs-instagram-feed'); ?></label></th>				<td><input type="text" name="ajs_follow_btn_bg_color" value="<?php echo $_POST['ajs_follow_btn_bg_color']; ?>" class="ajs-color-field" data-default-color="#effeff" /></td>			</tr>			<tr>				<th><label for="follow_btn_text"><?php _e('Button Text', 'ajs-instagram-feed'); ?></label></th>				<td><input type="text" name="ajs_follow_btn_text" id="ajs_follow_btn_text" value="<?php echo $_POST['ajs_follow_btn_text']; ?>" size="30" /></td>			</tr>
			<tr>
				<th colspan="2">
					<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes','rps') ?>" />
				</th>
			</tr>			<tr>				<th colspan="2" class="head">Custom CSS</th>			</tr>			<tr>				<td colspan="2"><textarea name="ajs_custom_css" rows="7" cols="100" /><?php echo stripslashes($_POST['ajs_custom_css']); ?></textarea></td>			</tr>			<tr>				<th colspan="2" class="head">Custom JavaScript</th>			</tr>			<tr>				<td colspan="2"><textarea name="ajs_custom_js" rows="7" cols="100" /><?php echo stripslashes($_POST['ajs_custom_js']); ?></textarea></td>			</tr>
			<tr>
				<th colspan="2">
				<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes','rps') ?>" />
				</th>
			</tr>
		</table>
			<?php }else if( $_GET['tab'] == "usage" ){ ?>
	<p>		<h3>To display instagram feed, you have two options:</h3>		<ol>			<li>
				Simply copy & paste the following shortcode directly into the page, post or widget				<br/>				<strong>[angularjs-instagram-feed]</strong>
			</li>			<li>
				To place in the php file of your custom theme use as below				<br>				<strong>&lt;?php if (function_exists('angularjs_instagram_feed_show')) echo angularjs_instagram_feed_show(); ?&gt;</strong>
			</li>
		</ol>	</p>
	
	<?php }else if( $_GET['tab'] == "support" ){ ?>
		<h3>Any issues?</h3>
		<p><a href="http://www.appswifters.com/angularjs-instagram-feed/installation-guide/" target="_blank">Click here for installation guide</a></p>
		<p><a href="http://www.appswifters.com/angularjs-instagram-feed/support/" target="_blank">Click here to conact me</a></p>
	<?php } ?>	</form>
</div>