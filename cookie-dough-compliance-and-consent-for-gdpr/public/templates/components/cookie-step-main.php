<?php

/**
 * The template for the cookie step main
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */
?>

<div class="cdc-cookie__popup__steps__step selected" id="main-show-step-container">

    <div class="cdc-cookie__popup__steps__step__body">

        <div class="cdc-cookie__popup__steps__step__body__top">

            <?php if ( !empty($personalization_main_image) || is_admin() ): ?>
                <div class="cdc-cookie__popup__steps__step__body__image">
                    <img src="<?php echo esc_url($personalization_main_image); ?>" alt="<?php _e('Cookie modal illustration', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN); ?>" class="<?= empty($personalization_main_image) ? 'hide' : ''; ?>">
                </div>
            <?php endif; ?>

            <div class="cdc-cookie__popup__steps__step__body__title" id="main-title-text"><?php esc_html_e($main_title); ?></div>
        </div>

        <div class="cdc-cookie__popup__steps__step__body__description" id="main-description-text"><?php echo esc_textarea($main_description); ?></div>

        <div class="cdc-cookie__popup__steps__step__body__important-links">

            <?php
                if ( is_array($main_important_links) ) {

                    foreach ( $main_important_links as $key => $value ) {
                        ?>
                            <div class="cdc-cookie__popup__steps__step__body__important-links__item i-<?php echo esc_attr($key); ?>">
                                <span class="cdc-cookie__popup__link" data-href="<?php echo esc_url($value['link']); ?>"><?php esc_html_e($value['text']); ?></span>
                            </div>
                        <?php
                    }
                }
            ?>

        </div>
        
    </div>

    <div class="cdc-cookie__popup__steps__step__footer">

        <div class="cdc-cookie__popup__steps__step__footer__btns">
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-main-acceptall"><?php esc_html_e($main_acceptall_text); ?></button>
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-main-refuseall"><?php esc_html_e($main_refuseall_text); ?></button>
			<?php if ( ($mandatory_show_step == 'yes' || $optional_show_step == 'yes') || is_admin() ): ?>
				<button class="cdc-cookie__popup__steps__step__footer__btns__btn main <?php echo esc_attr( $mandatory_show_step == 'yes' || $optional_show_step == 'yes' ? 'show' : '' ); ?>" id="cdc-cookie-step-main-choose"><?php esc_html_e($main_choose_text); ?></button>
			<?php endif; ?>
        </div>

        <?php include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/step-component-powered.php'; ?>

    </div>

</div>