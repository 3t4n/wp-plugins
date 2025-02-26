<?php

/**
 * The template for the second step in the popup
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/popup/steps
 */

?>

<div class="cdc-content__popup__modal__body__section step-2">

    <?php
        $toggle_id          = 'popup-mandatory';
        $toggle_title       = __( 'Mandatory cookie', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $toggle_description = __( 'This will determine at which stage your cookie will appear.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $toggle_value       = 'yes';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/toggle.php';
    ?>

    <?php
        $input_id       = 'popup-id';
        $input_title    = __( 'ID', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_value    = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $input_id       = 'popup-title';
        $input_title    = __( 'Title', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_value    = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $input_id           = 'popup-name';
        $input_title        = __( 'Name', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_description  = __( "This name will be received by your page when the user completes the setup process. Attention, it cannot contain the symbol '.' (point)", COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_value        = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $input_id           = 'popup-descShort';
        $input_title        = __( 'Short description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_description  = '';
        $input_value        = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $input_id           = 'popup-descLong';
        $input_title        = __( 'Long Description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_description  = '';
        $input_value        = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $input_id           = 'popup-domain';
        $input_title        = __( 'Domain name', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_description  = __( 'This domain will be used to fetch the favicon.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_value        = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $select_id      = 'popup-category';
        $select_title   = __( 'Category', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $select_value   = '';
        $select_options = array(
            ''              => __( 'None', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'testing'       => __( 'A/B testing', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'marketing'     => __( 'Marketing', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'email'         => __( 'Emailing', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'monitoring'    => __( 'Monitoring', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'chat'          => __( 'Live chat', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'crm'           => __( 'CRM', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
            'other'         => __( 'Others', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN )
        );
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/select.php';
    ?>
    
    <?php
        $input_id           = 'popup-policyUrl';
        $input_title        = __( 'URL to privacy policy', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        $input_description  = '';
        $input_value        = '';
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/input.php';
    ?>
    
    <?php
        $add_script_id      = 'popup-script';
        $add_script_title   = __( 'Script to include (works if your site uses cache and the option is enabled in advanced settings (beta))', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/add-script.php';
    ?>

    <input type="hidden" id="popup-favicon" name="popup-favicon" value="" >

    <div class="cdc-content__popup__modal__body__section__save">

        <p id="popup-button-msg" class="cdc-content__popup__modal__body__section__save__msg"><?php _e( 'Please complete all fields', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></p>

        <button id="popup-button">
            <?php _e( 'Validate', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?>
            <span id="popup-button-spinner" class="cdc-content__popup__modal__body__section__save__spinner"></span>
        </button>

    </div>

</div>