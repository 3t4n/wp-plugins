<?php 
if (!defined('WP_UNINSTALL_PLUGIN')) exit();

add_action('init', 'acfw30_unregister_post_type', 999);
function acfw30_unregister_post_type(){
	unregister_post_type('acfw30_forms');
}