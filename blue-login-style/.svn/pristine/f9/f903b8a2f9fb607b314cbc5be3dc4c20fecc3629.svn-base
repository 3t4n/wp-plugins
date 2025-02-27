<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function blue_login_register_mysettings() {
	register_setting( 'blue-login-settings-group', 'blue_upload_logo' );
	register_setting( 'blue-login-settings-group', 'blue_custom_style' );
	register_setting( 'blue-login-settings-group', 'blue_upload_background' );
	register_setting( 'blue-login-settings-group', 'blue_upload_repeat' );
	register_setting( 'blue-login-settings-group', 'blue_upload_position' );
	register_setting( 'blue-login-settings-group', 'blue_login_redirect' );
	register_setting( 'blue-login-settings-group', 'blue_logout_redirect' );
	register_setting( 'blue-login-settings-group', 'blue_register_redirect' );
	register_setting( 'blue-login-settings-group', 'blue_login_message' );
}

add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {
        wp_enqueue_media();
		wp_enqueue_script('blue_upload_script', plugins_url('assets/js/blue-login-media-upload.js', dirname(__FILE__)), array('jquery'));	
}

function blue_login_settings_page() {
?>
<div class="wrap">
<h2><?php _e('Blue Login Theme Settings','alimir'); ?></h2>
<?php if( isset($_GET['settings-updated']) ) { ?>
	<div id="message" class="updated">
		<p><strong><?php _e('Settings saved.') ?></strong></p>
	</div>
<?php } ?>
<form method="post" action="options.php">
    <?php settings_fields( 'blue-login-settings-group' ); ?>
    <?php do_settings_sections( 'blue-login-settings-group' ); ?>
    <table class="form-table">
	
        <tr valign="top">
        <th scope="row"><?php _e('Login logo URL','alimir'); ?></th>
        <td>
		<label>
		<input id="blue_upload_logo" type="text" name="blue_upload_logo" value="<?php echo get_option('blue_upload_logo'); ?>"/>
		<input id="upload_image_button" class="button" type="button" value="Upload Image" />
		</label>
		<p class="description"><?php _e('Enter an URL or upload an image for the logo.', 'alimir'); ?></p>
		</td>
        </tr>
		
		<tr>
		<th scope="row"><?php _e('Customize', 'alimir'); ?></th>
		<td>
		<label for="blue_custom_style">
		<input name="blue_custom_style" id="blue_custom_style" type="checkbox" value="1" <?php checked( '1', get_option( 'blue_custom_style' ) ); ?> />
		<?php _e('Activate', 'alimir'); ?>
		</label>
		<p class="description"><?php _e('Active this option to see the custom styles settings.', 'alimir'); ?></p>
		</td>
		</tr>
		
        <tr class="checktoshow">
        <th scope="row"><?php _e('Background Image URL','alimir'); ?></th>
        <td>
		<label>
		<input id="blue_upload_background" type="text" name="blue_upload_background" value="<?php echo get_option('blue_upload_background'); ?>"/>
		<input id="upload_background_button" class="button" type="button" value="Upload Image" />
		</label>
		<p class="description"><?php _e('Enter an URL or upload an image for the background image.', 'alimir'); ?></p>
		</td>
        </tr>
		
        <tr class="checktoshow">
        <th scope="row"><?php _e('Repeat','alimir'); ?></th>
        <td>
		<label><input name="blue_upload_repeat" type="radio" value="no-repeat" <?php checked( 'no-repeat', get_option( 'blue_upload_repeat' ) ); ?> /><?php _e('No Repeat'); ?></label>
		<label><input name="blue_upload_repeat" type="radio" value="repeat" <?php checked( 'repeat', get_option( 'blue_upload_repeat' ) ); ?> /><?php _e('Tile'); ?></label>
		<label><input name="blue_upload_repeat" type="radio" value="repeat-x" <?php checked( 'repeat-x', get_option( 'blue_upload_repeat' ) ); ?> /><?php _e('Tile Horizontally'); ?></label>
		<label><input name="blue_upload_repeat" type="radio" value="repeat-y" <?php checked( 'repeat-y', get_option( 'blue_upload_repeat' ) ); ?> /><?php _e('Tile Vertically'); ?></label>
		<p class="description"><?php _e('choose the background repeat setting.','alimir'); ?></p>
		</td>
        </tr>
		
        <tr class="checktoshow">
        <th scope="row"><?php _e('Position','alimir'); ?></th>
        <td>
		<label><input name="blue_upload_position" type="radio" value="left" <?php checked( 'left', get_option( 'blue_upload_position' ) ); ?> /><?php _e('Left'); ?></label>
		<label><input name="blue_upload_position" type="radio" value="center" <?php checked( 'center', get_option( 'blue_upload_position' ) ); ?> /><?php _e('Center'); ?></label>
		<label><input name="blue_upload_position" type="radio" value="right" <?php checked( 'right', get_option( 'blue_upload_position' ) ); ?> /><?php _e('Right'); ?></label>
		<p class="description"><?php _e('choose the background Position setting.','alimir'); ?></p>
		</td>
        </tr>
		
        <tr>
        <th scope="row"><?php _e('Login Redirect','alimir'); ?></th>
        <td>
		<label>
		<input type="text" name="blue_login_redirect" value="<?php echo get_option('blue_login_redirect'); ?>" />
		</label>
		<p class="description"><?php _e('Enter an URL for the login redirection link.', 'alimir'); ?></p>
		</td>
        </tr>
		
        <tr>
        <th scope="row"><?php _e('Logout Redirection','alimir'); ?></th>
        <td>
		<label>
		<input type="text" name="blue_logout_redirect" value="<?php echo get_option('blue_logout_redirect'); ?>" />
		</label>
		<p class="description"><?php _e('Enter an URL for the logout redirection link.', 'alimir'); ?></p>
		</td>
        </tr>			
		
        <tr>
        <th scope="row"><?php _e('Register Redirection','alimir'); ?></th>
        <td>
		<label>
		<input type="text" name="blue_register_redirect" value="<?php echo get_option('blue_register_redirect'); ?>" />
		</label>
		<p class="description"><?php _e('Enter an URL for the register redirection link.', 'alimir'); ?></p>		
		</td>
        </tr>
		
        <tr>
        <th scope="row"><?php _e('Login Page Message','alimir'); ?></th>
        <td>
		<?php 
		$settings = array( 'media_buttons' => false,'tinymce' => false);
		$content = get_option('blue_login_message');
		$editor_id = 'blue_login_message';
		wp_editor( $content, $editor_id,$settings );
		?>
		</td>
        </tr>		
		
    </table>

    <?php submit_button(); ?>
</form>
</div>
<?php } ?>