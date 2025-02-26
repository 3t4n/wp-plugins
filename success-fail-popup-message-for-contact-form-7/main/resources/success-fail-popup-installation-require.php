<?php 
// Error returns when contact form 7 is not installed
add_action('admin_init', 'SFPMCF7_check_plugin_state');
function SFPMCF7_check_plugin_state(){
    if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
        set_transient( get_current_user_id() . 'sfpmcf7error', 'message' );
    }
}

// Use for Show backend notice
add_action( 'admin_notices', 'SFPMCF7_show_notice');
function SFPMCF7_show_notice() {
    if ( get_transient( get_current_user_id() . 'sfpmcf7error' ) ) {

        deactivate_plugins( SFPMCF7_BASE_NAME );

        delete_transient( get_current_user_id() . 'sfpmcf7error' );

        echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=contact+form+7">Contact Form 7</a> plugin installed and activated.</p></div>';
    }
}