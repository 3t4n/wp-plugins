<?php
/**
 * @package Easy Logo Link Change
 * @version 1.0.1
 */
/*
Plugin Name: Easy Logo Link Change
Plugin URI: https://blog.taskbill.io/easylogolinkchange
Description: This is a simple plugin to change the URL of your logo in the top left hand corner.
Author: TaskBill.io
Version: 1.0.1
Author URI: http://taskbill.io
*/

// Change the Logo Link using the get_custom_logo function.
add_filter( 'get_custom_logo', 'easylogolinkchange_change_logo_url' );
function  easylogolinkchange_change_logo_url() {
    $logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( get_option("easylogolinkchange_url") ),
            wp_get_attachment_image( $logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
} 

// Add an option to save the custom url
function easylogolinkchange_register_settings() {
   add_option( 'easylogolinkchange_url', 'https://google.com');
   register_setting( 'easylogolinkchangeurl_options_group', 'easylogolinkchange_url', 'easylogolinkchangeurl_callback' );
}
add_action( 'admin_init', 'easylogolinkchange_register_settings' );

// Add the option to the setting in Wordpress
function easylogolinkchange_register_options_page() {
  add_options_page('Easy Logo URL Set', 'Set Logo Link', 'manage_options', 'easylogolinkchange', 'easylogolinkchangeurl_options_page');
}
add_action('admin_menu', 'easylogolinkchange_register_options_page');

function easylogolinkchangeurl_options_page(){
?>
  <div>
  <?php screen_icon(); ?>
  <h2>Easy Logo Link Change</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'easylogolinkchangeurl_options_group' ); ?>
  <h3>Enter the URL you would like your logo linked to below.</h3>
  <table>
  <tr valign="top">
  <th scope="row"><label for="easylogolinkchange_url">Logo URL</label></th>
  <td><input type="text" id="easylogolinkchange_url" name="easylogolinkchange_url" value="<?php echo get_option("easylogolinkchange_url"); ?>" /></td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
	}