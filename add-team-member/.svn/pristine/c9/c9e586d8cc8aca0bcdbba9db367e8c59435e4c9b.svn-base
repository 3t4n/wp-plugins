<?php 
$type='sci_team';
			
	add_meta_box('my_all_meta', 'Member Description', 'my_meta_team',$type, 'normal', 'high');
  
	add_action('save_post','my_meta_save');
	
	function my_meta_team()
{
	global $post;
 
	
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
  
	?>
	
	 
	<label><?php _e('Designation','sis_spa');?></label>
	<p>
		<input style="width:100%; height:40px;padding: 10px;" name="_my_meta[Designation]" type="text" value="<?php if(!empty($meta['Designation'])) echo $meta['Designation']; ?>"> </input>

	</p>
		
	<label><?php _e('Description','sis_spa');?> </label>
	<p>
		<textarea style="width:100%; height:100px;padding: 10px;" name="_my_meta[description]" rows="3" ><?php if(!empty($meta['description'])) echo $meta['description']; ?></textarea>
	</p>
	</br>
	
	<h3 class="hndle"><span><?php _e('Social Media Setting','sis_spa');?></span></h3>
 <p><h4><label><?php _e('Facebook','sis_spa');?></label></h4>

		<input style="width:80%; height:20px;padding: 10px;"  name="_my_meta[facebook_url]" placeholder="Enter Your Fb's URL in https formate" value="<?php if(!empty($meta['facebook_url'])) echo $meta['facebook_url']; ?>"/>
		<input type="checkbox" name="_my_meta[facebook_chkbx]" value="1"<?php if(isset($meta['facebook_chkbx'])) checked($meta['facebook_chkbx'],'1') ; ?> />
</p>
	<h4><?php _e('Twitter Url','sis_spa')?></h4>
<p>
	<input style="width:80%; height:20px;padding: 10px;"  name="_my_meta[twitter_url]" placeholder="Enter Your Twitter's URL in https formate"  value="<?php if(!empty($meta['twitter_url'])) echo $meta['twitter_url']; ?>"/>
	
	<input type="checkbox" name="_my_meta[twitter_chkbx]" value="1"<?php if(isset($meta['twitter_chkbx'])) checked($meta['twitter_chkbx'],'1') ; ?> />
</p>
<p>
	<h4> <label><?php _e('Google Url','sis_spa');?></label>	</h4>
   
   <input style="width:80%; height:20px;padding: 10px;"  name="_my_meta[google_url]" placeholder="Enter Your Google's URL in https formate" value="<?php if(!empty($meta['google_url'])) echo $meta['google_url']; ?>"/>
	
	<input type="checkbox" name="_my_meta[google_chkbx]" value="1" <?php if(isset($meta['google_chkbx'])) checked($meta['google_chkbx'],'1') ; ?> />
</p>			
<?php  	
}
	function my_meta_save($post_id) 
{
	
	if (!current_user_can('edit_post', $post_id)) return $post_id;
	
    $current_data = get_post_meta($post_id, '_my_meta', TRUE);	

	if(isset($_POST['_my_meta']))
	$new_data = $_POST['_my_meta'];

	my_meta_clean($new_data);
	
	if ($current_data) 
	{
		if (is_null($new_data)) delete_post_meta($post_id,'_my_meta');
		else update_post_meta($post_id,'_my_meta',$new_data);
	}
	elseif (!is_null($new_data))
	{
		add_post_meta($post_id,'_my_meta',$new_data,TRUE);
	}

	return $post_id;
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