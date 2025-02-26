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
class appalify_quickview_settingspage{


	function appalify_qv_display_button_text_settings() {
    // Check if the form was submitted

    if (isset($_POST['save_license_key'])) {
        // Sanitize the input to ensure it's safe
        $new_license_key = sanitize_text_field($_POST['appalify_qv_license_key']);
    
        // Update the option with the new license key
        update_option('appalify_qv_validator_key', $new_license_key);
    
    }
    if (isset($_POST['appalify_qv_save_settings'])) {
        // Verify the nonce for security
        if (!isset($_POST['appalify_qv_settings_nonce']) || !wp_verify_nonce(sanitize_key($_POST['appalify_qv_settings_nonce']), 'appalify_qv_save_settings_action')) {
            // If the nonce verification fails, display an error and exit
            wp_die('Security check failed. Please try again.');
        }

        // checkboxes
        $enable_appalify_qv = isset($_POST['enable_appalify_qv']) ? 'yes' : 'no';
        update_option('enable_appalify_qv', $enable_appalify_qv);

        $display_images_appalify_qv = isset($_POST['display_images_appalify_qv']) ? 'yes' : 'no';
        update_option('display_images_appalify_qv', $display_images_appalify_qv);

        $display_shortdesc_appalify_qv = isset($_POST['display_shortdesc_appalify_qv']) ? 'yes' : 'no';
        update_option('display_shortdesc_appalify_qv', $display_shortdesc_appalify_qv);

        $display_fulldetail_appalify_qv = isset($_POST['display_fulldetail_appalify_qv']) ? 'yes' : 'no';
        update_option('display_fulldetail_appalify_qv', $display_fulldetail_appalify_qv);

        $display_atc_appalify_qv = isset($_POST['display_atc_appalify_qv']) ? 'yes' : 'no';
        update_option('display_atc_appalify_qv', $display_atc_appalify_qv);

        $display_variations_appalify_qv = isset($_POST['display_variations_appalify_qv']) ? 'yes' : 'no';
        update_option('display_variations_appalify_qv', $display_variations_appalify_qv);



        $modal_width_appalify_qv = isset($_POST['modal_width_appalify_qv']) ? sanitize_text_field($_POST['modal_width_appalify_qv']) : '';
        update_option('modal_width_appalify_qv', $modal_width_appalify_qv);

        $image_width_appalify_qv = isset($_POST['image_width_appalify_qv']) ? sanitize_text_field($_POST['image_width_appalify_qv']) : '';
        update_option('image_width_appalify_qv', $image_width_appalify_qv);



        $button_color_appalify_qv = isset($_POST['button_color_appalify_qv']) ? sanitize_text_field($_POST['button_color_appalify_qv']) : '';
        update_option('button_color_appalify_qv', $button_color_appalify_qv);

        $textbutton_color_appalify_qv = isset($_POST['textbutton_color_appalify_qv']) ? sanitize_text_field($_POST['textbutton_color_appalify_qv']) : '';
        update_option('textbutton_color_appalify_qv', $textbutton_color_appalify_qv);

        $button_border_color_appalify_qv = isset($_POST['button_border_color_appalify_qv']) ? sanitize_text_field($_POST['button_border_color_appalify_qv']) : '';
        update_option('button_border_color_appalify_qv', $button_border_color_appalify_qv);

        $button_border_radius_appalify_qv = isset($_POST['button_border_radius_appalify_qv']) ? sanitize_text_field($_POST['button_border_radius_appalify_qv']) : '';
        update_option('button_border_radius_appalify_qv', $button_border_radius_appalify_qv);

        $background_opacity_appalify_qv = isset($_POST['background_opacity_appalify_qv']) ? sanitize_text_field($_POST['background_opacity_appalify_qv']) : '';
        update_option('background_opacity_appalify_qv', $background_opacity_appalify_qv);

        $mobile_modal_width_appalify_qv = isset($_POST['mobile_modal_width_appalify_qv']) ? sanitize_text_field($_POST['mobile_modal_width_appalify_qv']) : '';
        update_option('mobile_modal_width_appalify_qv', $mobile_modal_width_appalify_qv);

        $mobile_image_width_appalify_qv = isset($_POST['mobile_image_width_appalify_qv']) ? sanitize_text_field($_POST['mobile_image_width_appalify_qv']) : '';
        update_option('mobile_image_width_appalify_qv', $mobile_image_width_appalify_qv);

        // Display a success message
        echo '<div class="updated"><p>Settings saved successfully!</p></div>';
    }

    // Get the current option values
    $enable_appalify_qv = (bool) get_option('appalify_enable_qv', true);
    $response = get_option('check_if_appalify_active');
    $appalify_qv_wc_version = get_option('appalify_qv_woocommerce_version');
    $appalify_qv_validator_key = get_option('appalify_qv_validator_key');
    
    $display_images_appalify_qv = get_option('display_images_appalify_qv','yes');
    $display_shortdesc_appalify_qv = get_option('display_shortdesc_appalify_qv','yes');
    $display_fulldetail_appalify_qv = get_option('display_fulldetail_appalify_qv','yes');
    $display_atc_appalify_qv = get_option('display_atc_appalify_qv','yes');
    $display_variations_appalify_qv = get_option('display_variations_appalify_qv','yes');


    $modal_width_appalify_qv = get_option('modal_width_appalify_qv', '600'); // Default width
    $image_width_appalify_qv = get_option('image_width_appalify_qv', '100'); // Default image width

    $button_color_appalify_qv = get_option('button_color_appalify_qv', '#333'); // Default button color
    $textbutton_color_appalify_qv = get_option('textbutton_color_appalify_qv', '#fff'); // Default button text color
    $button_border_color_appalify_qv = get_option('button_border_color_appalify_qv', '#333'); // Default button border color
    $button_border_radius_appalify_qv = get_option('button_border_radius_appalify_qv', '5'); // Default border radius
    $background_opacity_appalify_qv = get_option('background_opacity_appalify_qv', '40'); // Default background opacity
    
    $mobile_modal_width_appalify_qv = get_option('mobile_modal_width_appalify_qv', '300'); // Default width
    $mobile_image_width_appalify_qv = get_option('mobile_image_width_appalify_qv', '50'); // Default image width

    if($enable_appalify_qv == 1){
    // Display the form
    echo '
	  <form class="" action="" method="post" autocomplete="off">
                </form>
    <div class="wrap">
        <h3>Quick-View settings</h3>
        <form method="post" action="">';


if (trim($response) === "true") {

echo '

            <h3>Display Settings</h3>

                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="display_images_appalify_qv">Display Image</label></th>
                        <td><input name="display_images_appalify_qv" type="checkbox" id="display_images_appalify_qv" value="yes" ' . checked('yes', $display_images_appalify_qv, false) . ' /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="display_shortdesc_appalify_qv">Display Short Description</label></th>
                        <td><input name="display_shortdesc_appalify_qv" type="checkbox" id="display_shortdesc_appalify_qv" value="yes" ' . checked('yes', $display_shortdesc_appalify_qv, false) . ' /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="display_variations_appalify_qv">Display Variations</label></th>
                        <td><input name="display_variations_appalify_qv" type="checkbox" id="display_variations_appalify_qv" value="yes" ' . checked('yes', $display_variations_appalify_qv, false) . ' /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="display_atc_appalify_qv">Display Add-to-Cart Button</label></th>
                        <td><input name="display_atc_appalify_qv" type="checkbox" id="display_atc_appalify_qv" value="yes" ' . checked('yes', $display_atc_appalify_qv, false) . ' /></td>
                    </tr>
                    </table><br>';


}
    echo '            <table class="form-table">
            <h3>Design Settings</h3>
                    <tr>
                        <th scope="row"><label for="modal_width_appalify_qv">Modal Width</label></th>
                        <td><input name="modal_width_appalify_qv" type="text" id="modal_width_appalify_qv" value="' . esc_attr($modal_width_appalify_qv) . '" class="regular-text" />
                        <span id="width_suffix">px</span></td>
                        
                    </tr>

                    <tr>
                        <th scope="row"><label for="image_width_appalify_qv">Image Width</label></th>
                        <td><input name="image_width_appalify_qv" type="text" id="image_width_appalify_qv" value="' . esc_attr($image_width_appalify_qv) . '" class="regular-text" />
                        <span id="width_suffix">px</span></td></td>
                    </tr></table><br>';
    if (trim($response) === "true") {
    echo'
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="button_color_appalify_qv">Button Color</label></th>
                        <td><input name="button_color_appalify_qv" type="text" id="button_color_appalify_qv" value="' . esc_attr($button_color_appalify_qv) . '" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="textbutton_color_appalify_qv">Button Text Color</label></th>
                        <td><input name="textbutton_color_appalify_qv" type="text" id="textbutton_color_appalify_qv" value="' . esc_attr($textbutton_color_appalify_qv) . '" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="button_border_color_appalify_qv">Button Border Color</label></th>
                        <td><input name="button_border_color_appalify_qv" type="text" id="button_border_color_appalify_qv" value="' . esc_attr($button_border_color_appalify_qv) . '" class="regular-text" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="button_border_radius_appalify_qv">Button Border Radius</label></th>
                        <td><input name="button_border_radius_appalify_qv" type="text" id="button_border_radius_appalify_qv" value="' . esc_attr($button_border_radius_appalify_qv ) . '" class="regular-text" />
                        <span id="width_suffix">px</span></td></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="background_opacity_appalify_qv">Background Opacity</label></th>
                        <td><input name="background_opacity_appalify_qv" type="text" id="background_opacity_appalify_qv" value="' . esc_attr($background_opacity_appalify_qv) . '" class="regular-text" />
                        <span id="width_suffix">%</span></td></td>
                    </tr>
                   </table><br><table class="form-table">
                <h3>Mobile design Settings</h3>
                    <tr>
                        <th scope="row"><label for="mobile_modal_width_appalify_qv">Modal Width</label></th>
                        <td><input name="mobile_modal_width_appalify_qv" type="text" id="mobile_modal_width_appalify_qv" value="' . esc_attr($mobile_modal_width_appalify_qv) . '" class="regular-text" />
                        <span id="width_suffix">px</span></td>
                        
                    </tr>

                    <tr>
                        <th scope="row"><label for="mobile_image_width_appalify_qv">Image Width</label></th>
                        <td><input name="mobile_image_width_appalify_qv" type="text" id="mobile_image_width_appalify_qv" value="' . esc_attr($mobile_image_width_appalify_qv) . '" class="regular-text" />
                        <span id="width_suffix">px</span></td></td>
                    </tr>
                </table>';}

           wp_nonce_field('appalify_qv_save_settings_action', 'appalify_qv_settings_nonce');
            // Escape the nonce field before outputting
           
    

           echo ' <p class="submit">
                <input type="submit" name="appalify_qv_save_settings" id="submit" class="button button-primary" value="Save Settings">
            </p>
        </form>
    </div>';}
}

	/**                                <tr>
                        <th scope="row"><label for="display_fulldetail_appalify_qv">Display Full details button</label></th>
                        <td><input name="display_fulldetail_appalify_qv" type="checkbox" id="display_fulldetail_appalify_qv" value="yes" ' . checked('yes', $display_fulldetail_appalify_qv, false) . ' /></td>
                    </tr>*/  
}
