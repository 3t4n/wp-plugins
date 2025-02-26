<?php
namespace NINJASEOAPP;

class Adminninjaseo
{
    public static $class = __CLASS__;

    /**
     * @param $action_id
     */
    public static function loadFrame($action_id){
        global $settings;
        if ($action_id == 'Crawl') {            
            $frame_url = $settings['wp']['crawl'].'&url='.home_url();
            include 'frame.php';
        }
        if ($action_id == 'Grader') {            
            $frame_url = $settings['wp']['Grader'].'&url='.home_url();
            include 'frame.php';
        }
        if ($action_id == 'Other') {            
            $frame_url = $settings['wp']['Other'].'?site='.home_url();
            include 'frame.php';
        }
    }

    public static function action_1(){
        self::loadFrame('Crawl');
    }
    public static function action_2(){
        self::loadFrame('Grader');
    }
    public static function action_3(){
        self::loadFrame('Other');
    }
    public static function action_4(){
        self::loadFrame(4);
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

    public static function admin_scripts()
    {
    }

    public static function manage_page()
    {

        global $settings;

        $menu_name = 'Demo Menu '.rand();
        $menu_location = 'primary';
        $menu_exists = wp_get_nav_menu_object($menu_name);



        // if (!$menu_exists) {
        if (true) {
            $menu_id = wp_create_nav_menu($menu_name);

            foreach ($settings['menus'] as $each_name => $each_url) {
                if (strpos($each_name, 'sub_menu_') === 0) {
                    $each_name = str_replace('sub_menu_', '', $each_name);

                    wp_update_nav_menu_item(
                        $menu_id,
                        0,
                        array(
                            'menu-item-title' => __($each_name),
                            'menu-item-classes' => $each_name,
                            'menu-item-url' => $settings['wp']['site'].$each_url.'?site='.home_url(),
                            'menu-item-status' => 'publish',
                            'menu-item-parent-id' => $parent,
                        )
                    );
                } else {
                    $parent = wp_update_nav_menu_item(
                        $menu_id,
                        0,
                        array(
                            'menu-item-title' => __($each_name),
                            'menu-item-classes' => $each_name,
                            'menu-item-url' => $settings['wp']['site'].$each_url.'?site='.home_url(),
                            'menu-item-status' => 'publish',
                        )
                    );
                }
            }
        }

        echo strtoupper(get_admin_page_title());
    }
}
