<?php

//-- Dispaly Sticky Notification Bar in Post/Page Editor ------------------------
//-----------------------------------------------------------------------------
add_action("admin_menu", "snbar_post_meta_box_options");
add_action('save_post', 'snbar_post_meta_box_save');
function snbar_post_meta_box_options(){
	if( function_exists( 'add_meta_box' ) ) {
		$snbar_post_types = get_post_types();		
		foreach($snbar_post_types as $snbar_post ) {
			add_meta_box("snbar_custom_post", "Sticky Notification Bar", "snbar_post_meta_box_add", $snbar_post, "normal", "high");
		}
	}
 }

function snbar_post_meta_box_add(){
	global $post;  	
	$snbar_custom = get_post_custom($post->ID);	
    if(!isset($snbar_custom['snbar_check']))
		$snbar_custom['snbar_check']='0';
	//if(isset($snbar_check)){}
		//else
	//$snbar_check='1';	
	$snbar_check = $snbar_custom['snbar_check'][0];
?>
  <input type="checkbox" name="snbar_check" id="snbar_check" <?php if($snbar_check){ ?> checked <?php } ?> value="true"/>&nbsp;<label for="snbar_check" style="color:red;"><?php _e('Check this, if you want to Disable Sticky Notification Bar for this post/page.','snbar'); ?> </label><br/>
  <input type="hidden" name="snbar_metasubmit" value="1" />
<?php
}

//update post custom fields
function snbar_post_meta_box_save(){
	global $post;
	if(isset($_REQUEST['snbar_metasubmit'])){
	$snbar_chk_page=null;
    if(array_key_exists("snbar_check" ,$_POST))	
    $snbar_chk_page =($_POST['snbar_check']); 	
	update_post_meta($post->ID, "snbar_check",$snbar_chk_page);	
}	
}
/*-------------------------------------------------------------------------------------------*/
?>