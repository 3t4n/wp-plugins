<?php

register_deactivation_hook ( $AJAX_Yandex_metrika, function () {
	global $ajax_yandex_metrika_cfg;
	unregister_setting(
		$ajax_yandex_metrika_cfg['namespace'],
		$ajax_yandex_metrika_cfg['options_id']
	);
});

register_uninstall_hook ( $AJAX_Yandex_metrika, 'ajax_yandex_metrika_uninstall');
function ajax_yandex_metrika_uninstall() {
	global $ajax_yandex_metrika_cfg;
	delete_option(
		$ajax_yandex_metrika_cfg['options_id']
	);
};

require_once('options-script-position\options-script-position.php');

add_action ('init', function () {
	global $ajax_yandex_metrika_cfg;
	$ajax_yandex_metrika_cfg['options'] = ajax_yandex_metrika_validate_options(
		get_option($ajax_yandex_metrika_cfg['options_id'])
	);
	load_plugin_textdomain(
		$ajax_yandex_metrika_cfg['domain'],
		false,
		$ajax_yandex_metrika_cfg['folder'] . '/languages/'
	);
	$ajax_yandex_metrika_cfg['name'] = __('AJAX Yandex Metrika', $ajax_yandex_metrika_cfg['domain']);

	add_action('admin_init', function () {
		global $ajax_yandex_metrika_cfg;

		register_setting(
			$ajax_yandex_metrika_cfg['namespace'],
			$ajax_yandex_metrika_cfg['options_id'],
			'ajax_yandex_metrika_validate_options'
		);

		add_settings_section(
			$ajax_yandex_metrika_cfg['namespace'] . '_main_options',
			__('Main Settings', $ajax_yandex_metrika_cfg['domain']),
			function () {
				global $ajax_yandex_metrika_cfg;
				?>
				<p>
					<?php _e('You must obtain UID from <a href="http://metrika.yandex.ru/">yandex.metrika</a> and set it in the UID field.', $ajax_yandex_metrika_cfg['domain']); ?>
				</p>
				<?php
			},
			$ajax_yandex_metrika_cfg['options_page_id']
		);
		add_settings_field(
			$ajax_yandex_metrika_cfg['options_id'] . '[uastring]',
			__('Yandex.Metrika UID', $ajax_yandex_metrika_cfg['domain']),
			function () {
				global $ajax_yandex_metrika_cfg;
				?>
					<label>
						<input
							name="<?php echo $ajax_yandex_metrika_cfg['options_id'] . '[uastring]' ?>"
							type="text"
							maxlength="40"
							style="width: 100%"
							value="<?php echo $ajax_yandex_metrika_cfg['options']['uastring']; ?>"
						/>
						<br/><?php _e('Your Yandex.Metrika UID.', $ajax_yandex_metrika_cfg['domain']); ?>
					</label>
				<?php
			},
			$ajax_yandex_metrika_cfg['options_page_id'],
			$ajax_yandex_metrika_cfg['namespace'] . '_main_options'
		);

		options_script_position_add_settings_section($ajax_yandex_metrika_cfg['options_page_id']);
	});

	add_action('admin_menu', function () {
		global $ajax_yandex_metrika_cfg;
		add_options_page(
			__('AJAX Yandex.Metrika', $ajax_yandex_metrika_cfg['domain'])
			, __('AJAX Yandex.Metrika', $ajax_yandex_metrika_cfg['domain'])
			, 'manage_options'
			, $ajax_yandex_metrika_cfg['options_page_id']
			, function () {
				global $ajax_yandex_metrika_cfg;
				?>
				<div class="wrap">
					<?php screen_icon('options-general'); ?>
					<h2><?php _e('AJAX Yandex.Metrika options', $ajax_yandex_metrika_cfg['domain']) ?></h2>
					<form method="post" action="options.php">
						<?php
							settings_fields($ajax_yandex_metrika_cfg['namespace']);
							options_script_position_add_settings_fields();
							do_settings_sections($ajax_yandex_metrika_cfg['options_page_id']);
						?>
						<p class="submit">
						<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
						</p>
					</form>
				</div>
				<?php
			}
		);
	});
});

?>