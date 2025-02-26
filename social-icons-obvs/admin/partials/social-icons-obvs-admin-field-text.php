<?php
/**
 * Provides the markup for any text field.
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin/partials
 */

?>

<label for="<?php echo esc_attr( $atts['id'] ); ?>">
	<span><?php echo esc_attr( $atts['label'] ); ?></span>
	<input class="sio-input <?php echo esc_attr( $atts['class'] ); ?>"
	       id="<?php echo esc_attr( $atts['id'] ); ?>"
	       min="<?php echo esc_attr( $atts['min'] ); ?>"
	       name="<?php echo esc_attr( $atts['name'] ); ?>"
	       type="<?php echo esc_attr( $atts['type'] ); ?>"
	       placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
	       value="<?php echo esc_attr( $atts['value'] ); ?>" />
</label>
<span class="description sio-description"><?php esc_html_e( $atts['description'], $this->plugin_name ); ?></span>
