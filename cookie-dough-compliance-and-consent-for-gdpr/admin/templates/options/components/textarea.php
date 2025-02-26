<?php

/**
 * The template for the textarea component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

?>

<label class="cdc-content__option__content__textarea">

    <p class="cdc-content__option__content__textarea__title"><?php esc_html_e( $textarea_title ); ?></p>

    <textarea class="cdc-content__option__content__textarea__field" id="<?php echo esc_attr($textarea_id); ?>" name="<?php echo esc_attr($textarea_id); ?>"><?php echo esc_textarea($textarea_value); ?></textarea>

</label>