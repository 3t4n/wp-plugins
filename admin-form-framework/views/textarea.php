<?php
/**
 * @var string $field_name
 * @var string $field_value
 * @var array $extra
 *
 * @see Aff::display_textarea()
 */
?>
<textarea class="large-text" name="<?php echo $field_name; ?>"><?php echo esc_textarea( $field_value ); ?></textarea>