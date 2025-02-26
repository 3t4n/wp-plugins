<?php
namespace ninjaseoplugin;
class Ninjaseo
{
    public static $class = __CLASS__;

    /**
     * @param $action_id
     */
    public static function ninjaseo_content($action_id){
        global $settings;
        if ($action_id == 'Crawl') {
            $ninjaseodata = $settings['wp']['crawl'];
            include 'ninjaseo_content.php';
        }
        if ($action_id == 'Grader') {
            $ninjaseodata = $settings['wp']['Grader'];
            include 'ninjaseo_content.php';
        }
        if ($action_id == 'Other') {            
            $ninjaseodata = $settings['wp']['Other'].'?site='.home_url();
            include 'ninjaseo_content.php';
        }
    }

    public static function action_1(){
        self::ninjaseo_content('Crawl');
    }
    public static function action_2(){
        self::ninjaseo_content('Grader');
    }
    public static function action_3(){
        self::ninjaseo_content('Other');
    }
    public static function action_4(){
        self::ninjaseo_content(4);
    }

    public static function init()
    {
        add_action('admin_menu', array(__CLASS__, 'register_menu_ninjaseo'),10,0);
    }

    public static function register_menu_ninjaseo()
    {
        global $settings;
        add_menu_page($settings['menus']['menu'], $settings['menus']['menu'], 'manage_options', __FILE__, array(__CLASS__, 'action_1'),plugin_dir_url( __FILE__ ) . 'images/ninjaseo-symbol.png');
        add_submenu_page(__FILE__, $settings['menus']['sub_menu_title_1'], $settings['menus']['sub_menu_title_1'], 'manage_options', $settings['menus']['sub_menu_url_1'], array(__CLASS__, 'action_1'));
        add_submenu_page(__FILE__, $settings['menus']['sub_menu_title_2'], $settings['menus']['sub_menu_title_2'], 'manage_options', $settings['menus']['sub_menu_url_2'], array(__CLASS__, 'action_2'));
        add_submenu_page(__FILE__, $settings['menus']['sub_menu_title_3'], $settings['menus']['sub_menu_title_3'], 'manage_options', $settings['menus']['sub_menu_url_3'], array(__CLASS__, 'action_3'));
    }
}
