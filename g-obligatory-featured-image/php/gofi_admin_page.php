<?php
/******************************************************************************
* Admin page                                                                  *
******************************************************************************/

function gofi_options_page () {
	global $gofi_options;
	global $gofi_plugin_name;
	//Get all registred post types
	$existing_post_typess = gofi_get_registred_post_types();
	
	?>
		<div class="wrap">
			<h2><?php echo $gofi_plugin_name; ?></h2>
			<h3><?php _e("*	This plugin works in two modes. Php & JS obligatory mode and php alone obligatory mode.	", "gofi_domain"); ?></h3>
			<p><?php _e("1. If you use Php & JS obligatory mode plugin will force user's to put featured image in every post type that has featured image in it(That's what JS mode does). Also if for some reason user that write and publish the post deactivate their JavaScript php will stop them from publishing. Make sure you checked which post type will use this plugin.(Php obligatory mode only).", "gofi_domain") ?></p>
			<p><?php _e("2. If you use Php alone obligatory mode first make sure you checked which post type will use this plugin.", "gofi_domain") ?></p>
			<form method="POST" action="options.php">
				<?php settings_fields("gofi_settings_group") ?>
				<p>
					<label class="description" for="gofi_settings[gofi_only_php]"><?php _e("Php alone obligatory mode", "gofi_domain"); ?></label>
					<input type="checkbox" name="gofi_settings[gofi_only_php]" id="gofi_settings[gofi_only_php]" value="1" <?php if (isset($gofi_options["gofi_only_php"])) checked($gofi_options["gofi_only_php"], 1); ?> />
				</p>
				<p><?php _e("Here you can set which post type will use the plugin with php method:", "gofi_domain"); ?></p>
				<?php
				foreach ($existing_post_typess as $single_post_type) {
					?>
					<p>
						<label class="description" for="gofi_settings[<?php echo $single_post_type; ?>]"><?php _e("$single_post_type", "gofi_domain"); ?></label>
						<input type="checkbox" name="gofi_settings[<?php echo $single_post_type; ?>]" id="gofi_settings[<?php echo $single_post_type; ?>]" value="1" <?php if (isset($gofi_options["$single_post_type"])) checked($gofi_options["$single_post_type"], 1); ?> />
					</p>
					<?php
				}
				
				?>
				<p>
					<label class="description" for="gofi_settings[php_error_msgg]"><?php _e("Php mode error msg:","gofi_domain") ?> </label>
					<input type="text" name="gofi_settings[php_error_msgg]" id="gofi_settings[php_error_msgg]" value="<?php echo $gofi_options['php_error_msgg']; ?>"/>
				</p>
				<p class="description"><?php _e("Default msg is: You cannot publish without featured image ! ","gofi_domain") ?></p>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save', 'gofi_domain'); ?>" />
				</p>
			</form>
		</div>

	<?php
}

//Add options page
function gofi_add_options_link () {
	if ( current_user_can( 'manage_options' ) ) {
		add_menu_page('G-Оbligatory-Featured-Image', 'G-Оbligatory-Featured-Image', 'publish_posts', __FILE__, 'gofi_options_page');
	}
}
add_action ('admin_menu', 'gofi_add_options_link');

//Save options
function gofi_register_settings () {
	register_setting( 'gofi_settings_group', 'gofi_settings');
}
add_action ('admin_init', 'gofi_register_settings');
?>
