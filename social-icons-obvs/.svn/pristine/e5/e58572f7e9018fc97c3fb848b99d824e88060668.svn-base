<?php
/**
 * Provides the markup for any select field
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {
	?>

	<label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], $this->plugin_name ); ?>: </label>

	<?php
}
?>

<select aria-label="<?php esc_attr( $atts['aria'] ); ?>"
        class="<?php echo esc_attr( $atts['class'] ); ?>"
        id="<?php echo esc_attr( $atts['id'] ); ?>"
        name="<?php echo esc_attr( $atts['name'] ); ?>">

	<?php
	if ( ! empty( $atts['blank'] ) ) {
		?>

		<option value><?php esc_html_e( $atts['blank'], $this->plugin_name ); ?></option>

		<?php
	}

	foreach ( $atts['selections'] as $selection ) {

		if ( is_array( $selection ) ) {

			$label = $selection['label'];
			$value = $selection['value'];

		} else {

			$label = strtolower( $selection );
			$value = strtolower( $selection );

		}
		?>

		<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $atts['value'], $value ); ?>>
			<?php esc_html_e( $label, $this->plugin_name ); ?>
		</option>

		<?php
	}
	?>

</select>
<span class="description sio-description"><?php esc_html_e( $atts['description'], $this->plugin_name ); ?></span>
