<?php
function woodecor_options_page()
{
    add_menu_page(
        'Auto-chat',
        'AutoChat',
        'manage_options',
        'chat_message',
        'woodecor_submenu_page_html',
        plugin_dir_url(PCH_FILE) . 'assets/images/logo.png'
    );
    // Add a sub-menu page
    // add_submenu_page(
    //     'chat_message', // parent slug (the menu slug you used in add_menu_page)
    //     'Submenu Page',
    //     'All Messages',
    //     'manage_options',
    //     'chat_message',
    //     'woodecor_submenu_page_html'
    // );
    add_submenu_page(
        'chat_message', // parent slug (the menu slug you used in add_menu_page)
        'Submenu Page',
        'Presets',
        'manage_options',
        'preset_chat',
        'woodecor_submenu_page_html'
    );

    add_submenu_page(
        'chat_message', // parent slug (the menu slug you used in add_menu_page)
        'Submenu Page',
        'Integrations',
        'manage_options',
        'chat_integration',
        'autochat_integration_page_html'
    );
    add_submenu_page(
        'chat_message', // parent slug (the menu slug you used in add_menu_page)
        'Submenu Page',
        'Settings',
        'manage_options',
        'chat_settings',
        'autochat_settings_page_html'
    );
}


/**
 * Register our woodecor_options_page to the admin_menu action hook.
 */
add_action('admin_menu', 'woodecor_options_page');
/**
 * Top level menu callback function
 */
function woodecor_options_page_html()
{
?>
    <h1>All Messages</h1>
<?php
}
