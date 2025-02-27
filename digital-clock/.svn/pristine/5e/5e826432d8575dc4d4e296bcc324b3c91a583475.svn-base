<?php

add_action('admin_menu', 'dgc_menu_register');

function dgc_menu_register()
{
	add_menu_page(
		'Digital Clock Options',          // Page Title
		'Digital Clock',                  // Menu Title
		'manage_options',                 // Capability
		'digital-clock-options',          // Menu Slug
		'dgc_all_fields_show',            // Callback Function            
		'dashicons-clock',                // Icon
		7                                  // Position
	);
}

add_action('admin_init', 'dgc_all_fields');

// Settings Callback Function
function dgc_all_fields()
{
	// Clock Control Section
	add_settings_section(
		'dgc_section0',                  // ID of section
		'Clock Control',                 // Title
		null,                            // Callback Function
		'dgc-control-options'            // Page
	);

	add_settings_field(
		'dgc_clock_select',              // ID
		'Select Clock',                  // Title
		'dgc_clock_select_callback',     // Callback Function
		'dgc-control-options',           // Page
		'dgc_section0'                   // Section
	);

	add_settings_field(
		'dgc_clock_shortcode',            // ID
		'Clock Shortcode',                // Title
		'dgc_clock_shortcode_callback',   // Callback Function
		'dgc-control-options',            // Page
		'dgc_section0'                    // Section
	);

	register_setting('dgc_section0', 'dgc_clock_select');
	register_setting('dgc_section0', 'dgc_clock_shortcode');
}

// Display the settings page
function dgc_all_fields_show()
{
?>
	<h1 style="padding: 5px 0 10px 0;">Digital Clock Control Panel</h1>
	<p><?php settings_errors(); ?></p>
	<form action="options.php" method="post">
		<?php
		settings_fields('dgc_section0');
		do_settings_sections('dgc-control-options');
		submit_button();
		?>
	</form>
<?php
}

// Callback for clock selection
function dgc_clock_select_callback()
{
	$selected_option = get_option('dgc_clock_select');
?>
	<select name="dgc_clock_select" style="width: 150px">
		<option value="">Select</option>
		<option value="c1" <?php selected($selected_option, 'c1'); ?>>Clock 1 Light</option>
		<option value="c2" <?php selected($selected_option, 'c2'); ?>>Clock 1 Dark</option>
		<option value="c3" <?php selected($selected_option, 'c3'); ?>>Clock 2</option>
	</select>
<?php
}

// Callback for displaying the shortcode
function dgc_clock_shortcode_callback()
{
?>
	<input type="text" value="[dgc_shortcode]" style="width: 150px" readonly>
<?php
}
