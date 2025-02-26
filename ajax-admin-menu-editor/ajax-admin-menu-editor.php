<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://lukehertzler.com/aame
 * @since             1.0
 * @package           AJAX_Admin_Menu_Editor
 *
 * @wordpress-plugin
 * Plugin Name:       AJAX Admin Menu Editor
 * Plugin URI:        http://lukehertzler.com
 * Description:       Easily organize and re-order your admin menu items with simple drag & drop. Every admin can save their own unique menu settings according to their preference.
 * Version:           1.0.0
 * Author:            Luke Hertzler
 * Author URI:        http://lukehertzler.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajax-admin-menu-editor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/* Actions */

add_action('wp_ajax_update_menu_positions', 'aame_update_menu_positions');
add_action('wp_ajax_aame_register_sep', 'aame_register_sep');
add_action('admin_enqueue_scripts', 'aame_admin_enqueues');

/* Filters */

add_filter('custom_menu_order', 'aame_custom_menu_order');
add_filter('menu_order', 'aame_custom_menu_order');

/* Troublshooting */

    function dump_admin_menu() {
      if (is_admin()) {
        header('Content-Type:text/plain');
        var_dump($GLOBALS['menu']);
        exit;
      }
    }
    //add_action('admin_init','dump_admin_menu', 99);

/* Functions */

function aame_update_menu_positions() {
		// str_replace to support custom added menu items.
		$menu_positions = sanitize_text_field(str_replace('admin.php?page=', '', $_REQUEST['menu_item_positions']));
		if( preg_match('/[\'^£$%*()}{@#~><>|¬]/', $menu_positions) ) {
			wp_die();
		}

    update_user_meta(get_current_user_id(), get_current_blog_id() . '_aame_menu_positions', esc_attr($menu_positions));
}

function aame_admin_enqueues() {
    wp_enqueue_style( 'aame-admin', plugins_url('css/aame-admin.css', __FILE__), array(), '1.0' );

    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('aame_admin', plugins_url('/js/aame-admin.js', __FILE__), array('jquery-ui-sortable'));
}

function aame_custom_menu_order($menu_order) {
    if (!$menu_order)
        return true;

    $new_menu_order = get_user_meta(get_current_user_id(), get_current_blog_id() . '_aame_menu_positions', true);

    if ($new_menu_order) {
        $new_menu_order = explode(',', $new_menu_order);
        return $new_menu_order;
    } else {
        return $menu_order;
    }
}

/* Register Admin Menu Seperator(s) */
function add_admin_menu_separators() {
  global $menu;

  // Generate instance separator counts
  $seps    = 0;
  foreach($menu as $offset => $section) {
    if (substr($section[2],0,9)==='separator') { $seps++; }
  }

  // Get user menu
  $new_menu_order = get_user_meta(get_current_user_id(), get_current_blog_id() . '_aame_menu_positions', true);
  $new_menu_order = explode(',', $new_menu_order);

  // Check if there's additional separators and register if so
  foreach($new_menu_order as $key => $item){
    if(substr( $item,0,9 ) === 'separator'){
      $seps++;
      $menu[$key] = array(
        '',
        'read',
        "separator{$seps}",
        '',
        'wp-menu-separator'
      );
    }
  }

}
add_action('admin_init', 'add_admin_menu_separators');
?>
