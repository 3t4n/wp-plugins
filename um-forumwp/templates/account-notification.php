<?php
/**
 *
 * @version 2.1.8
 *
 * @var string $field_key
 * @var bool   $enabled
 * @var string $email_key
 * @var array  $email_data
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="um-field-area">
	<label class="um-field-checkbox<?php if ( ! empty( $enabled ) ) { ?> active<?php } ?>">
		<input type="checkbox" name="<?php echo esc_attr( $field_key ); ?>" value="1" <?php checked( ! empty( $enabled ) ); ?> />
		<span class="um-field-checkbox-state">
			<i class="um-icon-android-checkbox-<?php if ( ! empty( $enabled ) ) { ?>outline<?php } else { ?>outline-blank<?php } ?>"></i>
		</span>
		<span class="um-field-checkbox-option"><?php echo esc_html( $email_data['title'] ); ?></span>
	</label>
	<div class="um-clear"></div>
</div>
