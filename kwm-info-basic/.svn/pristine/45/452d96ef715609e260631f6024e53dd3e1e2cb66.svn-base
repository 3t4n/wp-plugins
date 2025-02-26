<?php

//if uninstall not called from WordPress exit
if(!defined('WP_UNINSTALL_PLUGIN')){
	exit();
}

//if single site
if(!is_multisite()){
    delete_option('kwm_info_basic');
}

?>