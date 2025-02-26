<?php

defined('ABSPATH') or die();

/**
 * Queue up scripts and style sheets, then generate the settings form.
 */
function goworks_styler_options_page() {
	
	$options = get_option('goworks_styler_settings');
	wp_enqueue_style('go.styler.options.css', plugins_url('/css/go.styler.options.css', __FILE__));
	
	ob_start(); ?>
	<div class="wrap">
		<a href="http://goworks-goworks.rhcloud.com/wordpress/plugins/styler/" target="_blank"><svg id="go-logo" width="200" height="64" viewBox="0 0 475 153" preserveAspectRatio="xMidYMid meet"><style>.s0{fill:#373535;}</style><path d="m76.5 0c42.2 0 76.5 34.2 76.5 76.5 0 42.3-34.2 76.5-76.5 76.5C34.2 153 0 118.8 0 76.5 0 34.2 34.2 0 76.5 0" style="fill-rule:evenodd;fill:#4caf50"/><path d="m30.7 137.8c-4-3-7.6-6.3-11-10 4.9 3.2 11.3 5.7 20 5.7 14.4 0 24.6-7.2 24.6-25.5l0-8.7-0.2 0c-3.5 6.4-11.4 12.7-23.8 12.7-17.1 0-28.6-14.1-28.6-29.2 0-20.1 14.7-32.2 30-32.2 13.2 0 20.4 6.9 23.1 12.6l0.2 0 0.4-11.1 5.6 0c-0.4 4.9-0.5 9.6-0.5 14.5l0 36.6c0 14.6-3.6 23-9.2 28-6.2 5.6-15.2 7.4-22.5 7.4-2.6 0-5.4-0.2-8.1-0.7zM64.4 86.2c0 2.2-0.5 4.6-1.2 6.5-3.2 8.2-11.6 14.4-21.1 14.4-16.7 0-24.2-13-24.2-25 0-16 10.1-26.5 24.5-26.5 10.7 0 18.4 6.4 21.2 14.4 0.6 1.9 0.9 3.9 0.9 6.2l0 10zM110.2 50.6c-16.7 0-31.7 12.1-31.7 32.1 0 17.7 13 30.8 30.8 30.8 14.7 0 32.2-9.7 32.2-32.2 0-17.1-12.1-30.7-31.3-30.7zm0 5c17.6 0 25.2 14.7 25.2 26.1 0 17.2-12.5 26.9-25.7 26.9-13 0-25.1-9.5-25.1-26.2 0-14 8.6-26.7 25.6-26.7z" style="fill-rule:evenodd;fill:#fff;stroke-width:0.2;stroke:#fff"/><path d="m184.7 112 15.7-48.5c4.4-13.1 7-21.2 8.5-28.6l0.3 0c1.2 7.6 3.4 15.6 7.1 28.8l13.6 48.2 6 0 27.8-84.2-6.4 0-15.5 48.5c-3.5 11.1-6.5 20.2-8.5 28.1l-0.3 0c-1.4-7.4-4.4-18.1-7.2-28.4l-13.6-48.2-6 0-15.5 48.3c-3.6 11-7 21.4-8.5 28.2l-0.2 0c-1.7-7.1-4.6-17.5-7.6-28.2l-13.4-48.3-6.2 0 23.8 84.2 6 0zM289.6 50.6c-16.7 0-31.7 12.1-31.7 32.1 0 17.7 13 30.8 30.8 30.8 14.7 0 32.2-9.7 32.2-32.2 0-17.1-12.1-30.7-31.3-30.7zm0 5c17.6 0 25.2 14.7 25.2 26.1 0 17.2-12.5 26.9-25.7 26.9-13 0-25.1-9.5-25.1-26.2 0-14 8.6-26.7 25.6-26.7zm41.8 56.5 6.1 0 0-32.5c0-2 0.2-4.1 0.6-5.9 2-10.4 8.4-17.4 16.7-17.4 1.4 0 2.4 0 3.5 0.2l0-5.6c-0.9-0.2-1.9-0.4-2.9-0.4-8.9 0-15.4 6.1-18.4 14.5l-0.4 0-0.2-13-5.6 0c0.4 6.5 0.5 12.9 0.5 19.4l0 40.6zm42.7-89.4-6.1 0 0 89.4 6.1 0 0-25.1 6.9-6.6 27.3 31.7 7.6 0-30.6-35.2 26.7-24.7-7.7 0-23.3 22c-2.1 2-5 5-6.6 6.9l-0.3 0 0-58.3zm45.4 86.5c4.5 2.6 10.4 4.4 16.7 4.4 13.6 0 21.6-7.5 21.6-17.2 0-9-5.4-13.7-16.4-17.5-8.9-3-14-5.6-14-12.4 0-5.7 4.4-10.7 12.6-10.7 6.9 0 11.2 2.5 13.2 3.9l2.4-5c-3.5-2.4-8.6-4-14.5-4-13 0-19.7 8.1-19.7 16.6 0 7.1 5.4 12.7 16.2 16.2 9.4 3 14.1 6.4 14.1 13.4 0 6.1-4.6 11.6-15.1 11.6-6 0-11.4-2.2-15-4.5l-2.2 5.2zM464.6 57.3l0-5.9-2.2 0 0-0.8 5.3 0 0 0.8-2.2 0 0 5.9-0.9 0zm4 0 0-6.7 1.3 0 1.6 4.7c0.1 0.4 0.3 0.8 0.3 1 0.1-0.2 0.2-0.6 0.4-1.1l1.6-4.7 1.2 0 0 6.7-0.9 0 0-5.6-2 5.6-0.8 0-1.9-5.7 0 5.7-0.8 0z" fill="#373535"/></svg></a>
		<br />&nbsp;<br />
		<h1><?php _e('GoWorks Styler Settings', 'goworks-styler'); ?></h1>
		<p><?php _e('These settings allow you to easily change which GoWorks Styler buttons you want to appear on the toolbar.', 'goworks-styler'); ?></p>
		<form method="post" action="options.php">
			<?php settings_fields('goworks_styler_settings_group'); ?>
			<table class="form-table">
				<tr>
					<th scope="row"><?php _e('Styler buttons', 'goworks-styler'); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Time format', 'goworks-styler'); ?></span></legend>
							<p>
								<label><input id="go-textColor" name="goworks_styler_settings[textColor]" type="checkbox" value="1" <?php echo $options && $options['textColor'] ? 'checked' : ''; ?> /> <?php _e('Text color', 'goworks-styler'); ?></label>
							</p>
							<p>
								<label><input id="go-bgColor" name="goworks_styler_settings[bgColor]" type="checkbox" value="1" <?php echo $options && $options['bgColor'] ? 'checked' : ''; ?> /> <?php _e('Background color', 'goworks-styler'); ?></label>
							</p>
							<p>
								<label><input id="go-border" name="goworks_styler_settings[border]" type="checkbox" value="1" <?php echo $options && $options['border'] ? 'checked' : ''; ?> /> <?php _e('Border', 'goworks-styler'); ?></label>
							</p>
							<p>
								<label><input id="go-spacing" name="goworks_styler_settings[spacing]" type="checkbox" value="1" <?php echo $options && $options['spacing'] ? 'checked' : ''; ?> /> <?php _e('Spacing', 'goworks-styler'); ?></label>
							</p>
						</fieldset>
					</td>
				</tr>
			</table>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'goworks-styler'); ?>" /></p>
		</form>
	</div>
	<?php
	echo ob_get_clean(); 
}

/**
 * Create the 'GoWorks Styler' item under the admin 'Settings' menu.
 */
function goworks_styler_add_options_link() {
	add_options_page('GoWorks Styler Settings', 'GoWorks Styler', 'manage_options', 'goworks-styler-options', 'goworks_styler_options_page');
}
add_action('admin_menu', 'goworks_styler_add_options_link');

/**
 * Register the settings group.
 */
function goworks_styler_register_settings() {
	register_setting('goworks_styler_settings_group', 'goworks_styler_settings');
}
add_action('admin_init', 'goworks_styler_register_settings');

