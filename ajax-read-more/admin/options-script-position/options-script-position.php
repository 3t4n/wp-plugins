<?php

if (!defined('OPTIONS_SCRIPT_POSITION')) {
define('OPTIONS_SCRIPT_POSITION', TRUE);

$options_script_position_cfg = array(
	'id' => __FILE__,
	'name' => 'SCRIPT tag position',
	'ver' => '1.0.0',
	'namespace' => basename(__FILE__, '.php'),
	'folder' => dirname(__FILE__),
	'domain' => basename(__FILE__, '.php'),
	'path' => dirname(__FILE__) . '/',
	'options' => 'head',
	'options_id' => basename(__FILE__, '.php'),
	'options_page_id' => preg_replace('/-/im', '_', 
		dirname(plugin_basename(__FILE__)) . '_options_page'
	)
);

function options_script_position_validate_options($options) {
	if ($options != 'footer')
		$options = 'head';
	return $options;
};

add_action ('init', 'options_script_position_init');
function options_script_position_init() {
	global $options_script_position_cfg;
	$options_script_position_cfg['options'] = options_script_position_validate_options(
		get_option($options_script_position_cfg['options_id'])
	);
	add_action ('admin_init', 'options_script_position_admin_init');
};

function options_script_position_admin_init() {
	global $options_script_position_cfg;
	load_plugin_textdomain(
		$options_script_position_cfg['domain'],
		false,
		dirname(plugin_basename(__FILE__)) . '/languages'
	);
	$options_script_position_cfg['name'] = __(
		$options_script_position_cfg['name'],
		$options_script_position_cfg['domain']
	);
	register_setting(
		$options_script_position_cfg['namespace'],
		$options_script_position_cfg['options_id'],
		'options_script_position_validate_options'
	);
};

function options_script_position_add_settings_section($options_page_id) {
	global $options_script_position_cfg;
	add_settings_section(
		$options_script_position_cfg['namespace'] . '_section',
		__($options_script_position_cfg['name'], $options_script_position_cfg['domain']),
		'options_script_position_section',
		$options_page_id
	);
	add_settings_field(
		$options_script_position_cfg['options_id'],
		__('SCRIPT tag position', $options_script_position_cfg['domain']),
		'options_script_position_script_position',
		$options_page_id,
		$options_script_position_cfg['namespace'] . '_section'
	);
};

function options_script_position_add_settings_fields() {
	global $options_script_position_cfg;
	settings_fields($options_script_position_cfg['namespace']);
};

function options_script_position_section() {
	global $options_script_position_cfg;
	?>
	<p>
		<?php _e('Is Your theme support footer or not?', $options_script_position_cfg['domain']); ?>
	</p>
	<?php
};

function options_script_position_script_position() {
	global $options_script_position_cfg;
?>
	<div>
		<label>
			<input
				type="radio"
				name="<?php echo $options_script_position_cfg['options_id'] ?>"
				value="footer"
				<?php checked( $options_script_position_cfg['options'], 'footer' ); ?> 
			/>
			<?php _e('At the end of pages (wp_footer) - recommended.', $options_script_position_cfg['domain']) ?>
		</label>
	</div>
	<div>
		<label>
			<input
				type="radio"
				name="<?php echo $options_script_position_cfg['options_id'] ?>"
				value="head"
				<?php checked( $options_script_position_cfg['options'], 'head' ); ?> 
			/>
			<?php _e('At the begin of pages (wp_head), when wp_footer isn`t used in the theme.', $options_script_position_cfg['domain']) ?>
		</label>
	</div>
<?php
};

}; // if (!defined('OPTIONS_SCRIPT_POSITION'))
?>