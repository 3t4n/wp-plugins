<?php
/*
Plugin Name: Hana Flv Player Extension
Plugin URI: http://jealousdesigns.co.uk
Description: Extends Hana FLV Player to enable upload of media directly within the plugin rather than having to copy urls.
Version: 0.2
Author: Jealous Designs
Author URI: http://jealousdesigns.co.uk
*/

$plugins = get_option('active_plugins');

$required_plugin = 'hana-flv-player/hana-flv-player.php';

if(in_array( $required_plugin , $plugins )){

	if (!defined("HFE_url")) { define("HFE_url", WP_PLUGIN_URL.'/hana-flv-extension'); } //NO TRAILING SLASH
	
	if (!defined("HFE_dir")) { define("HFE_dir", WP_PLUGIN_DIR.'/hana-flv-extension'); } //NO TRAILING SLASH
	
	
	include_once('includes/class-hana-flv-ext.php'); //
	
	$hana_ext = new hana_flv_ext;
	
	function the_hana_flv($postid){
		
		global $hana_flv;
	
		$args = array();
		
		$args[0] = '';
		
		$args[1] = 'video="'.get_post_meta($postid, 'video', true).'" width="'.get_post_meta($postid, 'width', true).'" height="'.get_post_meta($postid, 'height', true).'" description="'.get_post_meta($postid, 'description', true).'" player="'.get_post_meta($postid, 'player', true).'" autoload="'.get_post_meta($postid, 'autoload', true).'" autoplay="'.get_post_meta($postid, 'autoplay', true).'" loop="'.get_post_meta($postid, 'loop', true).'" autorewind="'.get_post_meta($postid, 'autorewind', true).'" ';
						
		echo $hana_flv->hana_flv_callback($args) . '<span class="hana_ext_flv_desc">' . get_post_meta($postid, 'description', true) . '</span';
		
	}

}else{

	add_action('admin_notices', 'no_hana_boo_hoo');    
	function no_hana_boo_hoo(){
		  
	   ?>
	      <div class="error">
	        <p>
	           Hana FLV is not installed... You must have it installed for the Hana FLV Extension to work 
	          <!--  <a href="admin.php?page=mailing_list_settings">Lets do it!</a> -->
	        </p>
	      </div>     
	  <?php     
	}	

}
?>