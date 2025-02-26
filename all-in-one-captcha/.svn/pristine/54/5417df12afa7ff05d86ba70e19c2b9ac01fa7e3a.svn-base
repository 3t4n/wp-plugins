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
	<input type="hidden" name="aioc-form-key" value="aioc_captcha_options" />
	<?php wp_nonce_field( 'aioc-captcha-nonce', 'aioc-nonce' ); ?>

	<?php
	$form_fields = aioc_return_general_fields();
	$count       = 1;
	foreach ( $form_fields as $field ) :
		?>

		<?php if ( ! empty( $field['name'] ) ) : ?>
			<h3 class="aioc-accordion<?php echo esc_attr( 1 === $count ? ' active' : '' ); ?>"><?php echo esc_html( $field['name'] ); ?></h3>
		<?php endif; ?>

		<div class="aioc-panel">

			<?php foreach ( $field['options'] as $option ) : ?>
				<div class="aioc-panel-options">

					<?php if ( ! empty( $option['label'] ) ) : ?>
						<label><?php echo esc_html( $option['label'] ); ?></label>
					<?php endif; ?>

					<?php if ( is_callable( $option['field_cb'] ) ) : ?>
						<div class="aioc-field"><?php call_user_func( $option['field_cb'] ); ?></div>
					<?php endif; ?>

				</div>
			<?php endforeach; ?>

		</div>
		<?php
		++$count;
	endforeach;
	?>

	<div class="submit">
		<input type="submit" name="aioc-submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Save Changes', 'all-in-one-captcha' ); ?>">
	</div>

</form>
