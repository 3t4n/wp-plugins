<?php

/*
Plugin Name: Accessibility spring
Description: Accessibility spring provide an instruments for making your site more accessible for people with visually impaired. You can in simple way configure view of sidebar depending on the design of the site.
Version: 1.4.2
Author: Oleksandr Lysyi
*/

require_once(plugin_dir_path(__FILE__) . 'assets.php');
require_once(plugin_dir_path(__FILE__) . 'helper.php');
require_once(plugin_dir_path(__FILE__) . 'views/main.php');

// Set plugin label in main WordPress menu

add_action('admin_menu', 'access_spring_register_admin_settings');

// Hook the function to the activation event
register_activation_hook(__FILE__, 'as_activate_plugin');

function as_activate_plugin() {

	$settings = get_option('true_options');
	if (!empty($settings)){
    	as_send_custom_event_to_google_analytics($settings);
	}
}

function access_spring_register_admin_settings()
{
	add_menu_page(
		'Accessibility spring settings',
		'Accessibility spring',
		'manage_options',
		'accssibility-spring-settings',
		'access_spring_admin_settings',
		plugins_url('/images/main-icon.png', __FILE__),
		6
	);
}

function access_spring_admin_settings()
{
	global $true_page;

?>

	<div class="wrap">

		<h2>Configure your accessibility sidebar</h2>

		<form method="post" enctype="multipart/form-data" action="options.php">

			<?php
				settings_fields('true_options');
				do_settings_sections($true_page);
			?>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>

<?php

}

/* * Let's register settings This settings will be save in table true_options */

function access_spring_option_settings()
{

	global $true_page;

	register_setting('true_options', 'true_options');

	add_settings_section('true_section_1', 'Set allowed options for users of your site', '', $true_page);

	// This is radiobox for enabling or disabling some functions of plugin

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'font_size_changer',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('font_size_changer', 'Option to change font size', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'        => 'grayscale',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('grayscale', 'Option to set site grayscale', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'sepia',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('sepia', 'Option to set site in sepia', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'contrast',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('contrast', 'Option to change contrast', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'invert',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('invert', 'Option to invert the colors', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'custom_cursor',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('custom_cursor', 'Option to set the most contrast cursor', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'highlight_links',
		'vals'      => array('true' => 'Enable', 'false' => 'Disable')
	);

	add_settings_field('highlight_links', 'Option to highlight links', 'access_spring_render_settings', $true_page, 'true_section_1', $true_field_params);

	add_settings_section('true_section_2', 'Configure appearence', '', $true_page);

	$true_field_params = array(
		'type'      => 'text',
		'id'        => 'background-color',
		'desc'      => 'Color must be provided in HEX, like a "#f4b3a5", or just "red", "blue" etc',
		'label_for' => 'background-color'
	);

	add_settings_field('background-color_field', 'Background color of sidebar', 'access_spring_render_settings', $true_page, 'true_section_2', $true_field_params);

	$true_field_params = array(

		'type'      => 'text',
		'id'        => 'button_color',
		'desc'      => 'Color must be provided in HEX, like a "#f4b3a5", or just "red", "blue" etc',
		'label_for' => 'button_color'
	);

	add_settings_field('button_color_field', 'Color of buttons', 'access_spring_render_settings', $true_page, 'true_section_2', $true_field_params);

	$true_field_params = array(
		'type'      => 'text',
		'id'        => 'text_color',
		'desc'      => 'Color must be provide in HEX, like a "#f4b3a5", or just "red", "blue" etc',
		'label_for' => 'text_color'
	);

	add_settings_field('text_color_field', 'Color of text and labels', 'access_spring_render_settings', $true_page, 'true_section_2', $true_field_params);

	$true_field_params = array(
		'type'      => 'text',
		'id'        => 'close_color',
		'desc'      => 'Color must be provide in HEX, like a "#f4b3a5", or just "red", "blue" etc',
		'label_for' => 'close_color'
	);

	add_settings_field('close_color_field', 'Color of the close button', 'access_spring_render_settings', $true_page, 'true_section_2', $true_field_params);

	$true_field_params = array(
		'type'        => 'radio',
		'id'          => 'choose_icon',
		'vals'        => array(
			'one'   => '<img src="' .  plugins_url('/images/icon-1_inverse.png', __FILE__) . '">',
			'two'   => '<img src="' .  plugins_url('/images/icon-2_inverse.png', __FILE__) . '">',
			'three' => '<img src="' .  plugins_url('/images/icon-3_inverse.png', __FILE__) . '">',
			'four'  => '<img src="' .  plugins_url('/images/icon-4_inverse.png', __FILE__) . '">'
		)
	);

	add_settings_field('choose_icon', 'Option to choose icon', 'access_spring_render_settings', $true_page, 'true_section_2', $true_field_params);
}

add_action('admin_init', 'access_spring_option_settings');



function access_spring_render_settings($args)
{

	extract($args);


	$option_name = 'true_options';

	$o = get_option($option_name);
	if(!$o) {
		$o = [];
	}

	switch ($type) {

		case 'text':

			$o[$id] = isset($o[$id]) ? esc_attr(stripslashes($o[$id])) : '';

			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";

			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";

			break;

		case 'checkbox':

			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';

			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";

			echo ($desc != '') ? $desc : "";

			echo "</label>";

			break;

		case 'file':

			echo "<label><input type='file' id='$id' name='" . $option_name . "[$id]' /> ";

			echo "</label>";

			break;


		case 'radio':

			echo "<fieldset>";

			foreach ($vals as $v => $l) {

				$checked = isset($o[$id]) && $o[$id] === $v ? "checked='checked'" : '';

				echo "<label style='float: left; margin-left: 25px !important;'><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label>";
			}

			echo "</fieldset>";

			break;
	}
}

function  is_login_page(){
	return strpos($_SERVER['REQUEST_URI'], 'wp-login') === 1;
}

if ( ! is_admin() && ! is_login_page() ) {
    // Check if wp_body_open is being used by the theme
    if ( has_action( 'wp_body_open' ) ) {
        add_action( 'wp_body_open', 'as_render_sidebar' );
    }
    // If wp_body_open is not available, fallback to wp_footer
    elseif ( has_action( 'wp_footer' ) ) {
        add_action( 'wp_footer', 'as_render_sidebar' );
    } else {
        // If neither wp_body_open nor wp_footer are available, call the function directly
        add_action( 'wp_head', 'as_render_sidebar' ); // Fallback: render in wp_head as last resort
    }
}

?>