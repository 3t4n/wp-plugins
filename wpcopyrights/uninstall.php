<?php
if(!defined('WP_UNINSTALL_PLUGIN')){
	exit();
}
delete_option('wp_copy_rights_options');
