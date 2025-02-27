<?php
// Add a settings page under the Plugins menu
function rfc_add_admin_menu() {
    add_plugins_page(
        __('Fresh Plugins', 'textdomain'), // Page title
        __('Fresh Plugins', 'textdomain'), // Menu title
        'manage_options',                  // Capability
        'fresh-plugins',                   // Menu slug
        'rfc_plugins_fresh_install_page'   // Callback function to render the page
    );
}
add_action('admin_menu', 'rfc_add_admin_menu');