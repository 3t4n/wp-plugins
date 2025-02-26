<?php 
if( !defined('ABSPATH') ){ exit();}
add_action( 'add_meta_boxes', 'xyz_tbap_add_custom_box' );
$GLOBALS['edit_flag']=0;
function xyz_tbap_add_custom_box()
{
	$posttype="";
	if(isset($_GET['post_type']))
		$posttype=$_GET['post_type'];
	
	if($posttype=="")
		$posttype="post";
	
if(isset($_GET['action']) && $_GET['action']=="edit" && !empty($_GET['post'])) /// empty check added for fixing client scenario
	{
		$postid=intval($_GET['post']);
		
		
		$get_post_meta=get_post_meta($postid,"xyz_tbap",true);
		if($get_post_meta==1){
			$GLOBALS['edit_flag']=1;
		}
		global $wpdb;
		$table='posts';
		$accountCount = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.$table.' WHERE id=%d and post_status NOT IN (%s, %s) LIMIT %d,%d',array($postid,'draft','future',0,1) )) ;
		if($accountCount>0){
			$GLOBALS['edit_flag']=1;
			}
		$posttype=get_post_type($postid);
	}


	if ($posttype=="page")
	{

		$xyz_tbap_include_pages=get_option('xyz_tbap_include_pages');
		if($xyz_tbap_include_pages==0)
			return;
	}
	else if($posttype=="post")
	{ 
		$xyz_tbap_include_posts=get_option('xyz_tbap_include_posts');
		if($xyz_tbap_include_posts==0)
			return;
	}
	else if($posttype!="post")
	{

		$xyz_tbap_include_customposttypes=get_option('xyz_tbap_include_customposttypes');


		$carr=explode(',', $xyz_tbap_include_customposttypes);
		if(!in_array($posttype,$carr))
			return;

	}
	
	if(get_option('xyz_tbap_tbconsumer_id')!="" && get_option('xyz_tbap_tbconsumer_secret')!="" && get_option('xyz_tbap_tb_id')!="" && get_option('xyz_tbap_current_tbappln_token')!="" && get_option('xyz_tbap_tbaccestok_secret')!="" && get_option('xyz_tbap_tbpost_permission')==1)
	add_meta_box( "xyz_tbap", '<strong>WP Tumblr Auto Publish </strong>', 'xyz_tbap_addpostmetatags') ;
}
function xyz_tbap_addpostmetatags()
{
	$imgpath=plugins_url("images/",XYZ_TBAP_PLUGIN_FILE);
	$heimg=$imgpath."support.png";
	$xyz_tbap_catlist=get_option('xyz_tbap_include_categories');
//	if (is_array($xyz_tbap_catlist))
//		$xyz_tbap_catlist=implode(',', $xyz_tbap_catlist);
	?>
<script>

/****************** Code to reload metabox in Gutenberg editor ******************/
jQuery(document).ready(function($) {
	// Check if the document body is available and if we're on a block editor page
const isBlockEditorPage = document.body && document.body.classList.contains('block-editor-page');
// Ensure wp and necessary methods are available
if (isBlockEditorPage && 
	typeof wp !== 'undefined' && 
	wp.blocks && 
	wp.data && 
	typeof wp.data.select('core/notices') === 'object' && 
	typeof wp.data.select('core/editor') === 'object' && 
	typeof wp.data.select('core/editor').getCurrentPost === 'function' &&
	typeof wp.data.select('core/notices').getNotices === 'function') {
		wp.data.subscribe(() => { 

		const notices = wp.data.select( 'core/notices' ).getNotices(); 
		const publishSuccessNotice = notices.find( notice => notice.content === 'Post published.' || notice.content === 'Post updated.');
		const editorSelect = wp.data.select('core/editor');
        if (editorSelect && typeof editorSelect.getCurrentPost === 'function') {
		const currentPostStatus = wp.data.select('core/editor').getCurrentPost().status;
		if (publishSuccessNotice && currentPostStatus === 'publish') 
			{
                

                    var xyz_tbap_default_selection_edit="<?php echo esc_html(get_option('xyz_tbap_default_selection_edit'));?>";
                    
                    if(xyz_tbap_default_selection_edit==0 && jQuery("input[name='xyz_tbap_tbpost_permission']:checked").val()==1) {
                    
                        document.getElementById("tbmf_tbap").style.display='none';
                    	document.getElementById("tbmftarea_tbap").style.display='none';
                    	document.getElementById("tbai_tbap").style.display='none';		
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_0').prop('checked',true);
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_yes').removeClass('xyz_tbap_toggle_on');
                    	jQuery('#xyz_tbap_tbpost_permission_yes').addClass('xyz_tbap_toggle_off');
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_no').removeClass('xyz_tbap_toggle_off');
                    	jQuery('#xyz_tbap_tbpost_permission_no').addClass('xyz_tbap_toggle_on');                    	                    
                    }
                    else if(xyz_tbap_default_selection_edit==1 && jQuery("input[name='xyz_tbap_tbpost_permission']:checked").val()==0) {
                    
                    	document.getElementById("tbmf_tbap").style.display='';
                    	document.getElementById("tbmftarea_tbap").style.display='';
                    	document.getElementById("tbai_tbap").style.display='';	
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_1').prop('checked',true);
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_no').removeClass('xyz_tbap_toggle_on');
                    	jQuery('#xyz_tbap_tbpost_permission_no').addClass('xyz_tbap_toggle_off');
                    	
                    	jQuery('#xyz_tbap_tbpost_permission_yes').removeClass('xyz_tbap_toggle_off');
                    	jQuery('#xyz_tbap_tbpost_permission_yes').addClass('xyz_tbap_toggle_on');
                    }	
				}
        }
		});
    
   }
});
/*************************************************************************************/


function displaycheck_tbap()
{
var tbcheckid=jQuery("input[name='xyz_tbap_tbpost_permission']:checked").val();
if(tbcheckid==1)
{

	document.getElementById("tbmf_tbap").style.display='';
	document.getElementById("tbmftarea_tbap").style.display='';
	document.getElementById("tbai_tbap").style.display='';	
}
else
{
	
	document.getElementById("tbmf_tbap").style.display='none';
	document.getElementById("tbmftarea_tbap").style.display='none';
	document.getElementById("tbai_tbap").style.display='none';		
}
}
</script>
<script type="text/javascript">
function xyz_tbap_detdisplay(id)
{
	document.getElementById(id).style.display='';
}
function xyz_tbap_dethide(id)
{
	document.getElementById(id).style.display='none';
}

jQuery(document).ready(function() {
	displaycheck_tbap();
	
	 var xyz_tbap_tbpost_permission=jQuery("input[name='xyz_tbap_tbpost_permission']:checked").val();
	 XyzTbapToggleRadio(xyz_tbap_tbpost_permission,'xyz_tbap_tbpost_permission'); 
	var wp_version='<?php echo XYZ_TBAP_WP_VERSION; ?>';
	if (wp_version <= '5.3') {
	jQuery('#category-all').bind("DOMSubtreeModified",function(){
		tbap_get_categorylist(1);
		});
	
	tbap_get_categorylist(1);tbap_get_categorylist(2);
	jQuery('#category-all').on("click",'input[name="post_category[]"]',function() {
		tbap_get_categorylist(1);
				});

	jQuery('#category-pop').on("click",'input[type="checkbox"]',function() {
		tbap_get_categorylist(2);
				});
	/////////gutenberg category selection
	jQuery(document).on('change', 'input[type="checkbox"]', function() {
		tbap_get_categorylist(2);
				});
	}
});

function tbap_get_categorylist(val)
{
	var flag=true;
	var cat_list="";var chkdArray=new Array();var cat_list_array=new Array();
	var posttype="<?php echo get_post_type() ;?>";
	if(val==1){
	 jQuery('input[name="post_category[]"]:checked').each(function() {
		 cat_list+=this.value+",";flag=false;
		});
	}else if(val==2)
	{
		jQuery('#category-pop input[type="checkbox"]:checked').each(function() {
			cat_list+=this.value+",";flag=false;
		});
		jQuery('.editor-post-taxonomies__hierarchical-terms-choice input[type="checkbox"]:checked').each(function() { //gutenberg category checkbox
			cat_list+=this.value+",";flag=false;
		});
		if(flag){
		<?php
		if (isset($_GET['post']))
		$postid=intval($_GET['post']);
		if (isset($GLOBALS['edit_flag']) && $GLOBALS['edit_flag']==1 && !empty($postid)){
			$defaults = array('fields' => 'ids');
			$categ_arr=wp_get_post_categories( $postid, $defaults );
			$categ_str=implode(',', $categ_arr);
			?>
			cat_list+='<?php echo $categ_str; ?>';
		<?php }?>
			flag=false;
		}
	}
	 if (cat_list.charAt(cat_list.length - 1) == ',') {
		 cat_list = cat_list.substr(0, cat_list.length - 1);
		}
		jQuery('#cat_list').val(cat_list);
		
		var xyz_tbap_catlist="<?php echo $xyz_tbap_catlist;?>";
		if(xyz_tbap_catlist!="All")
		{
			cat_list_array=xyz_tbap_catlist.split(',');
			var show_flag=1;
			var chkdcatvals=jQuery('#cat_list').val();
			chkdArray=chkdcatvals.split(',');
			for(var x=0;x<chkdArray.length;x++) { 
				
				if(XyzTbapinArray(chkdArray[x], cat_list_array))
				{
					show_flag=1;
					break;
				}
				else
				{
					show_flag=0;
					continue;
				}
				
			}

			if(show_flag==0 && posttype=="post")
				jQuery('#xyz_tbMetabox').hide();
			else
				jQuery('#xyz_tbMetabox').show();
		}
}
function XyzTbapinArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}


</script>
<table class="xyz_tbap_metalist_table">
<input type="hidden" name="cat_list" id="cat_list" value="">
<input type="hidden" name="xyz_tbap_post" id="xyz_tbap_post" value="0" >
	<tr id="xyz_tbMetabox"><td colspan="2" >
<?php  if(get_option('xyz_tbap_tbpost_permission')==1) {
	$postid=0;
if (isset($_GET['post']))
	$postid=intval($_GET['post']);
$post_permission=1;
$get_post_meta_future_data='';
$get_post_meta=get_post_meta($postid,"xyz_tbap",true);
if (((get_option('xyz_tbap_default_selection_edit')==2 && isset($GLOBALS['edit_flag'])) || (get_option('xyz_tbap_default_selection_create')==2 && $get_post_meta!=1))  && !empty($postid))
	$get_post_meta_future_data=get_post_meta($postid,"xyz_tbap_future_to_publish",true);
	if (!empty($get_post_meta_future_data)&& isset($get_post_meta_future_data['xyz_tbap_tbpost_media_permission']))
	{
		$post_permission=$get_post_meta_future_data['post_tumblr_permission'];
		$xyz_tbap_media_permission=$get_post_meta_future_data['xyz_tbap_tbpost_media_permission'];
		$xyz_tbap_tbmessage=$get_post_meta_future_data['xyz_tbap_tbmessage'];
	}
	else {
		$xyz_tbap_media_permission=get_option('xyz_tbap_tbpost_media_permission');
		$xyz_tbap_tbmessage=get_option('xyz_tbap_tbmessage');
	}
	?>
<table class="xyz_tbap_meta_acclist_table"><!-- tb META -->


<tr>
		<td colspan="2" class="xyz_tbap_pleft15 xyz_tbap_meta_acclist_table_td"><strong> <?php _e('Tumblr','auto-publish-tumblr'); ?> </strong>
		</td>
</tr>

<tr><td colspan="2" valign="top">&nbsp;</td></tr>

	<tr valign="top">
		<td class="xyz_tbap_pleft15" width="60%"> <?php _e('Enable auto publish posts to my tumblr account','auto-publish-tumblr'); ?> 
		</td>
		<td  class="switch-field">
		<label id="xyz_tbap_tbpost_permission_yes"><input type="radio" name="xyz_tbap_tbpost_permission" id="xyz_tbap_tbpost_permission_1" value="1" <?php if ($post_permission==1) echo "checked";?>/> <?php _e('Yes','auto-publish-tumblr'); ?> </label>
		<label id="xyz_tbap_tbpost_permission_no"><input type="radio" name="xyz_tbap_tbpost_permission" id="xyz_tbap_tbpost_permission_0" value="0" <?php if ($post_permission==0) echo "checked";?>/> <?php _e('No','auto-publish-tumblr'); ?> </label>
	</td>
	</tr>
	<tr valign="top" id="tbai_tbap">
		<td class="xyz_tbap_pleft15"> <?php _e('Attachment to be posted to Tumblr','auto-publish-tumblr'); ?>
		</td>
		<td><select id="xyz_tbap_tbpost_media_permission" name="xyz_tbap_tbpost_media_permission">
		<option value="0" <?php  if($xyz_tbap_media_permission==0) echo 'selected';?>>  <?php _e('No','auto-publish-tumblr'); ?> </option>
		<option value="1" <?php  if($xyz_tbap_media_permission==1) echo 'selected';?>> <?php _e('Image','auto-publish-tumblr'); ?> </option>
		<option value="2" <?php  if($xyz_tbap_media_permission==2) echo 'selected';?>> <?php _e('Link','auto-publish-tumblr'); ?> </option>
		</select>
		</td>
	</tr>
	
	<tr valign="top" id="tbmf_tbap">
		<td class="xyz_tbap_pleft15"> <?php _e('Message format for posting','auto-publish-tumblr'); ?> <img src="<?php echo $heimg?>"
						onmouseover="xyz_tbap_detdisplay('xyz_tbap_informationdiv')" onmouseout="xyz_tbap_dethide('xyz_tbap_informationdiv')" style="width:13px;height:auto;">
						<div id="xyz_tbap_informationdiv" class="tbap_informationdiv"
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
						</div>
		</td>
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
		</select> </td></tr>
		
		<tr id="tbmftarea_tbap"><td>&nbsp;</td><td>
		<textarea id="xyz_tbap_tbmessage"  name="xyz_tbap_tbmessage" style="height:80px !important;" ><?php echo esc_textarea($xyz_tbap_tbmessage);?></textarea>
	</td></tr>
	
	</table>
	<?php }?>
	</td></tr>
	
	
</table>
<script type="text/javascript">

	var edit_flag="<?php echo $GLOBALS['edit_flag'];?>";
	if(edit_flag==1)
		xyz_tbap_load_edit_action();
	if(edit_flag!=1)
		xyz_tbap_load_create_action();
	
	function xyz_tbap_load_edit_action()
	{
		document.getElementById("xyz_tbap_post").value=1;
		var xyz_tbap_default_selection_edit="<?php echo esc_html(get_option('xyz_tbap_default_selection_edit'));?>";
		if(xyz_tbap_default_selection_edit=="")
			xyz_tbap_default_selection_edit=0;
		if(xyz_tbap_default_selection_edit==1 || xyz_tbap_default_selection_edit==2)
			return;
		jQuery('#xyz_tbap_tbpost_permission_0').attr('checked',true);
		displaycheck_tbap();

	}
	function xyz_tbap_load_create_action()
	{
		document.getElementById("xyz_tbap_post").value=1;
		var xyz_tbap_default_selection_create="<?php echo esc_html(get_option('xyz_tbap_default_selection_create'));?>";
		if(xyz_tbap_default_selection_create=="")
			xyz_tbap_default_selection_create=0;
		if(xyz_tbap_default_selection_create==1 || xyz_tbap_default_selection_create==2)
			return;
		jQuery('#xyz_tbap_tbpost_permission_0').attr('checked',true);
		displaycheck_tbap();
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

	jQuery("#xyz_tbap_tbpost_permission_no").click(function(){
		displaycheck_tbap();
		XyzTbapToggleRadio(0,'xyz_tbap_tbpost_permission');
		
	});
	jQuery("#xyz_tbap_tbpost_permission_yes").click(function(){
		displaycheck_tbap();
		XyzTbapToggleRadio(1,'xyz_tbap_tbpost_permission');
		
	});


	</script>
<?php 
}
?>