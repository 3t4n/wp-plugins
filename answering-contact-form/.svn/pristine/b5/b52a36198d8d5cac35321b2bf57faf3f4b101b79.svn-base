<?php

/*
 Add backend settings page.
*/

add_action('admin_menu', 'acfl_admin_pages');

function acfl_admin_pages() {
        add_menu_page('Answering Contact Form', 'Answering Contact Form', 'manage_options', 'afcl_settings', 'acfl_settings_pages' );
	    add_submenu_page ( 'afcl_settings', 'Answering Contact Form', 'Settings', 'manage_options', 'afcl_settings_options', 'acfl_settings_pages');
        add_action( 'admin_init', 'acfl_plugin_settings' );	
}

/*
 Register settings.
*/

add_action( 'admin_init', 'acfl_plugin_settings' );

function acfl_plugin_settings() {
	    register_setting( 'acf-settings-group', 'acf_admin_email' );
	    register_setting( 'acf-settings-group', 'acf_name' );
	    register_setting( 'acf-settings-group', 'acf_email' );
	    register_setting( 'acf-settings-group', 'acf_subject' );
        register_setting( 'acf-settings-group', 'acf_message' );
	    register_setting( 'acf-settings-group', 'acf_send' );
	    register_setting( 'acf-settings-group', 'acf_similair_title' );
	    register_setting( 'acf-settings-group', 'acf_similair_desc' );
	    register_setting( 'acf-settings-group', 'acf_send_email' );
	    register_setting( 'acf-settings-group', 'acf_cancel' );
	    register_setting( 'acf-settings-group', 'acf_success_message' );
	    register_setting( 'acf-settings-group', 'acf_error_message' );
}

/*
 Settings page.
*/

function acfl_settings_pages() {
?>
<div class="wrap">
<h2>Answering Contact Form</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'acf-settings-group' ); ?>
    <?php do_settings_sections( 'acf-settings-group' );?>
	<table class="form-table">
		
		<tr valign="top">
        <th scope="row"><h3>Settings:</h3></th>
		
		<tr valign="top">
        <th scope="row">Shortcode</th>
		<td><p>[acfl_shortcode]</p></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Your email</th> 
        <td><input type="email" name="acf_admin_email" size="40" value="<?php echo esc_attr( get_option('acf_admin_email') ); ?>" /></td>
		</tr>

        <tr valign="top">
        <th scope="row"><h3>Translation:</h3></th>

        <tr valign="top">
        <th scope="row">Name</th>
        <td><input type="text" name="acf_name" size="40" value="<?php echo (get_option('acf_name') ? esc_attr( get_option('acf_name') ) : 'Name'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Email</th>
        <td><input type="text" name="acf_email" size="40" value="<?php echo (get_option('acf_email') ? esc_attr( get_option('acf_email') ) : 'Email'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Subject</th>
        <td><input type="text" name="acf_subject" size="40" value="<?php echo (get_option('acf_subject') ? esc_attr( get_option('acf_subject') ) : 'Subject'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Message</th>
        <td><input type="text" name="acf_message" size="40" value="<?php echo (get_option('acf_message') ? esc_attr( get_option('acf_message') ) : 'Message'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Send</th>
        <td><input type="text" name="acf_send" size="40" value="<?php echo (get_option('acf_send') ? esc_attr( get_option('acf_send') ) : 'Send'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Similair emails with answers</th>
        <td><input type="text" name="acf_similair_title" size="40" value="<?php echo (get_option('acf_similair_title') ? esc_attr( get_option('acf_similair_title') ) : 'Similair emails with answers'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Similair emails description</th>
        <td><textarea cols="50" rows="5" name="acf_similair_desc" id="acf_similair_desc" tabindex="1"><?php echo (get_option('acf_similair_desc') ? esc_attr( get_option('acf_similair_desc') ) : 'Take a look at similar emails that have already been answered. If you\'re not satisfied with the answer, please send your message below and we will get back to you.'); ?></textarea></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Send email</th>
        <td><input type="text" name="acf_send_email" size="40" value="<?php echo (get_option('acf_send_email') ? esc_attr( get_option('acf_send_email') ) : 'Send email'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">I'm satisfied with the answer</th>
        <td><input type="text" name="acf_cancel" size="40" value="<?php echo (get_option('acf_cancel') ? esc_attr( get_option('acf_cancel') ) : 'I\'m satisfied with the answer'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Success Message</th>
        <td><input type="text" name="acf_success_message" size="60" value="<?php echo (get_option('acf_success_message') ? esc_attr( get_option('acf_success_message') ) : 'Thanks for contacting us! We will get back to you soon.'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Error Message</th>
        <td><input type="text" name="acf_error_message" size="60" value="<?php echo (get_option('acf_error_message') ? esc_attr( get_option('acf_error_message') ) : 'An unexpected error occurred.'); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php }
?>