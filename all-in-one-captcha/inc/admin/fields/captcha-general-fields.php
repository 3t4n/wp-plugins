<?php
/**
 * Captcha General
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return General fields.
 *
 * @since 1.0.0
 *
 * @return array $form_fields Fields lists.
 */
function aioc_return_general_fields() {
	$form_fields = array(
		'key_settings'        => array(
			'name'    => esc_html__( 'Keys', 'all-in-one-captcha' ),
			'options' => array(
				'captcha_type'       => array(
					'label'    => esc_html__( 'Captcha Type', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_type',
				),
				'google_recaptcha'   => array(
					'label'    => esc_html__( 'Google reCAPTCHA', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_google_captcha_type',
				),
				'site_key'           => array(
					'label'    => esc_html__( 'Site Key', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_site_key',
				),
				'secret_key'         => array(
					'label'    => esc_html__( 'Secret Key', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_secret_key',
				),
				'verify_captcha_key' => array(
					'label'    => esc_html__( 'Verify Captcha Key', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_key_valid',
				),
			),
		),
		'appearance_settings' => array(
			'name'    => esc_html__( 'Appearance', 'all-in-one-captcha' ),
			'options' => array(
				'captcha_theme'              => array(
					'label'    => esc_html__( 'Theme (V2 & V2 Invisible)', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_theme',
				),
				'captcha_size'               => array(
					'label'    => esc_html__( 'Size (V2)', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_size',
				),
				'captcha_badge'              => array(
					'label'    => esc_html__( 'Badge position for Invisible', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_badge',
				),
				'captcha_score'              => array(
					'label'    => esc_html__( 'Captcha Score for v3', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_score',
				),
				'captcha_disable_btn'        => array(
					'label'    => esc_html__( 'Disable Button', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_disable_button',
				),
				'captcha_browser_language'   => array(
					'label'    => esc_html__( 'Detect Browser Language', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_browser_language',
				),
				'captcha_language'           => array(
					'label'    => esc_html__( 'Captcha Language', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_captcha_language',
				),
				'turnstile_theme'            => array(
					'label'    => esc_html__( 'Theme', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_turnstile_theme',
				),
				'turnstile_size'             => array(
					'label'    => esc_html__( 'Size', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_turnstile_size',
				),
				'turnstile__language'        => array(
					'label'    => esc_html__( 'Language', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_turnstile_language',
				),
				'turnstile__appearance_mode' => array(
					'label'    => esc_html__( 'Appearance Mode', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_turnstile_appearance',
				),
				'hcaptcha_theme'             => array(
					'label'    => esc_html__( 'Theme', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_hcaptcha_theme',
				),
				'hcaptcha_size'              => array(
					'label'    => esc_html__( 'Size', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_hcaptcha_size',
				),
				'hcaptcha_language'          => array(
					'label'    => esc_html__( 'Language', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_hcaptcha_language',
				),
			),
		),
		'advance_settings'    => array(
			'name'    => esc_html__( 'Advanced', 'all-in-one-captcha' ),
			'options' => array(
				'validation_erro_msg' => array(
					'label'    => esc_html__( 'Validation Error Message', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_validation_error_message',
				),
			),
		),
		'whitelist_settings'  => array(
			'name'    => esc_html__( 'Whitelisted IPs (Pro)', 'all-in-one-captcha' ),
			'options' => array(
				'whitelist_ip' => array(
					'label'    => esc_html__( 'IP Addresses', 'all-in-one-captcha' ),
					'field_cb' => 'aioc_field_ip_address',
				),
			),
		),
	);

	return $form_fields;
}

/**
 * Render captcha_type field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_type() {
	$captcha_type = aioc_option( 'aioc_captcha_type' );
	?>
	<select name="aioc_captcha_options[aioc_captcha_type]" id="captcha_type">
		<option value="google-recaptcha" <?php selected( $captcha_type, 'google-recaptcha' ); ?>><?php esc_html_e( 'Google reCAPTCHA', 'all-in-one-captcha' ); ?></option>
		<option value="cloudflare-turnstile" <?php selected( $captcha_type, 'cloudflare-turnstile' ); ?>><?php esc_html_e( 'Cloudflare Turnstile', 'all-in-one-captcha' ); ?></option>
		<option value="hcaptcha" <?php selected( $captcha_type, 'hcaptcha' ); ?>><?php esc_html_e( 'hCaptcha', 'all-in-one-captcha' ); ?></option>
		<option value="math-captcha" <?php selected( $captcha_type, 'math-captcha' ); ?>><?php esc_html_e( 'Built-in Math Captcha (Pro)', 'all-in-one-captcha' ); ?></option>
		<option value="slide-captcha" <?php selected( $captcha_type, 'slide-captcha' ); ?>><?php esc_html_e( 'Slide Captcha (Pro)', 'all-in-one-captcha' ); ?></option>
	</select>
	<div class="aioc-captcha-desc">
		<p class="google-recaptcha <?php echo esc_attr( aioc_is_captcha_type( 'google-recaptcha' ) ? 'show' : '' ); ?>">
			<?php
			/* translators: 1: link open, 2: link close */
			printf( esc_html__( 'Please %1$sregister your domain%2$s and get the required keys', 'all-in-one-captcha' ), '<a href="https://www.google.com/recaptcha/admin" target="_blank">', '</a>' );
			?>
		</p>
		<p class="cloudflare-turnstile <?php echo esc_attr( aioc_is_captcha_type( 'cloudflare-turnstile' ) ? 'show' : '' ); ?>">
			<?php
			/* translators: 1: link open, 2: link close */
			printf( esc_html__( 'Please %1$sregister your domain%2$s and get the required keys', 'all-in-one-captcha' ), '<a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank">', '</a>' );
			?>
		</p>
		<p class="hcaptcha <?php echo esc_attr( aioc_is_captcha_type( 'hcaptcha' ) ? 'show' : '' ); ?>">
			<?php
			/* translators: 1: link open, 2: link close */
			printf( esc_html__( 'Please %1$sregister your domain%2$s and get the required keys', 'all-in-one-captcha' ), '<a href="https://www.hcaptcha.com/signup-interstitial" target="_blank">', '</a>' );
			?>
		</p>
	</div>
	<?php
}

/**
 * Render google_captcha_type field.
 *
 * @since 1.0.0
 */
function aioc_field_google_captcha_type() {
	$google_captcha_type = aioc_option( 'aioc_google_captcha_type' );
	?>
	<div class="google_captcha_type aioc-input-captcha">
		<label><input type="radio" name="aioc_captcha_options[aioc_google_captcha_type]" value="v2" <?php checked( 'v2', $google_captcha_type ); ?> /><?php esc_html_e( 'V2', 'all-in-one-captcha' ); ?></label>&nbsp;
		<label><input type="radio" name="aioc_captcha_options[aioc_google_captcha_type]" value="v2-invisible" <?php checked( 'v2-invisible', $google_captcha_type ); ?> /><?php esc_html_e( 'Invisible', 'all-in-one-captcha' ); ?></label>&nbsp;
		<label><input type="radio" name="aioc_captcha_options[aioc_google_captcha_type]" value="v3" <?php checked( 'v3', $google_captcha_type ); ?> /><?php esc_html_e( 'V3', 'all-in-one-captcha' ); ?></label>
	</div>
	<?php
}

/**
 * Register site_key field.
 *
 * @since 1.0.0
 */
function aioc_field_site_key() {
	$site_key = aioc_option( 'aioc_site_key' );
	?>
	<input type="text" name="aioc_captcha_options[aioc_site_key]" id="site_key" class="regular-text aioc-input-key" value="<?php echo esc_attr( $site_key ); ?>" />
	<?php
}

/**
 * Register secret_key field.
 *
 * @since 1.0.0
 */
function aioc_field_secret_key() {
	$secret_key = aioc_option( 'aioc_secret_key' );
	?>
	<input type="text" name="aioc_captcha_options[aioc_secret_key]" id="secret_key" class="regular-text aioc-input-key" value="<?php echo esc_attr( $secret_key ); ?>" />
	<div id="aioc-output"></div>
	<?php
}


/**
 * Register captcha_key_valid field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_key_valid() {
	$captcha_key_valid = aioc_option( 'aioc_captcha_key_valid' );
	?>
	<input type="hidden" name="aioc_captcha_options[aioc_captcha_key_valid]" id="captcha_key_valid" value="<?php echo esc_attr( $captcha_key_valid ); ?>" />
	<div class="aioc-captcha-wrapper">
		<div id="aioc-captcha"></div>
		<button class="button-secondary" id="aioc-verify-key" <?php echo ( false === aioc_key_setup_status() ) ? 'disabled' : ''; ?> <?php echo ( 1 === absint( $captcha_key_valid ) ) ? 'style=display:none;' : ''; ?>><?php esc_html_e( 'Verify Keys', 'all-in-one-captcha' ); ?></button>
		<button class="button-secondary" id="aioc-verification" style="display:none"><?php esc_html_e( 'Verify Now', 'all-in-one-captcha' ); ?></button>
	</div>
	<div class="key-validation-msg" <?php echo ( 1 === absint( $captcha_key_valid ) ) ? 'style=color:green;' : ''; ?>>
		<?php
		if ( 1 === absint( $captcha_key_valid ) ) {
			esc_html_e( 'Captcha verified successfully.', 'all-in-one-captcha' );
		}
		?>
	</div>
	<?php
}

/**
 * Render captcha_theme field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_theme() {
	$captcha_theme = aioc_option( 'aioc_captcha_theme' );
	?>
	<select name="aioc_captcha_options[aioc_captcha_theme]" class="captcha_theme aioc-theme aioc-input-captcha">
		<option value="light" <?php selected( $captcha_theme, 'light' ); ?>><?php esc_html_e( 'Light', 'all-in-one-captcha' ); ?></option>
		<option value="dark" <?php selected( $captcha_theme, 'dark' ); ?>><?php esc_html_e( 'Dark', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render captcha_size field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_size() {
	$captcha_size = aioc_option( 'aioc_captcha_size' );
	?>
	<select name="aioc_captcha_options[aioc_captcha_size]" class="captcha_size aioc-size aioc-input-captcha">
		<option value="normal" <?php selected( $captcha_size, 'normal' ); ?>><?php esc_html_e( 'Normal', 'all-in-one-captcha' ); ?></option>
		<option value="compact" <?php selected( $captcha_size, 'compact' ); ?>><?php esc_html_e( 'Compact', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render captcha_score field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_score() {
	$captcha_score = aioc_option( 'aioc_captcha_score' );
	$score_values  = aioc_get_captcha_scores();
	?>

	<select name="aioc_captcha_options[aioc_captcha_score]" class="captcha_score aioc-input-captcha">
		<?php foreach ( $score_values as $value ) : ?>
			<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $captcha_score, $value ); ?>> <?php echo esc_html( $value ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * Render captcha_badge field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_badge() {
	$captcha_badge = aioc_option( 'aioc_captcha_badge' );
	?>
	<select name="aioc_captcha_options[aioc_captcha_badge]" class="captcha_badge aioc-input-captcha">
		<option value="bottomright" <?php selected( $captcha_badge, 'bottomright' ); ?>><?php esc_html_e( 'Bottom Right', 'all-in-one-captcha' ); ?></option>
		<option value="bottomleft" <?php selected( $captcha_badge, 'bottomleft' ); ?>><?php esc_html_e( 'Bottom Left', 'all-in-one-captcha' ); ?></option>
		<option value="inline" <?php selected( $captcha_badge, 'inline' ); ?>><?php esc_html_e( 'Inline', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render browser_language field.
 *
 * @since 1.0.0
 */
function aioc_field_browser_language() {
	$browser_language = aioc_option( 'aioc_browser_language' );
	?>
	<label class="aioc-input">
		<input type="checkbox" name="aioc_captcha_options[aioc_browser_language]" class="browser_language aioc-input-captcha" value="1" <?php checked( 1, $browser_language ); ?> />
		<div class="aioc-input-toggle"><span class="aioc-toggle"></span></div>
		<?php esc_html_e( 'Automatically detect the browser language.', 'all-in-one-captcha' ); ?>
	</label>
	<?php
}

/**
 * Render captcha_language field.
 *
 * @since 1.0.0
 */
function aioc_field_captcha_language() {
	$captcha_language  = aioc_option( 'aioc_captcha_language' );
	$default           = array( '' => esc_html__( '&mdash; Select &mdash;', 'all-in-one-captcha' ) );
	$languages_options = aioc_get_language_options( 'google-recaptcha', $default );
	?>
	<select name="aioc_captcha_options[aioc_captcha_language]" class="captcha_language aioc-input-captcha">
		<?php foreach ( $languages_options as $key => $lang ) : ?>
			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $captcha_language, $key ); ?>><?php echo esc_html( $lang ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * Render disable_button field.
 *
 * @since 1.0.0
 */
function aioc_field_disable_button() {
	$disable_button = aioc_option( 'aioc_disable_button' );
	?>
	<label class="aioc-input">
		<input type="checkbox" name="aioc_captcha_options[aioc_disable_button]" class="disable_button aioc-input-captcha" value="1" <?php checked( 1, $disable_button ); ?> />
		<div class="aioc-input-toggle"><span class="aioc-toggle"></span></div>
		<?php esc_html_e( 'Disable form submit button.', 'all-in-one-captcha' ); ?>
	</label>
	<?php
}

/**
 * Render turnstile_theme field.
 *
 * @since 1.0.0
 */
function aioc_field_turnstile_theme() {
	$turnstile_theme = aioc_option( 'aioc_turnstile_theme' );
	?>
	<select name="aioc_captcha_options[aioc_turnstile_theme]" class="turnstile_theme aioc-theme aioc-input-cf">
		<option value="light" <?php selected( $turnstile_theme, 'light' ); ?>><?php esc_html_e( 'Light', 'all-in-one-captcha' ); ?></option>
		<option value="dark" <?php selected( $turnstile_theme, 'dark' ); ?>><?php esc_html_e( 'Dark', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render turnstile_size field.
 *
 * @since 1.0.0
 */
function aioc_field_turnstile_size() {
	$turnstile_size = aioc_option( 'aioc_turnstile_size' );
	?>
	<select name="aioc_captcha_options[aioc_turnstile_size]" class="turnstile_size aioc-size aioc-input-cf">
		<option value="normal" <?php selected( $turnstile_size, 'normal' ); ?>><?php esc_html_e( 'Normal', 'all-in-one-captcha' ); ?></option>
		<option value="compact" <?php selected( $turnstile_size, 'compact' ); ?>><?php esc_html_e( 'Compact', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render turnstile_language field.
 *
 * @since 1.0.0
 */
function aioc_field_turnstile_language() {
	$turnstile_language = aioc_option( 'aioc_turnstile_language' );
	$default            = array( '' => esc_html__( '&mdash; Select &mdash;', 'all-in-one-captcha' ) );
	$languages_options  = aioc_get_language_options( 'cfturnstile', $default );
	?>
	<select name="aioc_captcha_options[aioc_turnstile_language]" class="turnstile_language aioc-input-cf">
		<?php foreach ( $languages_options as $key => $lang ) : ?>
			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $turnstile_language, $key ); ?>><?php echo esc_html( $lang ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * Render turnstile_appearance field.
 *
 * @since 1.0.0
 */
function aioc_field_turnstile_appearance() {
	$turnstile_appearance = aioc_option( 'aioc_turnstile_appearance' );
	?>
	<select name="aioc_captcha_options[aioc_turnstile_appearance]" class="turnstile_appearance aioc-input-cf">
		<option value="always" <?php selected( $turnstile_appearance, 'always' ); ?>><?php esc_html_e( 'Always', 'all-in-one-captcha' ); ?></option>
		<option value="interaction-only" <?php selected( $turnstile_appearance, 'interaction-only' ); ?>><?php esc_html_e( 'Interaction Only', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render hcaptcha_theme field.
 *
 * @since 1.0.0
 */
function aioc_field_hcaptcha_theme() {
	$hcaptcha_theme = aioc_option( 'aioc_hcaptcha_theme' );
	?>
	<select name="aioc_captcha_options[aioc_hcaptcha_theme]" class="hcaptcha_theme aioc-theme aioc-input-hcaptcha">
		<option value="light" <?php selected( $hcaptcha_theme, 'light' ); ?>><?php esc_html_e( 'Light', 'all-in-one-captcha' ); ?></option>
		<option value="dark" <?php selected( $hcaptcha_theme, 'dark' ); ?>><?php esc_html_e( 'Dark', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render hcaptcha_size field.
 *
 * @since 1.0.0
 */
function aioc_field_hcaptcha_size() {
	$hcaptcha_size = aioc_option( 'aioc_hcaptcha_size' );
	?>
	<select name="aioc_captcha_options[aioc_hcaptcha_size]" class="hcaptcha_size aioc-size aioc-input-hcaptcha">
		<option value="normal" <?php selected( $hcaptcha_size, 'normal' ); ?>><?php esc_html_e( 'Normal', 'all-in-one-captcha' ); ?></option>
		<option value="compact" <?php selected( $hcaptcha_size, 'compact' ); ?>><?php esc_html_e( 'Compact', 'all-in-one-captcha' ); ?></option>
	</select>
	<?php
}

/**
 * Render hcaptcha_language field.
 *
 * @since 1.0.0
 */
function aioc_field_hcaptcha_language() {
	$hcaptcha_language = aioc_option( 'aioc_hcaptcha_language' );
	$default           = array( '' => esc_html__( '&mdash; Select &mdash;', 'all-in-one-captcha' ) );
	$languages_options = aioc_get_language_options( 'hcaptcha', $default );
	?>
	<select name="aioc_captcha_options[aioc_hcaptcha_language]" class="hcaptcha_language aioc-input-hcaptcha">
		<?php foreach ( $languages_options as $key => $lang ) : ?>
			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $hcaptcha_language, $key ); ?>><?php echo esc_html( $lang ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * Register validation_error_message field.
 *
 * @since 1.0.0
 */
function aioc_field_validation_error_message() {
	$validation_error_message = aioc_option( 'aioc_validation_error_message' );
	?>
	<input type="text" name="aioc_captcha_options[aioc_validation_error_message]" id="validation_error_message" class="regular-text" value="<?php echo esc_attr( $validation_error_message ); ?>" />
	<?php
}

/**
 * Render disable_button field.
 *
 * @since 1.0.0
 */
function aioc_field_ip_address() {
	$ip_address = aioc_option( 'aioc_ip_address' );
	?>
	<textarea name="aioc_captcha_options[aioc_ip_address]" placeholder="Enter one IP per row." id="ip_address" cols="50" rows="8"><?php echo wp_kses_post( $ip_address ); ?></textarea>
	<?php
}
