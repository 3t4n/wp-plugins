<?php

/**
 * The template for the cookie settings option
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options
 */



$trigger_title          = __( 'Cookie settings', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
$trigger_description    = __( 'Manage your cookies, add, delete', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
?>

<div class="cdc-content__option" data-title="<?php echo esc_attr($trigger_title); ?>">

    <?php
        $trigger_index = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/trigger.php';
    ?>
    
    <div class="cdc-content__option__content">
        
        <?php
            $setting_id     = 'cookie-settings-main';
            $setting_title  = __( 'Your cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $setting_value  = isset($settings_array[$setting_id]) ? $settings_array[$setting_id] : cdc_cookie_default_values($setting_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/cookie-settings.php';
        ?>

    </div>

</div>