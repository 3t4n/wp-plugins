<?php

/**
 * The template for the image component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$img_empty  = empty($image_value);
$img_custom = !in_array( $image_value, $image_static ) && !$img_empty;
?>

<div class="cdc-content__option__content__image">

    <div class="cdc-content__option__content__image__title"><?php esc_html_e( $image_title ); ?></div>

    <div class="cdc-content__option__content__image__images">

        <?php foreach ( $image_static as $image_url ) : ?>

            <div class="cdc-content__option__content__image__images__item <?php echo esc_attr( $image_url == $image_value ? 'selected' : '' ); ?>">
                <img src="<?php echo esc_url( $image_url ); ?>">
            </div>

        <?php endforeach; ?>

        <?php if ( $image_custom_image ): ?>

            <div class="cdc-content__option__content__image__images__item custom <?php echo esc_attr( $img_custom ? 'selected' : '' ); ?>">
    
                <div class="cdc-content__option__content__image__images__item__add show">
                    <div class="cdc-content__option__content__image__images__item__add__container"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/plus.svg' ); ?></div>
                </div>
    
                <div class="cdc-content__option__content__image__images__item__remove <?php echo esc_attr( $img_custom ? 'show' : '' ); ?>"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/minus.svg' ); ?></div>
    
                <div class="cdc-content__option__content__image__images__item__container">
                    <?php if ( $img_custom ) : ?>
                        <img src="<?php echo esc_url($image_value); ?>">
                    <?php endif; ?>
                </div>
    
            </div>
            
        <?php endif; ?>

        <?php if ( $image_no_image ): ?>
            <div class="cdc-content__option__content__image__images__item empty <?php echo esc_attr( $img_empty ? 'selected' : '' ); ?>"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/no-image.svg' ); ?></div>
        <?php endif; ?>

    </div>  

    <input class="cdc-content__option__content__image__input" type="hidden" name="<?php echo esc_attr($image_id); ?>" id="<?php echo esc_attr($image_id); ?>" value="<?php echo esc_attr($image_value); ?>" >

</div>