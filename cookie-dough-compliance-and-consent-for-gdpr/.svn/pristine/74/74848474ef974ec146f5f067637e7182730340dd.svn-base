<?php

/**
 * The template for the alignment component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$params = json_encode( array_keys( $alignment_options ) );
?>

<div class="cdc-content__option__content__alignment" data-params="<?php echo esc_attr( $params ); ?>">

    <div class="cdc-content__option__content__alignment__title"><?php esc_html_e( $alignment_title ); ?></div>

    <div class="cdc-content__option__content__alignment__body">

        <div class="cdc-content__option__content__alignment__body__icon <?php echo esc_attr($alignment_value); ?>">
            <?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/alignment-arrow.svg' ); ?>
        </div>

        <div class="cdc-content__option__content__alignment__body__text">

            <?php foreach ( $alignment_options as $option_key => $option_text ): ?>
                <div class="cdc-content__option__content__alignment__body__text__item <?php echo esc_attr( $option_key == $alignment_value ? 'selected' : '' ); ?>" data-key="<?php echo esc_attr($option_key); ?>">
                    <?php esc_html_e( $option_text ); ?>
                </div>
            <?php endforeach; ?>

        </div>

        <input class="cdc-content__option__content__alignment__body__input" type="hidden" name="<?php echo esc_attr($alignment_id); ?>" id="<?php echo esc_attr($alignment_id); ?>" value="<?php echo esc_attr($alignment_value); ?>"/>

    </div>

</div>