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
class appalify_manage_extensions{

    function appalify_display_optimization_settings() {
        if (isset($_POST['appalify_me_save_settings'])) {
            // Verify the nonce for security
            if (!isset($_POST['appalify_me_save_settings_nonce']) || !wp_verify_nonce(sanitize_key($_POST['appalify_me_save_settings_nonce']), 'appalify_me_save_settings_action')) {
                // If the nonce verification fails, display an error and exit
                wp_die('Security check failed. Please try again.');
            }
    
            $appalify_enable_qv = isset($_POST['appalify_enable_qv']) ? true : false;
            update_option('appalify_enable_qv', $appalify_enable_qv);
    
            $appalify_enable_preorders = isset($_POST['appalify_enable_preorders']) ? true : false;
            update_option('appalify_enable_preorders', $appalify_enable_preorders);
    
            // Display a success message
            echo '<div class="updated"><p>Settings saved successfully!</p></div>';
        }

        $appalify_enable_qv = (bool) get_option('appalify_enable_qv', true);
        $appalify_enable_preorders = (bool) get_option('appalify_enable_preorders', true);


        echo '
        <form class="" action="" method="post" autocomplete="off">
                  </form>
      <div class="wrap">
          <h1>Optimization</h1>
          <form method="post" action="">
          
                     <table class="form-table">
            <tr>
                <th scope="row"><label for="appalify_enable_qv">Enable Quick View</label></th>
                <td><input name="appalify_enable_qv" type="checkbox" id="appalify_enable_qv" ' . checked(true, esc_attr($appalify_enable_qv), false) . ' /></td>
            </tr>
            <tr>
                <th scope="row"><label for="appalify_enable_preorders">Enable Pre-Orders</label></th>
                <td><input name="appalify_enable_preorders" type="checkbox" id="appalify_enable_preorders" ' . checked(true, esc_attr($appalify_enable_preorders), false) . ' /></td>
            </tr>
        </table>
  
          
                ';
  
             wp_nonce_field('appalify_me_save_settings_action', 'appalify_me_save_settings_nonce');
              // Escape the nonce field before outputting
             
      
  
             echo ' <p class="submit">
                  <input type="submit" name="appalify_me_save_settings" id="submit" class="button button-primary" value="Save Settings">
              </p>
          </form>
      </div>';
    }
}