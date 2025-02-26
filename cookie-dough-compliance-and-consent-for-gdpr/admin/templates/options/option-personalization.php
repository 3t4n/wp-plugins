<?php

/**
 * The template for the personalization option
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options
 */



$trigger_title          = __( 'Personalization', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
$trigger_description    = __( 'Adapt your cookie popup to your graphic charter', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
?>

<div class="cdc-content__option" data-title="<?php echo esc_attr($trigger_title); ?>">

    <?php
        $trigger_index = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/trigger.php';
    ?>

    <div class="cdc-content__option__content">
        
        <?php
            $image_id       = 'personalization-main-image';
            $image_title    = __( 'Illustration of the main window', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $image_static   = array(
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-01.webp',
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-02.webp',
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-03.webp',
            );
            $image_value        = isset($settings_array[$image_id]) ? $settings_array[$image_id] : cdc_cookie_default_values($image_id);
            $image_no_image     = true;
            $image_custom_image = true;
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/image.php';
        ?>
        
        <?php
            $color_id       = 'personalization-color-action';
            $color_title    = __( 'Color 1 (Actions)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $color_value    = isset($settings_array[$color_id]) ? $settings_array[$color_id] : cdc_cookie_default_values($color_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/color.php';
        ?>
        
        <?php
            $color_id       = 'personalization-color-secondary-action';
            $color_title    = __( 'Color 2 (Secondary Actions)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $color_value    = isset($settings_array[$color_id]) ? $settings_array[$color_id] : cdc_cookie_default_values($color_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/color.php';
        ?>
        
        <?php
            $color_id       = 'personalization-color-text';
            $color_title    = __( 'Color 3 (Titles, texts)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $color_value    = isset($settings_array[$color_id]) ? $settings_array[$color_id] : cdc_cookie_default_values($color_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/color.php';
        ?>
        
        <?php
            $color_id       = 'personalization-color-bg';
            $color_title    = __( 'Color 5 (Background)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $color_value    = isset($settings_array[$color_id]) ? $settings_array[$color_id] : cdc_cookie_default_values($color_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/color.php';
        ?>
        
        <?php
            $slider_id      = 'personalization-modal-border-radius';
            $slider_title   = __( 'Border radius of modals', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 0;
            $slider_max     = 100;
            $slider_step    = 1;
            $slider_unit    = __( 'px', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>

        <?php
            $alignment_id       = 'personalization-alignment-main-btn';
            $alignment_title    = __( 'Floating Button Alignment', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $alignment_value    = isset($settings_array[$alignment_id]) ? $settings_array[$alignment_id] : cdc_cookie_default_values($alignment_id);
            $alignment_options  = array(
                'bottom_right'  => __( 'Bottom right.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
                'bottom_left'   => __( 'Bottom left.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN )
            );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/alignment.php';
        ?>

        <?php
            $slider_id      = 'personalization-margin-horizontal-main-btn';
            $slider_title   = __( 'Floating button horizontal margins', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 0;
            $slider_max     = 100;
            $slider_step    = 1;
            $slider_unit    = __( 'px', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>
        
        <?php
            $slider_id      = 'personalization-margin-vertical-main-btn';
            $slider_title   = __( 'Floating button vertical margins', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 0;
            $slider_max     = 100;
            $slider_step    = 1;
            $slider_unit    = __( 'px', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>

        <?php
            $image_id       = 'personalization-image-main-btn';
            $image_title    = __( 'Floating button illustration', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $image_static   = array(
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-01.webp',
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-02.webp',
                COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-03.webp',
            );
            $image_value        = isset($settings_array[$image_id]) ? $settings_array[$image_id] : cdc_cookie_default_values($image_id);
            $image_no_image     = false;
            $image_custom_image = true;
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/image.php';
        ?>

        <?php
            $slider_id      = 'personalization-size-main-btn';
            $slider_title   = __( 'Floating button size', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 40;
            $slider_max     = 100;
            $slider_step    = 1;
            $slider_unit    = __( 'px', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>
        
        <?php
            $slider_id      = 'personalization-border-radius-main-btn';
            $slider_title   = __( 'Floating Button Border Radius', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 0;
            $slider_max     = 50;
            $slider_step    = 1;
            $slider_unit    = __( 'px', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>

    </div>

</div>