<?php
/**
 * @var string $field_name
 * @var string $field_value
 * @var array $extra
 *
 * @see Aff::display_radio()
 */

foreach ( $extra['options'] as $value => $title ) { ?>
	<label><input type="radio" name="<?php echo $field_name; ?>" value="<?php echo $value; ?>" <?php checked( $field_value, $value ); ?>/>
		<?php echo $title; ?>
	</label><br/>
	<?php
}