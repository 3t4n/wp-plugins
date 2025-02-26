<?php
   /**
    * Provide a admin area view for the plugin
    *
    * This file is used to markup the admin-facing aspects of the plugin.
    *
    * @link
    * @since      1.0.1
    *
    * @package    Exly_WP
    * @subpackage Exly_WP/admin/partials
    */
   ?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
   <h1><?php esc_html_e( 'Exly Plugin Settings', 'exly-wp' ); ?></h1>
   <?php

      // Let see if we have a caching notice to show
      $admin_notice = get_option('wp_exly_license_key');
      if(empty($admin_notice)) {
        // We have the notice from the DB, lets remove it.
        delete_option( 'wp_exly_license_key' );
      }
      if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
        $this->admin_notice("Your settings have been updated!");
      }
      ?>
   <form method="POST" action="options.php">
      <?php
         settings_fields('exly-wp-options');
         do_settings_sections('exly-wp-options');
         //submit_button();
         ?>
   </form>

   <table class="form-table" role="presentation">
      <tbody>
         <tr>
            <th scope="row"><?php echo esc_html('WP Shortcode');  ?></th>
            <td>
               <div class="section">
                  <p> <?php echo __( 'Listing shortcode: <strong>[exly-wp]</strong>', 'exly-wp' ); ?></p>
                  <p> <?php echo __( 'Contact us form shortcode: <strong>[exly-contact-us]</strong>', 'exly-wp' ); ?></p>
                  
               </div>
            </td>
         </tr>
      </tbody>
   </table>
<form action="options.php" method="post">
            <?php
            // Output security fields for the registered setting
            settings_fields('my_plugin_settings_group');
            // Output settings sections and fields (grouped under the 'my_plugin_settings_page')
            do_settings_sections('my_plugin_settings_page');
            // Output save settings button
            submit_button();
            ?>
        </form>
</div>


<!-- HTML and CSS -->
<style>
    .input-wrapper {
        display: flex;
        align-items: center;
    }

    .input-wrapper .prefix {
        padding-right: 5px;
        font-weight: bold;
    }

    .input-wrapper input {
        padding-left: 5px;
        width: 100%;
    }

    .error-message {
        color: red;
        display: none;
    }
</style>

<script>
    // JavaScript to prevent a trailing slash and disallow "http://" or "https://"
    document.getElementById('submit').addEventListener('click', function(event) {
        let input = document.getElementById('customFieldUrl').value;

        // Check if input contains "http://" or "https://"
        if (input.startsWith('http://') || input.startsWith('https://')) {
            // Show error message
            document.getElementById('urlError').style.display = 'block';
            // Prevent form submission
            event.preventDefault();
        } else {
            // Hide error message and continue
            document.getElementById('urlError').style.display = 'none';
        }

        // Remove trailing slash if it exists
        if (input.endsWith('/')) {
            document.getElementById('customFieldUrl').value = input.slice(0, -1);
        }
    });
</script>
