<?php
/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * displays all orders in the admin settings.
 */
class appalify_settingspage{


	function appalify_display_button_text_settings() {


        if (isset($_POST['save_license_key_appalify'])) {
            // Sanitize the input to ensure it's safe
            $new_license_key = sanitize_text_field($_POST['appalify_license_key']);
        
            // Update the option with the new license key
            update_option('appalify_validator_key', $new_license_key);
        
        }
    // Check if the form was submitted
    if (isset($_POST['appalify_save_settings'])) {
        // Verify the nonce for security
        if (!isset($_POST['appalify_settings_nonce']) || !wp_verify_nonce(sanitize_key($_POST['appalify_settings_nonce']), 'appalify_save_settings_action')) {
            // If the nonce verification fails, display an error and exit
            wp_die('Security check failed. Please try again.');
        }

        // Sanitize and save the "Add to Cart" button text
        if (isset($_POST['appalify_cart_button_text'])) {
            $cart_button_text = sanitize_text_field($_POST['appalify_cart_button_text']);
            update_option('appalify_cart_button_text', $cart_button_text);
        }

        // Sanitize and save the "Place Order" button text
        if (isset($_POST['appalify_order_button_text'])) {
            $order_button_text = sanitize_text_field($_POST['appalify_order_button_text']);
            update_option('appalify_order_button_text', $order_button_text);
        }
        if (isset($_POST['appalify_additional_info_text'])) {
            $appalify_additional_info_text = sanitize_text_field($_POST['appalify_additional_info_text']);
            update_option('appalify_additional_info_text', $appalify_additional_info_text);
        }

        // Display a success message
        echo '<div class="updated"><p>Settings saved successfully!</p></div>';
    }

    // Get the current option values
    $cart_button_text = get_option('appalify_cart_button_text', 'Pre-Order Now'); // Default text if option is not set
    $order_button_text = get_option('appalify_order_button_text', 'Pre-Order Now'); // Default text if option is not set
    $appalify_additional_info_text = get_option('appalify_additional_info_text', 'This is a Pre-Order.');


    $appalify_enable_preorders = (bool) get_option('appalify_enable_preorders', true);
    $response = get_option('check_if_appalify_active');
    $appalify_wc_version = get_option('appalify_woocommerce_version');
    $appalify_validator_key = get_option('appalify_validator_key');
    // Display the form
    if($appalify_enable_preorders == 1){
    echo '
	  <form class="" action="" method="post" autocomplete="off">
                </form>
    <div class="wrap">
        <form method="post" action="">
         
    ';


    if (trim($response) == "false" && !$appalify_wc_version) {
        // Display the input field for the license key
        $licenseKeyHtml = '
                    <tr><br>
                        <th scope="row"><label for="appalify_license_key">Please enter license key:</label></th>
                        <td><input name="appalify_license_key" type="text" id="appalify_license_key" value="' . esc_attr($appalify_validator_key) . '" />
                            <input type="submit" name="save_license_key_appalify" value="Save" class="button button-primary" />
                        </td>
                    </tr>';
                    echo wp_kses_post($licenseKeyHtml);
        update_option('check_if_appalify_active', "false");
    }


    echo'
            <h3>Pre-Order settings</h3>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="appalify_cart_button_text">Add to Cart Button Text</label></th>
                    <td><input name="appalify_cart_button_text" type="text" id="appalify_cart_button_text" value="' . esc_attr($cart_button_text) . '" class="regular-text" /></td>
                </tr>

                <tr>
                    <th scope="row"><label for="appalify_additional_info_text">Additional Information Text</label></th>
                    <td><input name="appalify_additional_info_text" type="text" id="appalify_additional_info_text" value="' . esc_attr($appalify_additional_info_text) . '" class="regular-text" /></td>
                </tr>
            </table>';

           wp_nonce_field('appalify_save_settings_action', 'appalify_settings_nonce');
            // Escape the nonce field before outputting
           
    

           echo ' <p class="submit">
                <input type="submit" name="appalify_save_settings" id="submit" class="button button-primary" value="Save Settings">
            </p>
        </form>
    </div>';
}
}

	/**             <tr>
<th scope="row"><label for="appalify_order_button_text">Place Order Button Text</label></th>
<td><input name="appalify_order_button_text" type="text" id="appalify_order_button_text" value="' . esc_attr($order_button_text) . '" class="regular-text" /></td>
</tr>*/  
}
