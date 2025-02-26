<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//
//
function AATIWPF_menu_setup() {
add_menu_page(
    'All @ Internet Security settings', // Page title
    'WP Finetuning ', // Menu title
    'manage_options', // Capability required to access the menu
    'AATIWPF-menu', // Menu slug
    'AATIWPF_menu_callback', // Function to output the content for the page
    'dashicons-admin-generic', // The icon for the menu item
    53 // Menu position (optional)
	);
}
add_action('admin_menu', 'AATIWPF_menu_setup');