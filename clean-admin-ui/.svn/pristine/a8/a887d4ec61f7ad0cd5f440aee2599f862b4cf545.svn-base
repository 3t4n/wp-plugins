<?php
/*
Plugin Name: Clean Admin UI
Plugin URI: http://www.arenddeboer.com/clean-admin-ui-a-new-wordpress-plugin-to-remove-admin-menu-items/
Version: 1.4
Description: Configure and remove admin menu items like posts, pages, comments
Author: Arend de Boer
Author URI: http://www.arenddeboer.com/clean-admin-ui-a-new-wordpress-plugin-to-remove-admin-menu-items/

Copyright 2011  Arend de Boer  (email : arenddeboer@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*
===============================================================================

set default options when plugin is activated, remove options when deactivated

===============================================================================
*/

global $CAUdefaults;
$CAUdefaults = array(
    'show_menu_posts'=>'1',
    'show_menu_media'=>'1',
    'show_menu_page_links'=>'1',
    'show_menu_pages'=>'1', 
    'show_menu_comments'=>'1',
    'show_menu_users'=>'1',
    'show_menu_plugins'=>'1',
    'show_menu_themes'=>'1',
    'show_menu_tools'=>'1',
    'show_menu_dashboard'=>'1',
    'db_version'=>'1.1');

register_activation_hook( __FILE__, 'onCAUActivation' );
register_deactivation_hook( __FILE__, 'onCAUDeactivation' );

/***
* Generate the menu options to hide from the database
* 
*/
function onCAUActivation() {
    global $CAUdefaults;
    update_option('CAUoptions', $CAUdefaults);

}
/***
* Remove options from the database
* 
*/
function onCAUDeactivation() { delete_option('CAUoptions'); }

/*
===============================================================================

insert styles into <head>

===============================================================================
*/
/***
* Request stored options from db
* 
* @var mixed
*/
$CAUoptions = get_option('CAUoptions');

/*
===============================================================================

Clean Admin UI settings

===============================================================================
*/
/***
* Register for add_action hook
*/
add_action('admin_menu', 'clean_admin_ui_init', 1);

/***
* Add this plugin to the menu
* 
*/
function clean_admin_ui_init() {
    add_options_page('Clean Admin UI', 'Clean Admin UI', 'activate_plugins', 'clean-admin-ui', 'CAUoptions');

    clean_admin_ui_do_clean();
}

/***
* Actual cleanup function which removes the selected menu items
* 
*/
function clean_admin_ui_do_clean() {

    global $menu;

    $wp_version = explode('.', get_bloginfo('version'));
    if($wp_version[0] >= 3 && $wp_version[1] >= 1 ) {
        $legacy = false;
    } else {
        $legacy = true;
    }

    $CAUoptions = get_option('CAUoptions');

    foreach ($CAUoptions as $key => $value) {
        switch ($key) {
            case "show_menu_posts":
                if(!$value && !$legacy) {

                    remove_menu_page('edit.php');
                } elseif(!$value && $legacy) {
                    unset($menu[5]);
                }
                break;
            case "show_menu_media":
                if(!$value && !$legacy) {
                    remove_menu_page('upload.php');
                } elseif(!$value && $legacy) {
                    unset($menu[10]);
                }
                break;
            case "show_menu_page_links":
                if(!$value && !$legacy) {
                    remove_menu_page('link-manager.php');
                } elseif(!$value && $legacy) {
                    unset($menu[15]);
                }
                break;
            case "show_menu_pages":
                if(!$value && !$legacy) {
                    remove_menu_page('edit.php?post_type=page');
                } elseif(!$value && $legacy) {
                    unset($menu[20]);
                }
                break;
            case "show_menu_comments":
                if(!$value && !$legacy) {
                    remove_menu_page('edit-comments.php');    
                } elseif(!$value && $legacy) {
                    unset($menu[25]);
                }
                break;
            case "show_menu_tools":
                if(!$value && !$legacy) {
                    remove_menu_page('tools.php');    
                } elseif(!$value && $legacy) {
                    unset($menu[75]);
                }
                break;
            case "show_menu_users":
                if(!$value && !$legacy) {
                    remove_menu_page('users.php');    
                } elseif(!$value && $legacy) {
                    unset($menu[70]);
                }
                break;
            case "show_menu_themes":
                if(!$value && !$legacy) {
                    remove_menu_page('themes.php');    
                }
                break;
            case "show_menu_plugins":
                if(!$value && !$legacy) {
                    remove_menu_page('plugins.php');    
                }
                break;
            case "show_menu_dashboard":
                if(!$value && !$legacy) {
                    remove_the_dashboard();
                }
                break;
        }
    }
}

/***
* Generate a refresh link
* 
*/
function curPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

// borrowed from http://bavotasan.com/2008/hiding-the-wordpress-dashboard-for-non-admin-users/ original code by  Austin Matzko
// Modified by c.bavota of http://bavotasan.com for WordPress 2.7 and to allow the dashboard for Admins.
function remove_the_dashboard () {
    if (current_user_can('level_10') && false) {
        //return; apply to all
    } else {

        global $menu, $submenu, $user_ID;
        $the_user = new WP_User($user_ID);
        reset($menu); $page = key($menu);
        while ((__('Dashboard') != $menu[$page][0]) && next($menu))
            $page = key($menu);
        if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
        reset($menu); $page = key($menu);
        while (!$the_user->has_cap($menu[$page][1]) && next($menu))
            $page = key($menu);
        if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
            wp_redirect(get_option('siteurl') . '/wp-admin/post-new.php');
    }
}
/***
* Create and update the CAUoptions object based on POST condition
* 
*/
function CAUoptions() { ?>

    <?php
    $message = "";
    global $CAUdefaults;
    if (isset($_POST['submit'])) {
        if(isset($_POST['content'])) {
            $_POST['content'] = stripslashes($_POST['content']);
        }

        $CAUoptions = array();
        foreach ($CAUdefaults as $name => $value) {
            if(isset($_POST[$name])) {
                $CAUoptions[$name] = $_POST[$name];
            } else {
                $CAUoptions[$name] = "";
            }
        }


        update_option('CAUoptions', $CAUoptions);
        $message = '<div id="message" class="updated"><p>Clean Admin UI settings updated.</p>
        <p><h2 style="color:red">Click <a href="'. curPageURL() .'">here</a> to refresh</h2></p>
        </div>';
        clean_admin_ui_do_clean();
    } else {
        $CAUoptions = get_option('CAUoptions');
        if(!isset($CAUoptions['show_menu_plugins']) && !isset($CAUoptions['show_menu_themes']) && !isset($CAUoptions['db_version']) ) {
            // new options since 1.3
            update_option('CAUoptions', array_merge($CAUoptions, array('show_menu_plugins' => '1', 'show_menu_themes' => '1', 'db_version', '1.1', 'show_menu_dashboard' => '1')));
            $CAUoptions = get_option('CAUoptions');
        }
    }
    ?>

    <style type="text/css">
        .formField {
            width: 60%;
            padding: 5px 0px 10px 0px;
        }
        .form-table input[type="text"], .form-table textarea {
            width: 50%;
        }
        .form-table th {
            width: 150px;
        }
        #CAUcss {
            display: block;
            margin-top: 8px;
            width: 93%;
        }
    </style>

    <div class="wrap">

        <a href="http://www.arenddeboer.com/clean-admin-ui-a-new-wordpress-plugin-to-remove-admin-menu-items/" target="_blank"></a><h2>Clean Admin UI</h2>
        <?php print $message; ?>
        <p>Here you can select options for the Clean Admin UI plugin. </p>


        <form action="" method="post">

            <table class="form-table">

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_posts" <?php if ($CAUoptions['show_menu_posts']) {print 'checked="checked" ';} ?>/> Show <strong>Posts</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_media" <?php if ($CAUoptions['show_menu_media']) {print 'checked="checked" ';} ?>/> Show <strong>Media</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_page_links" <?php if ($CAUoptions['show_menu_page_links']) {print 'checked="checked" ';} ?>/> Show <strong>Page Links</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_pages" <?php if ($CAUoptions['show_menu_pages']) {print 'checked="checked" ';} ?>/> Show <strong>Pages</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_comments" <?php if ($CAUoptions['show_menu_comments']) {print 'checked="checked" ';} ?>/> Show <strong>Comments</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_users" <?php if ($CAUoptions['show_menu_users']) {print 'checked="checked" ';} ?>/> Show <strong>Users</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_tools" <?php if ($CAUoptions['show_menu_tools']) {print 'checked="checked" ';} ?>/> Show <strong>Tools</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_plugins" <?php if ($CAUoptions['show_menu_plugins']) {print 'checked="checked" ';} ?>/> Show <strong>Plugins</strong> menu entry.
                        </label>
                    </th>
                </tr>

                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_themes" <?php if ($CAUoptions['show_menu_themes']) {print 'checked="checked" ';} ?>/> Show <strong>Appearance</strong> menu entry.
                        </label>
                    </th>
                </tr>
                <tr>
                    <th scope="row" colspan="2" class="th-full">
                        <label>
                            <input type="checkbox" name="show_menu_dashboard" <?php if ($CAUoptions['show_menu_dashboard']) {print 'checked="checked" ';} ?>/> Show <strong>Dashboard</strong> menu entry.
                        </label>
                    </th>
                </tr>

            </table><!-- form-table -->

            <p class="submit"><input type="submit" class="button-primary" name="submit" value="Save Changes" /></p>

        </form>

    </div><!-- wrap -->

    <?php }

?>