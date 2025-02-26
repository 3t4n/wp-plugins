<?php
/*
Plugin Name: autoin-jp
Plugin URI: https://autoin.jp/wordpress/
Description: The autoin-jp which is an ultimate automatic inputting tool.
Version: 1.4
Author: Terunuma Tatsuro
Author URI: https://pierre-soft.com/
*/
	define('autoin_VER', '1.4');

	if( !is_admin() ){                            // user
		require_once plugin_dir_path(__FILE__).'autoin.php';
		add_filter('usces_filter_apply_addressform', 'autoin_jp_usces', 999999, 3);// welcart
		add_filter('the_content', 'autoin_jp_change', 999999); // html change
	}
?>
