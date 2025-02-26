<?php

/**
 * The template for the svg component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$svg_empty  = empty($svg_value);
$svg_custom = !in_array( $svg_value, $svg_static ) && !$svg_empty;
?>

<div class="cdc-content__option__content__svg">

    <div class="cdc-content__option__content__svg__title"><?php esc_html_e( $svg_title ); ?></div>

    <div class="cdc-content__option__content__svg__images">

        <?php foreach ( $svg_static as $key => $svg_url ) : ?>

            <div class="cdc-content__option__content__svg__images__item <?php echo esc_attr( $svg_url == $svg_value ? 'selected' : '' ); ?>" data-url="<?php echo esc_attr( $svg_url ); ?>" data-index="<?php echo esc_attr($key); ?>">
                <?php echo file_exists( $svg_url ) ? file_get_contents( $svg_url ) : ''; ?>
            </div>

        <?php endforeach; ?>

        <?php if ( $svg_no_image ): ?>
            <div class="cdc-content__option__content__svg__images__item empty <?php echo esc_attr( $svg_empty ? 'selected' : '' ); ?>" data-index="<?php echo esc_attr( count($svg_static) ); ?>">
                <?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/no-image.svg' ); ?>
            </div>
        <?php endif; ?>

    </div>  

    <input class="cdc-content__option__content__svg__input" type="hidden" name="<?php echo esc_attr($svg_id); ?>" id="<?php echo esc_attr($svg_id); ?>" value="<?php echo esc_attr($svg_value); ?>" data-index="">

</div>