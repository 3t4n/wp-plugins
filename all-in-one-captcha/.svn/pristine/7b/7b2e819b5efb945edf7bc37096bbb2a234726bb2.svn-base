<?php
/**
 * Login Limit Settings
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return login setting fields.
 *
 * @since 1.0.0
 *
 * @return array $form_fields Fields lists.
 */
function aioc_login_setting_fields() {
	$form_fields = array(
		'login_limit_settings' => array(
			'name'    => 'Login Limit Settings (Pro)',
			'options' => array(
				'login_limit'      => array(
					'label'    => 'Login Limit',
					'field_cb' => 'aioc_field_enable_login_limit',
				),
				'login_attempts'   => array(
					'label'    => 'Login attempts',
					'field_cb' => 'aioc_field_login_attempts',
				),
				'lockout_duration' => array(
					'label'    => 'Lockout Duration',
					'field_cb' => 'aioc_field_lockout_duration',
					true,
				),
				'increase_login'   => array(
					'label'    => 'Increase Login attempts',
					'field_cb' => 'aioc_field_increase_login_attempts',
				),
				'increase_lockout' => array(
					'label'    => 'Increase Lockout Duration',
					'field_cb' => 'aioc_field_increase_lockout_duration',
				),
				'retries_reset'    => array(
					'label'    => 'Retries Reset Duration',
					'field_cb' => 'aioc_field_valid_duration',
				),
				'block_users'      => array(
					'label'    => 'Block Users',
					'field_cb' => 'aioc_field_blacklist_user',
				),
				'recovery_url'     => array(
					'label'    => 'Recovery URL',
					'field_cb' => 'aioc_field_recovery_key',
				),
			),
		),
	);

	return $form_fields;
}

/**
 * Render login_attempts field.
 *
 * @since 1.0.0
 */
function aioc_field_enable_login_limit() {
	$enable_login_limit = aioc_option( 'aioc_enable_login_limit', 'aioc_login_options' );
	?>
	<label class="aioc-input">
		<input type="checkbox" name="aioc_login_options[aioc_enable_login_limit]" id="enable_login_limit" value="1" <?php checked( 1, $enable_login_limit ); ?> />
		<div class="aioc-input-toggle"><span class="aioc-toggle"></span></div>
		Enable login limit.
	</label>
	<?php
}
/**
 * Render login_attempts field.
 *
 * @since 1.0.0
 */
function aioc_field_login_attempts() {
	$login_attempts = aioc_option( 'aioc_login_attempts', 'aioc_login_options' );
	?>
	<input type="text" maxlength="4" size="3" name="aioc_login_options[aioc_login_attempts]" id="login_attempts" value="<?php echo esc_attr( $login_attempts ); ?>" />
	Login retries before locked out.
	<?php
}

/**
 * Render lockout_duration field.
 *
 * @since 1.0.0
 */
function aioc_field_lockout_duration() {
	$lockout_duration = aioc_option( 'aioc_lockout_duration', 'aioc_login_options' );
	?>
	<input type="text" maxlength="4" size="3" name="aioc_login_options[aioc_lockout_duration]" id="lockout_duration" value="<?php echo esc_attr( $lockout_duration ); ?>" />
	Lockout for a minutes.
	<?php
}

/**
 * Render increase_login_attempts field.
 *
 * @since 1.0.0
 */
function aioc_field_increase_login_attempts() {
	$increase_login_attempts = aioc_option( 'aioc_increase_login_attempts', 'aioc_login_options' );
	?>
	<input type="text" maxlength="4" size="3" name="aioc_login_options[aioc_increase_login_attempts]" id="increase_login_attempts" value="<?php echo esc_attr( $increase_login_attempts ); ?>" />
	Increase login retries after first locked out.
	<?php
}

/**
 * Render increase_lockout_duration field.
 *
 * @since 1.0.0
 */
function aioc_field_increase_lockout_duration() {
	$increase_lockout_duration = aioc_option( 'aioc_increase_lockout_duration', 'aioc_login_options' );
	?>
	<input type="text" maxlength="4" size="3" name="aioc_login_options[aioc_increase_lockout_duration]" id="increase_lockout_duration" value="<?php echo esc_attr( $increase_lockout_duration ); ?>" />
	Increase Lockout time in hours after first locked out.
	<?php
}

/**
 * Render valid_duration field.
 *
 * @since 1.0.0
 */
function aioc_field_valid_duration() {
	$valid_duration = aioc_option( 'aioc_valid_duration', 'aioc_login_options' );
	?>
	<input type="text" maxlength="4" size="3" name="aioc_login_options[aioc_valid_duration]" id="valid_duration" value="<?php echo esc_attr( $valid_duration ); ?>" />
	Lockouts hours until retries are reset.
	<?php
}

/**
 * Render blacklist_user field.
 *
 * @since 1.0.0
 */
function aioc_field_blacklist_user() {
	$blacklist_user = aioc_option( 'aioc_blacklist_user', 'aioc_login_options' );
	?>
	<textarea name="aioc_login_options[aioc_blacklist_user]" placeholder="Enter one username per row." id="blacklist_user" cols="50" rows="8"><?php echo wp_kses_post( $blacklist_user ); ?></textarea>
	<?php
}

/**
 * Render recovery_key field.
 *
 * @since 1.0.0
 */
function aioc_field_recovery_key() {
	$recovery_key = aioc_option( 'aioc_recovery_key', 'aioc_login_options' );
	?>
	<input type="text" maxlength="18" name="aioc_login_options[aioc_recovery_key]" id="recovery_key" class="regular-text" value="<?php echo esc_attr( $recovery_key ); ?>" />
	<?php
	if ( ! empty( $recovery_key ) ) :
		$recovery_url = home_url( '/?aioc_recovery_key=' . $recovery_key );
		?>
	<a href="<?php echo esc_url( $recovery_url ); ?>" target="_blank"><?php echo esc_html( $recovery_url ); ?></a>
	<?php endif; ?>
	<p><button id="aioc_generate_key" class="button button-secondary">Generate key</button></p>
	<?php
}
