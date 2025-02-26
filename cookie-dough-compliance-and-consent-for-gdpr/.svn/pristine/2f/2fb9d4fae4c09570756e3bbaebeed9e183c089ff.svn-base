<?php

/**
 * The template for the advanced settings option
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options
 */



$trigger_title          = __( 'Advanced settings', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
$trigger_description    = __( 'Fine-tune your settings to improve the user experience', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
?>

<div class="cdc-content__option" data-title="<?php echo esc_attr($trigger_title); ?>">

    <?php
        $trigger_index = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/trigger.php';
    ?>
    
    <div class="cdc-content__option__content">
        
        <?php

            $slider_id      = 'advanced-delay-opening';
            $slider_title   = __( 'Delays before automatic opening (0 for no automatic appearance)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 0;
            $slider_max     = 60;
            $slider_step    = 1;
            $slider_unit    = __( 'sec', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>

        <?php
            $toggle_id          = 'advanced-disappears-accepted';
            $toggle_title       = __( 'Disappears if accepted', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_description = __( 'If activated the banner will disappear once the cookies have been accepted.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_value       = isset($settings_array[$toggle_id]) ? $settings_array[$toggle_id] : cdc_cookie_default_values($toggle_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/toggle.php';
        ?>

        <?php
            $slider_id      = 'advanced-cookie-duration-acceptall';
            $slider_title   = __( 'Duration of cookies if the user accepts all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 1;
            $slider_max     = 365;
            $slider_step    = 1;
            $slider_unit    = __( 'day', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>
        
        <?php
            $slider_id      = 'advanced-cookie-duration-notacceptall';
            $slider_title   = __( 'Duration of cookies if the user does not accept all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $slider_value   = isset($settings_array[$slider_id]) ? $settings_array[$slider_id] : cdc_cookie_default_values($slider_id);
            $slider_min     = 1;
            $slider_max     = 365;
            $slider_step    = 1;
            $slider_unit    = __( 'day', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/slider.php';
        ?>

        <?php
            $toggle_id          = 'advanced-handle-cache';
            $toggle_title       = __( 'Activate the cache mode (beta)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_description = __( 'If activated the scripts blocker will work even with cache. you should exclude (wp-content/plugins/cookie-dough-consent/public/js/front-run-scripts.min.js, wp-content/plugins/cookie-dough-consent/public/js/front.min.js) from minify/combine scripts in your cache plugin', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_value       = isset($settings_array[$toggle_id]) ? $settings_array[$toggle_id] : cdc_cookie_default_values($toggle_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/toggle.php';
        ?>

    </div>

</div>