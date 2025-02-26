<?php
/**
 * Tab Captcha Option
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form method="POST" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>" class="aioc-settings">
	<input type="hidden" name="aioc-tab-id" value="aioc-captcha-integration" />
	<input type="hidden" name="aioc-form-key" value="aioc_captcha_options" />
	<?php wp_nonce_field( 'aioc-captcha-nonce', 'aioc-nonce' ); ?>

	<div class="aioc-integrations">
		<h2><?php esc_html_e( 'Active Forms', 'all-in-one-captcha' ); ?></h2>
		<div class="aioc-integration-wrap">
			<?php aioc_get_captcha_integrations( 'active-plugin' ); ?>
		</div>
	</div>

	<div class="submit">
		<input type="submit" name="aioc-submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Save Changes', 'all-in-one-captcha' ); ?>">
	</div>

</form>

<div class="aioc-integrations">
	<h2><?php esc_html_e( 'Inactive Plugins', 'all-in-one-captcha' ); ?></h2>
	<div class="aioc-integration-wrap">
		<?php aioc_get_captcha_integrations( 'inactive-plugin' ); ?>
	</div>
</div>
