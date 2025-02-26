<?php

/**
 * The template for the cookie button
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */

?>

<button id="cdc-cookie-open-btn" class="cdc-cookie__btn" title="<?php _e('Open/close cookie modal', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN); ?>">

    <span class="cdc-cookie__btn__open">
        <img src="<?php echo esc_url($personalization_image_main_btn); ?>" id="personalization-image-main-btn-image" alt="<?php _e('Open button logo', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN); ?>">
    </span>

    <span class="cdc-cookie__btn__close"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/times.svg' ); ?></span>

</button>