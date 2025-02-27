<?php
/**
 * The plugin file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              developress.it/roberto_paolucci
 * @since             2.1.7
 * @package           developress_sticky_footer_bar
 *
 * @wordpress-plugin
 * Plugin Name:       DeveloPress Sticky Footer Bar
 * Plugin URI:        https://developress.it
 * Description:       Create a footer bar, fixed to the scroll, which contains menu items. The goal is to provide a menu-level user experience similar to apps. The configuration is very simple and the customization extensive without programming knowledge.
 * Version:           2.1.7
 * Author:            Roberto Paolucci - DeveloPress.it
 * Author URI:        developress.it/roberto_paolucci
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       developress_sticky_footer_bar

 */

require_once plugin_dir_path(__FILE__) . 'activation_hook.php';
require_once plugin_dir_path(__FILE__) . 'admin-settings.php';
require_once plugin_dir_path(__FILE__) . 'admin-form.php';
require_once plugin_dir_path(__FILE__) . 'FontAwesome.php';

register_activation_hook(__FILE__, 'developress_sticky_footer_bar_activate');


// Function to show option values ​​in the footer
function mostra_valori_opzioni_footer() {
    $active_stiky_bar = get_option('active_stiky_bar');
    $background_bar = get_option('background_bar');
    $number_items_first_menu = get_option('number_items_first_menu');
    $font_color = get_option('font_color');
    $font_size = get_option('font_size');
    $font_size_other_label = get_option('font_size_other_label');
    $translation_close_link = get_option('translation_close_link');
    $translation_menu_link = get_option('translation_menu_link');
    $icon_size = get_option('icon_size');
    $visibility = get_option('visibility');
    $display_menu_right_left = get_option('display_menu_right_left');	
    $custom_css = get_option('custom_css');
    $menu_select = get_option('menu_select');

    if ($active_stiky_bar == 1) {
      $hyde_bar = "";

  }else {
      $hyde_bar = "none";
  }
  
$menu_locations = get_nav_menu_locations(); // Get all menu locations
$menu_id = $menu_locations['stikybar']; // Get the menu ID at location 'stikybar'
if ($menu_id) {
    $menu_items = wp_get_nav_menu_items($menu_id); // Get the menu items from the menu ID
    if ($menu_items) {
        if (count($menu_items) < 5) {
            echo '<style>.sidebar-icon-menu { display:none !important; }</style>';
        }
    } else {
       // Any code to run if there are no menu items
    }
} else {
    // Any code to run if the menu ID was not found
}

require_once plugin_dir_path(__FILE__) . 'footer-bar.php';

}

require_once plugin_dir_path(__FILE__) . 'footer.php';

function developress_sticky_footer_bar_aggiungi_link_impostazioni($links) {

    $impostazioni_link = '<a href="' . admin_url('options-general.php?page=stickybar-settings') . '">' . esc_html__( 'Settings', 'developress_sticky_footer_bar' ) . '</a>';

    array_unshift($links, $impostazioni_link);
    return $links;
}

// Added link to plugin options page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'developress_sticky_footer_bar_aggiungi_link_impostazioni');

// Carica i file di traduzione
function load_traslate_file() {
    load_plugin_textdomain( 'developress_sticky_footer_bar', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'load_traslate_file' );


?>