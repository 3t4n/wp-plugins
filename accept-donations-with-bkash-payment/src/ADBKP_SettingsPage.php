<?php

namespace AcceptDonationBKash;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ADBKP_SettingsPage {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    /**
     * Add the settings page under the WordPress admin menu.
     */
    public function add_settings_page() {
        add_menu_page(
            esc_html__( 'bKash Donation Settings', 'accept-donations-with-bkash-payment' ),
            esc_html__( 'bKash Donation', 'accept-donations-with-bkash-payment' ),
            'manage_options',
            'adbkp-donation-settings', // Unique slug with prefix
            [ $this, 'render_settings_page' ],
            'dashicons-money-alt'
        );

        // Enqueue admin styles only on the settings page
        add_action( 'admin_enqueue_scripts', function( $hook ) {
            if ( $hook === 'toplevel_page_adbkp-donation-settings' ) { // Match the unique slug
                wp_enqueue_style(
                    'adbkp-admin-styles',
                    plugin_dir_url( __FILE__ ) . '../assets/css/admin-style.css',
                    [],
                    '1.0.0'
                );
            }
        } );
    }

    /**
     * Register settings with sanitization callbacks.
     */
    public function register_settings() {
        register_setting( 'adbkp_settings_group', 'adbkp_app_secret', [ 'sanitize_callback' => 'sanitize_text_field' ] );
        register_setting( 'adbkp_settings_group', 'adbkp_username', [ 'sanitize_callback' => 'sanitize_text_field' ] );

        // Use sanitize callback for boolean (checkbox)
        register_setting( 'adbkp_settings_group', 'adbkp_sandbox_mode', [ 'sanitize_callback' => [ $this, 'sanitize_checkbox' ] ] );

        register_setting( 'adbkp_settings_group', 'adbkp_password', [ 'sanitize_callback' => 'sanitize_text_field' ] );
        register_setting( 'adbkp_settings_group', 'adbkp_app_key', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    }

    /**
     * Sanitize checkbox input.
     *
     * @param mixed $input Input value.
     * @return string Sanitized checkbox value.
     */
    public function sanitize_checkbox( $input ) {
        return $input === '1' ? '1' : '0';
    }

    /**
     * Render the settings page.
     */
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'bKash Donation Settings', 'accept-donations-with-bkash-payment' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'adbkp_settings_group' );
                do_settings_sections( 'adbkp_settings_group' );
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Sandbox Mode', 'accept-donations-with-bkash-payment' ); ?></th>
                        <td>
                            <label class="toggle-switch">
                                <input type="checkbox" name="adbkp_sandbox_mode" value="1"
                                    <?php checked( 1, get_option( 'adbkp_sandbox_mode', true ) ); ?> />
                                <span class="slider"></span>
                            </label>
                            <p class="description"><?php esc_html_e( 'Enable sandbox mode for testing purposes. When enabled, transactions will be processed in a sandbox environment.', 'accept-donations-with-bkash-payment' ); ?></p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'bKash Username', 'accept-donations-with-bkash-payment' ); ?></th>
                        <td>
                            <input type="text" name="adbkp_username" value="<?php echo esc_attr( get_option( 'adbkp_username', '' ) ); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'bKash Password', 'accept-donations-with-bkash-payment' ); ?></th>
                        <td>
                            <input type="password" name="adbkp_password" value="<?php echo esc_attr( get_option( 'adbkp_password', '' ) ); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'App Key', 'accept-donations-with-bkash-payment' ); ?></th>
                        <td>
                            <input type="text" name="adbkp_app_key" value="<?php echo esc_attr( get_option( 'adbkp_app_key', '' ) ); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'App Secret', 'accept-donations-with-bkash-payment' ); ?></th>
                        <td>
                            <input type="password" name="adbkp_app_secret" value="<?php echo esc_attr( get_option( 'adbkp_app_secret', '' ) ); ?>" class="regular-text" />
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
