<?php
/**
 * @var string $field_name
 * @var string $field_value
 * @var array $extra
 *
 * @see Aff::display_checkbox()
 */
?>
<input type="checkbox" name="<?php echo $field_name; ?>" value="1" <?php echo checked( 1, $field_value ); ?> />