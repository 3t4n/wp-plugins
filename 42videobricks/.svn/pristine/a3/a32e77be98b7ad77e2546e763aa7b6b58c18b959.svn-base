<?php
/**
 * This file handles 42videobricks settings credentials.
 *
 * @package 42videobricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
add_action( 'admin_init', 'videobricks42_register_settings' );

/**
 * Register settings.
 */
function videobricks42_register_settings() {
	register_setting( 'videobricks42_plugin_options', 'videobricks42_plugin_options', 'videobricks42_plugin_options_validate' );
	add_settings_section( 'api_settings', '42videobricks API key', 'videobricks42_plugin_section_text', 'videobricks42_plugin' );
	add_settings_field( 'videobricks42_plugin_setting_api_key', 'API Key', 'videobricks42_plugin_setting_api_key', 'videobricks42_plugin', 'api_settings' );
	add_settings_field( 'videobricks42_plugin_setting_environment', 'Select your environment:', 'videobricks42_plugin_setting_environment', 'videobricks42_plugin', 'api_settings' );
}
/**
 * Register section text.
 */
function videobricks42_plugin_section_text() {
	echo '<p><strong>42videobricks</strong> handles the complexity of video for you: no infrastructure required, no CapEx, no complexity!</p>
    <p>Simply add our embed code to your WordPress site or service to add video.</p>
    <p>If you don’t already have an API Key, you can sign up for a free sandbox account at  <a target="_blank" href="https://admin.42videobricks.com/">42videobricks.com</a>.</p>';
}

/**
 * Settings api key and env.
 */
function videobricks42_plugin_setting_api_key() {
	$options = get_option( 'videobricks42_plugin_options' );
	$api_key = '';
	if ( isset( $options['api_key'] ) ) {
		$api_key = $options['api_key'];
	}
	$html_content = "<input id='videobricks42_plugin_setting_api_key' name='videobricks42_plugin_options[api_key]' style='width:50%' type='text' value='" . esc_attr( $api_key ) . "' />";
	$allowed_html = array(
		'input' => array(
			'type'  => array(),
			'id'    => array(),
			'name'  => array(),
			'value' => array(),
			'style' => array(),
		),
	);
	echo wp_kses( $html_content, $allowed_html );
}

/**
 * Environment settings
 */
function videobricks42_plugin_setting_environment() {
	$options = get_option( 'videobricks42_plugin_options' );
	if ( empty( $options ) ) {
		$html_content = '<select name="videobricks42_plugin_options[env]" id="videobricks42_plugin_setting_environment"><option value="sandbox">Sandbox</option><option value="staging">Staging</option><option value="production">Production</option></select>';
	} else {
		$default_env = 'sandbox';
		if ( ! empty( $options['env'] ) ) {
			$default_env = $options['env'];
		}
		// Defined options.
		$options = array(
			'sandbox'    => 'Sandbox',
			'staging'    => 'Staging',
			'production' => 'Production',
		);
		// escaped here.
		$html_options = esc_attr( '' );
		foreach ( $options as $key => $value ) {
			$html_options .= sprintf(
				'<option value="%1$s" %3$s>%2$s</option>',
				esc_attr( $key ),
				esc_html( $value ),
				selected( $default_env, esc_attr( $key ), false )
			);
		}
		$html_content = '<select name="videobricks42_plugin_options[env]" id="videobricks42_plugin_setting_environment">' . $html_options . '</select>';
	}
	$allowed_html = array(
		'select' => array(
			'name'  => array(),
			'id'    => array(),
			'value' => array(),
		),
		'option' => array(
			'value'    => array(),
			'selected' => array(),
		),
	);

	echo wp_kses( $html_content, $allowed_html );
}

/**
 * Validation form settings.
 *
 * @param array $input Settings input.
 * @return mixed The input processed.
 */
function videobricks42_plugin_options_validate( $input ) {
	$input['api_key'] = sanitize_text_field( $input['api_key'] );
	$input['env']     = sanitize_text_field( $input['env'] );
	if ( empty( $input['api_key'] ) ) {
		add_settings_error( 'videobricks42_plugin_notice', 'api_key', 'Api key is not added Please fill in a correct apikey.' );
		return $input;
	}
	$response = videobricks42_verify_request( $input['api_key'], $input['env'] );

	if ( ! $response ) {
		add_settings_error( 'videobricks42_plugin_notice', 'api_key', 'Api key is not valid. Please fill in a correct apikey matching the selected environment.' );
		return $input;
	} else {
		add_settings_error( 'videobricks42_plugin_notice', 'api_key', 'Api key valid!', 'success' );
	}
	return $input;
}

/**
 * Render settings page.
 */
function videobricks42_api_render_settings_page() {
	?>
	<form action="options.php" method="post">
		<?php
		settings_fields( 'videobricks42_plugin_options' );
		settings_errors( 'videobricks42_plugin_notice' );
		do_settings_sections( 'videobricks42_plugin' );
		?>
		<input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
	</form>
	<?php
}
