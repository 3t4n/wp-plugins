<?php
/**
 * Plugin name: Multilocation Google Map
 * Description: Multilocation Google Map is free plugin that allows you to set your own Google map with multiple locations with all Google map options included.
 * Version: 1.3
 * Author: Miroslav Nedelchev
 * Author URI: https://mnedelchev.me/
 */
require_once( ABSPATH . "wp-includes/pluggable.php" );

if(!is_admin()) {
    add_action('wp_footer', 'mgm_add_plugin_dir');
    function mgm_add_plugin_dir()   {
        echo "<div class='mgm_multilocation-google-map-plugin-dir' id=" .  plugin_dir_url( __FILE__ ) . "></div>";
    }
}

//Style and script
require_once (plugin_dir_path(__FILE__) . 'styles_and_scripts.php');
//Custom post type
require_once (plugin_dir_path(__FILE__) . 'locations-post-types.php');
//Custom meta boxes
require_once (plugin_dir_path(__FILE__) . 'add-location-fields.php');
//Collect locations
require_once (plugin_dir_path(__FILE__) . 'collect-locations.php');
//Submenu(map options) callback
require_once (plugin_dir_path(__FILE__) . 'map-options.php');
//Shortcode
require_once (plugin_dir_path(__FILE__) . 'shortcode.php');


function mgm_add_map_options_submenu(){
    add_submenu_page(
        'edit.php?post_type=location',
        'Map Options',
         'Map Options',
         'manage_options',
         'map_options',
         'map_options_page_html'
    );
}

/**
 * register our wporg_options_page to the admin_menu action hook
 */
add_action('admin_menu', 'mgm_add_map_options_submenu');

function wcdp_admin_notice_about_not_having_main_wallet_address_saved() {
    $options = get_option('mgm_map_key_options');
    if (empty($options) || (is_array($options) && array_key_exists('map_key_field_pill', $options) && empty($options['map_key_field_pill']))) {
        ?>
        <div class="notice notice-error is-dismissible">
            <p>Plugin <b>Multilocation Google Map</b> will not be able to visualize google map until you enter your Google key. You can achieve this by navigating to Locations tab in the Wordpress menu and then head to Map Options.</p>
        </div>
        <?php
    } else {
        $args = array(
            'post_type' => 'location'
        );
        $location_list = new WP_Query($args);
        if (empty($location_list->get_posts())) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>Your <b>Multilocation Google Map</b> is ready to be visualized you just need to enter your first map location. You can achieve this by navigating to Locations tab in the Wordpress menu and then head to Add New.</p>
            </div>
            <?php
        }
    }
}
add_action('admin_notices', 'wcdp_admin_notice_about_not_having_main_wallet_address_saved');
?>
