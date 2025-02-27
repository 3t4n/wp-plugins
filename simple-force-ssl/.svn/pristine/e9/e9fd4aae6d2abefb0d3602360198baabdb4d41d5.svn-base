<?php
/*
Plugin Name:  Simple Force SSL
Plugin URI: http://wordpress.org/plugins/simple-force-ssl/
Description: Using this plugin you can force a site to load over ssl. It redirects the user to the https version of the website.
Author: Mohit Agarwal
Version: 2.0
Author URI: https://simpleproplugins.com/
Stable tag: "trunk"
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Simple Force SSL is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Simple Force SSL is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Simple Force SSL. If not, see http://www.gnu.org/licenses/gpl-2.0.html
*/




/**
 * @package Simple Force SSL
 * @version 2.0
 */
 
 
 
function me_simple_force_ssl() {
    // Check if SSL enforcement is enabled and the site is not already using SSL
    if ( get_option( 'me_simple_force_ssl_enabled', true ) && ! is_ssl() ) {
        $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/';
        wp_redirect( home_url( $request_uri, 'https' ), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'me_simple_force_ssl', 1 );

// Register the option on plugin activation
function me_simple_force_ssl_activate() {
    add_option( 'me_simple_force_ssl_enabled', true );
}
register_activation_hook( __FILE__, 'me_simple_force_ssl_activate' );

// Cleanup on plugin deactivation
function me_simple_force_ssl_deactivate() {
    delete_option( 'me_simple_force_ssl_enabled' );
}
register_deactivation_hook( __FILE__, 'me_simple_force_ssl_deactivate' );

// Add settings page under Tools menu
function me_simple_force_ssl_settings_menu() {
    add_management_page(
        __( 'Simple Force SSL Settings', 'simple-force-ssl' ),
        __( 'Simple Force SSL', 'simple-force-ssl' ),
        'manage_options',
        'me-simple-force-ssl',
        'me_simple_force_ssl_settings_page'
    );
}
add_action( 'admin_menu', 'me_simple_force_ssl_settings_menu' );

// Render settings page
function me_simple_force_ssl_settings_page() {
    if ( isset( $_POST['me_simple_force_ssl_save'] ) ) {
        check_admin_referer( 'me_simple_force_ssl_save', 'me_simple_force_ssl_nonce' );

        $enabled = isset( $_POST['me_simple_force_ssl_enabled'] ) ? 1 : 0;
        update_option( 'me_simple_force_ssl_enabled', $enabled );

        echo '<div class="updated"><p>' . __( 'Settings saved.', 'simple-force-ssl' ) . '</p></div>';
    }

    $enabled = get_option( 'me_simple_force_ssl_enabled', true );
    ?>
    <div class="wrap">
        <h1><?php _e( 'Simple Force SSL Settings', 'simple-force-ssl' ); ?></h1>
        <form method="post" action="">
            <?php wp_nonce_field( 'me_simple_force_ssl_save', 'me_simple_force_ssl_nonce' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php _e( 'Enable Force SSL', 'simple-force-ssl' ); ?></th>
                    <td><input type="checkbox" id="me_simple_force_ssl_enabled" name="me_simple_force_ssl_enabled" value="1" <?php checked( $enabled, 1 ); ?> />
					<label for="me_simple_force_ssl_enabled"><?php _e( 'Redirect all traffic to HTTPS.', 'simple-force-ssl' ); ?></label>

                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="me_simple_force_ssl_save" class="button-primary" value="<?php _e( 'Save Changes', 'simple-force-ssl' ); ?>" />
            </p>
        </form>
    </div>
    <?php
}