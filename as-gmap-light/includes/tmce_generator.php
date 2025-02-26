<?php 
add_action('admin_head', 'AS_google_map_my_tc_button');

function AS_google_map_my_tc_button() {
    global $typenow;

    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }

    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "AS_google_map_add_tinymce_plugin");
        add_filter('mce_buttons', 'AS_google_map_register_tc_button');
    }
}

function AS_google_map_add_tinymce_plugin($plugin_array) {
    $plugin_array['AS_google_map_tc_button'] = plugins_url( '../js/text-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function AS_google_map_register_tc_button($buttons) {
   array_push($buttons, "AS_google_map_tc_button");
   return $buttons;
}

function AS_google_map_tc_css() {
    wp_enqueue_style('gavickpro-tc', plugins_url('../css/admin-style.css', __FILE__));
}
 
add_action('admin_enqueue_scripts', 'AS_google_map_tc_css');

