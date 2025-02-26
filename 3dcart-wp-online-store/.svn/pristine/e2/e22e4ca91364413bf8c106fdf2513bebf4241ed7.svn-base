<?php

//Register Settings
function shift4shop_register_settings() {
   add_option( 'shift4shop_siteurl', '');
   add_option( 'shift4shop_currency', '$');
   register_setting( 'shift4shop_options_group', 'shift4shop_siteurl', null );
   register_setting( 'shift4shop_options_group', 'shift4shop_currency', null );
}
add_action( 'admin_init', 'shift4shop_register_settings' );

//Creating an Options Page
function shift4shop_register_options_page() {
  	$page = add_options_page('Shift4Shop Online Store', 'Shift4Shop', 'manage_options', 'shift4shop', 'shift4shop_options_page');

  	add_action('admin_print_scripts-' . $page, 'shift4shop_options_page_assets');
}
add_action('admin_menu', 'shift4shop_register_options_page');


function shift4shop_options_page() {
?>
	<div class="wrap">
	<?php screen_icon(); ?>
		<h1 class="wp-heading-inline">Shift4Shop Online Store</h1>
			<form id="shift4shop_options" method="post" action="options.php">
		  	<?php settings_fields( 'shift4shop_options_group' ); ?>

		  	<table class="form-table" role="presentation">
				<tbody>
					<tr valign="top">
						<th scope="row"><label for="shift4shop_siteurl">Shift4Shop store URL</label></th>
						<td>
							<input name="shift4shop_siteurl" type="text" id="shift4shop_siteurl" value="<?php echo get_option('shift4shop_siteurl'); ?>" class="regular-text ltr">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="shift4shop_currency">Currency symbol</label></th>
						<td>
							<input name="shift4shop_currency" type="text" id="shift4shop_currency" value="<?php echo get_option('shift4shop_currency'); ?>" class="regular-text ltr">
						</td>
					</tr>
				</tbody>
			</table>
		<?php  submit_button(); ?>

		</form>
	</div>
<?php
}

//Options page assets
function shift4shop_options_page_assets(){
    // Load your css.
    wp_register_script( 'shift4shop_wp_admin_js', Shift4Shop_URL.'assets/js/admin.js', array('jquery'), '1.0.0' );
    wp_enqueue_script( 'shift4shop_wp_admin_js' );
}