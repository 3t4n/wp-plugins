<?php
/**
 * @package as-login
 * @version 1.1
 * @licence GPLv2
 */

/*
Plugin Name: AS login
Plugin URI: https://wordpress.org/plugins/as-login/
Description: AS login you can fully customize wordpress login page.
Author: anuislam
Version: 1.1
Author URI: http://anuislamshohag.tk
*/

/*  Copyright 2015  anuislam  (email : anuislams@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 1, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



define( 'as_login_path', plugin_dir_path( __FILE__ ) );
function as_login_admin_menu(){
    $icon_url = plugins_url('inc/admin-ico.png', __FILE__);
    add_menu_page( 'As login', 'As options', 'manage_options', 'as_options', 'as_login_display_menu', $icon_url, 100 );
}
add_action('admin_menu','as_login_admin_menu');

function as_admin_login_css(){
wp_enqueue_style( 'as_login_css', plugins_url( 'css/as-admin-login.css', __FILE__ ) );
wp_register_script( 'as_login_js', plugins_url( 'js/as_login_js.js', __FILE__ ), 'jquery', 1.0, true );

wp_enqueue_script('jquery');
wp_enqueue_media();
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script('wp-color-picker');
wp_enqueue_script('as_login_js');
}

add_action( 'admin_enqueue_scripts', 'as_admin_login_css' );


require_once( as_login_path . '/inc/as-opt-functions.php' );
require_once( as_login_path . '/inc/as-functions.php' );


function as_login_display_menu(){
?>

<div class="wrap" style="position:relative;overflow: hidden;">
    <div class="my_status_main">
        <div class="my_status_main_inner">
            <span class="as_click_hide"><img src="<?php echo plugins_url( 'inc/right.png', __FILE__ ); ?>" alt=""></span>
            <span class="as_click_show"><img src="<?php  echo plugins_url( 'inc/right.png', __FILE__ ); ?>" alt=""></span>
            <ul class="as_url">
                <li><span>See on my other plugins</span> <a target="_blank" href="https://wordpress.org/plugins/as-woocommerce-with-owl-carousel/"><img  class="fiverr" src="<?php  echo plugins_url( 'inc/wordpress.png', __FILE__ ); ?>" alt=""></a></li>
                <li><span>See on my Fiverr profile</span> <a target="_blank" href="https://www.fiverr.com/anuislam"><img  class="fiverr" src="<?php  echo plugins_url( 'inc/fiverr.png', __FILE__ ); ?>" alt=""></a></li>
                <li><span>See on my PeoplePerhour profile</span> <a target="_blank" href="http://www.peopleperhour.com/freelancer/anu-islam/web-design-wordpress-wordpress-pl/910027"><img class="github" src="<?php  echo plugins_url( 'inc/People.png', __FILE__ ); ?>" alt=""></a></li>

                <li><span>See on my GitHub repository</span> <a target="_blank" href="https://github.com/anuislam"><img class="github" src="<?php  echo plugins_url( 'inc/github.png', __FILE__ ); ?>" alt=""></a></li>
            </ul>
        </div>
    </div>
    <h2>As login options</h2>
    <?php settings_errors(); ?>
    <form action="options.php" method="POST">
    <?php do_settings_sections('as_logins'); ?>
    <?php settings_fields('as_login_section'); ?>
    <?php submit_button(); ?>
    </form>
</div>

<?php
}