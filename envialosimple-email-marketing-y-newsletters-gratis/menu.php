<?php
// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'es_add_item_menu' );

// Add a new top level menu link to the ACP
function es_add_item_menu() {
    global $lang;

    add_menu_page(
        $lang['globals']['titlePlugin'], // Title of the page
        $lang['globals']['titlePlugin'], // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'es-plugin',
        'es_plugin_page_home',
        plugin_dir_url( __FILE__ ).'assets/img/logo.svg'
    );

    add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['welcome'], $lang['menu']['welcome'], 'manage_options','es-plugin', 'es_plugin_page_home');
    add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['config'], $lang['menu']['config'], 'manage_options','es-plugin-config', 'es_plugin_page_config');
    
    $apiKey = get_option('es_config_apikey');

    if(!empty($apiKey)) {
        //campaigns
        add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['campaigns'], $lang['menu']['campaigns'], 'manage_options','es-plugin-campaigns', 'es_plugin_page_campaigns');
        add_submenu_page('es-plugin-campaigns', $lang['globals']['titlePlugin']." - ".$lang['menu']['campaigns']." - ".$lang['globals']['create'], $lang['globals']['create'], 'manage_options','es-plugin-campaigns-create', 'es_plugin_page_campaigns_create');
        add_submenu_page('es-plugin-campaigns', $lang['globals']['titlePlugin']." - ".$lang['menu']['campaigns']." - ".$lang['globals']['edit'], $lang['globals']['edit'], 'manage_options','es-plugin-campaigns-edit', 'es_plugin_page_campaigns_edit');
        
        //mailLists
        add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['listContacts'], $lang['menu']['listContacts'], 'manage_options','es-plugin-maillists', 'es_plugin_page_maillists');
        add_submenu_page('es-plugin-maillists', $lang['globals']['titlePlugin']." - ".$lang['menu']['listContacts']." - ".$lang['globals']['create'], $lang['globals']['create'], 'manage_options','es-plugin-maillists-create', 'es_plugin_page_maillists_create');
        add_submenu_page('es-plugin-maillists', $lang['globals']['titlePlugin']." - ".$lang['menu']['listContacts']." - ".$lang['globals']['edit'], $lang['globals']['edit'], 'manage_options','es-plugin-maillists-edit', 'es_plugin_page_maillists_edit');
        
        //contacts
        add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['contacts'], $lang['menu']['contacts'], 'manage_options','es-plugin-contacts', 'es_plugin_page_contacts');
        add_submenu_page('es-plugin-contacts', $lang['globals']['titlePlugin']." - ".$lang['menu']['contacts']." - ".$lang['globals']['create'], $lang['globals']['create'], 'manage_options','es-plugin-contacts-create', 'es_plugin_page_contacts_create');
        add_submenu_page('es-plugin-contacts', $lang['globals']['titlePlugin']." - ".$lang['menu']['contacts']." - ".$lang['globals']['edit'], $lang['globals']['edit'], 'manage_options','es-plugin-contacts-edit', 'es_plugin_page_contacts_edit');
        
        //contact form 7
        if(is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
            add_submenu_page('es-plugin', $lang['globals']['titlePlugin']." - ".$lang['menu']['contactForm7'], $lang['menu']['contactForm7'], 'manage_options','es-plugin-contactform7', 'es_plugin_page_contactform7');
            add_submenu_page('es-plugin-contactform7', $lang['globals']['titlePlugin']." - ".$lang['menu']['contactForm7'], $lang['menu']['contactForm7']." - ".$lang['globals']['create'], 'manage_options','es-plugin-contactform7-create', 'es_plugin_page_contactform7_create');
            add_submenu_page('es-plugin-contactform7', $lang['globals']['titlePlugin']." - ".$lang['menu']['contactForm7'], $lang['menu']['contactForm7']." - ".$lang['globals']['edit'], 'manage_options','es-plugin-contactform7-edit', 'es_plugin_page_contactform7_edit');
        }
    }
}