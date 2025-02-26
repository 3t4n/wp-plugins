<?php

/**
 * The template for the main option
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options
 */



$trigger_title          = __( 'Main window', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
$trigger_description    = __( 'Settings for the first window your users will see', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
?>

<div class="cdc-content__option" data-title="<?php echo esc_attr($trigger_title); ?>">

    <?php
        $trigger_index = 'main-show-step-container';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/trigger.php';
    ?>
    
    <div class="cdc-content__option__content">
        
        <?php
            $input_id           = 'main-title';
            $input_title        = __( 'Title', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $input_description  = '';
            $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
        ?>
        
        <?php
            $textarea_id       = 'main-description';
            $textarea_title    = __( 'Descriptive text of cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $textarea_value    = isset($settings_array[$textarea_id]) ? $settings_array[$textarea_id] : cdc_cookie_default_values($textarea_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/textarea.php';
        ?>
        
        <?php
            $repeater_id                = 'main-important-links';
            $repeater_title             = __( 'Important link(s) (privacy policy, legal notices...)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $repeater_placeholder_text  = __( 'Text', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $repeater_placeholder_link  = __( 'Link', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $repeater_value             = isset($settings_array[$repeater_id]) ? $settings_array[$repeater_id] : cdc_cookie_default_values($repeater_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/link-repeater.php';
        ?>
        
        <?php
            $input_id           = 'main-acceptall-text';
            $input_title        = __( 'Text of acceptance of all cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $input_description  = '';
            $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
        ?>

        <?php
            $input_id           = 'main-refuseall-text';
            $input_title        = __( 'Text of refuse-ance of all cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $input_description  = '';
            $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
        ?>

		<?php
            $input_id           = 'main-choose-text';
            $input_title        = __( 'Text to choose cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $input_description  = '';
            $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
        ?>

    </div>

</div>