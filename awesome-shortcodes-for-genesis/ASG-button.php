<?php

function asg_buttons() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( "mce_external_plugins", "asg_add_buttons" );
        add_filter( 'mce_buttons', 'asg_register_buttons' );
    }
}
function asg_add_buttons( $plugin_array ) {
    $plugin_array['asg_shortcodes'] = plugins_url('asg-plugin.js',__FILE__);
    return $plugin_array;
}
function asg_register_buttons( $buttons ) {
    array_push( $buttons, 'asg_shortcodes' ); // Shortcodes
    return $buttons;
}

function asg_admin_css() {
	wp_enqueue_style('asg_admin', plugins_url('/asg_admin.css', __FILE__)); //admin css
}
?>