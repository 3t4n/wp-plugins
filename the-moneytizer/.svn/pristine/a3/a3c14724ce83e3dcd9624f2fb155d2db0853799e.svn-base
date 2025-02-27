<?php

include_once plugin_dir_path( __FILE__ ).'/core/core_util.php';

include('core/core_form.php');


function themoneytizer_register_submenu_page(){
	add_submenu_page( 'options-general.php', 'The Moneytizer', 'The Moneytizer', 'manage_options', 'themoneytizer', 'themoneytizer_submenu_page', 1 );
}

function themoneytizer_submenu_page() {
	if(!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    include(sprintf("%s/themoneytizer-config-page.php", dirname(__FILE__)));
}


/*====== Add actions ====== */

include_once plugin_dir_path( __FILE__ ).'/core/core_init_options.php';
include_once plugin_dir_path( __FILE__ ).'/core/core_dependencies.php';

function themoneytizer_update_global_options(){
    include_once plugin_dir_path( __FILE__ ).'/core/core_update_informations.php';
}

//Prevent call when admin is not on plugin
if(isset($_GET['page'])&&$_GET['page']=='themoneytizer'){
    add_action('admin_menu', 'themoneytizer_update_global_options');
}

include_once plugin_dir_path( __FILE__ ).'/core/core_statistics.php';
include_once plugin_dir_path( __FILE__ ).'/core/core_lazy_loading.php';
include_once plugin_dir_path( __FILE__ ).'/core/core_cmp.php';
include_once plugin_dir_path( __FILE__ ).'/core/core_ajax.php';

add_action('admin_menu', 'themoneytizer_register_submenu_page');
