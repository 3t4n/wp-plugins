<?php

// This function uploades css.

// include css
if (!function_exists('amJL_add_css')){
    function amJL_add_css(){
        wp_register_style('amJL_checkbox_style', autoMakingJSONLD_url.'src/css/checkbox.css');
        wp_register_style('amJL_recipe_style', autoMakingJSONLD_url.'src/css/recipe.css');
        wp_register_style('amJL_setting_style', autoMakingJSONLD_url.'src/css/setting_page.css');
        wp_register_style('amJL_list_style', autoMakingJSONLD_url.'src/css/BL_list.css');
        wp_register_style('amJL_form_view_style', autoMakingJSONLD_url.'src/css/form_view.css');

        wp_enqueue_style('amJL_checkbox_style');
        wp_enqueue_style('amJL_recipe_style');
        wp_enqueue_style('amJL_setting_style');
        wp_enqueue_style('amJL_list_style');
        wp_enqueue_style('amJL_form_view_style');

    }
    add_action('admin_init', 'amJL_add_css');
}