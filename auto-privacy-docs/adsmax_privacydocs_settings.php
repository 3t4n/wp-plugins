<?php
// Adding the settings page
add_action( 'admin_menu', 'adsmax_privacydocs_menu' );

function adsmax_privacydocs_menu() {
  add_menu_page(
	'Auto Privacy Docs',
	'Auto Privacy Docs',
	'manage_options',
	'adsmax_privacydocs',
	'adsmax_privacydocs_page',
	'dashicons-format-image',
	6
);
} 

// register the settings
function adsmax_privacydocs_settings() {
  register_setting( 'adsmax_privacydocs-settings-group', 'adsmax_privacydocs-settings', 'adsmax_privacydocs_settings_validate' );

  add_settings_section(
    'adsmax_privacydocs-General',
	'',
	'adsmax_privacydocs_section_callback',
	'adsmax_privacydocs'
  );

  add_settings_field(
    'adsmax_privacydocs-field-1',
    'Your Company Name',
    'adsmax_privacydocs_field_1_callback',
    'adsmax_privacydocs',
    'adsmax_privacydocs-General'
  );

  add_settings_field(
    'adsmax_privacydocs-field-2',
    'Company Address',
    'adsmax_privacydocs_field_2_callback',
    'adsmax_privacydocs',
    'adsmax_privacydocs-General'
  );

  add_settings_field(
    'adsmax_privacydocs-field-3',
    'Company State',
    'adsmax_privacydocs_field_3_callback',
    'adsmax_privacydocs',
    'adsmax_privacydocs-General'
  );
	
	add_settings_field(
    'adsmax_privacydocs-field-4',
    'Contact Page Slug',
    'adsmax_privacydocs_field_4_callback',
    'adsmax_privacydocs',
    'adsmax_privacydocs-General'
  );
}
// Adding settings fields
add_action( 'admin_init', 'adsmax_privacydocs_settings' );


// settings page - update message 
function adsmax_privacydocs_notices() {
    if(isset($_GET['settings-updated']) && $_GET['page'] == 'adsmax_privacydocs'){
        add_settings_error('adsmax_privacydocs-notices', 'wpauto-legaldocs-settings-updated', __('Settings for Auto Privacy Docs saved.'), 'updated');
    }
    settings_errors('adsmax_privacydocs-notices');
}
add_action( 'admin_notices', 'adsmax_privacydocs_notices' );

// settings page - top message
function adsmax_privacydocs_section_callback() {
?>
	<div style="height:1px; clear:both;"></div>
<?php
}

// setting - company name
function adsmax_privacydocs_field_1_callback() {
	$options = get_option( 'adsmax_privacydocs-settings' );
	$field_1 = isset( $options['adsmax_privacydocs-field-1'] ) ? esc_html($options['adsmax_privacydocs-field-1']) : '';
	?>
	<input type="text" name="adsmax_privacydocs-settings[adsmax_privacydocs-field-1]" value="<?php echo esc_html($field_1); ?>" class="adsmax_privacydocs_input2">
	<div class="adsmax_privacydocs_helptext">The legal name of your company that you want in your privacy docs.</div>
	<?php
}


// setting - company address
function adsmax_privacydocs_field_2_callback() {
	$options = get_option( 'adsmax_privacydocs-settings' );
	$field_2 = isset( $options['adsmax_privacydocs-field-2'] ) ? esc_html($options['adsmax_privacydocs-field-2']) : '';
	?>
	<input type="text" name="adsmax_privacydocs-settings[adsmax_privacydocs-field-2]" value="<?php echo esc_html($field_2); ?>" class="adsmax_privacydocs_input2">
	<div class="adsmax_privacydocs_helptext">The address for your company above.</div>
	<?php
}


// setting - company state
function adsmax_privacydocs_field_3_callback() {
	$options = get_option( 'adsmax_privacydocs-settings' );
	$field_3 = isset( $options['adsmax_privacydocs-field-3'] ) ? esc_html($options['adsmax_privacydocs-field-3']) : '';
	?>
	<input type="text" name="adsmax_privacydocs-settings[adsmax_privacydocs-field-3]" value="<?php echo esc_html($field_3); ?>" class="adsmax_privacydocs_input2">
	<div class="adsmax_privacydocs_helptext">The legally registered State for your company above, spelled out. For example, use New York, not NY.</div>
	<?php
}


// setting - contact page slug
function adsmax_privacydocs_field_4_callback() {
	$options = get_option( 'adsmax_privacydocs-settings' );
	$field_4 = isset( $options['adsmax_privacydocs-field-4'] ) ? esc_html($options['adsmax_privacydocs-field-4']) : '';
	?>
	<input type="text" name="adsmax_privacydocs-settings[adsmax_privacydocs-field-4]" value="<?php echo esc_html($field_4); ?>" class="adsmax_privacydocs_input2">
	<div class="adsmax_privacydocs_helptext">The slug to your contact page. Easily found by clicking edit or quick edit on your contact page.</div>
	<?php
}
?>