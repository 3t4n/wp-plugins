<?php
/**
 * Advamentor Admin Options
 *
 * @since      1.0
 * @package    Advamentor
 * @author     Themexa
 */

/*
 * Add Admin Menu Page
 */

add_action( 'admin_menu', 'advamentor_admin_menu_page', 200 );
function advamentor_admin_menu_page() {
    $parent_slug = 'elementor';
    $page_title = __( 'Advamentor', 'advamentor' );
    $menu_title = '<span class="dashicons dashicons-tagcloud"></span> ' .__( 'Advamentor', 'advamentor' );
    $capability = 'manage_options';
    $menu_slug = 'advamentor';
    $function = 'advamentor_admin_menu_page_display';
    global $advamentor_admin_menu_page;
    $advamentor_admin_menu_page = add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
}

/*
 * Admin Menu Page Output
 */

function advamentor_admin_menu_page_display() {

	if ( !current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized user' );
    }

    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/templates/admin.php';
}
