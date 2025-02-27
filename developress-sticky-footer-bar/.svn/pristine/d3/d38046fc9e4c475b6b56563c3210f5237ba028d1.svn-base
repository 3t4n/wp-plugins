<?php
// Function to create the options page
function crea_pagina_opzioni() {
    add_submenu_page(
        'options-general.php', // Parent menu slug
        esc_html__( 'StickyBar Settings', 'developress_sticky_footer_bar' ), // Page title
        esc_html__( 'StickyBar Settings', 'developress_sticky_footer_bar' ), // Menu text
        'manage_options', // Ability required to access the page
        'stickybar-settings', // Page slug
        'mostra_pagina_opzioni' // Function that displays the contents of the page
    );
}
add_action('admin_menu', 'crea_pagina_opzioni');

// create a menu position 

// Function to record custom position "Stikybar"
function registra_posizione_stikybar() {
    register_nav_menu('stikybar', 'Stikybar'); // Register the location "Stikybar" with the name "Stikybar"
}
add_action('after_setup_theme', 'registra_posizione_stikybar');

// Function to register options
function registra_opzioni_tema() {
    register_setting(
        'stickybar-settings', // Name of the option group
        'active_stiky_bar' // Name of the option
    );
    register_setting(
        'stickybar-settings',
        'background_bar'
    );
    register_setting(
        'stickybar-settings',
        'font_color'
    );
    register_setting(
        'stickybar-settings',
        'font_size'
    );
    register_setting(
        'stickybar-settings',
        'font_size_other_label'
    );
    register_setting(
        'stickybar-settings',
        'translation_close_link'
    );

    register_setting(
        'stickybar-settings',
        'translation_menu_link'
    );
    register_setting(
        'stickybar-settings',
        'icon_size'
    );
    register_setting(
      'stickybar-settings',
      'number_items_first_menu'
  );

    register_setting(
        'stickybar-settings',
        'visibility'
    );

    register_setting(
        'stickybar-settings',
        'custom_css'
    );
    register_setting(
        'stickybar-settings',
        'menu_select'
    );
}
add_action('admin_init', 'registra_opzioni_tema');