<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class ASBFG_Admin_Settings {

    public function __construct() {
        add_filter( 'gform_settings_menu', [ $this, 'add_asbfg_submission_blocker_menu' ] );
        add_action( 'gform_settings_asbfg_submission_blocker', [ $this, 'asbfg_render_settings_page' ] );
        add_action( 'admin_init', [ $this, 'asbfg_register_settings' ] );
    }

    public function add_asbfg_submission_blocker_menu( $menu_items ) {
        $menu_items[] = [
            'name'  => 'asbfg_submission_blocker',
            'label' => 'Submission Blocker',
            'icon'  => 'dashicons-shield-alt', // Icon for the menu item
        ];
        return $menu_items;
    }

    public function asbfg_register_settings() {
        // Verify nonce
        if ( isset( $_POST['asbfg_submission_blocker_nonce'] ) && ! check_admin_referer( 'asbfg_submission_blocker_action', 'asbfg_submission_blocker_nonce' ) ) {
            // Nonce verification failed
            wp_die( 'Security check failed.' ); // Stop processing and show error
        }
    
        $settings = [
            'asbfg_blocked_ips' => [ 'sanitize_callback' => [ $this, 'sanitize_textarea_lines' ], 'default' => [] ],
            'asbfg_blocked_emails' => [ 'sanitize_callback' => [ $this, 'sanitize_textarea_lines' ], 'default' => [] ],
            'asbfg_blocked_domains' => [ 'sanitize_callback' => [ $this, 'sanitize_textarea_lines' ], 'default' => [] ],
            'asbfg_custom_ip_message' => [ 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Submissions from your IP address are not allowed.' ],
            'asbfg_custom_email_message' => [ 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Submissions from this email are not allowed.' ],
            'asbfg_custom_domain_message' => [ 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Submissions from this email domain are not allowed.' ],
        ];
    
        foreach ( $settings as $key => $args ) {
            register_setting( 'asbfg_submission_blocker', $key, $args );
        }
    
        // Add settings success message
        if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
            add_settings_error(
                'asbfg_submission_blocker', // Setting slug
                'settings_updated',       // Error code
                'Settings saved successfully.', // Message
                'updated'                 // Message type
            );
        }
    }
    

    public function sanitize_textarea_lines( $input ) {
        if ( is_array( $input ) ) {
            return array_map( 'sanitize_text_field', $input );
        }

        if ( is_string( $input ) ) {
            $lines = explode( "\n", $input );
            $lines = array_map( 'trim', $lines );
            $lines = array_map( 'sanitize_text_field', $lines );
            return array_filter( $lines );
        }

        return [];
    }

    public function asbfg_render_settings_page() {
        echo '<h3>Submission Blocker Settings</h3>';
        echo '<form method="post" action="options.php">';
    
        // Add the nonce field
        wp_nonce_field( 'asbfg_submission_blocker_action', 'asbfg_submission_blocker_nonce' );
    
        settings_errors( 'asbfg_submission_blocker' );
    
        settings_fields( 'asbfg_submission_blocker' );
        do_settings_sections( 'asbfg_submission_blocker' );
    
        echo '<table class="form-table">';
        $this->asbfg_render_textarea_setting( 'Blocked IPs', 'asbfg_blocked_ips', 'Enter one IP per line.' );
        $this->asbfg_render_textarea_setting( 'Blocked Emails', 'asbfg_blocked_emails', 'Enter one email per line.' );
        $this->asbfg_render_textarea_setting( 'Blocked Domains', 'asbfg_blocked_domains', 'Enter one domain per line.' );
        $this->asbfg_render_input_setting( 'IP Validation Message', 'asbfg_custom_ip_message' );
        $this->asbfg_render_input_setting( 'Email Validation Message', 'asbfg_custom_email_message' );
        $this->asbfg_render_input_setting( 'Domain Validation Message', 'asbfg_custom_domain_message' );
        echo '</table>';
        echo '<p><input type="submit" class="primary button large" value="Save Settings"></p>';
        echo '</form>';
    }
    
    private function asbfg_render_textarea_setting( $label, $name, $description ) {
        $value = implode( "\n", (array) get_option( $name, [] ) );
        echo "<tr valign='top'><th scope='row'>" . esc_html( $label ) . "</th>";  // Escape the label
        echo "<td><textarea name='" . esc_attr( $name ) . "' rows='5' cols='50'>" . esc_textarea( $value ) . "</textarea>";
        echo "<p class='description'>" . esc_html( $description ) . "</p></td></tr>";  // Escape the description
    }    
    
    private function asbfg_render_input_setting( $label, $name ) {
        $value = esc_attr( get_option( $name, '' ) );
        echo "<tr valign='top'><th scope='row'>" . esc_html( $label ) . "</th>";  // Escape the label
        echo "<td><input type='text' name='" . esc_attr( $name ) . "' value='" . esc_attr( $value ) . "' class='regular-text' /></td></tr>";  // Escape the name and value
    }    
    
}

// Initialize admin settings.
new ASBFG_Admin_Settings();
