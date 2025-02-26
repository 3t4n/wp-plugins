<?php

//ADMIN SETUP
function db_redirect_add_admin() {
	//add page
	add_submenu_page('options-general.php','db redirect settings', 'db redirect', 'manage_options', 'db_redirect_admin', 'db_redirect_admin_layout');
	//declare options
	add_action('admin_init','update_va_db_redirect_settings');
	
}
add_action('admin_menu' , 'db_redirect_add_admin');

//UPDATER
function update_va_db_redirect_settings(){
	register_setting( 'va_db_redirect_settings', 'va_db_redirect_url' );
}

//ADMIN MENU LAYOUT 
function db_redirect_admin_layout() {
	?>
    <div class="wrap">
		<div id="icon-va-db-form" class="icon32"></div><h2>db form plugin</h2>

		<form method="post" action="options.php">
        <?php settings_fields( 'va_db_redirect_settings' ); ?>
        <?php if(function_exists(do_settings)){do_settings( 'va_db_redirect_settings' );} ?>
        <input type="hidden" name="post_id" value="submit_admin_setup" />
        <p>A simple plugIn to redirect mobile browsers.</p>
        <p>It's important that all your data below is correct.</p>
        <h3>Setup</h3>
        	<table class="form-table setup">
                <tr valign="top" >
                    <th scope="row">
                    	<label>Redirect URL</label>
                    </th>
                    <td>
                    	<input type="text" name="va_db_redirect_url" value="<?php echo get_option('va_db_redirect_url') ?>" />
                    </td>
				</tr>
			</table>
            <p class="submit">
            	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
		</form>
	</div>
	<?php

}

?>