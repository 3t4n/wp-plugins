<?php 
/*
Plugin Name: Alixcan More Ads
Plugin URI: http://www.alixcan.net/?p=1505
Description: Yazı İçerisindeki &lt;!--more--&gt; Tagına Reklam Ekleyin.
Author: AlixcaN
Version: 1.0
Author URI: http://www.alixcan.net
*/

if(get_option('alixcan_reklam_kodu')!=''){
	add_filter('the_content', 'adds_block');

	function adds_block($content){
		if (is_single())
			global $post;
			$thePostID = $post->ID;
			$new_insert = '<span id="more-' .$thePostID.'"></span>' ;
			return str_replace($new_insert, my_ad(), $content);
	}
	function my_ad(){
	return stripslashes(get_option('alixcan_reklam_kodu'));
	}
}


//*************** Admin function ***************
function alixcan_admin() {
	include('alixcan_more_ads_admin.php');
}

function alixcan_admin_actions() {
    add_options_page("Devamını Göster Reklam Ayarları", "&bull; Devamını Göster Reklam Ayarları", 6, "alixcan_admin", "alixcan_admin");
}

add_action('admin_menu', 'alixcan_admin_actions');