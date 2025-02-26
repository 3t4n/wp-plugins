<?php
// Stop direct call
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
				die('You are not allowed to call this page directly.');
}


//Metabox For Pages
add_action('admin_init','aa_meta_init');

function aa_meta_init()
{
		add_meta_box('all_aa_meta',  __('Show Auto Attachments?','autoa'), 'aa_meta_page', 'page', 'side', 'high');
		add_meta_box('post_aa_meta',  __('Auto Attachments Before/After?','autoa'), 'aa_meta_post', 'post', 'side', 'high');

		add_action('save_post','aa_meta_save');
}

function aa_meta_page()
{
	global $post;
 
	$opts = get_option('auto_attachments_options');
	// using an underscore, prevents the meta variable
	// from showing up in the custom fields section
	$meta = get_post_meta($post->ID,'aa_page_meta',TRUE);
	if (isset($meta['show'])){$show = $meta['show'];}
	if (isset($meta['vshow'])){$vshow = $meta['vshow'];}
	if (isset($meta['fshow'])){$fshow = $meta['fshow'];}
	if (isset($meta['ashow'])){$ashow = $meta['ashow'];}
	if (isset($meta['gshow'])){$gshow = $meta['gshow'];}
 
	?>
	<p><?php _e('If you want to show Auto Attachments on this page Check This Check Box','autoa');?> </p>
	<input type="checkbox" id="aa_page_meta" name="aa_page_meta[show]" value="yes" <?php if ($show == "yes") { _e('checked="checked"'); } ?> />  
        <label for="aa_page_meta"><?php _e('I Want to Show','autoa'); ?></label>	
	<p><?php _e('Show Video Section','autoa');?> 
	<?php if ($opts['hidevideoall'] == 'no'){?>
	<select id="aa_page_meta" name="aa_page_meta[vshow]">
		<option value="yes" <?php if ($vshow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($vshow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Video Area Hidden Permanently</p>','autoa');}
	 if ($opts['hideaudioall'] == 'no'){?>
	<p><?php _e('Show Audio Section','autoa');?>
	<select id="aa_page_meta" name="aa_page_meta[ashow]">
		<option value="yes" <?php if ($ashow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($ashow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Audio Area Hidden Permanently</p>','autoa');} 
		if($opts['galeri'] == 'yes' ) {?> 
	<p><?php _e('Show Gallery Section','autoa');?> 
	<select id="aa_page_meta" name="aa_page_meta[gshow]">
		<option value="yes" <?php if ($gshow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($gshow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Gallery Hidden Permanently</p>','autoa');}
	 if ($opts['hidefilesall'] == 'no'){?>
	<p><?php _e('Show Files Section','autoa');?> 
	<select id="aa_page_meta" name="aa_page_meta[fshow]">
		<option value="yes" <?php if ($fshow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($fshow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Files Area Hidden Permanently</p>','autoa');} 
 
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function aa_meta_post()
{
	global $post;
	//Get Plugin Options for good use :)
	$opts = get_option('auto_attachments_options');
	// using an underscore, prevents the meta variable
	// from showing up in the custom fields section
	$meta = get_post_meta($post->ID,'aa_post_meta',TRUE);
	if (isset($meta['where'])){$where = $meta['where'];}
	if (isset($meta['vshow'])){$vshow = $meta['vshow'];}
	if (isset($meta['fshow'])){$fshow = $meta['fshow'];}
	if (isset($meta['ashow'])){$ashow = $meta['ashow'];}
	if (isset($meta['gshow'])){$gshow = $meta['gshow'];}
	?>
	<p><?php _e('Where you want to show attachments','autoa');?> </p>
	<select id="aa_post_meta" name="aa_post_meta[where]">
		<option value="after" <?php if ($where == "after") { _e('selected'); } ?>><?php _e('After Post','autoa');?></option>
		<option value="before" <?php if ($where == "before") { _e('selected'); } ?>><?php _e('Before Post','autoa');?></option>
	</select>
	<?php if ($opts['hidevideoall'] == 'no'){?>
	<p><?php _e('Show Video Section','autoa');?> 
	<select id="aa_post_meta" name="aa_post_meta[vshow]">
		<option value="yes" <?php if ($vshow  == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($vshow  == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Video Area Hidden Permanently</p>','autoa');}
	 if ($opts['hideaudioall'] == 'no'){?>
	<p><?php _e('Show Audio Section','autoa');?> 
	<select id="aa_post_meta" name="aa_post_meta[ashow]">
		<option value="yes" <?php if ($ashow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($ashow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Audio Area Hidden Permanently</p>','autoa');} 
		if($opts['galeri'] == 'yes' ) {?> 
	<p><?php _e('Show Gallery Section','autoa');?> 
	<select id="aa_post_meta" name="aa_post_meta[gshow]">
		<option value="yes" <?php if ($gshow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($gshow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Gallery Hidden Permanently</p>','autoa');}
	 if ($opts['hidefilesall'] == 'no'){?>
	<p><?php _e('Show Files Section','autoa');?> 
	<select id="aa_post_meta" name="aa_post_meta[fshow]">
		<option value="yes" <?php if ($fshow == "yes") { _e('selected'); } ?>><?php _e('Yes','autoa');?></option>
		<option value="no" <?php if ($fshow == "no") { _e('selected'); } ?>><?php _e('No','autoa');?></option>
	</select></p>
	<?php } else { _e('<p>Files Area Hidden Permanently</p>','autoa');} 
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function aa_meta_save($post_id) 
{
	// authentication checks
	// make sure data came from our meta box
	if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'page') 
	{
		if (!current_user_can('edit_page', $post_id)) return $post_id;
		$current_data = get_post_meta($post_id, 'aa_page_meta', TRUE);	
		$new_data = $_POST['aa_page_meta'];
		my_meta_clean($new_data);
		if ($current_data) 
		{
			if (is_null($new_data)) delete_post_meta($post_id,'aa_page_meta');
			else update_post_meta($post_id,'aa_page_meta',$new_data);
		}
		elseif (!is_null($new_data))
		{
			add_post_meta($post_id,'aa_page_meta',$new_data,TRUE);
		}
		return $post_id;
	}
	elseif($_POST['post_type'] == 'post')
	{
		if (!current_user_can('edit_post', $post_id)) return $post_id;
		
		$current_data = get_post_meta($post_id, 'aa_post_meta', TRUE);	
		$new_data = $_POST['aa_post_meta'];
		my_meta_clean($new_data);
		if ($current_data) 
		{
			if (is_null($new_data)) delete_post_meta($post_id,'aa_post_meta');
			else update_post_meta($post_id,'aa_post_meta',$new_data);
		}
		elseif (!is_null($new_data))
		{
			add_post_meta($post_id,'aa_post_meta',$new_data,TRUE);
		}
		return $post_id;

	}
}
function my_meta_clean(&$arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $i => $v)
		{
			if (is_array($arr[$i])) 
			{
				my_meta_clean($arr[$i]);

				if (!count($arr[$i])) 
				{
					unset($arr[$i]);
				}
			}
			else 
			{
				if (trim($arr[$i]) == '') 
				{
					unset($arr[$i]);
				}
			}
		}
		if (!count($arr)) 
		{
			$arr = NULL;
		}
	}
}

?>