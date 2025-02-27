<?php
/*
Plugin Name: PTA Shortcodes
Plugin URI: https://stephensherrardplugins.com
Description: Easily generate shortcodes for the PTA plugins from Stephen Sherrard Plugins.  This plugin ONLY works with version 4 of the TinyMCE visual editor included in Wordpress 3.9 and later.
Author: Stephen Sherrard
Version: 1.5.0
Author URI: https://stephensherrardplugins.com
*/

add_action('admin_head', 'ssplugins_add_pta_button');

function ssplugins_add_pta_button() {
    global $typenow;
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    if( ! in_array( $typenow, array( 'post', 'page', 'member' ) ) )
        return;

    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "ssplugins_add_tinymce_plugin");
        add_filter('mce_buttons', 'ssplugins_register_pta_button');
    }
}

function ssplugins_add_tinymce_plugin($plugin_array) {
    $plugin_array['ssplugins_tc_button'] = plugins_url( '/pta-shortcodes-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function ssplugins_register_pta_button($buttons) {
   array_push($buttons, "ssplugins_tc_button");
   return $buttons;
}