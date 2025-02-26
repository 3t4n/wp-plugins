<?php

/*
  Plugin Name: Adminbar-Post-Menus
  Plugin URI: http://shawnsandy.com
  Description: Makes it easy to add list of pages, post and even post types to the WP AdminBar for quick editing.
  Author: Shawn Sandy
  Author URI: http://shawnsandy.com
  Version: 0.2
 */

include_once dirname(__FILE__) . '/AdminbarPostMenus.php';

if (!class_exists('Adminbar_Menu')) {

    include_once dirname(__FILE__) . '/Adminbar/Menu.php';
    include_once dirname(__FILE__) . '/Adminbar/PostMenus.php';
}

class apm_plugin {

    public function __construct() {
        $this->init();
        //add_action('init', array($this, 'init'));
    }

    public function init() {
        $this->load();
    }

    public function load() {
        if (!class_exists('al_manager')) :
            add_action('admin_notices', array($this, 'apm_admin_notice'));
            return;
        //add_action('init', 'init_apm');
        endif;
    }

    public function apm_admin_notice() {
        //TODO fix $msg localization.
        $msg = __('<div id="messages" class="error"><p>
       Admnbar-PostMenus requires the PHP <code>AL.Manager plugin</code>,
       http://autoloadmanager.shawnsandy.com, please install or disable the plugin
       </p></div>', 'apm');
        echo $msg;
    }

}

/**
 * Initalize the plugin
 */
function init_apm() {

    //** makes it plugabble ***//
    if (!function_exists('apm_menus')):
        $adm_plugin = AdminbarPostMenus::add_menus()->nodes();
    endif;
}

/**
 * *****************************************************************************
 * Customize Adminbar Post Menus
 * *****************************************************************************
 */
function default_menus() {

    //create an post_type array(post_type, menu_title);
    $post_types = array('post' => "Posts", 'pages' => 'Pages');

    //load and run the class
    //$apmmenus = AdminbarPostMenus::add_menus()->set_list_count(5)->set_post_types($post_types)->nodes();
    Adminbar_PostMenus::factory()->create_nodes();
}

// run the function on init;
add_action('init', 'default_menus');










