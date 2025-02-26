<?php
/*
 	Plugin Name:		Easy Custom Registration Fields
 	Description:		A simple custom registration fields
    Version:			1.0.0
    Author:				Reza Masoumpour
    Requires at least:	5.0
    Author URI:			https://wproket.ir
    License:			GPL-2.0+ 
    License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
    Text Domain:		ecrfryan
    Domain Path:		/languages/
    WP tested up to:	5.7
 */

add_action('admin_menu', 'ecrfryan_menu');
function ecrfryan_menu() {
	add_submenu_page(
        'users.php',
        esc_html( 'Easy Custom Registration Fields', 'ecrfryan' ),
        esc_html( 'Easy Custom Registration Fields', 'ecrfryan' ),
        'manage_options',
        'ecrfryan-settings-page',
        'ecrfryan_settings_page'
    );
}


add_action( 'admin_init', 'register_ecrfryan_settings' );
function register_ecrfryan_settings() {
	register_setting( 'ecrfryan-settings-group', 'ecrfryan_name' );
	register_setting( 'ecrfryan-settings-group', 'ecrfryan_fname' );
	register_setting( 'ecrfryan-settings-group', 'ecrfryan_info' );
	register_setting( 'ecrfryan-settings-group', 'ecrfryan_theme' );
}

function ecrfryan_settings_page() {
?>
<div class="wrap">
<h1><?php esc_html_e( 'Easy Custom Registration Fields setting page', 'ecrfryan_name' ); ?></h1>

<form method="post" action="options.php">
    <?php settings_fields( 'ecrfryan-settings-group' ); ?>
    <?php do_settings_sections( 'ecrfryan-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e('Name', 'ecrfryan'); ?></th>
        <td>
		<select name="ecrfryan_name">
          <option value="yes" <?php selected(get_option('ecrfryan_name'), "yes"); ?>><?php esc_html_e('Yes', 'ecrfryan'); ?></option>
          <option value="no" <?php selected(get_option('ecrfryan_name'), "no"); ?>><?php esc_html_e('No', 'ecrfryan'); ?></option>
        </select>
		</td>
        </tr>
		
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e('Family Name', 'ecrfryan'); ?></th>
        <td>
		<select name="ecrfryan_fname">
          <option value="yes" <?php selected(get_option('ecrfryan_fname'), "yes"); ?>><?php esc_html_e('Yes', 'ecrfryan'); ?></option>
          <option value="no" <?php selected(get_option('ecrfryan_fname'), "no"); ?>><?php esc_html_e('No', 'ecrfryan'); ?></option>
        </select>
		</td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e('User info', 'ecrfryan'); ?></th>
        <td>
		<select name="ecrfryan_info">
          <option value="yes" <?php selected(get_option('ecrfryan_info'), "yes"); ?>><?php esc_html_e('Yes', 'ecrfryan'); ?></option>
          <option value="no" <?php selected(get_option('ecrfryan_info'), "no"); ?>><?php esc_html_e('No', 'ecrfryan'); ?></option>
        </select>
		</td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e('Dashboard Color', 'ecrfryan'); ?></th>
        <td>
		<select name="ecrfryan_theme">
          <option value="yes" <?php selected(get_option('ecrfryan_theme'), "yes"); ?>><?php esc_html_e('Yes', 'ecrfryan'); ?></option>
          <option value="no" <?php selected(get_option('ecrfryan_theme'), "no"); ?>><?php esc_html_e('No', 'ecrfryan'); ?></option>
        </select>
		</td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php }

add_action( 'register_form', 'ecrfryan_registration_form' );
function ecrfryan_registration_form() {
	$name_status = get_option('ecrfryan_name');
	$fname_status = get_option('ecrfryan_fname');
	$info_status = get_option('ecrfryan_info');
	$theme_status = get_option('ecrfryan_theme');
	
	if($name_status != "no") {
	?>
		<p>
			<label for="first_name">
				<?php esc_html_e( 'First Name', 'ecrfryan' ) ?> <br/>
				<input type="text" class="regular-text" name="first_name" />
			</label>
		</p>
	<?php }
	if($fname_status != "no") {
	?>
	<p>
		<label for="last_name">
			<?php esc_html_e( 'Last Name', 'ecrfryan' ) ?> <br/>
			<input type="text" class="regular-text" name="last_name" />
		</label>
	</p>
	<?php }
	if($info_status != "no") {
	?>
	<p>
		<label for="description">
			<?php esc_html_e( 'Short Info', 'ecrfryan' ) ?> <br/>
			<input type="text" class="regular-text" name="description" />
		</label>
	</p>
	<?php }
	if($theme_status != "no") {
	?>
	<p>
		<label for="admin_color">
			<?php esc_html_e( 'Dashboard Theme Color', 'ecrfryan' ) ?> <br/>
			
			<select name="admin_color" id="admin_color">
			  <option value="fresh"><?php esc_html_e( 'Fresh', 'ecrfryan' ) ?></option>
			  <option value="light"><?php esc_html_e( 'Light', 'ecrfryan' ) ?></option>
			  <option value="modern"><?php esc_html_e( 'Modern', 'ecrfryan' ) ?></option>
			  <option value="blue"><?php esc_html_e( 'Blue', 'ecrfryan' ) ?></option>
			  <option value="coffee"><?php esc_html_e( 'Coffee', 'ecrfryan' ) ?></option>
			  <option value="ectoplasm"><?php esc_html_e( 'Ectoplasm', 'ecrfryan' ) ?></option>
			  <option value="midnight"><?php esc_html_e( 'Midnight', 'ecrfryan' ) ?></option>
			  <option value="ocean"><?php esc_html_e( 'Ocean', 'ecrfryan' ) ?></option>
			  <option value="sunrise"><?php esc_html_e( 'Sunrise', 'ecrfryan' ) ?></option>
			</select>
			
		</label>
	</p>
	<?php }
}

add_action( 'user_register', 'ecrfryan_save_data' );
function ecrfryan_save_data( $user_id ) {
	if ( ! empty( $_POST['first_name'] ) ) {
		$field = sanitize_text_field( $_POST['first_name'] );
		update_user_meta( $user_id, 'first_name', trim( $field ) ) ;		
	}

	if ( ! empty( $_POST['last_name'] ) ) {
		$field = sanitize_text_field( $_POST['last_name'] );
		update_user_meta( $user_id, 'last_name', trim( $field ) );
	}
	
	if ( ! empty( $_POST['description'] ) ) {
		$field = sanitize_text_field( $_POST['description'] );
		update_user_meta( $user_id, 'description', trim( $field ) );
	}
	if ( ! empty( $_POST['admin_color'] ) ) {
		$field = sanitize_text_field( $_POST['admin_color'] );
		update_user_meta( $user_id, 'admin_color', trim( $field ) );
	}
}


