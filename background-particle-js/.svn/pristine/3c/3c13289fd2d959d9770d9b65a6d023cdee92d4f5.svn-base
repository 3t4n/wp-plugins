<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die("Don't try to access directly :-(");
}
/**
* @param $page_title
* @param $menu_title
* @param $capability
* @param $menu_slug
* @param $function ( callback function )
* @param $icon_url
* @param $position
*
* Add ParticleJS item in the top level menu
*/

add_menu_page("ParticleJS Banner", "ParticleJS Banner", "manage_options", "particlejs-banner", "maher_particlejs_main_menu", "dashicons-calendar", 21);

add_submenu_page( 'particlejs-banner', 'Additional Information', 'Additional Info', 'manage_options', 'theme-op-settings', 'maher_particlejs_submenu');