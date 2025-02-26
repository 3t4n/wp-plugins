<?php

// Security check to prevent direct file access
if (!defined('ABSPATH')) exit;

/**
 * Create Settings Menu
 */
function addresswise_settings_menu()
{

    add_menu_page(
        __('AddressWise Settings', 'addresswise'),
        __('AddressWise Plugin Settings', 'addresswise'),//name in the admin panel
        'manage_options',
        'addresswise-settings-page',
        'addresswise_settings_template_callback',
        '',
        null
    );

}

add_action('admin_menu', 'addresswise_settings_menu');

// Settings Template Page
function addresswise_settings_template_callback()
{
    ?>
    <div class="wrap">
        <form action="" method="post">
            <?php
            // Nonce field for verification
            wp_nonce_field( 'addresswise_settings_nonce', 'addresswise_settings_nonce_field' );

            if ( isset( $_POST['addresswise_settings_input_field'] ) && wp_verify_nonce( $_POST['addresswise_settings_nonce_field'], 'addresswise_settings_nonce' ) ) {
                // Data from the form is being sent
                $input_value = sanitize_text_field($_POST['addresswise_settings_input_field']);

                update_option('addresswise_settings_input_field', $input_value);


                // Display a success message
                echo '<div class="updated"><p>Settings saved successfully!</p></div>';
            }

            // Security field(protects against CSRF)
            settings_fields('addresswise-settings-page');

            // Output settings section
            do_settings_sections('addresswise-settings-page');

            // Save settings button
            submit_button('Save Settings');
            ?>

        </form>
    </div>
    <?php
}

/**
 * Settings Template
 */
function addresswise_settings_init()
{

    // Setup settings section
    add_settings_section(
        'addresswise_settings_section',
        'AddressWise Settings to accept the token',
        '',
        'addresswise-settings-page'//page slug from above
    );

    // Register input field
    register_setting(
        'addresswise-settings-page',   //page slug
        'addresswise_settings_input_field',//function through which we are justifying that which field we need to register
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        'addresswise_settings_input_field',//match with register_setting option name
        __('Client token', 'addresswise'),//title
        'addresswise_settings_input_field_callback',
        'addresswise-settings-page', //page id
        'addresswise_settings_section'//section id
    );

}

add_action('admin_init', 'addresswise_settings_init');

function addresswise_settings_input_field_callback()
{
    $addresswise_input_field = get_option('addresswise_settings_input_field');
    // It retrieves the current value of "addresswise_settings_input_field" from the WordPress options table using get_option and displays it in the input field.
    ?>
    <input type="text" name="addresswise_settings_input_field" class="regular-text"
           value="<?php echo isset($addresswise_input_field) ? esc_attr($addresswise_input_field) : ''; ?>" required/>
    <?php
}
