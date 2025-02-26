<?php

/**
 * The template for the cookie popup
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */
?>

<div class="cdc-cookie__popup closed <?php echo esc_attr($personalization_alignment_main_btn); ?>" id="cdc-cookie-popup">

    <div class="cdc-cookie__popup__steps">

        <?php
            require_once COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-main.php';

            if ( $mandatory_show_step == 'yes' || is_admin() ) {
                require_once COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-mandatory.php';
            }
            
            if ( $optional_show_step == 'yes' || is_admin() ) {
                require_once COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-optional.php';
            }
        ?>

    </div>

</div>