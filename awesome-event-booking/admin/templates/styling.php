<?php
if ( !defined('ABSPATH') ) exit; // direct access disabled
?>

<h1><?php esc_html_e('Event Styling', 'wp_event_booking');?></h1>
  <form class="wpeb-event-styling" method="post" action="options.php">
    <?php settings_fields('wp-event-styling');?>
    <?php do_settings_sections('wp-event-styling');?>
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row"><?php esc_html_e('Button Color', 'wp_event_booking');?></th>
          <td>
            <input type="text" class="colorPicker" name="submitButtonColor" value="<?php echo esc_attr(get_option('submitButtonColor')); ?>" />
            <p class="tooltip description"><?php esc_html_e('Select button color', 'wp_event_booking');?></p>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php esc_html_e('Button Text Color', 'wp_event_booking');?></th>
          <td>
            <input type="text" class="colorPicker" name="submitButtonTextColor" value="<?php echo esc_attr(get_option('submitButtonTextColor')); ?>" />
            <p class="tooltip description"><?php esc_html_e('Select button text color', 'wp_event_booking');?></p>
          </td>
        </tr>

        
      <?php do_action('wpeb_event_styling');?>
      </tbody>
  </table>

    <?php submit_button();?>
  </form>

 <?php /* Signup fields are hooked to do_action('wpeb_event_signup_fields') from admin_settings.php */