<?php

/**
 * The template for the toggle component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

?>

<label class="cdc-content__option__content__toggle">

    <div class="cdc-content__option__content__toggle__txt">

        <p class="cdc-content__option__content__toggle__txt__title"><?php esc_html_e( $toggle_title ); ?></p>

        <p class="cdc-content__option__content__toggle__txt__description"><?php esc_html_e( $toggle_description ); ?></p>

    </div>

    <div class="cdc-content__option__content__toggle__field">

        <input class="cdc-content__option__content__toggle__field__checkbox" type="checkbox" name="<?php echo esc_attr($toggle_id); ?>" id="<?php echo esc_attr($toggle_id); ?>" <?php checked( $toggle_value, 'yes' ); ?>>

        <span class="cdc-content__option__content__toggle__field__slider">
            
            <div class="cdc-content__option__content__toggle__field__slider__circle">
                <span class="cdc-content__option__content__toggle__field__slider__circle__check"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/toggle-check.svg' ); ?></span>
                <span class="cdc-content__option__content__toggle__field__slider__circle__close"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/times.svg' ); ?></span>
            </div>

        </span>

    </div>

</label>