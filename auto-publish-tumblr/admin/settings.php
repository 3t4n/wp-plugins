<?php
if( !defined('ABSPATH') ){ exit();}
global $current_user;
$auth_varble=0;
wp_get_current_user();
$imgpath=plugins_url("images/",XYZ_TBAP_PLUGIN_FILE);
$heimg=$imgpath."support.png";
if(!$_POST && isset($_GET['tbap_notice']) && $_GET['tbap_notice'] == 'hide')
{
	if (! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'],'tbap-shw')){
		wp_nonce_ays( 'tbap-shw');
		exit;
	}
	update_option('xyz_tbap_dnt_shw_notice', "hide");
	?>
<style type='text/css'>
#tbap_notice_td
{
display:none !important;
}
</style>
<div class="system_notice_area_style1" id="system_notice_area">
<?php _e('Thanks again for using the plugin. We will never show the message again.','auto-publish-tumblr');?>
 &nbsp;&nbsp;&nbsp;<span
		id="system_notice_area_dismiss"> <?php _e('Dismiss','auto-publish-tumblr');?> </span>
</div>
<?php
}

$tms1="";
$tms2="";
$tms3="";
$tms4="";
$tms5="";
$tms6="";

$terf=0;
if(isset($_POST['tmblr']))
{
	if (! isset( $_REQUEST['_wpnonce'] )|| ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'xyz_smap_tb_settings_form_nonce' ))
	{
		wp_nonce_ays( 'xyz_smap_tb_settings_form_nonce' );
		exit();
	}
	$tappid=sanitize_text_field($_POST['xyz_tbap_tbconsumer_id']);
	$tappsecret=sanitize_text_field($_POST['xyz_tbap_tbconsumer_secret']);
	$tbid=sanitize_text_field($_POST['xyz_tbap_tb_id']);
	$taccess_token=sanitize_text_field($_POST['xyz_tbap_current_tbappln_token']);
	$taccess_token_secret=sanitize_text_field($_POST['xyz_tbap_tbaccestok_secret']);
	$tposting_permission=intval($_POST['xyz_tbap_tbpost_permission']);
	$xyz_tbap_media_permission=intval($_POST['xyz_tbap_media_permission']);
	$tmessagetopost=sanitize_textarea_field($_POST['xyz_tbap_tbmessage']);
	if($tappid=="" && $tposting_permission==1)
	{
		$terf=1;
		$tms1=__('Please fill api key.','auto-publish-tumblr'); 

	}
	elseif($tappsecret=="" && $tposting_permission==1)
	{
		$tms2= __('Please fill api secret.','auto-publish-tumblr'); 
		$terf=1;
	}
	elseif($tbid=="" && $tposting_permission==1)
	{
		$tms3= __('Please fill tumblr username.','auto-publish-tumblr'); 
		$terf=1;
	}
	elseif($taccess_token=="" && $tposting_permission==1)
	{
		$tms4= __('Please fill tumblr access token.','auto-publish-tumblr'); 
		$terf=1;
	}
	elseif($taccess_token_secret=="" && $tposting_permission==1)
	{
		$tms5= __('Please fill tumblr access token secret.','auto-publish-tumblr'); 
		$terf=1;
	}
	elseif($tmessagetopost=="" && $tposting_permission==1)
	{
		$tms6= __('Please fill message format for posting.','auto-publish-tumblr'); 
		$terf=1;
	}
	else
	{
		$terf=0;
		if($tmessagetopost=="")
		{
			$tmessagetopost="{POST_TITLE}-{PERMALINK}";
		}

		update_option('xyz_tbap_tbconsumer_id',$tappid);
		update_option('xyz_tbap_tbconsumer_secret',$tappsecret);
		update_option('xyz_tbap_tb_id',$tbid);
		update_option('xyz_tbap_current_tbappln_token',$taccess_token);
		update_option('xyz_tbap_tbaccestok_secret',$taccess_token_secret);
		update_option('xyz_tbap_tbmessage',$tmessagetopost);
		update_option('xyz_tbap_tbpost_permission',$tposting_permission);
		update_option('xyz_tbap_tbpost_media_permission',$xyz_tbap_media_permission);
		
	}
}

if(isset($_POST['tmblr']) && $terf==0)
{
	?>

<div class="system_notice_area_style1" id="system_notice_area">
		<?php _e('Settings updated successfully.','auto-publish-tumblr');?>  &nbsp;&nbsp;&nbsp;<span
		id="system_notice_area_dismiss"> <?php _e('Dismiss','auto-publish-tumblr');?> </span>
</div>
<?php }
if(isset($_POST['tmblr']) && $terf==1)
{
	?>
<div class="system_notice_area_style0" id="system_notice_area">
	<?php 
	if(isset($_POST['tmblr']))
	{
		echo esc_html($tms1);echo esc_html($tms2);echo esc_html($tms3);echo esc_html($tms4);echo esc_html($tms5);echo esc_html($tms6);
	}
	?>
	&nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss"> <?php _e('Dismiss','auto-publish-tumblr');?> </span>
</div>
<?php } ?>
<script type="text/javascript">
function xyz_tbap_detdisplay(id)
{
	document.getElementById(id).style.display='';
}
function xyz_tbap_dethide(id)
{
	document.getElementById(id).style.display='none';
}


</script>

<div style="width: 100%">
<div class="xyz_tbap_tab">
  <button class="xyz_tbap_tablinks" onclick="xyz_tbap_open_tab(event, 'xyz_tbap_tumblr_settings')" id="xyz_tbap_default_tab_settings"> <?php _e('Tumblr Settings','auto-publish-tumblr');?> </button>
   <button class="xyz_tbap_tablinks" onclick="xyz_tbap_open_tab(event, 'xyz_tbap_basic_settings')" id="xyz_tbap_basic_tab_settings"> <?php _e('General Settings','auto-publish-tumblr');?> </button>
</div>
<div id="xyz_tbap_tumblr_settings" class="xyz_tbap_tabcontent">
<table class="widefat" style="width: 99%;background-color: #FFFBCC">
<tr>
<td id="bottomBorderNone" style="border: 1px solid #FCC328;">
	<div>
		<b> <?php _e('Note','auto-publish-tumblr'); ?>:</b>  <?php _e('You have to create a Tumblr application before filling in following fields.','auto-publish-tumblr'); ?>
		<b><a href="https://www.tumblr.com/oauth/apps" target="_blank"> <?php _e('Click here </a></b> to create new application.','auto-publish-tumblr'); ?>
		<br> <?php _e('Specify the application website for the application as :','auto-publish-tumblr'); ?>
		<span style="color: red;"><?php echo  (is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST']; ?></span>
		<br> <?php _e('Specify the default callback URL as :','auto-publish-tumblr'); ?>
		<span style="color: red;"><?php echo  admin_url().'admin.php'; ?></span>
		<br> <?php $tbap_create_tbapp="http://help.xyzscripts.com/docs/social-media-auto-publish/faq/how-can-i-create-tumblr-application/"; $tbap_inst_link=sprintf(__('For detailed step by step instructions <b><a href="%s" target="_blank"> Click here.','auto-publish-tumblr'),$tbap_create_tbapp); echo $tbap_inst_link; ?> </a></b>
	</div>
</td>
</tr>
</table>


	<form method="post">
	<?php wp_nonce_field( 'xyz_smap_tb_settings_form_nonce' );?>
		<input type="hidden" value="config">



			<div style="font-weight: bold;padding: 3px;"> <?php _e('All fields given below are mandatory','auto-publish-tumblr'); ?> </div> 
			<table class="widefat xyz_tbap_widefat_table" style="width: 99%">
				
				<tr valign="top">
					<td> <?php _e('Enable auto publish posts to my tumblr account','auto-publish-tumblr'); ?> 
					</td>
					<td  class="switch-field">
					<label id="xyz_tbap_tbpost_permission_yes"><input type="radio" name="xyz_tbap_tbpost_permission" value="1" <?php  if(get_option('xyz_tbap_tbpost_permission')==1) echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr');?> </label>
					<label id="xyz_tbap_tbpost_permission_no"><input type="radio" name="xyz_tbap_tbpost_permission" value="0" <?php  if(get_option('xyz_tbap_tbpost_permission')==0) echo 'checked';?>/> <?php _e('No','auto-publish-tumblr');?> </label>
					</td>
				</tr>
				
				<tr valign="top">
					<td width="50%"> <?php _e('API key','auto-publish-tumblr');?>
					</td>
					<td><input id="xyz_tbap_tbconsumer_id"
						name="xyz_tbap_tbconsumer_id" type="text"
						value="<?php if($tms1=="") {echo esc_html(get_option('xyz_tbap_tbconsumer_id'));}?>" />
						<a href="http://help.xyzscripts.com/docs/social-media-auto-publish/faq/how-can-i-create-tumblr-application/" target="_blank"> <?php _e('How can I create a Tumblr Application','auto-publish-tumblr');?>?</a>
					</td>
				</tr>

				<tr valign="top">
					<td> <?php _e('API secret','auto-publish-tumblr');?>
					</td>
					<td><input id="xyz_tbap_tbconsumer_secret"
						name="xyz_tbap_tbconsumer_secret" type="text"
						value="<?php if($tms2=="") { echo esc_html(get_option('xyz_tbap_tbconsumer_secret')); }?>" />
					</td>
				</tr>
				<tr valign="top">
					<td> <?php _e('Tumblr username','auto-publish-tumblr');?>
					</td>
					<td><input id="xyz_tbap_tb_id" class="al2tb_text"
						name="xyz_tbap_tb_id" type="text"
						value="<?php if($tms3=="") {echo esc_html(get_option('xyz_tbap_tb_id'));}?>" />
					</td>
				</tr>
				<tr valign="top">
					<td> <?php _e('Access token','auto-publish-tumblr');?>
					</td>
					<td><input id="xyz_tbap_current_tbappln_token" class="al2tb_text"
						name="xyz_tbap_current_tbappln_token" type="text"
						value="<?php if($tms4=="") {echo esc_html(get_option('xyz_tbap_current_tbappln_token'));}?>" />
					</td>
				</tr>
				<tr valign="top">
					<td> <?php _e('Access token secret','auto-publish-tumblr');?>
					</td>
					<td><input id="xyz_tbap_tbaccestok_secret" class="al2tb_text"
						name="xyz_tbap_tbaccestok_secret" type="text"
						value="<?php if($tms5=="") {echo esc_html(get_option('xyz_tbap_tbaccestok_secret'));}?>" />
					</td>
				</tr>
				<?php $xyz_tbap_media_permission=get_option('xyz_tbap_tbpost_media_permission');  ?>	
				<tr valign="top">
					<td> <?php _e('Attachment to be posted to Tumblr','auto-publish-tumblr');?>
					</td>
					<td><select id="xyz_tbap_media_permission"
						name="xyz_tbap_media_permission">
							<option value="0" <?php  if($xyz_tbap_media_permission==0) echo 'selected';?>> <?php _e('No','auto-publish-tumblr');?> </option>
							<option value="1" <?php  if($xyz_tbap_media_permission==1) echo 'selected';?>> <?php _e('Image','auto-publish-tumblr');?> </option>
							<option value="2" <?php  if($xyz_tbap_media_permission==2) echo 'selected';?>> <?php _e('Link','auto-publish-tumblr');?> </option>
					</select>
					</td>
				</tr>
				<tr valign="top">
					<td> <?php _e('Message format for posting','auto-publish-tumblr'); ?> <img src="<?php echo $heimg?>"
						onmouseover="xyz_tbap_detdisplay('xyz_tb')" onmouseout="xyz_tbap_dethide('xyz_tb')" style="width:13px;height:auto;">
						<div id="xyz_tb" class="tbap_informationdiv"
							style="display: none; font-weight: normal;">
							{POST_TITLE} - <?php _e('Insert the title of your post.','auto-publish-tumblr'); ?><br/>
							{PERMALINK} - <?php _e('Insert the URL where your post is displayed.','auto-publish-tumblr'); ?><br/>
							{POST_EXCERPT} - <?php _e('Insert the excerpt of your post.','auto-publish-tumblr'); ?><br/>
							{POST_CONTENT} - <?php _e('Insert the description of your post.','auto-publish-tumblr'); ?><br/>
							{BLOG_TITLE} - <?php _e('Insert the name of your blog.','auto-publish-tumblr'); ?><br/>
							{USER_NICENAME} - <?php _e('Insert the nicename of the author.','auto-publish-tumblr'); ?><br/>
							{POST_ID} - <?php _e('Insert the ID of your post.','auto-publish-tumblr'); ?><br/>
							{POST_PUBLISH_DATE} - <?php _e('Insert the publish date of your post.','auto-publish-tumblr'); ?><br/>
							{USER_DISPLAY_NAME} - <?php _e('Insert the display name of the author.','auto-publish-tumblr'); ?>
						</div></td>
	<td>
	<select name="xyz_tbap_info" id="xyz_tbap_info" onchange="xyz_tbap_info_insert(this)">
		<option value ="0" selected="selected"> --<?php _e('Select','auto-publish-tumblr'); ?>-- </option>
		<option value ="1">{POST_TITLE}  </option>
		<option value ="2">{PERMALINK} </option>
		<option value ="3">{POST_EXCERPT}  </option>
		<option value ="4">{POST_CONTENT}   </option>
		<option value ="5">{BLOG_TITLE}   </option>
		<option value ="6">{USER_NICENAME}   </option>
		<option value ="7">{POST_ID}   </option>
		<option value ="8">{POST_PUBLISH_DATE}   </option>
		<option value ="9">{USER_DISPLAY_NAME}   </option>
		</select> </td></tr><tr><td>&nbsp;</td><td>
		<textarea id="xyz_tbap_tbmessage"  name="xyz_tbap_tbmessage" style="height:80px !important;" ><?php if($tms6=="") {
								echo esc_textarea(get_option('xyz_tbap_tbmessage'));}?></textarea>
	</td></tr>

				<tr>
			<td   id="bottomBorderNone"></td>
					<td   id="bottomBorderNone"><div style="height: 50px;">
							<input type="submit" class="submit_tbap_new"
								style=" margin-top: 10px; "
								name="tmblr" value="<?php _e('Save','auto-publish-tumblr'); ?>" /></div>
					</td>
				</tr>
			</table>

	</form>
	</div>

<?php 

	if(isset($_POST['bsettngs']))
	{
		if (! isset( $_REQUEST['_wpnonce'] )|| ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'xyz_smap_tb_basic_settings_form_nonce' ))
		{
			wp_nonce_ays( 'xyz_smap_tb_basic_settings_form_nonce' );
			exit();
		}

		$xyz_tbap_include_pages=intval($_POST['xyz_tbap_include_pages']);
		$xyz_tbap_include_posts=intval($_POST['xyz_tbap_include_posts']);
		$tbap_category_ids='';
		if($_POST['xyz_tbap_cat_all']=="All")
			$tbap_category_ids=sanitize_text_field($_POST['xyz_tbap_cat_all']);//radio btn name
		else
		{
		    if(!empty($_POST['xyz_tbap_catlist'])){
			$tbap_category_ids_drop=$_POST['xyz_tbap_catlist'];//dropdown
			foreach ($tbap_category_ids_drop as $tbap_category_ids1)
				$tbap_category_ids_arr[]=intval($tbap_category_ids1);
			$tbap_category_ids=implode(',', $tbap_category_ids_arr);
		    }
		}
		$xyz_customtypes="";
        if(isset($_POST['post_types'])){
		$xyz_customtypes=$_POST['post_types'];
        foreach ($xyz_customtypes as $xyz_customtypes1)
        	$xyz_customtypes_arr[]=sanitize_text_field($xyz_customtypes1);
        $xyz_customtypes=$xyz_customtypes_arr;
        }
        $xyz_tbap_peer_verification=intval($_POST['xyz_tbap_peer_verification']);
         $xyz_tbap_premium_version_ads=intval($_POST['xyz_tbap_premium_version_ads']);
        $xyz_tbap_default_selection_edit=intval($_POST['xyz_tbap_default_selection_edit']);
        $xyz_tbap_default_selection_create=intval($_POST['xyz_tbap_default_selection_create']);
        
		$tbap_customtype_ids="";

		$xyz_tbap_applyfilters="";
		if(isset($_POST['xyz_tbap_applyfilters']))
		{
			$xyz_tbap_applyfilters=$_POST['xyz_tbap_applyfilters'];
			foreach ($xyz_tbap_applyfilters as $xyz_tbap_applyfilters1)
				$xyz_tbap_applyfilters_arr[]=intval($xyz_tbap_applyfilters1);
			$xyz_tbap_applyfilters=$xyz_tbap_applyfilters_arr;
		}
		
		if($xyz_customtypes!="")
		{
			for($i=0;$i<count($xyz_customtypes);$i++)
			{
				$tbap_customtype_ids.=$xyz_customtypes[$i].",";
			}

		}
		$tbap_customtype_ids=rtrim($tbap_customtype_ids,',');

		$xyz_tbap_applyfilters_val="";
		if($xyz_tbap_applyfilters!="")
		{
			for($i=0;$i<count($xyz_tbap_applyfilters);$i++)
			{
			$xyz_tbap_applyfilters_val.=$xyz_tbap_applyfilters[$i].",";
		}
		}
		$xyz_tbap_applyfilters_val=rtrim($xyz_tbap_applyfilters_val,',');
		
		update_option('xyz_tbap_apply_filters',$xyz_tbap_applyfilters_val);
		update_option('xyz_tbap_include_pages',$xyz_tbap_include_pages);
		update_option('xyz_tbap_include_posts',$xyz_tbap_include_posts);
		if($xyz_tbap_include_posts==0)
			update_option('xyz_tbap_include_categories',"All");
		else
			update_option('xyz_tbap_include_categories',$tbap_category_ids);
		update_option('xyz_tbap_include_customposttypes',$tbap_customtype_ids);
		update_option('xyz_tbap_peer_verification',$xyz_tbap_peer_verification);
 		update_option('xyz_tbap_premium_version_ads',$xyz_tbap_premium_version_ads);
		update_option('xyz_tbap_default_selection_edit',$xyz_tbap_default_selection_edit);
		update_option('xyz_tbap_default_selection_create',$xyz_tbap_default_selection_create);
	}
	$xyz_credit_link=get_option('xyz_credit_link');
	$xyz_tbap_include_pages=get_option('xyz_tbap_include_pages');
	$xyz_tbap_include_posts=get_option('xyz_tbap_include_posts');
	$xyz_tbap_include_categories=get_option('xyz_tbap_include_categories');
	/*if ($xyz_tbap_include_categories!='All')
	$xyz_tbap_include_categories=explode(',', $xyz_tbap_include_categories);*/
	$xyz_tbap_include_customposttypes=get_option('xyz_tbap_include_customposttypes');
	$xyz_tbap_apply_filters=get_option('xyz_tbap_apply_filters');
	$xyz_tbap_peer_verification=esc_html(get_option('xyz_tbap_peer_verification'));
 	$xyz_tbap_premium_version_ads=esc_html(get_option('xyz_tbap_premium_version_ads'));
	$xyz_tbap_default_selection_edit=esc_html(get_option('xyz_tbap_default_selection_edit'));
	$xyz_tbap_default_selection_create=esc_html(get_option('xyz_tbap_default_selection_create'));
	?>
	<div id="xyz_tbap_basic_settings" class="xyz_tbap_tabcontent">
		<form method="post">
<?php wp_nonce_field( 'xyz_smap_tb_basic_settings_form_nonce' );?>
			<table class="widefat xyz_tbap_widefat_table" style="width: 99%">
<tr><td><h2> <?php _e('Basic Settings','auto-publish-tumblr'); ?> </h2></td></tr>
				<tr valign="top">

					<td  colspan="1" width="50%"> <?php _e('Publish wordpress `pages` to tumblr','auto-publish-tumblr');?>
					</td>
					<td  class="switch-field">
					<label id="xyz_tbap_include_pages_yes"><input type="radio" name="xyz_tbap_include_pages" value="1" <?php if($xyz_tbap_include_pages=='1') echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr');?> </label>
					<label id="xyz_tbap_include_pages_no"><input type="radio" name="xyz_tbap_include_pages" value="0" <?php if($xyz_tbap_include_pages=='0') echo 'checked';?>/> <?php _e('No','auto-publish-tumblr');?> </label>
				   </td>
				</tr>
				
				<tr valign="top">

					<td  colspan="1"> <?php _e('Publish wordpress `posts` to tumblr','auto-publish-tumblr');?>
					</td>
					<td  class="switch-field">
					<label id="xyz_tbap_include_posts_yes"><input type="radio" name="xyz_tbap_include_posts" value="1" <?php if($xyz_tbap_include_posts=='1') echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr');?> </label>
					<label id="xyz_tbap_include_posts_no"><input type="radio" name="xyz_tbap_include_posts" value="0" <?php if($xyz_tbap_include_posts=='0') echo 'checked';?>/> <?php _e('No','auto-publish-tumblr');?> </label>
					</td>
				</tr>
				<?php 
					$xyz_tbap_hide_custompost_settings='';

					$args=array(
							'public'   => true,
							'_builtin' => false
					);
					$output = 'names'; // names or objects, note names is the default
					$operator = 'and'; // 'and' or 'or'
					$post_types=get_post_types($args,$output,$operator);

					$ar1=explode(",",$xyz_tbap_include_customposttypes);
					$cnt=count($post_types);
					if($cnt==0)
						$xyz_tbap_hide_custompost_settings = 'style="display: none;"';//echo 'NA';
					?>
				<tr valign="top" <?php echo $xyz_tbap_hide_custompost_settings;?>>

					<td  colspan="1"> <?php _e('Select wordpress custom post types for auto publish','auto-publish-tumblr'); ?> </td>
					<td><?php 	foreach ($post_types  as $post_type ) {

						echo '<input type="checkbox" name="post_types[]" value="'.$post_type.'" ';
						if(in_array($post_type, $ar1))
						{
							echo 'checked="checked"/>';
						}
						else
							echo '/>';

						echo $post_type.'<br/>';

					}
					?>
					</td>
				</tr>
				
				<tr><td><h2> <?php _e('Advanced Settings','auto-publish-tumblr'); ?> </h2></td></tr>
				<tr valign="top" id="selPostCat">

					<td  colspan="1"> <?php _e('Select post categories for auto publish','auto-publish-tumblr'); ?> 
					</td>
					<td class="switch-field">
					<label id="xyz_tbap_include_categories_no">
					<input type="radio"	name="xyz_tbap_cat_all" id="xyz_tbap_cat_all" value="All" onchange="xyz_tbap_rd_cat_chn(1,-1)" <?php if($xyz_tbap_include_categories=="All") echo "checked"?>> <?php _e('All','auto-publish-tumblr');?> <font style="padding-left: 10px;"></font></label>
					<label id="xyz_tbap_include_categories_yes">
					<input type="radio"	name="xyz_tbap_cat_all" id="xyz_tbap_cat_all" value=""	onchange="xyz_tbap_rd_cat_chn(1,1)" <?php if($xyz_tbap_include_categories!="All") echo "checked"?>> <?php _e('Specific','auto-publish-tumblr');?> </label>
					<br /> <br /> <div class="scroll_checkbox"  id="cat_dropdown_span">
					<?php 
					$args = array(
							'show_option_all'    => '',
							'show_option_none'   => '',
							'orderby'            => 'name',
							'order'              => 'ASC',
							'show_last_update'   => 0,
							'show_count'         => 0,
							'hide_empty'         => 0,
							'child_of'           => 0,
							'exclude'            => '',
							'echo'               => 0,
							'selected'           => '1 3',
							'hierarchical'       => 1,
							'id'                 => 'xyz_tbap_catlist',
							'class'              => 'postform',
							'depth'              => 0,
							'tab_index'          => 0,
							'taxonomy'           => 'category');

					if(count(get_categories($args))>0)
					{
					    $xyz_tbap_include_categories=explode(',', $xyz_tbap_include_categories);
						$tbap_categories=get_categories($args);
						foreach ($tbap_categories as $tbap_cat)
						{
							$cat_id[]=$tbap_cat->cat_ID;
							$cat_name[]=$tbap_cat->cat_name;
							?>
							<input type="checkbox" name="xyz_tbap_catlist[]"  value="<?php  echo $tbap_cat->cat_ID;?>" <?php if(is_array($xyz_tbap_include_categories)) if(in_array($tbap_cat->cat_ID, $xyz_tbap_include_categories)) echo "checked" ?>/><?php echo $tbap_cat->cat_name; ?>
							<br/><?php }
					}
					else
						_e('NIL','auto-publish-tumblr');
					?><br /> <br /> </div>
				</td>
				</tr>
				<tr valign="top">

					<td scope="row" colspan="1" width="50%"> <?php _e('Auto publish on creating posts/pages/custom post types','auto-publish-tumblr'); ?>
					</td>
					<td>
						<input type="radio" name="xyz_tbap_default_selection_create" value="1" <?php if($xyz_tbap_default_selection_create=='1') echo 'checked';?>/><?php _e('Enabled','auto-publish-tumblr'); ?> 
						<br/><input type="radio" name="xyz_tbap_default_selection_create" value="0" <?php if($xyz_tbap_default_selection_create=='0') echo 'checked';?>/><?php _e('Disabled','auto-publish-tumblr'); ?> 
						<br/><input type="radio" name="xyz_tbap_default_selection_create" value="2" <?php  if($xyz_tbap_default_selection_create== '2') echo 'checked';?>/><?php _e('Use metabox settings','auto-publish-tumblr'); ?> 
					</td>
				</tr>
				<tr valign="top">

					<td scope="row" colspan="1" width="50%"> <?php _e('Auto publish on editing posts/pages/custom post types','auto-publish-tumblr'); ?>
					</td>
					<td>
						<input type="radio" name="xyz_tbap_default_selection_edit" value="1" <?php if($xyz_tbap_default_selection_edit=='1') echo 'checked';?>/><?php _e('Enabled','auto-publish-tumblr'); ?> 
						<br/><input type="radio" name="xyz_tbap_default_selection_edit" value="0" <?php if($xyz_tbap_default_selection_edit=='0') echo 'checked';?>/><?php _e('Disabled','auto-publish-tumblr'); ?> 
						<br/><input type="radio" name="xyz_tbap_default_selection_edit" value="2" <?php  if($xyz_tbap_default_selection_edit=='2') echo 'checked';?>/><?php _e('Use metabox settings','auto-publish-tumblr'); ?> 
					</td>
				</tr>
				<tr valign="top">
				
				<td scope="row" colspan="1" width="50%"> <?php _e('Enable SSL peer verification in remote requests','auto-publish-tumblr');?> </td>
				<td  class="switch-field">
					<label id="xyz_tbap_peer_verification_yes"><input type="radio" name="xyz_tbap_peer_verification" value="1" <?php if($xyz_tbap_peer_verification=='1') echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr'); ?> </label>
					<label id="xyz_tbap_peer_verification_no"><input type="radio" name="xyz_tbap_peer_verification" value="0" <?php if($xyz_tbap_peer_verification=='0') echo 'checked';?>/> <?php _e('No','auto-publish-tumblr'); ?> </label>
				</td>
				</tr>
				
				<tr valign="top">
					<td scope="row" colspan="1"> <?php _e('Apply filters during publishing','auto-publish-tumblr');?> </td>
					<td>
					<?php 
					$ar2=explode(",",$xyz_tbap_apply_filters);
					for ($i=0;$i<3;$i++ ) {
						$filVal=$i+1;
						
						if($filVal==1)
							$filName='the_content';
						else if($filVal==2)
							$filName='the_excerpt';
						else if($filVal==3)
							$filName='the_title';
						else $filName='';
						
						echo '<input type="checkbox" name="xyz_tbap_applyfilters[]"  value="'.$filVal.'" ';
						if(in_array($filVal, $ar2))
						{
							echo 'checked="checked"/>';
						}
						else
							echo '/>';
					
						echo '<label>'.$filName.'</label><br/>';
					
					}
					
					?>
					</td>
				</tr>
				<tr><td><h2>Other Settings</h2>	</td></tr>
				<tr valign="top">

					<td  colspan="1"> <?php _e('Enable credit link to author','auto-publish-tumblr');?>
					</td>
					<td  class="switch-field">
					<label id="xyz_credit_link_yes"><input type="radio" name="xyz_credit_link" value="tbap" <?php  if($xyz_credit_link=='tbap') echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr'); ?> </label>
					<label id="xyz_credit_link_no"><input type="radio" name="xyz_credit_link" value="<?php echo $xyz_credit_link!='tbap'?$xyz_credit_link:0;?>" <?php  if($xyz_credit_link!='tbap') echo 'checked';?>/> <?php _e('No','auto-publish-tumblr'); ?> </label>
					</td>
				</tr>

				
				<tr valign="top">
					<td  colspan="1"> <?php _e('Enable premium version ads','auto-publish-tumblr'); ?>
					</td>
					<td  class="switch-field">
						<label id="xyz_tbap_premium_version_ads_yes"><input type="radio" name="xyz_tbap_premium_version_ads" value="1" <?php if($xyz_tbap_premium_version_ads=='1') echo 'checked';?>/> <?php _e('Yes','auto-publish-tumblr'); ?> </label>
						<label id="xyz_tbap_premium_version_ads_no"><input type="radio" name="xyz_tbap_premium_version_ads" value="0" <?php if($xyz_tbap_premium_version_ads=='0') echo 'checked';?>/> <?php _e('No','auto-publish-tumblr'); ?> </label>
					</td>
				</tr>
				<tr>
					<td id="bottomBorderNone">
					</td>

					
<td id="bottomBorderNone"><div style="height: 50px;">
<input type="submit" class="submit_tbap_new" style="margin-top: 10px;"	value="<?php _e('Update Settings','auto-publish-tumblr'); ?>" name="bsettngs" /></div></td>
				</tr>


			</table>
		</form>
		
		</div>
</div>		
<?php if (is_array($xyz_tbap_include_categories))
$xyz_tbap_include_categories1=implode(',', $xyz_tbap_include_categories);
else 
	$xyz_tbap_include_categories1=$xyz_tbap_include_categories;
	?>
	<script type="text/javascript">
	//drpdisplay();
var catval='<?php echo esc_html($xyz_tbap_include_categories1); ?>';
var custtypeval='<?php echo esc_html($xyz_tbap_include_customposttypes); ?>';
var get_opt_cats='<?php echo esc_html(get_option('xyz_tbap_include_posts'));?>';
jQuery(document).ready(function() {

	<?php if(isset($_POST['bsettngs']))
			{?>
			document.getElementById("xyz_tbap_basic_tab_settings").click();	
			// Get the element with id="xyz_tbap_default_tab_settings" and click on it
			<?php }
			else {?>
			document.getElementById("xyz_tbap_default_tab_settings").click();
				
			<?php }
			?>
	
	  if(catval=="All")
		  jQuery("#cat_dropdown_span").hide();
	  else
		  jQuery("#cat_dropdown_span").show();

	  if(get_opt_cats==0)
		  jQuery('#selPostCat').hide();
	  else
		  jQuery('#selPostCat').show();
   var xyz_credit_link=jQuery("input[name='xyz_credit_link']:checked").val();
   if(xyz_credit_link=='tbap')
	   xyz_credit_link=1;
   else
	   xyz_credit_link=0;
   XyzTbapToggleRadio(xyz_credit_link,'xyz_credit_link');
   
   var xyz_tbap_cat_all=jQuery("input[name='xyz_tbap_cat_all']:checked").val();
   if (xyz_tbap_cat_all == 'All') 
	   xyz_tbap_cat_all=0;
   else 
	   xyz_tbap_cat_all=1;
   XyzTbapToggleRadio(xyz_tbap_cat_all,'xyz_tbap_include_categories'); 
  

   var toggle_element_ids=['xyz_tbap_tbpost_permission','xyz_tbap_include_pages','xyz_tbap_include_posts','xyz_tbap_peer_verification','xyz_tbap_premium_version_ads'];

   jQuery.each(toggle_element_ids, function( index, value ) {
		   checkedval= jQuery("input[name='"+value+"']:checked").val();
		   XyzTbapToggleRadio(checkedval,value); 
   	});

   
}); 
	

function xyz_tbap_rd_cat_chn(val,act)
{
	if(val==1)
	{
		if(act==-1)
		  jQuery("#cat_dropdown_span").hide();
		else
		  jQuery("#cat_dropdown_span").show();
	}
	
}

function xyz_tbap_info_insert(inf){
	
    var e = document.getElementById("xyz_tbap_info");
    var ins_opt = e.options[e.selectedIndex].text;
    if(ins_opt=="0")
    	ins_opt="";
    var str=jQuery("textarea#xyz_tbap_tbmessage").val()+ins_opt;
    jQuery("textarea#xyz_tbap_tbmessage").val(str);
    jQuery('#xyz_tbap_info :eq(0)').prop('selected', true);
    jQuery("textarea#xyz_tbap_tbmessage").focus();

}
function xyz_tbap_show_postCategory(val)
{
	if(val==0)
		jQuery('#selPostCat').hide();
	else
		jQuery('#selPostCat').show();
}


var toggle_element_ids=['xyz_tbap_tbpost_permission','xyz_tbap_include_pages','xyz_tbap_include_posts','xyz_tbap_peer_verification','xyz_credit_link','xyz_tbap_premium_version_ads','xyz_tbap_include_categories'];

jQuery.each(toggle_element_ids, function( index, value ) {
	jQuery("#"+value+"_no").click(function(){
		XyzTbapToggleRadio(0,value);
		if(value=='xyz_tbap_include_posts')
			xyz_tbap_show_postCategory(0);
	});
	jQuery("#"+value+"_yes").click(function(){
		XyzTbapToggleRadio(1,value);
		if(value=='xyz_tbap_include_posts')
			xyz_tbap_show_postCategory(1);
	});
	});
function xyz_tbap_open_tab(evt, xyz_tbap_form_div_id) {
    var i, xyz_tbap_tabcontent, xyz_tbap_tablinks;
    tabcontent = document.getElementsByClassName("xyz_tbap_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("xyz_tbap_tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(xyz_tbap_form_div_id).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
