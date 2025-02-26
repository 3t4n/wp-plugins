<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	require_once( ADDONP_PLUGIN_PATH . 'core/pages/settings.php' );

	function addon_menu() {
		global $addon_settings;


		$menu_title         =   'AddonPayments';
	    $capability         =   'manage_options';
	    $menu_slug          =   'addonpayments-settings';
	    $function           =   'addonp_register_settings_submenu_page_callback';
	    $icon_url           =   NULL;
	    $position           =   NULL;

	    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

			add_action('admin_menu', 'addonp_register_settings_submenu_page');
			$addon_settings = add_submenu_page(
						        $menu_slug,
						        'AddonPayments',
						        'AddonPayments',
						        $capability,
						        'addonpayments-settings',
						        'addonp_register_settings_submenu_page_callback'
						    );
			$addon_orders   = add_submenu_page(
								$menu_slug,
								__( 'Orders', 'addonpayments' ),
								__( 'Orders',   'addonpayments' ),
								$capability,
								'edit.php?post_type=addonp_orders'
							);

		add_action("admin_print_scripts-$addon_settings", 'addonp_custom_settings_load_js' );

	}

	add_action('admin_menu', 'addon_menu');

	function addon_menu_hierarchy_correction( $parent_file ) {

    global $current_screen, $parent_file, $self;

    $current = $current_screen->post_type;


    if ( 'addonp_orders' == $current_screen->post_type  ) {
        // Do something in the edit screen of this post type
        $parent_file = 'addonpayments-settings';
    }

    // return $parent_file;
    return $parent_file;

}
add_filter( 'parent_file', 'addon_menu_hierarchy_correction' );

function addon_load_custom_icon_styles() {
    wp_register_style(  'addon_dashicons', ADDONP_PLUGIN_URL . 'assets/css/menu.css', false, ADDONP_VERSION );
    wp_enqueue_style(   'addon_dashicons' );
    }
add_action( 'admin_enqueue_scripts', 'addon_load_custom_icon_styles' );