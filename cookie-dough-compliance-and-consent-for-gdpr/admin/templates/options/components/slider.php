<?php

/**
 * The template for the slider component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$params = json_encode( array(
    'default'   => $slider_value,
    'min'       => $slider_min,
    'max'       => $slider_max,
    'step'      => $slider_step
));
?>

<div class="cdc-content__option__content__slider" data-params="<?php echo esc_attr( $params ); ?>" >

    <div class="cdc-content__option__content__slider__title"><?php esc_html_e( $slider_title ); ?></div>

    <div class="cdc-content__option__content__slider__body">

        <div class="cdc-content__option__content__slider__body__top">
            <div class="cdc-content__option__content__slider__body__slider"></div>
        </div>

        <div class="cdc-content__option__content__slider__body__bottom">
            <input class="cdc-content__option__content__slider__body__input" type="text" name="<?php echo esc_attr($slider_id); ?>" id="<?php echo esc_attr($slider_id); ?>" value="<?php echo esc_attr($slider_value); ?>"/>
            <div class="cdc-content__option__content__slider__body__text"><?php esc_html_e( $slider_unit ); ?></div>
        </div>

    </div>

</div>