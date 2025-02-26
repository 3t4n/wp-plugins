<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/admin/partials
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'AltTextGo Settings', 'alt-text-go' ); ?></h1>
    
    <!-- Display any settings errors -->
    <?php settings_errors(); ?>

    <!-- Onboarding Section -->
    <div id="onboarding-section">

        <!-- Setup guide (visible when API key NOT available) -->
        <div id="onboarding-content" style="display: <?php echo empty( get_option( 'altgoo_api_key' ) ) ? 'block' : 'none'; ?>; margin-top: 20px;">
            <p>Welcome to AltTextGo! Follow these steps to set up:</p>
            <!-- <p>Follow these steps to set up:</p> -->
            <ol>
                <li>Sign up on <a target="_blank" href='https://app.alttextgo.com/signup'>our website</a> to get free credits, then create an API key over there.</li>
                <li>Paste your API key here and click "Activate API Key".</li>
                <li>You're all set! Navigate to any post or page, click on an image to generate alt text.</li>
            </ol>
        </div>       
    </div>

    <!-- API Key Form -->
    <form method="post" action="<?php echo esc_url( admin_url() . 'options.php' ); ?>">
        <?php settings_fields( 'altgoo-settings' ); ?>
        <?php do_settings_sections( 'altgoo-settings' ); ?>
        <table class="form-table">
            <!-- api key -->
            <tr valign="top">
                <th scope="row">
                    <label for="api_key"><?php esc_html_e( 'API Key', 'alt-text-go' ); ?></label>
                </th>
                <td>
                    <div class="flex gap-x-2">
                        <input type="text" name="altgoo_api_key"
                            <?php echo empty( get_option( 'altgoo_api_key' ) ) ? '' : 'disabled'; ?>
                            id="api_key" 
                            value="<?php echo esc_attr( altgoo_display_api_key( get_option( 'altgoo_api_key' ) ) ); ?>" 
                            class="regular-text" 
                        />
                        <input type="submit" name="handle_api_key" 
                        value="<?php echo empty( get_option( 'altgoo_api_key' ) ) ? 'Activate API Key' : 'Clear API Key'; ?>" 
                        class="button" />
                    </div>
                </td>
            </tr>
            <!-- credits -->
            <tr valign="top" 
            <?php echo empty( get_option( 'altgoo_api_key' ) ) ? 'hidden': ''; ?>
            >
                <th scope="row">
                    <label for="available_credits"><?php esc_html_e( 'Available Credits', 'alt-text-go' ); ?></label>
                </th>
                <td>
                    <div style="align-items: center;display: flex; justify-content: flex-start; gap: 16px;">
                        <p style="align-items: center;display: flex;margin: 0;">
                            <?php echo esc_html(is_wp_error( $this -> credits ) ? '--' : $this -> credits ); ?>
                        </p>
                        <a href="https://app.alttextgo.com/plans" target="_blank" class="button button-secondary">
                            Top up
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    <div id="foot-section">
        <!-- Use guide (visible when API key available) -->
        <div id="use-guide" style="display: <?php echo empty( get_option( 'altgoo_api_key' ) ) ? 'none' : 'block'; ?>; margin-top: 20px;">
            <p>Watch this <a href="https://capture.dropbox.com/8Z6mwJTH1BmghpHS" target="_blank">video tutorial</a> on how to generate alt text for your images.</p>
        </div> 
    </div>
</div>


<?php
// Function to display the API key, showing only the first 2 and last 2 characters
function altgoo_display_api_key( $api_key ) {
    if ( ! empty( $api_key ) ) {
        // Return the first 2 and last 2 characters, with "..." in between
        return substr( $api_key, 0, 2 ) . '......' . substr( $api_key, -2 );
    }
    return '';  // If no API key, return an empty string
}
?>