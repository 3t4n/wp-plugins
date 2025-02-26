<?php

/**
 * The template for the input component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

?>

<label class="cdc-content__option__content__input">

    <p class="cdc-content__option__content__input__title"><?php esc_html_e( $input_title ); ?></p>

    <input class="cdc-content__option__content__input__field" type="text" id="<?php echo esc_attr($input_id); ?>" name="<?php echo esc_attr($input_id); ?>" value="<?php echo esc_attr($input_value); ?>" >

    <?php if ( !empty( $input_description) ): ?>
        <div class="cdc-content__option__content__input__description"><?php esc_html_e( $input_description ); ?></div>
    <?php endif; ?>

</label>