<?php
/**
 * Provides the markup for any checkbox and text field row
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin/partials
 */

?>

<div class="sio-field-group">
	<label class="sio-switch" for="<?php echo esc_attr( $atts['checkbox_id'] ); ?>">
		<input <?php checked( 1, $atts['checkbox_value'], true ); ?>
				class="<?php echo esc_attr( $atts['checkbox_class'] ); ?>"
				id="<?php echo esc_attr( $atts['checkbox_id'] ); ?>"
				name="<?php echo esc_attr( $atts['checkbox_name'] ); ?>"
				type="checkbox"
				value="1" />
		<div class="sio-slider"></div>
	</label>
	<label class="sio-account-url" for="<?php echo esc_attr( $atts['text_id'] ); ?>">
		<span><?php echo esc_attr( $atts['text_label'] ); ?></span>
		<input class="sio-input"
		       id="<?php echo esc_attr( $atts['text_id'] ); ?>"
		       name="<?php echo esc_attr( $atts['text_name'] ); ?>"
		       type="<?php echo esc_attr( $atts['text_type'] ); ?>"
		       placeholder="<?php echo esc_attr( $atts['text_placeholder'] ); ?>"
		       value="<?php echo esc_attr( $atts['text_value'] ); ?>" />
	</label>
</div>
