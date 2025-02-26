<?php


/* Plaugin activation hooks */
if (!function_exists('aafa_auth_activate')) {
    function aafa_auth_activate()
    {
        aafa_register_default_style();
    }
}
register_activation_hook(AAFA_PLUGIN_FILE, 'aafa_auth_activate');

if (!function_exists('aafa_register_default_style')) {
    function aafa_register_default_style()
    {
        $config = array();
        $config = array(
            // continew with phone number 
            'fa_button' => '#ffffff',
            'fa_button_hover' => '#ffffff ',
            'fa_button_text' => '#000000',
            'fa_button_text_hover' => '#000000',
            'fa_button_border' => 'transparent',
            'fa_button_border_hover' => '#000000',
            'fa_button_shadow' => 'transparent',
            'fa_button_shadow_hover' => 'rgba(0, 0, 0, 0.3)',
            // model popup design
            'fa_pop_button' => '#000000',
            'fa_pop_button_hover' => 'transparent',
            'fa_pop_button_text' => '#ffffff',
            'fa_pop_button_text_hover' => '#000000',
            'fa_pop_button_border' => 'transparent',
            'fa_pop_button_border_hover' => '#000000',
            'fa_pop_button_shadow' => 'transparent',
            'fa_pop_button_shadow_hover' => 'transparent',
            // other model things
            'fa_popup_bg' => '#ffffff',
            'fa_popup_text' => '#000000',
            'fa_popup_error' => '#FF0000',
            'fa_popup_success' => '#008E00',
            'fa_popup_loader' => '#000000',
            'fa_popup_loader_border' => '#ffffff',
        );
        update_option('fa_style_config', $config);
    }
}
