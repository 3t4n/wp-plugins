<?php

/**
 * The template for the mandatory option
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options
 */



$trigger_title          = __( 'Mandatory cookies window', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
$trigger_description    = __( 'Mandatory cookie settings (cannot be refused)', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
?>

<div class="cdc-content__option" data-title="<?php echo esc_attr($trigger_title); ?>">

    <?php
        $trigger_index = 'mandatory-show-step-container';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/trigger.php';
    ?>

    <div class="cdc-content__option__content">

        <?php
            $toggle_id          = 'mandatory-show-step';
            $toggle_title       = __( 'Show required cookies step', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_description = __( 'Displaying this step gives more information about your essential cookies.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
            $toggle_value       = isset($settings_array[$toggle_id]) ? $settings_array[$toggle_id] : cdc_cookie_default_values($toggle_id);
            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/toggle.php';
        ?>

        <div class="cdc-content__option__content__fields <?php echo esc_attr( $toggle_value == 'yes' ? 'show' : '' ); ?>">
            
            <?php
                $input_id           = 'mandatory-title';
                $input_title        = __( 'Title', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                $input_description  = '';
                $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
                include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
            ?>
            
            <?php
                $textarea_id       = 'mandatory-description';
                $textarea_title    = __( 'Descriptive text', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                $textarea_value    = isset($settings_array[$textarea_id]) ? $settings_array[$textarea_id] : cdc_cookie_default_values($textarea_id);
                include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/textarea.php';
            ?>

            <?php
                $input_id           = 'mandatory-acceptall-text';
                $input_title        = __( 'Text of acceptance of all cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                $input_description  = '';
                $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
                include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
            ?>
			
            <?php
                $input_id           = 'mandatory-refuseall-text';
                $input_title        = __( 'Text of refuse-ance of all cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                $input_description  = '';
                $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
                include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
            ?>
            
            <?php
                $input_id           = 'mandatory-nextbtn-text';
                $input_title        = __( 'Next button text', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                $input_description  = '';
                $input_value        = isset($settings_array[$input_id]) ? $settings_array[$input_id] : cdc_cookie_default_values($input_id);
                include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
            ?>
        </div>

    </div>

</div>